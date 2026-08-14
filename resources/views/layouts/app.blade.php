<!DOCTYPE html>
<html lang="id" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'KOOTA SERVICE - Kita Wujudkan Kota Bersih')</title>
    <meta name="description" content="Solusi terpadu untuk kebutuhan perawatan fasilitas dan manajemen lingkungan yang berkelanjutan.">
    
    <!-- Google Fonts Inter -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-[#fcf9f8] text-[#1c1b1b] font-sans antialiased flex flex-col min-h-screen">

    <!-- Header / Navbar -->
    <header x-data="{ openDropdown: false, mobileMenu: false }" class="sticky top-0 z-50 bg-white/95 backdrop-blur-md shadow-xs border-b border-gray-100">
        <div class="max-w-[1280px] mx-auto px-4 sm:px-6 lg:px-8 h-20 flex items-center justify-between">
            <!-- Brand Logo (Official Logo) -->
            <a href="{{ route('home') }}" class="flex items-center gap-2.5 group py-1">
                <img src="{{ asset('images/logo.png') }}" alt="KOOTA SERVICE" class="h-10 sm:h-12 w-auto object-contain transition-transform group-hover:scale-105">
            </a>

            <!-- Desktop Nav Links -->
            <nav class="hidden md:flex items-center space-x-8">
                <a href="{{ route('home') }}" class="text-sm font-medium transition-colors hover:text-[#ac0c0c] {{ request()->routeIs('home') ? 'text-[#ac0c0c] font-semibold' : 'text-gray-700' }}">
                    Home
                </a>

                <!-- Layanan Dropdown -->
                <div class="relative" @mouseenter="openDropdown = true" @mouseleave="openDropdown = false">
                    <a href="{{ route('services.index') }}" class="inline-flex items-center gap-1 text-sm font-medium transition-colors hover:text-[#ac0c0c] py-2 focus:outline-none {{ request()->routeIs('services.*') ? 'text-[#ac0c0c] font-semibold' : 'text-gray-700' }}">
                        <span>Layanan</span>
                        <svg class="w-4 h-4 transition-transform duration-200" :class="{ 'rotate-180': openDropdown }" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/>
                        </svg>
                    </a>

                    <!-- Dropdown Menu -->
                    <div x-show="openDropdown" x-transition:enter="transition ease-out duration-150" x-transition:enter-start="opacity-0 translate-y-2" x-transition:enter-end="opacity-100 translate-y-0" x-transition:leave="transition ease-in duration-100" x-transition:leave-start="opacity-100 translate-y-0" x-transition:leave-end="opacity-0 translate-y-2" class="absolute left-0 mt-0 w-72 bg-white rounded-xl shadow-xl border border-gray-100 py-2 z-50">
                        <div class="px-4 py-2 text-[11px] font-bold uppercase tracking-wider text-gray-400 border-b border-gray-100">
                            Katalog Layanan
                        </div>
                        <a href="{{ route('services.show', 'cleaning-service') }}" class="flex items-center gap-3 px-4 py-2.5 text-sm text-gray-700 hover:bg-[#fcf9f8] hover:text-[#ac0c0c] transition-colors">
                            <div class="w-7 h-7 rounded-md bg-red-50 text-[#ac0c0c] flex items-center justify-center shrink-0">
                                <svg class="w-4 h-4 stroke-current" fill="none" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 3v4M3 5h4M6 17v4m-2-2h4m5-16l2.286 6.857L21 12l-5.714 2.143L13 21l-2.286-6.857L5 12l5.714-2.143L13 3z"/>
                                </svg>
                            </div>
                            <div>
                                <span class="font-semibold block text-xs">Cleaning Service</span>
                                <span class="text-[11px] text-gray-500">Kebersihan komersial & industri</span>
                            </div>
                        </a>
                        <a href="{{ route('services.show', 'pengangkutan-sampah') }}" class="flex items-center gap-3 px-4 py-2.5 text-sm text-gray-700 hover:bg-[#fcf9f8] hover:text-[#28a745] transition-colors">
                            <div class="w-7 h-7 rounded-md bg-green-50 text-[#28a745] flex items-center justify-center shrink-0">
                                <svg class="w-4 h-4 stroke-current" fill="none" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15"/>
                                </svg>
                            </div>
                            <div>
                                <span class="font-semibold block text-xs">Pengangkutan Sampah</span>
                                <span class="text-[11px] text-gray-500">Terjadwal & ramah lingkungan</span>
                            </div>
                        </a>
                        <a href="{{ route('services.show', 'jasa-tukang-perbaikan-dan-renovasi') }}" class="flex items-center gap-3 px-4 py-2.5 text-sm text-gray-700 hover:bg-[#fcf9f8] hover:text-[#ac0c0c] transition-colors">
                            <div class="w-7 h-7 rounded-md bg-red-50 text-[#ac0c0c] flex items-center justify-center shrink-0">
                                <svg class="w-4 h-4 stroke-current" fill="none" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 4a2 2 0 114 0v1a1 1 0 001 1h3a1 1 0 011 1v3a1 1 0 01-1 1h-1a2 2 0 100 4h1a1 1 0 011 1v3a1 1 0 01-1 1h-3a1 1 0 01-1-1v-1a2 2 0 10-4 0v1a1 1 0 01-1 1H7a1 1 0 01-1-1v-3a1 1 0 00-1-1H4a2 2 0 110-4h1a1 1 0 001-1V7a1 1 0 011-1h3a1 1 0 001-1V4z"/>
                                </svg>
                            </div>
                            <div>
                                <span class="font-semibold block text-xs">Jasa Tukang Perbaikan & Renovasi</span>
                                <span class="text-[11px] text-gray-500">Perbaikan, maintenance & renovasi</span>
                            </div>
                        </a>
                        <a href="{{ route('services.show', 'ipal') }}" class="flex items-center gap-3 px-4 py-2.5 text-sm text-gray-700 hover:bg-[#fcf9f8] hover:text-[#28a745] transition-colors">
                            <div class="w-7 h-7 rounded-md bg-green-50 text-[#28a745] flex items-center justify-center shrink-0">
                                <svg class="w-4 h-4 stroke-current" fill="none" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19.428 15.428a2 2 0 00-1.022-.547l-2.387-.477a6 6 0 00-3.86.517l-.318.158a6 6 0 01-3.86.517L6.05 15.21a2 2 0 00-1.806.547M8 4h8l-1 1v5.172a2 2 0 00.586 1.414l5 5c1.26 1.26.367 3.414-1.415 3.414H4.828c-1.782 0-2.674-2.154-1.414-3.414l5-5A2 2 0 009 10.172V5L8 4z"/>
                                </svg>
                            </div>
                            <div>
                                <span class="font-semibold block text-xs">IPAL</span>
                                <span class="text-[11px] text-gray-500">Instalasi pengolahan air limbah</span>
                            </div>
                        </a>
                    </div>
                </div>

                <a href="{{ route('about') }}" class="text-sm font-medium transition-colors hover:text-[#ac0c0c] {{ request()->routeIs('about') ? 'text-[#ac0c0c] font-semibold' : 'text-gray-700' }}">
                    Tentang
                </a>
                <a href="{{ route('portfolio.index') }}" class="text-sm font-medium transition-colors hover:text-[#ac0c0c] {{ request()->routeIs('portfolio.*') ? 'text-[#ac0c0c] font-semibold' : 'text-gray-700' }}">
                    Portfolio
                </a>
                <a href="{{ route('blog.index') }}" class="text-sm font-medium transition-colors hover:text-[#ac0c0c] {{ request()->routeIs('blog.*') ? 'text-[#ac0c0c] font-semibold' : 'text-gray-700' }}">
                    Blog
                </a>
            </nav>

            <!-- CTA Button -->
            <div class="hidden md:flex items-center">
                <a href="{{ route('consultation.index') }}" class="px-6 py-2.5 rounded-lg bg-[#820003] hover:bg-[#ac0c0c] text-white font-semibold text-sm transition-all shadow-sm hover:shadow active:scale-95">
                    Konsultasi
                </a>
            </div>

            <!-- Mobile menu trigger -->
            <button @click="mobileMenu = !mobileMenu" class="md:hidden p-2 rounded-lg text-gray-700 hover:bg-gray-100" aria-label="Toggle Menu">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"/>
                </svg>
            </button>
        </div>

        <!-- Mobile Drawer -->
        <div x-show="mobileMenu" class="md:hidden bg-white border-b border-gray-200 px-4 pt-2 pb-6 space-y-3">
            <a href="{{ route('home') }}" class="block px-3 py-2 rounded-md font-medium text-gray-700 hover:bg-gray-50">Home</a>
            <a href="{{ route('services.index') }}" class="block px-3 py-2 font-bold text-gray-900">Layanan</a>
            <div class="pl-4 space-y-1 border-l-2 border-red-200 ml-2">
                <a href="{{ route('services.show', 'cleaning-service') }}" class="block py-1.5 text-xs text-gray-600 hover:text-[#ac0c0c]">Cleaning Service</a>
                <a href="{{ route('services.show', 'pengangkutan-sampah') }}" class="block py-1.5 text-xs text-gray-600 hover:text-[#28a745]">Pengangkutan Sampah</a>
                <a href="{{ route('services.show', 'jasa-tukang-perbaikan-dan-renovasi') }}" class="block py-1.5 text-xs text-gray-600 hover:text-[#ac0c0c]">Jasa Tukang Perbaikan & Renovasi</a>
                <a href="{{ route('services.show', 'ipal') }}" class="block py-1.5 text-xs text-gray-600 hover:text-[#28a745]">IPAL</a>
            </div>
            <a href="{{ route('about') }}" class="block px-3 py-2 rounded-md font-medium text-gray-700 hover:bg-gray-50">Tentang</a>
            <a href="{{ route('portfolio.index') }}" class="block px-3 py-2 rounded-md font-medium text-gray-700 hover:bg-gray-50">Portfolio</a>
            <a href="{{ route('blog.index') }}" class="block px-3 py-2 rounded-md font-medium text-gray-700 hover:bg-gray-50">Blog</a>
            <div class="pt-2">
                <a href="{{ route('consultation.index') }}" class="block w-full text-center py-3 rounded-lg bg-[#820003] text-white font-semibold text-sm">Konsultasi</a>
            </div>
        </div>
    </header>

    <!-- Main Content -->
    <main class="flex-grow">
        @yield('content')
    </main>

    <!-- Footer -->
    <footer class="bg-[#1c1b1b] text-white pt-16 pb-12 mt-16 border-t border-neutral-800">
        <div class="max-w-[1280px] mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 md:grid-cols-4 gap-10 pb-12 border-b border-neutral-800">
                <!-- Column 1: Brand Info -->
                <div class="md:col-span-1 space-y-4">
                    <a href="{{ route('home') }}" class="inline-block bg-white p-2.5 rounded-xl shadow-xs hover:opacity-95 transition-opacity">
                        <img src="{{ asset('images/logo.png') }}" alt="KOOTA SERVICE" class="h-9 w-auto object-contain">
                    </a>
                    <p class="text-neutral-400 text-xs leading-relaxed max-w-xs">
                        Solusi terpercaya untuk kebersihan dan perawatan fasilitas komersial Anda.
                    </p>
                </div>

                <!-- Column 2: Layanan Utama -->
                <div class="space-y-3">
                    <h4 class="text-xs font-bold uppercase tracking-wider text-neutral-300">Layanan Utama</h4>
                    <ul class="space-y-2 text-xs text-neutral-400">
                        <li><a href="{{ route('services.show', 'cleaning-service') }}" class="hover:text-white transition-colors">Cleaning Service</a></li>
                        <li><a href="{{ route('services.show', 'pengangkutan-sampah') }}" class="hover:text-white transition-colors">Pengangkutan Sampah</a></li>
                        <li><a href="{{ route('services.show', 'jasa-tukang-perbaikan-dan-renovasi') }}" class="hover:text-white transition-colors">Jasa Tukang Perbaikan & Renovasi</a></li>
                        <li><a href="{{ route('services.show', 'ipal') }}" class="hover:text-white transition-colors">IPAL</a></li>
                    </ul>
                </div>

                <!-- Column 3: Perusahaan -->
                <div class="space-y-3">
                    <h4 class="text-xs font-bold uppercase tracking-wider text-neutral-300">Perusahaan</h4>
                    <ul class="space-y-2 text-xs text-neutral-400">
                        <li><a href="{{ route('about') }}" class="hover:text-white transition-colors">Tentang Kami</a></li>
                        <li><a href="{{ route('portfolio.index') }}" class="hover:text-white transition-colors">Portofolio</a></li>
                        <li><a href="{{ route('blog.index') }}" class="hover:text-white transition-colors">Blog</a></li>
                        <li><a href="{{ route('consultation.index') }}" class="hover:text-white transition-colors">Hubungi Kami</a></li>
                    </ul>
                </div>

                <!-- Column 4: Contact & Location -->
                <div class="space-y-3">
                    <h4 class="text-xs font-bold uppercase tracking-wider text-neutral-300">Hubungi Kami</h4>
                    <p class="text-xs text-neutral-400">Surabaya, Jawa Timur - Indonesia</p>
                    <p class="text-xs text-neutral-400">Email: info@kootaservice.com</p>
                    <p class="text-xs text-neutral-400">Layanan Responsif & Terjadwal</p>
                </div>
            </div>

            <!-- Bottom Copyright -->
            <div class="pt-8 flex flex-col sm:flex-row items-center justify-between text-xs text-neutral-400 gap-4">
                <div>
                    © 2024 KOOTA SERVICE, Kita Wujudkan Kota Bersih
                </div>
                <div class="flex space-x-6">
                    <a href="#" class="hover:text-white transition-colors">Kebijakan Privasi</a>
                    <a href="#" class="hover:text-white transition-colors">Syarat & Ketentuan</a>
                </div>
            </div>
        </div>
    </footer>

    <!-- Floating WhatsApp Action Button -->
    <a href="https://wa.me/6281234567890?text=Halo%20KOOTA%20SERVICE,%20saya%20ingin%20berkonsultasi%20mengenai%20layanan." target="_blank" rel="noopener noreferrer" class="fixed bottom-6 right-6 z-50 w-14 h-14 bg-[#25d366] text-white rounded-full flex items-center justify-center shadow-xl hover:scale-105 active:scale-95 transition-transform group" title="Chat WhatsApp Koota Service">
        <svg class="w-7 h-7 fill-current" viewBox="0 0 24 24">
            <path d="M.057 24l1.687-6.163c-1.041-1.804-1.588-3.849-1.587-5.946.003-6.556 5.338-11.891 11.893-11.891 3.181.001 6.167 1.24 8.413 3.488 2.245 2.248 3.481 5.236 3.48 8.414-.003 6.557-5.338 11.892-11.893 11.892-1.99-.001-3.951-.5-5.688-1.448l-6.305 1.654zm6.597-3.807c1.676.995 3.276 1.591 5.392 1.592 5.448 0 9.886-4.434 9.889-9.885.002-5.462-4.415-9.89-9.881-9.892-5.452 0-9.887 4.434-9.889 9.884-.001 2.225.651 3.891 1.746 5.634l-.999 3.648 3.742-.981zm11.387-5.464c-.074-.124-.272-.198-.57-.347-.297-.149-1.758-.868-2.031-.967-.272-.099-.47-.149-.669.149-.198.297-.768.967-.941 1.165-.173.198-.347.223-.644.074-.297-.149-1.255-.462-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.297-.347.446-.521.151-.172.2-.296.3-.495.099-.198.05-.372-.025-.521-.075-.148-.669-1.611-.916-2.206-.242-.579-.487-.501-.669-.51l-.57-.01c-.198 0-.52.074-.792.372s-1.04 1.016-1.04 2.479 1.065 2.876 1.213 3.074c.149.198 2.095 3.2 5.076 4.487.709.306 1.263.489 1.694.626.712.226 1.36.194 1.872.118.571-.085 1.758-.719 2.006-1.413.248-.695.248-1.29.173-1.414z"/>
        </svg>
    </a>

</body>
</html>
