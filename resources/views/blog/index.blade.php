@extends('layouts.app')

@section('title', 'Insight & Tips - KOOTA SERVICE')

@section('content')
    <!-- Header -->
    <section class="bg-[#fcf9f8] py-16 md:py-20 text-center border-b border-gray-100">
        <div class="max-w-[1280px] mx-auto px-4 sm:px-6 lg:px-8 space-y-4">
            <h1 class="text-4xl sm:text-5xl font-bold tracking-tight text-[#1c1b1b]">
                Insight & Tips
            </h1>
            <p class="text-sm sm:text-base text-gray-600 max-w-2xl mx-auto leading-relaxed">
                Kumpulan artikel informatif dan tips praktis seputar perawatan fasilitas, manajemen limbah, dan solusi perbaikan untuk lingkungan yang lebih baik.
            </p>
        </div>
    </section>

    <!-- Main Blog Content -->
    <section class="py-16 bg-[#fcf9f8]">
        <div class="max-w-[1280px] mx-auto px-4 sm:px-6 lg:px-8 space-y-16">
            
            @if(isset($featuredPost) && $featuredPost)
                <!-- Featured Article -->
                <div class="bg-white rounded-3xl overflow-hidden border border-gray-100 shadow-xs hover:shadow-md transition-all grid grid-cols-1 lg:grid-cols-12">
                    <div class="lg:col-span-6 h-72 sm:h-96 lg:h-auto overflow-hidden bg-gray-100">
                        <img src="{{ $featuredPost->image }}" alt="{{ $featuredPost->title }}" class="w-full h-full object-cover hover:scale-105 transition-transform duration-500">
                    </div>
                    <div class="lg:col-span-6 p-8 sm:p-12 flex flex-col justify-between space-y-6">
                        <div class="space-y-4">
                            <div class="flex items-center gap-3">
                                <span class="px-3.5 py-1 rounded-full bg-[#80f98b] text-[#007327] text-xs font-semibold">
                                    {{ $featuredPost->category }}
                                </span>
                                <span class="text-xs text-gray-400 font-medium">
                                    {{ $featuredPost->published_at ? $featuredPost->published_at->format('d M Y') : '12 Okt 2024' }}
                                </span>
                            </div>

                            <h2 class="text-2xl sm:text-3xl font-bold text-[#1c1b1b] leading-tight hover:text-[#820003] transition-colors">
                                <a href="{{ route('blog.show', $featuredPost->slug) }}">{{ $featuredPost->title }}</a>
                            </h2>

                            <p class="text-xs sm:text-sm text-gray-600 leading-relaxed">
                                {{ $featuredPost->excerpt }}
                            </p>
                        </div>

                        <div>
                            <a href="{{ route('blog.show', $featuredPost->slug) }}" class="inline-flex items-center gap-2 text-xs sm:text-sm font-bold text-[#820003] hover:text-[#ba1a15] transition-colors">
                                <span>Baca Selengkapnya</span>
                                <span>→</span>
                            </a>
                        </div>
                    </div>
                </div>
            @endif

            <!-- Category Filter Tabs -->
            <div class="space-y-8">
                <div class="flex flex-wrap gap-2.5">
                    <a href="{{ route('blog.index') }}" class="px-5 py-2 rounded-full text-xs font-semibold transition-all {{ !request('category') || request('category') === 'All' ? 'bg-[#1c1b1b] text-white' : 'bg-white text-gray-700 border border-gray-200 hover:bg-gray-50' }}">
                        All
                    </a>
                    <a href="{{ route('blog.index', ['category' => 'Cleaning']) }}" class="px-5 py-2 rounded-full text-xs font-semibold transition-all {{ request('category') === 'Cleaning' ? 'bg-[#1c1b1b] text-white' : 'bg-white text-gray-700 border border-gray-200 hover:bg-gray-50' }}">
                        Cleaning
                    </a>
                    <a href="{{ route('blog.index', ['category' => 'Maintenance']) }}" class="px-5 py-2 rounded-full text-xs font-semibold transition-all {{ request('category') === 'Maintenance' ? 'bg-[#1c1b1b] text-white' : 'bg-white text-gray-700 border border-gray-200 hover:bg-gray-50' }}">
                        Maintenance
                    </a>
                    <a href="{{ route('blog.index', ['category' => 'Renovation']) }}" class="px-5 py-2 rounded-full text-xs font-semibold transition-all {{ request('category') === 'Renovation' ? 'bg-[#1c1b1b] text-white' : 'bg-white text-gray-700 border border-gray-200 hover:bg-gray-50' }}">
                        Renovation
                    </a>
                    <a href="{{ route('blog.index', ['category' => 'Waste']) }}" class="px-5 py-2 rounded-full text-xs font-semibold transition-all {{ request('category') === 'Waste' ? 'bg-[#1c1b1b] text-white' : 'bg-white text-gray-700 border border-gray-200 hover:bg-gray-50' }}">
                        Waste
                    </a>
                    <a href="{{ route('blog.index', ['category' => 'IPAL']) }}" class="px-5 py-2 rounded-full text-xs font-semibold transition-all {{ request('category') === 'IPAL' ? 'bg-[#1c1b1b] text-white' : 'bg-white text-gray-700 border border-gray-200 hover:bg-gray-50' }}">
                        IPAL
                    </a>
                </div>

                <!-- Articles Grid (3 Columns) -->
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                    @forelse($posts as $post)
                        <div class="bg-white rounded-2xl overflow-hidden border border-gray-100 shadow-xs hover:shadow-md transition-all group flex flex-col justify-between">
                            <div>
                                <div class="h-48 overflow-hidden relative bg-gray-100">
                                    <img src="{{ $post->image }}" alt="{{ $post->title }}" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500">
                                </div>
                                <div class="p-6 space-y-3">
                                    <span class="inline-block px-3 py-1 rounded-full bg-gray-100 text-gray-700 text-[11px] font-semibold">
                                        {{ $post->category }}
                                    </span>
                                    <h3 class="text-base font-bold text-[#1c1b1b] group-hover:text-[#820003] transition-colors line-clamp-2">
                                        <a href="{{ route('blog.show', $post->slug) }}">{{ $post->title }}</a>
                                    </h3>
                                    <p class="text-xs text-gray-600 leading-relaxed line-clamp-3">
                                        {{ $post->excerpt }}
                                    </p>
                                </div>
                            </div>

                            <div class="px-6 pb-6 pt-2">
                                <a href="{{ route('blog.show', $post->slug) }}" class="inline-flex items-center gap-1.5 text-xs font-bold text-[#820003] hover:text-[#ba1a15] transition-colors">
                                    <span>Learn More</span>
                                    <span>→</span>
                                </a>
                            </div>
                        </div>
                    @empty
                        <div class="col-span-full py-16 text-center bg-white rounded-2xl border border-dashed border-gray-200 space-y-3">
                            <p class="text-sm font-semibold text-gray-700">Belum Ada Artikel</p>
                            <p class="text-xs text-gray-500 max-w-md mx-auto">Kumpulan artikel informatif dan tips perawatan fasilitas akan segera dipublikasikan secara manual.</p>
                        </div>
                    @endforelse
                </div>
            </div>

            <!-- FAQ Section -->
            <div class="bg-white p-8 sm:p-12 rounded-3xl border border-gray-100 shadow-xs space-y-12">
                <div class="text-center max-w-3xl mx-auto space-y-3">
                    <h2 class="text-3xl sm:text-4xl font-bold text-[#1c1b1b] tracking-tight">
                        — Temukan Jawabannya di Sini!
                    </h2>
                    <p class="text-xs sm:text-sm text-gray-600 leading-relaxed">
                        Kamu mungkin baru kenal kami, dan itu wajar. Tapi satu hal yang pasti: kami siap bantu kamu mewujudkan setiap ide dengan sepenuh hati.
                    </p>
                </div>

                <div class="grid grid-cols-1 lg:grid-cols-12 gap-10 items-start">
                    <div class="lg:col-span-8 space-y-4" x-data="{ activeFaq: 1 }">
                        @foreach($faqs as $faq)
                            <div class="border-b border-gray-200 pb-4">
                                <button @click="activeFaq = (activeFaq === {{ $faq->id }} ? null : {{ $faq->id }})" class="w-full flex items-center justify-between py-3 text-left focus:outline-none group">
                                    <span class="text-base sm:text-lg font-bold text-gray-900 group-hover:text-[#820003]">
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

                    <div class="lg:col-span-4">
                        <div class="bg-[#fcf9f8] p-8 rounded-2xl border border-gray-200 text-center space-y-5 shadow-xs">
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

        </div>
    </section>
@endsection
