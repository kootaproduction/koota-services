@extends('layouts.admin')

@section('title', 'Kelola FAQ - Admin KOOTA SERVICE')
@section('page_title', 'Kelola Pertanyaan FAQ')

@section('content')
    <div class="space-y-6">
        <div class="flex items-center justify-between">
            <p class="text-sm text-gray-600">Daftar item FAQ accordion yang ditampilkan di Halaman Utama dan Blog.</p>
            <a href="{{ route('admin.faqs.create') }}" class="px-5 py-2.5 rounded-xl bg-[#ac0c0c] hover:bg-[#820003] text-white text-xs font-bold shadow-sm">
                + Tambah FAQ Baru
            </a>
        </div>

        <div class="bg-white rounded-2xl border border-gray-200 shadow-xs overflow-hidden">
            <table class="w-full text-left border-collapse">
                <thead>
                    <tr class="bg-gray-50 border-b border-gray-200 text-xs font-bold text-gray-500 uppercase">
                        <th class="py-3.5 px-6">Urutan</th>
                        <th class="py-3.5 px-6">Pertanyaan</th>
                        <th class="py-3.5 px-6">Jawaban</th>
                        <th class="py-3.5 px-6 text-right">Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-100 text-sm">
                    @foreach($faqs as $f)
                        <tr class="hover:bg-gray-50">
                            <td class="py-4 px-6 font-bold text-gray-500">0{{ $f->order }}</td>
                            <td class="py-4 px-6 font-bold text-gray-900">
                                {{ $f->question }}
                            </td>
                            <td class="py-4 px-6 text-xs text-gray-600 max-w-md line-clamp-2">
                                {{ $f->answer }}
                            </td>
                            <td class="py-4 px-6 text-right space-x-2">
                                <a href="{{ route('admin.faqs.edit', $f->id) }}" class="px-3 py-1.5 rounded-lg bg-blue-50 text-blue-700 hover:bg-blue-100 text-xs font-bold">
                                    Edit
                                </a>
                                <form action="{{ route('admin.faqs.destroy', $f->id) }}" method="POST" class="inline-block" onsubmit="return confirm('Hapus FAQ ini?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="px-3 py-1.5 rounded-lg bg-red-50 text-red-700 hover:bg-red-100 text-xs font-bold">
                                        Hapus
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
