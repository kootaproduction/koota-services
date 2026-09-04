<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="Content-Security-Policy" content="upgrade-insecure-requests">
    <title>@yield('title', 'KOOTA SERVICE - Solusi Fasilitas Terintegrasi')</title>
    <meta name="description" content="Solusi terpadu untuk kebutuhan perawatan fasilitas dan manajemen lingkungan yang berkelanjutan di Surabaya, Malang, Bali, Jakarta.">
    
    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;500;600;700;800&family=Playfair+Display:ital,wght@0,600;0,700;0,800;1,600&display=swap" rel="stylesheet">
    
    <link rel="icon" type="image/svg+xml" href="{{ asset('images/logo.svg') }}">
    
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <style>
        body { font-family: 'Plus Jakarta Sans', sans-serif; }
        .font-serif-brand { font-family: 'Playfair Display', Georgia, serif; }
    </style>
</head>
<body class="bg-[#fcf9f8] text-[#1c1b1b] font-sans antialiased flex flex-col min-h-screen" x-data="{ sideDrawer: false }">

    <!-- Header / Navbar with Bubble Gloss Hover & Slide-out Menu -->
    <header x-data="{ openMegaMenu: false, openLang: false }" class="sticky top-0 z-50 bg-white/95 backdrop-blur-md shadow-xs border-b border-gray-100">
        <div class="max-w-[1280px] mx-auto px-4 sm:px-6 lg:px-8 h-20 flex items-center justify-between">
            
            <!-- Brand Logo (Exact Official Image from User) -->
            <a href="{{ route('home') }}" class="flex items-center group py-1">
                <img src="{{ asset('images/logo.png') }}" alt="KOOTA SERVICE" class="h-12 sm:h-14 w-auto object-contain transition-transform group-hover:scale-105">
            </a>

            <!-- Desktop Nav Links with Bubble Gloss Hover Effect -->
            <nav class="hidden lg:flex items-center space-x-1">
                <a href="{{ route('home') }}" class="px-4 py-2 rounded-full text-[14px] font-semibold transition-all duration-300 hover:bg-white hover:backdrop-blur-md hover:shadow-[0_4px_16px_rgba(130,0,3,0.12)] hover:border hover:border-red-100/80 {{ request()->routeIs('home') ? 'text-[#820003] font-bold bg-red-50/70 border border-red-100/60' : 'text-gray-700 hover:text-[#820003]' }}">
                    {{ __('Home') }}
                </a>

                <!-- Layanan Item: Klik Teks ke /layanan, Klik/Hover Panah Membuka Mega-Menu -->
                <div class="relative" @mouseenter="openMegaMenu = true" @mouseleave="openMegaMenu = false">
                    <div class="inline-flex items-center gap-1 px-4 py-2 rounded-full text-[14px] font-semibold transition-all duration-300 hover:bg-white hover:backdrop-blur-md hover:shadow-[0_4px_16px_rgba(130,0,3,0.12)] hover:border hover:border-red-100/80 {{ request()->routeIs('services.*') ? 'text-[#820003] font-bold bg-red-50/70 border border-red-100/60' : 'text-gray-700 hover:text-[#820003]' }}">
                        <a href="{{ route('services.index') }}" class="hover:underline">
                            {{ __('Layanan') }}
                        </a>
                        <button type="button" @click="openMegaMenu = !openMegaMenu" class="p-0.5 rounded-full hover:bg-gray-100 transition-colors focus:outline-none" aria-label="Buka Menu Layanan">
                            <svg class="w-3.5 h-3.5 transition-transform duration-200 text-gray-500 hover:text-[#820003]" :class="{ 'rotate-180 text-[#820003]': openMegaMenu }" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M19 9l-7 7-7-7"/>
                            </svg>
                        </button>
                    </div>

                    <!-- Mega Menu Dropdown — Only 3 Core Services -->
                    <div x-show="openMegaMenu" 
                         x-transition:enter="transition ease-out duration-200" 
                         x-transition:enter-start="opacity-0 translate-y-2" 
                         x-transition:enter-end="opacity-100 translate-y-0" 
                         x-transition:leave="transition ease-in duration-150" 
                         x-transition:leave-start="opacity-100 translate-y-0" 
                         x-transition:leave-end="opacity-0 translate-y-2" 
                         class="absolute left-1/2 -translate-x-1/2 mt-1 w-[800px] bg-white/95 backdrop-blur-xl rounded-2xl shadow-2xl border border-gray-100/80 p-8 z-50">
                        
                        <div class="grid grid-cols-3 gap-6 text-left">
                            <!-- Home Cleaning -->
                            <a href="{{ route('services.show', 'home-cleaning') }}" class="group block space-y-1.5 p-4 rounded-xl hover:bg-red-50/50 transition-colors">
                                <h4 class="font-bold text-sm text-gray-900 group-hover:text-[#820003] transition-colors">{{ __('Pembersihan Rumah') }}</h4>
                                <p class="text-xs text-gray-500 leading-relaxed">{{ __('Pembersihan harian, pembersihan menyeluruh, sedot tungau kasur & sofa, sterilisasi hunian.') }}</p>
                            </a>

                            <!-- Perbaikan Rumah -->
                            <a href="{{ route('services.show', 'perbaikan-rumah') }}" class="group block space-y-1.5 p-4 rounded-xl hover:bg-red-50/50 transition-colors">
                                <h4 class="font-bold text-sm text-gray-900 group-hover:text-[#820003] transition-colors">{{ __('Perbaikan Rumah') }}</h4>
                                <p class="text-xs text-gray-500 leading-relaxed">{{ __('Tukang ahli, perbaikan kebocoran pipa, kelistrikan, servis AC & renovasi hunian.') }}</p>
                            </a>

                            <!-- Pengangkutan Sampah -->
                            <a href="{{ route('services.show', 'pengangkutan-sampah') }}" class="group block space-y-1.5 p-4 rounded-xl hover:bg-red-50/50 transition-colors">
                                <h4 class="font-bold text-sm text-gray-900 group-hover:text-[#820003] transition-colors">{{ __('Pengangkutan Sampah') }}</h4>
                                <p class="text-xs text-gray-500 leading-relaxed">{{ __('Pengangkutan rutin terjadwal, sampah komersial/kafe, dan evakuasi puing bangunan.') }}</p>
                            </a>
                        </div>

                        <!-- Bottom Link -->
                        <div class="mt-6 pt-5 border-t border-gray-100">
                            <a href="{{ route('services.index') }}" class="inline-flex items-center gap-1.5 text-xs font-bold text-[#820003] hover:underline">
                                <span>{{ __('Lihat Semua Layanan') }}</span>
                            </a>
                        </div>
                    </div>
                </div>

                <a href="{{ route('about') }}" class="px-4 py-2 rounded-full text-[14px] font-semibold transition-all duration-300 hover:bg-white hover:backdrop-blur-md hover:shadow-[0_4px_16px_rgba(130,0,3,0.12)] hover:border hover:border-red-100/80 {{ request()->routeIs('about') ? 'text-[#820003] font-bold bg-red-50/70 border border-red-100/60' : 'text-gray-700 hover:text-[#820003]' }}">
                    {{ __('Tentang') }}
                </a>
                <a href="{{ route('portfolio.index') }}" class="px-4 py-2 rounded-full text-[14px] font-semibold transition-all duration-300 hover:bg-white hover:backdrop-blur-md hover:shadow-[0_4px_16px_rgba(130,0,3,0.12)] hover:border hover:border-red-100/80 {{ request()->routeIs('portfolio.*') ? 'text-[#820003] font-bold bg-red-50/70 border border-red-100/60' : 'text-gray-700 hover:text-[#820003]' }}">
                    {{ __('Portofolio') }}
                </a>
                <a href="{{ route('blog.index') }}" class="px-4 py-2 rounded-full text-[14px] font-semibold transition-all duration-300 hover:bg-white hover:backdrop-blur-md hover:shadow-[0_4px_16px_rgba(130,0,3,0.12)] hover:border hover:border-red-100/80 {{ request()->routeIs('blog.*') ? 'text-[#820003] font-bold bg-red-50/70 border border-red-100/60' : 'text-gray-700 hover:text-[#820003]' }}">
                    {{ __('Blog') }}
                </a>
                <a href="{{ route('consultation.index') }}" class="px-4 py-2 rounded-full text-[14px] font-semibold transition-all duration-300 hover:bg-white hover:backdrop-blur-md hover:shadow-[0_4px_16px_rgba(130,0,3,0.12)] hover:border hover:border-red-100/80 {{ request()->routeIs('consultation.*') ? 'text-[#820003] font-bold bg-red-50/70 border border-red-100/60' : 'text-gray-700 hover:text-[#820003]' }}">
                    {{ __('Konsultasi & Reservasi') }}
                </a>
            </nav>

            <!-- Actions: Konsultasi + Language Switcher + Hamburger Side Drawer Toggle -->
            <div class="flex items-center space-x-3">
                <!-- Consultation CTA Button with Urgency Green (WhatsApp Fast Response) -->
                <a href="https://wa.me/6281217597109?text=Halo%20KOOTA%20SERVICES,%20saya%20ingin%20berkonsultasi." target="_blank" class="hidden sm:inline-flex items-center gap-2 px-5 py-2.5 rounded-full bg-[#25d366] hover:bg-[#20ba59] text-white font-extrabold text-xs sm:text-sm transition-all shadow-md hover:shadow-lg active:scale-95 ring-2 ring-green-400/30">
                    <svg class="w-4 h-4 fill-current" viewBox="0 0 24 24">
                        <path d="M.057 24l1.687-6.163c-1.041-1.804-1.588-3.849-1.587-5.946.003-6.556 5.338-11.891 11.893-11.891 3.181.001 6.167 1.24 8.413 3.488 2.245 2.248 3.481 5.236 3.48 8.414-.003 6.557-5.338 11.892-11.893 11.892-1.99-.001-3.951-.5-5.688-1.448l-6.305 1.654zm6.597-3.807c1.676.995 3.276 1.591 5.392 1.592 5.448 0 9.886-4.434 9.889-9.885.002-5.462-4.415-9.89-9.881-9.892-5.452 0-9.887 4.434-9.889 9.884-.001 2.225.651 3.891 1.746 5.634l-.999 3.648 3.742-.981zm11.387-5.464c-.074-.124-.272-.198-.57-.347-.297-.149-1.758-.868-2.031-.967-.272-.099-.47-.149-.669.149-.198.297-.768.967-.941 1.165-.173.198-.347.223-.644.074-.297-.149-1.255-.462-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.297-.347.446-.521.151-.172.2-.296.3-.495.099-.198.05-.372-.025-.521-.075-.148-.669-1.611-.916-2.206-.242-.579-.487-.501-.669-.51l-.57-.01c-.198 0-.52.074-.792.372s-1.04 1.016-1.04 2.479 1.065 2.876 1.213 3.074c.149.198 2.095 3.2 5.076 4.487.709.306 1.263.489 1.694.626.712.226 1.36.194 1.872.118.571-.085 1.758-.719 2.006-1.413.248-.695.248-1.29.173-1.414z"/>
                    </svg>
                    <span>{{ __('Chat WhatsApp') }}</span>
                </a>

                <!-- Modern Glossy Language Switcher with Flags -->
                <div class="relative" x-data="{ openLang: false }">
                    <button @click="openLang = !openLang" class="inline-flex items-center gap-2 px-3 py-2 rounded-xl bg-white/80 backdrop-blur-md border border-gray-200/60 text-sm font-semibold text-gray-700 hover:bg-white hover:shadow-md focus:outline-none transition-all duration-200">
                        @if(app()->getLocale() === 'en')
                            <img src="https://flagcdn.com/w40/us.png" alt="EN" class="w-5 h-3.5 rounded-sm object-cover shadow-xs">
                            <span class="text-xs font-bold">EN</span>
                        @else
                            <img src="https://flagcdn.com/w40/id.png" alt="ID" class="w-5 h-3.5 rounded-sm object-cover shadow-xs">
                            <span class="text-xs font-bold">ID</span>
                        @endif
                        <svg class="w-3 h-3 text-gray-400 transition-transform duration-200" :class="{ 'rotate-180': openLang }" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/>
                        </svg>
                    </button>

                    <div x-show="openLang" 
                         @click.away="openLang = false" 
                         x-transition:enter="transition ease-out duration-200"
                         x-transition:enter-start="opacity-0 scale-95 translate-y-1"
                         x-transition:enter-end="opacity-100 scale-100 translate-y-0"
                         x-transition:leave="transition ease-in duration-150"
                         x-transition:leave-start="opacity-100 scale-100"
                         x-transition:leave-end="opacity-0 scale-95"
                         class="absolute right-0 mt-2 w-36 bg-white/95 backdrop-blur-xl rounded-2xl shadow-2xl border border-gray-100/80 py-2 z-50"
                         style="display: none;">
                        <a href="{{ route('locale.switch', 'en') }}" class="flex items-center gap-3 px-4 py-2.5 text-sm font-semibold transition-colors {{ app()->getLocale() === 'en' ? 'text-[#820003] bg-red-50/60' : 'text-gray-700 hover:bg-gray-50' }}">
                            <img src="https://flagcdn.com/w40/us.png" alt="EN" class="w-5 h-3.5 rounded-sm object-cover shadow-xs">
                            <span>English</span>
                        </a>
                        <a href="{{ route('locale.switch', 'id') }}" class="flex items-center gap-3 px-4 py-2.5 text-sm font-semibold transition-colors {{ app()->getLocale() === 'id' ? 'text-[#820003] bg-red-50/60' : 'text-gray-700 hover:bg-gray-50' }}">
                            <img src="https://flagcdn.com/w40/id.png" alt="ID" class="w-5 h-3.5 rounded-sm object-cover shadow-xs">
                            <span>Indonesia</span>
                        </a>
                    </div>
                </div>

                <!-- Side Drawer Toggle Button (Hamburger ☰) (Image 1) -->
                <button @click="sideDrawer = true" class="p-2.5 rounded-xl border border-gray-200 text-gray-700 hover:bg-gray-50 hover:text-[#820003] hover:border-red-200 transition-all focus:outline-none" aria-label="Buka Menu">
                    <svg class="w-6 h-6 stroke-current" fill="none" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"/>
                    </svg>
                </button>
            </div>
        </div>
    </header>

    <!-- Side Drawer Menu Overlay & Slide-out Drawer Panel (Exact from Image 1) -->
    <div x-show="sideDrawer" 
         class="fixed inset-0 z-[100] flex justify-end" 
         style="display: none;">
        
        <!-- Backdrop -->
        <div x-show="sideDrawer"
             x-transition:enter="transition ease-out duration-300"
             x-transition:enter-start="opacity-0"
             x-transition:enter-end="opacity-100"
             x-transition:leave="transition ease-in duration-200"
             x-transition:leave-start="opacity-100"
             x-transition:leave-end="opacity-0"
             @click="sideDrawer = false"
             class="fixed inset-0 bg-black/50 backdrop-blur-xs"></div>

        <!-- Slide-out Drawer Container -->
        <div x-show="sideDrawer"
             x-transition:enter="transition ease-out duration-300 transform"
             x-transition:enter-start="translate-x-full"
             x-transition:enter-end="translate-x-0"
             x-transition:leave="transition ease-in duration-200 transform"
             x-transition:leave-start="translate-x-0"
             x-transition:leave-end="translate-x-full"
             class="relative w-full max-w-md bg-white h-full shadow-2xl z-10 flex flex-col justify-between overflow-y-auto">
            
            <div class="p-6 space-y-6">
                <!-- Drawer Header: Red Close Button (Image 1) -->
                <div class="flex items-center justify-between border-b border-gray-100 pb-4">
                    <a href="{{ route('home') }}" class="flex items-center py-1">
                        <img src="{{ asset('images/logo.png') }}" alt="KOOTA SERVICE" class="h-10 sm:h-12 w-auto object-contain">
                    </a>
                    <button @click="sideDrawer = false" class="w-10 h-10 rounded-full bg-red-50 text-[#820003] hover:bg-red-100 flex items-center justify-center transition-colors text-lg font-bold" aria-label="Tutup Menu">
                        ✕
                    </button>
                </div>

                <!-- Navigation Accordion -->
                <nav class="space-y-4" x-data="{ openLayananMenu: true }">
                    
                    <!-- Layanan Accordion Header & Items (Image 1) -->
                    <div class="border-b border-gray-100 pb-4">
                        <div class="flex items-center justify-between py-2 text-base font-bold text-[#820003]">
                            <a href="{{ route('services.index') }}" @click="sideDrawer = false" class="hover:underline">
                                {{ __('Layanan') }}
                            </a>
                            <button type="button" @click="openLayananMenu = !openLayananMenu" class="p-1 text-[#820003] focus:outline-none">
                                <svg class="w-4 h-4 transition-transform duration-200" :class="{ 'rotate-180': !openLayananMenu }" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M5 15l7-7 7 7"/>
                                </svg>
                            </button>
                        </div>

                        <!-- 3 Services Sub-Items -->
                        <div x-show="openLayananMenu" x-collapse class="space-y-4 pt-3 pl-2">
                            <!-- Item 1: Pembersihan Rumah -->
                            <a href="{{ route('services.show', 'home-cleaning') }}" @click="sideDrawer = false" class="block group space-y-1">
                                <h4 class="text-sm font-bold text-gray-900 group-hover:text-[#820003] transition-colors">
                                    {{ __('Pembersihan Rumah') }}
                                </h4>
                                <p class="text-xs text-gray-500 leading-relaxed">
                                    {{ __('Pembersihan harian, pembersihan menyeluruh, sedot tungau kasur & sofa, sterilisasi hunian.') }}
                                </p>
                            </a>

                            <!-- Item 2: Perbaikan Rumah -->
                            <a href="{{ route('services.show', 'perbaikan-rumah') }}" @click="sideDrawer = false" class="block group space-y-1">
                                <h4 class="text-sm font-bold text-gray-900 group-hover:text-[#820003] transition-colors">
                                    {{ __('Perbaikan Rumah') }}
                                </h4>
                                <p class="text-xs text-gray-500 leading-relaxed">
                                    {{ __('Tukang ahli, perbaikan pipa bocor, kelistrikan, servis AC & renovasi ruangan.') }}
                                </p>
                            </a>

                            <!-- Item 3: Pengangkutan Sampah -->
                            <a href="{{ route('services.show', 'pengangkutan-sampah') }}" @click="sideDrawer = false" class="block group space-y-1">
                                <h4 class="text-sm font-bold text-gray-900 group-hover:text-[#820003] transition-colors">
                                    {{ __('Pengangkutan Sampah') }}
                                </h4>
                                <p class="text-xs text-gray-500 leading-relaxed">
                                    {{ __('Solusi pengangkutan terjadwal residensial, komersial, dan evakuasi puing pascarenovasi.') }}
                                </p>
                            </a>
                        </div>
                    </div>

                    <!-- Tentang -->
                    <div class="border-b border-gray-100 pb-4">
                        <a href="{{ route('about') }}" @click="sideDrawer = false" class="block py-2 text-base font-bold text-gray-800 hover:text-[#820003] transition-colors">
                            {{ __('Tentang') }}
                        </a>
                    </div>

                    <!-- Portofolio -->
                    <div class="border-b border-gray-100 pb-4">
                        <a href="{{ route('portfolio.index') }}" @click="sideDrawer = false" class="block py-2 text-base font-bold text-gray-800 hover:text-[#820003] transition-colors">
                            {{ __('Portofolio') }}
                        </a>
                    </div>

                    <!-- Blog -->
                    <div class="border-b border-gray-100 pb-4">
                        <a href="{{ route('blog.index') }}" @click="sideDrawer = false" class="block py-2 text-base font-bold text-gray-800 hover:text-[#820003] transition-colors">
                            {{ __('Blog') }}
                        </a>
                    </div>

                    <!-- Konsultasi & Reservasi -->
                    <div class="border-b border-gray-100 pb-4">
                        <a href="{{ route('consultation.index') }}" @click="sideDrawer = false" class="block py-2 text-base font-bold text-gray-800 hover:text-[#820003] transition-colors">
                            {{ __('Konsultasi & Reservasi') }}
                        </a>
                    </div>
                </nav>
            </div>

            <!-- Drawer Bottom Actions (WhatsApp Urgency Green) -->
            <div class="p-6 border-t border-gray-100 bg-[#fcf9f8] space-y-4">
                <a href="https://wa.me/6281217597109?text=Halo%20KOOTA%20SERVICES,%20saya%20ingin%20berkonsultasi." target="_blank" @click="sideDrawer = false" class="flex items-center justify-center gap-2 w-full py-3.5 text-center rounded-xl bg-[#25d366] hover:bg-[#20ba59] text-white font-extrabold text-sm shadow-md transition-all active:scale-95">
                    <svg class="w-5 h-5 fill-current" viewBox="0 0 24 24">
                        <path d="M.057 24l1.687-6.163c-1.041-1.804-1.588-3.849-1.587-5.946.003-6.556 5.338-11.891 11.893-11.891 3.181.001 6.167 1.24 8.413 3.488 2.245 2.248 3.481 5.236 3.48 8.414-.003 6.557-5.338 11.892-11.893 11.892-1.99-.001-3.951-.5-5.688-1.448l-6.305 1.654zm6.597-3.807c1.676.995 3.276 1.591 5.392 1.592 5.448 0 9.886-4.434 9.889-9.885.002-5.462-4.415-9.89-9.881-9.892-5.452 0-9.887 4.434-9.889 9.884-.001 2.225.651 3.891 1.746 5.634l-.999 3.648 3.742-.981zm11.387-5.464c-.074-.124-.272-.198-.57-.347-.297-.149-1.758-.868-2.031-.967-.272-.099-.47-.149-.669.149-.198.297-.768.967-.941 1.165-.173.198-.347.223-.644.074-.297-.149-1.255-.462-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.297-.347.446-.521.151-.172.2-.296.3-.495.099-.198.05-.372-.025-.521-.075-.148-.669-1.611-.916-2.206-.242-.579-.487-.501-.669-.51l-.57-.01c-.198 0-.52.074-.792.372s-1.04 1.016-1.04 2.479 1.065 2.876 1.213 3.074c.149.198 2.095 3.2 5.076 4.487.709.306 1.263.489 1.694.626.712.226 1.36.194 1.872.118.571-.085 1.758-.719 2.006-1.413.248-.695.248-1.29.173-1.414z"/>
                    </svg>
                    <span>{{ __('Konsultasi WhatsApp') }}</span>
                </a>
            </div>
        </div>
    </div>

    <!-- Main Content Area -->
    <main class="flex-grow">
        @yield('content')
    </main>

    <!-- Footer -->
    <footer class="bg-[#1c1b1b] text-white pt-16 pb-12 border-t border-neutral-800">
        <div class="max-w-[1280px] mx-auto px-4 sm:px-6 lg:px-8 space-y-12">
            <div class="grid grid-cols-1 md:grid-cols-12 gap-10">
                
                <!-- Col 1: Brand Info -->
                <div class="md:col-span-5 space-y-4">
                    <a href="{{ route('home') }}" class="inline-block">
                        <img src="{{ asset('images/logo.png') }}" alt="KOOTA SERVICE" class="h-14 w-auto object-contain bg-white/95 p-1 rounded-xl shadow-md">
                    </a>
                    <p class="text-xs text-gray-400 leading-relaxed max-w-sm">
                        {{ __('Solusi terpercaya untuk kebersihan, perbaikan, dan perawatan rumah terpadu di Surabaya, Malang, Bali, dan Jakarta.') }}
                    </p>
                </div>

                <!-- Col 2: Layanan Utama -->
                <div class="md:col-span-4 space-y-3">
                    <h4 class="text-xs font-bold text-white uppercase tracking-wider">{{ __('Layanan Utama') }}</h4>
                    <ul class="space-y-2 text-xs text-gray-400">
                        <li><a href="{{ route('services.show', 'home-cleaning') }}" class="hover:text-[#25d366] transition-colors">{{ __('Home Cleaning') }}</a></li>
                        <li><a href="{{ route('services.show', 'perbaikan-rumah') }}" class="hover:text-[#25d366] transition-colors">{{ __('Perbaikan Rumah') }}</a></li>
                        <li><a href="{{ route('services.show', 'pengangkutan-sampah') }}" class="hover:text-[#25d366] transition-colors">{{ __('Pengangkutan Sampah') }}</a></li>
                    </ul>
                </div>

                <!-- Col 3: Perusahaan -->
                <div class="md:col-span-3 space-y-3">
                    <h4 class="text-xs font-bold text-white uppercase tracking-wider">{{ __('Perusahaan') }}</h4>
                    <ul class="space-y-2 text-xs text-gray-400">
                        <li><a href="{{ route('about') }}" class="hover:text-[#25d366] transition-colors">{{ __('Tentang Kami') }}</a></li>
                        <li><a href="{{ route('portfolio.index') }}" class="hover:text-[#25d366] transition-colors">{{ __('Portofolio') }}</a></li>
                        <li><a href="{{ route('blog.index') }}" class="hover:text-[#25d366] transition-colors">{{ __('Blog') }}</a></li>
                        <li><a href="{{ route('consultation.index') }}" class="hover:text-[#25d366] transition-colors">{{ __('Hubungi Kami') }}</a></li>
                    </ul>
                </div>
            </div>

            <!-- Bottom Copyright -->
            <div class="pt-8 border-t border-neutral-800/80 flex flex-col sm:flex-row items-center justify-between text-xs text-gray-500 gap-4">
                <p>© {{ date('Y') }} KOOTA SERVICE. {{ __('Kita Wujudkan') }} <span class="text-[#22c55e] font-bold">{{ __('Kota Bersih') }}</span></p>
                <div class="flex items-center gap-4">
                    <span>Surabaya • Malang • Bali • Jakarta</span>
                </div>
            </div>
        </div>
    </footer>

    <!-- Floating WhatsApp Action Button -->
    <a href="https://wa.me/6281217597109?text=Halo%20KOOTA%20SERVICES,%20saya%20ingin%20berkonsultasi." 
       target="_blank" 
       class="fixed bottom-6 right-6 z-50 w-12 h-12 sm:w-14 sm:h-14 rounded-full bg-[#25d366] text-white flex items-center justify-center shadow-2xl hover:scale-110 active:scale-95 transition-all" 
       aria-label="Hubungi WhatsApp">
        <svg class="w-7 h-7 sm:w-8 sm:h-8 fill-current" viewBox="0 0 24 24">
            <path d="M.057 24l1.687-6.163c-1.041-1.804-1.588-3.849-1.587-5.946.003-6.556 5.338-11.891 11.893-11.891 3.181.001 6.167 1.24 8.413 3.488 2.245 2.248 3.481 5.236 3.48 8.414-.003 6.557-5.338 11.892-11.893 11.892-1.99-.001-3.951-.5-5.688-1.448l-6.305 1.654zm6.597-3.807c1.676.995 3.276 1.591 5.392 1.592 5.448 0 9.886-4.434 9.889-9.885.002-5.462-4.415-9.89-9.881-9.892-5.452 0-9.887 4.434-9.889 9.884-.001 2.225.651 3.891 1.746 5.634l-.999 3.648 3.742-.981zm11.387-5.464c-.074-.124-.272-.198-.57-.347-.297-.149-1.758-.868-2.031-.967-.272-.099-.47-.149-.669.149-.198.297-.768.967-.941 1.165-.173.198-.347.223-.644.074-.297-.149-1.255-.462-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.297-.347.446-.521.151-.172.2-.296.3-.495.099-.198.05-.372-.025-.521-.075-.148-.669-1.611-.916-2.206-.242-.579-.487-.501-.669-.51l-.57-.01c-.198 0-.52.074-.792.372s-1.04 1.016-1.04 2.479 1.065 2.876 1.213 3.074c.149.198 2.095 3.2 5.076 4.487.709.306 1.263.489 1.694.626.712.226 1.36.194 1.872.118.571-.085 1.758-.719 2.006-1.413.248-.695.248-1.29.173-1.414z"/>
        </svg>
    </a>

</body>
</html>
