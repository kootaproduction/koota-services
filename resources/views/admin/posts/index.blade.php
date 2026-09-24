@extends('layouts.admin')

@section('title', 'Kelola Artikel Blog - Admin KOOTA SERVICES')
@section('page_title', 'Kelola Blog & Artikel Insight')

@section('content')
    <div class="space-y-6">
        <div class="flex items-center justify-between">
            <p class="text-sm text-gray-600">Daftar artikel tips & insight yang tampil di halaman Blog Publik.</p>
            <a href="{{ route('admin.posts.create') }}" class="px-5 py-2.5 rounded-xl bg-[#820003] hover:bg-[#ba1a15] text-white text-xs font-bold shadow-sm transition-all active:scale-95">
                + Tambah Artikel Baru
            </a>
        </div>

        <div class="bg-white rounded-3xl border border-gray-200 shadow-xs overflow-hidden">
            <table class="w-full text-left border-collapse">
                <thead>
                    <tr class="bg-gray-50 border-b border-gray-200 text-xs font-bold text-gray-500 uppercase">
                        <th class="py-3.5 px-6">Gambar</th>
                        <th class="py-3.5 px-6">Judul Artikel</th>
                        <th class="py-3.5 px-6">Kategori</th>
                        <th class="py-3.5 px-6">Tanggal Rilis</th>
                        <th class="py-3.5 px-6">Status Featured</th>
                        <th class="py-3.5 px-6 text-right">Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-100 text-sm">
                    @foreach($posts as $p)
                        <tr class="hover:bg-gray-50 transition-colors">
                            <td class="py-4 px-6">
                                <img src="{{ $p->image }}" alt="{{ $p->title }}" class="w-16 h-12 object-cover rounded-xl border border-gray-200 shadow-2xs">
                            </td>
                            <td class="py-4 px-6 font-bold text-gray-900 leading-snug">
                                {{ $p->title }}
                            </td>
                            <td class="py-4 px-6">
                                <span class="px-2.5 py-1 rounded-full bg-red-50 text-[#820003] text-xs font-bold">
                                    {{ $p->category }}
                                </span>
                            </td>
                            <td class="py-4 px-6 text-xs text-gray-600">
                                {{ $p->published_at ? $p->published_at->format('d M Y') : date('d M Y') }}
                            </td>
                            <td class="py-4 px-6">
                                @if($p->is_featured)
                                    <span class="px-2.5 py-1 rounded-full bg-red-100 text-[#820003] text-xs font-bold">Featured Top Card</span>
                                @else
                                    <span class="text-xs text-gray-400">Standar</span>
                                @endif
                            </td>
                            <td class="py-4 px-6 text-right space-x-2">
                                <a href="{{ route('blog.show', $p->slug) }}" target="_blank" class="px-3 py-1.5 rounded-lg bg-gray-100 text-gray-700 hover:bg-gray-200 text-xs font-bold">
                                    Lihat
                                </a>
                                <a href="{{ route('admin.posts.edit', $p->id) }}" class="px-3 py-1.5 rounded-lg bg-blue-50 text-blue-700 hover:bg-blue-100 text-xs font-bold">
                                    Edit
                                </a>
                                <form action="{{ route('admin.posts.destroy', $p->id) }}" method="POST" class="inline-block" onsubmit="return confirm('Yakin hapus artikel ini?')">
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
