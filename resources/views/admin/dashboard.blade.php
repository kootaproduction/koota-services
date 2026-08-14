@extends('layouts.admin')

@section('title', 'Dashboard Admin - KOOTA SERVICE')
@section('page_title', 'Dashboard Overview')

@section('content')
    <div class="space-y-8">
        <!-- Stat Cards Grid -->
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
            <!-- Stat 1: Total Konsultasi -->
            <div class="bg-white p-6 rounded-2xl border border-gray-100 shadow-2xs flex items-center gap-4">
                <div class="w-12 h-12 rounded-xl bg-red-50 text-[#820003] flex items-center justify-center font-bold">
                    <svg class="w-6 h-6 stroke-current" fill="none" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                    </svg>
                </div>
                <div>
                    <p class="text-xs font-bold text-gray-400 uppercase tracking-wider">Konsultasi Masuk</p>
                    <p class="text-2xl font-black text-gray-900">{{ $totalConsultations }}</p>
                </div>
            </div>

            <!-- Stat 2: Total Layanan -->
            <div class="bg-white p-6 rounded-2xl border border-gray-100 shadow-2xs flex items-center gap-4">
                <div class="w-12 h-12 rounded-xl bg-blue-50 text-blue-700 flex items-center justify-center font-bold">
                    <svg class="w-6 h-6 stroke-current" fill="none" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"/>
                    </svg>
                </div>
                <div>
                    <p class="text-xs font-bold text-gray-400 uppercase tracking-wider">Total Layanan</p>
                    <p class="text-2xl font-black text-gray-900">{{ $totalServices }}</p>
                </div>
            </div>

            <!-- Stat 3: Total Projects -->
            <div class="bg-white p-6 rounded-2xl border border-gray-100 shadow-2xs flex items-center gap-4">
                <div class="w-12 h-12 rounded-xl bg-purple-50 text-purple-700 flex items-center justify-center font-bold">
                    <svg class="w-6 h-6 stroke-current" fill="none" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                    </svg>
                </div>
                <div>
                    <p class="text-xs font-bold text-gray-400 uppercase tracking-wider">Total Projects</p>
                    <p class="text-2xl font-black text-gray-900">{{ $totalProjects }}</p>
                </div>
            </div>

            <!-- Stat 4: Total Posts -->
            <div class="bg-white p-6 rounded-2xl border border-gray-100 shadow-2xs flex items-center gap-4">
                <div class="w-12 h-12 rounded-xl bg-green-50 text-[#007327] flex items-center justify-center font-bold">
                    <svg class="w-6 h-6 stroke-current" fill="none" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9a2 2 0 00-2-2h-2m-4-3H9M7 16h6M7 8h6v4H7V8z"/>
                    </svg>
                </div>
                <div>
                    <p class="text-xs font-bold text-gray-400 uppercase tracking-wider">Artikel Blog</p>
                    <p class="text-2xl font-black text-gray-900">{{ $totalPosts }}</p>
                </div>
            </div>
        </div>

        <!-- Recent Consultations Table -->
        <div class="bg-white rounded-2xl border border-gray-100 shadow-2xs overflow-hidden">
            <div class="p-6 border-b border-gray-100 flex items-center justify-between">
                <div>
                    <h3 class="text-lg font-bold text-gray-900">Permintaan Konsultasi Terbaru</h3>
                    <p class="text-xs text-gray-500">Daftar calon klien yang mengisi form konsultasi website</p>
                </div>
                <a href="{{ route('admin.consultations.index') }}" class="text-xs font-bold text-[#820003] hover:underline">
                    Lihat Semua Konsultasi →
                </a>
            </div>

            <div class="overflow-x-auto">
                <table class="w-full text-left border-collapse">
                    <thead>
                        <tr class="bg-[#fcf9f8] border-b border-gray-100 text-xs font-bold text-gray-400 uppercase">
                            <th class="py-3.5 px-6">Layanan</th>
                            <th class="py-3.5 px-6">Nama Pelanggan</th>
                            <th class="py-3.5 px-6">No. WhatsApp</th>
                            <th class="py-3.5 px-6">Properti & Lokasi</th>
                            <th class="py-3.5 px-6">Status</th>
                            <th class="py-3.5 px-6 text-right">Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-100 text-xs text-gray-700">
                        @forelse($recentConsultations as $c)
                            <tr class="hover:bg-gray-50 transition-colors">
                                <td class="py-4 px-6 font-bold text-gray-900">
                                    <span class="px-2.5 py-1 rounded-full bg-red-50 text-[#820003] text-[11px] font-semibold">
                                        {{ $c->service_type }}
                                    </span>
                                </td>
                                <td class="py-4 px-6">
                                    <p class="font-semibold text-gray-900">{{ $c->name }}</p>
                                    <p class="text-[11px] text-gray-400">{{ $c->email }}</p>
                                </td>
                                <td class="py-4 px-6 font-mono">
                                    {{ $c->whatsapp }}
                                </td>
                                <td class="py-4 px-6">
                                    {{ $c->property_type }} ({{ $c->location }})
                                </td>
                                <td class="py-4 px-6">
                                    @if($c->status === 'Pending')
                                        <span class="px-2.5 py-1 rounded-full bg-amber-50 text-amber-800 text-[11px] font-bold">Pending</span>
                                    @elseif($c->status === 'Diproses')
                                        <span class="px-2.5 py-1 rounded-full bg-blue-50 text-blue-800 text-[11px] font-bold">Diproses</span>
                                    @else
                                        <span class="px-2.5 py-1 rounded-full bg-green-50 text-green-800 text-[11px] font-bold">Selesai</span>
                                    @endif
                                </td>
                                <td class="py-4 px-6 text-right">
                                    <a href="{{ route('admin.consultations.show', $c->id) }}" class="px-3 py-1.5 rounded-lg bg-gray-100 hover:bg-gray-200 text-xs font-semibold text-gray-800 transition-colors">
                                        Detail
                                    </a>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="6" class="py-8 text-center text-gray-400 text-xs">Belum ada data konsultasi masuk.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
