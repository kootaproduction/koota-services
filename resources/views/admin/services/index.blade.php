@extends('layouts.admin')

@section('title', 'Kelola Layanan - Admin KOOTA SERVICES')
@section('page_title', 'Kelola Layanan (Services)')

@section('content')
    <div class="space-y-6">
        <div class="flex items-center justify-between">
            <p class="text-sm text-gray-600">Daftar semua layanan utama yang ditampilkan di website publik.</p>
            <a href="{{ route('admin.services.create') }}" class="px-5 py-2.5 rounded-xl bg-[#820003] hover:bg-[#ba1a15] text-white text-xs font-bold shadow-sm transition-all active:scale-95">
                + Tambah Layanan Baru
            </a>
        </div>

        <div class="bg-white rounded-3xl border border-gray-200 shadow-xs overflow-hidden">
            <table class="w-full text-left border-collapse">
                <thead>
                    <tr class="bg-gray-50 border-b border-gray-200 text-xs font-bold text-gray-500 uppercase">
                        <th class="py-3.5 px-6">Urutan</th>
                        <th class="py-3.5 px-6">Gambar & Nama Layanan</th>
                        <th class="py-3.5 px-6">Badge Label</th>
                        <th class="py-3.5 px-6 text-right">Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-100 text-sm">
                    @foreach($services as $s)
                        <tr class="hover:bg-gray-50 transition-colors">
                            <td class="py-4 px-6 font-bold text-gray-400">#{{ $s->order }}</td>
                            <td class="py-4 px-6 font-bold text-gray-900">
                                <div class="flex items-center gap-3">
                                    <img src="{{ $s->hero_image }}" alt="{{ $s->title }}" class="w-12 h-10 object-cover rounded-lg border border-gray-200 shadow-2xs">
                                    <span>{{ $s->title }}</span>
                                </div>
                            </td>
                            <td class="py-4 px-6">
                                <span class="px-2.5 py-1 rounded-full bg-red-50 text-[#820003] text-xs font-bold">
                                    {{ $s->badge_label }}
                                </span>
                            </td>
                            <td class="py-4 px-6 text-right space-x-2">
                                <a href="{{ route('services.show', $s->slug) }}" target="_blank" class="px-3 py-1.5 rounded-lg bg-gray-100 text-gray-700 hover:bg-gray-200 text-xs font-bold">
                                    Lihat
                                </a>
                                <a href="{{ route('admin.services.edit', $s->id) }}" class="px-3 py-1.5 rounded-lg bg-blue-50 text-blue-700 hover:bg-blue-100 text-xs font-bold">
                                    Edit
                                </a>
                                <form action="{{ route('admin.services.destroy', $s->id) }}" method="POST" class="inline-block" onsubmit="return confirm('Yakin hapus layanan ini?')">
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
