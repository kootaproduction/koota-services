@extends('layouts.app')

@section('title', 'Tentang KOOTA SERVICES - Solusi Fasilitas Terintegrasi')

@section('content')
    <!-- Top Hero Section -->
    <section class="bg-[#fcf9f8] border-b border-gray-100">
        <div class="w-full">
            <div
                class="relative isolate min-h-[480px] w-full overflow-hidden bg-[#101010] shadow-2xl ring-1 ring-black/10 sm:min-h-[560px] lg:min-h-[calc(100svh-5rem)]"
                aria-labelledby="about-hero-title"
            >
                <div aria-hidden="true" class="absolute inset-0 bg-[radial-gradient(ellipse_at_50%_100%,rgba(130,0,3,0.24),transparent_55%),linear-gradient(115deg,#080808_0%,#171515_48%,#0a0a0a_100%)]"></div>
                <video class="absolute inset-0 h-full w-full object-cover" autoplay muted loop playsinline aria-hidden="true" tabindex="-1">
                    <source src="{{ asset('images/about-video.mp4') }}" type="video/mp4">
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

    <!-- Section: Komitmen Kami -->
    <section class="py-20 bg-white border-b border-gray-100 text-center">
        <div class="max-w-3xl mx-auto px-4 sm:px-6 lg:px-8 space-y-6">
            <div class="w-14 h-14 rounded-2xl bg-red-50 text-[#820003] flex items-center justify-center mx-auto shadow-sm">
                <svg class="w-7 h-7 stroke-current" fill="none" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3.055 11H5a2 2 0 012 2v1a2 2 0 002 2 2 2 0 012 2v2.945M8 3.935V5.5A2.5 2.5 0 0010.5 8h.5a2 2 0 012 2 2 2 0 104 0 2 2 0 012-2h1.064M15 20.488V18a2 2 0 012-2h3.064M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                </svg>
            </div>

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

    <!-- Section: Visi & Misi Kami -->
    <section class="py-10 md:py-12 bg-[#fcf9f8] border-b border-gray-100">
        <div class="max-w-[1280px] mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-5 md:gap-6 items-stretch">
                <!-- Card 1: Visi Kami -->
                <div class="h-full bg-white p-6 sm:p-8 rounded-2xl border border-gray-100 shadow-xs">
                    <div class="flex items-center gap-4 mb-2">
                        <span class="text-5xl font-medium leading-none text-[#f1dada]">01</span>
                        <span class="w-9 h-px bg-[#ac0c0c]" aria-hidden="true"></span>
                    </div>
                    <h3 class="text-2xl font-bold text-[#820003] mb-3">
                        {{ __('Visi Kami') }}
                    </h3>
                    <p class="text-sm sm:text-base text-gray-600 leading-relaxed">
                        {{ __('Menjadi penyedia layanan perawatan fasilitas, kebersihan profesional, dan manajemen lingkungan terkemuka di Indonesia dengan standar kualitas unggul, inovatif, dan berkelanjutan.') }}
                    </p>
                </div>

                <!-- Card 2: Misi Kami -->
                <div class="h-full bg-white p-6 sm:p-8 rounded-2xl border border-gray-100 shadow-xs">
                    <div class="flex items-center gap-4 mb-2">
                        <span class="text-5xl font-medium leading-none text-[#f1dada]">02</span>
                        <span class="w-9 h-px bg-[#ac0c0c]" aria-hidden="true"></span>
                    </div>
                    <h3 class="text-2xl font-bold text-[#820003] mb-2">
                        {{ __('Misi Kami') }}
                    </h3>
                    <ul class="divide-y divide-gray-100">
                        <li class="flex items-start gap-3 py-3 first:pt-2 last:pb-0 text-sm text-gray-600 leading-relaxed">
                            <span class="mt-2 h-1.5 w-1.5 rounded-full bg-[#820003] shrink-0"></span>
                            <span>{{ __('Memberikan layanan pemeliharaan komersial dan residensial berstandar tinggi.') }}</span>
                        </li>
                        <li class="flex items-start gap-3 py-3 first:pt-0 last:pb-0 text-sm text-gray-600 leading-relaxed">
                            <span class="mt-2 h-1.5 w-1.5 rounded-full bg-[#820003] shrink-0"></span>
                            <span>{{ __('Menerapkan solusi ramah lingkungan dan teknologi modern dalam setiap operasional.') }}</span>
                        </li>
                        <li class="flex items-start gap-3 py-3 first:pt-0 last:pb-0 text-sm text-gray-600 leading-relaxed">
                            <span class="mt-2 h-1.5 w-1.5 rounded-full bg-[#820003] shrink-0"></span>
                            <span>{{ __('Mengutamakan keselamatan kerja, ketepatan waktu, dan kepuasan pelanggan prima.') }}</span>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </section>

    <!-- Section: Siapa Kami & Area Layanan -->
    <section class="py-12 md:py-16 bg-white border-b border-gray-100">
        <div class="max-w-[1280px] mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 lg:grid-cols-12 gap-8 lg:gap-12 items-center">
                <!-- Left Column: Siapa Kami? -->
                <div class="lg:col-span-5 space-y-5">
                    <h2 class="font-serif-brand text-4xl sm:text-5xl font-semibold text-[#1c1b1b] tracking-tight leading-tight">
                        {{ __('Siapa Kami?') }}
                    </h2>
                    <p class="text-sm sm:text-base text-gray-600 leading-relaxed max-w-lg">
                        {{ __('Dari kebersihan rutin hingga perawatan properti dan pengelolaan lingkungan, KOOTA SERVICES menyatukan berbagai kebutuhan fasilitas dalam satu mitra. Kami membantu rumah dan bisnis menjaga ruang tetap terawat, nyaman, dan siap beroperasi—dengan layanan yang disesuaikan dengan kebutuhan tiap lokasi.') }}
                    </p>
                    <div class="mt-2 border-t border-gray-200 pt-5">
                        <p class="text-xs font-bold uppercase tracking-wider text-gray-500">{{ __('Area Operasional:') }}</p>
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
                        <p class="text-xs text-gray-500">{{ __('Pilih penanda untuk melihat nama kota') }}</p>
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
                            <p class="service-area-map__status">{{ __('Aktifkan JavaScript untuk melihat peta interaktif. Daftar area layanan tetap tersedia di samping peta.') }}</p>
                        </noscript>
                    </div>
                    <p class="mt-3 text-xs leading-relaxed text-gray-500">
                        {{ __('Penanda menunjukkan perkiraan pusat kota, bukan alamat kantor KOOTA SERVICES yang telah diverifikasi.') }}
                    </p>
                </div>
            </div>
        </div>
    </section>

    <!-- Why Us Section (Official 4 Points) -->
    <section class="py-24 bg-[#fcf9f8] border-b border-gray-100">
        <div class="max-w-[1280px] mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 lg:grid-cols-12 gap-12 items-center">
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
                    <div class="rounded-3xl overflow-hidden shadow-xl border border-gray-100 bg-white">
                        <img src="{{ asset('images/team-indonesia.jpg') }}" alt="Tim Teknisi Koota Services" class="w-full h-64 object-cover">
                    </div>
                </div>

                <div class="lg:col-span-7 grid grid-cols-1 sm:grid-cols-2 gap-5">
                    <!-- Point 1 -->
                    <div class="bg-white p-7 rounded-3xl border border-gray-100 shadow-xs hover:shadow-lg transition-all space-y-3">
                        <div class="w-10 h-10 rounded-2xl bg-red-50 text-[#820003] flex items-center justify-center font-bold text-sm">
                            01
                        </div>
                        <h3 class="text-base font-bold text-gray-900 leading-snug">
                            {{ __('Didukung SDM Ahli & Berpengalaman') }}
                        </h3>
                        <p class="text-xs text-gray-600 leading-relaxed">
                            {{ __('Kami hanya mengirimkan tenaga kerja pilihan yang telah memiliki jam terbang tinggi di bidangnya, memastikan setiap sudut rumah Anda ditangani oleh tangan-tangan profesional yang terampil.') }}
                        </p>
                    </div>

                    <!-- Point 2 -->
                    <div class="bg-white p-7 rounded-3xl border border-gray-100 shadow-xs hover:shadow-lg transition-all space-y-3">
                        <div class="w-10 h-10 rounded-2xl bg-red-50 text-[#820003] flex items-center justify-center font-bold text-sm">
                            02
                        </div>
                        <h3 class="text-base font-bold text-gray-900 leading-snug">
                            {{ __('Jaminan Kualitas Hasil Kerja (Garansi)') }}
                        </h3>
                        <p class="text-xs text-gray-600 leading-relaxed">
                            {{ __('Kenyamanan Anda adalah prioritas utama. Kami memberikan garansi pengerjaan ulang jika hasil pembersihan atau perbaikan belum memenuhi standar dan ekspektasi yang disepakati.') }}
                        </p>
                    </div>

                    <!-- Point 3 -->
                    <div class="bg-white p-7 rounded-3xl border border-gray-100 shadow-xs hover:shadow-lg transition-all space-y-3">
                        <div class="w-10 h-10 rounded-2xl bg-red-50 text-[#820003] flex items-center justify-center font-bold text-sm">
                            03
                        </div>
                        <h3 class="text-base font-bold text-gray-900 leading-snug">
                            {{ __('Harga Transparan & Tanpa Biaya Tersembunyi') }}
                        </h3>
                        <p class="text-xs text-gray-600 leading-relaxed">
                            {{ __('Tidak ada kejutan di akhir pekerjaan. Estimasi biaya kami berikan secara terbuka sejak awal sebelum pengerjaan dimulai, sesuai dengan cakupan pekerjaan yang Anda butuhkan.') }}
                        </p>
                    </div>

                    <!-- Point 4 -->
                    <div class="bg-white p-7 rounded-3xl border border-gray-100 shadow-xs hover:shadow-lg transition-all space-y-3">
                        <div class="w-10 h-10 rounded-2xl bg-red-50 text-[#820003] flex items-center justify-center font-bold text-sm">
                            04
                        </div>
                        <h3 class="text-base font-bold text-gray-900 leading-snug">
                            {{ __('Respons Cepat & Jadwal Fleksibel') }}
                        </h3>
                        <p class="text-xs text-gray-600 leading-relaxed">
                            {{ __('Kami menghargai waktu berharga Anda. Layanan customer support kami siap merespons kebutuhan Anda dengan cepat, serta menyediakan pilihan jadwal pengerjaan yang dapat disesuaikan dengan agenda harian Anda.') }}
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Gambar 3 Style Consultation Banner -->
    <section class="py-16 bg-white border-b border-gray-100">
        <div class="max-w-[1280px] mx-auto px-4 sm:px-6 lg:px-8">
            <div class="bg-[#dcdcdc] rounded-3xl overflow-hidden shadow-xl border border-gray-300 relative">
                <div class="grid grid-cols-1 md:grid-cols-12 items-center">
                    <div class="p-8 sm:p-12 md:col-span-7 lg:col-span-8 space-y-6">
                        <h2 class="text-2xl sm:text-3xl lg:text-4xl font-black text-gray-900 leading-tight">
                            {{ __('Konsultasi Masalah dan Perawatan Rumah Gratis') }}
                        </h2>
                        <div class="pt-2">
                            <a href="https://wa.me/6281217597109?text=Halo%20KOOTA%20SERVICES,%20saya%20ingin%20konsultasi%20perawatan%20rumah%20gratis." target="_blank" class="inline-flex items-center gap-3 px-8 py-4 rounded-full bg-[#25D366] hover:bg-[#20ba59] text-white font-bold text-sm sm:text-base transition-all shadow-lg shadow-emerald-600/30 active:scale-95">
                                <span>{{ __('Konsultasi Dengan Ahlinya') }}</span>
                            </a>
                        </div>
                    </div>
                    <div class="md:col-span-5 lg:col-span-4 flex justify-center md:justify-end items-end pt-4 pr-0 sm:pr-8">
                        <img src="{{ asset('images/kenzo-yanuar.png') }}" alt="Kenzo Yanuar - Founder & CEO Koota Services" class="h-64 sm:h-76 md:h-84 object-contain filter drop-shadow-2xl">
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

                <div class="lg:col-span-4">
                    <div class="bg-white p-8 rounded-3xl border border-gray-200 text-center space-y-5 shadow-xs">
                        <h3 class="text-xl font-bold text-gray-900 leading-tight">
                            {{ __('Punya pertanyaan lain?') }}
                        </h3>
                        <p class="text-xs text-gray-600 leading-relaxed">
                            {{ __('Hubungi konsultan kami langsung untuk konsultasi gratis mengenai kebutuhan fasilitas Anda.') }}
                        </p>
                        <div class="pt-2">
                            <a href="https://wa.me/6281217597109?text=Halo%20KOOTA%20SERVICES,%20saya%20ingin%20konsultasi." target="_blank" class="w-full inline-flex items-center justify-center gap-2 py-3.5 rounded-xl bg-[#25d366] hover:bg-[#20ba59] text-white font-bold text-xs sm:text-sm transition-all shadow-md active:scale-95">
                                <span>{{ __('Tanya Ahlinya via WA') }}</span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
