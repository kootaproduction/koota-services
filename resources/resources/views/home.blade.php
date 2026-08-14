@extends('layouts.app')

@section('title', 'KOOTA SERVICE - Kita Wujudkan Kota Bersih')

@section('content')
    <!-- Hero Section -->
    <section class="relative bg-[#fcf9f8] py-16 md:py-24 overflow-hidden">
        <div class="max-w-[1280px] mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 lg:grid-cols-12 gap-12 items-center">
                <!-- Left Column -->
                <div class="lg:col-span-6 space-y-6">
                    <h1 class="text-4xl sm:text-5xl lg:text-6xl font-extrabold text-[#1c1b1b] tracking-tight leading-tight">
                        Kita Wujudkan <br>
                        <span class="text-[#ac0c0c]">Kota Bersih</span>
                    </h1>
                    <p class="text-base sm:text-lg text-gray-600 leading-relaxed max-w-xl">
                        Solusi terintegrasi untuk properti Anda. Dari layanan kebersihan profesional, manajemen limbah, hingga perbaikan dan renovasi bangunan. Layanan andal untuk rumah dan bisnis.
                    </p>
                    <div class="pt-2 flex flex-wrap gap-4 items-center">
                        <a href="{{ route('consultation.index') }}" class="px-7 py-3.5 rounded-lg bg-[#ac0c0c] hover:bg-[#820003] text-white font-semibold text-base transition-all shadow-md flex items-center gap-2 group">
                            <span>Konsultasi Sekarang</span>
                            <svg class="w-5 h-5 group-hover:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"/>
                            </svg>
                        </a>
                        <a href="#layanan-utama" class="px-7 py-3.5 rounded-lg bg-white border border-gray-300 hover:border-gray-400 text-gray-800 font-semibold text-base transition-colors shadow-sm">
                            Lihat Layanan
                        </a>
                    </div>
                </div>

                <!-- Right Column: Hero Image with Floating Badge -->
                <div class="lg:col-span-6 relative">
                    <div class="relative rounded-2xl overflow-hidden shadow-2xl border border-gray-100">
                        <img src="https://images.unsplash.com/photo-1541888946425-d0fbb186a5b7?auto=format&fit=crop&w=1200&q=80" alt="KOOTA Service Facility Management" class="w-full h-[400px] sm:h-[480px] object-cover">
                        
                        <!-- Floating Badge -->
                        <div class="absolute bottom-6 left-6 bg-white/95 backdrop-blur p-4 rounded-xl shadow-lg border border-gray-100 flex items-center gap-3">
                            <div class="w-10 h-10 rounded-full bg-red-100 text-[#ac0c0c] flex items-center justify-center font-bold">
                                🏢
                            </div>
                            <div>
                                <p class="text-xs font-semibold text-gray-500 uppercase tracking-wider">Layanan Utama</p>
                                <p class="text-sm font-bold text-gray-900">6 Layanan Terintegrasi & Profesional</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Section 2: Layanan Utama Kami -->
    <section id="layanan-utama" class="py-20 bg-white border-y border-gray-100">
        <div class="max-w-[1280px] mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center max-w-3xl mx-auto space-y-3 mb-16">
                <h2 class="text-3xl sm:text-4xl font-extrabold text-[#1c1b1b] tracking-tight">
                    Layanan Utama Kami
                </h2>
                <p class="text-base text-gray-600">
                    Solusi terintegrasi untuk menjaga kebersihan dan performa aset properti Anda secara profesional.
                </p>
            </div>

            <!-- Service Cards Grid (3 Columns) -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                @foreach($services as $service)
                    <div class="bg-[#fcf9f8] rounded-2xl p-8 border border-gray-100 shadow-sm hover:shadow-md transition-all group flex flex-col justify-between">
                        <div class="space-y-4">
                            <!-- Icon -->
                            <div class="w-14 h-14 rounded-xl flex items-center justify-center text-2xl border border-gray-200 shadow-xs {{ $service->category === 'sustainability' ? 'bg-green-50 text-[#28a745]' : 'bg-red-50 text-[#ac0c0c]' }}">
                                @if($service->slug === 'cleaning-service') 🧹
                                @elseif($service->slug === 'pengangkutan-sampah') ♻️
                                @elseif($service->slug === 'jasa-tukang') 🛠️
                                @elseif($service->slug === 'perbaikan') 🔧
                                @elseif($service->slug === 'renovasi') 📐
                                @elseif($service->slug === 'ipal') 💧
                                @else 🏢
                                @endif
                            </div>

                            <h3 class="text-xl font-bold text-[#1c1b1b] group-hover:text-[#ac0c0c] transition-colors">
                                {{ $service->title }}
                            </h3>

                            <p class="text-sm text-gray-600 leading-relaxed line-clamp-3">
                                {{ $service->subtitle ?? $service->description }}
                            </p>
                        </div>

                        <div class="pt-6">
                            <a href="{{ route('services.show', $service->slug) }}" class="inline-flex items-center gap-2 text-sm font-bold text-[#ac0c0c] hover:text-[#820003] transition-colors group-hover:translate-x-1 transition-transform">
                                <span>Pelajari Selengkapnya</span>
                                <span>→</span>
                            </a>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    <!-- Section 3: Mitra Terpercaya -->
    <section class="py-20 bg-[#fcf9f8]">
        <div class="max-w-[1280px] mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 lg:grid-cols-12 gap-12 items-center">
                <!-- Left: Team Photo -->
                <div class="lg:col-span-6">
                    <div class="rounded-2xl overflow-hidden shadow-xl border border-gray-200">
                        <img src="https://images.unsplash.com/photo-1522071820081-009f0129c71c?auto=format&fit=crop&w=1000&q=80" alt="Tim Profesional KOOTA SERVICE" class="w-full h-[420px] object-cover">
                    </div>
                </div>

                <!-- Right: Content -->
                <div class="lg:col-span-6 space-y-6">
                    <div>
                        <span class="text-xs font-extrabold uppercase tracking-widest text-[#ac0c0c]">
                            TENTANG KOOTA SERVICE
                        </span>
                        <h2 class="text-3xl sm:text-4xl font-extrabold text-[#1c1b1b] tracking-tight mt-2 leading-snug">
                            Mitra Terpercaya untuk Solusi Properti & Lingkungan
                        </h2>
                    </div>

                    <p class="text-base text-gray-600 leading-relaxed">
                        Koota Service berkomitmen untuk menghadirkan standar baru dalam pengelolaan properti. Dengan semangat "Kita Wujudkan Kota Bersih", kami mengintegrasikan berbagai layanan teknis dan kebersihan untuk memberikan kenyamanan maksimal bagi klien kami.
                    </p>

                    <!-- Checkmarks List -->
                    <div class="space-y-3 pt-2">
                        <div class="flex items-center gap-3">
                            <div class="w-6 h-6 rounded-full bg-red-100 text-[#ac0c0c] flex items-center justify-center font-bold text-xs">
                                ✓
                            </div>
                            <span class="text-sm font-semibold text-gray-800">Tim Profesional & Berpengalaman</span>
                        </div>
                        <div class="flex items-center gap-3">
                            <div class="w-6 h-6 rounded-full bg-red-100 text-[#ac0c0c] flex items-center justify-center font-bold text-xs">
                                ✓
                            </div>
                            <span class="text-sm font-semibold text-gray-800">Layanan Terintegrasi Satu Pintu</span>
                        </div>
                        <div class="flex items-center gap-3">
                            <div class="w-6 h-6 rounded-full bg-red-100 text-[#ac0c0c] flex items-center justify-center font-bold text-xs">
                                ✓
                            </div>
                            <span class="text-sm font-semibold text-gray-800">Kualitas Terjamin & Terstandardisasi</span>
                        </div>
                    </div>

                    <div class="pt-4">
                        <a href="{{ route('about') }}" class="px-7 py-3.5 rounded-lg bg-[#ac0c0c] hover:bg-[#820003] text-white font-semibold text-sm transition-all shadow-sm inline-block">
                            Baca Lebih Lanjut
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Section 4: Banner CTA Red Box -->
    <section class="py-12 bg-[#fcf9f8]">
        <div class="max-w-[1280px] mx-auto px-4 sm:px-6 lg:px-8">
            <div class="relative bg-[#ac0c0c] rounded-3xl p-8 sm:p-12 overflow-hidden text-white shadow-2xl">
                <div class="grid grid-cols-1 lg:grid-cols-12 gap-8 items-center relative z-10">
                    <div class="lg:col-span-8 space-y-4">
                        <h3 class="text-2xl sm:text-3xl font-extrabold tracking-tight">
                            Butuh Kontraktor & Produsen Premium?
                        </h3>
                        <p class="text-red-100 text-base max-w-xl">
                            Punya ide proyek? Yuk ngobrol bareng, kita bantu wujudkan barang!
                        </p>
                        <div class="pt-2">
                            <a href="{{ route('consultation.index') }}" class="inline-flex items-center gap-2 px-6 py-3 rounded-lg bg-[#28a745] hover:bg-[#218838] text-white font-semibold text-sm transition-all shadow-md">
                                <span>💬</span>
                                <span>Konsultasi Dengan Ahlinya</span>
                            </a>
                        </div>
                    </div>
                    <div class="lg:col-span-4 hidden lg:block">
                        <img src="https://images.unsplash.com/photo-1486406146926-c627a92ad1ab?auto=format&fit=crop&w=600&q=80" alt="Modern Building" class="rounded-xl opacity-90 shadow-lg object-cover h-44 w-full">
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Section 5: FAQ Accordion -->
    <section class="py-20 bg-white">
        <div class="max-w-[1280px] mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center max-w-3xl mx-auto space-y-3 mb-16">
                <h2 class="text-3xl sm:text-4xl font-extrabold text-[#1c1b1b] tracking-tight">
                    — Temukan Jawabannya di Sini!
                </h2>
                <p class="text-base text-gray-600">
                    Kamu mungkin baru kenal kami, dan itu wajar. Tapi satu hal yang pasti: kami siap bantu kamu mewujudkan setiap ide dengan sepenuh hati.
                </p>
            </div>

            <div class="grid grid-cols-1 lg:grid-cols-12 gap-12 items-start">
                <!-- Left: FAQ Accordion -->
                <div class="lg:col-span-8 space-y-4" x-data="{ activeFaq: 1 }">
                    @foreach($faqs as $index => $faq)
                        <div class="border-b border-gray-200 pb-4">
                            <button @click="activeFaq = (activeFaq === {{ $faq->id }} ? null : {{ $faq->id }})" class="w-full flex items-center justify-between py-3 text-left focus:outline-none group">
                                <span class="text-lg font-bold text-gray-900 group-hover:text-[#ac0c0c] transition-colors">
                                    0{{ $loop->iteration }} {{ $faq->question }}
                                </span>
                                <svg class="w-5 h-5 text-gray-500 transition-transform duration-200" :class="{ 'rotate-180': activeFaq === {{ $faq->id }} }" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/>
                                </svg>
                            </button>
                            <div x-show="activeFaq === {{ $faq->id }}" x-collapse class="mt-2 text-sm text-gray-600 leading-relaxed pr-6">
                                {{ $faq->answer }}
                            </div>
                        </div>
                    @endforeach
                </div>

                <!-- Right: Ask Expert Box -->
                <div class="lg:col-span-4">
                    <div class="bg-[#fcf9f8] p-8 rounded-2xl border border-gray-200 text-center space-y-4 shadow-sm">
                        <h3 class="text-2xl font-bold text-gray-900">
                            Punya pertanyaan lain?
                        </h3>
                        <p class="text-sm text-gray-600 leading-relaxed">
                            Tim kami siap membantu Anda! Hubungi kami langsung untuk konsultasi gratis dan solusi terbaik sesuai kebutuhan Anda.
                        </p>
                        <div class="pt-2">
                            <a href="{{ route('consultation.index') }}" class="w-full block py-3 rounded-lg bg-[#28a745] hover:bg-[#218838] text-white font-semibold text-sm transition-all shadow-sm">
                                Tanya Ahlinya
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
