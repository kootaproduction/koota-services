@extends('layouts.admin')

@section('title', 'Kelola Layanan - Admin KOOTA SERVICE')
@section('page_title', 'Kelola Layanan (Services)')

@section('content')
    <div class="space-y-6">
        <div class="flex items-center justify-between">
            <p class="text-sm text-gray-600">Daftar semua layanan yang ditampilkan di website publik.</p>
            <a href="{{ route('admin.services.create') }}" class="px-5 py-2.5 rounded-xl bg-[#ac0c0c] hover:bg-[#820003] text-white text-xs font-bold shadow-sm">
                + Tambah Layanan Baru
            </a>
        </div>

        <div class="bg-white rounded-2xl border border-gray-200 shadow-xs overflow-hidden">
            <table class="w-full text-left border-collapse">
                <thead>
                    <tr class="bg-gray-50 border-b border-gray-200 text-xs font-bold text-gray-500 uppercase">
                        <th class="py-3.5 px-6">Urutan</th>
                        <th class="py-3.5 px-6">Nama Layanan</th>
                        <th class="py-3.5 px-6">Kategori</th>
                        <th class="py-3.5 px-6">Badge Text</th>
                        <th class="py-3.5 px-6 text-right">Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-100 text-sm">
                    @foreach($services as $s)
                        <tr class="hover:bg-gray-50">
                            <td class="py-4 px-6 font-bold text-gray-500">#{{ $s->order }}</td>
                            <td class="py-4 px-6 font-bold text-gray-900">
                                <div class="flex items-center gap-3">
                                    <div class="w-8 h-8 rounded-lg bg-red-100 text-[#ac0c0c] flex items-center justify-center text-sm">
                                        🧹
                                    </div>
                                    <span>{{ $s->title }}</span>
                                </div>
                            </td>
                            <td class="py-4 px-6">
                                <span class="px-2.5 py-1 rounded-full text-xs font-bold {{ $s->category === 'sustainability' ? 'bg-green-100 text-green-800' : 'bg-red-100 text-red-800' }}">
                                    {{ $s->category }}
                                </span>
                            </td>
                            <td class="py-4 px-6 text-xs text-gray-600">{{ $s->badge_label }}</td>
                            <td class="py-4 px-6 text-right space-x-2">
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
