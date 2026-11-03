@extends('layouts.admin')

@section('title', 'Edit Transformasi Before-After - Admin KOOTA SERVICES')
@section('page_title', 'Edit Transformasi Before & After')

@section('content')
<div class="max-w-4xl space-y-6">
    <div class="flex items-center justify-between">
        <div>
            <h2 class="text-lg font-bold text-gray-900">Perbarui Dokumentasi Before & After</h2>
            <p class="text-xs text-gray-500">Edit informasi atau ganti foto perbandingan pengerjaan.</p>
        </div>
        <a href="{{ route('admin.transformations.index') }}" class="text-xs font-bold text-gray-600 hover:text-gray-900 underline">
            &larr; Kembali ke Daftar
        </a>
    </div>

    <div class="bg-white p-8 rounded-2xl border border-gray-200 shadow-2xs space-y-6">
        <form action="{{ route('admin.transformations.update', $transformation->id) }}" method="POST" enctype="multipart/form-data" class="space-y-6">
            @csrf
            @method('PUT')

            @if($errors->any())
                <div class="p-4 rounded-xl bg-red-50 border border-red-200 text-red-800 text-xs">
                    <ul class="list-disc list-inside space-y-1 font-semibold">
                        @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <!-- Judul & Kategori -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div class="space-y-2">
                    <label class="block text-xs font-bold uppercase text-gray-700 tracking-wider">
                        Judul Transformasi / Pekerjaan <span class="text-red-500">*</span>
                    </label>
                    <input type="text" name="title" value="{{ old('title', $transformation->title) }}" required class="w-full px-4 py-3 rounded-xl border border-gray-300 focus:ring-2 focus:ring-[#820003] focus:border-transparent text-sm">
                </div>

                <div class="space-y-2">
                    <label class="block text-xs font-bold uppercase text-gray-700 tracking-wider">
                        Kategori Layanan <span class="text-red-500">*</span>
                    </label>
                    <select name="category" required class="w-full px-4 py-3 rounded-xl border border-gray-300 focus:ring-2 focus:ring-[#820003] focus:border-transparent text-sm">
                        @foreach($categories as $cat)
                            <option value="{{ $cat }}" {{ old('category', $transformation->category) === $cat ? 'selected' : '' }}>{{ $cat }}</option>
                        @endforeach
                    </select>
                </div>
            </div>

            <!-- Upload Foto Before & After dengan Preview -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6 p-5 rounded-2xl bg-neutral-50 border border-neutral-200">
                <!-- Foto Sebelum (Before) -->
                <div class="space-y-3">
                    <div class="flex items-center justify-between">
                        <label class="block text-xs font-bold uppercase text-red-800 tracking-wider">
                            1. Foto Sebelum (BEFORE)
                        </label>
                        <span class="text-[10px] text-gray-400">Pratinjau Saat Ini:</span>
                    </div>
                    @if($transformation->image_before)
                        <div class="h-32 w-full rounded-xl overflow-hidden border border-red-200 bg-gray-900 relative">
                            <img src="{{ $transformation->image_before }}" class="w-full h-full object-cover">
                            <span class="absolute top-2 left-2 px-2 py-0.5 rounded text-[10px] font-extrabold bg-red-600 text-white">BEFORE</span>
                        </div>
                    @endif
                    <input type="file" name="image_before_file" accept="image/*" class="w-full text-xs text-gray-600 file:mr-4 file:py-2 file:px-4 file:rounded-xl file:border-0 file:text-xs file:font-bold file:bg-red-100 file:text-red-800 hover:file:bg-red-200 cursor-pointer">
                    <input type="url" name="image_before_url" value="{{ old('image_before_url', $transformation->image_before) }}" placeholder="Atau ganti URL gambar..." class="w-full px-3 py-2 rounded-lg border border-gray-300 text-xs">
                </div>

                <!-- Foto Sesudah (After) -->
                <div class="space-y-3">
                    <div class="flex items-center justify-between">
                        <label class="block text-xs font-bold uppercase text-emerald-800 tracking-wider">
                            2. Foto Sesudah (AFTER)
                        </label>
                        <span class="text-[10px] text-gray-400">Pratinjau Saat Ini:</span>
                    </div>
                    @if($transformation->image_after)
                        <div class="h-32 w-full rounded-xl overflow-hidden border border-emerald-200 bg-gray-900 relative">
                            <img src="{{ $transformation->image_after }}" class="w-full h-full object-cover">
                            <span class="absolute top-2 right-2 px-2 py-0.5 rounded text-[10px] font-extrabold bg-emerald-600 text-white">AFTER</span>
                        </div>
                    @endif
                    <input type="file" name="image_after_file" accept="image/*" class="w-full text-xs text-gray-600 file:mr-4 file:py-2 file:px-4 file:rounded-xl file:border-0 file:text-xs file:font-bold file:bg-emerald-100 file:text-emerald-800 hover:file:bg-emerald-200 cursor-pointer">
                    <input type="url" name="image_after_url" value="{{ old('image_after_url', $transformation->image_after) }}" placeholder="Atau ganti URL gambar..." class="w-full px-3 py-2 rounded-lg border border-gray-300 text-xs">
                </div>
            </div>

            <!-- Deskripsi & Keterangan -->
            <div class="space-y-2">
                <label class="block text-xs font-bold uppercase text-gray-700 tracking-wider">
                    Deskripsi Masalah & Solusi KOOTA
                </label>
                <textarea name="description" rows="3" class="w-full px-4 py-3 rounded-xl border border-gray-300 focus:ring-2 focus:ring-[#820003] focus:border-transparent text-sm">{{ old('description', $transformation->description) }}</textarea>
            </div>

            <!-- Lokasi & Durasi & Urutan -->
            <div class="grid grid-cols-1 sm:grid-cols-3 gap-6">
                <div class="space-y-2">
                    <label class="block text-xs font-bold uppercase text-gray-700 tracking-wider">Lokasi / Kota</label>
                    <input type="text" name="location" value="{{ old('location', $transformation->location) }}" class="w-full px-4 py-3 rounded-xl border border-gray-300 focus:ring-2 focus:ring-[#820003] focus:border-transparent text-sm">
                </div>

                <div class="space-y-2">
                    <label class="block text-xs font-bold uppercase text-gray-700 tracking-wider">Durasi Pengerjaan</label>
                    <input type="text" name="duration" value="{{ old('duration', $transformation->duration) }}" class="w-full px-4 py-3 rounded-xl border border-gray-300 focus:ring-2 focus:ring-[#820003] focus:border-transparent text-sm">
                </div>

                <div class="space-y-2">
                    <label class="block text-xs font-bold uppercase text-gray-700 tracking-wider">Urutan Tampil</label>
                    <input type="number" name="order" value="{{ old('order', $transformation->order) }}" min="1" class="w-full px-4 py-3 rounded-xl border border-gray-300 focus:ring-2 focus:ring-[#820003] focus:border-transparent text-sm">
                </div>
            </div>

            <!-- Checkbox Unggulan -->
            <div class="pt-2">
                <label class="inline-flex items-center gap-3 cursor-pointer">
                    <input type="checkbox" name="is_featured" value="1" {{ old('is_featured', $transformation->is_featured ? '1' : '0') == '1' ? 'checked' : '' }} class="w-4 h-4 text-[#820003] border-gray-300 rounded focus:ring-[#820003]">
                    <span class="text-sm font-bold text-gray-800">Tampilkan sebagai Transformasi Unggulan di Halaman Utama (Homepage)</span>
                </label>
            </div>

            <!-- Submit Buttons -->
            <div class="flex items-center gap-4 pt-4 border-t border-gray-100">
                <button type="submit" class="px-7 py-3 rounded-xl bg-[#ac0c0c] text-white font-bold text-sm hover:bg-[#820003] transition-colors shadow-sm">
                    Simpan Perubahan
                </button>
                <a href="{{ route('admin.transformations.index') }}" class="px-5 py-3 rounded-xl bg-gray-100 text-gray-700 font-bold text-sm hover:bg-gray-200 transition-colors">
                    Batal
                </a>
            </div>
        </form>
    </div>
</div>
@endsection

