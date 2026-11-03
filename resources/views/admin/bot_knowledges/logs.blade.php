@extends('layouts.admin')

@section('title', 'Log Pertanyaan Chatbot - Admin KOOTA SERVICES')
@section('page_title', 'Log Interaksi & Pertanyaan Pengunjung')

@section('content')
<div class="space-y-6">
    <!-- Header Summary & Navigation -->
    <div class="flex flex-col md:flex-row md:items-center justify-between gap-4">
        <div>
            <h2 class="text-lg font-bold text-gray-900">Rekap Pertanyaan Masuk dari Chatbot</h2>
            <p class="text-xs text-gray-500">Lihat apa yang ditanyakan pengunjung, sumber jawaban yang digunakan, serta pertanyaan yang belum terjawab untuk segera dilengkapi.</p>
        </div>
        <div class="flex items-center gap-2">
            <a href="{{ route('admin.bot-knowledges.index') }}" class="px-4 py-2.5 rounded-xl bg-gray-100 hover:bg-gray-200 text-gray-800 text-xs font-bold transition-colors">
                &larr; Basis Pengetahuan (Q&A)
            </a>
            <a href="{{ route('admin.bot-knowledges.create') }}" class="px-5 py-2.5 rounded-xl bg-[#ac0c0c] hover:bg-[#820003] text-white text-xs font-bold transition-colors">
                + Tambah Pengetahuan Baru
            </a>
        </div>
    </div>

    <!-- Quick Stats & Filter Tabs -->
    <div class="bg-white p-5 rounded-2xl border border-gray-200 shadow-2xs space-y-4">
        <div class="flex flex-wrap items-center justify-between gap-4">
            <!-- Tabs -->
            <div class="flex items-center gap-2">
                <a href="{{ route('admin.bot-knowledges.logs') }}" class="px-3.5 py-1.5 rounded-xl text-xs font-bold transition-colors {{ !request('status') ? 'bg-gray-900 text-white' : 'bg-gray-100 text-gray-600 hover:bg-gray-200' }}">
                    Semua Pertanyaan ({{ $totalLogs }})
                </a>
                <a href="{{ route('admin.bot-knowledges.logs', ['status' => 'unresolved']) }}" class="px-3.5 py-1.5 rounded-xl text-xs font-bold transition-colors {{ request('status') === 'unresolved' ? 'bg-amber-600 text-white' : 'bg-amber-50 text-amber-800 border border-amber-200 hover:bg-amber-100' }}">
                    Belum Terjawab ({{ $unresolvedLogsCount }})
                </a>
                <a href="{{ route('admin.bot-knowledges.logs', ['status' => 'resolved']) }}" class="px-3.5 py-1.5 rounded-xl text-xs font-bold transition-colors {{ request('status') === 'resolved' ? 'bg-green-700 text-white' : 'bg-green-50 text-green-800 border border-green-200 hover:bg-green-100' }}">
                    Terjawab ({{ $resolvedLogsCount }})
                </a>
            </div>

            <!-- Search -->
            <form method="GET" action="{{ route('admin.bot-knowledges.logs') }}" class="flex items-center gap-2">
                @if(request('status'))
                    <input type="hidden" name="status" value="{{ request('status') }}">
                @endif
                <input type="text" name="search" value="{{ request('search') }}" placeholder="Cari pesan atau jawaban..." class="px-3.5 py-1.5 text-xs rounded-xl border border-gray-300 focus:ring-2 focus:ring-[#820003] focus:border-transparent w-64">
                <button type="submit" class="px-3 py-1.5 rounded-xl bg-gray-800 text-white text-xs font-bold hover:bg-gray-900 transition-colors">
                    Cari
                </button>
                @if(request('search'))
                    <a href="{{ route('admin.bot-knowledges.logs', request()->only('status')) }}" class="px-2.5 py-1.5 rounded-xl bg-gray-100 text-gray-600 text-xs font-bold hover:bg-gray-200">
                        Reset
                    </a>
                @endif
            </form>
        </div>
    </div>

    <!-- Logs Table -->
    <div class="bg-white rounded-2xl border border-gray-200 shadow-2xs overflow-hidden">
        <div class="overflow-x-auto">
            <table class="w-full text-left border-collapse">
                <thead>
                    <tr class="bg-gray-50 border-b border-gray-200 text-xs font-bold text-gray-500 uppercase tracking-wider">
                        <th class="py-3.5 px-6 w-36">Waktu</th>
                        <th class="py-3.5 px-6 w-72">Pertanyaan Pengunjung</th>
                        <th class="py-3.5 px-6 w-44">Sumber Jawaban</th>
                        <th class="py-3.5 px-6">Balasan Bot</th>
                        <th class="py-3.5 px-6 text-center w-28">Status</th>
                        <th class="py-3.5 px-6 text-right w-48">Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-100 text-sm">
                    @forelse($logs as $log)
                        <tr class="hover:bg-gray-50/70 transition-colors {{ !$log->is_resolved ? 'bg-amber-50/30' : '' }}">
                            <td class="py-4 px-6 text-xs text-gray-500 whitespace-nowrap">
                                <span class="font-bold text-gray-800 block">{{ $log->created_at->format('d M Y') }}</span>
                                <span class="text-[11px] text-gray-400">{{ $log->created_at->format('H:i') }} WIB</span>
                            </td>
                            <td class="py-4 px-6">
                                <p class="font-bold text-gray-900 text-sm leading-snug">
                                    {{ $log->user_message }}
                                </p>
                            </td>
                            <td class="py-4 px-6">
                                <span class="inline-block px-2.5 py-1 rounded-lg text-[11px] font-bold {{ Str::contains($log->matched_source, 'Belum Terjawab') ? 'bg-red-100 text-red-800' : 'bg-neutral-100 text-neutral-800 border border-neutral-200' }}">
                                    {{ $log->matched_source ?? 'Tidak Diketahui' }}
                                </span>
                            </td>
                            <td class="py-4 px-6 text-xs text-gray-600">
                                <p class="line-clamp-3 leading-relaxed whitespace-pre-line">
                                    {{ $log->bot_reply }}
                                </p>
                            </td>
                            <td class="py-4 px-6 text-center whitespace-nowrap">
                                @if($log->is_resolved)
                                    <span class="inline-block px-2.5 py-1 rounded-full text-[11px] font-bold bg-green-100 text-green-800">
                                        Terjawab
                                    </span>
                                @else
                                    <span class="inline-block px-2.5 py-1 rounded-full text-[11px] font-bold bg-amber-100 text-amber-800 animate-pulse">
                                        Perlu Ditinjau
                                    </span>
                                @endif
                            </td>
                            <td class="py-4 px-6 text-right space-y-1 whitespace-nowrap">
                                @if(!$log->is_resolved)
                                    <a href="{{ route('admin.bot-knowledges.create', ['from_question' => $log->user_message, 'from_log_id' => $log->id]) }}" class="px-2.5 py-1 rounded-lg bg-[#ac0c0c] text-white hover:bg-[#820003] text-[11px] font-bold transition-colors inline-block shadow-2xs">
                                        + Jadikan Pengetahuan
                                    </a>
                                @endif
                                <div class="flex items-center justify-end gap-1.5 pt-1">
                                    <form action="{{ route('admin.bot-knowledges.logs.resolve', $log->id) }}" method="POST" class="inline-block">
                                        @csrf
                                        @method('PATCH')
                                        <button type="submit" class="px-2 py-1 rounded text-[11px] font-medium text-gray-600 hover:text-gray-900 hover:bg-gray-100 transition-colors" title="Ubah status selesai">
                                            {{ $log->is_resolved ? 'Tandai Belum' : 'Tandai Selesai' }}
                                        </button>
                                    </form>
                                    <form action="{{ route('admin.bot-knowledges.logs.destroy', $log->id) }}" method="POST" class="inline-block" onsubmit="return confirm('Hapus log ini?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="px-2 py-1 rounded text-[11px] font-medium text-red-600 hover:text-red-800 hover:bg-red-50 transition-colors">
                                            Hapus
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="py-12 text-center text-gray-500 text-sm">
                                <p class="font-bold">Belum ada riwayat pesan dari chatbot.</p>
                                <p class="text-xs text-gray-400 mt-1">Setiap pertanyaan yang dikirim pengunjung via widget chat akan tercatat di sini secara otomatis.</p>
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        @if($logs->hasPages())
            <div class="p-4 border-t border-gray-100">
                {{ $logs->links() }}
            </div>
        @endif
    </div>
</div>
@endsection

