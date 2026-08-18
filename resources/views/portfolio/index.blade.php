@extends('layouts.app')

@section('title', 'Portofolio Project - KOOTA SERVICES')

@section('content')
    <!-- Header Section -->
    <section class="py-16 md:py-20 bg-[#fcf9f8] text-center border-b border-gray-100">
        <div class="max-w-[1280px] mx-auto px-4 sm:px-6 lg:px-8 space-y-4">
            <h1 class="text-4xl sm:text-5xl font-extrabold tracking-tight text-[#1c1b1b]">
                {{ __('Portofolio') }} <span class="text-[#820003]">Koota Services</span>
            </h1>
            <p class="text-sm sm:text-base text-gray-600 max-w-2xl mx-auto leading-relaxed">
                {{ __('Melihat lebih dekat karya dan komitmen kami dalam memberikan layanan pemeliharaan fasilitas terbaik di Surabaya, Malang, Bali, dan Jakarta.') }}
            </p>
        </div>
    </section>

    <!-- Main Portfolio Grid & Filter Section -->
    <section class="py-16 bg-[#fcf9f8]" x-data="{ currentFilter: '{{ $category ?? 'All' }}' }">
        <div class="max-w-[1280px] mx-auto px-4 sm:px-6 lg:px-8 space-y-16">
            <!-- Filter Pills -->
            <div class="flex flex-wrap justify-center gap-2.5">
                <button @click="currentFilter = 'All'" :class="currentFilter === 'All' || currentFilter === 'Semua' ? 'bg-[#820003] text-white shadow-md' : 'bg-white text-gray-700 border border-gray-200 hover:bg-gray-50'" class="px-6 py-2.5 rounded-full text-xs font-bold transition-all">
                    {{ __('All') }}
                </button>
                <button @click="currentFilter = 'Cleaning Service'" :class="currentFilter === 'Cleaning Service' ? 'bg-[#820003] text-white shadow-md' : 'bg-white text-gray-700 border border-gray-200 hover:bg-gray-50'" class="px-6 py-2.5 rounded-full text-xs font-bold transition-all">
                    {{ __('Cleaning Service') }}
                </button>
                <button @click="currentFilter = 'Pengangkutan Sampah'" :class="currentFilter === 'Pengangkutan Sampah' ? 'bg-[#820003] text-white shadow-md' : 'bg-white text-gray-700 border border-gray-200 hover:bg-gray-50'" class="px-6 py-2.5 rounded-full text-xs font-bold transition-all">
                    {{ __('Pengangkutan Sampah') }}
                </button>
                <button @click="currentFilter = 'Jasa Tukang & Renovasi'" :class="currentFilter === 'Jasa Tukang & Renovasi' ? 'bg-[#820003] text-white shadow-md' : 'bg-white text-gray-700 border border-gray-200 hover:bg-gray-50'" class="px-6 py-2.5 rounded-full text-xs font-bold transition-all">
                    {{ __('Jasa Tukang & Renovasi') }}
                </button>
                <button @click="currentFilter = 'IPAL'" :class="currentFilter === 'IPAL' ? 'bg-[#820003] text-white shadow-md' : 'bg-white text-gray-700 border border-gray-200 hover:bg-gray-50'" class="px-6 py-2.5 rounded-full text-xs font-bold transition-all">
                    {{ __('IPAL') }}
                </button>
            </div>

            <!-- Portfolio Cards Grid -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                @forelse($projects->where('is_video', false) as $project)
                    <div x-show="currentFilter === 'All' || currentFilter === 'Semua' || currentFilter === '{{ $project->category_name }}' || '{{ $project->service->title ?? '' }}'.includes(currentFilter)" 
                         x-transition 
                         class="bg-white rounded-3xl overflow-hidden border border-gray-100 shadow-xs hover:shadow-xl transition-all duration-300 group flex flex-col justify-between hover:-translate-y-1">
                        
                        <div>
                            <!-- Card Image -->
                            <div class="h-60 overflow-hidden relative bg-gray-100">
                                <img src="{{ $project->image }}" alt="{{ $project->title }}" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500">
                                <div class="absolute top-4 left-4">
                                    <span class="px-3 py-1 rounded-full bg-white/90 backdrop-blur-md text-[#820003] text-xs font-bold shadow-xs">
                                        {{ __($project->category_name) }}
                                    </span>
                                </div>
                            </div>

                            <!-- Content -->
                            <div class="p-6 space-y-3">
                                @if($project->location)
                                    <p class="text-[11px] font-semibold text-gray-400 flex items-center gap-1">
                                        <span>📍</span>
                                        <span>{{ $project->location }}</span>
                                    </p>
                                @endif

                                <h3 class="text-lg font-bold text-gray-900 group-hover:text-[#820003] transition-colors leading-snug">
                                    <a href="{{ route('portfolio.show', $project->id) }}">
                                        {{ __($project->title) }}
                                    </a>
                                </h3>

                                <p class="text-xs text-gray-600 leading-relaxed line-clamp-3">
                                    {{ __($project->description) }}
                                </p>
                            </div>
                        </div>

                        <!-- Action Link to Dedicated Detail Page -->
                        <div class="px-6 pb-6 pt-2 border-t border-gray-50 flex items-center justify-between">
                            <a href="{{ route('portfolio.show', $project->id) }}" class="inline-flex items-center gap-1.5 text-xs font-bold text-[#820003] hover:text-[#ba1a15] transition-colors group-hover:translate-x-1 transition-transform">
                                <span>{{ __('Lihat Katalog Foto Lengkap') }}</span>
                                <span>→</span>
                            </a>
                            @if(!empty($project->gallery_images) && count($project->gallery_images) > 0)
                                <span class="text-[11px] font-semibold text-gray-400 bg-gray-100 px-2 py-0.5 rounded-md">
                                    📷 {{ count($project->gallery_images) }} {{ __('Foto') }}
                                </span>
                            @endif
                        </div>
                    </div>
                @empty
                    <div class="col-span-full py-16 text-center bg-white rounded-3xl border border-dashed border-gray-200 space-y-3">
                        <p class="text-sm font-bold text-gray-700">{{ __('Portofolio Belum Tersedia') }}</p>
                        <p class="text-xs text-gray-500 max-w-md mx-auto">{{ __('Dokumentasi portofolio proyek akan segera diperbarui secara berkala.') }}</p>
                    </div>
                @endforelse
            </div>

            <!-- CTA Box: Punya Project? -->
            <div class="bg-[#820003] rounded-3xl p-10 sm:p-14 text-center max-w-4xl mx-auto space-y-5 text-white shadow-2xl">
                <h2 class="text-3xl sm:text-4xl font-extrabold tracking-tight">
                    {{ __('Punya Rencana Perawatan Fasilitas & Proyek?') }}
                </h2>
                <p class="text-xs sm:text-sm text-red-100 max-w-lg mx-auto leading-relaxed">
                    {{ __('Konsultasikan kebutuhan perawatan fasilitas, pengangkutan limbah, atau renovasi Anda di Surabaya, Malang, Bali, atau Jakarta bersama tim ahli kami hari ini.') }}
                </p>
                <div class="pt-2 flex flex-wrap justify-center gap-4">
                    <a href="{{ route('consultation.index') }}" class="inline-flex items-center gap-2 px-8 py-3.5 rounded-xl bg-white text-[#820003] hover:bg-gray-100 font-bold text-xs sm:text-sm transition-all shadow-md active:scale-95">
                        <span>{{ __('Dapatkan Penawaran') }}</span>
                        <span>→</span>
                    </a>
                    <a href="https://wa.me/6281217597109?text=Halo%20KOOTA%20SERVICES,%20saya%20ingin%20berkonsultasi%20mengenai%20proyek." target="_blank" class="inline-flex items-center gap-2 px-6 py-3.5 rounded-xl bg-[#25d366] hover:bg-[#20ba59] text-white font-bold text-xs sm:text-sm transition-all shadow-md active:scale-95">
                        <span>Chat WhatsApp 0812-1759-7109</span>
                    </a>
                </div>
            </div>

            <!-- FAQ Section -->
            <div class="bg-white p-8 sm:p-12 rounded-3xl border border-gray-100 shadow-xs space-y-12">
                <div class="text-center max-w-3xl mx-auto space-y-3">
                    <h2 class="text-3xl sm:text-4xl font-extrabold text-[#1c1b1b] tracking-tight">
                        — {{ __('Temukan Jawabannya di Sini!') }}
                    </h2>
                    <p class="text-xs sm:text-sm text-gray-600 leading-relaxed">
                        {{ __('Pertanyaan yang sering diajukan seputar pelaksanaan proyek dan jaminan standar kualitas Koota Services.') }}
                    </p>
                </div>

                <div class="grid grid-cols-1 lg:grid-cols-12 gap-10 items-start">
                    <!-- Left: FAQ Accordion -->
                    <div class="lg:col-span-8 space-y-4" x-data="{ activeFaq: 1 }">
                        @foreach($faqs as $faq)
                            <div class="border-b border-gray-200 pb-4">
                                <button @click="activeFaq = (activeFaq === {{ $faq->id }} ? null : {{ $faq->id }})" class="w-full flex items-center justify-between py-3 text-left focus:outline-none group">
                                    <span class="text-base sm:text-lg font-bold text-gray-900 group-hover:text-[#820003] transition-colors">
                                        0{{ $loop->iteration }} {{ __($faq->question) }}
                                    </span>
                                    <svg class="w-5 h-5 text-gray-400 transition-transform duration-200" :class="{ 'rotate-180 text-[#820003]': activeFaq === {{ $faq->id }} }" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/>
                                    </svg>
                                </button>
                                <div x-show="activeFaq === {{ $faq->id }}" x-collapse class="mt-2 text-xs sm:text-sm text-gray-600 leading-relaxed pr-6">
                                    {{ __($faq->answer) }}
                                </div>
                            </div>
                        @endforeach
                    </div>

                    <!-- Right: Ask Expert Box -->
                    <div class="lg:col-span-4">
                        <div class="bg-[#fcf9f8] p-8 rounded-3xl border border-gray-200 text-center space-y-5 shadow-xs">
                            <h3 class="text-xl font-bold text-gray-900 leading-tight">
                                {{ __('Punya pertanyaan lain?') }}
                            </h3>
                            <p class="text-xs text-gray-600 leading-relaxed">
                                {{ __('Tim kami siap membantu Anda! Hubungi kami langsung untuk konsultasi gratis dan solusi terbaik sesuai kebutuhan Anda.') }}
                            </p>
                            <div class="pt-2">
                                <a href="{{ route('consultation.index') }}" class="w-full inline-block py-3.5 rounded-xl bg-[#820003] hover:bg-[#ba1a15] text-white font-bold text-xs sm:text-sm transition-all shadow-md active:scale-95">
                                    {{ __('Tanya Ahlinya!') }}
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </section>
@endsection
