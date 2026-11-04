
@extends('layouts.app')

@section('title', 'Tentang KOOTA SERVICES - Solusi Fasilitas Terintegrasi')

@section('content')
    <!-- Top Hero Section -->
    <section class="bg-[#fcf9f8] border-b border-gray-100">
        <div class="w-full">
            <div class="relative isolate min-h-[480px] w-full overflow-hidden bg-[#101010] shadow-2xl ring-1 ring-black/10 sm:min-h-[560px] lg:min-h-[calc(100svh-5rem)]" aria-labelledby="about-hero-title">
                <div aria-hidden="true" class="absolute inset-0 bg-[radial-gradient(ellipse_at_50%_100%,rgba(130,0,3,0.24),transparent_55%),linear-gradient(115deg,#080808_0%,#171515_48%,#0a0a0a_100%)]"></div>

                <video class="absolute inset-0 h-full w-full object-cover" autoplay muted loop playsinline aria-hidden="true" tabindex="-1">
                    <source src="{{ asset('images/koota.mp4') }}" type="video/mp4">
                </video>

                <div aria-hidden="true" class="absolute inset-0 bg-gradient-to-t from-black/35 via-black/10 to-black/15"></div>

                <div class="absolute inset-0 z-10 flex items-center justify-center bg-white/55 px-5 py-8 text-center backdrop-blur-[2px] sm:px-10 lg:px-16">
                    <div class="w-full max-w-5xl">
                        <h1 id="about-hero-title" class="text-3xl font-extrabold tracking-tight text-[#1c1b1b] leading-[1.1] sm:text-5xl lg:text-6xl">
                            {{ __('Tentang') }} <br>
                            <span class="text-[#820003]">Koota Services</span>
                        </h1>

                        <p class="mx-auto mt-4 max-w-3xl text-sm text-gray-700 leading-relaxed sm:mt-5 sm:text-lg">
                            {{ __('Mitra terpercaya untuk layanan fasilitas komersial, industri, dan perumahan di Surabaya, Malang, Bali, dan Jakarta. Kami mendedikasikan diri untuk menciptakan lingkungan yang bersih, aman, dan berkelanjutan.') }}
                        </p>
                    </div>
                </div>

                <div aria-hidden="true" class="absolute inset-x-8 bottom-0 z-20 h-px bg-gradient-to-r from-transparent via-[#ac0c0c] to-transparent sm:inset-x-16"></div>
            </div>
        </div>
    </section>

    <!-- Section: Siapa Kami & Area Layanan -->
    <section class="py-16 md:py-20 bg-white border-b border-gray-100">
        <div class="max-w-[1280px] mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 lg:grid-cols-12 gap-8 lg:gap-12 items-center">

                <!-- Left Column: Siapa Kami -->
                <div class="lg:col-span-5 space-y-5">
                    <div class="inline-flex items-center gap-3">
                        <span class="w-8 h-[1.5px] bg-[#820003]/30 rounded-full" aria-hidden="true"></span>
                        <span class="font-serif-brand italic text-base sm:text-lg font-bold text-[#820003] tracking-wide">
                            {{ __('Mengenal Lebih Dekat') }}
                        </span>
                    </div>

                    <h2 class="font-serif-brand text-4xl sm:text-5xl font-semibold text-[#1c1b1b] tracking-tight leading-tight">
                        {{ __('Siapa Kami?') }}
                    </h2>

                    <p class="text-sm sm:text-base text-gray-600 leading-relaxed max-w-lg">
                        {{ __('Dari kebersihan rutin hingga perawatan properti dan pengelolaan lingkungan, KOOTA SERVICES menyatukan berbagai kebutuhan fasilitas dalam satu mitra. Kami membantu rumah dan bisnis menjaga ruang tetap terawat, nyaman, dan siap beroperasi—dengan layanan yang disesuaikan dengan kebutuhan tiap lokasi.') }}
                    </p>

                    <div class="mt-2 border-t border-gray-200 pt-5">
                        <p class="text-xs font-bold uppercase tracking-wider text-gray-500">
                            {{ __('Area Operasional:') }}
                        </p>

                        <div class="mt-3 grid grid-cols-2 gap-x-4 gap-y-3 text-sm font-semibold text-gray-800">
                            <div class="flex items-center gap-2"><span class="h-2 w-2 rounded-full bg-[#820003]" aria-hidden="true"></span>Surabaya</div>
                            <div class="flex items-center gap-2"><span class="h-2 w-2 rounded-full bg-[#820003]" aria-hidden="true"></span>Malang</div>
                            <div class="flex items-center gap-2"><span class="h-2 w-2 rounded-full bg-[#820003]" aria-hidden="true"></span>{{ __('Denpasar (Bali)') }}</div>
                            <div class="flex items-center gap-2"><span class="h-2 w-2 rounded-full bg-[#820003]" aria-hidden="true"></span>Jakarta</div>
                        </div>
                    </div>
                </div>

                <!-- Right Column: Interactive Service-Area Map -->
                <div class="lg:col-span-7 min-w-0">
                    <div class="mb-4 flex flex-col gap-2 sm:flex-row sm:items-end sm:justify-between">
                        <h3 class="text-xl sm:text-2xl font-bold tracking-tight text-gray-900">
                            {{ __('Jangkauan Layanan KOOTA') }}
                        </h3>
                        <p class="text-xs text-gray-500">
                            {{ __('Pilih penanda untuk melihat nama kota') }}
                        </p>
                    </div>

                    @php
                        $serviceLocations = [
                            ['name' => 'Surabaya', 'latitude' => -7.2575, 'longitude' => 112.7521],
                            ['name' => 'Malang', 'latitude' => -7.9666, 'longitude' => 112.6326],
                            ['name' => __('Denpasar (Bali)'), 'latitude' => -8.6705, 'longitude' => 115.2126],
                            ['name' => 'Jakarta', 'latitude' => -6.2088, 'longitude' => 106.8456],
                        ];
                    @endphp

                    <div
                        id="service-area-map"
                        class="service-area-map relative z-0 w-full overflow-hidden rounded-2xl border border-[#e4beb8] bg-[#f0edec] shadow-[0_12px_32px_rgba(28,27,27,0.10)]"
                        role="region"
                        aria-label="{{ __('Peta area layanan KOOTA SERVICES') }}"
                        data-locations="{{ json_encode($serviceLocations, JSON_HEX_APOS | JSON_HEX_QUOT | JSON_HEX_AMP | JSON_HEX_TAG) }}"
                        data-marker-description="{{ __('Penanda perkiraan pusat kota') }}"
                        data-unavailable="{{ __('Peta interaktif tidak tersedia saat ini. Daftar area layanan tetap tersedia di samping peta.') }}"
                        data-tiles-unavailable="{{ __('Peta dasar tidak dapat dimuat. Penanda dan daftar area layanan tetap tersedia.') }}"
                    >
                        <p class="service-area-map__status" data-map-status role="status" aria-live="polite">
                            {{ __('Memuat peta…') }}
                        </p>

                        <noscript>
                            <p class="service-area-map__status">
                                {{ __('Aktifkan JavaScript untuk melihat peta interaktif. Daftar area layanan tetap tersedia di samping peta.') }}
                            </p>
                        </noscript>
                    </div>

                    <p class="mt-3 text-xs leading-relaxed text-gray-500">
                        {{ __('Penanda menunjukkan perkiraan pusat kota, bukan alamat kantor KOOTA SERVICES yang telah diverifikasi.') }}
                    </p>
                </div>
            </div>
        </div>
    </section>

    <!-- Section: Visi & Misi Kami -->
    <section id="vision-mission" class="py-16 md:py-20 bg-[#fcf9f8] border-b border-gray-100" aria-labelledby="vision-mission-title">
        <div class="max-w-[1280px] mx-auto px-4 sm:px-6 lg:px-8">
            
            <!-- Section Header -->
            <div class="text-center max-w-3xl mx-auto mb-12 sm:mb-16">
                <div class="inline-flex items-center justify-center gap-3 mb-3.5">
                    <span class="w-8 h-[1.5px] bg-[#820003]/30 rounded-full" aria-hidden="true"></span>
                    <span class="font-serif-brand italic text-base sm:text-lg font-bold text-[#820003] tracking-wide">
                        {{ __('Arah & Prinsip Kerja') }}
                    </span>
                    <span class="w-8 h-[1.5px] bg-[#820003]/30 rounded-full" aria-hidden="true"></span>
                </div>

                <h2 id="vision-mission-title" class="text-3xl sm:text-4xl lg:text-5xl font-extrabold tracking-tight text-[#1c1b1b] leading-tight">
                    {{ __('Visi & Misi Kami') }}
                </h2>

                <p class="mt-4 text-sm sm:text-base text-gray-600 leading-relaxed max-w-2xl mx-auto">
                    {{ __('Dedikasi dan Standar Kualitas untuk Setiap Ruang') }}
                </p>
            </div>

            <!-- Vision & Mission 2-Column Grid -->
            <div class="grid grid-cols-1 lg:grid-cols-12 gap-6 lg:gap-8 items-stretch">
                
                <!-- Left: Visi Kami (Dark Editorial Statement Card) -->
                <div class="lg:col-span-6 flex">
                    <article class="vision-reveal w-full flex flex-col justify-between rounded-3xl bg-[#1c1b1b] p-8 sm:p-10 text-white relative overflow-hidden shadow-xl border border-neutral-800 transition-all duration-300 hover:shadow-2xl">
                        <!-- Subtle ambient crimson glow -->
                        <div aria-hidden="true" class="absolute -top-24 -right-24 w-72 h-72 rounded-full bg-[#820003]/25 blur-3xl pointer-events-none"></div>

                        <div class="relative z-10 space-y-6">
                            <div class="flex items-center justify-between">
                                <span class="inline-flex items-center px-3.5 py-1 rounded-full text-[11px] font-bold tracking-widest uppercase bg-white/10 text-red-200 border border-white/10">
                                    {{ __('Visi Utama') }}
                                </span>
                                <span class="text-[11px] text-neutral-400 font-semibold tracking-wider uppercase">KOOTA SERVICES</span>
                            </div>

                            <blockquote class="font-serif-brand text-xl sm:text-2xl lg:text-[26px] font-normal italic text-white/95 leading-relaxed pt-2">
                                "{{ __('Menjadi penyedia layanan perawatan fasilitas, kebersihan profesional, dan manajemen lingkungan terkemuka di Indonesia dengan standar kualitas unggul, inovatif, dan berkelanjutan.') }}"
                            </blockquote>
                        </div>

                        <!-- Stats Metrics Row -->
                        <div class="relative z-10 mt-8 pt-6 border-t border-white/15">
                            <dl class="grid grid-cols-3 gap-2 sm:gap-4 text-center">
                                <div class="flex flex-col">
                                    <dt class="order-2 mt-1 text-[11px] font-medium leading-snug text-neutral-400 sm:text-xs uppercase tracking-wider">{{ __('Tahun Pengalaman') }}</dt>
                                    <dd class="order-1 text-2xl font-black leading-tight text-white sm:text-3xl">10+</dd>
                                </div>

                                <div class="flex flex-col border-x border-white/15">
                                    <dt class="order-2 mt-1 text-[11px] font-medium leading-snug text-neutral-400 sm:text-xs uppercase tracking-wider">{{ __('Klien') }}</dt>
                                    <dd class="order-1 text-2xl font-black leading-tight text-white sm:text-3xl">200+</dd>
                                </div>

                                <div class="flex flex-col">
                                    <dt class="order-2 mt-1 text-[11px] font-medium leading-snug text-neutral-400 sm:text-xs uppercase tracking-wider">{{ __('Gedung') }}</dt>
                                    <dd class="order-1 text-2xl font-black leading-tight text-white sm:text-3xl">50+</dd>
                                </div>
                            </dl>
                        </div>
                    </article>
                </div>

                <!-- Right: Misi Kami (Pillars of Excellence Card) -->
                <div class="lg:col-span-6 flex">
                    <article class="vision-reveal w-full flex flex-col justify-between rounded-3xl bg-white p-8 sm:p-10 border border-gray-200/90 shadow-[0_10px_30px_rgba(0,0,0,0.04)] transition-all duration-300 hover:shadow-xl">
                        <div>
                            <div class="flex items-center justify-between">
                                <span class="inline-flex items-center px-3.5 py-1 rounded-full text-[11px] font-bold tracking-widest uppercase bg-red-50 text-[#820003] border border-red-100">
                                    {{ __('Misi Kami') }}
                                </span>
                                <span class="text-[11px] text-gray-400 font-semibold tracking-wider uppercase">{{ __('Prinsip Kerja') }}</span>
                            </div>

                            <h3 class="mt-5 text-xl sm:text-2xl font-extrabold text-gray-900 tracking-tight leading-snug">
                                {{ __('Komitmen Nyata di Setiap Operasional') }}
                            </h3>

                            <div class="mt-6 space-y-4">
                                <!-- Pillar 1 -->
                                <div class="flex items-start gap-4 p-3.5 rounded-2xl bg-neutral-50/70 border border-neutral-100 transition-colors hover:bg-neutral-50">
                                    <div class="w-2.5 h-2.5 rounded-full bg-[#820003] mt-1.5 shrink-0"></div>
                                    <div>
                                        <h4 class="text-sm font-bold text-gray-900 leading-snug">
                                            {{ __('Standar Kualitas Tertinggi') }}
                                        </h4>
                                        <p class="mt-1 text-xs sm:text-sm text-gray-600 leading-relaxed">
                                            {{ __('Memberikan layanan pemeliharaan komersial dan residensial berstandar tinggi.') }}
                                        </p>
                                    </div>
                                </div>

                                <!-- Pillar 2 -->
                                <div class="flex items-start gap-4 p-3.5 rounded-2xl bg-neutral-50/70 border border-neutral-100 transition-colors hover:bg-neutral-50">
                                    <div class="w-2.5 h-2.5 rounded-full bg-[#820003] mt-1.5 shrink-0"></div>
                                    <div>
                                        <h4 class="text-sm font-bold text-gray-900 leading-snug">
                                            {{ __('Solusi Ramah Lingkungan') }}
                                        </h4>
                                        <p class="mt-1 text-xs sm:text-sm text-gray-600 leading-relaxed">
                                            {{ __('Menerapkan solusi ramah lingkungan dan teknologi modern dalam setiap operasional.') }}
                                        </p>
                                    </div>
                                </div>

                                <!-- Pillar 3 -->
                                <div class="flex items-start gap-4 p-3.5 rounded-2xl bg-neutral-50/70 border border-neutral-100 transition-colors hover:bg-neutral-50">
                                    <div class="w-2.5 h-2.5 rounded-full bg-[#820003] mt-1.5 shrink-0"></div>
                                    <div>
                                        <h4 class="text-sm font-bold text-gray-900 leading-snug">
                                            {{ __('Keselamatan & Kepuasan Prima') }}
                                        </h4>
                                        <p class="mt-1 text-xs sm:text-sm text-gray-600 leading-relaxed">
                                            {{ __('Mengutamakan keselamatan kerja, ketepatan waktu, dan kepuasan pelanggan prima.') }}
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Footer Note in Misi Card -->
                        <div class="mt-8 pt-5 border-t border-gray-100 flex items-center justify-between text-xs text-gray-500">
                            <span class="font-medium text-[11px] text-gray-500">SOP Terstandar & Bergaransi</span>
                            <span class="font-bold text-[11px] text-[#820003] tracking-wide">Surabaya • Malang • Bali • Jakarta</span>
                        </div>
                    </article>
                </div>
            </div>

            <!-- Bottom Action CTAs -->
            <div class="mt-12 flex flex-col sm:flex-row items-center justify-center gap-3.5">
                <a href="{{ route('services.index') }}" class="inline-flex w-full sm:w-auto items-center justify-center gap-2 px-7 py-3.5 rounded-xl bg-[#820003] hover:bg-[#660002] text-white text-xs font-bold shadow-sm transition-all hover:scale-105 active:scale-95">
                    <span>{{ __('Lihat Layanan Kami') }}</span>
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"/></svg>
                </a>

                <a href="{{ route('consultation.index') }}" class="inline-flex w-full sm:w-auto items-center justify-center px-7 py-3.5 rounded-xl border border-gray-300 hover:border-[#820003] bg-white hover:bg-red-50/50 text-gray-800 hover:text-[#820003] text-xs font-bold transition-all shadow-2xs">
                    <span>{{ __('Hubungi Kami') }}</span>
                </a>
            </div>

        </div>

        <style>
            @media (prefers-reduced-motion: no-preference) {
                #vision-mission.vision-reveal-ready .vision-reveal {
                    opacity: 0;
                    transform: translateY(18px);
                    transition: opacity 600ms ease, transform 600ms ease;
                }

                #vision-mission.vision-reveal-ready .vision-reveal:nth-child(2) {
                    transition-delay: 130ms;
                }

                #vision-mission.vision-reveal-ready .vision-reveal.is-visible {
                    opacity: 1;
                    transform: translateY(0);
                }
            }
        </style>

        <script>
            (() => {
                const section = document.getElementById('vision-mission');
                const cards = section?.querySelectorAll('.vision-reveal');

                if (
                    !section ||
                    !cards?.length ||
                    !('IntersectionObserver' in window) ||
                    window.matchMedia('(prefers-reduced-motion: reduce)').matches
                ) return;

                const observer = new IntersectionObserver((entries, currentObserver) => {
                    entries.forEach((entry) => {
                        if (!entry.isIntersecting) return;

                        entry.target.classList.add('is-visible');
                        currentObserver.unobserve(entry.target);
                    });
                }, { threshold: 0.12 });

                section.classList.add('vision-reveal-ready');
                cards.forEach((card) => observer.observe(card));
            })();
        </script>
    </section>

    <!-- Section: Komitmen Kami (Brand Purpose & Environmental Commitment) -->
    <section class="py-20 sm:py-24 bg-white border-b border-gray-100" aria-labelledby="commitment-title">
        <div class="max-w-[1280px] mx-auto px-4 sm:px-6 lg:px-8">
            
            <!-- Header Block -->
            <div class="text-center max-w-3xl mx-auto mb-14 sm:mb-16 space-y-4">
                <div class="inline-flex items-center justify-center gap-3">
                    <span class="w-8 h-[1.5px] bg-[#820003]/30 rounded-full" aria-hidden="true"></span>
                    <span class="font-serif-brand italic text-base sm:text-lg font-bold text-[#820003] tracking-wide">
                        {{ __('Komitmen & Filosofi Kami') }}
                    </span>
                    <span class="w-8 h-[1.5px] bg-[#820003]/30 rounded-full" aria-hidden="true"></span>
                </div>

                <h2 id="commitment-title" class="text-3xl sm:text-4xl lg:text-5xl font-extrabold tracking-tight text-[#1c1b1b] leading-tight">
                    <span class="font-serif-brand italic font-normal text-gray-300">“</span>{{ __('Kita Wujudkan') }} <span class="text-[#820003] underline decoration-[#820003]/20 underline-offset-8">{{ __('Kota Bersih') }}</span><span class="font-serif-brand italic font-normal text-gray-300">”</span>
                </h2>

                <p class="text-sm sm:text-base text-gray-600 leading-relaxed max-w-2xl mx-auto pt-2">
                    {{ __('Fokus utama kami bukan sekadar menyelesaikan tugas teknis, melainkan menciptakan dampak positif bagi kelestarian lingkungan dan kenyamanan hidup di Surabaya, Malang, Bali, dan Jakarta.') }}
                </p>
            </div>

            <!-- 3 Clean Value / Commitment Cards -->
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6 lg:gap-8">
                
                <!-- Card 1: Ramah Lingkungan & Berkelanjutan -->
                <div class="flex flex-col justify-between p-7 sm:p-8 rounded-2xl bg-[#fcf9f8] border border-gray-200/80 shadow-[0_4px_20px_rgba(0,0,0,0.02)] transition-all duration-300 hover:shadow-lg hover:-translate-y-1 hover:border-[#820003]/30 group">
                    <div class="space-y-4">
                        <div class="w-12 h-12 rounded-xl bg-white border border-gray-200/80 flex items-center justify-center text-[#820003] shadow-2xs group-hover:bg-[#820003] group-hover:text-white transition-colors duration-300">
                            <!-- Leaf / Eco SVG Icon -->
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M12 21a9 9 0 0 1-9-9c0-4.97 4.03-9 9-9 4.15 0 7.63 2.82 8.65 6.69M12 21c4.97 0 9-4.03 9-9 0-1.42-.33-2.76-.92-3.96M12 21V11m0 0a4 4 0 0 1 4-4m-4 4a4 4 0 0 0-4-4"/>
                            </svg>
                        </div>

                        <h3 class="text-lg sm:text-xl font-bold text-gray-900 group-hover:text-[#820003] transition-colors">
                            {{ __('Standar Ramah Lingkungan') }}
                        </h3>

                        <p class="text-xs sm:text-sm text-gray-600 leading-relaxed">
                            {{ __('Penerapan bahan pembersih ramah lingkungan, manajemen limbah bertanggung jawab, serta efisiensi operasional untuk menjaga kelestarian alam.') }}
                        </p>
                    </div>

                    <div class="mt-6 pt-5 border-t border-gray-200/60 flex items-center gap-2 text-xs font-semibold text-[#820003]">
                        <span class="w-1.5 h-1.5 rounded-full bg-[#820003]"></span>
                        <span>{{ __('Operasional Berkelanjutan') }}</span>
                    </div>
                </div>

                <!-- Card 2: Kenyamanan & Ruang Hidup Higienis -->
                <div class="flex flex-col justify-between p-7 sm:p-8 rounded-2xl bg-[#fcf9f8] border border-gray-200/80 shadow-[0_4px_20px_rgba(0,0,0,0.02)] transition-all duration-300 hover:shadow-lg hover:-translate-y-1 hover:border-[#820003]/30 group">
                    <div class="space-y-4">
                        <div class="w-12 h-12 rounded-xl bg-white border border-gray-200/80 flex items-center justify-center text-[#820003] shadow-2xs group-hover:bg-[#820003] group-hover:text-white transition-colors duration-300">
                            <!-- Shield Check / Hygiene Icon -->
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"/>
                            </svg>
                        </div>

                        <h3 class="text-lg sm:text-xl font-bold text-gray-900 group-hover:text-[#820003] transition-colors">
                            {{ __('Ruang Hidup Higienis') }}
                        </h3>

                        <p class="text-xs sm:text-sm text-gray-600 leading-relaxed">
                            {{ __('Menciptakan ruang hunian dan fasilitas bisnis yang bersih higienis, bebas polutan, dan tertata rapi demi kesehatan dan produktivitas penghuninya.') }}
                        </p>
                    </div>

                    <div class="mt-6 pt-5 border-t border-gray-200/60 flex items-center gap-2 text-xs font-semibold text-[#820003]">
                        <span class="w-1.5 h-1.5 rounded-full bg-[#820003]"></span>
                        <span>{{ __('Kenyamanan Maksimal') }}</span>
                    </div>
                </div>

                <!-- Card 3: Standar Terpadu di 4 Wilayah -->
                <div class="flex flex-col justify-between p-7 sm:p-8 rounded-2xl bg-[#fcf9f8] border border-gray-200/80 shadow-[0_4px_20px_rgba(0,0,0,0.02)] transition-all duration-300 hover:shadow-lg hover:-translate-y-1 hover:border-[#820003]/30 group">
                    <div class="space-y-4">
                        <div class="w-12 h-12 rounded-xl bg-white border border-gray-200/80 flex items-center justify-center text-[#820003] shadow-2xs group-hover:bg-[#820003] group-hover:text-white transition-colors duration-300">
                            <!-- Map Pin / Building Network Icon -->
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/>
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/>
                            </svg>
                        </div>

                        <h3 class="text-lg sm:text-xl font-bold text-gray-900 group-hover:text-[#820003] transition-colors">
                            {{ __('Integritas di 4 Wilayah') }}
                        </h3>

                        <p class="text-xs sm:text-sm text-gray-600 leading-relaxed">
                            {{ __('Menjaga konsistensi standar mutu layanan fasilitas dengan SOP ketat dan jaminan pengerjaan bergaransi di Surabaya, Malang, Bali, dan Jakarta.') }}
                        </p>
                    </div>

                    <div class="mt-6 pt-5 border-t border-gray-200/60 flex items-center gap-2 text-xs font-semibold text-[#820003]">
                        <span class="w-1.5 h-1.5 rounded-full bg-[#820003]"></span>
                        <span>{{ __('Jangkauan Terpercaya') }}</span>
                    </div>
                </div>

            </div>

        </div>
    </section>

    <!-- Why Us Section -->
    <section class="py-24 bg-[#fcf9f8] border-b border-gray-100">
        <div class="max-w-[1280px] mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 lg:grid-cols-12 gap-12 items-center">

                <!-- Kolom Kiri -->
                <div class="lg:col-span-5 space-y-6">
                    <div class="inline-flex items-center gap-3">
                        <span class="w-8 h-[1.5px] bg-[#820003]/30 rounded-full"></span>
                        <span class="font-serif-brand italic text-base sm:text-lg font-bold text-[#820003] tracking-wide">
                            {{ __('Kenapa Memilih Kami?') }}
                        </span>
                    </div>

                    <h2 class="text-3xl sm:text-4xl font-extrabold text-[#1c1b1b] tracking-tight leading-tight">
                        {{ __('Standar Kualitas Tertinggi untuk Kenyamanan Anda') }}
                    </h2>

                    <p class="text-xs sm:text-sm text-gray-600 leading-relaxed">
                        {{ __('Kami memadukan keahlian teknis, transparansi penuh, dan jaminan pengerjaan bergaransi untuk setiap hunian dan fasilitas di Surabaya, Malang, Bali, dan Jakarta.') }}
                    </p>

                    <div>
                        <img src="{{ asset('images/tim2.png') }}" alt="Tim Teknisi Koota Services" class="h-auto w-full object-contain">
                    </div>
                </div>

                <!-- Kolom Kanan: Empat Kartu -->
                <div class="lg:col-span-7 grid grid-cols-1 sm:grid-cols-2 gap-x-6 gap-y-8">

                    @php
                        $whyUsItems = [
                            [
                                'number' => '01',
                                'title' => __('Didukung SDM Ahli & Berpengalaman'),
                                'description' => __('Kami hanya mengirimkan tenaga kerja pilihan yang telah memiliki jam terbang tinggi di bidangnya, memastikan setiap sudut rumah Anda ditangani oleh tangan-tangan profesional yang terampil.'),
                            ],
                            [
                                'number' => '02',
                                'title' => __('Jaminan Kualitas Hasil Kerja (Garansi)'),
                                'description' => __('Kenyamanan Anda adalah prioritas utama. Kami memberikan garansi pengerjaan ulang jika hasil pembersihan atau perbaikan belum memenuhi standar dan ekspektasi yang disepakati.'),
                            ],
                            [
                                'number' => '03',
                                'title' => __('Harga Transparan & Tanpa Biaya Tersembunyi'),
                                'description' => __('Tidak ada kejutan di akhir pekerjaan. Estimasi biaya kami berikan secara terbuka sejak awal sebelum pengerjaan dimulai, sesuai dengan cakupan pekerjaan yang Anda butuhkan.'),
                            ],
                            [
                                'number' => '04',
                                'title' => __('Respons Cepat & Jadwal Fleksibel'),
                                'description' => __('Kami menghargai waktu berharga Anda. Layanan customer support kami siap merespons kebutuhan Anda dengan cepat, serta menyediakan pilihan jadwal pengerjaan yang dapat disesuaikan dengan agenda harian Anda.'),
                            ],
                        ];
                    @endphp

                    @foreach ($whyUsItems as $item)
                        <article class="why-us-card">
                            <div class="why-us-card__number">
                                {{ $item['number'] }}
                                <span aria-hidden="true" class="why-us-card__fold"></span>
                            </div>

                            <div class="why-us-card__content">
                                <h3 class="text-base font-bold leading-snug text-gray-900">
                                    {{ $item['title'] }}
                                </h3>

                                <p class="text-xs leading-relaxed text-gray-600 sm:text-sm">
                                    {{ $item['description'] }}
                                </p>
                            </div>
                        </article>
                    @endforeach
                </div>
            </div>
        </div>

        <!-- CSS Label dan Kartu -->
        <style>
            .why-us-card {
                position: relative;
                min-width: 0;
                margin-top: 14px;
                border: 1px solid #f3eeee;
                border-radius: 24px;
                background: #fff;
                box-shadow: 0 2px 5px rgba(0, 0, 0, .08);
                transition: transform .3s ease, box-shadow .3s ease;
            }

            .why-us-card:hover {
                transform: translateY(-4px);
                box-shadow: 0 12px 28px rgba(68, 25, 22, .12);
            }

            .why-us-card__number {
                position: absolute;
                top: -14px;
                left: -8px;
                z-index: 5;
                display: flex;
                align-items: center;
                justify-content: center;
                box-sizing: border-box;
                min-width: 56px;
                height: 38px;
                padding: 0 16px;
                border-radius: 0 17px 17px 0;
                background: #a60008;
                color: #fff;
                font-size: 14px;
                font-weight: 700;
                line-height: 1;
                box-shadow: 0 3px 5px rgba(0, 0, 0, .15);
            }

            .why-us-card__fold {
                position: absolute;
                bottom: -8px;
                left: 0;
                width: 0;
                height: 0;
                border-top: 8px solid #650005;
                border-left: 8px solid transparent;
            }

            .why-us-card__content {
                display: flex;
                flex-direction: column;
                gap: 12px;
                height: 100%;
                box-sizing: border-box;
                padding: 52px 28px 28px;
            }

            @media (max-width: 639px) {
                .why-us-card__content {
                    padding: 48px 22px 24px;
                }
            }

            @media (prefers-reduced-motion: reduce) {
                .why-us-card {
                    transition: none;
                }

                .why-us-card:hover {
                    transform: none;
                }
            }
        </style>
    </section>

    <!-- Consultation Banner -->
    <section class="py-16 bg-white border-b border-gray-100">
        <div class="max-w-[1280px] mx-auto px-4 sm:px-6 lg:px-8">
            <div class="bg-[#dcdcdc] rounded-3xl overflow-hidden shadow-xl border border-gray-300 relative">
                <div class="grid grid-cols-1 md:grid-cols-12 items-center">

                    <div class="p-8 sm:p-12 md:col-span-7 lg:col-span-8 space-y-6">
                        <h2 class="text-2xl sm:text-3xl lg:text-4xl font-black text-gray-900 leading-tight">
                            {{ __('Konsultasi Masalah dan Perawatan Rumah Gratis') }}
                        </h2>

                        <div class="pt-2">
                            <a href="https://wa.me/6281217597109?text=Halo%20KOOTA%20SERVICES,%20saya%20ingin%20konsultasi%20perawatan%20rumah%20gratis." target="_blank" rel="noopener noreferrer" class="inline-flex items-center gap-3 px-8 py-4 rounded-full bg-[#25D366] hover:bg-[#20ba59] text-white font-bold text-sm sm:text-base transition-all shadow-lg shadow-emerald-600/30 active:scale-95">
                                <span>{{ __('Konsultasi Dengan Ahlinya') }}</span>
                            </a>
                        </div>
                    </div>

                    <div class="md:col-span-5 lg:col-span-4 flex justify-center md:justify-end items-end pt-4 pr-0 sm:pr-8">
                        <img src="{{ asset('images/kenzo-yanuar.png') }}" alt="Kenzo Yanuar - Founder & CEO Koota Services" class="h-64 sm:h-76 md:h-84 object-contain drop-shadow-2xl">
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- FAQ Accordion Section -->
    <section class="py-20 bg-[#fcf9f8]">
        <div class="max-w-[1280px] mx-auto px-4 sm:px-6 lg:px-8 space-y-12">

            <div class="text-center max-w-3xl mx-auto space-y-3">
                <h2 class="text-3xl sm:text-4xl font-extrabold text-[#1c1b1b] tracking-tight">
                    — {{ __('Temukan Jawabannya di Sini!') }}
                </h2>

                <p class="text-xs sm:text-sm text-gray-600 leading-relaxed">
                    {{ __('Pertanyaan yang sering diajukan mengenai visi, standar layanan, dan jangkauan wilayah Koota Services.') }}
                </p>
            </div>

            <div class="grid grid-cols-1 lg:grid-cols-12 gap-10 items-start">
                <div class="lg:col-span-8 space-y-4 rounded-2xl border border-gray-100 bg-white px-5 py-3 shadow-sm sm:px-7" x-data="{ activeFaq: 1 }">
                    @foreach ($faqs as $faq)
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

                <div class="lg:col-span-4">
                    <div class="bg-white p-8 rounded-3xl border border-gray-200 text-center space-y-5 shadow-xs">
                        <h3 class="text-xl font-bold text-gray-900 leading-tight">
                            {{ __('Punya pertanyaan lain?') }}
                        </h3>

                        <p class="text-xs text-gray-600 leading-relaxed">
                            {{ __('Hubungi konsultan kami langsung untuk konsultasi gratis mengenai kebutuhan fasilitas Anda.') }}
                        </p>

                        <div class="pt-2">
                            <a href="https://wa.me/6281217597109?text=Halo%20KOOTA%20SERVICES,%20saya%20ingin%20konsultasi." target="_blank" rel="noopener noreferrer" class="w-full inline-flex items-center justify-center gap-2 py-3.5 rounded-xl bg-[#25d366] hover:bg-[#20ba59] text-white font-bold text-xs sm:text-sm transition-all shadow-md active:scale-95">
                                <span>{{ __('Tanya Ahlinya via WA') }}</span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
