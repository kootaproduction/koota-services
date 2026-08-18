@extends('layouts.app')

@section('title', __($service->title) . ' - KOOTA SERVICE')

@section('content')
    <!-- Breadcrumb (Images 1-4) -->
    <div class="bg-white border-b border-gray-100 py-3 text-xs text-gray-500">
        <div class="max-w-[1280px] mx-auto px-4 sm:px-6 lg:px-8 flex items-center space-x-2">
            <a href="{{ route('home') }}" class="hover:text-[#820003] transition-colors">{{ __('Home') }}</a>
            <span>›</span>
            <a href="{{ route('services.index') }}" class="hover:text-[#820003] transition-colors">{{ __('Layanan') }}</a>
            <span>›</span>
            <span class="font-bold text-gray-900">{{ __($service->title) }}</span>
        </div>
    </div>

    @php
        $slug = $service->slug;
        $isIpal = ($slug === 'ipal');
        $isCleaning = ($slug === 'cleaning-service');
        $isTukang = ($slug === 'jasa-tukang-perbaikan-dan-renovasi');
        $isWaste = ($slug === 'pengangkutan-sampah');

        // Dynamic Hero Badge
        $heroBadge = 'Facility Care Services';
        if ($isIpal || $isWaste) {
            $heroBadge = 'Sustainability Service';
        }

        // Subtitles exactly as in images
        $heroSubtitle = $service->description;
        if ($isIpal) {
            $heroSubtitle = 'Solusi pengelolaan air limbah terpadu untuk kebutuhan properti komersial, industri, dan fasilitas umum. Memastikan kepatuhan regulasi dan kelestarian lingkungan.';
        } elseif ($isCleaning) {
            $heroSubtitle = 'Solusi kebersihan komprehensif yang dirancang khusus untuk memenuhi standar ketat fasilitas modern, mulai dari perkantoran komersial hingga area residensial premium.';
        } elseif ($isTukang) {
            $heroSubtitle = 'Tenaga tukang renovasi, dan perbaikan untuk kebutuhan pekerjaan dan maintenance properti dengan standar kualitas tinggi dan pengerjaan tepat waktu.';
        } elseif ($isWaste) {
            $heroSubtitle = 'Solusi pengangkutan dan pengelolaan sampah yang praktis dan terjadwal untuk hunian dan bisnis Anda. Bersih, efisien, dan ramah lingkungan.';
        }

        // Section 1 Titles & Subtitles
        $sec1Title = 'Solusi ' . $service->title . ' Kami';
        $sec1Subtitle = 'Kami menyediakan layanan pengelolaan air limbah komprehensif untuk memastikan operasional bisnis Anda berjalan lancar dan ramah lingkungan.';
        if ($isCleaning) {
            $sec1Title = 'Solusi Jasa Cleaning Kami';
            $sec1Subtitle = 'Berbagai layanan kebersihan komprehensif untuk properti residensial maupun komersial Anda.';
        } elseif ($isTukang) {
            $sec1Title = 'Solusi Jasa Tukang Kami';
            $sec1Subtitle = 'Berbagai layanan perbaikan dan renovasi komprehensif untuk properti residensial maupun komersial Anda.';
        } elseif ($isWaste) {
            $sec1Title = 'Layanan Sesuai Kebutuhan Anda';
            $sec1Subtitle = 'Kami menyediakan berbagai opsi pengangkutan untuk berbagai skala kebutuhan, mulai dari residensial hingga komersial besar.';
        }

        // Section 2 Tabs
        if ($isIpal) {
            $tabs = ['Pemasangan & Instalasi', 'Maintenance Rutin', 'Uji Laboratorium'];
            $defaultTab = 'Maintenance Rutin';
        } elseif ($isCleaning) {
            $tabs = ['General Cleaning', 'Deep Cleaning', 'Office Cleaning'];
            $defaultTab = 'Office Cleaning';
        } elseif ($isTukang) {
            $tabs = ['Perbaikan Ringan', 'Maintenance Rutin', 'Renovasi Ruangan'];
            $defaultTab = 'Renovasi Ruangan';
        } else {
            $tabs = ['Terjadwal', 'Komersial', 'Pasca Renovasi'];
            $defaultTab = 'Terjadwal';
        }
    @endphp

    <!-- Hero Section with Background & Overlay (Images 1, 2, 3, 4) -->
    <section class="relative bg-neutral-900 text-white py-24 md:py-32 overflow-hidden">
        <div class="absolute inset-0 z-0">
            <img src="{{ $service->hero_image }}" alt="{{ $service->title }}" class="w-full h-full object-cover opacity-45 filter brightness-90">
            <div class="absolute inset-0 bg-gradient-to-t from-black/80 via-black/40 to-transparent"></div>
        </div>

        <div class="relative z-10 max-w-[1280px] mx-auto px-4 sm:px-6 lg:px-8 text-center space-y-6">
            <!-- Badge Pill (Green Sustainability / Facility Care badge) -->
            <div class="inline-flex items-center gap-2 px-4 py-1.5 rounded-full text-xs font-bold bg-[#80f98b]/20 text-[#80f98b] border border-[#80f98b]/40 backdrop-blur-md shadow-xs">
                <svg class="w-3.5 h-3.5 stroke-current" fill="none" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                </svg>
                <span>{{ __($heroBadge) }}</span>
            </div>

            <!-- Heading -->
            <h1 class="text-4xl sm:text-5xl lg:text-6xl font-extrabold tracking-tight text-white leading-tight max-w-4xl mx-auto">
                {{ __($service->title) }}
            </h1>

            <!-- Subtitle -->
            <p class="text-sm sm:text-base text-gray-200 max-w-3xl mx-auto leading-relaxed font-normal">
                {{ __($heroSubtitle) }}
            </p>

            <!-- CTA Dark Red Button -->
            <div class="pt-4 flex justify-center">
                <a href="{{ route('consultation.index', ['service' => $service->title]) }}" class="px-8 py-3.5 rounded-md bg-[#820003] hover:bg-[#ba1a15] text-white font-bold text-xs sm:text-sm transition-all shadow-xl hover:shadow-2xl active:scale-95">
                    {{ __($service->hero_cta_text ?? 'Konsultasi Sekarang') }}
                </a>
            </div>
        </div>
    </section>

    <!-- SECTION 1: Solusi Layanan Kami (Images 1, 2, 3, 4) -->
    <section class="py-20 bg-white border-b border-gray-100">
        <div class="max-w-[1280px] mx-auto px-4 sm:px-6 lg:px-8 space-y-12">
            <div class="text-center max-w-3xl mx-auto space-y-3">
                <h2 class="text-3xl sm:text-4xl font-extrabold text-[#1c1b1b] tracking-tight">
                    {{ __($sec1Title) }}
                </h2>
                <p class="text-xs sm:text-sm text-gray-600 leading-relaxed max-w-2xl mx-auto">
                    {{ __($sec1Subtitle) }}
                </p>
            </div>

            <!-- LAYOUT 1: IPAL (2x2 Grid with Top-Left Image Card) (Image 1) -->
            @if($isIpal)
                <div class="grid grid-cols-1 md:grid-cols-12 gap-6 items-stretch">
                    <!-- Card 1: Pemasangan & Instalasi (Wide with image background) -->
                    <div class="md:col-span-8 bg-[#fcf9f8] rounded-3xl p-8 border border-gray-100 shadow-2xs relative overflow-hidden flex flex-col justify-between group">
                        <div class="absolute right-0 top-0 bottom-0 w-1/2 opacity-25 group-hover:opacity-40 transition-opacity hidden sm:block">
                            <img src="https://images.unsplash.com/photo-1541888946425-d0fbb186a5b7?auto=format&fit=crop&w=800&q=80" alt="Instalasi IPAL" class="w-full h-full object-cover">
                        </div>
                        <div class="relative z-10 space-y-4 max-w-md">
                            <div class="w-10 h-10 rounded-full bg-green-50 text-[#007327] flex items-center justify-center font-bold">
                                <svg class="w-5 h-5 stroke-current" fill="none" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19.428 15.428a2 2 0 00-1.022-.547l-2.387-.477a6 6 0 00-3.86.517l-.318.158a6 6 0 01-3.86.517L6.05 15.21a2 2 0 00-1.806.547M8 4h8l-1 1v5.172a2 2 0 00.586 1.414l5 5c1.26 1.26.367 3.414-1.415 3.414H4.828c-1.782 0-2.674-2.154-1.414-3.414l5-5A2 2 0 009 10.172V5L8 4z"/>
                                </svg>
                            </div>
                            <h3 class="text-lg font-bold text-gray-900">{{ __('Pemasangan & Instalasi') }}</h3>
                            <p class="text-xs text-gray-600 leading-relaxed">
                                {{ __('Perancangan dan pembangunan sistem IPAL modern sesuai standar teknis dan regulasi pemerintah.') }}
                            </p>
                        </div>
                    </div>

                    <!-- Card 2: Maintenance Rutin -->
                    <div class="md:col-span-4 bg-[#fcf9f8] rounded-3xl p-8 border border-gray-100 shadow-2xs space-y-4">
                        <div class="w-10 h-10 rounded-full bg-red-50 text-[#820003] flex items-center justify-center font-bold">
                            <svg class="w-5 h-5 stroke-current" fill="none" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z"/>
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                            </svg>
                        </div>
                        <h3 class="text-lg font-bold text-gray-900">{{ __('Maintenance Rutin') }}</h3>
                        <p class="text-xs text-gray-600 leading-relaxed">
                            {{ __('Perawatan berkala untuk menjaga performa sistem pengelolaan limbah tetap optimal.') }}
                        </p>
                    </div>

                    <!-- Card 3: Konsultasi Regulasi -->
                    <div class="md:col-span-4 bg-[#fcf9f8] rounded-3xl p-8 border border-gray-100 shadow-2xs space-y-4">
                        <div class="w-10 h-10 rounded-full bg-red-50 text-[#820003] flex items-center justify-center font-bold">
                            <svg class="w-5 h-5 stroke-current" fill="none" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
                            </svg>
                        </div>
                        <h3 class="text-lg font-bold text-gray-900">{{ __('Konsultasi Regulasi') }}</h3>
                        <p class="text-xs text-gray-600 leading-relaxed">
                            {{ __('Bantuan pengurusan izin dan pemenuhan standar baku mutu air limbah.') }}
                        </p>
                    </div>

                    <!-- Card 4: Uji Laboratorium -->
                    <div class="md:col-span-8 bg-[#fcf9f8] rounded-3xl p-8 border border-gray-100 shadow-2xs space-y-4">
                        <div class="w-10 h-10 rounded-full bg-green-50 text-[#007327] flex items-center justify-center font-bold">
                            <svg class="w-5 h-5 stroke-current" fill="none" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19.428 15.428a2 2 0 00-1.022-.547l-2.387-.477a6 6 0 00-3.86.517l-.318.158a6 6 0 01-3.86.517L6.05 15.21a2 2 0 00-1.806.547M8 4h8l-1 1v5.172a2 2 0 00.586 1.414l5 5c1.26 1.26.367 3.414-1.415 3.414H4.828c-1.782 0-2.674-2.154-1.414-3.414l5-5A2 2 0 009 10.172V5L8 4z"/>
                            </svg>
                        </div>
                        <h3 class="text-lg font-bold text-gray-900">{{ __('Uji Laboratorium') }}</h3>
                        <p class="text-xs text-gray-600 leading-relaxed">
                            {{ __('Pengujian kualitas air limbah secara berkala untuk memastikan kepatuhan lingkungan.') }}
                        </p>
                    </div>
                </div>

            <!-- LAYOUT 2: Pengangkutan Sampah (2x2 Grid with Top-Left Image Card) (Image 4) -->
            @elseif($isWaste)
                <div class="grid grid-cols-1 md:grid-cols-12 gap-6 items-stretch">
                    <!-- Card 1: Terjadwal (Scheduled) -->
                    <div class="md:col-span-8 bg-[#fcf9f8] rounded-3xl p-8 border border-gray-100 shadow-2xs relative overflow-hidden flex flex-col justify-between group">
                        <div class="absolute right-0 top-0 bottom-0 w-1/2 opacity-25 group-hover:opacity-40 transition-opacity hidden sm:block">
                            <img src="https://images.unsplash.com/photo-1532996122724-e3c354a0b15b?auto=format&fit=crop&w=800&q=80" alt="Truk Sampah" class="w-full h-full object-cover">
                        </div>
                        <div class="relative z-10 space-y-4 max-w-md">
                            <div class="w-10 h-10 rounded-full bg-green-50 text-[#007327] flex items-center justify-center font-bold">
                                <svg class="w-5 h-5 stroke-current" fill="none" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                                </svg>
                            </div>
                            <h3 class="text-lg font-bold text-gray-900">{{ __('Terjadwal (Scheduled)') }}</h3>
                            <p class="text-xs text-gray-600 leading-relaxed">
                                {{ __('Layanan pengangkutan rutin mingguan atau bulanan untuk perumahan dan klaster.') }}
                            </p>
                        </div>
                    </div>

                    <!-- Card 2: Komersial -->
                    <div class="md:col-span-4 bg-[#fcf9f8] rounded-3xl p-8 border border-gray-100 shadow-2xs space-y-4">
                        <div class="w-10 h-10 rounded-full bg-red-50 text-[#820003] flex items-center justify-center font-bold">
                            <svg class="w-5 h-5 stroke-current" fill="none" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"/>
                            </svg>
                        </div>
                        <h3 class="text-lg font-bold text-gray-900">{{ __('Komersial') }}</h3>
                        <p class="text-xs text-gray-600 leading-relaxed">
                            {{ __('Pengangkutan volume besar untuk restoran, ruko, dan gedung perkantoran.') }}
                        </p>
                    </div>

                    <!-- Card 3: Pascaterenovasi -->
                    <div class="md:col-span-4 bg-[#fcf9f8] rounded-3xl p-8 border border-gray-100 shadow-2xs space-y-4">
                        <div class="w-10 h-10 rounded-full bg-red-50 text-[#820003] flex items-center justify-center font-bold">
                            <svg class="w-5 h-5 stroke-current" fill="none" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/>
                            </svg>
                        </div>
                        <h3 class="text-lg font-bold text-gray-900">{{ __('Pascaterenovasi') }}</h3>
                        <p class="text-xs text-gray-600 leading-relaxed">
                            {{ __('Pembersihan dan pembuangan puing sisa konstruksi dengan aman.') }}
                        </p>
                    </div>

                    <!-- Card 4: Panggilan Insidental (Regular) -->
                    <div class="md:col-span-8 bg-[#fcf9f8] rounded-3xl p-8 border border-gray-100 shadow-2xs space-y-4">
                        <div class="w-10 h-10 rounded-full bg-green-50 text-[#007327] flex items-center justify-center font-bold">
                            <svg class="w-5 h-5 stroke-current" fill="none" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"/>
                            </svg>
                        </div>
                        <h3 class="text-lg font-bold text-gray-900">{{ __('Panggilan Insidental (Regular)') }}</h3>
                        <p class="text-xs text-gray-600 leading-relaxed">
                            {{ __('Layanan on-demand untuk pengangkutan sampah mendadak atau barang berukuran besar (bulky waste).') }}
                        </p>
                    </div>
                </div>

            <!-- LAYOUT 3: Cleaning Service (3 Cards Side-by-Side) (Image 2) -->
            @elseif($isCleaning)
                <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                    <!-- Card 1: General Cleaning -->
                    <div class="bg-white rounded-3xl overflow-visible border border-gray-100 shadow-xs hover:shadow-xl transition-all duration-300 flex flex-col justify-between group hover:-translate-y-1">
                        <div>
                            <div class="h-48 overflow-hidden rounded-t-3xl relative bg-gray-100">
                                <img src="https://images.unsplash.com/photo-1497215728101-856f4ea42174?auto=format&fit=crop&w=800&q=80" alt="General Cleaning" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500">
                            </div>
                            <div class="relative -mt-6 ml-6 w-12 h-12 rounded-2xl bg-white border border-red-100 shadow-md flex items-center justify-center text-[#820003] z-20 group-hover:scale-110 transition-transform">
                                <svg class="w-6 h-6 stroke-current" fill="none" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 3v4M3 5h4M6 17v4m-2-2h4m5-16l2.286 6.857L21 12l-5.714 2.143L13 21l-2.286-6.857L5 12l5.714-2.143L13 3z"/>
                                </svg>
                            </div>
                            <div class="p-6 pt-3 space-y-2">
                                <h3 class="text-base font-bold text-gray-900 group-hover:text-[#820003] transition-colors">{{ __('General Cleaning') }}</h3>
                                <p class="text-xs text-gray-600 leading-relaxed">
                                    {{ __('Pembersihan rutin harian untuk menjaga standar estetika dan kebersihan ruang kerja atau hunian.') }}
                                </p>
                            </div>
                        </div>
                        <div class="px-6 pb-6 pt-2">
                            <a href="{{ route('consultation.index', ['service' => 'Cleaning Service', 'notes' => 'Kebutuhan: General Cleaning']) }}" class="inline-flex items-center gap-1.5 text-xs font-bold text-[#820003] hover:text-[#ba1a15] transition-colors group-hover:translate-x-1 transition-transform">
                                <span>{{ __('Pelajari Lebih Lanjut') }}</span>
                                <span>&rarr;</span>
                            </a>
                        </div>
                    </div>

                    <!-- Card 2: Deep Cleaning -->
                    <div class="bg-white rounded-3xl overflow-visible border border-gray-100 shadow-xs hover:shadow-xl transition-all duration-300 flex flex-col justify-between group hover:-translate-y-1">
                        <div>
                            <div class="h-48 overflow-hidden rounded-t-3xl relative bg-gray-100">
                                <img src="https://images.unsplash.com/photo-1527515637462-cff94eecc1ac?auto=format&fit=crop&w=800&q=80" alt="Deep Cleaning" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500">
                            </div>
                            <div class="relative -mt-6 ml-6 w-12 h-12 rounded-2xl bg-white border border-red-100 shadow-md flex items-center justify-center text-[#820003] z-20 group-hover:scale-110 transition-transform">
                                <svg class="w-6 h-6 stroke-current" fill="none" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19.428 15.428a2 2 0 00-1.022-.547l-2.387-.477a6 6 0 00-3.86.517l-.318.158a6 6 0 01-3.86.517L6.05 15.21a2 2 0 00-1.806.547M8 4h8l-1 1v5.172a2 2 0 00.586 1.414l5 5c1.26 1.26.367 3.414-1.415 3.414H4.828c-1.782 0-2.674-2.154-1.414-3.414l5-5A2 2 0 009 10.172V5L8 4z"/>
                                </svg>
                            </div>
                            <div class="p-6 pt-3 space-y-2">
                                <h3 class="text-base font-bold text-gray-900 group-hover:text-[#820003] transition-colors">{{ __('Deep Cleaning') }}</h3>
                                <p class="text-xs text-gray-600 leading-relaxed">
                                    {{ __('Pembersihan mendalam secara menyeluruh untuk menghilangkan kotoran membandel dan bakteri.') }}
                                </p>
                            </div>
                        </div>
                        <div class="px-6 pb-6 pt-2">
                            <a href="{{ route('consultation.index', ['service' => 'Cleaning Service', 'notes' => 'Kebutuhan: Deep Cleaning']) }}" class="inline-flex items-center gap-1.5 text-xs font-bold text-[#820003] hover:text-[#ba1a15] transition-colors group-hover:translate-x-1 transition-transform">
                                <span>{{ __('Pelajari Lebih Lanjut') }}</span>
                                <span>&rarr;</span>
                            </a>
                        </div>
                    </div>

                    <!-- Card 3: Office Cleaning -->
                    <div class="bg-white rounded-3xl overflow-visible border border-gray-100 shadow-xs hover:shadow-xl transition-all duration-300 flex flex-col justify-between group hover:-translate-y-1">
                        <div>
                            <div class="h-48 overflow-hidden rounded-t-3xl relative bg-gray-100">
                                <img src="https://images.unsplash.com/photo-1581578731548-c64695cc6952?auto=format&fit=crop&w=800&q=80" alt="Office Cleaning" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500">
                            </div>
                            <div class="relative -mt-6 ml-6 w-12 h-12 rounded-2xl bg-white border border-red-100 shadow-md flex items-center justify-center text-[#820003] z-20 group-hover:scale-110 transition-transform">
                                <svg class="w-6 h-6 stroke-current" fill="none" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"/>
                                </svg>
                            </div>
                            <div class="p-6 pt-3 space-y-2">
                                <h3 class="text-base font-bold text-gray-900 group-hover:text-[#820003] transition-colors">{{ __('Office Cleaning') }}</h3>
                                <p class="text-xs text-gray-600 leading-relaxed">
                                    {{ __('Layanan kebersihan komersial yang dirancang untuk mendukung produktivitas dan kenyamanan ruang kerja.') }}
                                </p>
                            </div>
                        </div>
                        <div class="px-6 pb-6 pt-2">
                            <a href="{{ route('consultation.index', ['service' => 'Cleaning Service', 'notes' => 'Kebutuhan: Office Cleaning']) }}" class="inline-flex items-center gap-1.5 text-xs font-bold text-[#820003] hover:text-[#ba1a15] transition-colors group-hover:translate-x-1 transition-transform">
                                <span>{{ __('Pelajari Lebih Lanjut') }}</span>
                                <span>&rarr;</span>
                            </a>
                        </div>
                    </div>
                </div>

            <!-- LAYOUT 4: Jasa Tukang (3 Cards Side-by-Side) (Image 3) -->
            @else
                <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                    <!-- Card 1: Perbaikan Ringan -->
                    <div class="bg-white rounded-3xl overflow-visible border border-gray-100 shadow-xs hover:shadow-xl transition-all duration-300 flex flex-col justify-between group hover:-translate-y-1">
                        <div>
                            <div class="h-48 overflow-hidden rounded-t-3xl relative bg-gray-100">
                                <img src="https://images.unsplash.com/photo-1621905251189-08b45d6a269e?auto=format&fit=crop&w=800&q=80" alt="Perbaikan Ringan" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500">
                            </div>
                            <div class="relative -mt-6 ml-6 w-12 h-12 rounded-2xl bg-white border border-red-100 shadow-md flex items-center justify-center text-[#820003] z-20 group-hover:scale-110 transition-transform">
                                <svg class="w-6 h-6 stroke-current" fill="none" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 4a2 2 0 114 0v1a1 1 0 001 1h3a1 1 0 011 1v3a1 1 0 01-1 1h-1a2 2 0 100 4h1a1 1 0 011 1v3a1 1 0 01-1 1h-3a1 1 0 01-1-1v-1a2 2 0 10-4 0v1a1 1 0 01-1 1H7a1 1 0 01-1-1v-3a1 1 0 00-1-1H4a2 2 0 110-4h1a1 1 0 001-1V7a1 1 0 011-1h3a1 1 0 001-1V4z"/>
                                </svg>
                            </div>
                            <div class="p-6 pt-3 space-y-2">
                                <h3 class="text-base font-bold text-gray-900 group-hover:text-[#820003] transition-colors">{{ __('Perbaikan Ringan') }}</h3>
                                <p class="text-xs text-gray-600 leading-relaxed">
                                    {{ __('Solusi cepat untuk masalah sehari-hari seperti kebocoran pipa, kerusakan stop kontak, kran air, dan pintu.') }}
                                </p>
                            </div>
                        </div>
                    </div>

                    <!-- Card 2: Maintenance Rutin -->
                    <div class="bg-white rounded-3xl overflow-visible border border-gray-100 shadow-xs hover:shadow-xl transition-all duration-300 flex flex-col justify-between group hover:-translate-y-1">
                        <div>
                            <div class="h-48 overflow-hidden rounded-t-3xl relative bg-gray-100">
                                <img src="https://images.unsplash.com/photo-1581092160607-ee22621dd758?auto=format&fit=crop&w=800&q=80" alt="Maintenance Rutin" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500">
                            </div>
                            <div class="relative -mt-6 ml-6 w-12 h-12 rounded-2xl bg-white border border-red-100 shadow-md flex items-center justify-center text-[#820003] z-20 group-hover:scale-110 transition-transform">
                                <svg class="w-6 h-6 stroke-current" fill="none" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z"/>
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                                </svg>
                            </div>
                            <div class="p-6 pt-3 space-y-2">
                                <h3 class="text-base font-bold text-gray-900 group-hover:text-[#820003] transition-colors">{{ __('Maintenance Rutin') }}</h3>
                                <p class="text-xs text-gray-600 leading-relaxed">
                                    {{ __('Perawatan berkala untuk AC, sistem kelistrikan, dan saluran air guna mencegah kerusakan fatal.') }}
                                </p>
                            </div>
                        </div>
                    </div>

                    <!-- Card 3: Renovasi Ruangan -->
                    <div class="bg-white rounded-3xl overflow-visible border border-gray-100 shadow-xs hover:shadow-xl transition-all duration-300 flex flex-col justify-between group hover:-translate-y-1">
                        <div>
                            <div class="h-48 overflow-hidden rounded-t-3xl relative bg-gray-100">
                                <img src="https://images.unsplash.com/photo-1503387762-592deb58ef4e?auto=format&fit=crop&w=800&q=80" alt="Renovasi Ruangan" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500">
                            </div>
                            <div class="relative -mt-6 ml-6 w-12 h-12 rounded-2xl bg-white border border-red-100 shadow-md flex items-center justify-center text-[#820003] z-20 group-hover:scale-110 transition-transform">
                                <svg class="w-6 h-6 stroke-current" fill="none" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 5a1 1 0 011-1h14a1 1 0 011 1v2a1 1 0 01-1 1H5a1 1 0 01-1-1V5zM4 13a1 1 0 011-1h6a1 1 0 011 1v6a1 1 0 01-1 1H5a1 1 0 01-1-1v-6zM16 13a1 1 0 011-1h2a1 1 0 011 1v6a1 1 0 01-1 1h-2a1 1 0 01-1-1v-6z"/>
                                </svg>
                            </div>
                            <div class="p-6 pt-3 space-y-2">
                                <h3 class="text-base font-bold text-gray-900 group-hover:text-[#820003] transition-colors">{{ __('Renovasi Ruangan') }}</h3>
                                <p class="text-xs text-gray-600 leading-relaxed">
                                    {{ __('Perombakan tata letak, pengecatan ulang, dan pembaruan interior untuk menyegarkan suasana properti.') }}
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            @endif
        </div>
    </section>

    <!-- SECTION 2: Telah Dipercaya Ratusan Klien Dari Berbagai Industri (Images 1, 2, 3, 4) -->
    <section class="py-20 bg-[#fcf9f8] border-b border-gray-100" x-data="{ activeTab: '{{ $defaultTab }}' }">
        <div class="max-w-[1280px] mx-auto px-4 sm:px-6 lg:px-8 space-y-10">
            
            <!-- Section Header -->
            <div class="text-center max-w-3xl mx-auto space-y-2">
                <h2 class="text-2xl sm:text-3xl lg:text-4xl font-extrabold text-[#820003] tracking-tight">
                    {{ __('Telah Dipercaya Ratusan Klien Dari Berbagai Industri') }}
                </h2>
                <p class="text-xs sm:text-sm text-gray-600 font-normal">
                    {{ __('UMKM, Brand Nasional, Instansi Pemerintah, Restoran, Toko, Klinik, Cafe, hingga Mall.') }}
                </p>
            </div>

            <!-- Dark Pill Bar with White Active Tab (Images 1, 2, 3, 4) -->
            <div class="flex justify-center">
                <div class="inline-flex p-1.5 rounded-full bg-[#2b2b2b] shadow-inner gap-1">
                    @foreach($tabs as $tab)
                        <button type="button" @click="activeTab = '{{ $tab }}'" 
                                :class="activeTab === '{{ $tab }}' ? 'bg-white text-gray-900 shadow-md' : 'text-gray-300 hover:text-white'" 
                                class="px-5 sm:px-6 py-2 rounded-full text-xs font-bold transition-all">
                            {{ __($tab) }}
                        </button>
                    @endforeach
                </div>
            </div>

            <!-- Subheading below tabs -->
            <div class="text-center space-y-1">
                <h3 class="text-xl sm:text-2xl font-extrabold text-gray-900 tracking-tight">
                    {{ __('Project') }} <span x-text="activeTab"></span>
                </h3>
                <p class="text-xs text-gray-500 font-normal">
                    @if($isIpal)
                        {{ __('Dokumentasi perawatan berkala untuk menjaga performa sistem pengelolaan limbah tetap optimal.') }}
                    @elseif($isCleaning)
                        {{ __('Dokumentasi layanan kebersihan untuk menjaga lingkungan kantor tetap bersih, nyaman, dan profesional.') }}
                    @elseif($isTukang)
                        {{ __('Dokumentasi perombakan tata letak, pengecatan ulang, dan pembaruan interior untuk menyegarkan suasana properti.') }}
                    @else
                        {{ __('Dokumentasi layanan pengangkutan rutin mingguan atau bulanan untuk perumahan dan klaster.') }}
                    @endif
                </p>
            </div>

            <!-- Minimalist Photo Catalog Grid -->
            @if($isIpal)
                <!-- IPAL Layout: Left Video Preview Card + Right Large Photo (Image 1) -->
                <div class="grid grid-cols-1 md:grid-cols-2 gap-8 items-stretch">
                    <!-- Left: Video Card with 2 frames -->
                    <div class="bg-white rounded-3xl p-6 border border-gray-100 shadow-xs flex flex-col justify-between space-y-4">
                        <div class="text-center space-y-1">
                            <span class="text-[10px] text-gray-400 uppercase tracking-widest block font-bold">video highlight</span>
                            <h4 class="text-sm font-bold text-gray-900">{{ __('Lihat Hasil Project Kami') }}</h4>
                            <p class="text-[11px] text-gray-500">{{ __('Simak dokumentasi video singkat dari beberapa project yang telah kami kerjakan.') }}</p>
                        </div>
                        <div class="grid grid-cols-2 gap-4">
                            <div class="h-64 rounded-2xl overflow-hidden relative bg-black">
                                <img src="https://images.unsplash.com/photo-1541888946425-d0fbb186a5b7?auto=format&fit=crop&w=600&q=80" alt="Video frame 1" class="w-full h-full object-cover opacity-80">
                                <div class="absolute inset-0 flex items-center justify-center">
                                    <div class="w-12 h-12 rounded-full bg-[#820003] text-white flex items-center justify-center shadow-lg">
                                        <svg class="w-5 h-5 fill-current translate-x-0.5" viewBox="0 0 24 24"><path d="M8 5v14l11-7z"/></svg>
                                    </div>
                                </div>
                            </div>
                            <div class="h-64 rounded-2xl overflow-hidden relative bg-black">
                                <img src="https://images.unsplash.com/photo-1581094794329-c8112a89af12?auto=format&fit=crop&w=600&q=80" alt="Video frame 2" class="w-full h-full object-cover opacity-80">
                                <div class="absolute inset-0 flex items-center justify-center">
                                    <div class="w-12 h-12 rounded-full bg-[#820003] text-white flex items-center justify-center shadow-lg">
                                        <svg class="w-5 h-5 fill-current translate-x-0.5" viewBox="0 0 24 24"><path d="M8 5v14l11-7z"/></svg>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Right: Large Clean IPAL Facility Photo -->
                    <div class="rounded-3xl overflow-hidden shadow-xs border border-gray-100 bg-white">
                        <img src="https://images.unsplash.com/photo-1541888946425-d0fbb186a5b7?auto=format&fit=crop&w=1000&q=80" alt="IPAL Project Photo" class="w-full h-full object-cover min-h-[320px]">
                    </div>
                </div>
            @else
                <!-- 2 Side-by-Side Clean Photos (Images 2, 3, 4) -->
                <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                    @if($isCleaning)
                        <div class="rounded-3xl overflow-hidden shadow-xs border border-gray-100 bg-white h-80 sm:h-96">
                            <img src="https://images.unsplash.com/photo-1497215728101-856f4ea42174?auto=format&fit=crop&w=1000&q=80" alt="Office Cleaning 1" class="w-full h-full object-cover">
                        </div>
                        <div class="rounded-3xl overflow-hidden shadow-xs border border-gray-100 bg-white h-80 sm:h-96">
                            <img src="https://images.unsplash.com/photo-1527515637462-cff94eecc1ac?auto=format&fit=crop&w=1000&q=80" alt="Office Cleaning 2" class="w-full h-full object-cover">
                        </div>
                    @elseif($isTukang)
                        <div class="rounded-3xl overflow-hidden shadow-xs border border-gray-100 bg-white h-80 sm:h-96">
                            <img src="https://images.unsplash.com/photo-1503387762-592deb58ef4e?auto=format&fit=crop&w=1000&q=80" alt="Renovasi Ruangan 1" class="w-full h-full object-cover">
                        </div>
                        <div class="rounded-3xl overflow-hidden shadow-xs border border-gray-100 bg-white h-80 sm:h-96">
                            <img src="https://images.unsplash.com/photo-1621905251189-08b45d6a269e?auto=format&fit=crop&w=1000&q=80" alt="Renovasi Ruangan 2" class="w-full h-full object-cover">
                        </div>
                    @else
                        <div class="rounded-3xl overflow-hidden shadow-xs border border-gray-100 bg-white h-80 sm:h-96">
                            <img src="https://images.unsplash.com/photo-1532996122724-e3c354a0b15b?auto=format&fit=crop&w=1000&q=80" alt="Pengangkutan Sampah 1" class="w-full h-full object-cover">
                        </div>
                        <div class="rounded-3xl overflow-hidden shadow-xs border border-gray-100 bg-white h-80 sm:h-96">
                            <img src="https://images.unsplash.com/photo-1542838132-92c53300491e?auto=format&fit=crop&w=1000&q=80" alt="Pengangkutan Sampah 2" class="w-full h-full object-cover">
                        </div>
                    @endif
                </div>
            @endif

        </div>
    </section>

    <!-- SECTION 3: Video Highlight (Lihat Hasil Project Kami) (Images 1, 2, 3, 4) -->
    <section class="py-20 bg-white" x-data="{ videoModal: false, currentVideoUrl: '' }">
        <div class="max-w-[1280px] mx-auto px-4 sm:px-6 lg:px-8 space-y-12">
            
            <div class="text-center max-w-3xl mx-auto space-y-2">
                <span class="text-[11px] font-bold text-gray-400 uppercase tracking-widest block">
                    video highlight
                </span>
                <h2 class="text-3xl sm:text-4xl font-extrabold text-[#1c1b1b] tracking-tight">
                    {{ __('Lihat Hasil Project Kami') }}
                </h2>
                <p class="text-xs sm:text-sm text-gray-500 leading-relaxed">
                    {{ __('Simak dokumentasi video singkat dari beberapa project booth yang telah kami kerjakan, langsung dari sudut pandang klien kami.') }}
                </p>
            </div>

            <!-- 2 Cards Side-by-Side (Each contains 2 video frames with red play button) -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                <!-- Card 1 -->
                <div class="bg-[#fcf9f8] p-6 rounded-3xl border border-gray-100 shadow-2xs space-y-4">
                    <div class="text-center space-y-1">
                        <span class="text-[10px] text-gray-400 uppercase tracking-widest block font-bold">video highlight</span>
                        <h4 class="text-sm font-bold text-gray-900">{{ __('Lihat Hasil Project Kami') }}</h4>
                        <p class="text-[11px] text-gray-500">{{ __('Simak dokumentasi video singkat dari beberapa project yang telah kami kerjakan.') }}</p>
                    </div>
                    <div class="grid grid-cols-2 gap-4">
                        <div class="h-64 sm:h-72 rounded-2xl overflow-hidden relative bg-black cursor-pointer group"
                             @click="currentVideoUrl = 'https://www.youtube.com/embed/aqz-KE-bpKQ?autoplay=1'; videoModal = true">
                            <img src="https://images.unsplash.com/photo-1541888946425-d0fbb186a5b7?auto=format&fit=crop&w=600&q=80" alt="Video frame 1" class="w-full h-full object-cover opacity-80 group-hover:scale-105 transition-transform duration-300">
                            <div class="absolute inset-0 flex items-center justify-center">
                                <div class="w-12 h-12 rounded-full bg-[#820003] text-white flex items-center justify-center shadow-lg group-hover:scale-110 transition-transform">
                                    <svg class="w-5 h-5 fill-current translate-x-0.5" viewBox="0 0 24 24"><path d="M8 5v14l11-7z"/></svg>
                                </div>
                            </div>
                        </div>
                        <div class="h-64 sm:h-72 rounded-2xl overflow-hidden relative bg-black cursor-pointer group"
                             @click="currentVideoUrl = 'https://www.youtube.com/embed/aqz-KE-bpKQ?autoplay=1'; videoModal = true">
                            <img src="https://images.unsplash.com/photo-1581094794329-c8112a89af12?auto=format&fit=crop&w=600&q=80" alt="Video frame 2" class="w-full h-full object-cover opacity-80 group-hover:scale-105 transition-transform duration-300">
                            <div class="absolute inset-0 flex items-center justify-center">
                                <div class="w-12 h-12 rounded-full bg-[#820003] text-white flex items-center justify-center shadow-lg group-hover:scale-110 transition-transform">
                                    <svg class="w-5 h-5 fill-current translate-x-0.5" viewBox="0 0 24 24"><path d="M8 5v14l11-7z"/></svg>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Card 2 -->
                <div class="bg-[#fcf9f8] p-6 rounded-3xl border border-gray-100 shadow-2xs space-y-4">
                    <div class="text-center space-y-1">
                        <span class="text-[10px] text-gray-400 uppercase tracking-widest block font-bold">video highlight</span>
                        <h4 class="text-sm font-bold text-gray-900">{{ __('Lihat Hasil Project Kami') }}</h4>
                        <p class="text-[11px] text-gray-500">{{ __('Simak dokumentasi video singkat dari beberapa project yang telah kami kerjakan.') }}</p>
                    </div>
                    <div class="grid grid-cols-2 gap-4">
                        <div class="h-64 sm:h-72 rounded-2xl overflow-hidden relative bg-black cursor-pointer group"
                             @click="currentVideoUrl = 'https://www.youtube.com/embed/aqz-KE-bpKQ?autoplay=1'; videoModal = true">
                            <img src="https://images.unsplash.com/photo-1503387762-592deb58ef4e?auto=format&fit=crop&w=600&q=80" alt="Video frame 3" class="w-full h-full object-cover opacity-80 group-hover:scale-105 transition-transform duration-300">
                            <div class="absolute inset-0 flex items-center justify-center">
                                <div class="w-12 h-12 rounded-full bg-[#820003] text-white flex items-center justify-center shadow-lg group-hover:scale-110 transition-transform">
                                    <svg class="w-5 h-5 fill-current translate-x-0.5" viewBox="0 0 24 24"><path d="M8 5v14l11-7z"/></svg>
                                </div>
                            </div>
                        </div>
                        <div class="h-64 sm:h-72 rounded-2xl overflow-hidden relative bg-black cursor-pointer group"
                             @click="currentVideoUrl = 'https://www.youtube.com/embed/aqz-KE-bpKQ?autoplay=1'; videoModal = true">
                            <img src="https://images.unsplash.com/photo-1581578731548-c64695cc6952?auto=format&fit=crop&w=600&q=80" alt="Video frame 4" class="w-full h-full object-cover opacity-80 group-hover:scale-105 transition-transform duration-300">
                            <div class="absolute inset-0 flex items-center justify-center">
                                <div class="w-12 h-12 rounded-full bg-[#820003] text-white flex items-center justify-center shadow-lg group-hover:scale-110 transition-transform">
                                    <svg class="w-5 h-5 fill-current translate-x-0.5" viewBox="0 0 24 24"><path d="M8 5v14l11-7z"/></svg>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Video Player Modal -->
        <div x-show="videoModal" 
             x-transition:enter="transition ease-out duration-300"
             x-transition:enter-start="opacity-0"
             x-transition:enter-end="opacity-100"
             x-transition:leave="transition ease-in duration-200"
             x-transition:leave-start="opacity-100"
             x-transition:leave-end="opacity-0"
             class="fixed inset-0 z-50 bg-black/80 backdrop-blur-md flex items-center justify-center p-4"
             @click="videoModal = false; currentVideoUrl = ''"
             style="display: none;">
            
            <div class="relative w-full max-w-sm sm:max-w-md bg-black rounded-3xl overflow-hidden shadow-2xl border border-neutral-800 aspect-[9/16] max-h-[85vh]"
                 @click.stop>
                <button @click="videoModal = false; currentVideoUrl = ''" class="absolute top-4 right-4 z-20 w-9 h-9 rounded-full bg-black/60 text-white flex items-center justify-center hover:bg-black transition-colors" aria-label="Tutup Video">
                    ✕
                </button>
                <template x-if="videoModal && currentVideoUrl">
                    <iframe :src="currentVideoUrl" 
                            class="w-full h-full border-0" 
                            allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" 
                            allowfullscreen>
                    </iframe>
                </template>
            </div>
        </div>
    </section>
@endsection
