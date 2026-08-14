@extends('layouts.admin')

@section('title', 'Tambah Layanan - Admin KOOTA SERVICE')
@section('page_title', 'Tambah Layanan Baru')

@section('content')
    <div class="max-w-3xl bg-white p-8 rounded-2xl border border-gray-200 shadow-xs space-y-6">
        <form action="{{ route('admin.services.store') }}" method="POST" enctype="multipart/form-data" class="space-y-6">
            @csrf

            <div class="space-y-2">
                <label class="block text-xs font-bold uppercase text-gray-700">Nama Layanan (Judul)</label>
                <input type="text" name="title" value="{{ old('title') }}" required placeholder="Contoh: Cleaning Service" class="w-full px-4 py-3 rounded-xl border border-gray-300 focus:ring-2 focus:ring-[#ac0c0c] text-sm">
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div class="space-y-2">
                    <label class="block text-xs font-bold uppercase text-gray-700">Kategori</label>
                    <select name="category" class="w-full px-4 py-3 rounded-xl border border-gray-300 focus:ring-2 focus:ring-[#ac0c0c] text-sm bg-white">
                        <option value="facility_care">Facility Care (Red Theme)</option>
                        <option value="sustainability">Sustainability (Green Theme)</option>
                    </select>
                </div>

                <div class="space-y-2">
                    <label class="block text-xs font-bold uppercase text-gray-700">Badge Label</label>
                    <input type="text" name="badge_label" value="{{ old('badge_label', 'Facility Care Services') }}" class="w-full px-4 py-3 rounded-xl border border-gray-300 focus:ring-2 focus:ring-[#ac0c0c] text-sm">
                </div>
            </div>

            <div class="space-y-2">
                <label class="block text-xs font-bold uppercase text-gray-700">Subtitle Singkat</label>
                <input type="text" name="subtitle" value="{{ old('subtitle') }}" placeholder="Ringkasan singkat layanan..." class="w-full px-4 py-3 rounded-xl border border-gray-300 focus:ring-2 focus:ring-[#ac0c0c] text-sm">
            </div>

            <div class="space-y-2">
                <label class="block text-xs font-bold uppercase text-gray-700">Deskripsi Lengkap Hero</label>
                <textarea name="description" rows="4" class="w-full px-4 py-3 rounded-xl border border-gray-300 focus:ring-2 focus:ring-[#ac0c0c] text-sm">{{ old('description') }}</textarea>
            </div>

            <div class="space-y-2">
                <label class="block text-xs font-bold uppercase text-gray-700">Gambar Hero Banner (URL / File)</label>
                <input type="text" name="hero_image_url" placeholder="https://images.unsplash.com/..." class="w-full px-4 py-3 rounded-xl border border-gray-300 focus:ring-2 focus:ring-[#ac0c0c] text-sm mb-2">
                <input type="file" name="hero_image_file" class="text-xs text-gray-600">
            </div>

            <div class="grid grid-cols-2 gap-6">
                <div class="space-y-2">
                    <label class="block text-xs font-bold uppercase text-gray-700">Teks Tombol CTA</label>
                    <input type="text" name="hero_cta_text" value="{{ old('hero_cta_text', 'Konsultasi Sekarang') }}" class="w-full px-4 py-3 rounded-xl border border-gray-300 focus:ring-2 focus:ring-[#ac0c0c] text-sm">
                </div>
                <div class="space-y-2">
                    <label class="block text-xs font-bold uppercase text-gray-700">Urutan Tampil</label>
                    <input type="number" name="order" value="{{ old('order', 1) }}" class="w-full px-4 py-3 rounded-xl border border-gray-300 focus:ring-2 focus:ring-[#ac0c0c] text-sm">
                </div>
            </div>

            <div class="flex items-center gap-4 pt-4">
                <button type="submit" class="px-6 py-3 rounded-xl bg-[#ac0c0c] text-white font-bold text-sm hover:bg-[#820003]">
                    Simpan Layanan
                </button>
                <a href="{{ route('admin.services.index') }}" class="text-xs font-bold text-gray-600 hover:underline">
                    Batal
                </a>
            </div>
        </form>
    </div>
@endsection
