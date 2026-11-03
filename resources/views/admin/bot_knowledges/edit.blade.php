@extends('layouts.admin')

@section('title', 'Edit Pengetahuan Bot - Admin KOOTA SERVICES')
@section('page_title', 'Edit Pengetahuan Bot')

@section('content')
<div class="max-w-4xl space-y-6">
    <div class="flex items-center justify-between">
        <div>
            <h2 class="text-lg font-bold text-gray-900">Perbarui Tanya Jawab Bot</h2>
            <p class="text-xs text-gray-500">Edit pertanyaan, variasi kata kunci, atau sesuaikan jawaban bot.</p>
        </div>
        <div class="flex items-center gap-3">
            <span class="text-xs font-semibold px-3 py-1 rounded-full bg-neutral-100 text-neutral-700 border border-neutral-200">
                Telah Dijawab: <strong class="text-neutral-900">{{ $knowledge->hit_count }} kali</strong>
            </span>
            <a href="{{ route('admin.bot-knowledges.index') }}" class="text-xs font-bold text-gray-600 hover:text-gray-900 underline">
                &larr; Kembali ke Daftar
            </a>
        </div>
    </div>

    <div class="bg-white p-8 rounded-2xl border border-gray-200 shadow-2xs space-y-6">
        <form action="{{ route('admin.bot-knowledges.update', $knowledge->id) }}" method="POST" class="space-y-6">
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

            <!-- Kategori -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div class="space-y-2">
                    <label class="block text-xs font-bold uppercase text-gray-700 tracking-wider">
                        Kategori Layanan / Topik <span class="text-red-500">*</span>
                    </label>
                    <input type="text" name="category" list="category-list" value="{{ old('category', $knowledge->category) }}" required placeholder="Pilih atau ketik kategori baru" class="w-full px-4 py-3 rounded-xl border border-gray-300 focus:ring-2 focus:ring-[#820003] focus:border-transparent text-sm">
                    <datalist id="category-list">
                        <option value="Home Cleaning">
                        <option value="Perbaikan Rumah">
                        <option value="Pengangkutan Sampah">
                        <option value="Biaya & Pembayaran">
                        <option value="Wilayah & Jadwal">
                        <option value="Garansi & Keamanan">
                        <option value="Umum & Perusahaan">
                        @foreach($categories as $c)
                            <option value="{{ $c }}">
                        @endforeach
                    </datalist>
                </div>

                <div class="space-y-2">
                    <label class="block text-xs font-bold uppercase text-gray-700 tracking-wider">
                        Urutan Prioritas
                    </label>
                    <input type="number" name="order" value="{{ old('order', $knowledge->order) }}" min="1" class="w-full px-4 py-3 rounded-xl border border-gray-300 focus:ring-2 focus:ring-[#820003] focus:border-transparent text-sm">
                </div>
            </div>

            <!-- Pertanyaan Utama -->
            <div class="space-y-2">
                <label class="block text-xs font-bold uppercase text-gray-700 tracking-wider">
                    Pertanyaan Yang Sering Diajukan User <span class="text-red-500">*</span>
                </label>
                <input type="text" name="question" value="{{ old('question', $knowledge->question) }}" required class="w-full px-4 py-3 rounded-xl border border-gray-300 focus:ring-2 focus:ring-[#820003] focus:border-transparent text-sm font-medium">
            </div>

            <!-- Kata Kunci (Keywords) -->
            <div class="space-y-2">
                <label class="block text-xs font-bold uppercase text-gray-700 tracking-wider">
                    Kata Kunci Pencocokan (Keywords)
                </label>
                <textarea name="keywords" rows="3" class="w-full px-4 py-3 rounded-xl border border-gray-300 focus:ring-2 focus:ring-[#820003] focus:border-transparent text-sm">{{ old('keywords', $knowledge->keywords) }}</textarea>
                <p class="text-[11px] text-gray-400">Pisahkan setiap kata kunci atau frasa dengan tanda koma (<code>,</code>).</p>
            </div>

            <!-- Jawaban Bot -->
            <div class="space-y-2">
                <label class="block text-xs font-bold uppercase text-gray-700 tracking-wider">
                    Jawaban Lengkap Bot <span class="text-red-500">*</span>
                </label>
                <textarea name="answer" rows="7" required class="w-full px-4 py-3 rounded-xl border border-gray-300 focus:ring-2 focus:ring-[#820003] focus:border-transparent text-sm leading-relaxed">{{ old('answer', $knowledge->answer) }}</textarea>
            </div>

            <!-- Checkbox Aktif -->
            <div class="pt-2">
                <label class="inline-flex items-center gap-3 cursor-pointer">
                    <input type="checkbox" name="is_active" value="1" {{ old('is_active', $knowledge->is_active ? '1' : '0') == '1' ? 'checked' : '' }} class="w-4 h-4 text-[#820003] border-gray-300 rounded focus:ring-[#820003]">
                    <span class="text-sm font-bold text-gray-800">Status Aktif (Ditampilkan dalam pencarian bot)</span>
                </label>
            </div>

            <!-- Submit Buttons -->
            <div class="flex items-center justify-between pt-4 border-t border-gray-100">
                <div class="flex items-center gap-4">
                    <button type="submit" class="px-7 py-3 rounded-xl bg-[#ac0c0c] text-white font-bold text-sm hover:bg-[#820003] transition-colors shadow-sm">
                        Simpan Perubahan
                    </button>
                    <a href="{{ route('admin.bot-knowledges.index') }}" class="px-5 py-3 rounded-xl bg-gray-100 text-gray-700 font-bold text-sm hover:bg-gray-200 transition-colors">
                        Batal
                    </a>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection

