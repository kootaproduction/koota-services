@extends('layouts.admin')

@section('title', 'Edit Artikel - Admin KOOTA SERVICE')
@section('page_title', 'Edit Artikel Blog')

@section('content')
    <div class="max-w-3xl bg-white p-8 rounded-2xl border border-gray-200 shadow-xs space-y-6">
        <form action="{{ route('admin.posts.update', $post->id) }}" method="POST" enctype="multipart/form-data" class="space-y-6">
            @csrf
            @method('PUT')

            <div class="space-y-2">
                <label class="block text-xs font-bold uppercase text-gray-700">Judul Artikel</label>
                <input type="text" name="title" value="{{ old('title', $post->title) }}" required class="w-full px-4 py-3 rounded-xl border border-gray-300 focus:ring-2 focus:ring-[#ac0c0c] text-sm">
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div class="space-y-2">
                    <label class="block text-xs font-bold uppercase text-gray-700">Kategori Artikel</label>
                    <select name="category" class="w-full px-4 py-3 rounded-xl border border-gray-300 focus:ring-2 focus:ring-[#ac0c0c] text-sm bg-white">
                        <option value="Cleaning" {{ $post->category === 'Cleaning' ? 'selected' : '' }}>Cleaning</option>
                        <option value="Maintenance" {{ $post->category === 'Maintenance' ? 'selected' : '' }}>Maintenance</option>
                        <option value="Renovation" {{ $post->category === 'Renovation' ? 'selected' : '' }}>Renovation</option>
                        <option value="Waste" {{ $post->category === 'Waste' ? 'selected' : '' }}>Waste</option>
                        <option value="IPAL" {{ $post->category === 'IPAL' ? 'selected' : '' }}>IPAL</option>
                    </select>
                </div>

                <div class="space-y-2">
                    <label class="block text-xs font-bold uppercase text-gray-700">Tanggal Publikasi</label>
                    <input type="date" name="published_at" value="{{ old('published_at', $post->published_at ? $post->published_at->format('Y-m-d') : date('Y-m-d')) }}" class="w-full px-4 py-3 rounded-xl border border-gray-300 focus:ring-2 focus:ring-[#ac0c0c] text-sm">
                </div>
            </div>

            <div class="space-y-2">
                <label class="block text-xs font-bold uppercase text-gray-700">Ringkasan (Excerpt)</label>
                <textarea name="excerpt" rows="2" class="w-full px-4 py-3 rounded-xl border border-gray-300 focus:ring-2 focus:ring-[#ac0c0c] text-sm">{{ old('excerpt', $post->excerpt) }}</textarea>
            </div>

            <div class="space-y-2">
                <label class="block text-xs font-bold uppercase text-gray-700">Isi Konten Artikel</label>
                <textarea name="content" rows="8" required class="w-full px-4 py-3 rounded-xl border border-gray-300 focus:ring-2 focus:ring-[#ac0c0c] text-sm font-sans">{{ old('content', $post->content) }}</textarea>
            </div>

            <div class="space-y-2">
                <label class="block text-xs font-bold uppercase text-gray-700">Gambar Sampul (URL / Upload Baru)</label>
                <input type="text" name="image_url" value="{{ $post->image }}" class="w-full px-4 py-3 rounded-xl border border-gray-300 focus:ring-2 focus:ring-[#ac0c0c] text-sm mb-2">
                <input type="file" name="image_file" class="text-xs text-gray-600">
            </div>

            <div class="flex items-center gap-6">
                <label class="flex items-center gap-2 text-sm font-semibold text-gray-800">
                    <input type="checkbox" name="is_featured" value="1" {{ $post->is_featured ? 'checked' : '' }} class="rounded text-[#ac0c0c] focus:ring-[#ac0c0c]">
                    <span>Tampilkan Sebagai Artikel Utama (Featured Top Card)</span>
                </label>
            </div>

            <div class="flex items-center gap-4 pt-4">
                <button type="submit" class="px-6 py-3 rounded-xl bg-[#ac0c0c] text-white font-bold text-sm hover:bg-[#820003]">
                    Perbarui Artikel
                </button>
                <a href="{{ route('admin.posts.index') }}" class="text-xs font-bold text-gray-600 hover:underline">
                    Batal
                </a>
            </div>
        </form>
    </div>
@endsection
