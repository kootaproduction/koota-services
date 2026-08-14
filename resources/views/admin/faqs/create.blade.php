@extends('layouts.admin')

@section('title', 'Tambah FAQ - Admin KOOTA SERVICE')
@section('page_title', 'Tambah FAQ Baru')

@section('content')
    <div class="max-w-3xl bg-white p-8 rounded-2xl border border-gray-200 shadow-xs space-y-6">
        <form action="{{ route('admin.faqs.store') }}" method="POST" class="space-y-6">
            @csrf

            @if($errors->any())
                <div class="p-4 rounded-xl bg-red-50 border border-red-200 text-red-800 text-sm">
                    <ul class="list-disc list-inside space-y-1">
                        @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <div class="space-y-2">
                <label class="block text-xs font-bold uppercase text-gray-700">Pertanyaan</label>
                <input type="text" name="question" value="{{ old('question') }}" required placeholder="Contoh: Apa itu Koota Production?" class="w-full px-4 py-3 rounded-xl border border-gray-300 focus:ring-2 focus:ring-[#ac0c0c] focus:border-transparent text-sm">
            </div>

            <div class="space-y-2">
                <label class="block text-xs font-bold uppercase text-gray-700">Jawaban</label>
                <textarea name="answer" rows="5" required placeholder="Tulis jawaban untuk pertanyaan ini..." class="w-full px-4 py-3 rounded-xl border border-gray-300 focus:ring-2 focus:ring-[#ac0c0c] focus:border-transparent text-sm">{{ old('answer') }}</textarea>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div class="space-y-2">
                    <label class="block text-xs font-bold uppercase text-gray-700">Kategori</label>
                    <input type="text" name="category" value="{{ old('category', 'General') }}" placeholder="Contoh: General, Layanan, Teknis" class="w-full px-4 py-3 rounded-xl border border-gray-300 focus:ring-2 focus:ring-[#ac0c0c] focus:border-transparent text-sm">
                </div>

                <div class="space-y-2">
                    <label class="block text-xs font-bold uppercase text-gray-700">Urutan Tampil</label>
                    <input type="number" name="order" value="{{ old('order', 1) }}" min="1" class="w-full px-4 py-3 rounded-xl border border-gray-300 focus:ring-2 focus:ring-[#ac0c0c] focus:border-transparent text-sm">
                </div>
            </div>

            <div class="flex items-center gap-4 pt-4">
                <button type="submit" class="px-6 py-3 rounded-xl bg-[#ac0c0c] text-white font-bold text-sm hover:bg-[#820003] transition-colors shadow-sm">
                    Simpan FAQ
                </button>
                <a href="{{ route('admin.faqs.index') }}" class="text-xs font-bold text-gray-600 hover:underline">
                    Batal
                </a>
            </div>
        </form>
    </div>
@endsection
