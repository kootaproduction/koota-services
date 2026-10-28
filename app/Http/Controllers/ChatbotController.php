<?php

namespace App\Http\Controllers;

use App\Models\Faq;
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
                'reply' => 'Halo! Saya asisten KOOTA Services. Silakan tulis pertanyaan Anda.',
            ], 422);
        }

        return response()->json([
            'reply' => $this->buildAiOrFallbackReply($message),
        ]);
    }

    protected function buildAiOrFallbackReply(string $message): string
    {
        $openAiKey = trim((string) config('services.openai.key'));

        if ($openAiKey !== '') {
            $aiReply = $this->requestAiReply($message);

            if ($aiReply !== null) {
                return $aiReply;
            }
        }

        return $this->buildFaqReply($message);
    }

    protected function requestAiReply(string $message): ?string
    {
        $payload = [
            'model' => config('services.openai.model', 'gpt-4o-mini'),
            'messages' => [
                [
                    'role' => 'system',
                    'content' => 'Kamu adalah customer service Koota Services. Jawab singkat, ramah, dan profesional. Fokus pada layanan kebersihan rumah, perbaikan rumah, pengangkutan sampah, jadwal, wilayah layanan, dan cara konsultasi. Jika tidak yakin, arahkan ke WhatsApp 0812-1759-7109.',
                ],
                [
                    'role' => 'user',
                    'content' => $message,
                ],
            ],
            'temperature' => 0.5,
            'max_tokens' => 250,
        ];

        try {
            $response = Http::withHeaders([
                'Authorization' => 'Bearer ' . config('services.openai.key'),
            ])->timeout(20)->post(
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

    protected function buildFaqReply(string $message): string
    {
        $search = strtolower((string) preg_replace('/[^a-z0-9\s]/i', ' ', $message));
        $keywords = array_values(array_filter(array_unique(preg_split('/\s+/', $search) ?: []), fn ($word) => strlen($word) > 2));

        $faqs = Faq::query()->orderBy('order')->get();

        $bestMatch = null;
        $bestScore = 0;

        foreach ($faqs as $faq) {
            $haystack = strtolower(($faq->question ?? '') . ' ' . ($faq->answer ?? ''));
            $score = 0;

            foreach ($keywords as $keyword) {
                if (Str::contains($haystack, $keyword)) {
                    $score += 2;
                }
            }

            if ($search !== '' && Str::contains($haystack, $search)) {
                $score += 5;
            }

            if ($score > $bestScore) {
                $bestScore = $score;
                $bestMatch = $faq;
            }
        }

        if ($bestMatch && $bestScore > 0) {
            return trim((string) $bestMatch->answer);
        }

        $messageLower = strtolower($message);

        if (Str::contains($messageLower, 'harga') || Str::contains($messageLower, 'biaya') || Str::contains($messageLower, 'tarif')) {
            return 'Untuk estimasi biaya, KOOTA Services menyesuaikan jenis pekerjaan, luas area, dan lokasi. Silakan kirim detail kebutuhan Anda via WhatsApp di 0812-1759-7109 agar kami bisa memberikan penawaran yang tepat.';
        }

        if (Str::contains($messageLower, 'layanan') || Str::contains($messageLower, 'service') || Str::contains($messageLower, 'produk')) {
            return 'KOOTA Services menyediakan 3 layanan utama: pembersihan rumah, perbaikan rumah, dan pengangkutan sampah. Anda bisa melihat detail di website atau langsung konsultasikan kebutuhan di WhatsApp.';
        }

        if (Str::contains($messageLower, 'lokasi') || Str::contains($messageLower, 'daerah') || Str::contains($messageLower, 'surabaya') || Str::contains($messageLower, 'malang') || Str::contains($messageLower, 'bali') || Str::contains($messageLower, 'jakarta')) {
            return 'KOOTA Services melayani area seperti Surabaya, Malang, Bali, dan Jakarta. Untuk kebutuhan spesifik, kirim lokasi dan detail pekerjaan Anda agar kami bisa menyiapkan solusi terbaik.';
        }

        return 'Halo! Saya dapat membantu terkait layanan KOOTA Services seperti pembersihan rumah, perbaikan rumah, dan pengangkutan sampah. Jika Anda ingin penawaran cepat, silakan kirim detail kebutuhan Anda di WhatsApp: 0812-1759-7109.';
    }
}
