@extends('layouts.app')

@section('title', 'Konsultasi Kebutuhan Anda - KOOTA SERVICES')

@section('content')
    <!-- Hero Header -->
    <section class="bg-[#fcf9f8] py-12 md:py-16 text-center border-b border-gray-100">
        <div class="max-w-[1280px] mx-auto px-4 sm:px-6 lg:px-8 space-y-3">
            <h1 class="text-3xl sm:text-4xl lg:text-5xl font-extrabold text-[#820003] tracking-tight">
                {{ __('Konsultasi Kebutuhan Anda') }}
            </h1>
            <p class="text-xs sm:text-sm text-gray-600 max-w-2xl mx-auto leading-relaxed">
                {{ __('Kami siap membantu memberikan solusi terbaik untuk pemeliharaan fasilitas, manajemen limbah, dan perbaikan properti Anda.') }}
            </p>
        </div>
    </section>

    <!-- Main Consultation Content -->
    <section class="py-16 bg-[#fcf9f8]">
        <div class="max-w-[1280px] mx-auto px-4 sm:px-6 lg:px-8">
            
            <!-- Success Alert -->
            @if(session('success'))
                <div class="mb-8 p-6 rounded-2xl bg-green-50 border border-green-200 text-green-900 space-y-3 shadow-xs">
                    <div class="flex items-center gap-3">
                        <div class="w-8 h-8 rounded-full bg-[#007327] text-white flex items-center justify-center font-bold text-sm">
                            ✓
                        </div>
                        <h3 class="text-base font-bold">{{ __('Permintaan Konsultasi Berhasil Dikirim!') }}</h3>
                    </div>
                    <p class="text-xs sm:text-sm text-green-800 leading-relaxed pl-11">
                        {{ session('success') }}
                    </p>
                    @if(session('wa_url'))
                        <div class="pl-11 pt-2">
                            <a href="{{ session('wa_url') }}" target="_blank" class="inline-flex items-center gap-2 px-6 py-2.5 rounded-xl bg-[#25d366] text-white font-bold text-xs shadow-sm hover:bg-green-600 transition-colors">
                                <svg class="w-4 h-4 fill-current" viewBox="0 0 24 24">
                                    <path d="M.057 24l1.687-6.163c-1.041-1.804-1.588-3.849-1.587-5.946.003-6.556 5.338-11.891 11.893-11.891 3.181.001 6.167 1.24 8.413 3.488 2.245 2.248 3.481 5.236 3.48 8.414-.003 6.557-5.338 11.892-11.893 11.892-1.99-.001-3.951-.5-5.688-1.448l-6.305 1.654zm6.597-3.807c1.676.995 3.276 1.591 5.392 1.592 5.448 0 9.886-4.434 9.889-9.885.002-5.462-4.415-9.89-9.881-9.892-5.452 0-9.887 4.434-9.889 9.884-.001 2.225.651 3.891 1.746 5.634l-.999 3.648 3.742-.981zm11.387-5.464c-.074-.124-.272-.198-.57-.347-.297-.149-1.758-.868-2.031-.967-.272-.099-.47-.149-.669.149-.198.297-.768.967-.941 1.165-.173.198-.347.223-.644.074-.297-.149-1.255-.462-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.297-.347.446-.521.151-.172.2-.296.3-.495.099-.198.05-.372-.025-.521-.075-.148-.669-1.611-.916-2.206-.242-.579-.487-.501-.669-.51l-.57-.01c-.198 0-.52.074-.792.372s-1.04 1.016-1.04 2.479 1.065 2.876 1.213 3.074c.149.198 2.095 3.2 5.076 4.487.709.306 1.263.489 1.694.626.712.226 1.36.194 1.872.118.571-.085 1.758-.719 2.006-1.413.248-.695.248-1.29.173-1.414z"/>
                                </svg>
                                <span>{{ __('Lanjutkan Chat via WhatsApp') }}</span>
                            </a>
                        </div>
                    @endif
                </div>
            @endif

            <div class="grid grid-cols-1 lg:grid-cols-12 gap-8 items-start">
                
                <!-- Left Sidebar: Informasi Kontak Cepat -->
                <div class="lg:col-span-4 space-y-6">
                    <div class="bg-white p-7 rounded-3xl border border-gray-100 shadow-xs space-y-6">
                        <div>
                            <h3 class="text-lg font-bold text-[#820003]">{{ __('Hubungi Langsung') }}</h3>
                            <p class="text-xs text-gray-500">{{ __('Konsultasi cepat via WhatsApp atau Email') }}</p>
                        </div>

                        <div class="space-y-4 text-xs">
                            <a href="https://wa.me/6281217597109?text=Halo%20KOOTA%20SERVICES,%20saya%20ingin%20berkonsultasi." target="_blank" class="flex items-center gap-3 p-3.5 rounded-2xl bg-green-50 text-green-900 border border-green-200 hover:bg-green-100 transition-colors font-semibold">
                                <div class="w-8 h-8 rounded-xl bg-[#25d366] text-white flex items-center justify-center font-bold shrink-0">
                                    WA
                                </div>
                                <div>
                                    <span class="block text-[11px] text-green-700">Chat WhatsApp:</span>
                                    <span class="text-xs font-bold">0812-1759-7109</span>
                                </div>
                            </a>

                            <a href="mailto:kootaproduction@gmail.com" class="flex items-center gap-3 p-3.5 rounded-2xl bg-red-50 text-[#820003] border border-red-100 hover:bg-red-100/60 transition-colors font-semibold">
                                <div class="w-8 h-8 rounded-xl bg-[#820003] text-white flex items-center justify-center font-bold shrink-0">
                                    ✉
                                </div>
                                <div>
                                    <span class="block text-[11px] text-[#820003]">{{ __('Kirim Email:') }}</span>
                                    <span class="text-xs font-bold truncate">kootaproduction@gmail.com</span>
                                </div>
                            </a>
                        </div>

                        <div class="pt-2 border-t border-gray-100 text-xs space-y-2">
                            <p class="font-bold text-gray-900">{{ __('Area Cakupan Operasional:') }}</p>
                            <div class="flex flex-wrap gap-1.5">
                                <span class="px-2.5 py-1 rounded-lg bg-gray-100 text-gray-700 text-[11px] font-semibold">Surabaya</span>
                                <span class="px-2.5 py-1 rounded-lg bg-gray-100 text-gray-700 text-[11px] font-semibold">Malang</span>
                                <span class="px-2.5 py-1 rounded-lg bg-gray-100 text-gray-700 text-[11px] font-semibold">Bali</span>
                                <span class="px-2.5 py-1 rounded-lg bg-gray-100 text-gray-700 text-[11px] font-semibold">Jakarta</span>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Right Form Area -->
                <div class="lg:col-span-8" x-data="{ selectedService: '{{ old('service_type', $selectedService ?? 'Cleaning Service') }}' }">
                    <form action="{{ route('consultation.store') }}" method="POST" enctype="multipart/form-data" class="bg-white p-8 sm:p-10 rounded-3xl border border-gray-100 shadow-xs space-y-8">
                        @csrf

                        <!-- Section 1: Pilih Jenis Layanan -->
                        <div class="space-y-4">
                            <h3 class="text-lg font-bold text-gray-900">{{ __('Pilih Jenis Layanan') }}</h3>
                            
                            <input type="hidden" name="service_type" x-model="selectedService">

                            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-4 gap-4">
                                <!-- Option 1: Cleaning Service -->
                                <button type="button" @click="selectedService = 'Cleaning Service'" :class="selectedService === 'Cleaning Service' ? 'border-[#820003] bg-red-50 text-[#820003] shadow-xs' : 'border-gray-200 bg-white text-gray-800 hover:border-gray-300'" class="p-4 rounded-2xl border text-center transition-all flex flex-col items-center justify-center gap-2 group">
                                    <span class="text-xs font-bold">{{ __('Cleaning Service') }}</span>
                                </button>

                                <!-- Option 2: Pengangkutan Sampah -->
                                <button type="button" @click="selectedService = 'Pengangkutan Sampah'" :class="selectedService === 'Pengangkutan Sampah' ? 'border-[#820003] bg-red-50 text-[#820003] shadow-xs' : 'border-gray-200 bg-white text-gray-800 hover:border-gray-300'" class="p-4 rounded-2xl border text-center transition-all flex flex-col items-center justify-center gap-2 group">
                                    <span class="text-xs font-bold">{{ __('Pengangkutan Sampah') }}</span>
                                </button>

                                <!-- Option 3: Jasa Tukang & Renovasi -->
                                <button type="button" @click="selectedService = 'Jasa Tukang & Renovasi'" :class="selectedService === 'Jasa Tukang & Renovasi' ? 'border-[#820003] bg-red-50 text-[#820003] shadow-xs' : 'border-gray-200 bg-white text-gray-800 hover:border-gray-300'" class="p-4 rounded-2xl border text-center transition-all flex flex-col items-center justify-center gap-2 group">
                                    <span class="text-xs font-bold">{{ __('Jasa Tukang & Renovasi') }}</span>
                                </button>

                                <!-- Option 4: IPAL -->
                                <button type="button" @click="selectedService = 'IPAL'" :class="selectedService === 'IPAL' ? 'border-[#820003] bg-red-50 text-[#820003] shadow-xs' : 'border-gray-200 bg-white text-gray-800 hover:border-gray-300'" class="p-4 rounded-2xl border text-center transition-all flex flex-col items-center justify-center gap-2 group">
                                    <span class="text-xs font-bold">{{ __('IPAL') }}</span>
                                </button>
                            </div>
                        </div>

                        <!-- Section 2: Informasi Anda -->
                        <div class="space-y-6 pt-4 border-t border-gray-100">
                            <h3 class="text-lg font-bold text-gray-900">{{ __('Informasi Anda') }}</h3>

                            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                <!-- Nama Lengkap -->
                                <div class="space-y-2">
                                    <label class="block text-xs font-bold text-gray-700 uppercase">{{ __('Nama Lengkap') }}</label>
                                    <input type="text" name="name" value="{{ old('name') }}" placeholder="{{ __('Nama Anda atau Perusahaan') }}" required class="w-full px-4 py-3 rounded-xl border border-gray-200 focus:ring-2 focus:ring-[#820003] focus:border-[#820003] text-sm outline-none transition-all">
                                    @error('name') <span class="text-[11px] text-red-600">{{ $message }}</span> @enderror
                                </div>

                                <!-- No. WhatsApp -->
                                <div class="space-y-2">
                                    <label class="block text-xs font-bold text-gray-700 uppercase">{{ __('No. WhatsApp') }}</label>
                                    <input type="text" name="whatsapp" value="{{ old('whatsapp') }}" placeholder="0812 xxxx xxxx" required class="w-full px-4 py-3 rounded-xl border border-gray-200 focus:ring-2 focus:ring-[#820003] focus:border-[#820003] text-sm outline-none transition-all">
                                    @error('whatsapp') <span class="text-[11px] text-red-600">{{ $message }}</span> @enderror
                                </div>
                            </div>

                            <!-- Email -->
                            <div class="space-y-2">
                                <label class="block text-xs font-bold text-gray-700 uppercase">{{ __('Email') }}</label>
                                <input type="email" name="email" value="{{ old('email') }}" placeholder="email@perusahaan.com" required class="w-full px-4 py-3 rounded-xl border border-gray-200 focus:ring-2 focus:ring-[#820003] focus:border-[#820003] text-sm outline-none transition-all">
                                @error('email') <span class="text-[11px] text-red-600">{{ $message }}</span> @enderror
                            </div>

                            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                <!-- Lokasi -->
                                <div class="space-y-2">
                                    <label class="block text-xs font-bold text-gray-700 uppercase">{{ __('Lokasi Kota') }}</label>
                                    <select name="location" class="w-full px-4 py-3 rounded-xl border border-gray-200 focus:ring-2 focus:ring-[#820003] focus:border-[#820003] text-sm outline-none bg-white">
                                        <option value="Surabaya">Surabaya</option>
                                        <option value="Malang">Malang</option>
                                        <option value="Bali">Bali</option>
                                        <option value="Jakarta">Jakarta</option>
                                        <option value="Sidoarjo">Sidoarjo</option>
                                        <option value="Gresik">Gresik</option>
                                        <option value="Lainnya">{{ __('Lainnya') }}</option>
                                    </select>
                                </div>

                                <!-- Jenis Properti -->
                                <div class="space-y-2">
                                    <label class="block text-xs font-bold text-gray-700 uppercase">{{ __('Jenis Properti') }}</label>
                                    <select name="property_type" class="w-full px-4 py-3 rounded-xl border border-gray-200 focus:ring-2 focus:ring-[#820003] focus:border-[#820003] text-sm outline-none bg-white">
                                        <option value="Perkantoran / Gedung">{{ __('Perkantoran / Gedung') }}</option>
                                        <option value="Ruko / Komersial">{{ __('Ruko / Komersial') }}</option>
                                        <option value="Restoran / Cafe">{{ __('Restoran / Cafe') }}</option>
                                        <option value="Rumah Tinggal / Hunian">{{ __('Rumah Tinggal / Hunian') }}</option>
                                        <option value="Pabrik / Kawasan Industri">{{ __('Pabrik / Kawasan Industri') }}</option>
                                        <option value="Klinik / Rumah Sakit">{{ __('Klinik / Rumah Sakit') }}</option>
                                        <option value="Fasilitas Umum">{{ __('Fasilitas Umum') }}</option>
                                    </select>
                                </div>
                            </div>

                            <!-- Catatan Detail Kebutuhan -->
                            <div class="space-y-2">
                                <label class="block text-xs font-bold text-gray-700 uppercase">{{ __('Catatan Detail Kebutuhan') }}</label>
                                <textarea name="notes" rows="4" placeholder="{{ __('Ceritakan kebutuhan spesifik, perkiraan volume atau jadwal yang Anda inginkan...') }}" class="w-full px-4 py-3 rounded-xl border border-gray-200 focus:ring-2 focus:ring-[#820003] focus:border-[#820003] text-sm outline-none transition-all">{{ old('notes', request('notes')) }}</textarea>
                            </div>
                        </div>

                        <!-- Submit Button -->
                        <div class="pt-4 flex justify-end">
                            <button type="submit" class="px-8 py-3.5 rounded-xl bg-[#820003] hover:bg-[#ba1a15] text-white font-bold text-sm transition-all shadow-md flex items-center gap-2 active:scale-95">
                                <span>{{ __('Kirim Permintaan Konsultasi') }}</span>
                                <span>→</span>
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
@endsection
