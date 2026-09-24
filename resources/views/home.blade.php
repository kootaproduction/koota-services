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
                        <span class="text-[#16a34a]">{{ __('Kota Bersih') }}</span>
                    </h1>
                    <p class="text-base sm:text-lg text-gray-600 leading-relaxed max-w-xl">
                        {{ __('Solusi terintegrasi perawatan rumah dan fasilitas properti Anda. Dari pembersihan rumah profesional, perbaikan & renovasi terpercaya, hingga pengelolaan dan pengangkutan sampah terjadwal.') }}
                    </p>
                    <div class="pt-2 flex flex-wrap gap-4 items-center">
                        <!-- Action Konsultasi Urgensi Hijau WhatsApp -->
                        <a href="https://wa.me/6281217597109?text=Halo%20KOOTA%20SERVICES,%20saya%20ingin%20berkonsultasi." target="_blank" class="px-7 py-3.5 rounded-xl bg-[#25d366] hover:bg-[#20ba59] text-white font-extrabold text-sm sm:text-base transition-all shadow-lg hover:shadow-xl flex items-center gap-2.5 group active:scale-95 ring-2 ring-green-400/30">
                            <svg class="w-5 h-5 fill-current" viewBox="0 0 24 24">
                                <path d="M.057 24l1.687-6.163c-1.041-1.804-1.588-3.849-1.587-5.946.003-6.556 5.338-11.891 11.893-11.891 3.181.001 6.167 1.24 8.413 3.488 2.245 2.248 3.481 5.236 3.48 8.414-.003 6.557-5.338 11.892-11.893 11.892-1.99-.001-3.951-.5-5.688-1.448l-6.305 1.654zm6.597-3.807c1.676.995 3.276 1.591 5.392 1.592 5.448 0 9.886-4.434 9.889-9.885.002-5.462-4.415-9.89-9.881-9.892-5.452 0-9.887 4.434-9.889 9.884-.001 2.225.651 3.891 1.746 5.634l-.999 3.648 3.742-.981zm11.387-5.464c-.074-.124-.272-.198-.57-.347-.297-.149-1.758-.868-2.031-.967-.272-.099-.47-.149-.669.149-.198.297-.768.967-.941 1.165-.173.198-.347.223-.644.074-.297-.149-1.255-.462-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.297-.347.446-.521.151-.172.2-.296.3-.495.099-.198.05-.372-.025-.521-.075-.148-.669-1.611-.916-2.206-.242-.579-.487-.501-.669-.51l-.57-.01c-.198 0-.52.074-.792.372s-1.04 1.016-1.04 2.479 1.065 2.876 1.213 3.074c.149.198 2.095 3.2 5.076 4.487.709.306 1.263.489 1.694.626.712.226 1.36.194 1.872.118.571-.085 1.758-.719 2.006-1.413.248-.695.248-1.29.173-1.414z"/>
                            </svg>
                            <span>{{ __('Konsultasi Sekarang') }}</span>
                        </a>
                        <a href="{{ route('services.index') }}" class="px-7 py-3.5 rounded-xl bg-white border border-gray-200 hover:bg-gray-50 text-gray-800 font-bold text-sm sm:text-base transition-colors shadow-2xs">
                            {{ __('Lihat Layanan') }}
                        </a>
                    </div>
                </div>

                <!-- Right Column: Hero Image with Floating Badge (Indonesian Facility / Architecture) -->
                <div class="lg:col-span-6 relative">
                    <div class="relative rounded-3xl overflow-hidden shadow-2xl border border-gray-100 bg-white">
                        <img src="/images/team-indonesia.jpg" alt="Tim Profesional KOOTA SERVICE" class="w-full h-[380px] sm:h-[460px] object-cover">
                        
                        <!-- Floating Badge -->
                        <div class="absolute bottom-6 left-6 bg-white/95 backdrop-blur-md p-4 rounded-2xl shadow-xl border border-gray-100 flex items-center gap-3">
                            <div class="w-11 h-11 rounded-xl bg-green-50 text-[#16a34a] flex items-center justify-center font-bold">
                                <svg class="w-6 h-6 stroke-current" fill="none" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                </svg>
                            </div>
                            <div>
                                <p class="text-[10px] font-bold text-[#16a34a] uppercase tracking-wider">{{ __('Layanan Terpercaya') }}</p>
                                <p class="text-xs sm:text-sm font-extrabold text-gray-900">{{ __('3 Layanan Terpadu & Bergaransi') }}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Section 2: Layanan Utama Kami (3 Services Only) -->
    <section id="layanan-utama" class="py-20 bg-white border-b border-gray-100">
        <div class="max-w-[1280px] mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center max-w-3xl mx-auto space-y-3 mb-16">
                <h2 class="text-3xl sm:text-4xl font-extrabold text-[#1c1b1b] tracking-tight">
                    {{ __('Layanan Utama Kami') }}
                </h2>
                <p class="text-sm sm:text-base text-gray-600">
                    {{ __('Solusi terpadu dan terpercaya untuk kebersihan hunian, perbaikan rumah, serta pengelolaan sampah yang higienis.') }}
                </p>
            </div>

            <!-- Service Cards Grid: 3 Clean Columns -->
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                @foreach($services as $service)
                    <div class="bg-[#fcf9f8] rounded-3xl overflow-visible border border-gray-100 shadow-sm hover:shadow-xl transition-all duration-300 group flex flex-col justify-between hover:-translate-y-1">
                        <div>
                            <!-- Top Image -->
                            <div class="h-52 overflow-hidden rounded-t-3xl relative bg-gray-100">
                                <img src="{{ $service->hero_image }}" alt="{{ $service->title }}" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500">
                            </div>

                            <!-- Content -->
                            <div class="p-6 space-y-3">
                                <h3 class="text-xl font-bold text-[#1c1b1b] group-hover:text-[#820003] transition-colors leading-snug">
                                    {{ __($service->title) }}
                                </h3>

                                <p class="text-xs sm:text-sm text-gray-600 leading-relaxed line-clamp-3">
                                    {{ __($service->subtitle ?? $service->description) }}
                                </p>
                            </div>
                        </div>

                        <div class="px-6 pb-6 pt-2">
                            <a href="{{ route('services.show', $service->slug) }}" class="inline-flex items-center gap-1.5 text-xs sm:text-sm font-bold text-[#820003] hover:text-[#16a34a] transition-colors">
                                <span>{{ __('Pelajari Selengkapnya') }}</span>
                            </a>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    <!-- Section 3: Bagian Why Us (Official 4 Points from User) -->
    <section class="py-20 bg-[#fcf9f8] border-b border-gray-100">
        <div class="max-w-[1280px] mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 lg:grid-cols-12 gap-12 items-center">
                <!-- Left: Local Indonesian Team Photo -->
                <div class="lg:col-span-5">
                    <div class="rounded-3xl overflow-hidden shadow-xl border border-gray-100 bg-white relative">
                        <img src="/images/team-indonesia.jpg" alt="Tim Profesional Lokal KOOTA SERVICE" class="w-full h-[450px] object-cover">
                        <div class="absolute bottom-4 left-4 right-4 bg-white/95 backdrop-blur-md p-4 rounded-2xl border border-gray-100 shadow-lg">
                            <p class="text-xs font-bold text-[#820003] uppercase tracking-wider">Kualitas Terjamin</p>
                            <p class="text-sm font-extrabold text-gray-900">SDM Profesional & Berpengalaman</p>
                        </div>
                    </div>
                </div>

                <!-- Right: Official 4 Poin Why Us -->
                <div class="lg:col-span-7 space-y-6">
                    <div>
                        <span class="text-[11px] font-extrabold uppercase tracking-widest text-[#820003] block">
                            {{ __('KENAPA MEMILIH KAMI') }}
                        </span>
                        <h2 class="text-3xl sm:text-4xl font-extrabold text-[#1c1b1b] tracking-tight mt-1 leading-snug">
                            {{ __('Standar Terbaik untuk Perawatan Rumah Anda') }}
                        </h2>
                    </div>

                    <!-- 4 Points Cards -->
                    <div class="space-y-4">
                        <!-- Point 1 -->
                        <div class="bg-white p-5 rounded-2xl border border-gray-100 shadow-2xs flex items-start gap-4">
                            <div class="w-10 h-10 rounded-xl bg-red-50 text-[#820003] flex items-center justify-center font-extrabold text-sm shrink-0">
                                01
                            </div>
                            <div class="space-y-1">
                                <h3 class="text-sm sm:text-base font-bold text-gray-900">
                                    Didukung SDM Ahli & Berpengalaman
                                </h3>
                                <p class="text-xs sm:text-sm text-gray-600 leading-relaxed">
                                    Kami hanya mengirimkan tenaga kerja pilihan yang telah memiliki jam terbang tinggi di bidangnya, memastikan setiap sudut rumah Anda ditangani oleh tangan-tangan profesional yang terampil.
                                </p>
                            </div>
                        </div>

                        <!-- Point 2 -->
                        <div class="bg-white p-5 rounded-2xl border border-gray-100 shadow-2xs flex items-start gap-4">
                            <div class="w-10 h-10 rounded-xl bg-green-50 text-[#16a34a] flex items-center justify-center font-extrabold text-sm shrink-0">
                                02
                            </div>
                            <div class="space-y-1">
                                <h3 class="text-sm sm:text-base font-bold text-gray-900">
                                    Jaminan Kualitas Hasil Kerja (Garansi)
                                </h3>
                                <p class="text-xs sm:text-sm text-gray-600 leading-relaxed">
                                    Kenyamanan Anda adalah prioritas utama. Kami memberikan garansi penuh atas setiap layanan—jika hasil pekerjaan belum sesuai standar, kami siap memperbaikinya untuk Anda.
                                </p>
                            </div>
                        </div>

                        <!-- Point 3 -->
                        <div class="bg-white p-5 rounded-2xl border border-gray-100 shadow-2xs flex items-start gap-4">
                            <div class="w-10 h-10 rounded-xl bg-red-50 text-[#820003] flex items-center justify-center font-extrabold text-sm shrink-0">
                                03
                            </div>
                            <div class="space-y-1">
                                <h3 class="text-sm sm:text-base font-bold text-gray-900">
                                    Dukungan Layanan Pelanggan 24/7
                                </h3>
                                <p class="text-xs sm:text-sm text-gray-600 leading-relaxed">
                                    Tim Customer Service kami aktif dan siap sedia setiap saat untuk membantu kebutuhan mendesak Anda, lengkap dengan layanan purnajual (after-sales) yang responsif.
                                </p>
                            </div>
                        </div>

                        <!-- Point 4 -->
                        <div class="bg-white p-5 rounded-2xl border border-gray-100 shadow-2xs flex items-start gap-4">
                            <div class="w-10 h-10 rounded-xl bg-green-50 text-[#16a34a] flex items-center justify-center font-extrabold text-sm shrink-0">
                                04
                            </div>
                            <div class="space-y-1">
                                <h3 class="text-sm sm:text-base font-bold text-gray-900">
                                    Solusi Perawatan Rumah Terintegrasi
                                </h3>
                                <p class="text-xs sm:text-sm text-gray-600 leading-relaxed">
                                    Mulai dari pembersihan total, perawatan AC, perbaikan listrik/air, hingga jasa tukang harian—semua kebutuhan perawatan properti Anda tersedia dalam satu layanan praktis.
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Section 4: Banner CTA Konsultasi Baru (Exact from Gambar 3 with Kenzo Yanuar) -->
    <section class="py-16 bg-[#fcf9f8] border-b border-gray-100">
        <div class="max-w-[1280px] mx-auto px-4 sm:px-6 lg:px-8">
            <div class="relative bg-[#d6d8db] rounded-3xl overflow-hidden shadow-xl border border-gray-300">
                <div class="grid grid-cols-1 lg:grid-cols-12 items-center">
                    <!-- Left Content -->
                    <div class="lg:col-span-7 p-8 sm:p-12 lg:p-14 space-y-4 z-10">
                        <h3 class="text-2xl sm:text-3xl lg:text-4xl font-extrabold text-[#1c1b1b] tracking-tight leading-snug">
                            Konsultasi Masalah dan Perawatan Rumah Gratis
                        </h3>
                        <p class="text-gray-700 text-xs sm:text-sm sm:leading-relaxed max-w-xl">
                            Ceritakan kebutuhan Anda, kami siap bantu jadwalkan kunjungan tenaga ahli untuk solusi rumah bersih dan terawat.
                        </p>
                        <div class="pt-3">
                            <a href="https://wa.me/6281217597109?text=Halo%20KOOTA%20SERVICES,%20saya%20ingin%20berkonsultasi." target="_blank" class="inline-flex items-center gap-2.5 px-6 sm:px-8 py-3.5 rounded-full bg-[#16a34a] hover:bg-[#15803d] text-white font-bold text-xs sm:text-sm shadow-md hover:shadow-lg transition-all active:scale-95">
                                <svg class="w-5 h-5 fill-current" viewBox="0 0 24 24">
                                    <path d="M.057 24l1.687-6.163c-1.041-1.804-1.588-3.849-1.587-5.946.003-6.556 5.338-11.891 11.893-11.891 3.181.001 6.167 1.24 8.413 3.488 2.245 2.248 3.481 5.236 3.48 8.414-.003 6.557-5.338 11.892-11.893 11.892-1.99-.001-3.951-.5-5.688-1.448l-6.305 1.654zm6.597-3.807c1.676.995 3.276 1.591 5.392 1.592 5.448 0 9.886-4.434 9.889-9.885.002-5.462-4.415-9.89-9.881-9.892-5.452 0-9.887 4.434-9.889 9.884-.001 2.225.651 3.891 1.746 5.634l-.999 3.648 3.742-.981zm11.387-5.464c-.074-.124-.272-.198-.57-.347-.297-.149-1.758-.868-2.031-.967-.272-.099-.47-.149-.669.149-.198.297-.768.967-.941 1.165-.173.198-.347.223-.644.074-.297-.149-1.255-.462-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.297-.347.446-.521.151-.172.2-.296.3-.495.099-.198.05-.372-.025-.521-.075-.148-.669-1.611-.916-2.206-.242-.579-.487-.501-.669-.51l-.57-.01c-.198 0-.52.074-.792.372s-1.04 1.016-1.04 2.479 1.065 2.876 1.213 3.074c.149.198 2.095 3.2 5.076 4.487.709.306 1.263.489 1.694.626.712.226 1.36.194 1.872.118.571-.085 1.758-.719 2.006-1.413.248-.695.248-1.29.173-1.414z"/>
                                </svg>
                                <span>Konsultasi Dengan Ahlinya</span>
                            </a>
                        </div>
                    </div>

                    <!-- Right Image: Kenzo Yanuar (CEO) -->
                    <div class="lg:col-span-5 relative flex justify-center lg:justify-end items-end pt-4 lg:pt-0 overflow-hidden">
                        <img src="/images/kenzo-yanuar.png" alt="Kenzo Yanuar - CEO Koota Production" class="w-auto h-72 sm:h-80 md:h-96 object-contain object-bottom select-none">
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
                                <span class="text-base sm:text-lg font-bold text-gray-900 group-hover:text-[#16a34a] transition-colors">
                                    0{{ $loop->iteration }} {{ __($faq->question) }}
                                </span>
                                <svg class="w-5 h-5 text-gray-400 transition-transform duration-200" :class="{ 'rotate-180 text-[#16a34a]': activeFaq === {{ $faq->id }} }" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/>
                                </svg>
                            </button>
                            <div x-show="activeFaq === {{ $faq->id }}" x-collapse class="mt-2 text-xs sm:text-sm text-gray-600 leading-relaxed pr-6">
                                {{ __($faq->answer) }}
                            </div>
                        </div>
                    @endforeach
                </div>

                <!-- Right: Ask Box with Urgent WhatsApp CTA -->
                <div class="lg:col-span-4">
                    <div class="bg-[#fcf9f8] p-8 rounded-3xl border border-gray-200 text-center space-y-5 shadow-xs">
                        <h3 class="text-xl font-bold text-gray-900 leading-tight">
                            {{ __('Punya pertanyaan lain?') }}
                        </h3>
                        <p class="text-xs text-gray-600 leading-relaxed">
                            {{ __('Tim konsultan kami siap membantu memberikan solusi terbaik sesuai kebutuhan spesifik Anda.') }}
                        </p>
                        <div class="pt-2">
                            <a href="https://wa.me/6281217597109?text=Halo%20KOOTA%20SERVICES,%20saya%20ingin%20berkonsultasi." target="_blank" class="w-full inline-flex items-center justify-center gap-2 py-3.5 rounded-xl bg-[#25d366] hover:bg-[#20ba59] text-white font-bold text-xs sm:text-sm transition-all shadow-md active:scale-95">
                                <svg class="w-4 h-4 fill-current" viewBox="0 0 24 24">
                                    <path d="M.057 24l1.687-6.163c-1.041-1.804-1.588-3.849-1.587-5.946.003-6.556 5.338-11.891 11.893-11.891 3.181.001 6.167 1.24 8.413 3.488 2.245 2.248 3.481 5.236 3.48 8.414-.003 6.557-5.338 11.892-11.893 11.892-1.99-.001-3.951-.5-5.688-1.448l-6.305 1.654zm6.597-3.807c1.676.995 3.276 1.591 5.392 1.592 5.448 0 9.886-4.434 9.889-9.885.002-5.462-4.415-9.89-9.881-9.892-5.452 0-9.887 4.434-9.889 9.884-.001 2.225.651 3.891 1.746 5.634l-.999 3.648 3.742-.981zm11.387-5.464c-.074-.124-.272-.198-.57-.347-.297-.149-1.758-.868-2.031-.967-.272-.099-.47-.149-.669.149-.198.297-.768.967-.941 1.165-.173.198-.347.223-.644.074-.297-.149-1.255-.462-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.297-.347.446-.521.151-.172.2-.296.3-.495.099-.198.05-.372-.025-.521-.075-.148-.669-1.611-.916-2.206-.242-.579-.487-.501-.669-.51l-.57-.01c-.198 0-.52.074-.792.372s-1.04 1.016-1.04 2.479 1.065 2.876 1.213 3.074c.149.198 2.095 3.2 5.076 4.487.709.306 1.263.489 1.694.626.712.226 1.36.194 1.872.118.571-.085 1.758-.719 2.006-1.413.248-.695.248-1.29.173-1.414z"/>
                                </svg>
                                <span>{{ __('Tanya Ahlinya!') }}</span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
