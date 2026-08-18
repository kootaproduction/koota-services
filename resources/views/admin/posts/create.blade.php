@extends('layouts.admin')

@section('title', 'Tambah Artikel - Admin KOOTA SERVICES')
@section('page_title', 'Tambah Artikel Blog Baru')

@section('content')
    <div class="max-w-3xl bg-white p-8 rounded-3xl border border-gray-200 shadow-sm space-y-6" x-data="{ imgPreview: '' }">
        <form action="{{ route('admin.posts.store') }}" method="POST" enctype="multipart/form-data" class="space-y-6">
            @csrf

            <div class="space-y-2">
                <label class="block text-xs font-bold uppercase text-gray-700">Judul Artikel</label>
                <input type="text" name="title" value="{{ old('title') }}" required placeholder="Masukkan judul artikel yang menarik..." class="w-full px-4 py-3 rounded-xl border border-gray-300 focus:ring-2 focus:ring-[#820003] text-sm">
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div class="space-y-2">
                    <label class="block text-xs font-bold uppercase text-gray-700">Kategori Artikel (Tersinkronisasi)</label>
                    <select name="category" required class="w-full px-4 py-3 rounded-xl border border-gray-300 focus:ring-2 focus:ring-[#820003] text-sm bg-white">
                        @foreach($categories as $cat)
                            <option value="{{ $cat }}" {{ old('category') === $cat ? 'selected' : '' }}>{{ $cat }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="space-y-2">
                    <label class="block text-xs font-bold uppercase text-gray-700">Tanggal Publikasi</label>
                    <input type="date" name="published_at" value="{{ old('published_at', date('Y-m-d')) }}" class="w-full px-4 py-3 rounded-xl border border-gray-300 focus:ring-2 focus:ring-[#820003] text-sm">
                </div>
            </div>

            <div class="space-y-2">
                <label class="block text-xs font-bold uppercase text-gray-700">Ringkasan (Excerpt)</label>
                <textarea name="excerpt" rows="2" placeholder="Ringkasan singkat artikel..." class="w-full px-4 py-3 rounded-xl border border-gray-300 focus:ring-2 focus:ring-[#820003] text-sm">{{ old('excerpt') }}</textarea>
            </div>

            <div class="space-y-2">
                <label class="block text-xs font-bold uppercase text-gray-700">Isi Konten Artikel</label>
                <textarea name="content" rows="8" required placeholder="Tulis isi lengkap artikel di sini..." class="w-full px-4 py-3 rounded-xl border border-gray-300 focus:ring-2 focus:ring-[#820003] text-sm font-sans">{{ old('content') }}</textarea>
            </div>

            <!-- Image Upload & Preview -->
            <div class="space-y-3">
                <label class="block text-xs font-bold uppercase text-gray-700">Gambar Sampul Artikel (Upload File / URL)</label>
                <div class="p-4 rounded-2xl border-2 border-dashed border-gray-300 bg-gray-50 space-y-3 text-center">
                    <template x-if="imgPreview">
                        <div class="h-44 w-full rounded-xl overflow-hidden border border-gray-200 relative mb-2">
                            <img :src="imgPreview" alt="Preview Sampul" class="w-full h-full object-cover">
                        </div>
                    </template>
                    <input type="file" name="image_file" accept="image/*" @change="imgPreview = URL.createObjectURL($event.target.files[0])" class="text-xs text-gray-600 w-full">
                    <p class="text-[11px] text-gray-400">Atau masukkan link URL gambar:</p>
                    <input type="text" name="image_url" @input="imgPreview = $event.target.value" placeholder="https://images.unsplash.com/..." class="w-full px-4 py-2 rounded-lg border border-gray-300 text-xs">
                </div>
            </div>

            <div class="flex items-center gap-6">
                <label class="flex items-center gap-2.5 text-sm font-semibold text-gray-800 cursor-pointer">
                    <input type="checkbox" name="is_featured" value="1" {{ old('is_featured') ? 'checked' : '' }} class="w-4 h-4 rounded text-[#820003] focus:ring-[#820003]">
                    <span>Tampilkan Sebagai Artikel Utama (Featured Top Card)</span>
                </label>
            </div>

            <div class="flex items-center gap-4 pt-4 border-t border-gray-100">
                <button type="submit" class="px-6 py-3 rounded-xl bg-[#820003] text-white font-bold text-sm hover:bg-[#ba1a15]">
                    Simpan Artikel
                </button>
                <a href="{{ route('admin.posts.index') }}" class="text-xs font-bold text-gray-600 hover:underline">
                    Batal
                </a>
            </div>
        </form>
    </div>
@endsection
