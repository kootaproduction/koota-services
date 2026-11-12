@extends('layouts.admin')

@section('title', 'Tambah Transformasi Before-After - Admin KOOTA SERVICES')
@section('page_title', 'Tambah Transformasi Before & After')

@section('content')
<div class="max-w-4xl space-y-6">
    <div class="flex items-center justify-between">
        <div>
            <h2 class="text-lg font-bold text-gray-900">Formulir Dokumentasi Sebelum & Sesudah</h2>
            <p class="text-xs text-gray-500">Unggah foto kondisi awal (Before) dan kondisi setelah pengerjaan KOOTA (After).</p>
        </div>
        <a href="{{ route('admin.transformations.index') }}" class="text-xs font-bold text-gray-600 hover:text-gray-900 underline">
            &larr; Kembali ke Daftar
        </a>
    </div>

    <div class="bg-white p-8 rounded-2xl border border-gray-200 shadow-2xs space-y-6">
        <form action="{{ route('admin.transformations.store') }}" method="POST" enctype="multipart/form-data" class="space-y-6">
            @csrf

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
                    <input type="text" name="title" value="{{ old('title') }}" required placeholder="Contoh: Kuras Toren Air Berlumut Tebal 1.500L" class="w-full px-4 py-3 rounded-xl border border-gray-300 focus:ring-2 focus:ring-[#ac0c0c] focus:border-transparent text-sm">
                </div>

                <div class="space-y-2">
                    <label class="block text-xs font-bold uppercase text-gray-700 tracking-wider">
                        Kategori Layanan <span class="text-red-500">*</span>
                    </label>
                    <select name="category" required class="w-full px-4 py-3 rounded-xl border border-gray-300 focus:ring-2 focus:ring-[#ac0c0c] focus:border-transparent text-sm">
                        @foreach($categories as $cat)
                            <option value="{{ $cat }}" {{ old('category') === $cat ? 'selected' : '' }}>{{ $cat }}</option>
                        @endforeach
                    </select>
                </div>
            </div>

            <!-- Upload Foto Before & After -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6 p-5 rounded-2xl bg-neutral-50 border border-neutral-200">
                <!-- Foto Sebelum (Before) -->
                <div class="space-y-3">
                    <div class="flex items-center justify-between">
                        <label class="block text-xs font-bold uppercase text-red-800 tracking-wider">
                            1. Foto Sebelum (BEFORE) <span class="text-red-500">*</span>
                        </label>
                        <span class="text-[10px] text-gray-400">Maks. 10MB (JPG/PNG)</span>
                    </div>
                    <input type="file" name="image_before_file" accept="image/*" class="w-full text-xs text-gray-600 file:mr-4 file:py-2.5 file:px-4 file:rounded-xl file:border-0 file:text-xs file:font-bold file:bg-red-100 file:text-red-800 hover:file:bg-red-200 cursor-pointer">
                    <p class="text-[11px] text-gray-400">Atau gunakan URL gambar luar:</p>
                    <input type="url" name="image_before_url" value="{{ old('image_before_url') }}" placeholder="https://..." class="w-full px-3 py-2 rounded-lg border border-gray-300 text-xs">
                </div>

                <!-- Foto Sesudah (After) -->
                <div class="space-y-3">
                    <div class="flex items-center justify-between">
                        <label class="block text-xs font-bold uppercase text-emerald-800 tracking-wider">
                            2. Foto Sesudah (AFTER) <span class="text-red-500">*</span>
                        </label>
                        <span class="text-[10px] text-gray-400">Maks. 10MB (JPG/PNG)</span>
                    </div>
                    <input type="file" name="image_after_file" accept="image/*" class="w-full text-xs text-gray-600 file:mr-4 file:py-2.5 file:px-4 file:rounded-xl file:border-0 file:text-xs file:font-bold file:bg-emerald-100 file:text-emerald-800 hover:file:bg-emerald-200 cursor-pointer">
                    <p class="text-[11px] text-gray-400">Atau gunakan URL gambar luar:</p>
                    <input type="url" name="image_after_url" value="{{ old('image_after_url') }}" placeholder="https://..." class="w-full px-3 py-2 rounded-lg border border-gray-300 text-xs">
                </div>
            </div>

            <!-- Deskripsi & Keterangan -->
            <div class="space-y-2">
                <label class="block text-xs font-bold uppercase text-gray-700 tracking-wider">
                    Deskripsi Masalah & Solusi KOOTA
                </label>
                <textarea name="description" rows="3" placeholder="Ceritakan kondisi sebelum ditangani, metode chemical/alat yang dipakai, dan kepuasan hasil pengerjaan..." class="w-full px-4 py-3 rounded-xl border border-gray-300 focus:ring-2 focus:ring-[#ac0c0c] focus:border-transparent text-sm">{{ old('description') }}</textarea>
            </div>

            <!-- Lokasi & Durasi & Urutan -->
            <div class="grid grid-cols-1 sm:grid-cols-3 gap-6">
                <div class="space-y-2">
                    <label class="block text-xs font-bold uppercase text-gray-700 tracking-wider">Lokasi / Kota</label>
                    <input type="text" name="location" value="{{ old('location', 'Surabaya') }}" placeholder="Contoh: Surabaya Barat, Bali, Malang" class="w-full px-4 py-3 rounded-xl border border-gray-300 focus:ring-2 focus:ring-[#ac0c0c] focus:border-transparent text-sm">
                </div>

                <div class="space-y-2">
                    <label class="block text-xs font-bold uppercase text-gray-700 tracking-wider">Durasi Pengerjaan</label>
                    <input type="text" name="duration" value="{{ old('duration', '3 Jam Pengerjaan') }}" placeholder="Contoh: 3 Jam, 1 Hari" class="w-full px-4 py-3 rounded-xl border border-gray-300 focus:ring-2 focus:ring-[#ac0c0c] focus:border-transparent text-sm">
                </div>

                <div class="space-y-2">
                    <label class="block text-xs font-bold uppercase text-gray-700 tracking-wider">Urutan Tampil</label>
                    <input type="number" name="order" value="{{ old('order', $maxOrder) }}" min="1" class="w-full px-4 py-3 rounded-xl border border-gray-300 focus:ring-2 focus:ring-[#ac0c0c] focus:border-transparent text-sm">
                </div>
            </div>

            <!-- Checkbox Unggulan -->
            <div class="pt-2">
                <label class="inline-flex items-center gap-3 cursor-pointer">
                    <input type="checkbox" name="is_featured" value="1" {{ old('is_featured', '1') == '1' ? 'checked' : '' }} class="w-4 h-4 text-[#ac0c0c] border-gray-300 rounded focus:ring-[#ac0c0c]">
                    <span class="text-sm font-bold text-gray-800">Tampilkan sebagai Transformasi Unggulan di Halaman Utama (Homepage)</span>
                </label>
            </div>

            <!-- Submit Buttons -->
            <div class="flex items-center gap-4 pt-4 border-t border-gray-100">
                <button type="submit" class="px-7 py-3 rounded-xl bg-[#ac0c0c] text-white font-bold text-sm hover:bg-[#8f0a0a] transition-colors shadow-sm">
                    Simpan Transformasi
                </button>
                <a href="{{ route('admin.transformations.index') }}" class="px-5 py-3 rounded-xl bg-gray-100 text-gray-700 font-bold text-sm hover:bg-gray-200 transition-colors">
                    Batal
                </a>
            </div>
        </form>
    </div>
</div>
@endsection

