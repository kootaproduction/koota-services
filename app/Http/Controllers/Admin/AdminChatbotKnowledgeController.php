<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ChatbotKnowledge;
use App\Models\ChatbotLog;
use Illuminate\Http\Request;

class AdminChatbotKnowledgeController extends Controller
{
    public function index(Request $request)
    {
        $query = ChatbotKnowledge::query();

        if ($request->filled('search')) {
            $search = trim($request->search);
            $query->where(function ($q) use ($search) {
                $q->where('question', 'like', "%{$search}%")
                  ->orWhere('answer', 'like', "%{$search}%")
                  ->orWhere('keywords', 'like', "%{$search}%");
            });
        }

        if ($request->filled('category')) {
            $query->where('category', $request->category);
        }

        if ($request->filled('status')) {
            if ($request->status === 'active') {
                $query->where('is_active', true);
            } elseif ($request->status === 'inactive') {
                $query->where('is_active', false);
            }
        }

        $knowledges = $query->orderBy('order')->orderByDesc('hit_count')->paginate(15)->withQueryString();

        $totalKnowledges = ChatbotKnowledge::count();
        $activeKnowledges = ChatbotKnowledge::where('is_active', true)->count();
        $totalHits = ChatbotKnowledge::sum('hit_count');
        $unresolvedLogsCount = ChatbotLog::where('is_resolved', false)->count();

        $categories = ChatbotKnowledge::select('category')->distinct()->pluck('category');

        return view('admin.bot_knowledges.index', compact(
            'knowledges',
            'totalKnowledges',
            'activeKnowledges',
            'totalHits',
            'unresolvedLogsCount',
            'categories'
        ));
    }

    public function create(Request $request)
    {
        $prefillQuestion = $request->input('from_question', '');
        $fromLogId = $request->input('from_log_id');
        $categories = ChatbotKnowledge::select('category')->distinct()->pluck('category');
        $maxOrder = (ChatbotKnowledge::max('order') ?? 0) + 1;

        return view('admin.bot_knowledges.create', compact('prefillQuestion', 'fromLogId', 'categories', 'maxOrder'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'category' => 'required|string|max:100',
            'question' => 'required|string|max:255',
            'keywords' => 'nullable|string',
            'answer' => 'required|string',
            'order' => 'nullable|integer',
            'is_active' => 'nullable|boolean',
            'from_log_id' => 'nullable|integer|exists:chatbot_logs,id',
        ]);

        $validated['is_active'] = $request->boolean('is_active', true);
        $validated['order'] = $validated['order'] ?? 1;

        $knowledge = ChatbotKnowledge::create($validated);

        if (!empty($validated['from_log_id'])) {
            $log = ChatbotLog::find($validated['from_log_id']);
            if ($log) {
                $log->update([
                    'is_resolved' => true,
                    'chatbot_knowledge_id' => $knowledge->id,
                ]);
            }
        }

        return redirect()->route('admin.bot-knowledges.index')->with('success', 'Data pengetahuan bot berhasil ditambahkan.');
    }

    public function edit(ChatbotKnowledge $bot_knowledge)
    {
        $categories = ChatbotKnowledge::select('category')->distinct()->pluck('category');

        return view('admin.bot_knowledges.edit', [
            'knowledge' => $bot_knowledge,
            'categories' => $categories,
        ]);
    }

    public function update(Request $request, ChatbotKnowledge $bot_knowledge)
    {
        $validated = $request->validate([
            'category' => 'required|string|max:100',
            'question' => 'required|string|max:255',
            'keywords' => 'nullable|string',
            'answer' => 'required|string',
            'order' => 'nullable|integer',
            'is_active' => 'nullable|boolean',
        ]);

        $validated['is_active'] = $request->boolean('is_active', true);
        $validated['order'] = $validated['order'] ?? 1;

        $bot_knowledge->update($validated);

        return redirect()->route('admin.bot-knowledges.index')->with('success', 'Data pengetahuan bot berhasil diperbarui.');
    }

    public function destroy(ChatbotKnowledge $bot_knowledge)
    {
        $bot_knowledge->delete();

        return redirect()->route('admin.bot-knowledges.index')->with('success', 'Data pengetahuan bot berhasil dihapus.');
    }

    public function toggleActive(ChatbotKnowledge $bot_knowledge)
    {
        $bot_knowledge->update([
            'is_active' => !$bot_knowledge->is_active,
        ]);

        return redirect()->back()->with('success', 'Status aktif bot knowledge berhasil diperbarui.');
    }

    public function logs(Request $request)
    {
        $query = ChatbotLog::with('knowledge');

        if ($request->filled('status')) {
            if ($request->status === 'unresolved') {
                $query->where('is_resolved', false);
            } elseif ($request->status === 'resolved') {
                $query->where('is_resolved', true);
            }
        }

        if ($request->filled('search')) {
            $search = trim($request->search);
            $query->where(function ($q) use ($search) {
                $q->where('user_message', 'like', "%{$search}%")
                  ->orWhere('bot_reply', 'like', "%{$search}%")
                  ->orWhere('matched_source', 'like', "%{$search}%");
            });
        }

        $logs = $query->latest()->paginate(25)->withQueryString();

        $totalLogs = ChatbotLog::count();
        $unresolvedLogsCount = ChatbotLog::where('is_resolved', false)->count();
        $resolvedLogsCount = ChatbotLog::where('is_resolved', true)->count();

        return view('admin.bot_knowledges.logs', compact(
            'logs',
            'totalLogs',
            'unresolvedLogsCount',
            'resolvedLogsCount'
        ));
    }

    public function resolveLog(ChatbotLog $log)
    {
        $log->update([
            'is_resolved' => !$log->is_resolved,
        ]);

        $statusText = $log->is_resolved ? 'ditandai selesai' : 'ditandai belum terjawab';

        return redirect()->back()->with('success', "Log pertanyaan berhasil {$statusText}.");
    }

    public function destroyLog(ChatbotLog $log)
    {
        $log->delete();

        return redirect()->back()->with('success', 'Log pertanyaan berhasil dihapus.');
    }
}

