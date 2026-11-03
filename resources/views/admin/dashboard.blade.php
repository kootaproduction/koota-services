@extends('layouts.admin')

@section('title', 'Dashboard Admin - KOOTA SERVICES')
@section('page_title', 'Dashboard Overview & Pengaturan')

@section('content')
    <div class="space-y-8">
        @if(session('success'))
            <div role="status" class="border border-green-200 bg-green-50 px-5 py-4 text-sm font-semibold text-green-800">
                {{ session('success') }}
            </div>
        @endif

        <!-- Maintenance Mode Control Panel (Point 9) -->
        <div class="bg-white p-6 sm:p-8 rounded-3xl border border-gray-200 shadow-sm space-y-6">
            <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4 border-b border-gray-100 pb-4">
                <div class="space-y-1">
                    <div class="flex items-center gap-2.5">
                        <h3 class="text-lg font-bold text-gray-900">Pengaturan Pemeliharaan Website (Maintenance Mode)</h3>
                        <span class="px-2.5 py-0.5 rounded-full text-xs font-bold {{ $isMaintenance ? 'bg-amber-100 text-amber-800' : 'bg-green-100 text-green-800' }}">
                            {{ $isMaintenance ? 'AKTIF (Pemeliharaan)' : 'NONAKTIF (Online)' }}
                        </span>
                    </div>
                    <p class="text-xs text-gray-500">
                        Ketika aktif, pengunjung luar tidak dapat melihat isi website dan akan melihat halaman pemberitahuan maintenance. Admin tetap dapat mengakses dashboard dan preview website.
                    </p>
                </div>
            </div>

            <form action="{{ route('admin.maintenance.toggle') }}" method="POST" class="space-y-4">
                @csrf
                <div class="space-y-2">
                    <label class="block text-xs font-bold text-gray-700 uppercase">Pesan Pemberitahuan untuk Pengunjung</label>
                    <input type="text" name="maintenance_message" value="{{ $maintenanceMessage }}" class="w-full px-4 py-3 rounded-xl border border-gray-300 focus:ring-2 focus:ring-[#820003] text-xs sm:text-sm">
                </div>

                <div class="flex flex-wrap items-center justify-between gap-4 pt-2">
                    <label class="flex items-center gap-3 cursor-pointer">
                        <input type="checkbox" name="is_maintenance" value="1" {{ $isMaintenance ? 'checked' : '' }} class="w-5 h-5 rounded text-[#820003] focus:ring-[#820003]">
                        <span class="text-xs sm:text-sm font-bold text-gray-800">
                            Aktifkan Maintenance Mode (Tutup Akses Publik Sementara)
                        </span>
                    </label>

                    <button type="submit" class="px-6 py-2.5 rounded-xl bg-[#820003] hover:bg-[#ba1a15] text-white font-bold text-xs sm:text-sm transition-all shadow-sm active:scale-95">
                        Simpan Status Pemeliharaan
                    </button>
                </div>
            </form>
        </div>

        <!-- Stat Cards Grid -->
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
            <!-- Stat 1: Total Konsultasi -->
            <div class="bg-white p-6 rounded-3xl border border-gray-100 shadow-2xs flex items-center gap-4">
                <div class="w-12 h-12 rounded-2xl bg-red-50 text-[#820003] flex items-center justify-center font-bold">
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
            <div class="bg-white p-6 rounded-3xl border border-gray-100 shadow-2xs flex items-center gap-4">
                <div class="w-12 h-12 rounded-2xl bg-red-50 text-[#820003] flex items-center justify-center font-bold">
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
            <div class="bg-white p-6 rounded-3xl border border-gray-100 shadow-2xs flex items-center gap-4">
                <div class="w-12 h-12 rounded-2xl bg-red-50 text-[#820003] flex items-center justify-center font-bold">
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
            <div class="bg-white p-6 rounded-3xl border border-gray-100 shadow-2xs flex items-center gap-4">
                <div class="w-12 h-12 rounded-2xl bg-red-50 text-[#820003] flex items-center justify-center font-bold">
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

        <!-- Chatbot Intelligence Quick Panel -->
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <div class="bg-white p-6 rounded-3xl border border-gray-100 shadow-2xs flex items-center justify-between">
                <div class="flex items-center gap-4">
                    <div class="w-12 h-12 rounded-2xl bg-neutral-100 text-[#820003] flex items-center justify-center font-bold">
                        <svg class="w-6 h-6 stroke-current" fill="none" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 10h.01M12 10h.01M16 10h.01M9 16H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-5l-5 5v-5z"/>
                        </svg>
                    </div>
                    <div>
                        <p class="text-xs font-bold text-gray-400 uppercase tracking-wider">Basis Pengetahuan Bot (Q&A)</p>
                        <p class="text-2xl font-black text-gray-900">{{ $totalBotKnowledges }} <span class="text-xs font-medium text-gray-500">Pertanyaan Database</span></p>
                    </div>
                </div>
                <a href="{{ route('admin.bot-knowledges.index') }}" class="px-4 py-2 rounded-xl bg-neutral-100 hover:bg-neutral-200 text-xs font-bold text-gray-800 transition-colors">
                    Kelola Q&A &rarr;
                </a>
            </div>

            <div class="bg-white p-6 rounded-3xl border border-gray-100 shadow-2xs flex items-center justify-between">
                <div class="flex items-center gap-4">
                    <div class="w-12 h-12 rounded-2xl {{ $unresolvedBotLogsCount > 0 ? 'bg-amber-100 text-amber-800' : 'bg-green-100 text-green-800' }} flex items-center justify-center font-bold">
                        <svg class="w-6 h-6 stroke-current" fill="none" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                        </svg>
                    </div>
                    <div>
                        <p class="text-xs font-bold text-gray-400 uppercase tracking-wider">Pertanyaan Bot Belum Terjawab</p>
                        <p class="text-2xl font-black {{ $unresolvedBotLogsCount > 0 ? 'text-amber-600' : 'text-green-700' }}">
                            {{ $unresolvedBotLogsCount }} <span class="text-xs font-medium text-gray-500">Perlu Jawaban</span>
                        </p>
                    </div>
                </div>
                <a href="{{ route('admin.bot-knowledges.logs', ['status' => 'unresolved']) }}" class="px-4 py-2 rounded-xl {{ $unresolvedBotLogsCount > 0 ? 'bg-amber-600 hover:bg-amber-700 text-white' : 'bg-neutral-100 hover:bg-neutral-200 text-gray-800' }} text-xs font-bold transition-colors">
                    Lihat Log Chat &rarr;
                </a>
            </div>
        </div>

        <!-- Before-After & Testimonials Quick Management Grid -->
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <div class="bg-white p-6 rounded-3xl border border-gray-100 shadow-2xs flex items-center justify-between">
                <div class="flex items-center gap-4">
                    <div class="w-12 h-12 rounded-2xl bg-neutral-100 text-[#820003] flex items-center justify-center font-bold">
                        <svg class="w-6 h-6 stroke-current" fill="none" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7h12m0 0l-4-4m4 4l-4 4m0 6H4m0 0l4 4m-4-4l4-4"/>
                        </svg>
                    </div>
                    <div>
                        <p class="text-xs font-bold text-gray-400 uppercase tracking-wider">Transformasi Before-After</p>
                        <p class="text-2xl font-black text-gray-900">{{ $totalTransformations }} <span class="text-xs font-medium text-gray-500">Studi Kasus Visual</span></p>
                    </div>
                </div>
                <a href="{{ route('admin.transformations.index') }}" class="px-4 py-2 rounded-xl bg-neutral-100 hover:bg-neutral-200 text-xs font-bold text-gray-800 transition-colors">
                    Kelola Foto &rarr;
                </a>
            </div>

            <div class="bg-white p-6 rounded-3xl border border-gray-100 shadow-2xs flex items-center justify-between">
                <div class="flex items-center gap-4">
                    <div class="w-12 h-12 rounded-2xl bg-neutral-100 text-amber-500 flex items-center justify-center font-bold">
                        <svg class="w-6 h-6 stroke-current" fill="none" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11.049 2.927c.3-.921 1.603-.921 1.902 0l1.519 4.674a1 1 0 00.95.69h4.915c.969 0 1.371 1.24.588 1.81l-3.976 2.888a1 1 0 00-.363 1.118l1.518 4.674c.3.922-.755 1.688-1.538 1.118l-3.976-2.888a1 1 0 00-1.176 0l-3.976 2.888c-.783.57-1.838-.197-1.538-1.118l1.518-4.674a1 1 0 00-.363-1.118l-3.976-2.888c-.784-.57-.38-1.81.588-1.81h4.914a1 1 0 00.951-.69l1.519-4.674z"/>
                        </svg>
                    </div>
                    <div>
                        <p class="text-xs font-bold text-gray-400 uppercase tracking-wider">Testimonial & Rating Klien</p>
                        <p class="text-2xl font-black text-gray-900">{{ $totalTestimonials }} <span class="text-xs font-medium text-gray-500">Ulasan Pelanggan</span></p>
                    </div>
                </div>
                <a href="{{ route('admin.testimonials.index') }}" class="px-4 py-2 rounded-xl bg-neutral-100 hover:bg-neutral-200 text-xs font-bold text-gray-800 transition-colors">
                    Kelola Ulasan &rarr;
                </a>
            </div>
        </div>

        <!-- Recent Consultations Table -->
        <div class="bg-white rounded-3xl border border-gray-100 shadow-2xs overflow-hidden">
            <div class="p-6 border-b border-gray-100 flex items-center justify-between">
                <div>
                    <h3 class="text-lg font-bold text-gray-900">Permintaan Konsultasi Terbaru</h3>
                    <p class="text-xs text-gray-500">Daftar calon klien yang mengisi form konsultasi website</p>
                </div>
                <a href="{{ route('admin.consultations.index') }}" class="text-xs font-bold text-[#820003] hover:underline">
                    Lihat Semua Konsultasi
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
