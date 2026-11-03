@extends('layouts.admin')

@section('title', 'Basis Pengetahuan Chatbot - Admin KOOTA SERVICES')
@section('page_title', 'Basis Pengetahuan Chatbot (Q&A)')

@section('content')
<div class="space-y-6">
    <!-- Top Stats Cards -->
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4">
        <div class="bg-white p-5 rounded-2xl border border-gray-200 shadow-2xs space-y-1">
            <span class="text-xs font-semibold text-gray-500 uppercase tracking-wider">Total Pengetahuan</span>
            <div class="flex items-baseline justify-between">
                <span class="text-2xl font-black text-gray-900">{{ $totalKnowledges }}</span>
                <span class="text-xs font-bold text-green-600 bg-green-50 px-2 py-0.5 rounded-full">{{ $activeKnowledges }} Aktif</span>
            </div>
            <p class="text-[11px] text-gray-400">Tersedia untuk menjawab pertanyaan customer</p>
        </div>

        <div class="bg-white p-5 rounded-2xl border border-gray-200 shadow-2xs space-y-1">
            <span class="text-xs font-semibold text-gray-500 uppercase tracking-wider">Total Pertanyaan Terjawab</span>
            <div class="flex items-baseline justify-between">
                <span class="text-2xl font-black text-[#820003]">{{ number_format($totalHits) }}</span>
                <span class="text-xs font-bold text-gray-500">Hits Terpanggil</span>
            </div>
            <p class="text-[11px] text-gray-400">Frekuensi bot mencocokkan data database</p>
        </div>

        <div class="bg-white p-5 rounded-2xl border border-gray-200 shadow-2xs space-y-1">
            <span class="text-xs font-semibold text-gray-500 uppercase tracking-wider">Pertanyaan Belum Terjawab</span>
            <div class="flex items-baseline justify-between">
                <span class="text-2xl font-black {{ $unresolvedLogsCount > 0 ? 'text-amber-600' : 'text-gray-900' }}">
                    {{ $unresolvedLogsCount }}
                </span>
                @if($unresolvedLogsCount > 0)
                    <span class="text-xs font-bold text-amber-700 bg-amber-50 px-2 py-0.5 rounded-full">Perlu Jawaban</span>
                @else
                    <span class="text-xs font-bold text-green-700 bg-green-50 px-2 py-0.5 rounded-full">Semua Terjawab</span>
                @endif
            </div>
            <p class="text-[11px] text-gray-400">Pertanyaan user yang perlu Anda lengkapi</p>
        </div>

        <div class="bg-gradient-to-br from-[#820003] to-[#450002] p-5 rounded-2xl text-white shadow-2xs flex flex-col justify-between">
            <div>
                <span class="text-[11px] uppercase tracking-wider font-bold text-red-200 block">Riwayat Interaksi</span>
                <p class="text-sm font-semibold mt-1">Pantau pertanyaan asli dari pengunjung</p>
            </div>
            <a href="{{ route('admin.bot-knowledges.logs') }}" class="mt-3 inline-flex items-center justify-between text-xs font-bold bg-white/10 hover:bg-white/20 px-3 py-2 rounded-xl transition-colors">
                <span>Buka Log Pertanyaan</span>
                <svg class="w-4 h-4 ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/></svg>
            </a>
        </div>
    </div>

    <!-- Actions & Filter Bar -->
    <div class="bg-white p-5 rounded-2xl border border-gray-200 shadow-2xs space-y-4">
        <div class="flex flex-col md:flex-row md:items-center justify-between gap-4">
            <div>
                <h3 class="text-base font-bold text-gray-900">Daftar Tanya Jawab & Kata Kunci Bot</h3>
                <p class="text-xs text-gray-500">Kelola informasi cerdas agar bot dapat menjawab seluruh pertanyaan seputar KOOTA Services secara presisi.</p>
            </div>
            <div class="flex items-center gap-2">
                <a href="{{ route('admin.bot-knowledges.logs', ['status' => 'unresolved']) }}" class="px-4 py-2.5 rounded-xl border border-amber-300 bg-amber-50 hover:bg-amber-100 text-amber-900 text-xs font-bold transition-colors inline-flex items-center gap-1.5">
                    <svg class="w-3.5 h-3.5 text-amber-700" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"/></svg>
                    <span>Evaluasi Belum Terjawab ({{ $unresolvedLogsCount }})</span>
                </a>
                <a href="{{ route('admin.bot-knowledges.create') }}" class="px-5 py-2.5 rounded-xl bg-[#ac0c0c] hover:bg-[#820003] text-white text-xs font-bold shadow-sm transition-colors inline-flex items-center gap-1.5">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/></svg>
                    <span>Tambah Pengetahuan Baru</span>
                </a>
            </div>
        </div>

        <!-- Filter Form -->
        <form method="GET" action="{{ route('admin.bot-knowledges.index') }}" class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-4 gap-3 pt-3 border-t border-gray-100">
            <div>
                <input type="text" name="search" value="{{ request('search') }}" placeholder="Cari pertanyaan, jawaban, atau kata kunci..." class="w-full px-3.5 py-2 rounded-xl border border-gray-300 text-xs focus:ring-2 focus:ring-[#820003] focus:border-transparent">
            </div>
            <div>
                <select name="category" class="w-full px-3.5 py-2 rounded-xl border border-gray-300 text-xs focus:ring-2 focus:ring-[#820003] focus:border-transparent">
                    <option value="">Semua Kategori</option>
                    @foreach($categories as $cat)
                        <option value="{{ $cat }}" {{ request('category') === $cat ? 'selected' : '' }}>{{ $cat }}</option>
                    @endforeach
                </select>
            </div>
            <div>
                <select name="status" class="w-full px-3.5 py-2 rounded-xl border border-gray-300 text-xs focus:ring-2 focus:ring-[#820003] focus:border-transparent">
                    <option value="">Semua Status</option>
                    <option value="active" {{ request('status') === 'active' ? 'selected' : '' }}>Hanya Aktif</option>
                    <option value="inactive" {{ request('status') === 'inactive' ? 'selected' : '' }}>Nonaktif</option>
                </select>
            </div>
            <div class="flex items-center gap-2">
                <button type="submit" class="w-full py-2 px-3 rounded-xl bg-gray-800 hover:bg-gray-900 text-white text-xs font-bold transition-colors">
                    Filter
                </button>
                @if(request()->hasAny(['search', 'category', 'status']))
                    <a href="{{ route('admin.bot-knowledges.index') }}" class="py-2 px-3 rounded-xl bg-gray-100 hover:bg-gray-200 text-gray-700 text-xs font-bold transition-colors">
                        Reset
                    </a>
                @endif
            </div>
        </form>
    </div>

    <!-- Table -->
    <div class="bg-white rounded-2xl border border-gray-200 shadow-2xs overflow-hidden">
        <div class="overflow-x-auto">
            <table class="w-full text-left border-collapse">
                <thead>
                    <tr class="bg-gray-50 border-b border-gray-200 text-xs font-bold text-gray-500 uppercase tracking-wider">
                        <th class="py-3.5 px-6 w-16">Urutan</th>
                        <th class="py-3.5 px-6 w-40">Kategori</th>
                        <th class="py-3.5 px-6">Pertanyaan & Kata Kunci</th>
                        <th class="py-3.5 px-6 w-72">Jawaban Bot</th>
                        <th class="py-3.5 px-6 text-center w-24">Hits</th>
                        <th class="py-3.5 px-6 text-center w-24">Status</th>
                        <th class="py-3.5 px-6 text-right w-36">Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-100 text-sm">
                    @forelse($knowledges as $k)
                        <tr class="hover:bg-gray-50/70 transition-colors">
                            <td class="py-4 px-6 font-bold text-gray-400 text-xs">
                                #{{ $k->order }}
                            </td>
                            <td class="py-4 px-6">
                                <span class="inline-block px-2.5 py-1 rounded-lg text-[11px] font-bold bg-neutral-100 text-neutral-800 border border-neutral-200">
                                    {{ $k->category }}
                                </span>
                            </td>
                            <td class="py-4 px-6 space-y-1.5">
                                <p class="font-bold text-gray-900 text-sm leading-snug">
                                    {{ $k->question }}
                                </p>
                                @if($k->keywords)
                                    <div class="flex flex-wrap gap-1">
                                        @foreach(array_slice(explode(',', $k->keywords), 0, 5) as $kw)
                                            <span class="text-[10px] bg-red-50 text-[#820003] font-medium px-2 py-0.5 rounded-md border border-red-100">
                                                {{ trim($kw) }}
                                            </span>
                                        @endforeach
                                        @if(count(explode(',', $k->keywords)) > 5)
                                            <span class="text-[10px] text-gray-400 self-center">
                                                +{{ count(explode(',', $k->keywords)) - 5 }} lagi
                                            </span>
                                        @endif
                                    </div>
                                @endif
                            </td>
                            <td class="py-4 px-6 text-xs text-gray-600">
                                <p class="line-clamp-3 leading-relaxed whitespace-pre-line">
                                    {{ $k->answer }}
                                </p>
                            </td>
                            <td class="py-4 px-6 text-center">
                                <span class="inline-block px-2.5 py-1 rounded-full text-xs font-black {{ $k->hit_count > 0 ? 'bg-green-50 text-green-800' : 'bg-gray-100 text-gray-400' }}">
                                    {{ $k->hit_count }}x
                                </span>
                            </td>
                            <td class="py-4 px-6 text-center">
                                <form action="{{ route('admin.bot-knowledges.toggle', $k->id) }}" method="POST">
                                    @csrf
                                    @method('PATCH')
                                    <button type="submit" class="px-2.5 py-1 rounded-full text-[11px] font-bold transition-all {{ $k->is_active ? 'bg-green-100 text-green-800 hover:bg-green-200' : 'bg-gray-200 text-gray-600 hover:bg-gray-300' }}" title="Klik untuk mengubah status aktif">
                                        {{ $k->is_active ? 'Aktif' : 'Nonaktif' }}
                                    </button>
                                </form>
                            </td>
                            <td class="py-4 px-6 text-right space-x-1.5 whitespace-nowrap">
                                <a href="{{ route('admin.bot-knowledges.edit', $k->id) }}" class="px-3 py-1.5 rounded-lg bg-blue-50 text-blue-700 hover:bg-blue-100 text-xs font-bold transition-colors inline-block">
                                    Edit
                                </a>
                                <form action="{{ route('admin.bot-knowledges.destroy', $k->id) }}" method="POST" class="inline-block" onsubmit="return confirm('Apakah Anda yakin ingin menghapus data pengetahuan ini?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="px-3 py-1.5 rounded-lg bg-red-50 text-red-700 hover:bg-red-100 text-xs font-bold transition-colors">
                                        Hapus
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="7" class="py-12 text-center text-gray-500 text-sm">
                                <p class="font-bold">Belum ada data pengetahuan bot.</p>
                                <p class="text-xs text-gray-400 mt-1">Klik tombol "+ Tambah Pengetahuan Baru" untuk mengisi basis data.</p>
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        @if($knowledges->hasPages())
            <div class="p-4 border-t border-gray-100">
                {{ $knowledges->links() }}
            </div>
        @endif
    </div>
</div>
@endsection

