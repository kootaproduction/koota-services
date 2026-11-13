@extends('layouts.app')

@section('title', 'Layanan Unggulan - KOOTA SERVICE')

@section('content')
    <!-- Hero Section -->
    <section class="py-16 md:py-24 bg-slate-50 border-b border-gray-100">
        <div class="max-w-[1280px] mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 lg:grid-cols-12 gap-12 items-center">
                <!-- Left: Title & Subtitle -->
                <div class="lg:col-span-6 space-y-6">
                    <h1 class="text-4xl sm:text-5xl lg:text-6xl font-extrabold tracking-tight text-[#0f172a] leading-[1.1]">
                        {{ __('Layanan Terpadu') }} <br>
                        <span class="text-[#ac0c0c]">{{ __('Koota Services') }}</span>
                    </h1>
                    <p class="text-base sm:text-lg text-gray-600 leading-relaxed max-w-xl">
                        {{ __('Solusi komprehensif untuk perawatan hunian dan fasilitas komersial Anda. Dari pembersihan rumah profesional, perbaikan dan renovasi hunian terpercaya, hingga pengelolaan dan pengangkutan sampah secara terjadwal.') }}
                    </p>
                    <div class="pt-2">
                        <a href="https://wa.me/6281217597109?text=Halo%20KOOTA%20SERVICES,%20saya%20ingin%20berkonsultasi." target="_blank" class="inline-flex items-center gap-2 px-7 py-3.5 rounded-xl bg-[#16a34a] hover:bg-[#15803d] text-white font-extrabold text-sm sm:text-base transition-all shadow-md active:scale-95 ring-2 ring-green-400/20">
                            <svg class="w-5 h-5 fill-current" viewBox="0 0 24 24">
                                <path d="M.057 24l1.687-6.163c-1.041-1.804-1.588-3.849-1.587-5.946.003-6.556 5.338-11.891 11.893-11.891 3.181.001 6.167 1.24 8.413 3.488 2.245 2.248 3.481 5.236 3.48 8.414-.003 6.557-5.338 11.892-11.893 11.892-1.99-.001-3.951-.5-5.688-1.448l-6.305 1.654zm6.597-3.807c1.676.995 3.276 1.591 5.392 1.592 5.448 0 9.886-4.434 9.889-9.885.002-5.462-4.415-9.89-9.881-9.892-5.452 0-9.887 4.434-9.889 9.884-.001 2.225.651 3.891 1.746 5.634l-.999 3.648 3.742-.981zm11.387-5.464c-.074-.124-.272-.198-.57-.347-.297-.149-1.758-.868-2.031-.967-.272-.099-.47-.149-.669.149-.198.297-.768.967-.941 1.165-.173.198-.347.223-.644.074-.297-.149-1.255-.462-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.297-.347.446-.521.151-.172.2-.296.3-.495.099-.198.05-.372-.025-.521-.075-.148-.669-1.611-.916-2.206-.242-.579-.487-.501-.669-.51l-.57-.01c-.198 0-.52.074-.792.372s-1.04 1.016-1.04 2.479 1.065 2.876 1.213 3.074c.149.198 2.095 3.2 5.076 4.487.709.306 1.263.489 1.694.626.712.226 1.36.194 1.872.118.571-.085 1.758-.719 2.006-1.413.248-.695.248-1.29.173-1.414z"/>
                            </svg>
                            <span>{{ __('Konsultasi Sekarang') }}</span>
                        </a>
                    </div>
                </div>

                <!-- Right: Hero Building Image -->
                <div class="lg:col-span-6">
                    <div class="rounded-3xl overflow-hidden shadow-2xl border border-gray-100 bg-white">
                        <img src="{{ asset('images/team-indonesia.png') }}" alt="Tim KOOTA SERVICE" class="w-full h-[360px] sm:h-[420px] object-cover">
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Section: 3 Layanan Utama Kami -->
    <section class="py-20 bg-white border-b border-gray-100">
        <div class="max-w-[1280px] mx-auto px-4 sm:px-6 lg:px-8 space-y-16">
            <div class="text-center max-w-3xl mx-auto space-y-3">
                <h2 class="text-3xl sm:text-4xl font-extrabold text-[#0f172a] tracking-tight">
                    {{ __('Layanan Unggulan Kami') }}
                </h2>
                <p class="text-sm sm:text-base text-gray-600 leading-relaxed">
                    {{ __('Dedikasi kami untuk memberikan hasil terbaik dalam setiap aspek perawatan kebersihan, renovasi, dan lingkungan hunian Anda.') }}
                </p>
            </div>

            <!-- Grid 3 Services -->
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                @foreach($services as $service)
                    <div class="bg-slate-50 rounded-3xl overflow-visible border border-gray-100 shadow-sm hover:shadow-xl transition-all duration-300 group flex flex-col justify-between hover:-translate-y-1">
                        <div>
                            <!-- Top Image -->
                            <div class="h-52 overflow-hidden rounded-t-3xl relative bg-gray-100">
                                <img src="{{ $service->hero_image }}" alt="{{ $service->title }}" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500">
                            </div>

                            <!-- Content -->
                            <div class="p-6 space-y-3">
                                <h3 class="text-xl font-bold text-[#0f172a] group-hover:text-[#ac0c0c] transition-colors leading-snug">
                                    {{ __($service->title) }}
                                </h3>
                                <p class="text-xs sm:text-sm text-gray-600 leading-relaxed line-clamp-3">
                                    {{ __($service->subtitle ?? $service->description) }}
                                </p>
                            </div>
                        </div>

                        <!-- Action Link -->
                        <div class="px-6 pb-6 pt-2">
                            <a href="{{ route('services.show', $service->slug) }}" class="inline-flex items-center gap-1.5 text-xs sm:text-sm font-bold text-[#ac0c0c] hover:text-[#8f0a0a] transition-colors">
                                <span>{{ __('Pelajari Lebih Lanjut') }}</span>
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"/></svg>
                            </a>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    <!-- Section: Why Us (Official 4 Points from User) -->
    <section class="py-20 bg-slate-50 border-b border-gray-100">
        <div class="max-w-[1280px] mx-auto px-4 sm:px-6 lg:px-8 space-y-12">
            <div class="text-center max-w-3xl mx-auto space-y-3">
                <div class="inline-flex items-center justify-center gap-3">
                    <span class="w-8 h-[1.5px] bg-[#ac0c0c]/30 rounded-full"></span>
                    <span class="font-serif-brand italic text-base sm:text-lg font-bold text-[#ac0c0c] tracking-wide">
                        {{ __('Kenapa Memilih Kami') }}
                    </span>
                    <span class="w-8 h-[1.5px] bg-[#ac0c0c]/30 rounded-full"></span>
                </div>
                <h2 class="text-3xl sm:text-4xl font-extrabold text-[#0f172a] tracking-tight">
                    {{ __('Standar Kualitas & Komitmen Penuh Koota Services') }}
                </h2>
            </div>

            <!-- 4 Points Calendar Grid -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-8 pt-2">
                @php
                    $featuresList = [
                        [
                            'num' => '01',
                            'tag' => 'SDM Unggulan',
                            'title' => 'Didukung SDM Ahli & Berpengalaman',
                            'desc' => 'Kami hanya mengirimkan tenaga kerja pilihan yang telah memiliki jam terbang tinggi di bidangnya, memastikan setiap sudut properti Anda ditangani oleh tangan-tangan profesional yang terampil.'
                        ],
                        [
                            'num' => '02',
                            'tag' => 'Jaminan Nyata',
                            'title' => 'Jaminan Kualitas Hasil Kerja (Garansi)',
                            'desc' => 'Kenyamanan Anda adalah prioritas utama. Kami memberikan garansi penuh atas setiap layanan—jika hasil pekerjaan belum sesuai standar, kami siap memperbaikinya untuk Anda.'
                        ],
                        [
                            'num' => '03',
                            'tag' => 'Respon Siaga',
                            'title' => 'Dukungan Layanan Pelanggan 24/7',
                            'desc' => 'Tim Customer Service kami aktif dan siap sedia setiap saat untuk membantu kebutuhan mendesak Anda, lengkap dengan layanan purnajual (after-sales) yang responsif.'
                        ],
                        [
                            'num' => '04',
                            'tag' => 'Solusi Terpadu',
                            'title' => 'Solusi Perawatan Fasilitas Terintegrasi',
                            'desc' => 'Mulai dari pembersihan total, perawatan AC, perbaikan listrik/air, hingga jasa tukang harian—semua kebutuhan perawatan properti Anda tersedia dalam satu layanan praktis.'
                        ],
                    ];
                @endphp

                @foreach($featuresList as $f)
                    <div class="flex flex-col group">
                        <!-- Clean Calendar Sheet Card -->
                        <div class="bg-white rounded-2xl sm:rounded-3xl border border-gray-200/90 shadow-[0_4px_20px_rgba(0,0,0,0.04)] hover:shadow-xl transition-all duration-300 flex flex-col justify-between flex-1 overflow-hidden group-hover:border-[#ac0c0c]/40">
                            <!-- Calendar Red Header Strip -->
                            <div class="bg-[#ac0c0c] text-white px-5 py-2.5 flex items-center justify-between">
                                <span class="text-[11px] font-black uppercase tracking-widest text-white">
                                    {{ __('STANDAR') }} {{ $f['num'] }}
                                </span>
                                <span class="text-[10px] text-red-200 font-semibold uppercase tracking-wider">
                                    {{ __($f['tag']) }}
                                </span>
                            </div>

                            <!-- Content Body -->
                            <div class="p-6 sm:p-7 flex-1 flex flex-col justify-between space-y-4">
                                <div class="space-y-3">
                                    <span class="text-3xl sm:text-4xl font-black text-[#ac0c0c] font-serif-brand block leading-none">
                                        {{ $f['num'] }}
                                    </span>
                                    <h3 class="text-base sm:text-lg font-bold text-gray-900 group-hover:text-[#ac0c0c] transition-colors leading-snug">
                                        {{ __($f['title']) }}
                                    </h3>
                                    <p class="text-xs sm:text-sm text-gray-600 leading-relaxed">
                                        {{ __($f['desc']) }}
                                    </p>
                                </div>

                                <div class="pt-3 border-t border-gray-100 flex items-center justify-between text-[11px] text-gray-400">
                                    <span class="font-medium text-gray-500">{{ __('SOP Terstandarisasi') }}</span>
                                    <span class="text-[#ac0c0c] font-bold">✓</span>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    <!-- Section: Banner CTA Konsultasi Premium -->
    <section class="py-16 sm:py-20 bg-white border-b border-gray-100">
        <div class="max-w-[1280px] mx-auto px-4 sm:px-6 lg:px-8">
            <div class="relative bg-[#0f172a] rounded-3xl overflow-hidden shadow-2xl border border-slate-800 text-white">
                <!-- Ambient Subtle Crimson Glow -->
                <div aria-hidden="true" class="absolute -top-24 -right-24 w-80 h-80 rounded-full bg-[#ac0c0c]/25 blur-3xl pointer-events-none"></div>
                <div aria-hidden="true" class="absolute -bottom-24 -left-24 w-80 h-80 rounded-full bg-[#ac0c0c]/15 blur-3xl pointer-events-none"></div>

                <div class="grid grid-cols-1 lg:grid-cols-12 items-center relative z-10">
                    <!-- Left Content -->
                    <div class="lg:col-span-7 p-8 sm:p-12 lg:p-14 space-y-4">
                        <div class="inline-flex items-center gap-2 px-3 py-1 rounded-full bg-white/10 text-red-200 text-xs font-semibold tracking-wide border border-white/10">
                            <span class="w-2 h-2 rounded-full bg-red-400"></span>
                            <span>{{ __('KONSULTASI BEBAS BIAYA') }}</span>
                        </div>

                        <h3 class="text-2xl sm:text-3xl lg:text-4xl font-extrabold text-white tracking-tight leading-snug">
                            {{ __('Konsultasi Masalah dan Perawatan Rumah Gratis') }}
                        </h3>

                        <p class="text-gray-300 text-xs sm:text-sm sm:leading-relaxed max-w-xl">
                            {{ __('Ceritakan kebutuhan Anda, kami siap bantu jadwalkan kunjungan tenaga ahli untuk solusi rumah bersih, rapi, dan terawat.') }}
                        </p>

                        <div class="pt-4 flex flex-wrap items-center gap-3">
                            <a href="https://wa.me/6281217597109?text=Halo%20KOOTA%20SERVICES,%20saya%20ingin%20berkonsultasi." target="_blank" class="inline-flex items-center gap-2.5 px-7 py-3.5 rounded-xl bg-[#ac0c0c] hover:bg-[#8f0a0a] text-white font-bold text-xs sm:text-sm shadow-md hover:shadow-lg transition-all hover:scale-105 active:scale-95">
                                <svg class="w-4 h-4 fill-current" viewBox="0 0 24 24">
                                    <path d="M.057 24l1.687-6.163c-1.041-1.804-1.588-3.849-1.587-5.946.003-6.556 5.338-11.891 11.893-11.891 3.181.001 6.167 1.24 8.413 3.488 2.245 2.248 3.481 5.236 3.48 8.414-.003 6.557-5.338 11.892-11.893 11.892-1.99-.001-3.951-.5-5.688-1.448l-6.305 1.654zm6.597-3.807c1.676.995 3.276 1.591 5.392 1.592 5.448 0 9.886-4.434 9.889-9.885.002-5.462-4.415-9.89-9.881-9.892-5.452 0-9.887 4.434-9.889 9.884-.001 2.225.651 3.891 1.746 5.634l-.999 3.648 3.742-.981zm11.387-5.464c-.074-.124-.272-.198-.57-.347-.297-.149-1.758-.868-2.031-.967-.272-.099-.47-.149-.669.149-.198.297-.768.967-.941 1.165-.173.198-.347.223-.644.074-.297-.149-1.255-.462-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.297-.347.446-.521.151-.172.2-.296.3-.495.099-.198.05-.372-.025-.521-.075-.148-.669-1.611-.916-2.206-.242-.579-.487-.501-.669-.51l-.57-.01c-.198 0-.52.074-.792.372s-1.04 1.016-1.04 2.479 1.065 2.876 1.213 3.074c.149.198 2.095 3.2 5.076 4.487.709.306 1.263.489 1.694.626.712.226 1.36.194 1.872.118.571-.085 1.758-.719 2.006-1.413.248-.695.248-1.29.173-1.414z"/>
                                </svg>
                                <span>{{ __('Konsultasi via WhatsApp') }}</span>
                            </a>

                            <a href="{{ route('consultation.index') }}" class="inline-flex items-center px-6 py-3.5 rounded-xl border border-white/20 hover:border-white/40 bg-white/5 hover:bg-white/10 text-white font-semibold text-xs sm:text-sm transition-all">
                                <span>{{ __('Form Reservasi') }}</span>
                            </a>
                        </div>
                    </div>

                    <!-- Right Image: Kenzo Yanuar (CEO) -->
                    <div class="lg:col-span-5 relative flex justify-center lg:justify-end items-end pt-4 lg:pt-0 overflow-hidden">
                        <img src="{{ asset('images/kenzo-yanuar.png') }}" alt="Kenzo Yanuar - CEO Koota Production" class="w-auto h-72 sm:h-80 md:h-96 object-contain object-bottom select-none drop-shadow-2xl">
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
