@extends('layouts.admin')

@section('title', 'Tambah Project - Admin KOOTA SERVICE')
@section('page_title', 'Tambah Project Baru')

@section('content')
    <div class="max-w-3xl bg-white p-8 rounded-2xl border border-gray-200 shadow-xs space-y-6">
        <form action="{{ route('admin.projects.store') }}" method="POST" enctype="multipart/form-data" class="space-y-6">
            @csrf

            <div class="space-y-2">
                <label class="block text-xs font-bold uppercase text-gray-700">Judul Project</label>
                <input type="text" name="title" value="{{ old('title') }}" required placeholder="Contoh: Project Office Cleaning Gedung A" class="w-full px-4 py-3 rounded-xl border border-gray-300 focus:ring-2 focus:ring-[#ac0c0c] text-sm">
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div class="space-y-2">
                    <label class="block text-xs font-bold uppercase text-gray-700">Layanan Terkait</label>
                    <select name="service_id" class="w-full px-4 py-3 rounded-xl border border-gray-300 focus:ring-2 focus:ring-[#ac0c0c] text-sm bg-white">
                        <option value="">-- Pilih Layanan --</option>
                        @foreach($services as $s)
                            <option value="{{ $s->id }}">{{ $s->title }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="space-y-2">
                    <label class="block text-xs font-bold uppercase text-gray-700">Nama Kategori Filter</label>
                    <input type="text" name="category_name" value="{{ old('category_name', 'Office Cleaning') }}" placeholder="Office Cleaning / Maintenance Rutin..." required class="w-full px-4 py-3 rounded-xl border border-gray-300 focus:ring-2 focus:ring-[#ac0c0c] text-sm">
                </div>
            </div>

            <div class="space-y-2">
                <label class="block text-xs font-bold uppercase text-gray-700">Deskripsi Project</label>
                <textarea name="description" rows="3" class="w-full px-4 py-3 rounded-xl border border-gray-300 focus:ring-2 focus:ring-[#ac0c0c] text-sm">{{ old('description') }}</textarea>
            </div>

            <div class="space-y-2">
                <label class="block text-xs font-bold uppercase text-gray-700">Gambar (URL / Upload File)</label>
                <input type="text" name="image_url" placeholder="https://images.unsplash.com/..." class="w-full px-4 py-3 rounded-xl border border-gray-300 focus:ring-2 focus:ring-[#ac0c0c] text-sm mb-2">
                <input type="file" name="image_file" class="text-xs text-gray-600">
            </div>

            <div class="space-y-2">
                <label class="block text-xs font-bold uppercase text-gray-700">Video Highlight URL (Opsional)</label>
                <input type="text" name="video_url" placeholder="https://www.youtube.com/watch?v=..." class="w-full px-4 py-3 rounded-xl border border-gray-300 focus:ring-2 focus:ring-[#ac0c0c] text-sm">
            </div>

            <div class="flex items-center gap-6">
                <label class="flex items-center gap-2 text-sm font-semibold text-gray-800">
                    <input type="checkbox" name="is_video" value="1" class="rounded text-[#ac0c0c] focus:ring-[#ac0c0c]">
                    <span>Project Tipe Video Highlight</span>
                </label>
                <label class="flex items-center gap-2 text-sm font-semibold text-gray-800">
                    <input type="checkbox" name="is_featured" value="1" checked class="rounded text-[#ac0c0c] focus:ring-[#ac0c0c]">
                    <span>Tampilkan di Detail Layanan (Featured)</span>
                </label>
            </div>

            <div class="flex items-center gap-4 pt-4">
                <button type="submit" class="px-6 py-3 rounded-xl bg-[#ac0c0c] text-white font-bold text-sm hover:bg-[#820003]">
                    Simpan Project
                </button>
                <a href="{{ route('admin.projects.index') }}" class="text-xs font-bold text-gray-600 hover:underline">
                    Batal
                </a>
            </div>
        </form>
    </div>
@endsection
