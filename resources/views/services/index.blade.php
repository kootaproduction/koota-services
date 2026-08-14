@extends('layouts.app')

@section('title', 'Layanan Koota Service - Solusi Fasilitas & Lingkungan')

@section('content')
    <!-- Hero Section -->
    <section class="py-16 md:py-24 bg-[#fcf9f8] border-b border-gray-100">
        <div class="max-w-[1280px] mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 lg:grid-cols-12 gap-12 items-center">
                <!-- Left: Title & Subtitle -->
                <div class="lg:col-span-6 space-y-6">
                    <h1 class="text-4xl sm:text-5xl lg:text-6xl font-bold tracking-tight text-[#1c1b1b] leading-[1.1]">
                        Layanan <span class="text-[#820003]">Koota</span><br>
                        <span class="text-[#820003]">Service</span>
                    </h1>
                    <p class="text-base sm:text-lg text-gray-600 leading-relaxed max-w-xl">
                        Solusi terpadu untuk kebutuhan perawatan fasilitas dan manajemen lingkungan yang berkelanjutan. Kami menyediakan layanan profesional dengan standar industri tertinggi untuk memastikan efisiensi dan keamanan operasional Anda.
                    </p>
                </div>

                <!-- Right: Hero Building Image -->
                <div class="lg:col-span-6">
                    <div class="rounded-2xl overflow-hidden shadow-xl border border-gray-100 bg-white">
                        <img src="https://images.unsplash.com/photo-1486406146926-c627a92ad1ab?auto=format&fit=crop&w=1200&q=80" alt="KOOTA SERVICE Modern Facility Building" class="w-full h-[360px] sm:h-[420px] object-cover">
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Section: Katalog Layanan Komprehensif -->
    <section class="py-20 bg-white border-b border-gray-100">
        <div class="max-w-[1280px] mx-auto px-4 sm:px-6 lg:px-8 space-y-16">
            <div class="text-center max-w-3xl mx-auto space-y-3">
                <h2 class="text-3xl sm:text-4xl font-bold text-[#1c1b1b] tracking-tight">
                    Katalog Layanan Komprehensif
                </h2>
                <p class="text-sm sm:text-base text-gray-600 leading-relaxed">
                    Dedikasi kami untuk memberikan solusi terbaik dalam setiap aspek pengelolaan fasilitas dan lingkungan operasional Anda.
                </p>
            </div>

            <!-- Grid 4 Services -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 sm:gap-8">
                @foreach($services as $service)
                    <div class="bg-[#fcf9f8] rounded-2xl overflow-hidden border border-gray-100 shadow-sm hover:shadow-md transition-all group flex flex-col justify-between">
                        <div>
                            <!-- Service Image -->
                            <div class="h-44 sm:h-48 overflow-hidden relative bg-gray-200">
                                <img src="{{ $service->hero_image }}" alt="{{ $service->title }}" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500">
                                
                                <!-- Category Icon Badge -->
                                <div class="absolute -bottom-4 left-6">
                                    <div class="w-9 h-9 rounded-lg flex items-center justify-center shadow-md {{ $service->category === 'sustainability' ? 'bg-[#80f98b] text-[#007327]' : 'bg-red-50 text-[#ac0c0c]' }}">
                                        @if($service->slug === 'pengangkutan-sampah')
                                            <svg class="w-4 h-4 stroke-current" fill="none" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15"/>
                                            </svg>
                                        @elseif($service->slug === 'ipal')
                                            <svg class="w-4 h-4 stroke-current" fill="none" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19.428 15.428a2 2 0 00-1.022-.547l-2.387-.477a6 6 0 00-3.86.517l-.318.158a6 6 0 01-3.86.517L6.05 15.21a2 2 0 00-1.806.547M8 4h8l-1 1v5.172a2 2 0 00.586 1.414l5 5c1.26 1.26.367 3.414-1.415 3.414H4.828c-1.782 0-2.674-2.154-1.414-3.414l5-5A2 2 0 009 10.172V5L8 4z"/>
                                            </svg>
                                        @elseif($service->slug === 'jasa-tukang-perbaikan-dan-renovasi' || $service->slug === 'jasa-tukang')
                                            <svg class="w-4 h-4 stroke-current" fill="none" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 4a2 2 0 114 0v1a1 1 0 001 1h3a1 1 0 011 1v3a1 1 0 01-1 1h-1a2 2 0 100 4h1a1 1 0 011 1v3a1 1 0 01-1 1h-3a1 1 0 01-1-1v-1a2 2 0 10-4 0v1a1 1 0 01-1 1H7a1 1 0 01-1-1v-3a1 1 0 00-1-1H4a2 2 0 110-4h1a1 1 0 001-1V7a1 1 0 011-1h3a1 1 0 001-1V4z"/>
                                            </svg>
                                        @else
                                            <svg class="w-4 h-4 stroke-current" fill="none" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 3v4M3 5h4M6 17v4m-2-2h4m5-16l2.286 6.857L21 12l-5.714 2.143L13 21l-2.286-6.857L5 12l5.714-2.143L13 3z"/>
                                            </svg>
                                        @endif
                                    </div>
                                </div>
                            </div>

                            <!-- Content -->
                            <div class="p-6 pt-7 space-y-3">
                                <h3 class="text-lg font-bold text-[#1c1b1b] group-hover:text-[#820003] transition-colors leading-snug">
                                    {{ $service->title }}
                                </h3>
                                <p class="text-xs text-gray-600 leading-relaxed line-clamp-3">
                                    {{ $service->subtitle ?? $service->description }}
                                </p>
                            </div>
                        </div>

                        <!-- Action Link -->
                        <div class="px-6 pb-6 pt-2">
                            <a href="{{ route('services.show', $service->slug) }}" class="inline-flex items-center gap-1.5 text-xs font-bold transition-colors group-hover:translate-x-0.5 transition-transform {{ $service->category === 'sustainability' ? 'text-[#007327] hover:text-[#00531a]' : 'text-[#820003] hover:text-[#ba1a15]' }}">
                                <span>Pelajari Lebih Lanjut</span>
                                <span>→</span>
                            </a>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    <!-- Section: Proses Layanan (6 Steps) -->
    <section class="py-20 bg-[#fcf9f8] border-b border-gray-100">
        <div class="max-w-[1280px] mx-auto px-4 sm:px-6 lg:px-8 space-y-16">
            <div class="text-center max-w-3xl mx-auto space-y-3">
                <h2 class="text-3xl sm:text-4xl font-bold text-[#1c1b1b] tracking-tight">
                    Proses Layanan
                </h2>
                <p class="text-sm sm:text-base text-gray-600 leading-relaxed">
                    Alur kerja profesional kami untuk memastikan setiap kebutuhan fasilitas Anda tertangani secara standar dan terukur.
                </p>
            </div>

            <!-- Grid 6 Cards (2 Rows of 3) -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                <!-- Step 01 -->
                <div class="bg-white rounded-2xl p-7 border border-gray-100 shadow-xs hover:shadow-md transition-all space-y-4">
                    <span class="text-2xl font-black text-[#820003] block">
                        01
                    </span>
                    <h3 class="text-lg font-bold text-gray-900">
                        Konsultasi
                    </h3>
                    <p class="text-xs sm:text-sm text-gray-600 leading-relaxed">
                        Pahami dan inventarisasi kebutuhan, jenis layanan, lokasi, serta skala pekerjaan yang Anda butuhkan melalui sesi konsultasi.
                    </p>
                </div>

                <!-- Step 02 -->
                <div class="bg-white rounded-2xl p-7 border border-gray-100 shadow-xs hover:shadow-md transition-all space-y-4">
                    <span class="text-2xl font-black text-[#820003] block">
                        02
                    </span>
                    <h3 class="text-lg font-bold text-gray-900">
                        Assessment
                    </h3>
                    <p class="text-xs sm:text-sm text-gray-600 leading-relaxed">
                        Tim KOOTA SERVICE mendatangi dan menganalisis lokasi, menyelidiki tugas, termasuk estimasi volume, tingkat kebersihan, volume pekerjaan, serta kebutuhan khusus yang diperlukan.
                    </p>
                </div>

                <!-- Step 03 -->
                <div class="bg-white rounded-2xl p-7 border border-gray-100 shadow-xs hover:shadow-md transition-all space-y-4">
                    <span class="text-2xl font-black text-[#820003] block">
                        03
                    </span>
                    <h3 class="text-lg font-bold text-gray-900">
                        Menentukan Kebutuhan
                    </h3>
                    <p class="text-xs sm:text-sm text-gray-600 leading-relaxed">
                        Berdasarkan hasil assessment, tim merumuskan solusi yang tepat: lingkup pekerjaan, kebutuhan tenaga, peralatan, material, serta estimasi tenggat waktu yang sesuai.
                    </p>
                </div>

                <!-- Step 04 -->
                <div class="bg-white rounded-2xl p-7 border border-gray-100 shadow-xs hover:shadow-md transition-all space-y-4">
                    <span class="text-2xl font-black text-[#820003] block">
                        04
                    </span>
                    <h3 class="text-lg font-bold text-gray-900">
                        Penjadwalan
                    </h3>
                    <p class="text-xs sm:text-sm text-gray-600 leading-relaxed">
                        Setelah kesepakatan rencana assessment, kami menentukan jadwal kerja operasional layanan yang sesuai dengan kesepakatan dan operasional pelanggan.
                    </p>
                </div>

                <!-- Step 05 -->
                <div class="bg-white rounded-2xl p-7 border border-gray-100 shadow-xs hover:shadow-md transition-all space-y-4">
                    <span class="text-2xl font-black text-[#820003] block">
                        05
                    </span>
                    <h3 class="text-lg font-bold text-gray-900">
                        Pengangkutan / Pengerjaan
                    </h3>
                    <p class="text-xs sm:text-sm text-gray-600 leading-relaxed">
                        Tim KOOTA SERVICE menerjunkan tenaga terlatih dan peralatan yang tepat disepakati. Untuk pengangkutan sampah dilakukan sesuai jadwal rutin dan pengangkutan penanganan layanan lainnya menyelesaikan pekerjaan.
                    </p>
                </div>

                <!-- Step 06 -->
                <div class="bg-white rounded-2xl p-7 border border-gray-100 shadow-xs hover:shadow-md transition-all space-y-4">
                    <span class="text-2xl font-black text-[#820003] block">
                        06
                    </span>
                    <h3 class="text-lg font-bold text-gray-900">
                        Selesai
                    </h3>
                    <p class="text-xs sm:text-sm text-gray-600 leading-relaxed">
                        Seluruh pekerjaan atau layanan selesai, kemudian dilakukan quality check untuk memastikan kebutuhan pelanggan telah ditangani sesuai kesepakatan.
                    </p>
                </div>
            </div>
        </div>
    </section>

    <!-- Section: FAQ Accordion -->
    <section class="py-20 bg-white">
        <div class="max-w-[1280px] mx-auto px-4 sm:px-6 lg:px-8 space-y-12">
            <div class="text-center max-w-3xl mx-auto space-y-3">
                <h2 class="text-3xl sm:text-4xl font-bold text-[#1c1b1b] tracking-tight">
                    — Temukan Jawabannya di Sini!
                </h2>
                <p class="text-sm sm:text-base text-gray-600 leading-relaxed">
                    Kami merangkum beberapa hal yang sering ditanyakan. Jika ada hal yang ingin Anda tanyakan, jangan ragu untuk berdiskusi dengan tim kami di sini.
                </p>
            </div>

            <div class="grid grid-cols-1 lg:grid-cols-12 gap-10 items-start">
                <!-- Left: FAQ Accordion -->
                <div class="lg:col-span-8 space-y-4" x-data="{ activeFaq: 1 }">
                    @foreach($faqs as $faq)
                        <div class="border-b border-gray-200 pb-4">
                            <button @click="activeFaq = (activeFaq === {{ $faq->id }} ? null : {{ $faq->id }})" class="w-full flex items-center justify-between py-3 text-left focus:outline-none group">
                                <span class="text-base sm:text-lg font-bold text-gray-900 group-hover:text-[#820003] transition-colors">
                                    0{{ $loop->iteration }} {{ $faq->question }}
                                </span>
                                <svg class="w-5 h-5 text-gray-400 transition-transform duration-200" :class="{ 'rotate-180 text-[#820003]': activeFaq === {{ $faq->id }} }" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/>
                                </svg>
                            </button>
                            <div x-show="activeFaq === {{ $faq->id }}" x-collapse class="mt-2 text-xs sm:text-sm text-gray-600 leading-relaxed pr-6">
                                {{ $faq->answer }}
                            </div>
                        </div>
                    @endforeach
                </div>

                <!-- Right: Ask Expert Box -->
                <div class="lg:col-span-4">
                    <div class="bg-[#fcf9f8] p-8 rounded-2xl border border-gray-200 text-center space-y-5 shadow-xs">
                        <h3 class="text-xl sm:text-2xl font-bold text-gray-900 leading-tight">
                            Punya pertanyaan lain?
                        </h3>
                        <p class="text-xs sm:text-sm text-gray-600 leading-relaxed">
                            Tim kami siap membantu Anda! Hubungi kami langsung untuk konsultasi gratis dan solusi terbaik sesuai kebutuhan Anda.
                        </p>
                        <div class="pt-2">
                            <a href="{{ route('consultation.index') }}" class="w-full inline-block py-3 rounded-lg bg-[#28a745] hover:bg-[#218838] text-white font-semibold text-sm transition-all shadow-sm active:scale-95">
                                Tanya Ahlinya!
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
