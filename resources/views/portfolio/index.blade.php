@extends('layouts.app')

@section('title', 'Portfolio Koota Service - Karya & Solusi Terpercaya')

@section('content')
    <!-- Header Section -->
    <section class="py-16 md:py-20 bg-[#fcf9f8] text-center border-b border-gray-100">
        <div class="max-w-[1280px] mx-auto px-4 sm:px-6 lg:px-8 space-y-4">
            <h1 class="text-4xl sm:text-5xl font-bold tracking-tight text-[#1c1b1b]">
                Portfolio <span class="text-[#820003]">Koota Service</span>
            </h1>
            <p class="text-sm sm:text-base text-gray-600 max-w-2xl mx-auto leading-relaxed">
                Melihat lebih dekat karya dan komitmen kami dalam memberikan layanan pemeliharaan fasilitas terbaik di berbagai sektor industri dan residensial.
            </p>
        </div>
    </section>

    <!-- Main Portfolio Grid & Filter Section -->
    <section class="py-16 bg-[#fcf9f8]" x-data="{ currentFilter: '{{ $category ?? 'All' }}' }">
        <div class="max-w-[1280px] mx-auto px-4 sm:px-6 lg:px-8 space-y-16">
            <!-- Filter Pills -->
            <div class="flex flex-wrap justify-center gap-2.5">
                <button @click="currentFilter = 'All'" :class="currentFilter === 'All' ? 'bg-[#1c1b1b] text-white shadow-xs' : 'bg-white text-gray-700 border border-gray-200 hover:bg-gray-50'" class="px-6 py-2 rounded-full text-xs font-semibold transition-all">
                    All
                </button>
                <button @click="currentFilter = 'Cleaning Service'" :class="currentFilter === 'Cleaning Service' ? 'bg-[#1c1b1b] text-white shadow-xs' : 'bg-white text-gray-700 border border-gray-200 hover:bg-gray-50'" class="px-6 py-2 rounded-full text-xs font-semibold transition-all">
                    Cleaning Service
                </button>
                <button @click="currentFilter = 'Pengangkutan Sampah'" :class="currentFilter === 'Pengangkutan Sampah' ? 'bg-[#1c1b1b] text-white shadow-xs' : 'bg-white text-gray-700 border border-gray-200 hover:bg-gray-50'" class="px-6 py-2 rounded-full text-xs font-semibold transition-all">
                    Pengangkutan Sampah
                </button>
                <button @click="currentFilter = 'Jasa Tukang Perbaikan & Renovasi'" :class="currentFilter === 'Jasa Tukang Perbaikan & Renovasi' ? 'bg-[#1c1b1b] text-white shadow-xs' : 'bg-white text-gray-700 border border-gray-200 hover:bg-gray-50'" class="px-6 py-2 rounded-full text-xs font-semibold transition-all">
                    Jasa Tukang Perbaikan & Renovasi
                </button>
                <button @click="currentFilter = 'IPAL'" :class="currentFilter === 'IPAL' ? 'bg-[#1c1b1b] text-white shadow-xs' : 'bg-white text-gray-700 border border-gray-200 hover:bg-gray-50'" class="px-6 py-2 rounded-full text-xs font-semibold transition-all">
                    IPAL
                </button>
            </div>

            <!-- Portfolio Cards Grid -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                @forelse($projects->where('is_video', false) as $project)
                    <div x-show="currentFilter === 'All' || currentFilter === '{{ $project->category_name }}' || '{{ $project->service->title ?? '' }}'.includes(currentFilter)" x-transition class="bg-white rounded-2xl overflow-hidden border border-gray-100 shadow-xs hover:shadow-md transition-all group flex flex-col justify-between">
                        <div>
                            <!-- Card Image -->
                            <div class="h-56 overflow-hidden relative bg-gray-100">
                                <img src="{{ $project->image }}" alt="{{ $project->title }}" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500">
                            </div>

                            <!-- Content -->
                            <div class="p-6 space-y-3">
                                <!-- Category Badge -->
                                <div class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full text-[11px] font-semibold {{ in_array($project->category_name, ['IPAL', 'Pengangkutan Sampah', 'Terjadwal', 'Sustainability']) ? 'bg-[#80f98b] text-[#007327]' : 'bg-red-50 text-[#820003]' }}">
                                    <span>{{ in_array($project->category_name, ['IPAL', 'Pengangkutan Sampah', 'Terjadwal']) ? 'Sustainability' : ($project->category_name ?? 'Facility Care') }}</span>
                                </div>

                                <h3 class="text-lg font-bold text-gray-900 group-hover:text-[#820003] transition-colors leading-snug">
                                    {{ $project->title }}
                                </h3>

                                <p class="text-xs text-gray-600 leading-relaxed line-clamp-3">
                                    {{ $project->description }}
                                </p>
                            </div>
                        </div>

                        <!-- Action Link -->
                        <div class="px-6 pb-6 pt-2">
                            <a href="{{ route('consultation.index') }}" class="inline-flex items-center gap-1.5 text-xs font-bold text-[#820003] hover:text-[#ba1a15] transition-colors group-hover:translate-x-0.5 transition-transform">
                                <span>Learn More</span>
                                <span>→</span>
                            </a>
                        </div>
                    </div>
                @empty
                    <!-- Empty State for Manual Input -->
                    <div class="col-span-full py-16 text-center bg-white rounded-2xl border border-dashed border-gray-200 space-y-3">
                        <p class="text-sm font-semibold text-gray-700">Portofolio Belum Tersedia</p>
                        <p class="text-xs text-gray-500 max-w-md mx-auto">Dokumentasi portofolio proyek akan segera diperbarui secara manual melalui dashboard manajemen.</p>
                    </div>
                @endforelse
            </div>

            <!-- CTA Box: Punya Project? -->
            <div class="bg-[#f0edec]/60 rounded-3xl p-10 sm:p-14 text-center max-w-4xl mx-auto space-y-5 border border-gray-100">
                <h2 class="text-3xl sm:text-4xl font-bold text-gray-900 tracking-tight">
                    Punya<br>Project?
                </h2>
                <p class="text-xs sm:text-sm text-gray-600 max-w-lg mx-auto leading-relaxed">
                    Konsultasikan kebutuhan perawatan fasilitas atau renovasi Anda dengan tim ahli kami hari ini.
                </p>
                <div class="pt-2">
                    <a href="{{ route('consultation.index') }}" class="inline-flex items-center gap-2 px-8 py-3.5 rounded-xl bg-[#820003] hover:bg-[#ba1a15] text-white font-bold text-xs sm:text-sm transition-all shadow-md active:scale-95">
                        <span>Dapatkan Penawaran</span>
                        <span>→</span>
                    </a>
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
                    <!-- Left: FAQ Accordion -->
                    <div class="lg:col-span-8 space-y-4" x-data="{ activeFaq: 1 }">
                        @foreach($faqs as $faq)
                            <div class="border-b border-gray-200 pb-4">
                                <button @click="activeFaq = (activeFaq === {{ $faq->id }} ? null : {{ $faq->id }})" class="w-full flex items-center justify-between py-3 text-left focus:outline-none group">
                                    <span class="text-base sm:text-lg font-bold text-gray-900 group-hover:text-[#820003] transition-colors">
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

                    <!-- Right: Ask Expert Box -->
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
