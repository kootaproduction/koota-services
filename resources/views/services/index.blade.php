@extends('layouts.app')

@section('title', 'Katalog Layanan - KOOTA SERVICES')

@section('content')
    <!-- Hero Section -->
    <section class="py-16 md:py-24 bg-[#fcf9f8] border-b border-gray-100">
        <div class="max-w-[1280px] mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 lg:grid-cols-12 gap-12 items-center">
                <!-- Left: Title & Subtitle -->
                <div class="lg:col-span-6 space-y-6">
                    <h1 class="text-4xl sm:text-5xl lg:text-6xl font-extrabold tracking-tight text-[#1c1b1b] leading-[1.1]">
                        {{ __('Layanan') }} <span class="text-[#820003]">Koota</span><br>
                        <span class="text-[#820003]">Services</span>
                    </h1>
                    <p class="text-base sm:text-lg text-gray-600 leading-relaxed max-w-xl">
                        {{ __('Solusi terpadu untuk kebutuhan perawatan fasilitas, manajemen limbah, dan perbaikan bangunan. Kami menyediakan layanan profesional dengan standar industri tertinggi untuk memastikan efisiensi dan kenyamanan aset properti Anda.') }}
                    </p>
                </div>

                <!-- Right: Hero Building Image -->
                <div class="lg:col-span-6">
                    <div class="rounded-3xl overflow-hidden shadow-2xl border border-gray-100 bg-white">
                        <img src="https://images.unsplash.com/photo-1486406146926-c627a92ad1ab?auto=format&fit=crop&w=1200&q=80" alt="KOOTA SERVICES Modern Facility Building" class="w-full h-[360px] sm:h-[420px] object-cover">
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Section: Katalog Layanan Komprehensif with 3D Elevated Timbul Icons (Image 2) -->
    <section class="py-20 bg-white border-b border-gray-100">
        <div class="max-w-[1280px] mx-auto px-4 sm:px-6 lg:px-8 space-y-16">
            <div class="text-center max-w-3xl mx-auto space-y-3">
                <h2 class="text-3xl sm:text-4xl font-extrabold text-[#1c1b1b] tracking-tight">
                    {{ __('Katalog Layanan Komprehensif') }}
                </h2>
                <p class="text-sm sm:text-base text-gray-600 leading-relaxed">
                    {{ __('Dedikasi kami untuk memberikan solusi terbaik dalam setiap aspek pengelolaan fasilitas dan kebersihan lingkungan operasional Anda.') }}
                </p>
            </div>

            <!-- Grid 4 Services with 3D Elevated Timbul Icon Badge (Image 2) -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">
                @foreach($services as $service)
                    <div class="bg-[#fcf9f8] rounded-3xl overflow-visible border border-gray-100 shadow-sm hover:shadow-xl transition-all duration-300 group flex flex-col justify-between hover:-translate-y-1">
                        <div>
                            <!-- Top Image (in separate overflow-hidden wrapper with rounded top) -->
                            <div class="h-48 overflow-hidden rounded-t-3xl relative bg-gray-100">
                                <img src="{{ $service->hero_image }}" alt="{{ $service->title }}" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500">
                            </div>
                            
                            <!-- 3D Timbul Elevated Icon Badge OUTSIDE overflow-hidden (Image 2) -->
                            <div class="relative -mt-7 ml-6 z-20">
                                <div class="w-14 h-14 rounded-2xl bg-white text-[#820003] flex items-center justify-center shadow-lg border border-gray-100 ring-4 ring-white group-hover:scale-110 group-hover:shadow-2xl transition-all duration-300">
                                    @if($service->slug === 'pengangkutan-sampah')
                                        <svg class="w-7 h-7 stroke-current text-[#22c55e]" fill="none" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15"/>
                                        </svg>
                                    @elseif($service->slug === 'ipal')
                                        <svg class="w-7 h-7 stroke-current text-[#820003]" fill="none" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19.428 15.428a2 2 0 00-1.022-.547l-2.387-.477a6 6 0 00-3.86.517l-.318.158a6 6 0 01-3.86.517L6.05 15.21a2 2 0 00-1.806.547M8 4h8l-1 1v5.172a2 2 0 00.586 1.414l5 5c1.26 1.26.367 3.414-1.415 3.414H4.828c-1.782 0-2.674-2.154-1.414-3.414l5-5A2 2 0 009 10.172V5L8 4z"/>
                                        </svg>
                                    @elseif($service->slug === 'jasa-tukang-perbaikan-dan-renovasi' || $service->slug === 'jasa-tukang')
                                        <svg class="w-7 h-7 stroke-current text-[#820003]" fill="none" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 4a2 2 0 114 0v1a1 1 0 001 1h3a1 1 0 011 1v3a1 1 0 01-1 1h-1a2 2 0 100 4h1a1 1 0 011 1v3a1 1 0 01-1 1h-3a1 1 0 01-1-1v-1a2 2 0 10-4 0v1a1 1 0 01-1 1H7a1 1 0 01-1-1v-3a1 1 0 00-1-1H4a2 2 0 110-4h1a1 1 0 001-1V7a1 1 0 011-1h3a1 1 0 001-1V4z"/>
                                        </svg>
                                    @else
                                        <svg class="w-7 h-7 stroke-current text-[#820003]" fill="none" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 3v4M3 5h4M6 17v4m-2-2h4m5-16l2.286 6.857L21 12l-5.714 2.143L13 21l-2.286-6.857L5 12l5.714-2.143L13 3z"/>
                                        </svg>
                                    @endif
                                </div>
                            </div>

                            <!-- Content -->
                            <div class="p-6 pt-3 space-y-3">
                                <h3 class="text-lg font-bold text-[#1c1b1b] group-hover:text-[#820003] transition-colors leading-snug">
                                    {{ __($service->title) }}
                                </h3>
                                <p class="text-xs text-gray-600 leading-relaxed line-clamp-3">
                                    {{ __($service->subtitle ?? $service->description) }}
                                </p>
                            </div>
                        </div>

                        <!-- Action Link -->
                        <div class="px-6 pb-6 pt-2">
                            <a href="{{ route('services.show', $service->slug) }}" class="inline-flex items-center gap-1.5 text-xs font-bold text-[#820003] hover:text-[#ba1a15] transition-colors group-hover:translate-x-1 transition-transform">
                                <span>{{ __('Pelajari Lebih Lanjut') }}</span>
                                <span>→</span>
                            </a>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    <!-- Section: Proses Layanan (6 Steps Workflow) -->
    <section class="py-20 bg-[#fcf9f8] border-b border-gray-100">
        <div class="max-w-[1280px] mx-auto px-4 sm:px-6 lg:px-8 space-y-16">
            <div class="text-center max-w-3xl mx-auto space-y-3">
                <h2 class="text-3xl sm:text-4xl font-extrabold text-[#1c1b1b] tracking-tight">
                    {{ __('Proses Layanan') }}
                </h2>
                <p class="text-sm sm:text-base text-gray-600 leading-relaxed">
                    {{ __('Alur kerja profesional kami untuk memastikan setiap kebutuhan fasilitas Anda tertangani secara standar, presisi, dan terukur.') }}
                </p>
            </div>

            <!-- Grid 6 Cards -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                <!-- Step 01 -->
                <div class="bg-white rounded-2xl p-7 border border-gray-100 shadow-xs hover:shadow-md transition-all space-y-3">
                    <span class="text-2xl font-black text-[#820003] block">01</span>
                    <h3 class="text-lg font-bold text-gray-900">{{ __('Konsultasi & Assessment') }}</h3>
                    <p class="text-xs sm:text-sm text-gray-600 leading-relaxed">
                        {{ __('Pahami dan inventarisasi kebutuhan, jenis layanan, lokasi, serta skala pekerjaan melalui sesi konsultasi bersama konsultan teknis kami.') }}
                    </p>
                </div>

                <!-- Step 02 -->
                <div class="bg-white rounded-2xl p-7 border border-gray-100 shadow-xs hover:shadow-md transition-all space-y-3">
                    <span class="text-2xl font-black text-[#820003] block">02</span>
                    <h3 class="text-lg font-bold text-gray-900">{{ __('Survey Lapangan') }}</h3>
                    <p class="text-xs sm:text-sm text-gray-600 leading-relaxed">
                        {{ __('Tim teknisi Koota Services mendatangi lokasi di Surabaya, Malang, Bali, atau Jakarta untuk mengevaluasi volume pekerjaan secara langsung.') }}
                    </p>
                </div>

                <!-- Step 03 -->
                <div class="bg-white rounded-2xl p-7 border border-gray-100 shadow-xs hover:shadow-md transition-all space-y-3">
                    <span class="text-2xl font-black text-[#820003] block">03</span>
                    <h3 class="text-lg font-bold text-gray-900">{{ __('Penyusunan Solusi & Estimasi') }}</h3>
                    <p class="text-xs sm:text-sm text-gray-600 leading-relaxed">
                        {{ __('Kami merumuskan rencana aksi spesifik, alokasi tenaga ahli, peralatan modern, dan estimasi penawaran yang transparan.') }}
                    </p>
                </div>

                <!-- Step 04 -->
                <div class="bg-white rounded-2xl p-7 border border-gray-100 shadow-xs hover:shadow-md transition-all space-y-3">
                    <span class="text-2xl font-black text-[#820003] block">04</span>
                    <h3 class="text-lg font-bold text-gray-900">{{ __('Penjadwalan & Persiapan') }}</h3>
                    <p class="text-xs sm:text-sm text-gray-600 leading-relaxed">
                        {{ __('Penetapan jadwal pengerjaan yang fleksibel agar tidak mengganggu rutinitas operasional bisnis atau kenyamanan hunian Anda.') }}
                    </p>
                </div>

                <!-- Step 05 -->
                <div class="bg-white rounded-2xl p-7 border border-gray-100 shadow-xs hover:shadow-md transition-all space-y-3">
                    <span class="text-2xl font-black text-[#820003] block">05</span>
                    <h3 class="text-lg font-bold text-gray-900">{{ __('Eksekusi Profesional') }}</h3>
                    <p class="text-xs sm:text-sm text-gray-600 leading-relaxed">
                        {{ __('Pengerjaan sesuai SOP industri dengan pengawasan supervisor lapangan untuk menjamin kebersihan dan hasil terbaik.') }}
                    </p>
                </div>

                <!-- Step 06 -->
                <div class="bg-white rounded-2xl p-7 border border-gray-100 shadow-xs hover:shadow-md transition-all space-y-3">
                    <span class="text-2xl font-black text-[#820003] block">06</span>
                    <h3 class="text-lg font-bold text-gray-900">{{ __('Quality Control & Serah Terima') }}</h3>
                    <p class="text-xs sm:text-sm text-gray-600 leading-relaxed">
                        {{ __('Pemeriksaan hasil akhir bersama klien untuk memastikan kepuasan menyeluruh dan jaminan garansi layanan.') }}
                    </p>
                </div>
            </div>

            <!-- CTA Bottom -->
            <div class="text-center pt-4">
                <a href="{{ route('consultation.index') }}" class="inline-flex items-center gap-2 px-8 py-3.5 rounded-xl bg-[#820003] hover:bg-[#ba1a15] text-white font-bold text-sm shadow-md active:scale-95 transition-all">
                    <span>{{ __('Mulai Konsultasi Kebutuhan Anda Sekarang') }}</span>
                    <span>&rarr;</span>
                </a>
            </div>
        </div>
    </section>
@endsection
