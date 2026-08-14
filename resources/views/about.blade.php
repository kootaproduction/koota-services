@extends('layouts.app')

@section('title', 'Tentang Koota Service - Solusi Fasilitas Terintegrasi')

@section('content')
    <!-- Top Hero Section: Mengenal Lebih Dekat -->
    <section class="py-16 md:py-24 bg-[#fcf9f8] border-b border-gray-100">
        <div class="max-w-[1280px] mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 lg:grid-cols-12 gap-12 items-center">
                <!-- Left: Info -->
                <div class="lg:col-span-6 space-y-6">
                    <div class="inline-flex items-center gap-2 px-3 py-1 rounded-full bg-white border border-gray-200 text-[11px] font-bold tracking-wider uppercase text-gray-700 shadow-2xs">
                        <span class="w-2 h-2 rounded-full bg-[#820003]"></span>
                        <span>MENGENAL LEBIH DEKAT</span>
                    </div>

                    <h1 class="text-4xl sm:text-5xl lg:text-6xl font-bold tracking-tight text-[#1c1b1b] leading-[1.1]">
                        Tentang <br>
                        <span class="text-[#820003]">Koota Service</span>
                    </h1>

                    <p class="text-sm sm:text-base text-gray-600 leading-relaxed max-w-xl">
                        Mitra terpercaya untuk layanan fasilitas komersial dan perumahan. Kami mendedikasikan diri untuk menciptakan lingkungan yang bersih, aman, dan berkelanjutan.
                    </p>
                </div>

                <!-- Right: Conference Meeting Image -->
                <div class="lg:col-span-6">
                    <div class="rounded-2xl overflow-hidden shadow-xl border border-gray-100 bg-white">
                        <img src="https://images.unsplash.com/photo-1522071820081-009f0129c71c?auto=format&fit=crop&w=1000&q=80" alt="Tim Profesional Koota Service" class="w-full h-[360px] sm:h-[420px] object-cover">
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
                    <h2 class="text-3xl sm:text-4xl font-bold text-[#1c1b1b] tracking-tight">
                        Siapa Kami?
                    </h2>
                    <p class="text-xs sm:text-sm text-gray-600 leading-relaxed max-w-md">
                        Berawal dari dedikasi mempersembahkan kualitas perawatan fasilitas, KOOTA SERVICE tumbuh menjadi penyedia solusi terintegrasi.
                    </p>
                </div>

                <!-- Right Column: Perjalanan Kami Card + 2 Mini Cards -->
                <div class="lg:col-span-7 space-y-6">
                    <!-- Perjalanan Kami Card -->
                    <div class="bg-[#fcf9f8] p-8 rounded-2xl border border-gray-100 shadow-2xs space-y-4 relative">
                        <div class="flex items-center justify-between">
                            <h3 class="text-lg font-bold text-gray-900">
                                Perjalanan Kami
                            </h3>
                            <div class="w-8 h-8 rounded-full bg-red-50 text-[#820003] flex items-center justify-center">
                                <svg class="w-4 h-4 stroke-current" fill="none" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                </svg>
                            </div>
                        </div>
                        <p class="text-xs sm:text-sm text-gray-600 leading-relaxed">
                            Didirikan dengan tujuan memberikan solusi perawatan terbaik, KOOTA SERVICE berfokus pada integrasi teknologi dan tenaga kerja profesional. Kami memahami bahwa setiap fasilitas memiliki kebutuhan unik, sehingga kami merancang layanan yang adaptif dan efisien untuk memastikan kelancaran operasional klien kami, dari perumahan hingga kompleks industri berskala besar.
                        </p>
                    </div>

                    <!-- 2 Mini Cards (Legalitas & Tim Profesional) -->
                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                        <!-- Mini Card 1 -->
                        <div class="bg-[#fcf9f8] p-5 rounded-xl border border-gray-100 flex items-start gap-3.5 shadow-2xs">
                            <div class="w-8 h-8 rounded-lg bg-red-50 text-[#820003] flex items-center justify-center shrink-0">
                                <svg class="w-4 h-4 stroke-current" fill="none" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"/>
                                </svg>
                            </div>
                            <div>
                                <h4 class="text-xs font-bold text-gray-900">Legalitas Terjamin</h4>
                                <p class="text-[11px] text-gray-500 mt-0.5">Dokumen operasional dan sertifikasi resmi.</p>
                            </div>
                        </div>

                        <!-- Mini Card 2 -->
                        <div class="bg-[#fcf9f8] p-5 rounded-xl border border-gray-100 flex items-start gap-3.5 shadow-2xs">
                            <div class="w-8 h-8 rounded-lg bg-red-50 text-[#820003] flex items-center justify-center shrink-0">
                                <svg class="w-4 h-4 stroke-current" fill="none" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/>
                                </svg>
                            </div>
                            <div>
                                <h4 class="text-xs font-bold text-gray-900">Tim Profesional</h4>
                                <p class="text-[11px] text-gray-500 mt-0.5">Tenaga kerja terlatih, tersertifikasi, dan berpengalaman.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Section: Visi Kami & Misi Kami (2 Large Side-by-Side Cards) -->
    <section class="py-20 bg-[#fcf9f8] border-b border-gray-100">
        <div class="max-w-[1280px] mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                <!-- Card 1: Visi Kami -->
                <div class="bg-white p-8 sm:p-10 rounded-2xl border border-gray-100 shadow-xs space-y-6">
                    <div class="w-10 h-10 rounded-lg bg-red-50 text-[#820003] flex items-center justify-center">
                        <svg class="w-5 h-5 stroke-current" fill="none" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/>
                        </svg>
                    </div>

                    <h3 class="text-2xl font-bold text-[#820003]">
                        Visi kami
                    </h3>

                    <p class="text-xs sm:text-sm text-gray-600 leading-relaxed">
                        Menjadi mitra terkemuka dalam penyedia jasa event production, interior, dan advertising dengan menghasilkan solusi yang kreatif, inovatif, dan berdampak bagi setiap klien.
                    </p>
                </div>

                <!-- Card 2: Misi Kami -->
                <div class="bg-white p-8 sm:p-10 rounded-2xl border border-gray-100 shadow-xs space-y-6">
                    <div class="w-10 h-10 rounded-lg bg-red-50 text-[#820003] flex items-center justify-center">
                        <svg class="w-5 h-5 stroke-current" fill="none" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                        </svg>
                    </div>

                    <h3 class="text-2xl font-bold text-[#820003]">
                        Misi kami
                    </h3>

                    <ul class="space-y-3.5">
                        <li class="flex items-start gap-3 text-xs sm:text-sm text-gray-600 leading-relaxed">
                            <span class="text-[#820003] font-bold text-sm shrink-0">✓</span>
                            <span>Memberikan layanan terbaik dengan standar profesional.</span>
                        </li>
                        <li class="flex items-start gap-3 text-xs sm:text-sm text-gray-600 leading-relaxed">
                            <span class="text-[#820003] font-bold text-sm shrink-0">✓</span>
                            <span>Menciptakan inovasi yang relevan dan sesuai kebutuhan klien.</span>
                        </li>
                        <li class="flex items-start gap-3 text-xs sm:text-sm text-gray-600 leading-relaxed">
                            <span class="text-[#820003] font-bold text-sm shrink-0">✓</span>
                            <span>Mengutamakan keselamatan dan efisiensi dalam setiap proyek.</span>
                        </li>
                        <li class="flex items-start gap-3 text-xs sm:text-sm text-gray-600 leading-relaxed">
                            <span class="text-[#820003] font-bold text-sm shrink-0">✓</span>
                            <span>Membangun hubungan jangka panjang dengan pemangku kepentingan dan kepuasan pelanggan.</span>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </section>

    <!-- Section: Komitmen Kami (Kita Wujudkan Kota Bersih) -->
    <section class="py-20 bg-white border-b border-gray-100 text-center">
        <div class="max-w-3xl mx-auto px-4 sm:px-6 lg:px-8 space-y-6">
            <div class="w-12 h-12 rounded-full bg-red-50 text-[#820003] flex items-center justify-center mx-auto shadow-2xs">
                <svg class="w-6 h-6 stroke-current" fill="none" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3.055 11H5a2 2 0 012 2v1a2 2 0 002 2 2 2 0 012 2v2.945M8 3.935V5.5A2.5 2.5 0 0010.5 8h.5a2 2 0 012 2 2 2 0 104 0 2 2 0 012-2h1.064M15 20.488V18a2 2 0 012-2h3.064M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                </svg>
            </div>

            <h2 class="text-2xl sm:text-3xl font-bold text-gray-900 tracking-tight">
                Komitmen Kami
            </h2>

            <div class="text-3xl sm:text-4xl font-extrabold italic text-[#820003] tracking-tight">
                "Kita Wujudkan Kota Bersih"
            </div>

            <p class="text-xs sm:text-sm text-gray-600 leading-relaxed max-w-2xl mx-auto">
                Fokus utama kami bukan sekadar menyelesaikan pekerjaan, melainkan menciptakan dampak jangka panjang bagi lingkungan dan komunitas tempat kami beroperasi. Kami menerapkan praktik ramah lingkungan dalam setiap aspek layanan operasional.
            </p>
        </div>
    </section>

    <!-- FAQ Accordion Section -->
    <section class="py-20 bg-[#fcf9f8]">
        <div class="max-w-[1280px] mx-auto px-4 sm:px-6 lg:px-8 space-y-12">
            <div class="text-center max-w-3xl mx-auto space-y-3">
                <h2 class="text-3xl sm:text-4xl font-bold text-[#1c1b1b] tracking-tight">
                    — Temukan Jawabannya di Sini!
                </h2>
                <p class="text-xs sm:text-sm text-gray-600 leading-relaxed">
                    Kamu mungkin baru kenal kami, dan itu wajar. Tapi satu hal yang pasti: kami siap bantu kamu mewujudkan setiap ide dengan sepenuh hati.
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
                    <div class="bg-white p-8 rounded-2xl border border-gray-200 text-center space-y-5 shadow-xs">
                        <h3 class="text-xl font-bold text-gray-900 leading-tight">
                            Punya pertanyaan lain?
                        </h3>
                        <p class="text-xs text-gray-600 leading-relaxed">
                            Tim kami siap membantu Anda! Hubungi kami langsung untuk konsultasi gratis dan solusi terbaik sesuai kebutuhan Anda.
                        </p>
                        <div class="pt-2">
                            <a href="{{ route('consultation.index') }}" class="w-full inline-block py-3 rounded-lg bg-[#28a745] hover:bg-[#218838] text-white font-semibold text-xs transition-all shadow-sm active:scale-95">
                                Tanya Ahlinya!
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
