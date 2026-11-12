@extends('layouts.admin')

@section('title', 'Manajemen Testimonial Klien - Admin KOOTA SERVICES')
@section('page_title', 'Kelola Testimonial & Review Pelanggan')

@section('content')
<div class="space-y-6">
    <!-- Top Action & Info -->
    <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4">
        <div>
            <p class="text-sm text-gray-600">Daftar ulasan autentik dari pelanggan residensial, kafe, vila, dan properti komersial.</p>
            <div class="flex items-center gap-3 mt-1 text-xs text-gray-400">
                <span>Total: <strong class="text-gray-700">{{ $totalCount }}</strong> ulasan</span>
                <span>•</span>
                <span>Tayang di Web: <strong class="text-green-700">{{ $publishedCount }}</strong></span>
                <span>•</span>
                <span>Rating Rata-rata: <strong class="text-amber-600">★ {{ $avgRating }}</strong></span>
            </div>
        </div>
        <a href="{{ route('admin.testimonials.create') }}" class="px-5 py-2.5 rounded-xl bg-[#ac0c0c] hover:bg-[#8f0a0a] text-white text-xs font-bold shadow-sm transition-colors inline-flex items-center gap-2">
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/></svg>
            <span>+ Tambah Testimonial Baru</span>
        </a>
    </div>

    <!-- Table -->
    <div class="bg-white rounded-2xl border border-gray-200 shadow-2xs overflow-hidden">
        <div class="overflow-x-auto">
            <table class="w-full text-left border-collapse">
                <thead>
                    <tr class="bg-gray-50 border-b border-gray-200 text-xs font-bold text-gray-500 uppercase tracking-wider">
                        <th class="py-3.5 px-6 w-16">Urutan</th>
                        <th class="py-3.5 px-6 w-60">Nama Klien & Profil</th>
                        <th class="py-3.5 px-6 w-28 text-center">Rating</th>
                        <th class="py-3.5 px-6">Isi Ulasan / Testimoni</th>
                        <th class="py-3.5 px-6 w-32">Kota</th>
                        <th class="py-3.5 px-6 text-center w-28">Status</th>
                        <th class="py-3.5 px-6 text-right w-36">Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-100 text-sm">
                    @forelse($testimonials as $testi)
                        <tr class="hover:bg-gray-50/70 transition-colors">
                            <td class="py-4 px-6 font-bold text-gray-400 text-xs">
                                #{{ $testi->order }}
                            </td>
                            <td class="py-4 px-6 space-y-0.5">
                                <p class="font-bold text-gray-900 text-sm">
                                    {{ $testi->client_name }}
                                </p>
                                @if($testi->client_title)
                                    <p class="text-[11px] text-gray-500">
                                        {{ $testi->client_title }}
                                    </p>
                                @endif
                            </td>
                            <td class="py-4 px-6 text-center whitespace-nowrap">
                                <div class="inline-flex text-amber-400 text-xs tracking-tighter">
                                    @for($i = 1; $i <= 5; $i++)
                                        <span>{{ $i <= $testi->rating ? '★' : '☆' }}</span>
                                    @endfor
                                </div>
                            </td>
                            <td class="py-4 px-6 text-xs text-gray-600">
                                <p class="line-clamp-2 leading-relaxed">
                                    "{{ $testi->content }}"
                                </p>
                            </td>
                            <td class="py-4 px-6 text-xs text-gray-700 font-medium">
                                {{ $testi->location ?? '-' }}
                            </td>
                            <td class="py-4 px-6 text-center">
                                <form action="{{ route('admin.testimonials.togglePublished', $testi->id) }}" method="POST">
                                    @csrf
                                    @method('PATCH')
                                    <button type="submit" class="px-2.5 py-1 rounded-full text-[11px] font-bold transition-all {{ $testi->is_published ? 'bg-green-100 text-green-800 hover:bg-green-200' : 'bg-gray-200 text-gray-600 hover:bg-gray-300' }}" title="Ubah status publikasi">
                                        {{ $testi->is_published ? 'Tayang' : 'Draft' }}
                                    </button>
                                </form>
                            </td>
                            <td class="py-4 px-6 text-right space-x-1.5 whitespace-nowrap">
                                <a href="{{ route('admin.testimonials.edit', $testi->id) }}" class="px-3 py-1.5 rounded-lg bg-blue-50 text-blue-700 hover:bg-blue-100 text-xs font-bold transition-colors inline-block">
                                    Edit
                                </a>
                                <form action="{{ route('admin.testimonials.destroy', $testi->id) }}" method="POST" class="inline-block" onsubmit="return confirm('Hapus testimonial ini?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="px-3 py-1.5 rounded-lg bg-red-50 text-red-700 hover:bg-red-100 text-xs font-bold transition-colors">
                                        Hapus
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="7" class="py-12 text-center text-gray-500 text-sm">
                                <p class="font-bold">Belum ada testimonial klien.</p>
                                <p class="text-xs text-gray-400 mt-1">Klik "+ Tambah Testimonial Baru" untuk memajang ulasan klien di website.</p>
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        @if($testimonials->hasPages())
            <div class="p-4 border-t border-gray-100">
                {{ $testimonials->links() }}
            </div>
        @endif
    </div>
</div>
@endsection

