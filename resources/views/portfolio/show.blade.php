@extends('layouts.app')

@section('title', __($project->title) . ' - ' . __('Katalog Portofolio') . ' KOOTA SERVICE')

@section('content')
    <!-- Breadcrumb -->
    <div class="bg-white border-b border-gray-100 py-3 text-xs text-gray-500">
        <div class="max-w-[1280px] mx-auto px-4 sm:px-6 lg:px-8 flex items-center space-x-2">
            <a href="{{ route('home') }}" class="hover:text-[#820003] transition-colors">{{ __('Home') }}</a>
            <span>›</span>
            <a href="{{ route('portfolio.index') }}" class="hover:text-[#820003] transition-colors">{{ __('Portofolio') }}</a>
            <span>›</span>
            <span class="font-bold text-gray-900 truncate max-w-xs">{{ __($project->title) }}</span>
        </div>
    </div>

    <!-- Simple, Modern, Minimalist Photo Catalog -->
    <section class="py-12 md:py-16 bg-[#fcf9f8]" x-data="{ lightbox: false, currentPhoto: '{{ $project->image }}' }">
        <div class="max-w-[1280px] mx-auto px-4 sm:px-6 lg:px-8 space-y-10">
            
            <!-- Simple Header (Title & Category Only) -->
            <div class="text-center max-w-3xl mx-auto space-y-3">
                <span class="px-4 py-1.5 rounded-full bg-red-50 text-[#820003] text-xs font-bold border border-red-100 inline-block">
                    {{ __($project->category_name) }}
                </span>
                <h1 class="text-3xl sm:text-4xl lg:text-5xl font-extrabold text-[#1c1b1b] tracking-tight">
                    {{ __($project->title) }}
                </h1>
                @if($project->location)
                    <p class="text-xs sm:text-sm text-gray-500 font-medium">
                        📍 {{ $project->location }}
                    </p>
                @endif
            </div>

            @php
                $photos = array_values(array_filter(array_merge([$project->image], $project->gallery_images ?? [])));
            @endphp

            <!-- Clean Modern Photo Catalog Grid -->
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
                @foreach($photos as $photo)
                    <div class="h-80 sm:h-96 rounded-3xl overflow-hidden shadow-xs hover:shadow-xl border border-gray-100 bg-white group cursor-pointer relative"
                         @click="currentPhoto = '{{ $photo }}'; lightbox = true">
                        <img src="{{ $photo }}" alt="{{ $project->title }}" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500">
                        <div class="absolute inset-0 bg-black/20 opacity-0 group-hover:opacity-100 transition-opacity flex items-center justify-center">
                            <span class="px-4 py-2 rounded-full bg-white/90 backdrop-blur-md text-xs font-bold text-gray-900 shadow-md">
                                🔍 {{ __('Perbesar Foto') }}
                            </span>
                        </div>
                    </div>
                @endforeach
            </div>

            <!-- Minimalist Action CTA Bar -->
            <div class="pt-6 flex flex-wrap items-center justify-center gap-4">
                <a href="{{ route('consultation.index', ['service' => $project->category_name]) }}" class="px-8 py-3.5 rounded-xl bg-[#820003] hover:bg-[#ba1a15] text-white font-bold text-xs sm:text-sm transition-all shadow-md active:scale-95">
                    {{ __('Konsultasi Proyek Serupa') }}
                </a>
                <a href="{{ route('portfolio.index') }}" class="px-6 py-3.5 rounded-xl bg-white border border-gray-200 text-gray-700 hover:bg-gray-50 font-bold text-xs sm:text-sm transition-all">
                    ← {{ __('Kembali ke Semua Portofolio') }}
                </a>
            </div>

        </div>

        <!-- Minimalist Image Lightbox Modal -->
        <div x-show="lightbox" 
             x-transition:enter="transition ease-out duration-300"
             x-transition:enter-start="opacity-0"
             x-transition:enter-end="opacity-100"
             x-transition:leave="transition ease-in duration-200"
             x-transition:leave-start="opacity-100"
             x-transition:leave-end="opacity-0"
             class="fixed inset-0 z-50 bg-black/90 backdrop-blur-md flex items-center justify-center p-4"
             @click="lightbox = false"
             style="display: none;">
            
            <button @click="lightbox = false" class="absolute top-6 right-6 z-20 w-11 h-11 rounded-full bg-white/20 text-white text-xl flex items-center justify-center hover:bg-white/40 transition-colors">
                ✕
            </button>
            <div class="max-w-5xl max-h-[90vh] overflow-hidden rounded-3xl" @click.stop>
                <img :src="currentPhoto" alt="Katalog Foto Fullsize" class="w-full h-full object-contain max-h-[85vh] rounded-3xl">
            </div>
        </div>
    </section>
@endsection
