@extends('layouts.admin')

@section('title', 'Edit Layanan - Admin KOOTA SERVICE')
@section('page_title', 'Edit Layanan')

@section('content')
    <div class="max-w-3xl bg-white p-8 rounded-2xl border border-gray-200 shadow-xs space-y-6">
        <form action="{{ route('admin.services.update', $service->id) }}" method="POST" enctype="multipart/form-data" class="space-y-6">
            @csrf
            @method('PUT')

            <div class="space-y-2">
                <label class="block text-xs font-bold uppercase text-gray-700">Nama Layanan (Judul)</label>
                <input type="text" name="title" value="{{ old('title', $service->title) }}" required class="w-full px-4 py-3 rounded-xl border border-gray-300 focus:ring-2 focus:ring-[#ac0c0c] text-sm">
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div class="space-y-2">
                    <label class="block text-xs font-bold uppercase text-gray-700">Kategori</label>
                    <select name="category" class="w-full px-4 py-3 rounded-xl border border-gray-300 focus:ring-2 focus:ring-[#ac0c0c] text-sm bg-white">
                        <option value="facility_care" {{ $service->category === 'facility_care' ? 'selected' : '' }}>Facility Care (Red Theme)</option>
                        <option value="sustainability" {{ $service->category === 'sustainability' ? 'selected' : '' }}>Sustainability (Green Theme)</option>
                    </select>
                </div>

                <div class="space-y-2">
                    <label class="block text-xs font-bold uppercase text-gray-700">Badge Label</label>
                    <input type="text" name="badge_label" value="{{ old('badge_label', $service->badge_label) }}" class="w-full px-4 py-3 rounded-xl border border-gray-300 focus:ring-2 focus:ring-[#ac0c0c] text-sm">
                </div>
            </div>

            <div class="space-y-2">
                <label class="block text-xs font-bold uppercase text-gray-700">Subtitle Singkat</label>
                <input type="text" name="subtitle" value="{{ old('subtitle', $service->subtitle) }}" class="w-full px-4 py-3 rounded-xl border border-gray-300 focus:ring-2 focus:ring-[#ac0c0c] text-sm">
            </div>

            <div class="space-y-2">
                <label class="block text-xs font-bold uppercase text-gray-700">Deskripsi Lengkap Hero</label>
                <textarea name="description" rows="4" class="w-full px-4 py-3 rounded-xl border border-gray-300 focus:ring-2 focus:ring-[#ac0c0c] text-sm">{{ old('description', $service->description) }}</textarea>
            </div>

            <div class="space-y-2">
                <label class="block text-xs font-bold uppercase text-gray-700">Gambar Hero Banner (URL / Upload Baru)</label>
                <input type="text" name="hero_image_url" value="{{ $service->hero_image }}" class="w-full px-4 py-3 rounded-xl border border-gray-300 focus:ring-2 focus:ring-[#ac0c0c] text-sm mb-2">
                <input type="file" name="hero_image_file" class="text-xs text-gray-600">
            </div>

            <div class="grid grid-cols-2 gap-6">
                <div class="space-y-2">
                    <label class="block text-xs font-bold uppercase text-gray-700">Teks Tombol CTA</label>
                    <input type="text" name="hero_cta_text" value="{{ old('hero_cta_text', $service->hero_cta_text) }}" class="w-full px-4 py-3 rounded-xl border border-gray-300 focus:ring-2 focus:ring-[#ac0c0c] text-sm">
                </div>
                <div class="space-y-2">
                    <label class="block text-xs font-bold uppercase text-gray-700">Urutan Tampil</label>
                    <input type="number" name="order" value="{{ old('order', $service->order) }}" class="w-full px-4 py-3 rounded-xl border border-gray-300 focus:ring-2 focus:ring-[#ac0c0c] text-sm">
                </div>
            </div>

            <div class="flex items-center gap-4 pt-4">
                <button type="submit" class="px-6 py-3 rounded-xl bg-[#ac0c0c] text-white font-bold text-sm hover:bg-[#820003]">
                    Perbarui Layanan
                </button>
                <a href="{{ route('admin.services.index') }}" class="text-xs font-bold text-gray-600 hover:underline">
                    Batal
                </a>
            </div>
        </form>
    </div>
@endsection
