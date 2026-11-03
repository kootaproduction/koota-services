<?php

namespace App\Http\Controllers;

use App\Models\ChatbotKnowledge;
use App\Models\ChatbotLog;
use App\Models\Faq;
use App\Models\Project;
use App\Models\Service;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Str;

class ChatbotController extends Controller
{
    public function ask(Request $request)
    {
        $message = trim((string) $request->input('message', ''));

        if ($message === '') {
            return response()->json([
                'reply' => 'Halo! Saya asisten pintar KOOTA Services. Silakan tulis pertanyaan atau kebutuhan layanan Anda.',
            ], 422);
        }

        $reply = $this->resolveResponse($message);

        return response()->json([
            'reply' => $reply,
        ]);
    }

    protected function resolveResponse(string $message): string
    {
        $normalized = mb_strtolower(trim($message));

        // 0. Quick greeting detection
        if ($this->isGreeting($normalized)) {
            $greetingReply = "Halo! Selamat datang di KOOTA Services. Saya asisten virtual KOOTA. Ada yang bisa kami bantu seputar pembersihan rumah (home cleaning), perbaikan rumah & tukang, atau pengangkutan sampah & puing? Silakan ketik pertanyaan Anda atau konsultasikan langsung!";
            ChatbotLog::create([
                'user_message' => $message,
                'bot_reply' => $greetingReply,
                'matched_source' => 'Greeting',
                'is_resolved' => true,
            ]);
            return $greetingReply;
        }

        // 1. Tier 1: Search Database Knowledge Base (ChatbotKnowledge)
        $knowledgeMatch = $this->findBestKnowledgeMatch($message);
        if ($knowledgeMatch !== null) {
            $knowledgeMatch->increment('hit_count');

            ChatbotLog::create([
                'user_message' => $message,
                'bot_reply' => $knowledgeMatch->answer,
                'matched_source' => 'Knowledge Base: ' . $knowledgeMatch->category,
                'chatbot_knowledge_id' => $knowledgeMatch->id,
                'is_resolved' => true,
            ]);

            return $knowledgeMatch->answer;
        }

        // 2. Tier 2: Search Core Business Models (Service & Solutions)
        $serviceReply = $this->findServiceMatch($message);
        if ($serviceReply !== null) {
            ChatbotLog::create([
                'user_message' => $message,
                'bot_reply' => $serviceReply['reply'],
                'matched_source' => 'Layanan: ' . $serviceReply['title'],
                'is_resolved' => true,
            ]);

            return $serviceReply['reply'];
        }

        // 3. Tier 3: Search General FAQ Model
        $faqReply = $this->findFaqMatch($message);
        if ($faqReply !== null) {
            ChatbotLog::create([
                'user_message' => $message,
                'bot_reply' => $faqReply,
                'matched_source' => 'FAQ Website',
                'is_resolved' => true,
            ]);

            return $faqReply;
        }

        // 4. Tier 4: Search Portfolio / Projects
        $portfolioReply = $this->findPortfolioMatch($message);
        if ($portfolioReply !== null) {
            ChatbotLog::create([
                'user_message' => $message,
                'bot_reply' => $portfolioReply,
                'matched_source' => 'Portofolio',
                'is_resolved' => true,
            ]);

            return $portfolioReply;
        }

        // 5. Tier 5: OpenAI Fallback (if API key is present)
        $openAiKey = trim((string) config('services.openai.key'));
        if ($openAiKey !== '') {
            $aiReply = $this->requestAiReply($message);
            if ($aiReply !== null) {
                ChatbotLog::create([
                    'user_message' => $message,
                    'bot_reply' => $aiReply,
                    'matched_source' => 'OpenAI AI Assistant',
                    'is_resolved' => true,
                ]);

                return $aiReply;
            }
        }

        // 6. Tier 6: Unresolved Query Logging & Helpful Fallback
        $fallbackReply = "Halo! Terima kasih atas pertanyaan Anda. Kami dapat membantu Anda terkait layanan KOOTA Services seperti Home Cleaning, Perbaikan Rumah, dan Pengangkutan Sampah di area Surabaya, Malang, Bali, dan Jakarta. Pertanyaan ini telah dicatat sistem kami agar dapat dievaluasi lebih lanjut. Untuk respons cepat dan konsultasi langsung dengan tim teknis kami, silakan hubungi WhatsApp kami di 0812-1759-7109 atau kunjungi halaman Konsultasi & Reservasi.";

        ChatbotLog::create([
            'user_message' => $message,
            'bot_reply' => $fallbackReply,
            'matched_source' => 'Belum Terjawab (Fallback)',
            'chatbot_knowledge_id' => null,
            'is_resolved' => false,
        ]);

        return $fallbackReply;
    }

    protected function isGreeting(string $normalized): bool
    {
        $clean = trim(preg_replace('/[^\p{L}\p{N}\s]/u', ' ', $normalized));
        $clean = preg_replace('/\s+/', ' ', $clean);

        $greetings = [
            'halo', 'hai', 'hi', 'hey', 'hello',
            'selamat pagi', 'selamat siang', 'selamat sore', 'selamat malam',
            'pagi', 'siang', 'sore', 'malam',
            'assalamualaikum', 'tes', 'test', 'ping', 'halo admin', 'halo koota', 'pagi min'
        ];

        if (in_array($clean, $greetings, true)) {
            return true;
        }

        // Check if message consists primarily of greeting terms (e.g. "halo selamat pagi", "hai halo")
        $words = explode(' ', $clean);
        if (count($words) <= 3) {
            $matchedWords = array_filter($words, fn($w) => in_array($w, ['halo', 'hai', 'hi', 'hey', 'hello', 'selamat', 'pagi', 'siang', 'sore', 'malam', 'koota', 'admin', 'min'], true));
            if (count($matchedWords) === count($words)) {
                return true;
            }
        }

        return false;
    }

    protected function findBestKnowledgeMatch(string $message): ?ChatbotKnowledge
    {
        $cleanMessage = mb_strtolower((string) preg_replace('/[^\p{L}\p{N}\s]/u', ' ', $message));
        $userWords = array_values(array_filter(explode(' ', $cleanMessage), fn ($w) => mb_strlen($w) >= 2));

        $knowledges = ChatbotKnowledge::query()
            ->where('is_active', true)
            ->orderBy('order')
            ->get();

        $bestMatch = null;
        $highestScore = 0;

        foreach ($knowledges as $item) {
            $score = 0;
            $itemQuestion = mb_strtolower((string) $item->question);
            $itemCategory = mb_strtolower((string) $item->category);
            $itemKeywords = mb_strtolower((string) ($item->keywords ?? ''));

            // 1. Exact or near phrase match with question
            if (Str::contains($cleanMessage, $itemQuestion) || Str::contains($itemQuestion, $cleanMessage)) {
                $score += 35;
            }

            // 2. Keyword phrase containment (high weight)
            $phrases = array_map('trim', explode(',', $itemKeywords));
            foreach ($phrases as $phrase) {
                if ($phrase === '') {
                    continue;
                }
                if (Str::contains($cleanMessage, $phrase)) {
                    $score += str_contains($phrase, ' ') ? 20 : 12;
                }
            }

            // 3. User word matching against question and keywords words
            $kwWords = array_values(array_filter(explode(' ', preg_replace('/[^\p{L}\p{N}\s]/u', ' ', $itemKeywords)), fn ($w) => mb_strlen($w) >= 3));
            $qWords = array_values(array_filter(explode(' ', preg_replace('/[^\p{L}\p{N}\s]/u', ' ', $itemQuestion)), fn ($w) => mb_strlen($w) >= 3));

            foreach ($userWords as $uWord) {
                if (in_array($uWord, $kwWords, true)) {
                    $score += 4;
                }
                if (in_array($uWord, $qWords, true)) {
                    $score += 3;
                }
            }

            // 4. Category bonus
            if ($itemCategory !== '' && Str::contains($cleanMessage, $itemCategory)) {
                $score += 5;
            }

            if ($score > $highestScore) {
                $highestScore = $score;
                $bestMatch = $item;
            }
        }

        // Threshold score for confident match
        if ($highestScore >= 8) {
            return $bestMatch;
        }

        return null;
    }

    protected function findServiceMatch(string $message): ?array
    {
        $cleanMessage = mb_strtolower((string) preg_replace('/[^\p{L}\p{N}\s]/u', ' ', $message));
        $services = Service::with('solutions')->get();

        foreach ($services as $service) {
            $serviceTitle = mb_strtolower((string) $service->title);
            $serviceCat = mb_strtolower((string) $service->category);

            $matchedSolution = null;
            foreach ($service->solutions as $sol) {
                $solTitle = mb_strtolower((string) $sol->title);
                if (Str::contains($cleanMessage, $solTitle)) {
                    $matchedSolution = $sol;
                    break;
                }
            }

            $matchesService = Str::contains($cleanMessage, $serviceTitle) || ($serviceCat !== '' && Str::contains($cleanMessage, $serviceCat));

            if ($matchedSolution !== null || $matchesService) {
                $reply = "KOOTA Services menyediakan layanan **" . e($service->title) . "**.\n\n";

                if ($matchedSolution !== null) {
                    $reply .= "Khusus untuk **" . e($matchedSolution->title) . "**:\n" . e($matchedSolution->description) . "\n\n";
                } elseif ($service->description) {
                    $reply .= e(Str::limit($service->description, 200)) . "\n\n";
                }

                if ($service->solutions->isNotEmpty()) {
                    $solutionNames = $service->solutions->pluck('title')->take(4)->implode(', ');
                    $reply .= "Cakupan solusi: " . $solutionNames . ".\n\n";
                }

                $reply .= "Anda dapat melihat detail lengkap di menu Layanan atau reservasi langsung melalui WhatsApp 0812-1759-7109.";

                return [
                    'title' => $service->title,
                    'reply' => $reply,
                ];
            }
        }

        return null;
    }

    protected function findFaqMatch(string $message): ?string
    {
        $search = mb_strtolower((string) preg_replace('/[^a-z0-9\s]/i', ' ', $message));
        $keywords = array_values(array_filter(array_unique(preg_split('/\s+/', $search) ?: []), fn ($word) => strlen($word) > 2));

        if (empty($keywords)) {
            return null;
        }

        $faqs = Faq::query()->orderBy('order')->get();
        $bestMatch = null;
        $bestScore = 0;

        foreach ($faqs as $faq) {
            $haystack = mb_strtolower(($faq->question ?? '') . ' ' . ($faq->answer ?? ''));
            $score = 0;

            foreach ($keywords as $keyword) {
                if (Str::contains($haystack, $keyword)) {
                    $score += 2;
                }
            }

            if ($search !== '' && Str::contains($haystack, $search)) {
                $score += 6;
            }

            if ($score > $bestScore) {
                $bestScore = $score;
                $bestMatch = $faq;
            }
        }

        if ($bestMatch && $bestScore >= 4) {
            return trim((string) $bestMatch->answer);
        }

        return null;
    }

    protected function findPortfolioMatch(string $message): ?string
    {
        $clean = mb_strtolower($message);
        $portfolioKeywords = ['portofolio', 'portfolio', 'proyek', 'project', 'hasil kerja', 'dokumentasi', 'klien', 'koleksi'];

        $matched = false;
        foreach ($portfolioKeywords as $kw) {
            if (Str::contains($clean, $kw)) {
                $matched = true;
                break;
            }
        }

        if (!$matched) {
            return null;
        }

        $recentProjects = Project::latest()->take(3)->get();
        if ($recentProjects->isEmpty()) {
            return "KOOTA Services telah menyelesaikan berbagai proyek pembersihan, perbaikan bangunan, dan pengelolaan sampah untuk rumah tinggal, restoran, hingga properti komersial. Anda dapat melihat foto & video dokumentasi lengkap di menu Portofolio pada website kami.";
        }

        $reply = "KOOTA Services telah menyelesaikan berbagai proyek berkualitas. Beberapa proyek terbaru kami meliputi:\n";
        foreach ($recentProjects as $p) {
            $loc = $p->location ? ' (' . $p->location . ')' : '';
            $reply .= "• " . $p->title . $loc . "\n";
        }
        $reply .= "\nAnda dapat melihat dokumentasi foto dan video lengkap di menu Portofolio atau hubungi tim kami untuk konsultasi proyek Anda.";

        return $reply;
    }

    protected function requestAiReply(string $message): ?string
    {
        $payload = [
            'model' => config('services.openai.model', 'gpt-4o-mini'),
            'messages' => [
                [
                    'role' => 'system',
                    'content' => 'Kamu adalah asisten resmi KOOTA Services (Solusi Facility Care, Home Cleaning, Perbaikan Rumah, dan Pengangkutan Sampah). Area layanan: Surabaya, Sidoarjo, Gresik, Malang, Bali, dan Jakarta. Survei lokasi 100% gratis. WhatsApp resmi: 0812-1759-7109. Jawablah dengan ramah, profesional, ringkas, dan jelas dalam bahasa Indonesia.',
                ],
                [
                    'role' => 'user',
                    'content' => $message,
                ],
            ],
            'temperature' => 0.5,
            'max_tokens' => 300,
        ];

        try {
            $response = Http::withHeaders([
                'Authorization' => 'Bearer ' . config('services.openai.key'),
            ])->timeout(15)->post(
                config('services.openai.url', 'https://api.openai.com/v1/chat/completions'),
                $payload
            );

            if ($response->failed()) {
                return null;
            }

            $content = data_get($response->json(), 'choices.0.message.content');
            $content = trim((string) preg_replace('/\s+/', ' ', strip_tags((string) $content)));

            return $content !== '' ? $content : null;
        } catch (\Throwable $e) {
            return null;
        }
    }
}
