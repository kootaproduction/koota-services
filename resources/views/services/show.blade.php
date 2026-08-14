@extends('layouts.app')

@section('title', $service->title . ' - KOOTA SERVICE')

@section('content')
    <!-- Breadcrumb -->
    <div class="bg-[#fcf9f8] border-b border-gray-100 py-3 text-xs text-gray-500">
        <div class="max-w-[1280px] mx-auto px-4 sm:px-6 lg:px-8 flex items-center space-x-2">
            <a href="{{ route('home') }}" class="hover:text-[#820003] transition-colors">Home</a>
            <span>›</span>
            <a href="{{ route('services.index') }}" class="hover:text-[#820003] transition-colors">Layanan</a>
            <span>›</span>
            <span class="font-semibold text-gray-900">{{ $service->title }}</span>
        </div>
    </div>

    <!-- Hero Section with Background Image & Overlay -->
    <section class="relative bg-gray-950 text-white py-24 md:py-32 overflow-hidden">
        <!-- Background Image with Overlay -->
        <div class="absolute inset-0 z-0">
            <img src="{{ $service->hero_image }}" alt="{{ $service->title }}" class="w-full h-full object-cover opacity-40 filter brightness-90">
            <div class="absolute inset-0 bg-gradient-to-t from-[#1c1b1b] via-[#1c1b1b]/60 to-transparent"></div>
        </div>

        <div class="relative z-10 max-w-[1280px] mx-auto px-4 sm:px-6 lg:px-8 text-center space-y-6">
            <!-- Badge Pill (Green Container) -->
            <div class="inline-flex items-center gap-2 px-4 py-1.5 rounded-full text-xs font-semibold bg-[#80f98b] text-[#007327] shadow-xs">
                <span>{{ $service->badge_label ?? 'Sustainability Service' }}</span>
            </div>

            <!-- Title -->
            <h1 class="text-4xl sm:text-5xl lg:text-6xl font-bold tracking-tight text-white leading-tight max-w-4xl mx-auto">
                {{ $service->title }}
            </h1>

            <!-- Subtitle -->
            <p class="text-base sm:text-lg text-gray-200 max-w-3xl mx-auto leading-relaxed">
                {{ $service->description }}
            </p>

            <!-- CTA Maroon Button -->
            <div class="pt-4">
                <a href="{{ route('consultation.index', ['service' => $service->title]) }}" class="inline-flex items-center gap-2 px-8 py-3.5 rounded-xl bg-[#820003] hover:bg-[#ba1a15] text-white font-bold text-sm sm:text-base transition-all shadow-xl hover:shadow-2xl active:scale-95">
                    <span>{{ $service->hero_cta_text ?? 'Konsultasi Sekarang' }}</span>
                </a>
            </div>
        </div>
    </section>

    <!-- Section: Layanan Sesuai Kebutuhan Anda / Solusi Jasa Kami -->
    <section class="py-20 bg-[#fcf9f8] border-b border-gray-100">
        <div class="max-w-[1280px] mx-auto px-4 sm:px-6 lg:px-8 space-y-16">
            <div class="text-center max-w-3xl mx-auto space-y-3">
                <h2 class="text-3xl sm:text-4xl font-bold text-[#1c1b1b] tracking-tight">
                    @if($service->slug === 'pengangkutan-sampah')
                        Layanan Sesuai Kebutuhan Anda
                    @elseif($service->slug === 'jasa-tukang-perbaikan-dan-renovasi' || $service->slug === 'jasa-tukang')
                        Solusi Jasa Tukang Kami
                    @else
                        Solusi {{ $service->title }} Kami
                    @endif
                </h2>
                <p class="text-sm sm:text-base text-gray-600 leading-relaxed">
                    @if($service->slug === 'pengangkutan-sampah')
                        Kami menyediakan berbagai opsi pengangkutan untuk berbagai skala kebutuhan, mulai dari residensial hingga komersial besar.
                    @else
                        Berbagai layanan perbaikan dan pengelolaan komprehensif untuk properti residensial maupun komersial Anda.
                    @endif
                </p>
            </div>

            <!-- Grid Solutions -->
            @if($solutions->count() <= 3 && $solutions->whereNotNull('image')->count() > 0)
                <!-- 3 Columns with Images (e.g. Jasa Tukang) -->
                <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                    @foreach($solutions as $solution)
                        <div class="bg-white rounded-2xl overflow-hidden border border-gray-100 shadow-xs hover:shadow-md transition-all group flex flex-col justify-between">
                            <div>
                                @if($solution->image)
                                    <div class="h-48 overflow-hidden relative bg-gray-200">
                                        <img src="{{ $solution->image }}" alt="{{ $solution->title }}" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500">
                                    </div>
                                @endif
                                <div class="p-6 space-y-3">
                                    <div class="w-8 h-8 rounded-lg bg-red-50 text-[#820003] flex items-center justify-center text-sm font-bold">
                                        <svg class="w-4 h-4 stroke-current" fill="none" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 4a2 2 0 114 0v1a1 1 0 001 1h3a1 1 0 011 1v3a1 1 0 01-1 1h-1a2 2 0 100 4h1a1 1 0 011 1v3a1 1 0 01-1 1h-3a1 1 0 01-1-1v-1a2 2 0 10-4 0v1a1 1 0 01-1 1H7a1 1 0 01-1-1v-3a1 1 0 00-1-1H4a2 2 0 110-4h1a1 1 0 001-1V7a1 1 0 011-1h3a1 1 0 001-1V4z"/>
                                        </svg>
                                    </div>
                                    <h3 class="text-lg font-bold text-gray-900 group-hover:text-[#820003] transition-colors">
                                        {{ $solution->title }}
                                    </h3>
                                    <p class="text-xs text-gray-600 leading-relaxed">
                                        {{ $solution->description }}
                                    </p>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            @else
                <!-- 2x2 Clean Cards (e.g. Pengangkutan Sampah) -->
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    @foreach($solutions as $solution)
                        <div class="bg-white rounded-2xl p-7 border border-gray-100 shadow-xs hover:shadow-md transition-all space-y-4 flex flex-col justify-between">
                            <div class="space-y-3">
                                <div class="w-9 h-9 rounded-lg {{ $loop->index % 2 === 0 ? 'bg-green-50 text-[#007327]' : 'bg-red-50 text-[#820003]' }} flex items-center justify-center">
                                    @if($loop->index === 0)
                                        <svg class="w-5 h-5 stroke-current" fill="none" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                                        </svg>
                                    @elseif($loop->index === 1)
                                        <svg class="w-5 h-5 stroke-current" fill="none" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"/>
                                        </svg>
                                    @elseif($loop->index === 2)
                                        <svg class="w-5 h-5 stroke-current" fill="none" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"/>
                                        </svg>
                                    @else
                                        <svg class="w-5 h-5 stroke-current" fill="none" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"/>
                                        </svg>
                                    @endif
                                </div>
                                <h3 class="text-lg font-bold text-gray-900">
                                    {{ $solution->title }}
                                </h3>
                                <p class="text-xs sm:text-sm text-gray-600 leading-relaxed">
                                    {{ $solution->description }}
                                </p>
                            </div>
                        </div>
                    @endforeach
                </div>
            @endif
        </div>
    </section>

    <!-- Section: Telah Dipercaya Ratusan Klien Dari Berbagai Industri (Project Showcase) -->
    @php
        $availableCategories = $projects->pluck('category_name')->filter()->unique()->values();
        $defaultActiveTab = $availableCategories->first() ?? 'Dokumentasi';
    @endphp

    <section class="py-20 bg-white border-b border-gray-100" x-data="{ activeTab: '{{ $defaultActiveTab }}' }">
        <div class="max-w-[1280px] mx-auto px-4 sm:px-6 lg:px-8 space-y-12">
            <!-- Section Header -->
            <div class="text-center max-w-3xl mx-auto space-y-3">
                <h2 class="text-3xl sm:text-4xl font-bold text-[#820003] tracking-tight">
                    Telah Dipercaya Ratusan Klien Dari Berbagai Industri
                </h2>
                <p class="text-xs sm:text-sm text-gray-500 font-medium">
                    UMKM, Brand Nasional, Instansi Pemerintah, Restoran, Toko, Klinik, Cafe, hingga Mall.
                </p>
            </div>

            <!-- Tab Pills (Pills Filter) -->
            @if($availableCategories->count() > 1)
                <div class="flex flex-wrap justify-center gap-2.5">
                    @foreach($availableCategories as $cat)
                        <button @click="activeTab = '{{ $cat }}'" :class="activeTab === '{{ $cat }}' ? 'bg-[#313030] text-white shadow-xs' : 'bg-white text-gray-700 border border-gray-200 hover:bg-gray-50'" class="px-6 py-2 rounded-full text-xs font-semibold transition-all">
                            {{ $cat }}
                        </button>
                    @endforeach
                </div>
            @endif

            <!-- Dynamic Project Title & Description -->
            <div class="text-center max-w-xl mx-auto space-y-2">
                <h3 class="text-2xl font-bold text-gray-900">
                    Project <span x-text="activeTab"></span>
                </h3>
                <p class="text-xs text-gray-500">
                    Dokumentasi pengerjaan profesional untuk menjaga lingkungan dan bangunan tetap bersih, nyaman, dan terawat.
                </p>
            </div>

            <!-- 2-Column Gallery Cards Grid -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                @foreach($projects->where('is_video', false) as $project)
                    <div x-show="activeTab === '{{ $project->category_name }}' || '{{ $availableCategories->count() }}' <= 1" x-transition class="rounded-2xl overflow-hidden shadow-xs hover:shadow-md border border-gray-100 bg-white group">
                        <div class="h-80 sm:h-96 overflow-hidden relative bg-gray-200">
                            <img src="{{ $project->image }}" alt="{{ $project->title }}" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500">
                        </div>
                    </div>
                @endforeach

                <!-- Fallback card to always maintain clean 2-column aesthetic if only 1 image -->
                @if($projects->where('is_video', false)->count() === 1)
                    <div class="rounded-2xl overflow-hidden shadow-xs hover:shadow-md border border-gray-100 bg-white group">
                        <div class="h-80 sm:h-96 overflow-hidden relative bg-gray-200">
                            <img src="https://images.unsplash.com/photo-1530587191325-3db32d826c18?auto=format&fit=crop&w=1000&q=80" alt="Dokumentasi Project Koota Service" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500">
                        </div>
                    </div>
                @endif
            </div>
        </div>
    </section>

    <!-- Section: Video Highlight / Lihat Hasil Project Kami -->
    <section class="py-20 bg-[#fcf9f8]">
        <div class="max-w-[1280px] mx-auto px-4 sm:px-6 lg:px-8 space-y-12">
            <div class="text-center max-w-3xl mx-auto space-y-2">
                <span class="text-xs font-semibold text-gray-500 uppercase tracking-widest block">
                    Video Highlight
                </span>
                <h2 class="text-3xl sm:text-4xl font-bold text-[#1c1b1b] tracking-tight">
                    Lihat Hasil Project Kami
                </h2>
                <p class="text-xs sm:text-sm text-gray-600 leading-relaxed">
                    Simak dokumentasi video singkat dari beberapa project yang telah kami kerjakan, langsung dari sudut pandang klien kami.
                </p>
            </div>

            <!-- 2 Video Cards Grid -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                <!-- Video 1 -->
                <div class="relative rounded-2xl overflow-hidden shadow-md border border-gray-200 bg-neutral-900 group aspect-video">
                    <img src="{{ $videoProjects[0]->image ?? 'https://images.unsplash.com/photo-1581578731548-c64695cc6952?auto=format&fit=crop&w=1000&q=80' }}" alt="Video Highlight Koota Service" class="w-full h-full object-cover opacity-75 group-hover:opacity-85 transition-opacity duration-300">
                    <div class="absolute inset-0 flex items-center justify-center">
                        <div class="w-14 h-14 rounded-full bg-[#820003] text-white flex items-center justify-center shadow-2xl group-hover:scale-110 group-hover:bg-[#ba1a15] transition-all cursor-pointer">
                            <svg class="w-6 h-6 fill-current translate-x-0.5" viewBox="0 0 24 24">
                                <path d="M8 5v14l11-7z"/>
                            </svg>
                        </div>
                    </div>
                </div>

                <!-- Video 2 -->
                <div class="relative rounded-2xl overflow-hidden shadow-md border border-gray-200 bg-neutral-900 group aspect-video">
                    <img src="{{ $videoProjects[1]->image ?? 'https://images.unsplash.com/photo-1503387762-592deb58ef4e?auto=format&fit=crop&w=1000&q=80' }}" alt="Video Highlight Koota Service" class="w-full h-full object-cover opacity-75 group-hover:opacity-85 transition-opacity duration-300">
                    <div class="absolute inset-0 flex items-center justify-center">
                        <div class="w-14 h-14 rounded-full bg-[#820003] text-white flex items-center justify-center shadow-2xl group-hover:scale-110 group-hover:bg-[#ba1a15] transition-all cursor-pointer">
                            <svg class="w-6 h-6 fill-current translate-x-0.5" viewBox="0 0 24 24">
                                <path d="M8 5v14l11-7z"/>
                            </svg>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
