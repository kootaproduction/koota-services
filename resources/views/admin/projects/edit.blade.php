@extends('layouts.admin')

@section('title', 'Edit Project - Admin KOOTA SERVICE')
@section('page_title', 'Edit Project')

@section('content')
    <div class="max-w-3xl bg-white p-8 rounded-2xl border border-gray-200 shadow-xs space-y-6">
        <form action="{{ route('admin.projects.update', $project->id) }}" method="POST" enctype="multipart/form-data" class="space-y-6">
            @csrf
            @method('PUT')

            <div class="space-y-2">
                <label class="block text-xs font-bold uppercase text-gray-700">Judul Project</label>
                <input type="text" name="title" value="{{ old('title', $project->title) }}" required class="w-full px-4 py-3 rounded-xl border border-gray-300 focus:ring-2 focus:ring-[#ac0c0c] text-sm">
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div class="space-y-2">
                    <label class="block text-xs font-bold uppercase text-gray-700">Layanan Terkait</label>
                    <select name="service_id" class="w-full px-4 py-3 rounded-xl border border-gray-300 focus:ring-2 focus:ring-[#ac0c0c] text-sm bg-white">
                        <option value="">-- Pilih Layanan --</option>
                        @foreach($services as $s)
                            <option value="{{ $s->id }}" {{ $project->service_id == $s->id ? 'selected' : '' }}>{{ $s->title }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="space-y-2">
                    <label class="block text-xs font-bold uppercase text-gray-700">Nama Kategori Filter</label>
                    <input type="text" name="category_name" value="{{ old('category_name', $project->category_name) }}" required class="w-full px-4 py-3 rounded-xl border border-gray-300 focus:ring-2 focus:ring-[#ac0c0c] text-sm">
                </div>
            </div>

            <div class="space-y-2">
                <label class="block text-xs font-bold uppercase text-gray-700">Deskripsi Project</label>
                <textarea name="description" rows="3" class="w-full px-4 py-3 rounded-xl border border-gray-300 focus:ring-2 focus:ring-[#ac0c0c] text-sm">{{ old('description', $project->description) }}</textarea>
            </div>

            <div class="space-y-2">
                <label class="block text-xs font-bold uppercase text-gray-700">Gambar (URL / Upload Baru)</label>
                <input type="text" name="image_url" value="{{ $project->image }}" class="w-full px-4 py-3 rounded-xl border border-gray-300 focus:ring-2 focus:ring-[#ac0c0c] text-sm mb-2">
                <input type="file" name="image_file" class="text-xs text-gray-600">
            </div>

            <div class="space-y-2">
                <label class="block text-xs font-bold uppercase text-gray-700">Video Highlight URL (Opsional)</label>
                <input type="text" name="video_url" value="{{ old('video_url', $project->video_url) }}" class="w-full px-4 py-3 rounded-xl border border-gray-300 focus:ring-2 focus:ring-[#ac0c0c] text-sm">
            </div>

            <div class="flex items-center gap-6">
                <label class="flex items-center gap-2 text-sm font-semibold text-gray-800">
                    <input type="checkbox" name="is_video" value="1" {{ $project->is_video ? 'checked' : '' }} class="rounded text-[#ac0c0c] focus:ring-[#ac0c0c]">
                    <span>Project Tipe Video Highlight</span>
                </label>
                <label class="flex items-center gap-2 text-sm font-semibold text-gray-800">
                    <input type="checkbox" name="is_featured" value="1" {{ $project->is_featured ? 'checked' : '' }} class="rounded text-[#ac0c0c] focus:ring-[#ac0c0c]">
                    <span>Tampilkan di Detail Layanan (Featured)</span>
                </label>
            </div>

            <div class="flex items-center gap-4 pt-4">
                <button type="submit" class="px-6 py-3 rounded-xl bg-[#ac0c0c] text-white font-bold text-sm hover:bg-[#820003]">
                    Perbarui Project
                </button>
                <a href="{{ route('admin.projects.index') }}" class="text-xs font-bold text-gray-600 hover:underline">
                    Batal
                </a>
            </div>
        </form>
    </div>
@endsection
