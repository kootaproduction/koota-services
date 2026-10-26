
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

    <!-- Section: Visi & Misi Kami -->
    <section id="vision-mission" class="py-10 md:py-12 bg-[#fcf9f8] border-b border-gray-100" aria-labelledby="vision-mission-title">
        <div class="max-w-[1280px] mx-auto px-4 sm:px-6 lg:px-8">
            <h2 id="vision-mission-title" class="text-center text-2xl font-bold tracking-tight text-[#820003] sm:text-3xl">
                {{ __('Visi & Misi Kami') }}
            </h2>

            <div class="mt-4 mb-5 flex flex-col items-center justify-center gap-2.5 sm:flex-row">
                <a href="{{ route('services.index') }}" class="inline-flex w-full items-center justify-center rounded-xl bg-[#820003] px-5 py-2.5 text-sm font-bold text-white shadow-sm transition-colors hover:bg-[#660002] focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-[#820003] focus-visible:ring-offset-2 sm:w-auto">
                    {{ __('Lihat Layanan Kami') }}
                </a>

                <a href="{{ route('consultation.index') }}" class="inline-flex w-full items-center justify-center rounded-xl border border-[#820003]/25 bg-white px-5 py-2.5 text-sm font-bold text-[#820003] transition-colors hover:border-[#820003] hover:bg-[#f8e9e8] focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-[#820003] focus-visible:ring-offset-2 sm:w-auto">
                    {{ __('Hubungi Kami') }}
                </a>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-5 md:gap-6 items-stretch">
                <!-- Card 1: Visi Kami -->
                <article class="vision-mission-card vision-reveal flex h-full flex-col rounded-2xl border border-gray-100 bg-white p-5 shadow-xs transition-[transform,box-shadow] duration-300 hover:-translate-y-1 hover:shadow-[0_16px_36px_rgba(68,25,22,0.12)] sm:p-6 motion-reduce:transition-none motion-reduce:hover:translate-y-0">
                    <div class="mb-1.5 flex items-center gap-3">
                        <span aria-hidden="true" class="text-4xl font-semibold leading-none text-[#820003]/30">01</span>
                        <span class="w-9 h-px bg-[#ac0c0c]" aria-hidden="true"></span>
                    </div>

                    <h3 class="mb-2 text-xl font-bold text-[#820003] sm:text-2xl">
                        {{ __('Visi Kami') }}
                    </h3>

                    <p class="text-sm text-gray-600 leading-relaxed sm:text-[15px]">
                        {{ __('Menjadi penyedia layanan perawatan fasilitas, kebersihan profesional, dan manajemen lingkungan terkemuka di Indonesia dengan standar kualitas unggul, inovatif, dan berkelanjutan.') }}
                    </p>

                    <dl class="mt-auto pt-4">
                        <div class="mb-3 border-t border-[#e4beb8]"></div>

                        <div class="grid grid-cols-3 gap-2 sm:gap-4">
                            <div class="flex flex-col text-center">
                                <dt class="order-2 mt-0.5 text-[10px] leading-snug text-gray-600 sm:text-xs">{{ __('Tahun Pengalaman') }}</dt>
                                <dd class="order-1 text-2xl font-extrabold leading-tight text-[#820003] sm:text-3xl">10+</dd>
                            </div>

                            <div class="flex flex-col text-center">
                                <dt class="order-2 mt-0.5 text-[10px] leading-snug text-gray-600 sm:text-xs">{{ __('Klien') }}</dt>
                                <dd class="order-1 text-2xl font-extrabold leading-tight text-[#820003] sm:text-3xl">200+</dd>
                            </div>

                            <div class="flex flex-col text-center">
                                <dt class="order-2 mt-0.5 text-[10px] leading-snug text-gray-600 sm:text-xs">{{ __('Gedung') }}</dt>
                                <dd class="order-1 text-2xl font-extrabold leading-tight text-[#820003] sm:text-3xl">50+</dd>
                            </div>
                        </div>
                    </dl>
                </article>

                <!-- Card 2: Misi Kami -->
                <article class="vision-mission-card vision-reveal flex h-full flex-col rounded-2xl border border-gray-100 bg-white p-5 shadow-xs transition-[transform,box-shadow] duration-300 hover:-translate-y-1 hover:shadow-[0_16px_36px_rgba(68,25,22,0.12)] sm:p-6 motion-reduce:transition-none motion-reduce:hover:translate-y-0">
                    <div class="mb-1.5 flex items-center gap-3">
                        <span aria-hidden="true" class="text-4xl font-semibold leading-none text-[#820003]/30">02</span>
                        <span class="w-9 h-px bg-[#ac0c0c]" aria-hidden="true"></span>
                    </div>

                    <h3 class="mb-1.5 text-xl font-bold text-[#820003] sm:text-2xl">
                        {{ __('Misi Kami') }}
                    </h3>

                    <ul class="divide-y divide-gray-100">
                        <li class="flex items-start gap-2.5 py-2 first:pt-1.5 last:pb-0 text-sm text-gray-600 leading-relaxed">
                            <span class="flex h-8 w-8 shrink-0 items-center justify-center rounded-lg bg-[#f8e9e8] text-[#820003]" aria-hidden="true">
                                <svg class="h-4 w-4" viewBox="0 0 24 24" fill="none" stroke="currentColor">
                                    <path d="M12 3 19 6v5c0 4.5-2.9 8-7 10-4.1-2-7-5.5-7-10V6l7-3Z" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8"/>
                                    <path d="m9 12 2 2 4-4" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8"/>
                                </svg>
                            </span>

                            <span class="pt-1">
                                @if (app()->getLocale() === 'en')
                                    {{ __('Memberikan') }} <strong class="font-semibold text-[#820003]">{{ __('berstandar tinggi') }}</strong> {{ __('layanan pemeliharaan komersial dan residensial') }}.
                                @else
                                    {{ __('Memberikan layanan pemeliharaan komersial dan residensial') }} <strong class="font-semibold text-[#820003]">{{ __('berstandar tinggi') }}</strong>.
                                @endif
                            </span>
                        </li>

                        <li class="flex items-start gap-2.5 py-2 first:pt-0 last:pb-0 text-sm text-gray-600 leading-relaxed">
                            <span class="flex h-8 w-8 shrink-0 items-center justify-center rounded-lg bg-[#f8e9e8] text-[#820003]" aria-hidden="true">
                                <svg class="h-4 w-4" viewBox="0 0 24 24" fill="none" stroke="currentColor">
                                    <path d="M20 4c-7.5 0-13 3.6-13 9.2A6.8 6.8 0 0 0 13.8 20C19.4 20 20 12 20 4Z" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8"/>
                                    <path d="M4 21c2.3-5.5 6.4-9.4 12-12" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8"/>
                                </svg>
                            </span>

                            <span class="pt-1">
                                {{ __('Menerapkan solusi') }} <strong class="font-semibold text-[#820003]">{{ __('ramah lingkungan') }}</strong> {{ __('dan') }} <strong class="font-semibold text-[#820003]">{{ __('teknologi modern') }}</strong> {{ __('dalam setiap operasional.') }}
                            </span>
                        </li>

                        <li class="flex items-start gap-2.5 py-2 first:pt-0 last:pb-0 text-sm text-gray-600 leading-relaxed">
                            <span class="flex h-8 w-8 shrink-0 items-center justify-center rounded-lg bg-[#f8e9e8] text-[#820003]" aria-hidden="true">
                                <svg class="h-4 w-4" viewBox="0 0 24 24" fill="none" stroke="currentColor">
                                    <path d="M3 21h18M5 21V7l7-4 7 4v14M9 21v-5h6v5M9 9h.01M15 9h.01M9 12h.01M15 12h.01" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8"/>
                                </svg>
                            </span>

                            <span class="pt-1">
                                {{ __('Mengutamakan') }} <strong class="font-semibold text-[#820003]">{{ __('keselamatan kerja') }}</strong>, {{ __('ketepatan waktu, dan') }} <strong class="font-semibold text-[#820003]">{{ __('kepuasan pelanggan') }}</strong> {{ __('prima.') }}
                            </span>
                        </li>
                    </ul>
                </article>
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

    <!-- Section: Siapa Kami & Area Layanan -->
    <section class="py-12 md:py-16 bg-white border-b border-gray-100">
        <div class="max-w-[1280px] mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 lg:grid-cols-12 gap-8 lg:gap-12 items-center">

                <!-- Left Column: Siapa Kami -->
                <div class="lg:col-span-5 space-y-5">
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

    <!-- Section: Komitmen Kami -->
    <section class="py-20 bg-white border-b border-gray-100 text-center">
        <div class="max-w-3xl mx-auto px-4 sm:px-6 lg:px-8 space-y-6">
            <h2 class="text-2xl sm:text-3xl font-bold text-gray-900 tracking-tight">
                {{ __('Komitmen Kami') }}
            </h2>

            <div class="text-3xl sm:text-4xl font-extrabold italic text-[#820003] tracking-tight">
                "{{ __('Kita Wujudkan') }} <span class="text-[#16a34a]">{{ __('Kota Bersih') }}</span>"
            </div>

            <p class="text-xs sm:text-sm text-gray-600 leading-relaxed max-w-2xl mx-auto">
                {{ __('Fokus utama kami bukan sekadar menyelesaikan tugas teknis, melainkan menciptakan dampak positif bagi kelestarian lingkungan dan kenyamanan hidup di Surabaya, Malang, Bali, dan Jakarta.') }}
            </p>
        </div>
    </section>

    <!-- Why Us Section -->
    <section class="py-24 bg-[#fcf9f8] border-b border-gray-100">
        <div class="max-w-[1280px] mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 lg:grid-cols-12 gap-12 items-center">

                <!-- Kolom Kiri -->
                <div class="lg:col-span-5 space-y-6">
                    <div class="inline-flex items-center gap-2 px-3 py-1 rounded-full bg-red-50 text-[#820003] text-xs font-bold uppercase tracking-wider">
                        {{ __('Kenapa Memilih Kami?') }}
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
                <div class="lg:col-span-8 space-y-4" x-data="{ activeFaq: 1 }">
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
