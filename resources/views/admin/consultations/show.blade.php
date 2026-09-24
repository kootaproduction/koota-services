@extends('layouts.admin')

@section('title', 'Detail Konsultasi #' . $consultation->id . ' - Admin KOOTA SERVICE')
@section('page_title', 'Detail Permintaan Konsultasi #' . $consultation->id)

@section('content')
    <div class="max-w-4xl space-y-6">
        <div class="flex items-center justify-between">
            <a href="{{ route('admin.consultations.index') }}" class="text-xs font-bold text-gray-600 hover:underline">
                Kembali ke Kotak Masuk
            </a>

            <!-- Update Status Form -->
            <form action="{{ route('admin.consultations.updateStatus', $consultation->id) }}" method="POST" class="flex items-center gap-3">
                @csrf
                @method('PATCH')
                <label class="text-xs font-bold text-gray-700 uppercase">Ubah Status:</label>
                <select name="status" class="px-3 py-1.5 rounded-lg border border-gray-300 text-xs font-bold bg-white">
                    <option value="Pending" {{ $consultation->status === 'Pending' ? 'selected' : '' }}>Pending</option>
                    <option value="Diproses" {{ $consultation->status === 'Diproses' ? 'selected' : '' }}>Diproses</option>
                    <option value="Selesai" {{ $consultation->status === 'Selesai' ? 'selected' : '' }}>Selesai</option>
                </select>
                <button type="submit" class="px-4 py-1.5 rounded-lg bg-[#ac0c0c] text-white font-bold text-xs">
                    Simpan Status
                </button>
            </form>
        </div>

        <div class="bg-white p-8 rounded-2xl border border-gray-200 shadow-xs space-y-6">
            <div class="flex items-center justify-between pb-6 border-b border-gray-200">
                <div>
                    <span class="px-3 py-1 rounded-full bg-red-100 text-[#ac0c0c] font-bold text-xs">
                        {{ $consultation->service_type }}
                    </span>
                    <h3 class="text-2xl font-extrabold text-gray-900 mt-2">{{ $consultation->name }}</h3>
                    <p class="text-xs text-gray-500">Dikirim pada {{ $consultation->created_at->format('d M Y H:i') }}</p>
                </div>
                <div class="text-right">
                    <a href="https://wa.me/{{ preg_replace('/[^0-9]/', '', $consultation->whatsapp) }}?text=Halo%20{{ urlencode($consultation->name) }},%20kami%20dari%20KOOTA%20SERVICE%20menindaklanjuti%20permintaan%20konsultasi%20{{ urlencode($consultation->service_type) }}%20Anda." target="_blank" class="px-5 py-2.5 rounded-xl bg-[#25d366] text-white font-bold text-xs shadow-sm hover:bg-green-600 inline-flex items-center gap-2">
                        <span>Chat WhatsApp Pelanggan</span>
                    </a>
                </div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6 text-sm">
                <div>
                    <p class="text-xs font-bold uppercase text-gray-400">No. WhatsApp</p>
                    <p class="font-semibold text-gray-900 mt-1">{{ $consultation->whatsapp }}</p>
                </div>
                <div>
                    <p class="text-xs font-bold uppercase text-gray-400">Email</p>
                    <p class="font-semibold text-gray-900 mt-1">{{ $consultation->email }}</p>
                </div>
                <div>
                    <p class="text-xs font-bold uppercase text-gray-400">Lokasi Properti</p>
                    <p class="font-semibold text-gray-900 mt-1">{{ $consultation->location }}</p>
                </div>
                <div>
                    <p class="text-xs font-bold uppercase text-gray-400">Jenis Properti</p>
                    <p class="font-semibold text-gray-900 mt-1">{{ $consultation->property_type }}</p>
                </div>
                <div class="md:col-span-2">
                    <p class="text-xs font-bold uppercase text-gray-400">Alamat Lengkap Properti</p>
                    <p class="font-semibold text-gray-900 mt-1">{{ $consultation->address ?? '-' }}</p>
                </div>
            </div>

            <div class="pt-4 border-t border-gray-100">
                <p class="text-xs font-bold uppercase text-gray-400 mb-2">Catatan Detail Kebutuhan</p>
                <div class="p-4 rounded-xl bg-gray-50 text-gray-800 text-sm leading-relaxed border border-gray-200">
                    {{ $consultation->notes ?? 'Tidak ada catatan khusus.' }}
                </div>
            </div>

            @if($consultation->photo_path)
                <div class="pt-4 border-t border-gray-100">
                    <p class="text-xs font-bold uppercase text-gray-400 mb-2">Foto Lampiran</p>
                    <a href="{{ Storage::url($consultation->photo_path) }}" target="_blank">
                        <img src="{{ Storage::url($consultation->photo_path) }}" alt="Lampiran Foto" class="max-h-64 rounded-xl border border-gray-200 object-cover shadow-xs">
                    </a>
                </div>
            @endif
        </div>
    </div>
@endsection
