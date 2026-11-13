
@extends('layouts.app')

@section('title', __('Tentang KOOTA SERVICES - Solusi Fasilitas Terintegrasi'))

@section('content')
    <!-- Top Hero Section -->
    <section class="bg-slate-50 border-b border-slate-200/70">
        <div class="w-full">
            <div class="relative isolate min-h-[320px] w-full overflow-hidden bg-slate-900 shadow-lg ring-1 ring-black/10 sm:min-h-[380px] lg:min-h-[420px]" aria-labelledby="about-hero-title">
                <div aria-hidden="true" class="absolute inset-0 bg-[radial-gradient(ellipse_at_50%_100%,rgba(172,12,12,0.24),transparent_55%),linear-gradient(115deg,#0f172a_0%,#1e293b_48%,#0f172a_100%)]"></div>

                <video class="absolute inset-0 h-full w-full object-cover" autoplay muted loop playsinline aria-hidden="true" tabindex="-1">
                    <source src="{{ asset('images/koota.mp4') }}" type="video/mp4">
                </video>

                <div aria-hidden="true" class="absolute inset-0 bg-gradient-to-t from-black/35 via-black/10 to-black/15"></div>

                <div class="absolute inset-0 z-10 flex items-center justify-center bg-white/55 px-5 py-8 text-center backdrop-blur-[2px] sm:px-10 lg:px-16">
                    <div class="w-full max-w-5xl">
                        <h1 id="about-hero-title" class="text-3xl font-extrabold tracking-tight text-[#0f172a] leading-[1.1] sm:text-5xl lg:text-6xl">
                            {{ __('Tentang') }} <br>
                            <span class="text-[#ac0c0c]">Koota Services</span>
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
    <section class="py-12 md:py-16 bg-white border-b border-slate-200/70">
        <div class="max-w-[1280px] mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 lg:grid-cols-12 gap-8 lg:gap-12 items-center">

                <!-- Left Column: Siapa Kami -->
                <div class="lg:col-span-5 space-y-5">
                    <div class="inline-flex items-center gap-3">
                        <span class="w-8 h-[1.5px] bg-[#ac0c0c]/30 rounded-full" aria-hidden="true"></span>
                        <span class="font-serif-brand italic text-base sm:text-lg font-bold text-[#ac0c0c] tracking-wide">
                            {{ __('Mengenal Lebih Dekat') }}
                        </span>
                    </div>

                    <h2 class="font-serif-brand text-4xl sm:text-5xl font-semibold text-[#0f172a] tracking-tight leading-tight">
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
                            <div class="flex items-center gap-2"><span class="h-2 w-2 rounded-full bg-[#ac0c0c]" aria-hidden="true"></span>{{ __('Surabaya') }}</div>
                            <div class="flex items-center gap-2"><span class="h-2 w-2 rounded-full bg-[#ac0c0c]" aria-hidden="true"></span>{{ __('Malang') }}</div>
                            <div class="flex items-center gap-2"><span class="h-2 w-2 rounded-full bg-[#ac0c0c]" aria-hidden="true"></span>{{ __('Denpasar (Bali)') }}</div>
                            <div class="flex items-center gap-2"><span class="h-2 w-2 rounded-full bg-[#ac0c0c]" aria-hidden="true"></span>{{ __('Jakarta') }}</div>
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
                        class="service-area-map relative z-0 w-full overflow-hidden rounded-2xl border border-[#e2e8f0] bg-[#f1f5f9] shadow-[0_12px_32px_rgba(15,23,42,0.10)]"
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
    <section id="vision-mission" class="py-14 md:py-16 bg-slate-50 border-b border-slate-200/70" aria-labelledby="vision-mission-title">
        <div class="max-w-[1280px] mx-auto px-4 sm:px-6 lg:px-8">

            <!-- Section Header -->
            <div class="text-center max-w-2xl mx-auto mb-8 sm:mb-10">
                <div class="inline-flex items-center justify-center gap-3 mb-2.5">
                    <span class="w-8 h-[1.5px] bg-[#ac0c0c]/30 rounded-full" aria-hidden="true"></span>
                    <span class="font-serif-brand italic text-base sm:text-lg font-bold text-[#ac0c0c] tracking-wide">
                        {{ __('Arah & Prinsip Kerja') }}
                    </span>
                    <span class="w-8 h-[1.5px] bg-[#ac0c0c]/30 rounded-full" aria-hidden="true"></span>
                </div>

                <h2 id="vision-mission-title" class="text-3xl sm:text-4xl font-extrabold tracking-tight text-[#0f172a] leading-tight">
                    {{ __('Visi & Misi Kami') }}
                </h2>

                <p class="mt-2.5 text-xs sm:text-sm text-slate-600 leading-relaxed">
                    {{ __('Dedikasi dan Standar Kualitas untuk Setiap Ruang') }}
                </p>
            </div>

            <!-- Compact Vision Statement + Metrics Banner (Zero Empty Void) -->
            <article class="vision-reveal rounded-3xl bg-[#0f172a] p-6 sm:p-8 lg:p-10 text-white relative overflow-hidden shadow-lg border border-slate-800">
                <div aria-hidden="true" class="absolute -top-24 -right-24 w-72 h-72 rounded-full bg-[#ac0c0c]/25 blur-3xl pointer-events-none"></div>

                <div class="relative z-10 grid grid-cols-1 lg:grid-cols-12 gap-6 lg:gap-10 items-center">
                    <!-- Left: Core Vision Quote -->
                    <div class="lg:col-span-7 space-y-3">
                        <div class="flex items-center gap-3">
                            <span class="inline-flex items-center gap-2 text-[11px] font-bold tracking-widest uppercase text-red-300">
                                <span class="w-1.5 h-1.5 rounded-full bg-[#ac0c0c]"></span>
                                {{ __('Visi Utama') }}
                            </span>
                            <span class="text-slate-600">•</span>
                            <span class="text-[11px] text-slate-400 font-semibold tracking-wider uppercase">KOOTA SERVICES</span>
                        </div>

                        <blockquote class="font-serif-brand text-lg sm:text-xl lg:text-[23px] font-normal italic text-white/95 leading-relaxed">
                            "{{ __('Menjadi penyedia layanan perawatan fasilitas, kebersihan profesional, dan manajemen lingkungan terkemuka di Indonesia dengan standar kualitas unggul, inovatif, dan berkelanjutan.') }}"
                        </blockquote>
                    </div>

                    <!-- Right: Compact Stats Metrics Grid -->
                    <div class="lg:col-span-5">
                        <dl class="grid grid-cols-3 gap-2 sm:gap-3 rounded-2xl bg-white/5 border border-white/10 p-4 sm:p-5 text-center backdrop-blur-xs">
                            <div class="flex flex-col px-1">
                                <dd class="text-xl sm:text-2xl lg:text-3xl font-black leading-tight text-white">10+</dd>
                                <dt class="mt-1 text-[10px] sm:text-[11px] font-medium leading-snug text-slate-300 uppercase tracking-wider">{{ __('Tahun Pengalaman') }}</dt>
                            </div>

                            <div class="flex flex-col px-1 border-x border-white/15">
                                <dd class="text-xl sm:text-2xl lg:text-3xl font-black leading-tight text-white">200+</dd>
                                <dt class="mt-1 text-[10px] sm:text-[11px] font-medium leading-snug text-slate-300 uppercase tracking-wider">{{ __('Klien') }}</dt>
                            </div>

                            <div class="flex flex-col px-1">
                                <dd class="text-xl sm:text-2xl lg:text-3xl font-black leading-tight text-white">50+</dd>
                                <dt class="mt-1 text-[10px] sm:text-[11px] font-medium leading-snug text-slate-300 uppercase tracking-wider">{{ __('Gedung') }}</dt>
                            </div>
                        </dl>
                    </div>
                </div>
            </article>

            <!-- Mission Header & 3-Column Horizontal Mission Cards -->
            <div class="mt-8 space-y-5">
                <div class="flex flex-col sm:flex-row sm:items-end justify-between gap-2 px-1">
                    <div>
                        <span class="text-xs font-bold tracking-widest uppercase text-[#ac0c0c]">
                            {{ __('Misi Kami') }} • {{ __('Prinsip Kerja') }}
                        </span>
                        <h3 class="mt-1 text-xl sm:text-2xl font-extrabold text-[#0f172a] tracking-tight leading-snug">
                            {{ __('Komitmen Nyata di Setiap Operasional') }}
                        </h3>
                    </div>
                    <span class="text-xs font-bold text-[#ac0c0c] tracking-wide">
                        {{ __('Surabaya • Malang • Bali • Jakarta') }}
                    </span>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-3 gap-5">
                    <!-- Pillar 1 -->
                    <article class="vision-reveal rounded-2xl bg-white p-6 border border-slate-200/90 border-t-4 border-t-[#ac0c0c] shadow-2xs hover:shadow-md transition-all duration-300">
                        <span class="inline-block text-[11px] font-black text-[#ac0c0c] tracking-widest uppercase">01</span>
                        <h4 class="mt-1.5 text-base font-bold text-[#0f172a] leading-snug">
                            {{ __('Standar Kualitas Tertinggi') }}
                        </h4>
                        <p class="mt-2 text-xs sm:text-sm text-slate-600 leading-relaxed">
                            {{ __('Memberikan layanan pemeliharaan komersial dan residensial berstandar tinggi.') }}
                        </p>
                    </article>

                    <!-- Pillar 2 -->
                    <article class="vision-reveal rounded-2xl bg-white p-6 border border-slate-200/90 border-t-4 border-t-[#ac0c0c] shadow-2xs hover:shadow-md transition-all duration-300">
                        <span class="inline-block text-[11px] font-black text-[#ac0c0c] tracking-widest uppercase">02</span>
                        <h4 class="mt-1.5 text-base font-bold text-[#0f172a] leading-snug">
                            {{ __('Solusi Ramah Lingkungan') }}
                        </h4>
                        <p class="mt-2 text-xs sm:text-sm text-slate-600 leading-relaxed">
                            {{ __('Menerapkan solusi ramah lingkungan dan teknologi modern dalam setiap operasional.') }}
                        </p>
                    </article>

                    <!-- Pillar 3 -->
                    <article class="vision-reveal rounded-2xl bg-white p-6 border border-slate-200/90 border-t-4 border-t-[#ac0c0c] shadow-2xs hover:shadow-md transition-all duration-300">
                        <span class="inline-block text-[11px] font-black text-[#ac0c0c] tracking-widest uppercase">03</span>
                        <h4 class="mt-1.5 text-base font-bold text-[#0f172a] leading-snug">
                            {{ __('Keselamatan & Kepuasan Prima') }}
                        </h4>
                        <p class="mt-2 text-xs sm:text-sm text-slate-600 leading-relaxed">
                            {{ __('Mengutamakan keselamatan kerja, ketepatan waktu, dan kepuasan pelanggan prima.') }}
                        </p>
                    </article>
                </div>

                <!-- Compact Trust & Action Bar -->
                <div class="pt-4 border-t border-slate-200/80 flex flex-col sm:flex-row items-center justify-between gap-4">
                    <span class="text-xs font-medium text-slate-500">
                        {{ __('SOP Terstandar & Bergaransi') }}
                    </span>

                    <div class="flex flex-col sm:flex-row items-center gap-3 w-full sm:w-auto">
                        <a href="{{ route('services.index') }}" class="inline-flex w-full sm:w-auto items-center justify-center gap-2 px-6 py-3 rounded-xl bg-[#ac0c0c] hover:bg-[#8f0a0a] text-white text-xs font-bold shadow-sm transition-all active:scale-95">
                            <span>{{ __('Lihat Layanan Kami') }}</span>
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"/></svg>
                        </a>

                        <a href="{{ route('consultation.index') }}" class="inline-flex w-full sm:w-auto items-center justify-center px-6 py-3 rounded-xl border border-slate-300 hover:border-[#ac0c0c] bg-white hover:bg-red-50/50 text-slate-800 hover:text-[#ac0c0c] text-xs font-bold transition-all shadow-2xs">
                            <span>{{ __('Hubungi Kami') }}</span>
                        </a>
                    </div>
                </div>
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
    <section class="py-14 sm:py-16 bg-white border-b border-slate-200/70" aria-labelledby="commitment-title">
        <div class="max-w-[1280px] mx-auto px-4 sm:px-6 lg:px-8">
            
            <!-- Header Block -->
            <div class="text-center max-w-3xl mx-auto mb-10 sm:mb-12 space-y-3">
                <div class="inline-flex items-center justify-center gap-3">
                    <span class="w-8 h-[1.5px] bg-[#ac0c0c]/30 rounded-full" aria-hidden="true"></span>
                    <span class="font-serif-brand italic text-base sm:text-lg font-bold text-[#ac0c0c] tracking-wide">
                        {{ __('Komitmen & Filosofi Kami') }}
                    </span>
                    <span class="w-8 h-[1.5px] bg-[#ac0c0c]/30 rounded-full" aria-hidden="true"></span>
                </div>

                <h2 id="commitment-title" class="text-3xl sm:text-4xl lg:text-5xl font-extrabold tracking-tight text-[#0f172a] leading-tight">
                    <span class="font-serif-brand italic font-normal text-gray-300">“</span>{{ __('Kita Wujudkan') }} <span class="text-[#ac0c0c] underline decoration-[#ac0c0c]/20 underline-offset-8">{{ __('Kota Bersih') }}</span><span class="font-serif-brand italic font-normal text-gray-300">”</span>
                </h2>

                <p class="text-sm sm:text-base text-gray-600 leading-relaxed max-w-2xl mx-auto pt-2">
                    {{ __('Fokus utama kami bukan sekadar menyelesaikan tugas teknis, melainkan menciptakan dampak positif bagi kelestarian lingkungan dan kenyamanan hidup di Surabaya, Malang, Bali, dan Jakarta.') }}
                </p>
            </div>

            <!-- 3 Clean Value / Commitment Cards -->
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6 lg:gap-8">
                
                <!-- Card 1: Ramah Lingkungan & Berkelanjutan -->
                <div class="p-7 sm:p-8 rounded-2xl bg-slate-50 border border-gray-200/80 shadow-[0_4px_20px_rgba(0,0,0,0.02)] transition-all duration-300 hover:shadow-md hover:border-[#ac0c0c]/30">
                    <h3 class="text-lg sm:text-xl font-bold text-gray-900 leading-snug">
                        {{ __('Standar Ramah Lingkungan') }}
                    </h3>

                    <p class="mt-3 text-xs sm:text-sm text-gray-600 leading-relaxed">
                        {{ __('Penerapan bahan pembersih ramah lingkungan, manajemen limbah bertanggung jawab, serta efisiensi operasional untuk menjaga kelestarian alam.') }}
                    </p>
                </div>

                <!-- Card 2: Kenyamanan & Ruang Hidup Higienis -->
                <div class="p-7 sm:p-8 rounded-2xl bg-slate-50 border border-gray-200/80 shadow-[0_4px_20px_rgba(0,0,0,0.02)] transition-all duration-300 hover:shadow-md hover:border-[#ac0c0c]/30">
                    <h3 class="text-lg sm:text-xl font-bold text-gray-900 leading-snug">
                        {{ __('Ruang Hidup Higienis') }}
                    </h3>

                    <p class="mt-3 text-xs sm:text-sm text-gray-600 leading-relaxed">
                        {{ __('Menciptakan ruang hunian dan fasilitas bisnis yang bersih higienis, bebas polutan, dan tertata rapi demi kesehatan dan produktivitas penghuninya.') }}
                    </p>
                </div>

                <!-- Card 3: Standar Terpadu di 4 Wilayah -->
                <div class="p-7 sm:p-8 rounded-2xl bg-slate-50 border border-gray-200/80 shadow-[0_4px_20px_rgba(0,0,0,0.02)] transition-all duration-300 hover:shadow-md hover:border-[#ac0c0c]/30">
                    <h3 class="text-lg sm:text-xl font-bold text-gray-900 leading-snug">
                        {{ __('Integritas di 4 Wilayah') }}
                    </h3>

                    <p class="mt-3 text-xs sm:text-sm text-gray-600 leading-relaxed">
                        {{ __('Menjaga konsistensi standar mutu layanan fasilitas dengan SOP ketat dan jaminan pengerjaan bergaransi di Surabaya, Malang, Bali, dan Jakarta.') }}
                    </p>
                </div>

            </div>

        </div>
    </section>

    <!-- Why Us Section -->
    <section class="py-14 sm:py-16 bg-slate-50 border-b border-slate-200/70">
        <div class="max-w-[1280px] mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 lg:grid-cols-12 gap-12 items-center">

                <!-- Kolom Kiri -->
                <div class="lg:col-span-5 space-y-6">
                    <div class="inline-flex items-center gap-3">
                        <span class="w-8 h-[1.5px] bg-[#ac0c0c]/30 rounded-full"></span>
                        <span class="font-serif-brand italic text-base sm:text-lg font-bold text-[#ac0c0c] tracking-wide">
                            {{ __('Kenapa Memilih Kami?') }}
                        </span>
                    </div>

                    <h2 class="text-3xl sm:text-4xl font-extrabold text-[#0f172a] tracking-tight leading-tight">
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
                border: 1px solid #e2e8f0;
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
                background: #ac0c0c;
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
                border-top: 8px solid #7f1d1d;
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
    <section class="py-12 sm:py-14 bg-white border-b border-slate-200/70">
        <div class="max-w-[1280px] mx-auto px-4 sm:px-6 lg:px-8">
            <div class="bg-gradient-to-br from-slate-100 to-slate-200/80 rounded-3xl overflow-hidden shadow-xl border border-gray-300 relative">
                <div class="grid grid-cols-1 md:grid-cols-12 items-center">

                    <div class="p-8 sm:p-12 md:col-span-7 lg:col-span-8 space-y-6">
                        <h2 class="text-2xl sm:text-3xl lg:text-4xl font-black text-gray-900 leading-tight">
                            {{ __('Konsultasi Masalah dan Perawatan Rumah Gratis') }}
                        </h2>

                        <div class="pt-2">
                            <a href="https://wa.me/6281217597109?text=Halo%20KOOTA%20SERVICES,%20saya%20ingin%20konsultasi%20perawatan%20rumah%20gratis." target="_blank" rel="noopener noreferrer" class="inline-flex items-center gap-3 px-8 py-4 rounded-full bg-[#16a34a] hover:bg-[#15803d] text-white font-bold text-sm sm:text-base transition-all shadow-lg shadow-emerald-600/30 active:scale-95">
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
    <section class="py-14 sm:py-16 bg-slate-50">
        <div class="max-w-[1280px] mx-auto px-4 sm:px-6 lg:px-8 space-y-8 sm:space-y-10">

            <div class="text-center max-w-3xl mx-auto space-y-3">
                <h2 class="text-3xl sm:text-4xl font-extrabold text-[#0f172a] tracking-tight">
                    — {{ __('Temukan Jawabannya di Sini!') }}
                </h2>

                <p class="text-xs sm:text-sm text-gray-600 leading-relaxed">
                    {{ __('Pertanyaan yang sering diajukan mengenai visi, standar layanan, dan jangkauan wilayah Koota Services.') }}
                </p>
            </div>

            <div class="grid grid-cols-1 lg:grid-cols-12 gap-10 items-start pt-6 sm:pt-8">
                <!-- Left: FAQ Items with Floating Answers on Hover -->
                <div 
                    class="lg:col-span-8 space-y-3" 
                    x-data="{ activeFaq: null, pinnedFaq: null }"
                    @click.away="pinnedFaq = null; activeFaq = null"
                >
                    <div class="mb-4 flex items-center justify-between text-xs text-gray-500 px-2">
                        <span class="flex items-center gap-2 font-medium">
                            <svg class="w-4 h-4 text-[#ac0c0c] animate-pulse" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 15l-2 5L9 9l11 4-5 2zm0 0l5 5M7.188 2.239l.777 2.897M5.136 7.965l-2.898-.777M13.95 4.05l-2.122 2.122m-5.657 5.656l-2.12 2.122"/>
                            </svg>
                            {{ __('Arahkan kursor ke pertanyaan untuk melihat jawaban') }}
                        </span>
                        <span class="text-[11px] text-gray-400 hidden sm:inline">{{ __('Hover / Sentuh') }}</span>
                    </div>

                    @foreach ($faqs as $faq)
                        <div 
                            class="relative"
                            @mouseenter="activeFaq = {{ $faq->id }}"
                            @mouseleave="if (!pinnedFaq) activeFaq = null"
                            @click="pinnedFaq = (pinnedFaq === {{ $faq->id }} ? null : {{ $faq->id }}); activeFaq = pinnedFaq"
                        >
                            <!-- Question Bar (Hover Target) -->
                            <div 
                                class="w-full flex items-center justify-between p-4 sm:p-5 rounded-2xl border transition-all duration-200 cursor-pointer select-none"
                                :class="activeFaq === {{ $faq->id }} ? 'bg-red-50/70 border-red-200 shadow-md translate-x-1' : 'bg-white border-gray-200/80 hover:border-red-200 hover:bg-slate-50/70 shadow-2xs'"
                            >
                                <span 
                                    class="text-sm sm:text-base font-bold text-gray-900 transition-colors leading-relaxed pr-4"
                                    :class="{ 'text-[#ac0c0c]': activeFaq === {{ $faq->id }} }"
                                >
                                    <span class="text-xs font-black text-[#ac0c0c] mr-2">0{{ $loop->iteration }}</span>
                                    {{ __($faq->question) }}
                                </span>

                                <div 
                                    class="w-7 h-7 rounded-full flex items-center justify-center shrink-0 transition-all duration-200"
                                    :class="activeFaq === {{ $faq->id }} ? 'bg-[#ac0c0c] text-white rotate-90 shadow-2xs' : 'bg-gray-100 text-gray-400'"
                                >
                                    <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M9 5l7 7-7 7"/>
                                    </svg>
                                </div>
                            </div>

                            <!-- Floating Answer Card (Mengambang di Atas Pertanyaan) -->
                            <div 
                                x-show="activeFaq === {{ $faq->id }}"
                                x-cloak
                                x-transition:enter="transition ease-out duration-200"
                                x-transition:enter-start="opacity-0 translate-y-2 scale-95"
                                x-transition:enter-end="opacity-100 translate-y-0 scale-100"
                                x-transition:leave="transition ease-in duration-150"
                                x-transition:leave-start="opacity-100 translate-y-0 scale-100"
                                x-transition:leave-end="opacity-0 translate-y-2 scale-95"
                                class="absolute bottom-full left-0 right-0 mb-3 z-30 p-5 sm:p-6 rounded-2xl bg-white text-gray-800 border border-red-100 shadow-[0_20px_45px_rgba(172,12,12,0.14)] pointer-events-none"
                            >
                                <div class="space-y-2">
                                    <div class="flex items-center justify-between pb-2 border-b border-gray-100">
                                        <span class="text-xs font-bold text-[#ac0c0c] uppercase tracking-wider flex items-center gap-1.5">
                                            <span class="w-1.5 h-1.5 rounded-full bg-[#ac0c0c]"></span>
                                            {{ __('Jawaban') }}
                                        </span>
                                        <span class="text-[11px] text-gray-400 font-semibold tracking-wider">KOOTA FAQ</span>
                                    </div>

                                    <p class="text-xs sm:text-sm text-gray-700 leading-relaxed font-normal">
                                        {{ __($faq->answer) }}
                                    </p>
                                </div>

                                <!-- Downward Arrow Pointing to the Question -->
                                <div class="absolute -bottom-1.5 left-8 w-3.5 h-3.5 bg-white transform rotate-45 border-r border-b border-red-100"></div>
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
                            <a href="https://wa.me/6281217597109?text=Halo%20KOOTA%20SERVICES,%20saya%20ingin%20konsultasi." target="_blank" rel="noopener noreferrer" class="w-full inline-flex items-center justify-center gap-2 py-3.5 rounded-xl bg-[#16a34a] hover:bg-[#15803d] text-white font-bold text-xs sm:text-sm transition-all shadow-md active:scale-95">
                                <span>{{ __('Tanya Ahlinya via WA') }}</span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
