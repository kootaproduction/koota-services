@extends('layouts.app')

@section('title', 'Insight & Tips - KOOTA SERVICES')

@section('content')
    <!-- Header -->
    <section class="bg-[#fcf9f8] py-16 md:py-20 text-center border-b border-gray-100">
        <div class="max-w-[1280px] mx-auto px-4 sm:px-6 lg:px-8 space-y-4">
            <h1 class="text-4xl sm:text-5xl font-extrabold tracking-tight text-[#1c1b1b]">
                Insight & <span class="text-[#820003]">Tips</span>
            </h1>
            <p class="text-sm sm:text-base text-gray-600 max-w-2xl mx-auto leading-relaxed">
                {{ __('Kumpulan artikel informatif dan panduan praktis seputar perawatan fasilitas, manajemen limbah terpadu, dan solusi perbaikan bangunan.') }}
            </p>
        </div>
    </section>

    <!-- Main Blog Content with Smooth Instant Filtering -->
    <section class="py-16 bg-[#fcf9f8]" x-data="{ currentFilter: 'All' }">
        <div class="max-w-[1280px] mx-auto px-4 sm:px-6 lg:px-8 space-y-16">
            
            @if(isset($featuredPost) && $featuredPost)
                <!-- Featured Article -->
                <div class="bg-white rounded-3xl overflow-hidden border border-gray-100 shadow-xs hover:shadow-xl transition-all duration-300 grid grid-cols-1 lg:grid-cols-12">
                    <div class="lg:col-span-6 h-72 sm:h-96 lg:h-auto overflow-hidden bg-gray-100">
                        <img src="{{ $featuredPost->image }}" alt="{{ $featuredPost->title }}" class="w-full h-full object-cover hover:scale-105 transition-transform duration-500">
                    </div>
                    <div class="lg:col-span-6 p-8 sm:p-12 flex flex-col justify-between space-y-6">
                        <div class="space-y-4">
                            <div class="flex items-center gap-3">
                                <span class="px-3.5 py-1 rounded-full bg-red-50 text-[#820003] text-xs font-bold border border-red-100">
                                    {{ __($featuredPost->category) }}
                                </span>
                                <span class="text-xs text-gray-400 font-medium">
                                    {{ $featuredPost->published_at ? $featuredPost->published_at->format('d M Y') : date('d M Y') }}
                                </span>
                            </div>

                            <h2 class="text-2xl sm:text-3xl font-extrabold text-[#1c1b1b] leading-tight hover:text-[#820003] transition-colors">
                                <a href="{{ route('blog.show', $featuredPost->slug) }}">{{ __($featuredPost->title) }}</a>
                            </h2>

                            <p class="text-xs sm:text-sm text-gray-600 leading-relaxed">
                                {{ __($featuredPost->excerpt) }}
                            </p>
                        </div>

                        <div>
                            <a href="{{ route('blog.show', $featuredPost->slug) }}" class="inline-flex items-center gap-2 text-xs sm:text-sm font-bold text-[#820003] hover:text-[#ba1a15] transition-colors">
                                <span>{{ __('Baca Selengkapnya') }}</span>
                            </a>
                        </div>
                    </div>
                </div>
            @endif

            <!-- Category Filter Tabs -->
            <div class="space-y-8">
                <div class="flex flex-wrap justify-center gap-2.5">
                    <button @click="currentFilter = 'All'" :class="currentFilter === 'All' || currentFilter === 'Semua' ? 'bg-[#820003] text-white shadow-md' : 'bg-white text-gray-700 border border-gray-200 hover:bg-gray-50'" class="px-6 py-2.5 rounded-full text-xs font-bold transition-all">
                        {{ __('All') }}
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

                <!-- Articles Grid -->
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                    @forelse($posts as $post)
                        <div x-show="currentFilter === 'All' || currentFilter === 'Semua' || currentFilter === '{{ $post->category }}' || '{{ $post->category }}'.includes(currentFilter) || ((currentFilter === 'Pembersihan Rumah' || currentFilter === 'Home Cleaning') && ('{{ $post->category }}'.includes('Cleaning') || '{{ $post->category }}'.includes('Pembersihan'))) || (currentFilter === 'Perbaikan Rumah' && ('{{ $post->category }}'.includes('Tukang') || '{{ $post->category }}'.includes('Perbaikan')))" 
                             x-transition 
                             class="bg-white rounded-3xl overflow-hidden border border-gray-100 shadow-xs hover:shadow-xl transition-all duration-300 group flex flex-col justify-between hover:-translate-y-1">
                            <div>
                                <div class="h-52 overflow-hidden relative bg-gray-100">
                                    <img src="{{ $post->image }}" alt="{{ $post->title }}" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500">
                                    <div class="absolute top-4 left-4">
                                        <span class="px-3 py-1 rounded-full bg-white/90 backdrop-blur-md text-[#820003] text-xs font-bold shadow-xs">
                                            {{ __($post->category) }}
                                        </span>
                                    </div>
                                </div>
                                <div class="p-6 space-y-3">
                                    <h3 class="text-base font-bold text-[#1c1b1b] group-hover:text-[#820003] transition-colors line-clamp-2 leading-snug">
                                        <a href="{{ route('blog.show', $post->slug) }}">{{ __($post->title) }}</a>
                                    </h3>
                                    <p class="text-xs text-gray-600 leading-relaxed line-clamp-3">
                                        {{ __($post->excerpt) }}
                                    </p>
                                </div>
                            </div>
                            <div class="px-6 pb-6 pt-2 border-t border-gray-50 flex items-center justify-between">
                                <a href="{{ route('blog.show', $post->slug) }}" class="inline-flex items-center gap-1.5 text-xs font-bold text-[#820003] hover:text-[#ba1a15] transition-colors">
                                    <span>{{ __('Baca Selengkapnya') }}</span>
                                </a>
                                <span class="text-[11px] text-gray-400 font-medium">
                                    {{ $post->published_at ? $post->published_at->format('d M Y') : date('d M Y') }}
                                </span>
                            </div>
                        </div>
                    @empty
                        <div class="col-span-full py-16 text-center bg-white rounded-3xl border border-dashed border-gray-200 space-y-3">
                            <p class="text-sm font-bold text-gray-700">{{ __('Artikel Belum Tersedia') }}</p>
                            <p class="text-xs text-gray-500 max-w-md mx-auto">{{ __('Konten artikel dan tips bermanfaat seputar fasilitas akan segera diperbarui.') }}</p>
                        </div>
                    @endforelse
                </div>
            </div>

            <!-- CTA Consultation Box -->
            <div class="bg-[#820003] rounded-3xl p-10 sm:p-14 text-center max-w-4xl mx-auto space-y-5 text-white shadow-2xl">
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
