@extends('layouts.admin')

@section('title', 'Tambah Layanan - Admin KOOTA SERVICES')
@section('page_title', 'Tambah Layanan Baru')

@section('content')
    <div class="max-w-3xl bg-white p-8 rounded-3xl border border-gray-200 shadow-sm space-y-6" x-data="{ previewUrl: '' }">
        <form action="{{ route('admin.services.store') }}" method="POST" enctype="multipart/form-data" class="space-y-6">
            @csrf

            <div class="space-y-2">
                <label class="block text-xs font-bold uppercase text-gray-700">Nama Layanan (Judul)</label>
                <input type="text" name="title" value="{{ old('title') }}" required placeholder="Contoh: Pembersihan Rumah" class="w-full px-4 py-3 rounded-xl border border-gray-300 focus:ring-2 focus:ring-[#820003] text-sm">
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div class="space-y-2">
                    <label class="block text-xs font-bold uppercase text-gray-700">Kategori</label>
                    <select name="category" class="w-full px-4 py-3 rounded-xl border border-gray-300 focus:ring-2 focus:ring-[#820003] text-sm bg-white">
                        <option value="facility_care">Facility Care (Red Palette)</option>
                    </select>
                </div>

                <div class="space-y-2">
                    <label class="block text-xs font-bold uppercase text-gray-700">Badge Label</label>
                    <input type="text" name="badge_label" value="{{ old('badge_label', 'Facility Care Services') }}" class="w-full px-4 py-3 rounded-xl border border-gray-300 focus:ring-2 focus:ring-[#820003] text-sm">
                </div>
            </div>

            <div class="space-y-2">
                <label class="block text-xs font-bold uppercase text-gray-700">Subtitle Singkat</label>
                <input type="text" name="subtitle" value="{{ old('subtitle') }}" placeholder="Ringkasan singkat layanan..." class="w-full px-4 py-3 rounded-xl border border-gray-300 focus:ring-2 focus:ring-[#820003] text-sm">
            </div>

            <div class="space-y-2">
                <label class="block text-xs font-bold uppercase text-gray-700">Deskripsi Lengkap Hero</label>
                <textarea name="description" rows="4" placeholder="Deskripsi lengkap yang tampil di halaman detail..." class="w-full px-4 py-3 rounded-xl border border-gray-300 focus:ring-2 focus:ring-[#820003] text-sm">{{ old('description') }}</textarea>
            </div>

            <!-- Image Upload & Live Preview (Point 9) -->
            <div class="space-y-3">
                <label class="block text-xs font-bold uppercase text-gray-700">Gambar Hero Banner (Upload File atau URL)</label>
                
                <div class="p-4 rounded-2xl border-2 border-dashed border-gray-300 bg-gray-50 space-y-3 text-center">
                    <template x-if="previewUrl">
                        <div class="h-44 w-full rounded-xl overflow-hidden border border-gray-200 relative mb-2">
                            <img :src="previewUrl" alt="Preview Gambar" class="w-full h-full object-cover">
                        </div>
                    </template>
                    
                    <input type="file" name="hero_image_file" accept="image/*" @change="previewUrl = URL.createObjectURL($event.target.files[0])" class="text-xs text-gray-600 w-full">
                    <p class="text-[11px] text-gray-400">Atau masukkan link gambar langsung di bawah ini:</p>
                    <input type="text" name="hero_image_url" @input="previewUrl = $event.target.value" placeholder="https://images.unsplash.com/..." class="w-full px-4 py-2 rounded-lg border border-gray-300 text-xs">
                </div>
            </div>

            <div class="grid grid-cols-2 gap-6">
                <div class="space-y-2">
                    <label class="block text-xs font-bold uppercase text-gray-700">Teks Tombol CTA</label>
                    <input type="text" name="hero_cta_text" value="{{ old('hero_cta_text', 'Konsultasi Sekarang') }}" class="w-full px-4 py-3 rounded-xl border border-gray-300 focus:ring-2 focus:ring-[#820003] text-sm">
                </div>
                <div class="space-y-2">
                    <label class="block text-xs font-bold uppercase text-gray-700">Urutan Tampil</label>
                    <input type="number" name="order" value="{{ old('order', 1) }}" class="w-full px-4 py-3 rounded-xl border border-gray-300 focus:ring-2 focus:ring-[#820003] text-sm">
                </div>
            </div>

            <div class="flex items-center gap-4 pt-4">
                <button type="submit" class="px-6 py-3 rounded-xl bg-[#820003] text-white font-bold text-sm hover:bg-[#ba1a15]">
                    Simpan Layanan
                </button>
                <a href="{{ route('admin.services.index') }}" class="text-xs font-bold text-gray-600 hover:underline">
                    Batal
                </a>
            </div>
        </form>
    </div>
@endsection
