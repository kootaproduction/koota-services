@extends('layouts.admin')

@section('title', 'Kelola Project - Admin KOOTA SERVICE')
@section('page_title', 'Kelola Project / Portofolio')

@section('content')
    <div class="space-y-6">
        <div class="flex items-center justify-between">
            <p class="text-sm text-gray-600">Daftar foto galeri dan video highlight project.</p>
            <a href="{{ route('admin.projects.create') }}" class="px-5 py-2.5 rounded-xl bg-[#ac0c0c] hover:bg-[#820003] text-white text-xs font-bold shadow-sm">
                + Tambah Project Baru
            </a>
        </div>

        <div class="bg-white rounded-2xl border border-gray-200 shadow-xs overflow-hidden">
            <table class="w-full text-left border-collapse">
                <thead>
                    <tr class="bg-gray-50 border-b border-gray-200 text-xs font-bold text-gray-500 uppercase">
                        <th class="py-3.5 px-6">Gambar / Thumbnail</th>
                        <th class="py-3.5 px-6">Judul Project</th>
                        <th class="py-3.5 px-6">Kategori</th>
                        <th class="py-3.5 px-6">Tipe</th>
                        <th class="py-3.5 px-6 text-right">Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-100 text-sm">
                    @foreach($projects as $p)
                        <tr class="hover:bg-gray-50">
                            <td class="py-4 px-6">
                                <img src="{{ $p->image }}" alt="{{ $p->title }}" class="w-16 h-12 object-cover rounded-lg border border-gray-200">
                            </td>
                            <td class="py-4 px-6 font-bold text-gray-900">
                                {{ $p->title }}
                            </td>
                            <td class="py-4 px-6">
                                <span class="px-2.5 py-1 rounded-full bg-gray-100 text-gray-800 text-xs font-semibold">
                                    {{ $p->category_name }}
                                </span>
                            </td>
                            <td class="py-4 px-6">
                                @if($p->is_video)
                                    <span class="px-2.5 py-1 rounded-full bg-purple-100 text-purple-800 text-xs font-bold">▶ Video Highlight</span>
                                @else
                                    <span class="px-2.5 py-1 rounded-full bg-blue-100 text-blue-800 text-xs font-bold">📷 Photo Gallery</span>
                                @endif
                            </td>
                            <td class="py-4 px-6 text-right space-x-2">
                                <a href="{{ route('admin.projects.edit', $p->id) }}" class="px-3 py-1.5 rounded-lg bg-blue-50 text-blue-700 hover:bg-blue-100 text-xs font-bold">
                                    Edit
                                </a>
                                <form action="{{ route('admin.projects.destroy', $p->id) }}" method="POST" class="inline-block" onsubmit="return confirm('Yakin hapus project ini?')">
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
