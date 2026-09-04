<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Admin Panel - KOOTA SERVICES')</title>
    <link rel="icon" type="image/svg+xml" href="{{ asset('images/logo.svg') }}">
    
    <!-- Google Fonts Inter -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800;900&display=swap" rel="stylesheet">

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gray-100 text-gray-900 font-sans antialiased">
    <div class="min-h-screen flex">
        <!-- Sidebar -->
        <aside class="w-64 bg-[#1c1b1b] text-white flex flex-col justify-between shrink-0 shadow-xl">
            <div class="p-6 space-y-6">
                <!-- Official Brand Logo in Admin (Point 2 & 4) -->
                <div class="space-y-2">
                    <a href="{{ route('admin.dashboard') }}" class="flex items-center gap-3">
                        <img src="{{ asset('images/logo-white.svg') }}" alt="KOOTA SERVICES" class="h-9 w-auto object-contain">
                        <span class="font-extrabold text-sm tracking-tight text-white">
                            KOOTA <span class="text-[#ff4d4d]">SERVICES</span>
                        </span>
                    </a>
                    <span class="text-[10px] text-gray-400 uppercase tracking-widest font-bold block pl-1">
                        Management System
                    </span>
                </div>

                <!-- Maintenance Mode Quick Status -->
                @php
                    $isMaint = \App\Models\SiteSetting::get('is_maintenance', '0') === '1';
                @endphp
                <div class="p-3 rounded-xl border {{ $isMaint ? 'bg-amber-950/50 border-amber-800 text-amber-300' : 'bg-neutral-900 border-neutral-800 text-gray-400' }} text-xs space-y-1">
                    <div class="flex items-center justify-between">
                        <span class="font-bold">Status Website:</span>
                        <span class="w-2 h-2 rounded-full {{ $isMaint ? 'bg-amber-400 animate-pulse' : 'bg-green-500' }}"></span>
                    </div>
                    <p class="text-[11px] font-semibold {{ $isMaint ? 'text-amber-200' : 'text-green-400' }}">
                        {{ $isMaint ? '⚠️ Sedang Maintenance' : '🟢 Website Publik Aktif' }}
                    </p>
                </div>

                <!-- Nav Menu with SVG Icons -->
                <nav class="space-y-1 text-sm font-medium">
                    <a href="{{ route('admin.dashboard') }}" class="flex items-center gap-3 px-4 py-2.5 rounded-xl transition-colors {{ request()->routeIs('admin.dashboard') ? 'bg-[#820003] text-white font-bold' : 'text-gray-300 hover:bg-neutral-800' }}">
                        <svg class="w-4 h-4 stroke-current" fill="none" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"/>
                        </svg>
                        <span>Dashboard & Status</span>
                    </a>
                    <a href="{{ route('admin.services.index') }}" class="flex items-center gap-3 px-4 py-2.5 rounded-xl transition-colors {{ request()->routeIs('admin.services.*') ? 'bg-[#820003] text-white font-bold' : 'text-gray-300 hover:bg-neutral-800' }}">
                        <svg class="w-4 h-4 stroke-current" fill="none" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"/>
                        </svg>
                        <span>Layanan (Services)</span>
                    </a>
                    <a href="{{ route('admin.projects.index') }}" class="flex items-center gap-3 px-4 py-2.5 rounded-xl transition-colors {{ request()->routeIs('admin.projects.*') ? 'bg-[#820003] text-white font-bold' : 'text-gray-300 hover:bg-neutral-800' }}">
                        <svg class="w-4 h-4 stroke-current" fill="none" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                        </svg>
                        <span>Project & Katalog Foto</span>
                    </a>
                    <a href="{{ route('admin.posts.index') }}" class="flex items-center gap-3 px-4 py-2.5 rounded-xl transition-colors {{ request()->routeIs('admin.posts.*') ? 'bg-[#820003] text-white font-bold' : 'text-gray-300 hover:bg-neutral-800' }}">
                        <svg class="w-4 h-4 stroke-current" fill="none" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9a2 2 0 00-2-2h-2m-4-3H9M7 16h6M7 8h6v4H7V8z"/>
                        </svg>
                        <span>Blog / Artikel</span>
                    </a>
                    <a href="{{ route('admin.consultations.index') }}" class="flex items-center gap-3 px-4 py-2.5 rounded-xl transition-colors {{ request()->routeIs('admin.consultations.*') ? 'bg-[#820003] text-white font-bold' : 'text-gray-300 hover:bg-neutral-800' }}">
                        <svg class="w-4 h-4 stroke-current" fill="none" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                        </svg>
                        <span>Data Konsultasi</span>
                    </a>
                    <a href="{{ route('admin.faqs.index') }}" class="flex items-center gap-3 px-4 py-2.5 rounded-xl transition-colors {{ request()->routeIs('admin.faqs.*') ? 'bg-[#820003] text-white font-bold' : 'text-gray-300 hover:bg-neutral-800' }}">
                        <svg class="w-4 h-4 stroke-current" fill="none" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8.228 9c.549-1.165 2.03-2 3.772-2 2.21 0 4 1.343 4 3 0 1.4-1.278 2.575-3.006 2.907-.542.104-.994.54-.994 1.093m0 3h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                        </svg>
                        <span>Manajemen FAQ</span>
                    </a>
                </nav>
            </div>

            <!-- Footer links & logout -->
            <div class="p-6 border-t border-neutral-800 space-y-3">
                <a href="{{ route('home') }}" target="_blank" class="block w-full text-center py-2.5 rounded-xl bg-neutral-800 hover:bg-neutral-700 text-xs font-bold text-gray-200 transition-colors">
                    Lihat Website Publik
                </a>
                <form action="{{ route('admin.logout') }}" method="POST">
                    @csrf
                    <button type="submit" class="w-full text-left flex items-center gap-2 px-3 py-2 text-xs text-red-400 hover:text-red-300 hover:bg-red-950/30 rounded-xl transition-colors">
                        <svg class="w-4 h-4 stroke-current" fill="none" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"/>
                        </svg>
                        <span>Keluar (Logout)</span>
                    </button>
                </form>
            </div>
        </aside>

        <!-- Main Content Area -->
        <div class="flex-1 flex flex-col min-w-0 overflow-y-auto">
            <header class="bg-white border-b border-gray-200 px-8 py-4 flex items-center justify-between shadow-2xs">
                <h2 class="text-xl font-bold text-gray-900">@yield('page_title', 'Dashboard')</h2>
                <div class="flex items-center gap-3">
                    <span class="text-xs font-bold px-3 py-1 rounded-full bg-red-50 text-[#820003]">Administrator</span>
                    <span class="text-sm font-bold text-gray-800">{{ auth()->user()->name ?? 'Admin' }}</span>
                </div>
            </header>

            <main class="p-8">
                @if(session('success'))
                    <div class="mb-6 p-4 rounded-2xl bg-green-50 border border-green-200 text-green-800 text-sm font-bold flex items-center gap-2">
                        <span>✓</span>
                        <span>{{ session('success') }}</span>
                    </div>
                @endif

                @yield('content')
            </main>
        </div>
    </div>
</body>
</html>
