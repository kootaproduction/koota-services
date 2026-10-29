@extends('layouts.admin')

@section('title', 'Edit Project - Admin KOOTA SERVICES')
@section('page_title', 'Edit Project: ' . $project->title)

@section('content')
    <div class="max-w-4xl bg-white p-8 rounded-3xl border border-gray-200 shadow-sm space-y-6" x-data="{ mainPreview: '{{ $project->image }}', videoUrl: '{{ $project->video_url }}' }">
        <form action="{{ route('admin.projects.update', $project->id) }}" method="POST" enctype="multipart/form-data" class="space-y-6">
            @csrf
            @method('PUT')

            <div class="space-y-2">
                <label class="block text-xs font-bold uppercase text-gray-700">Judul Project</label>
                <input type="text" name="title" value="{{ old('title', $project->title) }}" required class="w-full px-4 py-3 rounded-xl border border-gray-300 focus:ring-2 focus:ring-[#820003] text-sm">
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div class="space-y-2">
                    <label class="block text-xs font-bold uppercase text-gray-700">Layanan Terkait</label>
                    <select name="service_id" class="w-full px-4 py-3 rounded-xl border border-gray-300 focus:ring-2 focus:ring-[#820003] text-sm bg-white">
                        <option value="">-- Pilih Layanan Terkait --</option>
                        @foreach($services as $s)
                            <option value="{{ $s->id }}" {{ $project->service_id == $s->id ? 'selected' : '' }}>{{ $s->title }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="space-y-2">
                    <label class="block text-xs font-bold uppercase text-gray-700">Kategori Filter (Tersinkronisasi)</label>
                    <select name="category_name" required class="w-full px-4 py-3 rounded-xl border border-gray-300 focus:ring-2 focus:ring-[#820003] text-sm bg-white">
                        @foreach($categories as $cat)
                            <option value="{{ $cat }}" {{ (old('category_name', $project->category_name) === $cat || $project->category_name === $cat) ? 'selected' : '' }}>{{ $cat }}</option>
                        @endforeach
                    </select>
                </div>
            </div>

            <!-- Metadata Info (Client, Location, Completion Date) -->
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                <div class="space-y-2">
                    <label class="block text-xs font-bold uppercase text-gray-700">Nama Klien / Instansi</label>
                    <input type="text" name="client" value="{{ old('client', $project->client) }}" placeholder="PT Graha Pratama / Pribadi" class="w-full px-4 py-3 rounded-xl border border-gray-300 focus:ring-2 focus:ring-[#820003] text-sm">
                </div>
                <div class="space-y-2">
                    <label class="block text-xs font-bold uppercase text-gray-700">Lokasi Proyek</label>
                    <input type="text" name="location" value="{{ old('location', $project->location) }}" placeholder="Surabaya / Malang / Bali / Jakarta" class="w-full px-4 py-3 rounded-xl border border-gray-300 focus:ring-2 focus:ring-[#820003] text-sm">
                </div>
                <div class="space-y-2">
                    <label class="block text-xs font-bold uppercase text-gray-700">Waktu Selesai</label>
                    <input type="text" name="completion_date" value="{{ old('completion_date', $project->completion_date) }}" placeholder="Agustus 2024" class="w-full px-4 py-3 rounded-xl border border-gray-300 focus:ring-2 focus:ring-[#820003] text-sm">
                </div>
            </div>

            <div class="space-y-2">
                <label class="block text-xs font-bold uppercase text-gray-700">Deskripsi Lengkap Project</label>
                <textarea name="description" rows="3" class="w-full px-4 py-3 rounded-xl border border-gray-300 focus:ring-2 focus:ring-[#820003] text-sm">{{ old('description', $project->description) }}</textarea>
            </div>

            <!-- Main Image Upload & Preview -->
            <div class="space-y-3">
                <label class="block text-xs font-bold uppercase text-gray-700">Gambar Utama Project (Upload File Baru / URL)</label>
                <div class="p-4 rounded-2xl border-2 border-dashed border-gray-300 bg-gray-50 space-y-3">
                    <div class="h-48 w-full rounded-xl overflow-hidden border border-gray-200 relative">
                        <img :src="mainPreview" alt="Preview Gambar Utama" class="w-full h-full object-cover">
                    </div>
                    
                    <div class="space-y-2">
                        <p class="text-xs font-bold text-gray-700">Ganti dengan File Baru:</p>
                        <input type="file" name="image_file" accept="image/*" @change="mainPreview = URL.createObjectURL($event.target.files[0])" class="text-xs text-gray-600 w-full">
                    </div>

                    <div class="space-y-1 pt-2 border-t border-gray-200">
                        <p class="text-[11px] text-gray-400">Atau ubah link URL gambar utama:</p>
                        <input type="text" name="image_url" value="{{ $project->image }}" @input="mainPreview = $event.target.value" class="w-full px-4 py-2 rounded-lg border border-gray-300 text-xs">
                    </div>
                </div>
            </div>

            <!-- Multi-Photo Gallery Upload for Catalog (Point 11) -->
            <div class="space-y-3">
                <label class="block text-xs font-bold uppercase text-gray-700">Katalog Foto Tambahan (Galeri Proyek Lengkap)</label>
                
                @if(!empty($project->gallery_images) && count($project->gallery_images) > 0)
                    <div class="space-y-2">
                        <p class="text-xs font-semibold text-gray-600">Foto Katalog yang Sudah Ada:</p>
                        <div class="flex flex-wrap gap-2.5">
                            @foreach($project->gallery_images as $gImg)
                                <div class="w-20 h-20 rounded-xl overflow-hidden border border-gray-300 relative shadow-2xs">
                                    <img src="{{ $gImg }}" alt="Gallery Item" class="w-full h-full object-cover">
                                </div>
                            @endforeach
                        </div>
                    </div>
                @endif

                <div class="p-4 rounded-2xl border border-gray-200 bg-gray-50 space-y-3">
                    <p class="text-xs text-gray-700 font-bold">Unggah Foto Tambahan Baru:</p>
                    <input type="file" name="gallery_files[]" multiple accept="image/*" class="text-xs text-gray-600 w-full">
                    <p class="text-[11px] text-gray-400">Atau tambahkan URL foto baru (1 URL per baris):</p>
                    <textarea name="gallery_urls" rows="3" placeholder="https://image1.jpg&#10;https://image2.jpg" class="w-full px-4 py-2 rounded-lg border border-gray-300 text-xs font-mono"></textarea>
                </div>
            </div>

            <!-- Video Section: YouTube Shorts / Instagram Reels (Point 9 & Image 4) -->
            <div class="space-y-3 pt-2 border-t border-gray-200">
                <label class="block text-xs font-bold uppercase text-gray-700">Video Reels / YouTube Shorts (Format Vertikal 9:16)</label>
                <div class="space-y-2">
                    <input type="text" name="video_url" value="{{ old('video_url', $project->video_url) }}" x-model="videoUrl" placeholder="Contoh: https://www.youtube.com/shorts/VIDEO_ID" class="w-full px-4 py-3 rounded-xl border border-gray-300 focus:ring-2 focus:ring-[#820003] text-sm">
                    <p class="text-[11px] text-gray-500">Mendukung format YouTube Shorts, YouTube Video biasa, Instagram Reels, dan link MP4 langsung.</p>
                </div>
            </div>

            <div class="flex flex-wrap items-center gap-6 pt-2">
                <label class="flex items-center gap-2.5 text-sm font-semibold text-gray-800 cursor-pointer">
                    <input type="checkbox" name="is_video" value="1" {{ $project->is_video ? 'checked' : '' }} class="w-4 h-4 rounded text-[#820003] focus:ring-[#820003]">
                    <span>Tampilkan sebagai Video Reels Highlight (9:16)</span>
                </label>
                <label class="flex items-center gap-2.5 text-sm font-semibold text-gray-800 cursor-pointer">
                    <input type="checkbox" name="is_featured" value="1" {{ $project->is_featured ? 'checked' : '' }} class="w-4 h-4 rounded text-[#820003] focus:ring-[#820003]">
                    <span>Tampilkan di Halaman Detail Layanan (Featured)</span>
                </label>
            </div>

            <div class="flex items-center gap-4 pt-4 border-t border-gray-100">
                <button type="submit" class="px-6 py-3 rounded-xl bg-[#820003] text-white font-bold text-sm hover:bg-[#ba1a15]">
                    Perbarui Project & Katalog
                </button>
                <a href="{{ route('admin.projects.index') }}" class="text-xs font-bold text-gray-600 hover:underline">
                    Batal
                </a>
            </div>
        </form>
    </div>
@endsection
