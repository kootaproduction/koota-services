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
                    <div class="relative">
                        <div class="city-hero" data-city-hero>
                            <img
                                class="city-hero__image"
                                src="/images/city-hero.png"
                                data-city-hero-image
                                data-primary-src="/images/city-hero.png"
                                data-fallback-src="/images/team-indonesia.png"
                                alt="KOOTA SERVICES menyediakan layanan kebersihan dan perawatan properti."
                                decoding="async"
                                fetchpriority="high"
                            >
                            <div class="city-hero__colorwash" aria-hidden="true"></div>
                            <p class="city-hero__status" data-city-hero-status role="status" aria-live="polite" hidden>
                                Gambar hero tidak tersedia.
                            </p>
                        </div>
                        
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Section 2: Layanan Utama Kami (3 Services Only) -->
    <section id="layanan-utama" class="py-20 bg-white border-b border-gray-100">
        <div class="max-w-[1280px] mx-auto px-4 sm:px-6 lg:px-8 space-y-14">
            <div class="text-center max-w-3xl mx-auto space-y-3">
                <div class="inline-flex items-center justify-center gap-3">
                    <span class="w-8 h-[1.5px] bg-[#820003]/30 rounded-full"></span>
                    <span class="font-serif-brand italic text-base sm:text-lg font-bold text-[#820003] tracking-wide">
                        {{ __('Layanan Terpadu') }}
                    </span>
                    <span class="w-8 h-[1.5px] bg-[#820003]/30 rounded-full"></span>
                </div>
                <h2 class="text-3xl sm:text-4xl font-extrabold text-[#1c1b1b] tracking-tight">
                    {{ __('Layanan Utama Kami') }}
                </h2>
                <p class="text-sm sm:text-base text-gray-600">
                    {{ __('Solusi terpadu dan terpercaya untuk kebersihan hunian, perbaikan rumah, serta pengelolaan sampah yang higienis.') }}
                </p>
            </div>

            <!-- Service Cards Grid: 3 Clean Columns with Hover Expansion (Agak sama dengan blog tapi khusus layanan) -->
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                @foreach($services as $service)
                    <div class="service-interactive-card group shadow-md hover:shadow-2xl transition-all duration-500 hover:-translate-y-2 flex flex-col justify-end">
                        
                        <!-- Background Image with Zoom on Hover -->
                        <img src="{{ $service->hero_image }}" 
                             alt="{{ $service->title }}" 
                             class="absolute inset-0 w-full h-full object-cover transition-transform duration-700 ease-out group-hover:scale-110">

                        <!-- Dynamic Gradient Overlay with Signature KOOTA Dark Red on Hover -->
                        <div class="service-card-overlay"></div>

                        <!-- Card Content -->
                        <div class="relative z-20 p-6 sm:p-7 flex flex-col justify-end w-full text-white pointer-events-auto">
                            <!-- Service Title -->
                            <h3 class="text-2xl font-extrabold text-white leading-tight tracking-tight drop-shadow-sm group-hover:text-red-200 transition-colors duration-300">
                                {{ __($service->title) }}
                            </h3>

                            <p class="text-xs sm:text-sm text-gray-300 font-medium mt-1.5 line-clamp-1">
                                {{ __($service->subtitle ?? 'Layanan Profesional Bergaransi') }}
                            </p>

                            <!-- Expandable Description & Action Button on Hover -->
                            <div class="service-card-expandable">
                                <div class="service-card-expandable-content">
                                    <p class="service-card-anim-item text-xs sm:text-[13px] text-gray-200 leading-relaxed mt-3 line-clamp-3">
                                        {{ __($service->description) }}
                                    </p>

                                    <div class="service-card-anim-item service-card-anim-item-delay mt-4 pt-3.5 border-t border-white/20 flex items-center justify-between">
                                        <!-- Primary Detail Button -->
                                        <span class="inline-flex items-center gap-2 px-5 py-2.5 rounded-xl bg-white text-[#820003] hover:bg-gray-100 font-bold text-xs sm:text-sm shadow-md transition-all">
                                            <span>{{ __('Pelajari Layanan') }}</span>
                                            <svg class="w-4 h-4 transform group-hover:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M14 5l7 7m0 0l-7 7m7-7H3"/>
                                            </svg>
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Card link overlay to detail page -->
                        <a href="{{ route('services.show', $service->slug) }}" class="absolute inset-0 z-20 focus:outline-none focus:ring-2 focus:ring-[#820003] rounded-3xl" aria-label="{{ __($service->title) }}"></a>
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
                        <img src="/images/tim.png" alt="Tim Profesional Lokal KOOTA SERVICE" class="w-full h-[450px] object-cover">
                        <div class="absolute bottom-4 left-4 right-4 bg-white/95 backdrop-blur-md p-4 rounded-2xl border border-gray-100 shadow-lg">
                            <p class="text-xs font-bold text-[#820003] uppercase tracking-wider">Kualitas Terjamin</p>
                            <p class="text-sm font-extrabold text-gray-900">SDM Profesional & Berpengalaman</p>
                        </div>
                    </div>
                </div>

                <!-- Right: Official 4 Poin Why Us -->
                <div class="lg:col-span-7 space-y-6">
                    <div>
                        <div class="inline-flex items-center gap-3 mb-1.5">
                            <span class="w-8 h-[1.5px] bg-[#820003]/30 rounded-full"></span>
                            <span class="font-serif-brand italic text-base sm:text-lg font-bold text-[#820003] tracking-wide">
                                {{ __('Kenapa Memilih Kami') }}
                            </span>
                        </div>
                        <h2 class="text-3xl sm:text-4xl font-extrabold text-[#1c1b1b] tracking-tight mt-1 leading-snug">
                            {{ __('Standar Terbaik untuk Perawatan Rumah Anda') }}
                        </h2>
                    </div>

                    <!-- 4 Points Cards -->
                    <div class="space-y-4">
                        <!-- Point 1 -->
                        <div class="relative overflow-hidden bg-white rounded-2xl border border-gray-100 shadow-2xs">
                            <div class="absolute top-0 right-0 w-14 h-12 sm:w-16 sm:h-14 bg-[#b00000] text-white rounded-bl-2xl flex items-center justify-center font-extrabold text-sm">
                                01
                            </div>
                            <div class="p-5 pr-20 space-y-1">
                                <h3 class="text-sm sm:text-base font-bold text-gray-900">
                                    Didukung SDM Ahli & Berpengalaman
                                </h3>
                                <p class="text-xs sm:text-sm text-gray-600 leading-relaxed">
                                    Kami hanya mengirimkan tenaga kerja pilihan yang telah memiliki jam terbang tinggi di bidangnya, memastikan setiap sudut rumah Anda ditangani oleh tangan-tangan profesional yang terampil.
                                </p>
                            </div>
                        </div>

                        <!-- Point 2 -->
                        <div class="relative overflow-hidden bg-white rounded-2xl border border-gray-100 shadow-2xs">
                            <div class="absolute top-0 right-0 w-14 h-12 sm:w-16 sm:h-14 bg-[#b00000] text-white rounded-bl-2xl flex items-center justify-center font-extrabold text-sm">
                                02
                            </div>
                            <div class="p-5 pr-20 space-y-1">
                                <h3 class="text-sm sm:text-base font-bold text-gray-900">
                                    Jaminan Kualitas Hasil Kerja (Garansi)
                                </h3>
                                <p class="text-xs sm:text-sm text-gray-600 leading-relaxed">
                                    Kenyamanan Anda adalah prioritas utama. Kami memberikan garansi penuh atas setiap layanan—jika hasil pekerjaan belum sesuai standar, kami siap memperbaikinya untuk Anda.
                                </p>
                            </div>
                        </div>

                        <!-- Point 3 -->
                        <div class="relative overflow-hidden bg-white rounded-2xl border border-gray-100 shadow-2xs">
                            <div class="absolute top-0 right-0 w-14 h-12 sm:w-16 sm:h-14 bg-[#b00000] text-white rounded-bl-2xl flex items-center justify-center font-extrabold text-sm">
                                03
                            </div>
                            <div class="p-5 pr-20 space-y-1">
                                <h3 class="text-sm sm:text-base font-bold text-gray-900">
                                    Dukungan Layanan Pelanggan 24/7
                                </h3>
                                <p class="text-xs sm:text-sm text-gray-600 leading-relaxed">
                                    Tim Customer Service kami aktif dan siap sedia setiap saat untuk membantu kebutuhan mendesak Anda, lengkap dengan layanan purnajual (after-sales) yang responsif.
                                </p>
                            </div>
                        </div>

                        <!-- Point 4 -->
                        <div class="relative overflow-hidden bg-white rounded-2xl border border-gray-100 shadow-2xs">
                            <div class="absolute top-0 right-0 w-14 h-12 sm:w-16 sm:h-14 bg-[#b00000] text-white rounded-bl-2xl flex items-center justify-center font-extrabold text-sm">
                                04
                            </div>
                            <div class="p-5 pr-20 space-y-1">
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

    <!-- Section: Transformasi Before & After -->
    @if(isset($transformations) && $transformations->isNotEmpty())
        <section class="py-20 bg-white border-b border-gray-100">
            <div class="max-w-[1280px] mx-auto px-4 sm:px-6 lg:px-8 space-y-12">
                <!-- Section Header -->
                <div class="text-center max-w-3xl mx-auto space-y-3">
                    <div class="inline-flex items-center gap-3">
                        <span class="w-8 h-[1.5px] bg-[#820003]/30 rounded-full"></span>
                        <span class="font-serif-brand italic text-base sm:text-lg font-bold text-[#820003] tracking-wide">
                            {{ __('Hasil Nyata Pengerjaan') }}
                        </span>
                        <span class="w-8 h-[1.5px] bg-[#820003]/30 rounded-full"></span>
                    </div>
                    <h2 class="text-3xl sm:text-4xl font-extrabold text-[#1c1b1b] tracking-tight">
                        {{ __('Transformasi Before & After') }}
                    </h2>
                    <p class="text-xs sm:text-sm text-gray-600 leading-relaxed max-w-xl mx-auto">
                        {{ __('Bukti komitmen kualitas kami dalam merawat kebersihan tandon, mengatasi kebocoran bangunan, hingga evakuasi puing properti Anda.') }}
                    </p>
                </div>

                <!-- Grid Cards -->
                <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                    @foreach($transformations as $item)
                        <div class="bg-[#fcf9f8] rounded-3xl border border-gray-200/80 overflow-hidden shadow-xs hover:shadow-xl transition-all duration-300 flex flex-col justify-between">
                            <!-- Before & After Comparison Frame -->
                            <div class="grid grid-cols-2 h-56 sm:h-64 relative bg-gray-900 overflow-hidden">
                                <div class="relative group">
                                    <img src="{{ $item->image_before }}" alt="Sebelum" class="w-full h-full object-cover">
                                    <span class="absolute bottom-3 left-3 px-2.5 py-1 rounded-lg text-[10px] font-black uppercase bg-red-600 text-white shadow-md">
                                        BEFORE
                                    </span>
                                </div>
                                <div class="relative group border-l-2 border-white/40">
                                    <img src="{{ $item->image_after }}" alt="Sesudah" class="w-full h-full object-cover">
                                    <span class="absolute bottom-3 right-3 px-2.5 py-1 rounded-lg text-[10px] font-black uppercase bg-emerald-600 text-white shadow-md">
                                        AFTER
                                    </span>
                                </div>
                            </div>

                            <!-- Content -->
                            <div class="p-6 sm:p-7 space-y-3">
                                <div class="flex items-center justify-between">
                                    <span class="text-xs font-bold text-[#820003] uppercase tracking-wider">
                                        {{ $item->category }}
                                    </span>
                                    @if($item->location)
                                        <span class="text-xs font-medium text-gray-500">
                                            {{ $item->location }}
                                        </span>
                                    @endif
                                </div>

                                <h3 class="text-lg font-bold text-gray-900 leading-snug">
                                    {{ $item->title }}
                                </h3>

                                @if($item->description)
                                    <p class="text-xs sm:text-sm text-gray-600 leading-relaxed line-clamp-2">
                                        {{ $item->description }}
                                    </p>
                                @endif

                                @if($item->duration)
                                    <div class="pt-2 border-t border-gray-200/60 flex items-center justify-between text-xs text-gray-500">
                                        <span>Estimasi Waktu</span>
                                        <span class="font-bold text-gray-900">{{ $item->duration }}</span>
                                    </div>
                                @endif
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>
    @endif

    <!-- Section: Banner CTA Konsultasi Baru (Exact from Gambar 3 with Kenzo Yanuar) -->
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

    <!-- Section: Ulasan & Testimonial Pelanggan -->
    @if(isset($testimonials) && $testimonials->isNotEmpty())
        <section class="py-20 bg-[#fcf9f8] border-b border-gray-100">
            <div class="max-w-[1280px] mx-auto px-4 sm:px-6 lg:px-8 space-y-12">
                <!-- Section Header -->
                <div class="text-center max-w-3xl mx-auto space-y-3">
                    <div class="inline-flex items-center gap-3">
                        <span class="w-8 h-[1.5px] bg-[#820003]/30 rounded-full"></span>
                        <span class="font-serif-brand italic text-base sm:text-lg font-bold text-[#820003] tracking-wide">
                            {{ __('Kepuasan Klien Kami') }}
                        </span>
                        <span class="w-8 h-[1.5px] bg-[#820003]/30 rounded-full"></span>
                    </div>
                    <h2 class="text-3xl sm:text-4xl font-extrabold text-[#1c1b1b] tracking-tight">
                        {{ __('Apa Kata Mereka Tentang KOOTA?') }}
                    </h2>
                    <p class="text-xs sm:text-sm text-gray-600 leading-relaxed max-w-xl mx-auto">
                        {{ __('Kepercayaan pelanggan residensial, pemilik kafe, dan pengelola gedung adalah pencapaian terbaik kami.') }}
                    </p>
                </div>

                <!-- Grid Testimonials -->
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
                    @foreach($testimonials as $testi)
                        <div class="bg-white rounded-3xl p-6 border border-gray-200/80 shadow-2xs hover:shadow-lg transition-all duration-300 flex flex-col justify-between space-y-4">
                            <div class="space-y-3">
                                <!-- Star Rating -->
                                <div class="flex items-center gap-1 text-amber-400">
                                    @for($i = 1; $i <= 5; $i++)
                                        <svg class="w-4 h-4 {{ $i <= $testi->rating ? 'fill-amber-400 text-amber-400' : 'fill-gray-200 text-gray-200' }}" viewBox="0 0 20 20" fill="currentColor">
                                            <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/>
                                        </svg>
                                    @endfor
                                </div>

                                <!-- Content Quote -->
                                <p class="text-xs sm:text-sm text-gray-700 leading-relaxed italic">
                                    "{{ $testi->content }}"
                                </p>
                            </div>

                            <div class="pt-4 border-t border-gray-100 space-y-0.5">
                                <p class="font-bold text-sm text-gray-900 leading-tight">
                                    {{ $testi->client_name }}
                                </p>
                                @if($testi->client_title)
                                    <p class="text-[11px] text-gray-500 leading-tight">
                                        {{ $testi->client_title }}
                                    </p>
                                @endif
                                @if($testi->location)
                                    <span class="inline-block mt-1 text-[10px] font-bold text-[#820003] bg-red-50 px-2 py-0.5 rounded-md">
                                        {{ $testi->location }}
                                    </span>
                                @endif
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>
    @endif

    <!-- Section 5: FAQ Accordion -->
    <section class="py-16 sm:py-20 bg-white">
        <div class="max-w-[1280px] mx-auto px-4 sm:px-6 lg:px-8 space-y-10 sm:space-y-12">
            <div class="text-center max-w-3xl mx-auto space-y-3">
                <h2 class="text-3xl sm:text-4xl font-extrabold text-[#1c1b1b] tracking-tight">
                    — {{ __('Temukan Jawabannya di Sini!') }}
                </h2>
                <p class="text-xs sm:text-sm text-gray-600 leading-relaxed">
                    {{ __('Pertanyaan yang sering diajukan seputar layanan terpadu Koota Services di berbagai kota operasional kami.') }}
                </p>
            </div>

            <div 
                class="max-w-2xl mx-auto space-y-3 sm:space-y-4 pt-4 sm:pt-6" 
                x-data="{ activeFaq: null, pinnedFaq: null }"
                @click.away="pinnedFaq = null; activeFaq = null"
            >
                <div class="mb-4 flex items-center justify-between text-xs text-gray-500 px-2">
                    <span class="flex items-center gap-2 font-medium">
                        <svg class="w-4 h-4 text-[#820003] animate-pulse" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 15l-2 5L9 9l11 4-5 2zm0 0l5 5M7.188 2.239l.777 2.897M5.136 7.965l-2.898-.777M13.95 4.05l-2.122 2.122m-5.657 5.656l-2.12 2.122"/>
                        </svg>
                        {{ __('Arahkan kursor ke pertanyaan untuk melihat jawaban') }}
                    </span>
                    <span class="text-[11px] text-gray-400 hidden sm:inline">{{ __('Hover / Sentuh') }}</span>
                </div>

                @foreach($faqs->take(4) as $faq)
                    <div 
                        class="relative"
                        @mouseenter="activeFaq = {{ $faq->id }}"
                        @mouseleave="if (!pinnedFaq) activeFaq = null"
                        @click="pinnedFaq = (pinnedFaq === {{ $faq->id }} ? null : {{ $faq->id }}); activeFaq = pinnedFaq"
                    >
                        <!-- Question Bar (Hover Target) -->
                        <div 
                            class="w-full flex items-center justify-between p-4 sm:p-5 rounded-2xl border transition-all duration-200 cursor-pointer select-none"
                            :class="activeFaq === {{ $faq->id }} ? 'bg-red-50/70 border-red-200 shadow-md translate-x-1' : 'bg-[#fcf9f8] border-gray-200 hover:border-red-200 hover:bg-white shadow-2xs'"
                        >
                            <span 
                                class="text-sm sm:text-base font-bold text-gray-900 transition-colors leading-relaxed pr-4"
                                :class="{ 'text-[#820003]': activeFaq === {{ $faq->id }} }"
                            >
                                <span class="text-xs font-black text-[#820003] mr-2">0{{ $loop->iteration }}</span>
                                {{ __($faq->question) }}
                            </span>

                            <div 
                                class="w-7 h-7 rounded-full flex items-center justify-center shrink-0 transition-all duration-200"
                                :class="activeFaq === {{ $faq->id }} ? 'bg-[#820003] text-white rotate-90 shadow-2xs' : 'bg-gray-200/70 text-gray-400'"
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
                            class="absolute bottom-full left-0 right-0 mb-3 z-30 p-5 sm:p-6 rounded-2xl bg-white text-gray-800 border border-red-100 shadow-[0_20px_45px_rgba(130,0,3,0.14)] pointer-events-none"
                        >
                            <div class="space-y-2">
                                <div class="flex items-center justify-between pb-2 border-b border-gray-100">
                                    <span class="text-xs font-bold text-[#820003] uppercase tracking-wider flex items-center gap-1.5">
                                        <span class="w-1.5 h-1.5 rounded-full bg-[#820003]"></span>
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
        </div>
    </section>
@endsection
