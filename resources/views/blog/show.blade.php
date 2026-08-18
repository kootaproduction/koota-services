@extends('layouts.app')

@section('title', __($post->title) . ' - KOOTA SERVICES Blog')

@section('content')
    <article class="py-16 bg-[#fcf9f8]">
        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 space-y-8">
            <!-- Header -->
            <div class="space-y-4 text-center">
                <span class="px-4 py-1.5 rounded-full bg-red-50 text-[#820003] border border-red-100 text-xs font-bold inline-block">
                    {{ __($post->category) }}
                </span>
                <h1 class="text-3xl sm:text-4xl lg:text-5xl font-extrabold text-gray-900 leading-tight">
                    {{ __($post->title) }}
                </h1>
                <p class="text-xs text-gray-500 font-medium">
                    {{ __('Dipublikasikan pada') }} {{ $post->published_at ? $post->published_at->format('d M Y') : date('d M Y') }} {{ __('oleh KOOTA SERVICES Editorial') }}
                </p>
            </div>

            <!-- Featured Image -->
            <div class="rounded-3xl overflow-hidden shadow-xl border border-gray-100 bg-gray-100">
                <img src="{{ $post->image }}" alt="{{ $post->title }}" class="w-full h-80 sm:h-96 object-cover">
            </div>

            <!-- Excerpt Callout -->
            @if($post->excerpt)
                <div class="p-6 rounded-2xl bg-red-50/70 border-l-4 border-[#820003] text-sm text-gray-800 font-medium leading-relaxed">
                    {{ __($post->excerpt) }}
                </div>
            @endif

            <!-- Main Content Body -->
            <div class="prose prose-lg max-w-none text-gray-700 leading-relaxed space-y-6 bg-white p-8 sm:p-12 rounded-3xl border border-gray-100 shadow-xs">
                {!! nl2br(__($post->content)) !!}
            </div>

            <!-- CTA Footer -->
            <div class="p-8 rounded-3xl bg-[#820003] text-white flex flex-col sm:flex-row items-center justify-between gap-6 shadow-xl">
                <div>
                    <h3 class="text-xl font-bold">{{ __('Butuh Layanan Terkait Artikel Ini?') }}</h3>
                    <p class="text-xs text-red-100 mt-1">{{ __('Konsultasikan langsung masalah properti dan fasilitas bisnis Anda di Surabaya, Malang, Bali, atau Jakarta bersama ahli KOOTA SERVICES.') }}</p>
                </div>
                <a href="{{ route('consultation.index', ['notes' => 'Terkait artikel: ' . $post->title]) }}" class="px-6 py-3 rounded-xl bg-white text-[#820003] font-bold text-sm hover:bg-gray-100 transition-colors shrink-0">
                    {{ __('Konsultasi Gratis') }} &rarr;
                </a>
            </div>
        </div>
    </article>
@endsection
