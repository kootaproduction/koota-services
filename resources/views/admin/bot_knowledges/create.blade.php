@extends('layouts.admin')

@section('title', 'Tambah Pengetahuan Bot - Admin KOOTA SERVICES')
@section('page_title', 'Tambah Pengetahuan Bot Baru')

@section('content')
<div class="max-w-4xl space-y-6">
    <div class="flex items-center justify-between">
        <div>
            <h2 class="text-lg font-bold text-gray-900">Formulir Tanya Jawab Bot</h2>
            <p class="text-xs text-gray-500">Tambahkan informasi tanya jawab dan kata kunci agar chatbot dapat memberikan jawaban otomatis yang akurat.</p>
        </div>
        <a href="{{ route('admin.bot-knowledges.index') }}" class="text-xs font-bold text-gray-600 hover:text-gray-900 underline">
            &larr; Kembali ke Daftar
        </a>
    </div>

    @if($prefillQuestion)
        <div class="p-4 rounded-2xl bg-amber-50 border border-amber-200 text-amber-900 text-xs space-y-1">
            <div class="flex items-center gap-2 font-bold text-sm text-amber-800">
                <svg class="w-4 h-4 text-amber-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                <span>Mengisi Jawaban dari Log Pertanyaan Pengunjung</span>
            </div>
            <p>Pertanyaan ini diambil langsung dari pertanyaan yang belum terjawab sebelumnya. Setelah disimpan, status log tersebut akan otomatis ditandai sebagai selesai (resolved).</p>
        </div>
    @endif

    <div class="bg-white p-8 rounded-2xl border border-gray-200 shadow-2xs space-y-6">
        <form action="{{ route('admin.bot-knowledges.store') }}" method="POST" class="space-y-6">
            @csrf

            @if($fromLogId)
                <input type="hidden" name="from_log_id" value="{{ $fromLogId }}">
            @endif

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
                    <input type="text" name="category" list="category-list" value="{{ old('category', 'Home Cleaning') }}" required placeholder="Pilih atau ketik kategori baru" class="w-full px-4 py-3 rounded-xl border border-gray-300 focus:ring-2 focus:ring-[#820003] focus:border-transparent text-sm">
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
                    <p class="text-[11px] text-gray-400">Contoh: Home Cleaning, Perbaikan Rumah, Pengangkutan Sampah, Biaya & Pembayaran</p>
                </div>

                <div class="space-y-2">
                    <label class="block text-xs font-bold uppercase text-gray-700 tracking-wider">
                        Urutan Prioritas
                    </label>
                    <input type="number" name="order" value="{{ old('order', $maxOrder) }}" min="1" class="w-full px-4 py-3 rounded-xl border border-gray-300 focus:ring-2 focus:ring-[#820003] focus:border-transparent text-sm">
                    <p class="text-[11px] text-gray-400">Semakin kecil angkanya, semakin tinggi prioritas pencocokan.</p>
                </div>
            </div>

            <!-- Pertanyaan Utama -->
            <div class="space-y-2">
                <label class="block text-xs font-bold uppercase text-gray-700 tracking-wider">
                    Pertanyaan Yang Sering Diajukan User <span class="text-red-500">*</span>
                </label>
                <input type="text" name="question" value="{{ old('question', $prefillQuestion) }}" required placeholder="Contoh: Apakah melayani kuras tandon dan cuci toren air?" class="w-full px-4 py-3 rounded-xl border border-gray-300 focus:ring-2 focus:ring-[#820003] focus:border-transparent text-sm font-medium">
                <p class="text-[11px] text-gray-400">Tulis pertanyaan yang ringkas dan alami seperti yang biasa diketik oleh pengunjung.</p>
            </div>

            <!-- Kata Kunci (Keywords) -->
            <div class="space-y-2">
                <label class="block text-xs font-bold uppercase text-gray-700 tracking-wider">
                    Kata Kunci Pencocokan (Keywords)
                </label>
                <textarea name="keywords" rows="3" placeholder="Contoh: cuci toren, kuras tandon, toren lumutan, tangki air kotor, pembersih tandon" class="w-full px-4 py-3 rounded-xl border border-gray-300 focus:ring-2 focus:ring-[#820003] focus:border-transparent text-sm">{{ old('keywords') }}</textarea>
                <div class="p-3 bg-neutral-50 rounded-xl border border-neutral-200 text-[11px] text-neutral-600 space-y-1">
                    <span class="font-bold text-neutral-800">Tips Kata Kunci:</span>
                    <p>Pisahkan setiap kata kunci atau variasi kalimat dengan tanda koma (<code>,</code>). Cantumkan sinonim, istilah awam, atau kata slang yang mungkin diketik user (misal: <em>toren bocor, atap bocor, seng talang, hydro vacuum sofa</em>).</p>
                </div>
            </div>

            <!-- Jawaban Bot -->
            <div class="space-y-2">
                <label class="block text-xs font-bold uppercase text-gray-700 tracking-wider">
                    Jawaban Lengkap Bot <span class="text-red-500">*</span>
                </label>
                <textarea name="answer" rows="7" required placeholder="Tulis jawaban lengkap yang profesional, ramah, dan solutif. Anda bisa menggunakan penomoran (1, 2, 3) dan menyebut nomor WhatsApp (0812-1759-7109) untuk tindakan lebih lanjut." class="w-full px-4 py-3 rounded-xl border border-gray-300 focus:ring-2 focus:ring-[#820003] focus:border-transparent text-sm leading-relaxed">{{ old('answer') }}</textarea>
                <p class="text-[11px] text-gray-400">Format baris baru dan paragraf akan dipertahankan saat ditampilkan di jendela chat pengunjung.</p>
            </div>

            <!-- Checkbox Aktif -->
            <div class="pt-2">
                <label class="inline-flex items-center gap-3 cursor-pointer">
                    <input type="checkbox" name="is_active" value="1" {{ old('is_active', '1') == '1' ? 'checked' : '' }} class="w-4 h-4 text-[#820003] border-gray-300 rounded focus:ring-[#820003]">
                    <span class="text-sm font-bold text-gray-800">Aktifkan pengetahuan ini segera untuk menjawab chatbot</span>
                </label>
            </div>

            <!-- Submit Buttons -->
            <div class="flex items-center gap-4 pt-4 border-t border-gray-100">
                <button type="submit" class="px-7 py-3 rounded-xl bg-[#ac0c0c] text-white font-bold text-sm hover:bg-[#820003] transition-colors shadow-sm">
                    Simpan Pengetahuan Bot
                </button>
                <a href="{{ route('admin.bot-knowledges.index') }}" class="px-5 py-3 rounded-xl bg-gray-100 text-gray-700 font-bold text-sm hover:bg-gray-200 transition-colors">
                    Batal
                </a>
            </div>
        </form>
    </div>
</div>
@endsection

