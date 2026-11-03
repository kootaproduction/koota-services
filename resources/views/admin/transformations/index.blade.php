@extends('layouts.admin')

@section('title', 'Katalog Transformasi Before-After - Admin KOOTA SERVICES')
@section('page_title', 'Galeri Transformasi Before & After')

@section('content')
<div class="space-y-6">
    <!-- Top Action & Info -->
    <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4">
        <div>
            <p class="text-sm text-gray-600">Dokumentasi perbandingan sebelum vs sesudah pengerjaan untuk meyakinkan calon klien.</p>
            <div class="flex items-center gap-3 mt-1 text-xs text-gray-400">
                <span>Total: <strong class="text-gray-700">{{ $totalCount }}</strong> data</span>
                <span>•</span>
                <span>Unggulan Publik: <strong class="text-[#820003]">{{ $featuredCount }}</strong></span>
            </div>
        </div>
        <a href="{{ route('admin.transformations.create') }}" class="px-5 py-2.5 rounded-xl bg-[#ac0c0c] hover:bg-[#820003] text-white text-xs font-bold shadow-sm transition-colors inline-flex items-center gap-2">
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/></svg>
            <span>+ Tambah Transformasi Baru</span>
        </a>
    </div>

    <!-- Cards Grid -->
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
        @forelse($transformations as $t)
            <div class="bg-white rounded-2xl border border-gray-200 overflow-hidden shadow-2xs flex flex-col justify-between hover:shadow-md transition-shadow">
                <div>
                    <!-- Before-After Image Comparison Preview -->
                    <div class="grid grid-cols-2 relative bg-gray-900 h-48 overflow-hidden">
                        <div class="relative overflow-hidden group">
                            <img src="{{ $t->image_before }}" alt="Sebelum" class="w-full h-full object-cover">
                            <span class="absolute bottom-2 left-2 px-2 py-0.5 rounded text-[10px] font-extrabold uppercase bg-red-600 text-white shadow-xs">
                                BEFORE
                            </span>
                        </div>
                        <div class="relative overflow-hidden group border-l border-white/30">
                            <img src="{{ $t->image_after }}" alt="Sesudah" class="w-full h-full object-cover">
                            <span class="absolute bottom-2 right-2 px-2 py-0.5 rounded text-[10px] font-extrabold uppercase bg-emerald-600 text-white shadow-xs">
                                AFTER
                            </span>
                        </div>
                    </div>

                    <!-- Details -->
                    <div class="p-5 space-y-2.5">
                        <div class="flex items-center justify-between">
                            <span class="px-2.5 py-0.5 rounded-lg text-[10px] font-bold bg-neutral-100 text-neutral-800 border border-neutral-200">
                                {{ $t->category }}
                            </span>
                            @if($t->location)
                                <span class="text-[11px] font-medium text-gray-500 flex items-center gap-1">
                                    <svg class="w-3.5 h-3.5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/></svg>
                                    {{ $t->location }}
                                </span>
                            @endif
                        </div>

                        <h3 class="text-sm font-bold text-gray-900 leading-snug line-clamp-2">
                            {{ $t->title }}
                        </h3>

                        @if($t->description)
                            <p class="text-xs text-gray-500 line-clamp-2 leading-relaxed">
                                {{ $t->description }}
                            </p>
                        @endif

                        @if($t->duration)
                            <p class="text-[11px] text-gray-400 font-medium">
                                Estimasi Waktu: <span class="text-gray-700 font-bold">{{ $t->duration }}</span>
                            </p>
                        @endif
                    </div>
                </div>

                <!-- Footer Actions -->
                <div class="p-4 border-t border-gray-100 bg-gray-50/60 flex items-center justify-between">
                    <form action="{{ route('admin.transformations.toggleFeatured', $t->id) }}" method="POST">
                        @csrf
                        @method('PATCH')
                        <button type="submit" class="px-2.5 py-1 rounded-full text-[11px] font-bold transition-all {{ $t->is_featured ? 'bg-green-100 text-green-800 hover:bg-green-200' : 'bg-gray-200 text-gray-600 hover:bg-gray-300' }}" title="Tampilkan di beranda publik">
                            {{ $t->is_featured ? 'Unggulan Aktif' : 'Disembunyikan' }}
                        </button>
                    </form>

                    <div class="flex items-center gap-2">
                        <a href="{{ route('admin.transformations.edit', $t->id) }}" class="px-3 py-1.5 rounded-lg bg-blue-50 text-blue-700 hover:bg-blue-100 text-xs font-bold transition-colors">
                            Edit
                        </a>
                        <form action="{{ route('admin.transformations.destroy', $t->id) }}" method="POST" onsubmit="return confirm('Hapus data transformasi ini?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="px-3 py-1.5 rounded-lg bg-red-50 text-red-700 hover:bg-red-100 text-xs font-bold transition-colors">
                                Hapus
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        @empty
            <div class="col-span-full bg-white rounded-2xl p-12 text-center text-gray-500 border border-gray-200">
                <p class="font-bold text-sm">Belum ada data transformasi Before-After.</p>
                <p class="text-xs text-gray-400 mt-1">Klik tombol "+ Tambah Transformasi Baru" untuk mengunggah perbandingan foto.</p>
            </div>
        @endforelse
    </div>

    @if($transformations->hasPages())
        <div class="p-4">
            {{ $transformations->links() }}
        </div>
    @endif
</div>
@endsection

