@extends('layouts.app')

@section('title', 'Tentang KOOTA SERVICES - Solusi Fasilitas Terintegrasi')

@section('content')
    <!-- Top Hero Section -->
    <section class="py-16 md:py-24 bg-[#fcf9f8] border-b border-gray-100">
        <div class="max-w-[1280px] mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 lg:grid-cols-12 gap-12 items-center">
                <!-- Left: Info -->
                <div class="lg:col-span-6 space-y-6">
                    <h1 class="text-4xl sm:text-5xl lg:text-6xl font-extrabold tracking-tight text-[#1c1b1b] leading-[1.1]">
                        {{ __('Tentang') }} <br>
                        <span class="text-[#820003]">Koota Services</span>
                    </h1>

                    <p class="text-base sm:text-lg text-gray-600 leading-relaxed max-w-xl">
                        {{ __('Mitra terpercaya untuk layanan fasilitas komersial, industri, dan perumahan di Surabaya, Malang, Bali, dan Jakarta. Kami mendedikasikan diri untuk menciptakan lingkungan yang bersih, aman, dan berkelanjutan.') }}
                    </p>
                </div>

                <!-- Right: Image -->
                <div class="lg:col-span-6">
                    <div class="rounded-3xl overflow-hidden shadow-2xl border border-gray-100 bg-white">
                        <img src="{{ asset('images/team-indonesia.jpg') }}" alt="Tim Profesional Koota Services" class="w-full h-[360px] sm:h-[420px] object-cover">
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Section: Siapa Kami & Perjalanan Kami -->
    <section class="py-20 bg-white border-b border-gray-100">
        <div class="max-w-[1280px] mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 lg:grid-cols-12 gap-12 items-start">
                <!-- Left Column: Siapa Kami? -->
                <div class="lg:col-span-5 space-y-4">
                    <h2 class="text-3xl sm:text-4xl font-extrabold text-[#1c1b1b] tracking-tight">
                        {{ __('Siapa Kami?') }}
                    </h2>
                    <p class="text-xs sm:text-sm text-gray-600 leading-relaxed max-w-md">
                        {{ __('Berawal dari dedikasi mempersembahkan kualitas perawatan fasilitas, KOOTA SERVICES tumbuh menjadi penyedia solusi terintegrasi satu pintu (One-Stop Facility Services).') }}
                    </p>
                    <div class="pt-2 text-xs text-gray-500 space-y-1">
                        <p class="font-bold text-gray-900">{{ __('Area Operasional:') }}</p>
                        <p class="text-[#820003] font-bold">Surabaya • Malang • Bali • Jakarta</p>
                    </div>
                </div>

                <!-- Right Column: Perjalanan Kami Card + 2 Mini Cards -->
                <div class="lg:col-span-7 space-y-6">
                    <!-- Perjalanan Kami Card -->
                    <div class="bg-[#fcf9f8] p-8 rounded-3xl border border-gray-100 shadow-2xs space-y-4 relative">
                        <div class="flex items-center justify-between">
                            <h3 class="text-lg font-bold text-gray-900">
                                {{ __('Perjalanan & Komitmen Kami') }}
                            </h3>
                            <div class="w-8 h-8 rounded-full bg-red-50 text-[#820003] flex items-center justify-center">
                                <svg class="w-4 h-4 stroke-current" fill="none" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                </svg>
                            </div>
                        </div>
                        <p class="text-xs sm:text-sm text-gray-600 leading-relaxed">
                            {{ __('Didirikan dengan tujuan memberikan solusi perawatan terbaik, KOOTA SERVICES berfokus pada integrasi teknologi dan tenaga kerja profesional tersertifikasi. Kami memahami bahwa setiap fasilitas memiliki kebutuhan unik, sehingga kami merancang layanan yang adaptif dan efisien untuk memastikan kelancaran operasional klien kami, dari perumahan hingga kompleks komersial industri.') }}
                        </p>
                    </div>

                    <!-- 2 Mini Cards -->
                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                        <div class="bg-[#fcf9f8] p-6 rounded-2xl border border-gray-100 flex items-start gap-3.5 shadow-2xs">
                            <div class="w-9 h-9 rounded-xl bg-red-50 text-[#820003] flex items-center justify-center shrink-0 font-bold">
                                ✓
                            </div>
                            <div>
                                <h4 class="text-xs font-bold text-gray-900">{{ __('Legalitas & Kepatuhan') }}</h4>
                                <p class="text-[11px] text-gray-500 mt-0.5">{{ __('Dokumen operasional dan sertifikasi baku mutu resmi.') }}</p>
                            </div>
                        </div>

                        <div class="bg-[#fcf9f8] p-6 rounded-2xl border border-gray-100 flex items-start gap-3.5 shadow-2xs">
                            <div class="w-9 h-9 rounded-xl bg-red-50 text-[#820003] flex items-center justify-center shrink-0 font-bold">
                                ★
                            </div>
                            <div>
                                <h4 class="text-xs font-bold text-gray-900">{{ __('Tim Profesional') }}</h4>
                                <p class="text-[11px] text-gray-500 mt-0.5">{{ __('Tenaga kerja terlatih dengan standar SOP industri ketat.') }}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Section: Visi & Misi Kami -->
    <section class="py-20 bg-[#fcf9f8] border-b border-gray-100">
        <div class="max-w-[1280px] mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                <!-- Card 1: Visi Kami -->
                <div class="bg-white p-8 sm:p-10 rounded-3xl border border-gray-100 shadow-xs space-y-6">
                    <div class="w-11 h-11 rounded-xl bg-red-50 text-[#820003] flex items-center justify-center font-bold">
                        <svg class="w-6 h-6 stroke-current" fill="none" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/>
                        </svg>
                    </div>

                    <h3 class="text-2xl font-extrabold text-[#820003]">
                        {{ __('Visi Kami') }}
                    </h3>

                    <p class="text-xs sm:text-sm text-gray-600 leading-relaxed">
                        {{ __('Menjadi penyedia layanan perawatan fasilitas, kebersihan profesional, dan manajemen lingkungan terkemuka di Indonesia dengan standar kualitas unggul, inovatif, dan berkelanjutan.') }}
                    </p>
                </div>

                <!-- Card 2: Misi Kami -->
                <div class="bg-white p-8 sm:p-10 rounded-3xl border border-gray-100 shadow-xs space-y-6">
                    <div class="w-11 h-11 rounded-xl bg-red-50 text-[#820003] flex items-center justify-center font-bold">
                        <svg class="w-6 h-6 stroke-current" fill="none" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                        </svg>
                    </div>

                    <h3 class="text-2xl font-extrabold text-[#820003]">
                        {{ __('Misi Kami') }}
                    </h3>

                    <ul class="space-y-3">
                        <li class="flex items-start gap-3 text-xs sm:text-sm text-gray-600 leading-relaxed">
                            <span class="text-[#820003] font-bold text-sm shrink-0">✓</span>
                            <span>{{ __('Memberikan layanan pemeliharaan komersial dan residensial berstandar tinggi.') }}</span>
                        </li>
                        <li class="flex items-start gap-3 text-xs sm:text-sm text-gray-600 leading-relaxed">
                            <span class="text-[#820003] font-bold text-sm shrink-0">✓</span>
                            <span>{{ __('Menerapkan solusi ramah lingkungan dan teknologi modern dalam setiap operasional.') }}</span>
                        </li>
                        <li class="flex items-start gap-3 text-xs sm:text-sm text-gray-600 leading-relaxed">
                            <span class="text-[#820003] font-bold text-sm shrink-0">✓</span>
                            <span>{{ __('Mengutamakan keselamatan kerja, ketepatan waktu, dan kepuasan pelanggan prima.') }}</span>
                        </li>
                    </ul>
                </div>
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

    <!-- Why Us Section (Official 4 Points) -->
    <section class="py-24 bg-[#fcf9f8] border-b border-gray-100">
        <div class="max-w-[1280px] mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 lg:grid-cols-12 gap-12 items-center">
                <div class="lg:col-span-5 space-y-6">
                    <div class="inline-flex items-center gap-2 px-3 py-1 rounded-full bg-red-50 text-[#820003] text-xs font-bold uppercase tracking-wider">
                        ★ {{ __('Kenapa Memilih Kami?') }}
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
