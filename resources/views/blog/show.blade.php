@extends('layouts.app')

@section('title', $post->title . ' - KOOTA SERVICE Blog')

@section('content')
    <article class="py-16 bg-[#fcf9f8]">
        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 space-y-8">
            <!-- Header -->
            <div class="space-y-4 text-center">
                <span class="px-4 py-1.5 rounded-full bg-[#80f98b] text-[#007327] text-xs font-bold inline-block">
                    {{ $post->category }}
                </span>
                <h1 class="text-3xl sm:text-4xl lg:text-5xl font-extrabold text-gray-900 leading-tight">
                    {{ $post->title }}
                </h1>
                <p class="text-xs text-gray-500 font-medium">
                    Dipublikasikan pada {{ $post->published_at ? $post->published_at->format('d M Y') : '12 Okt 2024' }} oleh KOOTA SERVICE Editorial
                </p>
            </div>

            <!-- Featured Image -->
            <div class="rounded-3xl overflow-hidden shadow-lg border border-gray-200">
                <img src="{{ $post->image }}" alt="{{ $post->title }}" class="w-full h-96 object-cover">
            </div>

            <!-- Excerpt Callout -->
            <div class="p-6 rounded-2xl bg-red-50 border-l-4 border-[#ac0c0c] text-sm text-gray-800 font-medium leading-relaxed">
                {{ $post->excerpt }}
            </div>

            <!-- Main Content Body -->
            <div class="prose prose-lg max-w-none text-gray-700 leading-relaxed space-y-6 bg-white p-8 sm:p-12 rounded-3xl border border-gray-200 shadow-xs">
                {!! nl2br(e($post->content)) !!}
            </div>

            <!-- CTA Footer -->
            <div class="p-8 rounded-3xl bg-[#ac0c0c] text-white flex flex-col sm:flex-row items-center justify-between gap-6 shadow-xl">
                <div>
                    <h3 class="text-xl font-bold">Butuh Layanan Terkait Artikel Ini?</h3>
                    <p class="text-xs text-red-100 mt-1">Konsultasikan langsung masalah properti dan fasilitas bisnis Anda bersama ahli KOOTA SERVICE.</p>
                </div>
                <a href="{{ route('consultation.index') }}" class="px-6 py-3 rounded-xl bg-white text-[#ac0c0c] font-bold text-sm hover:bg-gray-100 transition-colors shrink-0">
                    Konsultasi Gratis
                </a>
            </div>
        </div>
    </article>
@endsection
