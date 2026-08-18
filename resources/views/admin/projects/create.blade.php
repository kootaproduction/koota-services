@extends('layouts.admin')

@section('title', 'Tambah Project - Admin KOOTA SERVICES')
@section('page_title', 'Tambah Project & Katalog Foto Baru')

@section('content')
    <div class="max-w-4xl bg-white p-8 rounded-3xl border border-gray-200 shadow-sm space-y-6" x-data="{ mainPreview: '', videoUrl: '', isVideo: false }">
        <form action="{{ route('admin.projects.store') }}" method="POST" enctype="multipart/form-data" class="space-y-6">
            @csrf

            <div class="space-y-2">
                <label class="block text-xs font-bold uppercase text-gray-700">Judul Project</label>
                <input type="text" name="title" value="{{ old('title') }}" required placeholder="Contoh: Deep Cleaning & Sanitasi Gedung Graha Pratama" class="w-full px-4 py-3 rounded-xl border border-gray-300 focus:ring-2 focus:ring-[#820003] text-sm">
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div class="space-y-2">
                    <label class="block text-xs font-bold uppercase text-gray-700">Layanan Terkait</label>
                    <select name="service_id" class="w-full px-4 py-3 rounded-xl border border-gray-300 focus:ring-2 focus:ring-[#820003] text-sm bg-white">
                        <option value="">-- Pilih Layanan Terkait --</option>
                        @foreach($services as $s)
                            <option value="{{ $s->id }}" {{ old('service_id') == $s->id ? 'selected' : '' }}>{{ $s->title }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="space-y-2">
                    <label class="block text-xs font-bold uppercase text-gray-700">Kategori Filter (Tersinkronisasi)</label>
                    <select name="category_name" required class="w-full px-4 py-3 rounded-xl border border-gray-300 focus:ring-2 focus:ring-[#820003] text-sm bg-white">
                        @foreach($categories as $cat)
                            <option value="{{ $cat }}" {{ old('category_name') === $cat ? 'selected' : '' }}>{{ $cat }}</option>
                        @endforeach
                    </select>
                </div>
            </div>

            <!-- Metadata Info (Client, Location, Completion Date) -->
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                <div class="space-y-2">
                    <label class="block text-xs font-bold uppercase text-gray-700">Nama Klien / Instansi</label>
                    <input type="text" name="client" value="{{ old('client') }}" placeholder="PT Graha Pratama / Pribadi" class="w-full px-4 py-3 rounded-xl border border-gray-300 focus:ring-2 focus:ring-[#820003] text-sm">
                </div>
                <div class="space-y-2">
                    <label class="block text-xs font-bold uppercase text-gray-700">Lokasi Proyek</label>
                    <input type="text" name="location" value="{{ old('location') }}" placeholder="Surabaya / Malang / Bali / Jakarta" class="w-full px-4 py-3 rounded-xl border border-gray-300 focus:ring-2 focus:ring-[#820003] text-sm">
                </div>
                <div class="space-y-2">
                    <label class="block text-xs font-bold uppercase text-gray-700">Waktu Selesai</label>
                    <input type="text" name="completion_date" value="{{ old('completion_date') }}" placeholder="Agustus 2024" class="w-full px-4 py-3 rounded-xl border border-gray-300 focus:ring-2 focus:ring-[#820003] text-sm">
                </div>
            </div>

            <div class="space-y-2">
                <label class="block text-xs font-bold uppercase text-gray-700">Deskripsi Lengkap Project</label>
                <textarea name="description" rows="3" placeholder="Ceritakan detail ruang lingkup pekerjaan, tantangan, dan hasil pengerjaan..." class="w-full px-4 py-3 rounded-xl border border-gray-300 focus:ring-2 focus:ring-[#820003] text-sm">{{ old('description') }}</textarea>
            </div>

            <!-- Main Image Upload & Preview -->
            <div class="space-y-3">
                <label class="block text-xs font-bold uppercase text-gray-700">Gambar Utama Project (Upload File / URL)</label>
                <div class="p-4 rounded-2xl border-2 border-dashed border-gray-300 bg-gray-50 space-y-3 text-center">
                    <template x-if="mainPreview">
                        <div class="h-44 w-full rounded-xl overflow-hidden border border-gray-200 relative mb-2">
                            <img :src="mainPreview" alt="Preview Gambar Utama" class="w-full h-full object-cover">
                        </div>
                    </template>
                    <input type="file" name="image_file" accept="image/*" @change="mainPreview = URL.createObjectURL($event.target.files[0])" class="text-xs text-gray-600 w-full">
                    <p class="text-[11px] text-gray-400">Atau masukkan link gambar:</p>
                    <input type="text" name="image_url" @input="mainPreview = $event.target.value" placeholder="https://images.unsplash.com/..." class="w-full px-4 py-2 rounded-lg border border-gray-300 text-xs">
                </div>
            </div>

            <!-- Multi-Photo Gallery Upload for Catalog (Point 11) -->
            <div class="space-y-3">
                <label class="block text-xs font-bold uppercase text-gray-700">Katalog Foto Tambahan (Galeri Proyek Lengkap)</label>
                <div class="p-4 rounded-2xl border border-gray-200 bg-gray-50 space-y-3">
                    <p class="text-xs text-gray-600 font-semibold">Pilih banyak foto sekaligus untuk katalog:</p>
                    <input type="file" name="gallery_files[]" multiple accept="image/*" class="text-xs text-gray-600 w-full">
                    <p class="text-[11px] text-gray-400">Atau masukkan URL foto tambahan (1 URL per baris):</p>
                    <textarea name="gallery_urls" rows="3" placeholder="https://image1.jpg&#10;https://image2.jpg" class="w-full px-4 py-2 rounded-lg border border-gray-300 text-xs font-mono"></textarea>
                </div>
            </div>

            <!-- Video Section: YouTube Shorts / Instagram Reels (Point 9 & Image 4) -->
            <div class="space-y-3 pt-2 border-t border-gray-200">
                <label class="block text-xs font-bold uppercase text-gray-700">Video Reels / YouTube Shorts (Format Vertikal 9:16)</label>
                <div class="space-y-2">
                    <input type="text" name="video_url" x-model="videoUrl" placeholder="Contoh: https://www.youtube.com/shorts/VIDEO_ID atau https://youtube.com/watch?v=..." class="w-full px-4 py-3 rounded-xl border border-gray-300 focus:ring-2 focus:ring-[#820003] text-sm">
                    <p class="text-[11px] text-gray-500">Mendukung format YouTube Shorts, YouTube Video biasa, Instagram Reels, dan link MP4 langsung.</p>
                </div>
            </div>

            <div class="flex flex-wrap items-center gap-6 pt-2">
                <label class="flex items-center gap-2.5 text-sm font-semibold text-gray-800 cursor-pointer">
                    <input type="checkbox" name="is_video" value="1" {{ old('is_video') ? 'checked' : '' }} class="w-4 h-4 rounded text-[#820003] focus:ring-[#820003]">
                    <span>Tampilkan sebagai Video Reels Highlight (9:16)</span>
                </label>
                <label class="flex items-center gap-2.5 text-sm font-semibold text-gray-800 cursor-pointer">
                    <input type="checkbox" name="is_featured" value="1" {{ old('is_featured', true) ? 'checked' : '' }} class="w-4 h-4 rounded text-[#820003] focus:ring-[#820003]">
                    <span>Tampilkan di Halaman Detail Layanan (Featured)</span>
                </label>
            </div>

            <div class="flex items-center gap-4 pt-4 border-t border-gray-100">
                <button type="submit" class="px-6 py-3 rounded-xl bg-[#820003] text-white font-bold text-sm hover:bg-[#ba1a15]">
                    Simpan Project & Katalog
                </button>
                <a href="{{ route('admin.projects.index') }}" class="text-xs font-bold text-gray-600 hover:underline">
                    Batal
                </a>
            </div>
        </form>
    </div>
@endsection
