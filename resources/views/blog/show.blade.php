@extends('layouts.app')

@section('title', __($post->title) . ' - KOOTA SERVICES')

@section('content')
    <div class="bg-[#fcf9f8] min-h-screen pb-20" x-data="{ copied: false }">

        <!-- 1. Breadcrumbs & Top Navigation Bar -->
        <div class="border-b border-gray-200/70 bg-white/70 backdrop-blur-md sticky top-0 z-30">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-3.5 flex items-center justify-between gap-4">
                <!-- Back Button -->
                <a href="{{ route('blog.index') }}" 
                   class="inline-flex items-center gap-2 text-xs font-bold text-gray-700 hover:text-[#820003] transition-colors py-1.5 px-3 rounded-xl hover:bg-gray-100/80 active:scale-95">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M10 19l-7-7m0 0l7-7m-7 7h18"/>
                    </svg>
                    <span>{{ __('Kembali ke Blog') }}</span>
                </a>

                <!-- Breadcrumb Path -->
                <nav class="hidden sm:flex items-center gap-2 text-xs text-gray-500 font-medium">
                    <a href="{{ route('home') }}" class="hover:text-gray-900 transition-colors">{{ __('Beranda') }}</a>
                    <span>/</span>
                    <a href="{{ route('blog.index') }}" class="hover:text-gray-900 transition-colors">{{ __('Blog') }}</a>
                    <span>/</span>
                    <span class="text-[#820003] font-bold truncate max-w-[220px]">{{ __($post->category) }}</span>
                </nav>
            </div>
        </div>

        <!-- 2. Main Article Header & Content Container -->
        <main class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 pt-8 sm:pt-12">
            
            <!-- Article Header (Modern Magazine Asymmetric Layout) -->
            <header class="max-w-4xl space-y-5">
                <!-- Metadata Badges -->
                <div class="flex flex-wrap items-center gap-3 text-xs">
                    <!-- Category Tag -->
                    <a href="{{ route('blog.index', ['category' => $post->category]) }}" 
                       class="inline-flex items-center gap-2 px-3.5 py-1.5 rounded-full bg-red-100/80 text-[#820003] font-extrabold uppercase tracking-wider text-[11px] border border-red-200 hover:bg-[#820003] hover:text-white transition-all shadow-2xs">
                        <span class="w-1.5 h-1.5 rounded-full bg-[#820003] animate-pulse"></span>
                        <span>{{ __($post->category) }}</span>
                    </a>

                    <span class="text-gray-300">•</span>

                    <!-- Reading Time -->
                    <span class="inline-flex items-center gap-1.5 text-gray-500 font-medium">
                        <svg class="w-4 h-4 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/>
                        </svg>
                        <span>{{ $readingTime ?? 4 }} {{ __('menit baca') }}</span>
                    </span>

                    <span class="text-gray-300">•</span>

                    <!-- Date Published -->
                    <span class="inline-flex items-center gap-1.5 text-gray-500 font-medium">
                        <svg class="w-4 h-4 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                        </svg>
                        <time datetime="{{ $post->published_at ? $post->published_at->format('Y-m-d') : date('Y-m-d') }}">
                            {{ $post->published_at ? $post->published_at->format('d M Y') : date('d M Y') }}
                        </time>
                    </span>
                </div>

                <!-- Headline -->
                <h1 class="text-3xl sm:text-4xl md:text-5xl font-black text-[#1c1b1b] tracking-tight leading-[1.18] sm:leading-[1.15]">
                    {{ __($post->title) }}
                </h1>

                <!-- Subtitle / Excerpt Lead -->
                @if($post->excerpt)
                    <p class="text-base sm:text-lg md:text-xl text-gray-600 leading-relaxed font-normal pt-1">
                        {{ __($post->excerpt) }}
                    </p>
                @endif

                <!-- Author & Quick Share Strip -->
                <div class="pt-4 border-t border-gray-200/80 flex flex-wrap items-center justify-between gap-4">
                    <!-- Author Information -->
                    <div class="flex items-center gap-3">
                        <div class="w-11 h-11 rounded-full bg-gradient-to-br from-[#820003] to-[#4a0002] text-white flex items-center justify-center font-black text-sm shadow-md ring-2 ring-white shrink-0">
                            KS
                        </div>
                        <div>
                            <div class="flex items-center gap-1.5">
                                <span class="text-xs sm:text-sm font-bold text-gray-900">{{ __('Tim Editorial KOOTA SERVICES') }}</span>
                                <svg class="w-4 h-4 text-blue-600 fill-current" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                                </svg>
                            </div>
                            <p class="text-[11px] text-gray-500 font-medium">
                                {{ __('Ditinjau oleh Praktisi Sanitasi & Pengelolaan Fasilitas') }}
                            </p>
                        </div>
                    </div>

                    <!-- Share Actions -->
                    <div class="flex items-center gap-2">
                        <!-- Share WhatsApp -->
                        <a href="https://api.whatsapp.com/send?text={{ urlencode($post->title . ' - ' . url()->current()) }}" 
                           target="_blank"
                           rel="noopener noreferrer"
                           class="inline-flex items-center gap-2 px-3.5 py-2 rounded-xl bg-[#25d366] hover:bg-[#20ba59] text-white text-xs font-bold transition-all shadow-2xs hover:shadow-md active:scale-95"
                           title="Bagikan ke WhatsApp">
                            <svg class="w-4 h-4 fill-current" viewBox="0 0 24 24">
                                <path d="M12.031 6.172c-3.181 0-5.767 2.586-5.768 5.766-.001 1.298.38 2.27 1.019 3.287l-.711 2.598 2.669-.699c.969.54 1.771.82 2.791.82 3.181 0 5.768-2.587 5.768-5.766.001-3.187-2.575-5.77-5.768-5.771zm3.392 8.244c-.144.405-.837.774-1.17.824-.299.045-.677.063-1.092-.069-.252-.08-.575-.187-.988-.365-1.739-.751-2.874-2.502-2.961-2.617-.087-.116-.708-.94-.708-1.793s.448-1.273.607-1.446c.159-.173.346-.217.462-.217l.332.006c.106.005.249-.04.39.298.144.347.491 1.2.534 1.287.043.087.072.188.014.304-.058.116-.087.188-.173.289l-.26.304c-.087.086-.177.18-.076.354.101.174.449.741.964 1.201.662.591 1.221.774 1.394.86.173.086.275.073.376-.044.101-.116.433-.506.549-.68.116-.173.231-.145.39-.086s1.011.477 1.184.564.289.13.332.202c.043.073.043.419-.101.824z"/>
                            </svg>
                            <span class="hidden sm:inline">{{ __('Bagikan') }}</span>
                        </a>

                        <!-- Copy Link -->
                        <button type="button" 
                                @click="navigator.clipboard.writeText(window.location.href); copied = true; setTimeout(() => copied = false, 2500)"
                                class="inline-flex items-center gap-1.5 px-3 py-2 rounded-xl bg-white hover:bg-gray-50 border border-gray-200 text-gray-700 text-xs font-semibold transition-all shadow-2xs active:scale-95">
                            <svg class="w-4 h-4 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 16H6a2 2 0 01-2-2V6a2 2 0 012-2h8a2 2 0 012 2v2m-6 12h8a2 2 0 002-2v-8a2 2 0 00-2-2h-8a2 2 0 00-2 2v8a2 2 0 002 2z"/>
                            </svg>
                            <span x-text="copied ? '{{ __('Tersalin!') }}' : '{{ __('Salin Tautan') }}'"></span>
                        </button>
                    </div>
                </div>
            </header>

            <!-- 3. Featured Image Showcase (High-End Frame) -->
            <div class="mt-8 rounded-3xl overflow-hidden shadow-xl border border-gray-200/80 bg-gray-900 relative group">
                <img src="{{ $post->image }}" 
                     alt="{{ $post->title }}" 
                     class="w-full h-[320px] sm:h-[440px] md:h-[500px] object-cover transition-transform duration-700 ease-out group-hover:scale-105">
                
                <div class="absolute inset-0 bg-gradient-to-t from-black/60 via-transparent to-transparent pointer-events-none"></div>

                <!-- Photo Caption Pill -->
                <div class="absolute bottom-4 left-4 sm:bottom-6 sm:left-6 z-10 flex items-center gap-2 px-3.5 py-1.5 rounded-xl bg-black/50 backdrop-blur-md text-white text-[11px] sm:text-xs font-medium border border-white/20">
                    <svg class="w-3.5 h-3.5 text-gray-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 9a2 2 0 012-2h.93a2 2 0 001.664-.89l.812-1.22A2 2 0 0110.07 4h3.86a2 2 0 011.664.89l.812 1.22A2 2 0 0018.07 7H19a2 2 0 012 2v9a2 2 0 01-2 2H5a2 2 0 01-2-2V9z"/>
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 13a3 3 0 11-6 0 3 3 0 016 0z"/>
                    </svg>
                    <span>{{ __('Dokumentasi Layanan & Armada Resmi KOOTA SERVICES') }}</span>
                </div>
            </div>

            <!-- 4. Content Grid: Main Article Body + Sticky Sidebar -->
            <div class="grid grid-cols-1 lg:grid-cols-12 gap-8 lg:gap-12 mt-10">
                
                <!-- Main Article Column (8 Cols) -->
                <div class="lg:col-span-8 space-y-8">
                    
                    <!-- Key Takeaways / Poin Intisari Box -->
                    <div class="p-6 sm:p-7 rounded-2xl bg-white border border-gray-200/80 shadow-xs relative overflow-hidden">
                        <div class="absolute top-0 left-0 bottom-0 w-1.5 bg-[#820003]"></div>
                        <div class="flex items-center gap-2.5 text-xs font-extrabold uppercase tracking-wider text-[#820003] mb-3">
                            <svg class="w-4 h-4 fill-current" viewBox="0 0 20 20">
                                <path d="M11 3a1 1 0 10-2 0v1a1 1 0 102 0V3zM15.657 5.757a1 1 0 00-1.414-1.414l-.707.707a1 1 0 001.414 1.414l.707-.707zM18 10a1 1 0 01-1 1h-1a1 1 0 110-2h1a1 1 0 011 1zM5.05 6.464A1 1 0 106.464 5.05l-.707-.707a1 1 0 00-1.414 1.414l.707.707zM5 10a1 1 0 01-1 1H3a1 1 0 110-2h1a1 1 0 011 1zM8 16v-1h4v1a2 2 0 11-4 0zM12 14c.015-.34.208-.646.477-.859a4 4 0 10-4.954 0c.27.213.462.519.476.859h4.001z"/>
                            </svg>
                            <span>{{ __('Poin Intisari Artikel') }}</span>
                        </div>
                        <ul class="text-xs sm:text-sm text-gray-700 space-y-2.5 leading-relaxed">
                            <li class="flex items-start gap-2.5">
                                <span class="w-5 h-5 rounded-full bg-red-50 text-[#820003] font-bold text-xs flex items-center justify-center shrink-0 mt-0.5">✓</span>
                                <span>Pencegahan dini melalui pemeliharaan berkala jauh lebih hemat dibanding perbaikan kerusakan struktural.</span>
                            </li>
                            <li class="flex items-start gap-2.5">
                                <span class="w-5 h-5 rounded-full bg-red-50 text-[#820003] font-bold text-xs flex items-center justify-center shrink-0 mt-0.5">✓</span>
                                <span>Pemilahan dan jadwal sanitasi teratur melindungi keluarga dan penghuni dari bibit penyakit serta alergen.</span>
                            </li>
                            <li class="flex items-start gap-2.5">
                                <span class="w-5 h-5 rounded-full bg-red-50 text-[#820003] font-bold text-xs flex items-center justify-center shrink-0 mt-0.5">✓</span>
                                <span>Gunakan tenaga profesional bersertifikat untuk memastikan standar pengerjaan aman dan bergaransi resmi.</span>
                            </li>
                        </ul>
                    </div>

                    <!-- Article Body Content with Editorial Typography -->
                    <div class="bg-white p-7 sm:p-10 lg:p-12 rounded-3xl border border-gray-200/80 shadow-xs">
                        <div class="blog-rich-content">
                            @if(str_contains($post->content, '<p') || str_contains($post->content, '<h2'))
                                {!! $post->content !!}
                            @else
                                <p class="lead">{{ $post->excerpt }}</p>
                                {!! nl2br(e($post->content)) !!}
                            @endif
                        </div>

                        <!-- Pro Tip Callout Box -->
                        <div class="my-8 p-6 rounded-2xl bg-neutral-900 text-white relative overflow-hidden space-y-3">
                            <div class="flex items-center gap-2.5 text-xs font-bold text-amber-400 uppercase tracking-wider">
                                <svg class="w-4 h-4 fill-current" viewBox="0 0 20 20">
                                    <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/>
                                </svg>
                                <span>{{ __('Tips Spesialis KOOTA SERVICES') }}</span>
                            </div>
                            <p class="text-xs sm:text-sm text-gray-200 leading-relaxed">
                                {{ __('Untuk kebutuhan hunian berukuran besar, gedung kantor, maupun restoran komersial, menjadwalkan inspeksi rutin berkala dapat menghemat hingga 40% biaya pengeluaran tak terduga. Tim kami selalu siap membantu survei lokasi tanpa biaya di wilayah operasional KOOTA.') }}
                            </p>
                        </div>

                        <!-- Article Tags & Share Strip -->
                        <div class="pt-8 mt-8 border-t border-gray-100 flex flex-wrap items-center justify-between gap-4">
                            <!-- Tags -->
                            <div class="flex flex-wrap items-center gap-2">
                                <span class="text-xs font-bold text-gray-400 uppercase tracking-wider">{{ __('Topik:') }}</span>
                                <span class="px-3 py-1 rounded-lg bg-gray-100 text-gray-700 text-xs font-semibold">#{{ Str::slug($post->category) }}</span>
                                <span class="px-3 py-1 rounded-lg bg-gray-100 text-gray-700 text-xs font-semibold">#KootaServices</span>
                                <span class="px-3 py-1 rounded-lg bg-gray-100 text-gray-700 text-xs font-semibold">#SurabayaMalangBali</span>
                            </div>

                            <!-- Bottom Share Button -->
                            <div class="flex items-center gap-2">
                                <span class="text-xs text-gray-500 font-medium">{{ __('Suka artikel ini?') }}</span>
                                <a href="https://api.whatsapp.com/send?text={{ urlencode($post->title . ' - ' . url()->current()) }}" 
                                   target="_blank" 
                                   rel="noopener noreferrer"
                                   class="inline-flex items-center gap-1.5 px-3 py-1.5 rounded-lg bg-[#25d366] text-white text-xs font-bold hover:bg-[#20ba59] transition-all">
                                    <span>Bagikan</span>
                                </a>
                            </div>
                        </div>
                    </div>

                    <!-- Author Editorial Profile Card -->
                    <div class="p-6 sm:p-8 rounded-3xl bg-white border border-gray-200/80 shadow-xs flex flex-col sm:flex-row items-center sm:items-start gap-5 text-center sm:text-left">
                        <div class="w-16 h-16 rounded-2xl bg-gradient-to-br from-[#820003] to-[#420001] text-white flex items-center justify-center font-black text-xl shadow-lg ring-4 ring-red-50 shrink-0">
                            KS
                        </div>
                        <div class="space-y-2">
                            <div class="flex flex-col sm:flex-row sm:items-center gap-1 sm:gap-3">
                                <h3 class="text-base font-bold text-gray-900">{{ __('Diterbitkan oleh KOOTA SERVICES') }}</h3>
                                <span class="text-xs px-2.5 py-0.5 rounded-full bg-green-50 text-green-700 font-bold border border-green-200 inline-block self-center sm:self-auto">Penyedia Jasa Resmi</span>
                            </div>
                            <p class="text-xs text-gray-600 leading-relaxed">
                                {{ __('KOOTA SERVICES adalah penyedia layanan terpadu profesional untuk Home Cleaning, Perbaikan Rumah, dan Pengangkutan Sampah berlisensi di Surabaya, Malang, Sidoarjo, Gresik, Bali, dan Jakarta. Seluruh artikel disusun berdasarkan pengalaman teknis nyata di lapangan.') }}
                            </p>
                        </div>
                    </div>

                </div>

                <!-- Sticky Sidebar Column (4 Cols) -->
                <aside class="lg:col-span-4 space-y-6">
                    <div class="sticky top-20 space-y-6">
                        
                        <!-- 1. Consultation Direct Card (Branded & High Conversion) -->
                        <div class="p-7 rounded-3xl bg-gradient-to-br from-[#820003] via-[#740003] to-[#4a0002] text-white shadow-xl relative overflow-hidden space-y-5">
                            <div class="absolute -right-10 -bottom-10 w-36 h-36 rounded-full bg-white/5 pointer-events-none"></div>

                            <div class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full bg-white/15 backdrop-blur-md text-[11px] font-bold tracking-wide">
                                <span class="w-2 h-2 rounded-full bg-green-400"></span>
                                <span>Layanan Siaga</span>
                            </div>

                            <div class="space-y-2">
                                <h3 class="text-xl font-black leading-tight tracking-tight">
                                    {{ __('Punya Kendala Terkait') }} {{ __($post->category) }}?
                                </h3>
                                <p class="text-xs text-red-100 leading-relaxed">
                                    {{ __('Dapatkan penanganan cepat, survei lokasi, serta estimasi biaya transparan dari teknisi dan armada resmi KOOTA SERVICES.') }}
                                </p>
                            </div>

                            <!-- Trust Checks -->
                            <ul class="text-xs text-red-100 space-y-2 pt-1 border-t border-white/15">
                                <li class="flex items-center gap-2">
                                    <svg class="w-4 h-4 text-green-400 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M5 13l4 4L19 7"/></svg>
                                    <span>Teknisi & kru berpengalaman terlatih</span>
                                </li>
                                <li class="flex items-center gap-2">
                                    <svg class="w-4 h-4 text-green-400 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M5 13l4 4L19 7"/></svg>
                                    <span>Peralatan modern & ramah lingkungan</span>
                                </li>
                                <li class="flex items-center gap-2">
                                    <svg class="w-4 h-4 text-green-400 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M5 13l4 4L19 7"/></svg>
                                    <span>Respon cepat WhatsApp dalam hitungan menit</span>
                                </li>
                            </ul>

                            <!-- CTAs -->
                            <div class="space-y-2.5 pt-2">
                                <a href="https://wa.me/6281217597109?text={{ urlencode('Halo KOOTA SERVICES, saya membaca artikel ' . $post->title . ' dan ingin konsultasi layanan.') }}" 
                                   target="_blank"
                                   class="w-full flex items-center justify-center gap-2 px-4 py-3 rounded-xl bg-[#25d366] hover:bg-[#20ba59] text-white font-bold text-xs sm:text-sm shadow-md transition-all active:scale-95">
                                    <svg class="w-4 h-4 fill-current" viewBox="0 0 24 24">
                                        <path d="M12.031 6.172c-3.181 0-5.767 2.586-5.768 5.766-.001 1.298.38 2.27 1.019 3.287l-.711 2.598 2.669-.699c.969.54 1.771.82 2.791.82 3.181 0 5.768-2.587 5.768-5.766.001-3.187-2.575-5.77-5.768-5.771zm3.392 8.244c-.144.405-.837.774-1.17.824-.299.045-.677.063-1.092-.069-.252-.08-.575-.187-.988-.365-1.739-.751-2.874-2.502-2.961-2.617-.087-.116-.708-.94-.708-1.793s.448-1.273.607-1.446c.159-.173.346-.217.462-.217l.332.006c.106.005.249-.04.39.298.144.347.491 1.2.534 1.287.043.087.072.188.014.304-.058.116-.087.188-.173.289l-.26.304c-.087.086-.177.18-.076.354.101.174.449.741.964 1.201.662.591 1.221.774 1.394.86.173.086.275.073.376-.044.101-.116.433-.506.549-.68.116-.173.231-.145.39-.086s1.011.477 1.184.564.289.13.332.202c.043.073.043.419-.101.824z"/>
                                    </svg>
                                    <span>{{ __('Chat WhatsApp Sekarang') }}</span>
                                </a>

                                <a href="{{ route('consultation.index', ['notes' => 'Terkait artikel: ' . $post->title]) }}" 
                                   class="w-full text-center block px-4 py-2.5 rounded-xl bg-white/10 hover:bg-white/20 text-white font-semibold text-xs transition-colors border border-white/20">
                                    {{ __('Isi Formulir Konsultasi') }}
                                </a>
                            </div>
                        </div>

                        <!-- 2. Related Articles Card -->
                        <div class="p-6 rounded-3xl bg-white border border-gray-200/80 shadow-xs space-y-4">
                            <div class="flex items-center justify-between border-b border-gray-100 pb-3">
                                <h3 class="text-sm font-bold text-gray-900">{{ __('Artikel Terkait Lainnya') }}</h3>
                                <a href="{{ route('blog.index') }}" class="text-[11px] font-bold text-[#820003] hover:underline">
                                    {{ __('Lihat Semua') }} &rarr;
                                </a>
                            </div>

                            <div class="space-y-4">
                                @forelse($relatedPosts as $rel)
                                    <a href="{{ route('blog.show', $rel->slug) }}" class="group flex gap-3.5 items-start">
                                        <div class="w-16 h-16 rounded-xl overflow-hidden bg-gray-100 shrink-0 border border-gray-200 relative">
                                            <img src="{{ $rel->image }}" alt="{{ $rel->title }}" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-300">
                                        </div>
                                        <div class="space-y-1 min-w-0">
                                            <span class="text-[10px] font-extrabold text-[#820003] uppercase tracking-wider block">
                                                {{ __($rel->category) }}
                                            </span>
                                            <h4 class="text-xs font-bold text-gray-800 group-hover:text-[#820003] transition-colors line-clamp-2 leading-snug">
                                                {{ __($rel->title) }}
                                            </h4>
                                            <p class="text-[10px] text-gray-400">
                                                {{ $rel->published_at ? $rel->published_at->format('d M Y') : date('d M Y') }}
                                            </p>
                                        </div>
                                    </a>
                                @empty
                                    <p class="text-xs text-gray-400 py-3">{{ __('Belum ada artikel terkait lainnya.') }}</p>
                                @endforelse
                            </div>
                        </div>

                        <!-- 3. Coverage Area Widget -->
                        <div class="p-5 rounded-2xl bg-gray-50 border border-gray-200/70 text-xs text-gray-600 space-y-2">
                            <div class="flex items-center gap-2 font-bold text-gray-900">
                                <svg class="w-4 h-4 text-[#820003]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/>
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/>
                                </svg>
                                <span>{{ __('Jangkauan Area Layanan') }}</span>
                            </div>
                            <p class="text-[11px] leading-relaxed text-gray-500">
                                Surabaya, Sidoarjo, Gresik, Malang Raya, Bali (Denpasar & sekitarnya), dan DKI Jakarta.
                            </p>
                        </div>

                    </div>
                </aside>

            </div>

            <!-- 5. Bottom Section: More Articles Slider / Grid (Interactive Style) -->
            <section class="mt-20 pt-12 border-t border-gray-200 space-y-8">
                <div class="flex flex-col sm:flex-row sm:items-end justify-between gap-4">
                    <div>
                        <span class="text-xs font-bold text-[#820003] uppercase tracking-wider block mb-1">
                            {{ __('Rekomendasi Bacaan') }}
                        </span>
                        <h2 class="text-2xl sm:text-3xl font-extrabold text-[#1c1b1b] tracking-tight">
                            {{ __('Jelajahi Artikel Lainnya') }}
                        </h2>
                    </div>
                    <a href="{{ route('blog.index') }}" class="inline-flex items-center gap-1.5 text-xs font-bold text-[#820003] hover:underline">
                        <span>{{ __('Katalog Lengkap Blog') }}</span>
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"/></svg>
                    </a>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-3 gap-6 sm:gap-8">
                    @foreach($relatedPosts as $bottomPost)
                        <div class="blog-interactive-card group shadow-md hover:shadow-2xl transition-all duration-500 hover:-translate-y-1.5 flex flex-col justify-end">
                            <img src="{{ $bottomPost->image }}" 
                                 alt="{{ $bottomPost->title }}" 
                                 class="absolute inset-0 w-full h-full object-cover transition-transform duration-700 ease-out group-hover:scale-110">
                            
                            <div class="blog-card-overlay"></div>

                            <div class="absolute top-4 left-4 right-4 z-10 flex items-center justify-between pointer-events-none">
                                <span class="px-3 py-1 rounded-full bg-black/45 backdrop-blur-md text-white text-[11px] font-bold border border-white/20 group-hover:bg-[#820003] group-hover:border-[#820003] transition-colors">
                                    {{ __($bottomPost->category) }}
                                </span>
                                <span class="px-2.5 py-1 rounded-full bg-black/45 backdrop-blur-md text-gray-200 text-[11px] font-medium border border-white/15">
                                    {{ $bottomPost->published_at ? $bottomPost->published_at->format('d M Y') : date('d M Y') }}
                                </span>
                            </div>

                            <div class="relative z-20 p-6 flex flex-col justify-end w-full text-white pointer-events-auto">
                                <h3 class="text-lg font-extrabold text-white leading-snug tracking-tight drop-shadow-sm group-hover:text-red-200 transition-colors line-clamp-2">
                                    {{ __($bottomPost->title) }}
                                </h3>

                                <p class="text-xs text-gray-300 font-medium mt-1">
                                    {{ __($bottomPost->category) }} • {{ __('Tips & Edukasi') }}
                                </p>

                                <div class="blog-card-expandable">
                                    <div class="blog-card-expandable-content">
                                        <p class="blog-card-anim-item text-xs text-gray-200 leading-relaxed mt-3 line-clamp-2">
                                            {{ __($bottomPost->excerpt) }}
                                        </p>
                                        <div class="blog-card-anim-item blog-card-anim-item-delay mt-4 pt-3 border-t border-white/20 flex items-center justify-between">
                                            <span class="inline-flex items-center gap-1.5 px-3.5 py-1.5 rounded-lg bg-[#820003] text-white text-xs font-bold shadow-md">
                                                <span>{{ __('Baca') }}</span>
                                                <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M14 5l7 7m0 0l-7 7m7-7H3"/></svg>
                                            </span>
                                            <span class="text-[11px] text-gray-300">{{ __('Buka Artikel') }} &rarr;</span>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <a href="{{ route('blog.show', $bottomPost->slug) }}" class="absolute inset-0 z-30 focus:outline-none focus:ring-2 focus:ring-[#820003] rounded-3xl" aria-label="{{ __($bottomPost->title) }}"></a>
                        </div>
                    @endforeach
                </div>
            </section>

        </main>
    </div>
@endsection
