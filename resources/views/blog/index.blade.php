@extends('layouts.app')

@section('title', 'Blog yang Lagi Hits & Terbaru - KOOTA SERVICES')

@section('content')
    <!-- 1. Urutan Pertama: Slider Artikel Hits & Terbaru (Desain Sama Persis dengan Konten Kedua, Ukuran Lebih Besar, Hover Animation) -->
    <section class="py-12 sm:py-16 bg-[#fcf9f8] overflow-hidden border-b border-gray-100 relative"
             x-data="{
                isDown: false,
                startX: 0,
                scrollLeft: 0,
                isDragging: false,
                startDrag(e) {
                    if (e.button !== 0) return;
                    this.isDown = true;
                    this.isDragging = false;
                    this.startX = e.pageX - this.$refs.heroTrack.offsetLeft;
                    this.scrollLeft = this.$refs.heroTrack.scrollLeft;
                },
                stopDrag() {
                    this.isDown = false;
                    setTimeout(() => { this.isDragging = false; }, 80);
                },
                onDrag(e) {
                    if (!this.isDown) return;
                    e.preventDefault();
                    const x = e.pageX - this.$refs.heroTrack.offsetLeft;
                    const walk = (x - this.startX) * 1.5;
                    if (Math.abs(walk) > 4) {
                        this.isDragging = true;
                    }
                    this.$refs.heroTrack.scrollLeft = this.scrollLeft - walk;
                }
             }">
        
        <!-- Header Rata Tengah (Tanpa Badge) -->
        <div class="max-w-3xl mx-auto px-4 sm:px-6 text-center mb-8 sm:mb-12 space-y-3">
            <h1 class="text-3xl sm:text-4xl lg:text-5xl font-extrabold tracking-tight text-[#1c1b1b] leading-tight">
                {{ __('Blog yang Lagi Hits & Terbaru') }}
            </h1>
            <p class="text-xs sm:text-sm md:text-base text-gray-600 max-w-xl mx-auto leading-relaxed">
                {{ __('Kumpulan artikel pilihan seputar kebersihan, perbaikan hunian, dan tata kelola fasilitas yang paling banyak dibaca.') }}
            </p>
        </div>

        <!-- Slider Container -->
        <div class="relative">
            <!-- Horizontal Track (Sides peek out, scrollable via cursor drag) -->
            <div x-ref="heroTrack"
                 @mousedown="startDrag($event)"
                 @mouseleave="stopDrag()"
                 @mouseup="stopDrag()"
                 @mousemove="onDrag($event)"
                 :class="{ 'is-dragging': isDown }"
                 class="blog-slider-track flex gap-5 sm:gap-7 overflow-x-auto snap-x snap-mandatory px-4 sm:px-8 lg:px-16 py-3 cursor-grab">
                
                @foreach($trendingPosts as $hero)
                    <!-- Kotak Lebih Besar untuk Konten Pertama -->
                    <div class="w-[85vw] sm:w-[75vw] lg:w-[62vw] max-w-[880px] shrink-0 snap-center h-[440px] sm:h-[490px] md:h-[530px]">
                        <div class="blog-interactive-card group shadow-md hover:shadow-2xl transition-all duration-500 hover:-translate-y-1.5 flex flex-col justify-end w-full h-full">
                            <!-- Background Image with Zoom on Hover -->
                            <img src="{{ $hero->image }}" 
                                 alt="{{ $hero->title }}"
                                 draggable="false"
                                 class="absolute inset-0 w-full h-full object-cover transition-transform duration-700 ease-out group-hover:scale-110">

                            <!-- Dynamic Gradient Overlay -->
                            <div class="blog-card-overlay"></div>

                            <!-- Top Badges -->
                            <div class="absolute top-5 left-5 right-5 z-10 flex items-center justify-between pointer-events-none">
                                <span class="px-3.5 py-1.5 rounded-full bg-black/45 backdrop-blur-md text-white text-xs font-bold border border-white/20 shadow-sm transition-colors duration-300 group-hover:bg-[#820003] group-hover:border-[#820003]">
                                    {{ __($hero->category) }}
                                </span>
                                <span class="px-3 py-1.5 rounded-full bg-black/45 backdrop-blur-md text-gray-200 text-xs font-medium border border-white/15">
                                    {{ $hero->published_at ? $hero->published_at->format('d M Y') : date('d M Y') }}
                                </span>
                            </div>

                            <!-- Card Content (Positioned at bottom over dark gradient) -->
                            <div class="relative z-20 p-6 sm:p-10 flex flex-col justify-end w-full text-white pointer-events-auto">
                                <!-- Title (Bold White) -->
                                <h2 class="text-2xl sm:text-3xl md:text-4xl font-extrabold text-white leading-tight tracking-tight drop-shadow-sm group-hover:text-red-200 transition-colors duration-300 line-clamp-2">
                                    {{ __($hero->title) }}
                                </h2>

                                <!-- Subtitle / Category info -->
                                <p class="text-xs sm:text-sm text-gray-300 font-medium mt-2 flex items-center gap-2">
                                    <span>{{ __($hero->category) }}</span>
                                    <span class="text-white/40">•</span>
                                    <span>{{ __('Trending & Hits') }}</span>
                                </p>

                                <!-- Expandable Description & Link (Appears on Hover) -->
                                <div class="blog-card-expandable">
                                    <div class="blog-card-expandable-content">
                                        <p class="blog-card-anim-item text-xs sm:text-sm md:text-base text-gray-200 leading-relaxed mt-3.5 line-clamp-3">
                                            {{ __($hero->excerpt) }}
                                        </p>

                                        <div class="blog-card-anim-item blog-card-anim-item-delay mt-5 pt-3.5 border-t border-white/20 flex items-center justify-between">
                                            <span class="inline-flex items-center gap-2 px-5 py-2.5 rounded-xl bg-[#820003] hover:bg-[#a10004] text-white text-xs sm:text-sm font-bold shadow-md transition-all group-hover:shadow-red-900/40">
                                                <span>{{ __('Baca Selengkapnya') }}</span>
                                                <svg class="w-4 h-4 transform group-hover:translate-x-1.5 transition-transform duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M14 5l7 7m0 0l-7 7m7-7H3"/>
                                                </svg>
                                            </span>
                                            <span class="text-xs text-gray-300 font-medium">
                                                {{ __('Buka Artikel') }} &rarr;
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Clickable Link Overlay with drag safety -->
                            <a href="{{ route('blog.show', $hero->slug) }}" 
                               @click="if(isDragging) { $event.preventDefault(); $event.stopPropagation(); }"
                               class="absolute inset-0 z-30 focus:outline-none focus:ring-2 focus:ring-[#820003] rounded-3xl" 
                               aria-label="{{ __($hero->title) }}"></a>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    <!-- 2. Urutan Kedua: Katalog Blog Lengkap dengan Filter Kategori & Kartu Animasi Hover -->
    <section class="py-16 bg-[#fcf9f8]" x-data="{ currentFilter: '{{ $category ?? 'All' }}' }">
        <div class="max-w-[1280px] mx-auto px-4 sm:px-6 lg:px-8 space-y-12">
            
            <!-- Section Header (Rata Tengah, Tanpa Label Merah Kecil) & Filter Tabs -->
            <div class="space-y-6">
                <div class="text-center max-w-2xl mx-auto space-y-2">
                    <h2 class="text-3xl sm:text-4xl font-extrabold text-[#1c1b1b] tracking-tight">
                        {{ __('Eksplorasi Artikel & Panduan') }}
                    </h2>
                    <p class="text-xs sm:text-sm text-gray-600">
                        {{ __('Arahkan kursor pada kartu artikel untuk melihat cuplikan ringkas dan membaca selengkapnya.') }}
                    </p>
                </div>

                <!-- Category Filter Tabs -->
                <div class="flex flex-wrap justify-center gap-2.5 pt-2">
                    <button @click="currentFilter = 'All'" :class="currentFilter === 'All' || currentFilter === 'Semua' ? 'bg-[#820003] text-white shadow-md' : 'bg-white text-gray-700 border border-gray-200 hover:bg-gray-50'" class="px-6 py-2.5 rounded-full text-xs font-bold transition-all">
                        {{ __('Semua Kategori') }}
                    </button>
                    <button @click="currentFilter = 'Pembersihan Rumah'" :class="currentFilter === 'Pembersihan Rumah' || currentFilter === 'Home Cleaning' || currentFilter === 'Cleaning Service' ? 'bg-[#820003] text-white shadow-md' : 'bg-white text-gray-700 border border-gray-200 hover:bg-gray-50'" class="px-6 py-2.5 rounded-full text-xs font-bold transition-all">
                        {{ __('Pembersihan Rumah') }}
                    </button>
                    <button @click="currentFilter = 'Perbaikan Rumah'" :class="currentFilter === 'Perbaikan Rumah' || currentFilter === 'Jasa Tukang & Renovasi' ? 'bg-[#820003] text-white shadow-md' : 'bg-white text-gray-700 border border-gray-200 hover:bg-gray-50'" class="px-6 py-2.5 rounded-full text-xs font-bold transition-all">
                        {{ __('Perbaikan Rumah') }}
                    </button>
                    <button @click="currentFilter = 'Pengangkutan Sampah'" :class="currentFilter === 'Pengangkutan Sampah' ? 'bg-[#820003] text-white shadow-md' : 'bg-white text-gray-700 border border-gray-200 hover:bg-gray-50'" class="px-6 py-2.5 rounded-full text-xs font-bold transition-all">
                        {{ __('Pengangkutan Sampah') }}
                    </button>
                </div>
            </div>

            <!-- Articles Grid (Kartu Interaktif dengan Animasi Hover Sesuai Desain Poster) -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                @forelse($posts as $post)
                    <div x-show="currentFilter === 'All' || currentFilter === 'Semua' || currentFilter === '{{ $post->category }}' || '{{ $post->category }}'.includes(currentFilter) || ((currentFilter === 'Pembersihan Rumah' || currentFilter === 'Home Cleaning') && ('{{ $post->category }}'.includes('Cleaning') || '{{ $post->category }}'.includes('Pembersihan'))) || (currentFilter === 'Perbaikan Rumah' && ('{{ $post->category }}'.includes('Tukang') || '{{ $post->category }}'.includes('Perbaikan')))" 
                         x-transition 
                         class="blog-interactive-card group shadow-md hover:shadow-2xl transition-all duration-500 hover:-translate-y-1.5 flex flex-col justify-end">
                        
                        <!-- Background Image with Zoom on Hover -->
                        <img src="{{ $post->image }}" 
                             alt="{{ $post->title }}" 
                             class="absolute inset-0 w-full h-full object-cover transition-transform duration-700 ease-out group-hover:scale-110">

                        <!-- Dynamic Gradient Overlay -->
                        <div class="blog-card-overlay"></div>

                        <!-- Top Badges -->
                        <div class="absolute top-4 left-4 right-4 z-10 flex items-center justify-between pointer-events-none">
                            <span class="px-3 py-1 rounded-full bg-black/45 backdrop-blur-md text-white text-[11px] font-bold border border-white/20 shadow-sm transition-colors duration-300 group-hover:bg-[#820003] group-hover:border-[#820003]">
                                {{ __($post->category) }}
                            </span>
                            <span class="px-2.5 py-1 rounded-full bg-black/45 backdrop-blur-md text-gray-200 text-[11px] font-medium border border-white/15">
                                {{ $post->published_at ? $post->published_at->format('d M Y') : date('d M Y') }}
                            </span>
                        </div>

                        <!-- Card Content (Positioned at bottom over dark gradient) -->
                        <div class="relative z-20 p-6 sm:p-7 flex flex-col justify-end w-full text-white pointer-events-auto">
                            <!-- Title (Bold White) -->
                            <h3 class="text-lg sm:text-xl font-extrabold text-white leading-snug tracking-tight drop-shadow-sm group-hover:text-red-200 transition-colors duration-300 line-clamp-2">
                                {{ __($post->title) }}
                            </h3>

                            <!-- Subtitle / Category info -->
                            <p class="text-xs text-gray-300 font-medium mt-1.5 flex items-center gap-2">
                                <span>{{ __($post->category) }}</span>
                                <span class="text-white/40">•</span>
                                <span>{{ __('Tips & Edukasi') }}</span>
                            </p>

                            <!-- Expandable Description & Link (Appears with smooth animation on hover) -->
                            <div class="blog-card-expandable">
                                <div class="blog-card-expandable-content">
                                    <p class="blog-card-anim-item text-xs sm:text-[13px] text-gray-200 leading-relaxed mt-3 line-clamp-3">
                                        {{ __($post->excerpt) }}
                                    </p>

                                    <div class="blog-card-anim-item blog-card-anim-item-delay mt-4 pt-3 border-t border-white/20 flex items-center justify-between">
                                        <span class="inline-flex items-center gap-2 px-4 py-2 rounded-xl bg-[#820003] hover:bg-[#a10004] text-white text-xs font-bold shadow-md transition-all group-hover:shadow-red-900/40">
                                            <span>{{ __('Baca Selengkapnya') }}</span>
                                            <svg class="w-4 h-4 transform group-hover:translate-x-1 transition-transform duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M14 5l7 7m0 0l-7 7m7-7H3"/>
                                            </svg>
                                        </span>
                                        <span class="text-[11px] text-gray-300 font-medium">
                                            {{ __('Buka Artikel') }} &rarr;
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Full Clickable Link Overlay -->
                        <a href="{{ route('blog.show', $post->slug) }}" class="absolute inset-0 z-30 focus:outline-none focus:ring-2 focus:ring-[#820003] rounded-3xl" aria-label="{{ __($post->title) }}"></a>
                    </div>
                @empty
                    <div class="col-span-full py-16 text-center bg-white rounded-3xl border border-dashed border-gray-200 space-y-3">
                        <p class="text-sm font-bold text-gray-700">{{ __('Artikel Belum Tersedia') }}</p>
                        <p class="text-xs text-gray-500 max-w-md mx-auto">{{ __('Konten artikel dan tips bermanfaat seputar fasilitas akan segera diperbarui.') }}</p>
                    </div>
                @endforelse
            </div>

            <!-- 3. Urutan Ketiga: CTA Consultation Box -->
            <div class="bg-[#820003] rounded-3xl p-10 sm:p-14 text-center max-w-4xl mx-auto space-y-5 text-white shadow-2xl mt-12">
                <h2 class="text-3xl sm:text-4xl font-extrabold tracking-tight">
                    {{ __('Ingin Konsultasi Masalah Fasilitas Anda?') }}
                </h2>
                <p class="text-xs sm:text-sm text-red-100 max-w-lg mx-auto leading-relaxed">
                    {{ __('Diskusikan kendala kebersihan, limbah, atau perbaikan gedung bersama tim profesional Koota Services di Surabaya, Malang, Bali, dan Jakarta.') }}
                </p>
                <div class="pt-2 flex flex-wrap justify-center gap-4">
                    <a href="{{ route('consultation.index') }}" class="inline-flex items-center gap-2 px-8 py-3.5 rounded-xl bg-white text-[#820003] hover:bg-gray-100 font-bold text-xs sm:text-sm transition-all shadow-md active:scale-95">
                        <span>{{ __('Konsultasi Sekarang') }}</span>
                    </a>
                    <a href="https://wa.me/6281217597109?text=Halo%20KOOTA%20SERVICES,%20saya%20membaca%20blog%20dan%20ingin%20berkonsultasi." target="_blank" class="inline-flex items-center gap-2 px-6 py-3.5 rounded-xl bg-[#25d366] hover:bg-[#20ba59] text-white font-bold text-xs sm:text-sm transition-all shadow-md active:scale-95">
                        <span>Chat WhatsApp 0812-1759-7109</span>
                    </a>
                </div>
            </div>

        </div>
    </section>
@endsection
