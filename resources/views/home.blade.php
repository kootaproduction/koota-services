@extends('layouts.app')

@section('title', 'KOOTA SERVICES - Kita Wujudkan Kota Bersih')

@section('content')
    <!-- Hero Section -->
    <section class="relative bg-[#fcf9f8] py-16 md:py-24 overflow-hidden border-b border-gray-100">
        <div class="max-w-[1280px] mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 lg:grid-cols-12 gap-12 items-center">
                <!-- Left Column -->
                <div class="lg:col-span-6 space-y-6">
                    <h1 class="text-4xl sm:text-5xl lg:text-6xl font-extrabold text-[#1c1b1b] tracking-tight leading-[1.1]">
                        {{ __('Kita Wujudkan') }} <br>
                        <span class="text-[#820003]">{{ __('Kota Bersih') }}</span>
                    </h1>
                    <p class="text-base sm:text-lg text-gray-600 leading-relaxed max-w-xl">
                        {{ __('Solusi terintegrasi untuk properti Anda. Dari layanan kebersihan profesional, manajemen limbah, hingga perbaikan dan renovasi bangunan dengan standar kualitas industri terpercaya.') }}
                    </p>
                    <div class="pt-2 flex flex-wrap gap-4 items-center">
                        <a href="{{ route('consultation.index') }}" class="px-7 py-3.5 rounded-xl bg-[#820003] hover:bg-[#ba1a15] text-white font-bold text-sm sm:text-base transition-all shadow-md flex items-center gap-2 group active:scale-95">
                            <span>{{ __('Konsultasi Sekarang') }}</span>
                            <svg class="w-4 h-4 group-hover:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"/>
                            </svg>
                        </a>
                        <a href="{{ route('services.index') }}" class="px-7 py-3.5 rounded-xl bg-white border border-gray-200 hover:bg-gray-50 text-gray-800 font-bold text-sm sm:text-base transition-colors shadow-2xs">
                            {{ __('Lihat Layanan') }}
                        </a>
                    </div>
                </div>

                <!-- Right Column: Hero Image with Floating Badge -->
                <div class="lg:col-span-6 relative">
                    <div class="relative rounded-3xl overflow-hidden shadow-2xl border border-gray-100 bg-white">
                        <img src="https://images.unsplash.com/photo-1486406146926-c627a92ad1ab?auto=format&fit=crop&w=1200&q=80" alt="KOOTA SERVICES Facility Management" class="w-full h-[380px] sm:h-[460px] object-cover">
                        
                        <!-- Floating Badge -->
                        <div class="absolute bottom-6 left-6 bg-white/95 backdrop-blur-md p-4 rounded-2xl shadow-xl border border-gray-100 flex items-center gap-3">
                            <div class="w-11 h-11 rounded-xl bg-red-50 text-[#820003] flex items-center justify-center font-bold">
                                <svg class="w-6 h-6 stroke-current" fill="none" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"/>
                                </svg>
                            </div>
                            <div>
                                <p class="text-[10px] font-bold text-[#820003] uppercase tracking-wider">{{ __('Layanan Terpercaya') }}</p>
                                <p class="text-xs sm:text-sm font-extrabold text-gray-900">{{ __('4 Layanan Terpadu & Profesional') }}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Section 2: Layanan Utama Kami with 3D Elevated / Timbul Icons (Image 2) -->
    <section id="layanan-utama" class="py-20 bg-white border-b border-gray-100">
        <div class="max-w-[1280px] mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center max-w-3xl mx-auto space-y-3 mb-16">
                <h2 class="text-3xl sm:text-4xl font-extrabold text-[#1c1b1b] tracking-tight">
                    {{ __('Layanan Utama Kami') }}
                </h2>
                <p class="text-sm sm:text-base text-gray-600">
                    {{ __('Solusi terpadu dan tersertifikasi untuk merawat kebersihan, perbaikan, dan keberlanjutan fasilitas Anda.') }}
                </p>
            </div>

            <!-- Service Cards Grid with Elevated Timbul 3D Badge (Image 2) -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">
                @foreach($services as $service)
                    <div class="bg-[#fcf9f8] rounded-3xl overflow-visible border border-gray-100 shadow-sm hover:shadow-xl transition-all duration-300 group flex flex-col justify-between hover:-translate-y-1">
                        <div>
                            <!-- Top Image in its own overflow-hidden container with rounded-t-3xl -->
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

                        <div class="px-6 pb-6 pt-2">
                            <a href="{{ route('services.show', $service->slug) }}" class="inline-flex items-center gap-1.5 text-xs font-bold text-[#820003] hover:text-[#ba1a15] transition-colors group-hover:translate-x-1 transition-transform">
                                <span>{{ __('Pelajari Selengkapnya') }}</span>
                                <span>→</span>
                            </a>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    <!-- Section 3: Mitra Terpercaya -->
    <section class="py-20 bg-[#fcf9f8] border-b border-gray-100">
        <div class="max-w-[1280px] mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 lg:grid-cols-12 gap-12 items-center">
                <!-- Left: Team Photo -->
                <div class="lg:col-span-6">
                    <div class="rounded-3xl overflow-hidden shadow-xl border border-gray-100 bg-white">
                        <img src="https://images.unsplash.com/photo-1522071820081-009f0129c71c?auto=format&fit=crop&w=1000&q=80" alt="Tim Profesional KOOTA SERVICES" class="w-full h-[400px] object-cover">
                    </div>
                </div>

                <!-- Right: Content -->
                <div class="lg:col-span-6 space-y-6">
                    <div>
                        <span class="text-[11px] font-bold uppercase tracking-widest text-[#820003] block">
                            {{ __('TENTANG KOOTA SERVICES') }}
                        </span>
                        <h2 class="text-3xl sm:text-4xl font-extrabold text-[#1c1b1b] tracking-tight mt-1 leading-snug">
                            {{ __('Mitra Terpercaya untuk Solusi Properti & Lingkungan') }}
                        </h2>
                    </div>

                    <p class="text-xs sm:text-sm text-gray-600 leading-relaxed">
                        {{ __('Koota Services berkomitmen untuk menghadirkan standar baru dalam pengelolaan fasilitas di Surabaya, Malang, Bali, dan Jakarta. Dengan semangat "Kita Wujudkan Kota Bersih", kami mengintegrasikan berbagai layanan teknis dan kebersihan untuk memberikan kenyamanan maksimal bagi klien kami.') }}
                    </p>

                    <!-- Checkmarks List -->
                    <div class="space-y-3 pt-2">
                        <div class="flex items-center gap-3">
                            <div class="w-5 h-5 rounded-full bg-red-50 text-[#820003] flex items-center justify-center font-bold text-xs shrink-0">
                                ✓
                            </div>
                            <span class="text-xs sm:text-sm font-semibold text-gray-800">{{ __('Tim Profesional, Terlatih & Berpengalaman') }}</span>
                        </div>
                        <div class="flex items-center gap-3">
                            <div class="w-5 h-5 rounded-full bg-red-50 text-[#820003] flex items-center justify-center font-bold text-xs shrink-0">
                                ✓
                            </div>
                            <span class="text-xs sm:text-sm font-semibold text-gray-800">{{ __('Layanan Terintegrasi Satu Pintu (One-Stop Facility Services)') }}</span>
                        </div>
                        <div class="flex items-center gap-3">
                            <div class="w-5 h-5 rounded-full bg-red-50 text-[#820003] flex items-center justify-center font-bold text-xs shrink-0">
                                ✓
                            </div>
                            <span class="text-xs sm:text-sm font-semibold text-gray-800">{{ __('Standar Baku Mutu & Kualitas Terstandarisasi') }}</span>
                        </div>
                    </div>

                    <div class="pt-4">
                        <a href="{{ route('about') }}" class="px-7 py-3.5 rounded-xl bg-[#820003] hover:bg-[#ba1a15] text-white font-bold text-xs sm:text-sm transition-all shadow-sm inline-block active:scale-95">
                            {{ __('Baca Lebih Lanjut') }}
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Section 4: Banner CTA Red Box with Updated WhatsApp Link -->
    <section class="py-16 bg-[#fcf9f8] border-b border-gray-100">
        <div class="max-w-[1280px] mx-auto px-4 sm:px-6 lg:px-8">
            <div class="relative bg-[#820003] rounded-3xl p-8 sm:p-12 overflow-hidden text-white shadow-2xl">
                <div class="grid grid-cols-1 lg:grid-cols-12 gap-8 items-center relative z-10">
                    <div class="lg:col-span-8 space-y-4">
                        <h3 class="text-2xl sm:text-3xl font-extrabold tracking-tight">
                            {{ __('Butuh Solusi Perawatan Fasilitas & Lingkungan?') }}
                        </h3>
                        <p class="text-red-100 text-xs sm:text-sm max-w-xl leading-relaxed">
                            {{ __('Punya rencana perawatan properti, pengangkutan limbah, atau kebutuhan renovasi di Surabaya, Malang, Bali, atau Jakarta? Konsultasikan bersama tim ahli Koota Services sekarang.') }}
                        </p>
                        <div class="pt-2 flex flex-wrap gap-3">
                            <a href="{{ route('consultation.index') }}" class="inline-flex items-center gap-2 px-6 py-3 rounded-xl bg-white text-[#820003] hover:bg-gray-100 font-bold text-xs sm:text-sm transition-all shadow-md active:scale-95">
                                <span>{{ __('Konsultasi Sekarang') }}</span>
                            </a>
                            <a href="https://wa.me/6281217597109?text=Halo%20KOOTA%20SERVICES,%20saya%20ingin%20berkonsultasi." target="_blank" class="inline-flex items-center gap-2 px-6 py-3 rounded-xl bg-[#25d366] hover:bg-[#20ba59] text-white font-bold text-xs sm:text-sm transition-all shadow-md active:scale-95">
                                <span>Chat WhatsApp 0812-1759-7109</span>
                            </a>
                        </div>
                    </div>
                    <div class="lg:col-span-4 hidden lg:block">
                        <img src="https://images.unsplash.com/photo-1486406146926-c627a92ad1ab?auto=format&fit=crop&w=600&q=80" alt="Modern Building" class="rounded-2xl opacity-90 shadow-lg object-cover h-44 w-full">
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Section 5: FAQ Accordion -->
    <section class="py-20 bg-white">
        <div class="max-w-[1280px] mx-auto px-4 sm:px-6 lg:px-8 space-y-12">
            <div class="text-center max-w-3xl mx-auto space-y-3">
                <h2 class="text-3xl sm:text-4xl font-extrabold text-[#1c1b1b] tracking-tight">
                    — {{ __('Temukan Jawabannya di Sini!') }}
                </h2>
                <p class="text-xs sm:text-sm text-gray-600 leading-relaxed">
                    {{ __('Pertanyaan yang sering diajukan seputar layanan terpadu Koota Services di berbagai kota operasional kami.') }}
                </p>
            </div>

            <div class="grid grid-cols-1 lg:grid-cols-12 gap-10 items-start">
                <!-- Left: FAQ List -->
                <div class="lg:col-span-8 space-y-4" x-data="{ activeFaq: 1 }">
                    @foreach($faqs as $faq)
                        <div class="border-b border-gray-200 pb-4">
                            <button @click="activeFaq = (activeFaq === {{ $faq->id }} ? null : {{ $faq->id }})" class="w-full flex items-center justify-between py-3 text-left focus:outline-none group">
                                <span class="text-base sm:text-lg font-bold text-gray-900 group-hover:text-[#820003] transition-colors">
                                    0{{ $loop->iteration }} {{ __($faq->question) }}
                                </span>
                                <svg class="w-5 h-5 text-gray-400 transition-transform duration-200" :class="{ 'rotate-180 text-[#820003]': activeFaq === {{ $faq->id }} }" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/>
                                </svg>
                            </button>
                            <div x-show="activeFaq === {{ $faq->id }}" x-collapse class="mt-2 text-xs sm:text-sm text-gray-600 leading-relaxed pr-6">
                                {{ __($faq->answer) }}
                            </div>
                        </div>
                    @endforeach
                </div>

                <!-- Right: Ask Box with Unified Red CTA -->
                <div class="lg:col-span-4">
                    <div class="bg-[#fcf9f8] p-8 rounded-3xl border border-gray-200 text-center space-y-5 shadow-xs">
                        <h3 class="text-xl font-bold text-gray-900 leading-tight">
                            {{ __('Punya pertanyaan lain?') }}
                        </h3>
                        <p class="text-xs text-gray-600 leading-relaxed">
                            {{ __('Tim konsultan kami siap membantu memberikan solusi terbaik sesuai kebutuhan spesifik Anda.') }}
                        </p>
                        <div class="pt-2">
                            <a href="{{ route('consultation.index') }}" class="w-full inline-block py-3.5 rounded-xl bg-[#820003] hover:bg-[#ba1a15] text-white font-bold text-xs sm:text-sm transition-all shadow-md active:scale-95">
                                {{ __('Tanya Ahlinya!') }}
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
