@extends('layouts.app')

@section('title', 'Portofolio Project - KOOTA SERVICES')

@section('content')
    @if(file_exists(public_path('images/portfolio-banner.png')))
        <section aria-label="{{ __('Banner portofolio') }}" class="border-b border-gray-100 bg-[#fcf9f8]">
            <img
                src="{{ asset('images/portfolio-banner.png') }}"
                alt="{{ __('Banner portofolio KOOTA SERVICES') }}"
                class="block h-[220px] w-full object-cover sm:h-[320px] lg:h-[420px]"
            >
        </section>
    @endif

    <!-- Main Portfolio Grid & Filter Section -->
    <section class="py-16 bg-[#fcf9f8]" x-data="{ currentFilter: '{{ $category ?? 'All' }}' }">
        <div class="max-w-[1280px] mx-auto px-4 sm:px-6 lg:px-8 space-y-16">
            <!-- Filter Pills -->
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

            <!-- Portfolio Cards Grid -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                @forelse($projects->where('is_video', false) as $project)
                    @php
                        $previewPhotos = array_values(array_unique(array_filter(array_merge([$project->image], $project->gallery_images ?? []))));
                    @endphp
                    <div x-data="{ galleryOpen: false, touchInteraction: false }"
                         @pointerenter="if ($event.pointerType === 'mouse') galleryOpen = true"
                         @pointerleave="if ($event.pointerType === 'mouse' && !$el.contains(document.activeElement)) galleryOpen = false"
                         @pointerdown="touchInteraction = $event.pointerType === 'touch'"
                         @pointerup="touchInteraction = false"
                         @pointercancel="touchInteraction = false"
                         @focusin="if (!touchInteraction) galleryOpen = true"
                         @focusout="if (!$el.contains($event.relatedTarget)) galleryOpen = false"
                         x-show="currentFilter === 'All' || currentFilter === 'Semua' || currentFilter === '{{ $project->category_name }}' || '{{ $project->service->title ?? '' }}'.includes(currentFilter) || ((currentFilter === 'Pembersihan Rumah' || currentFilter === 'Home Cleaning') && ('{{ $project->category_name }}'.includes('Cleaning') || '{{ $project->category_name }}'.includes('Pembersihan') || '{{ $project->service->title ?? '' }}'.includes('Cleaning') || '{{ $project->service->title ?? '' }}'.includes('Pembersihan'))) || (currentFilter === 'Perbaikan Rumah' && ('{{ $project->category_name }}'.includes('Tukang') || '{{ $project->category_name }}'.includes('Perbaikan') || '{{ $project->service->title ?? '' }}'.includes('Perbaikan')))"
                         x-transition 
                         class="relative bg-white rounded-3xl border border-gray-100 shadow-xs hover:shadow-xl transition-all duration-300 group flex flex-col justify-between hover:-translate-y-1 hover:z-20 focus-within:z-20">

                        <div>
                            <!-- Card Image -->
                            <div class="h-60 overflow-hidden relative bg-gray-100">
                                <img src="{{ $project->image }}" alt="{{ $project->title }}" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500">
                                @if(count($previewPhotos) > 1)
                                    <button type="button"
                                            @click.stop="galleryOpen = !galleryOpen"
                                            @focusin.stop
                                            :aria-expanded="galleryOpen.toString()"
                                            aria-label="{{ __('Tampilkan foto dokumentasi proyek') }}"
                                            class="portfolio-gallery-toggle absolute inset-0 z-[5] rounded-t-3xl bg-transparent focus-visible:outline focus-visible:outline-2 focus-visible:outline-[#820003]">
                                    </button>
                                @endif
                                <div class="portfolio-category-badge-wrap">
                                    <span class="portfolio-category-badge">
                                        {{ __($project->category_name) }}
                                    </span>
                                </div>
                            </div>

                            @if(count($previewPhotos) > 1)
                                <div class="pointer-events-none absolute left-1/2 top-[-1.25rem] z-30 w-[min(90vw,420px)] -translate-x-1/2">
                                    <div x-show="galleryOpen"
                                         x-transition:enter="transition ease-out duration-200"
                                         x-transition:enter-start="opacity-0 translate-y-2"
                                         x-transition:enter-end="opacity-100 translate-y-0"
                                         x-transition:leave="transition ease-in duration-150"
                                         x-transition:leave-start="opacity-100 translate-y-0"
                                         x-transition:leave-end="opacity-0 translate-y-2"
                                         style="display: none;"
                                         class="portfolio-gallery-strip pointer-events-auto flex snap-x snap-mandatory gap-2 overflow-x-auto overscroll-x-contain px-1 pt-1 pb-2 md:cursor-grab"
                                         x-data="{ dragging: false, startX: 0, startScrollLeft: 0, scrollWithWheel(event) { const delta = Math.abs(event.deltaX) > Math.abs(event.deltaY) ? event.deltaX : event.deltaY; const maxScroll = this.$el.scrollWidth - this.$el.clientWidth; if (delta && maxScroll > 0 && ((delta < 0 && this.$el.scrollLeft > 0) || (delta > 0 && this.$el.scrollLeft < maxScroll))) { this.$el.scrollLeft += delta; event.preventDefault(); } } }"
                                         @pointerdown="if ($event.pointerType === 'mouse' && $event.button === 0) { dragging = true; startX = $event.clientX; startScrollLeft = $el.scrollLeft; $el.setPointerCapture($event.pointerId); }"
                                         @pointermove="if (dragging) { $event.preventDefault(); $el.scrollLeft = startScrollLeft + startX - $event.clientX; }"
                                         @pointerup="dragging = false"
                                         @pointercancel="dragging = false"
                                         @lostpointercapture="dragging = false"
                                         @wheel="scrollWithWheel($event)"
                                         :class="{ 'is-dragging': dragging }"
                                         role="region"
                                         aria-label="{{ __('Foto dokumentasi proyek') }}"
                                         :tabindex="galleryOpen ? 0 : -1">
                                        @foreach($previewPhotos as $photo)
                                            <img src="{{ $photo }}"
                                                 alt="{{ __($project->title) }} - {{ __('Foto') }} {{ $loop->iteration }}"
                                                 draggable="false"
                                                 class="portfolio-gallery-thumbnail h-24 w-32 shrink-0 snap-start rounded-2xl object-cover shadow-lg shadow-black/20 sm:h-28 sm:w-36">
                                        @endforeach
                                    </div>
                                </div>
                            @endif

                            <!-- Content -->
                            <div class="p-6 space-y-3">
                                @if($project->location)
                                    <p class="text-[11px] font-semibold text-gray-400">
                                        {{ $project->location }}
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
                        <div class="px-6 pb-6 pt-2 border-t border-gray-50">
                            <a href="{{ route('portfolio.show', $project->id) }}" class="inline-flex items-center gap-1.5 text-xs font-bold text-[#820003] hover:text-[#ba1a15] transition-colors">
                                <span>{{ __('Lihat Dokumentasi Proyek') }}</span>
                            </a>
                        </div>
                    </div>
                @empty
                    <div class="col-span-full py-16 text-center bg-white rounded-3xl border border-dashed border-gray-200 space-y-3">
                        <p class="text-sm font-bold text-gray-700">{{ __('Portofolio Belum Tersedia') }}</p>
                        <p class="text-xs text-gray-500 max-w-md mx-auto">{{ __('Dokumentasi portofolio proyek akan segera diperbarui secara berkala.') }}</p>
                    </div>
                @endforelse
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

                <div class="max-w-4xl mx-auto">
                    <div class="space-y-4" x-data="{ activeFaq: 1 }">
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
                </div>
            </div>

        </div>
    </section>
@endsection
