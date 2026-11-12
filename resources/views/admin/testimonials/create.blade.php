@extends('layouts.admin')

@section('title', 'Tambah Testimonial Klien - Admin KOOTA SERVICES')
@section('page_title', 'Tambah Testimonial Baru')

@section('content')
<div class="max-w-3xl space-y-6">
    <div class="flex items-center justify-between">
        <div>
            <h2 class="text-lg font-bold text-gray-900">Formulir Testimonial & Review Pelanggan</h2>
            <p class="text-xs text-gray-500">Tambahkan review kepuasan klien untuk meningkatkan kepercayaan calon pelanggan baru.</p>
        </div>
        <a href="{{ route('admin.testimonials.index') }}" class="text-xs font-bold text-gray-600 hover:text-gray-900 underline">
            &larr; Kembali ke Daftar
        </a>
    </div>

    <div class="bg-white p-8 rounded-2xl border border-gray-200 shadow-2xs space-y-6">
        <form action="{{ route('admin.testimonials.store') }}" method="POST" enctype="multipart/form-data" class="space-y-6">
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

            <!-- Nama Klien & Profil / Jabatan -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div class="space-y-2">
                    <label class="block text-xs font-bold uppercase text-gray-700 tracking-wider">
                        Nama Klien / Pemilik <span class="text-red-500">*</span>
                    </label>
                    <input type="text" name="client_name" value="{{ old('client_name') }}" required placeholder="Contoh: Bpk. Hendra Wijaya" class="w-full px-4 py-3 rounded-xl border border-gray-300 focus:ring-2 focus:ring-[#ac0c0c] focus:border-transparent text-sm">
                </div>

                <div class="space-y-2">
                    <label class="block text-xs font-bold uppercase text-gray-700 tracking-wider">
                        Keterangan / Tipe Properti
                    </label>
                    <input type="text" name="client_title" value="{{ old('client_title') }}" placeholder="Contoh: Pemilik Rumah di Citraland, Owner Kafe" class="w-full px-4 py-3 rounded-xl border border-gray-300 focus:ring-2 focus:ring-[#ac0c0c] focus:border-transparent text-sm">
                </div>
            </div>

            <!-- Rating Bintang & Kota -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div class="space-y-2">
                    <label class="block text-xs font-bold uppercase text-gray-700 tracking-wider">
                        Rating Bintang <span class="text-red-500">*</span>
                    </label>
                    <select name="rating" required class="w-full px-4 py-3 rounded-xl border border-gray-300 focus:ring-2 focus:ring-[#ac0c0c] focus:border-transparent text-sm">
                        <option value="5" {{ old('rating', '5') == '5' ? 'selected' : '' }}>★★★★★ (5 Bintang - Sangat Puas)</option>
                        <option value="4" {{ old('rating') == '4' ? 'selected' : '' }}>★★★★☆ (4 Bintang - Puas)</option>
                        <option value="3" {{ old('rating') == '3' ? 'selected' : '' }}>★★★☆☆ (3 Bintang - Cukup)</option>
                    </select>
                </div>

                <div class="space-y-2">
                    <label class="block text-xs font-bold uppercase text-gray-700 tracking-wider">
                        Kota / Wilayah Layanan
                    </label>
                    <input type="text" name="location" value="{{ old('location', 'Surabaya') }}" placeholder="Surabaya, Malang, Bali, Jakarta" class="w-full px-4 py-3 rounded-xl border border-gray-300 focus:ring-2 focus:ring-[#ac0c0c] focus:border-transparent text-sm">
                </div>
            </div>

            <!-- Isi Ulasan -->
            <div class="space-y-2">
                <label class="block text-xs font-bold uppercase text-gray-700 tracking-wider">
                    Isi Ulasan / Testimoni <span class="text-red-500">*</span>
                </label>
                <textarea name="content" rows="4" required placeholder="Tuliskan ulasan klien mengenai kecepatan respon, kerapian hasil kerja, kepuasan terhadap teknisi KOOTA..." class="w-full px-4 py-3 rounded-xl border border-gray-300 focus:ring-2 focus:ring-[#ac0c0c] focus:border-transparent text-sm leading-relaxed">{{ old('content') }}</textarea>
            </div>

            <!-- Urutan & Status Tayang -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6 items-center pt-2">
                <div class="space-y-2">
                    <label class="block text-xs font-bold uppercase text-gray-700 tracking-wider">Urutan Tampil</label>
                    <input type="number" name="order" value="{{ old('order', $maxOrder) }}" min="1" class="w-full px-4 py-3 rounded-xl border border-gray-300 focus:ring-2 focus:ring-[#ac0c0c] focus:border-transparent text-sm">
                </div>

                <div class="pt-6">
                    <label class="inline-flex items-center gap-3 cursor-pointer">
                        <input type="checkbox" name="is_published" value="1" {{ old('is_published', '1') == '1' ? 'checked' : '' }} class="w-4 h-4 text-[#ac0c0c] border-gray-300 rounded focus:ring-[#ac0c0c]">
                        <span class="text-sm font-bold text-gray-800">Langsung tayang di website publik</span>
                    </label>
                </div>
            </div>

            <!-- Submit Buttons -->
            <div class="flex items-center gap-4 pt-4 border-t border-gray-100">
                <button type="submit" class="px-7 py-3 rounded-xl bg-[#ac0c0c] text-white font-bold text-sm hover:bg-[#8f0a0a] transition-colors shadow-sm">
                    Simpan Testimonial
                </button>
                <a href="{{ route('admin.testimonials.index') }}" class="px-5 py-3 rounded-xl bg-gray-100 text-gray-700 font-bold text-sm hover:bg-gray-200 transition-colors">
                    Batal
                </a>
            </div>
        </form>
    </div>
</div>
@endsection

