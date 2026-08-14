@extends('layouts.admin')

@section('title', 'Data Konsultasi Masuk - Admin KOOTA SERVICE')
@section('page_title', 'Kotak Masuk Konsultasi')

@section('content')
    <div class="space-y-6">
        <p class="text-sm text-gray-600">Daftar semua permintaan konsultasi yang dikirimkan oleh calon pelanggan melalui form website.</p>

        <div class="bg-white rounded-2xl border border-gray-200 shadow-xs overflow-hidden">
            <table class="w-full text-left border-collapse">
                <thead>
                    <tr class="bg-gray-50 border-b border-gray-200 text-xs font-bold text-gray-500 uppercase">
                        <th class="py-3.5 px-6">ID</th>
                        <th class="py-3.5 px-6">Layanan</th>
                        <th class="py-3.5 px-6">Nama Pelanggan</th>
                        <th class="py-3.5 px-6">No. WhatsApp</th>
                        <th class="py-3.5 px-6">Properti & Lokasi</th>
                        <th class="py-3.5 px-6">Status</th>
                        <th class="py-3.5 px-6 text-right">Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-100 text-sm">
                    @forelse($consultations as $c)
                        <tr class="hover:bg-gray-50">
                            <td class="py-4 px-6 font-mono text-xs text-gray-500">#{{ $c->id }}</td>
                            <td class="py-4 px-6 font-bold text-gray-900">
                                <span class="px-2.5 py-1 rounded-full bg-red-100 text-[#ac0c0c] text-xs">
                                    {{ $c->service_type }}
                                </span>
                            </td>
                            <td class="py-4 px-6">
                                <p class="font-semibold text-gray-900">{{ $c->name }}</p>
                                <p class="text-xs text-gray-500">{{ $c->email }}</p>
                            </td>
                            <td class="py-4 px-6 font-mono text-xs">
                                <a href="https://wa.me/{{ preg_replace('/[^0-9]/', '', $c->whatsapp) }}" target="_blank" class="text-green-700 font-bold hover:underline">
                                    💬 {{ $c->whatsapp }}
                                </a>
                            </td>
                            <td class="py-4 px-6 text-xs text-gray-600">
                                {{ $c->property_type }} ({{ $c->location }})
                            </td>
                            <td class="py-4 px-6">
                                @if($c->status === 'Pending')
                                    <span class="px-2.5 py-1 rounded-full bg-amber-100 text-amber-800 text-xs font-bold">Pending</span>
                                @elseif($c->status === 'Diproses')
                                    <span class="px-2.5 py-1 rounded-full bg-blue-100 text-blue-800 text-xs font-bold">Diproses</span>
                                @else
                                    <span class="px-2.5 py-1 rounded-full bg-green-100 text-green-800 text-xs font-bold">Selesai</span>
                                @endif
                            </td>
                            <td class="py-4 px-6 text-right space-x-2">
                                <a href="{{ route('admin.consultations.show', $c->id) }}" class="px-3 py-1.5 rounded-lg bg-gray-100 text-gray-800 hover:bg-gray-200 text-xs font-bold">
                                    Detail
                                </a>
                                <form action="{{ route('admin.consultations.destroy', $c->id) }}" method="POST" class="inline-block" onsubmit="return confirm('Hapus data konsultasi ini?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="px-3 py-1.5 rounded-lg bg-red-50 text-red-700 hover:bg-red-100 text-xs font-bold">
                                        Hapus
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="7" class="py-8 text-center text-gray-500 text-sm">Belum ada pesan konsultasi.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
@endsection
