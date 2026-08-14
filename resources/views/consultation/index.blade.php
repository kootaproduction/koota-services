@extends('layouts.app')

@section('title', 'Form Konsultasi Kebutuhan Anda - KOOTA SERVICE')

@section('content')
    <!-- Hero Header -->
    <section class="bg-[#fcf9f8] py-12 md:py-16 text-center border-b border-gray-100">
        <div class="max-w-[1280px] mx-auto px-4 sm:px-6 lg:px-8 space-y-3">
            <h1 class="text-3xl sm:text-4xl lg:text-5xl font-bold text-[#820003] tracking-tight">
                Konsultasi Kebutuhan Anda
            </h1>
            <p class="text-xs sm:text-sm text-gray-600 max-w-2xl mx-auto leading-relaxed">
                Kami siap membantu mewujudkan solusi terbaik untuk properti dan fasilitas Anda. Silakan lengkapi form di bawah ini.
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
                        <h3 class="text-base font-bold">Permintaan Konsultasi Berhasil Dikirim!</h3>
                    </div>
                    <p class="text-xs sm:text-sm text-green-800 leading-relaxed pl-11">
                        {{ session('success') }}
                    </p>
                    @if(session('wa_url'))
                        <div class="pl-11 pt-2">
                            <a href="{{ session('wa_url') }}" target="_blank" class="inline-flex items-center gap-2 px-6 py-2.5 rounded-lg bg-[#25d366] text-white font-bold text-xs shadow-sm hover:bg-green-600 transition-colors">
                                <svg class="w-4 h-4 fill-current" viewBox="0 0 24 24">
                                    <path d="M.057 24l1.687-6.163c-1.041-1.804-1.588-3.849-1.587-5.946.003-6.556 5.338-11.891 11.893-11.891 3.181.001 6.167 1.24 8.413 3.488 2.245 2.248 3.481 5.236 3.48 8.414-.003 6.557-5.338 11.892-11.893 11.892-1.99-.001-3.951-.5-5.688-1.448l-6.305 1.654zm6.597-3.807c1.676.995 3.276 1.591 5.392 1.592 5.448 0 9.886-4.434 9.889-9.885.002-5.462-4.415-9.89-9.881-9.892-5.452 0-9.887 4.434-9.889 9.884-.001 2.225.651 3.891 1.746 5.634l-.999 3.648 3.742-.981zm11.387-5.464c-.074-.124-.272-.198-.57-.347-.297-.149-1.758-.868-2.031-.967-.272-.099-.47-.149-.669.149-.198.297-.768.967-.941 1.165-.173.198-.347.223-.644.074-.297-.149-1.255-.462-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.297-.347.446-.521.151-.172.2-.296.3-.495.099-.198.05-.372-.025-.521-.075-.148-.669-1.611-.916-2.206-.242-.579-.487-.501-.669-.51l-.57-.01c-.198 0-.52.074-.792.372s-1.04 1.016-1.04 2.479 1.065 2.876 1.213 3.074c.149.198 2.095 3.2 5.076 4.487.709.306 1.263.489 1.694.626.712.226 1.36.194 1.872.118.571-.085 1.758-.719 2.006-1.413.248-.695.248-1.29.173-1.414z"/>
                                </svg>
                                <span>Lanjutkan Chat via WhatsApp</span>
                            </a>
                        </div>
                    @endif
                </div>
            @endif

            <div class="grid grid-cols-1 lg:grid-cols-12 gap-8 items-start">
                
                <!-- Left Sidebar: Proses Layanan Stepper -->
                <div class="lg:col-span-3 bg-white p-6 rounded-2xl border border-gray-100 shadow-2xs space-y-6">
                    <div>
                        <h3 class="text-base font-bold text-[#820003]">Proses Layanan</h3>
                        <p class="text-[11px] text-gray-500">Tahapan pengerjaan kebutuhan Anda</p>
                    </div>

                    <div class="space-y-2">
                        <!-- Step 1 (Active) -->
                        <div class="flex items-center gap-3 p-2.5 rounded-xl bg-[#820003] text-white font-semibold text-xs shadow-2xs">
                            <span class="w-5 h-5 rounded-full bg-white/20 flex items-center justify-center text-[10px] font-bold">1</span>
                            <span>Konsultasi</span>
                        </div>

                        <!-- Step 2 -->
                        <div class="flex items-center gap-3 p-2.5 rounded-xl text-gray-600 font-medium text-xs">
                            <span class="w-5 h-5 rounded-full bg-gray-100 flex items-center justify-center text-[10px] font-bold">2</span>
                            <span>Assessment</span>
                        </div>

                        <!-- Step 3 -->
                        <div class="flex items-center gap-3 p-2.5 rounded-xl text-gray-600 font-medium text-xs">
                            <span class="w-5 h-5 rounded-full bg-gray-100 flex items-center justify-center text-[10px] font-bold">3</span>
                            <span>Menentukan Kebutuhan</span>
                        </div>

                        <!-- Step 4 -->
                        <div class="flex items-center gap-3 p-2.5 rounded-xl text-gray-600 font-medium text-xs">
                            <span class="w-5 h-5 rounded-full bg-gray-100 flex items-center justify-center text-[10px] font-bold">4</span>
                            <span>Penjadwalan</span>
                        </div>

                        <!-- Step 5 -->
                        <div class="flex items-center gap-3 p-2.5 rounded-xl text-gray-600 font-medium text-xs">
                            <span class="w-5 h-5 rounded-full bg-gray-100 flex items-center justify-center text-[10px] font-bold">5</span>
                            <span>Pengerjaan</span>
                        </div>

                        <!-- Step 6 -->
                        <div class="flex items-center gap-3 p-2.5 rounded-xl text-gray-600 font-medium text-xs">
                            <span class="w-5 h-5 rounded-full bg-gray-100 flex items-center justify-center text-[10px] font-bold">6</span>
                            <span>Selesai</span>
                        </div>
                    </div>
                </div>

                <!-- Right Form Area -->
                <div class="lg:col-span-9" x-data="{ selectedService: '{{ old('service_type', $selectedService) }}' }">
                    <form action="{{ route('consultation.store') }}" method="POST" enctype="multipart/form-data" class="bg-white p-8 sm:p-10 rounded-2xl border border-gray-100 shadow-xs space-y-8">
                        @csrf

                        <!-- Section 1: Pilih Jenis Layanan -->
                        <div class="space-y-4">
                            <h3 class="text-lg font-bold text-gray-900">Pilih Jenis Layanan</h3>
                            
                            <input type="hidden" name="service_type" x-model="selectedService">

                            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-4 gap-4">
                                <!-- Option 1: Cleaning Service -->
                                <button type="button" @click="selectedService = 'Cleaning Service'" :class="selectedService === 'Cleaning Service' ? 'border-[#820003] bg-red-50/40 shadow-xs' : 'border-gray-200 bg-white hover:border-gray-300'" class="p-5 rounded-xl border text-center transition-all flex flex-col items-center justify-center gap-2.5 group">
                                    <div class="w-10 h-10 rounded-lg bg-red-50 text-[#820003] flex items-center justify-center text-lg font-bold">
                                        <svg class="w-5 h-5 stroke-current" fill="none" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 3v4M3 5h4M6 17v4m-2-2h4m5-16l2.286 6.857L21 12l-5.714 2.143L13 21l-2.286-6.857L5 12l5.714-2.143L13 3z"/>
                                        </svg>
                                    </div>
                                    <span class="text-xs font-semibold text-gray-800">Cleaning Service</span>
                                </button>

                                <!-- Option 2: Pengangkutan Sampah -->
                                <button type="button" @click="selectedService = 'Pengangkutan Sampah'" :class="selectedService === 'Pengangkutan Sampah' ? 'border-[#007327] bg-green-50/40 shadow-xs' : 'border-gray-200 bg-white hover:border-gray-300'" class="p-5 rounded-xl border text-center transition-all flex flex-col items-center justify-center gap-2.5 group">
                                    <div class="w-10 h-10 rounded-lg bg-green-50 text-[#007327] flex items-center justify-center text-lg font-bold">
                                        <svg class="w-5 h-5 stroke-current" fill="none" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15"/>
                                        </svg>
                                    </div>
                                    <span class="text-xs font-semibold text-gray-800">Pengangkutan Sampah</span>
                                </button>

                                <!-- Option 3: Jasa Tukang Perbaikan & Renovasi -->
                                <button type="button" @click="selectedService = 'Jasa Tukang Perbaikan & Renovasi'" :class="selectedService === 'Jasa Tukang Perbaikan & Renovasi' ? 'border-[#820003] bg-red-50/40 shadow-xs' : 'border-gray-200 bg-white hover:border-gray-300'" class="p-5 rounded-xl border text-center transition-all flex flex-col items-center justify-center gap-2.5 group">
                                    <div class="w-10 h-10 rounded-lg bg-red-50 text-[#820003] flex items-center justify-center text-lg font-bold">
                                        <svg class="w-5 h-5 stroke-current" fill="none" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 4a2 2 0 114 0v1a1 1 0 001 1h3a1 1 0 011 1v3a1 1 0 01-1 1h-1a2 2 0 100 4h1a1 1 0 011 1v3a1 1 0 01-1 1h-3a1 1 0 01-1-1v-1a2 2 0 10-4 0v1a1 1 0 01-1 1H7a1 1 0 01-1-1v-3a1 1 0 00-1-1H4a2 2 0 110-4h1a1 1 0 001-1V7a1 1 0 011-1h3a1 1 0 001-1V4z"/>
                                        </svg>
                                    </div>
                                    <span class="text-xs font-semibold text-gray-800">Jasa Tukang & Renovasi</span>
                                </button>

                                <!-- Option 4: IPAL -->
                                <button type="button" @click="selectedService = 'IPAL'" :class="selectedService === 'IPAL' ? 'border-[#007327] bg-green-50/40 shadow-xs' : 'border-gray-200 bg-white hover:border-gray-300'" class="p-5 rounded-xl border text-center transition-all flex flex-col items-center justify-center gap-2.5 group">
                                    <div class="w-10 h-10 rounded-lg bg-green-50 text-[#007327] flex items-center justify-center text-lg font-bold">
                                        <svg class="w-5 h-5 stroke-current" fill="none" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19.428 15.428a2 2 0 00-1.022-.547l-2.387-.477a6 6 0 00-3.86.517l-.318.158a6 6 0 01-3.86.517L6.05 15.21a2 2 0 00-1.806.547M8 4h8l-1 1v5.172a2 2 0 00.586 1.414l5 5c1.26 1.26.367 3.414-1.415 3.414H4.828c-1.782 0-2.674-2.154-1.414-3.414l5-5A2 2 0 009 10.172V5L8 4z"/>
                                        </svg>
                                    </div>
                                    <span class="text-xs font-semibold text-gray-800">IPAL</span>
                                </button>
                            </div>
                        </div>

                        <!-- Section 2: Informasi Anda -->
                        <div class="space-y-6 pt-4 border-t border-gray-100">
                            <h3 class="text-lg font-bold text-gray-900">Informasi Anda</h3>

                            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                <!-- Nama Lengkap -->
                                <div class="space-y-2">
                                    <label class="block text-xs font-semibold text-gray-700">Nama Lengkap</label>
                                    <input type="text" name="name" value="{{ old('name') }}" placeholder="Masukkan nama Anda" required class="w-full px-4 py-2.5 rounded-lg border border-gray-200 focus:ring-2 focus:ring-[#820003] focus:border-[#820003] text-xs outline-none transition-all">
                                    @error('name') <span class="text-[11px] text-red-600">{{ $message }}</span> @enderror
                                </div>

                                <!-- No. WhatsApp -->
                                <div class="space-y-2">
                                    <label class="block text-xs font-semibold text-gray-700">No. WhatsApp</label>
                                    <input type="text" name="whatsapp" value="{{ old('whatsapp') }}" placeholder="08xx xxxx xxxx" required class="w-full px-4 py-2.5 rounded-lg border border-gray-200 focus:ring-2 focus:ring-[#820003] focus:border-[#820003] text-xs outline-none transition-all">
                                    @error('whatsapp') <span class="text-[11px] text-red-600">{{ $message }}</span> @enderror
                                </div>
                            </div>

                            <!-- Email -->
                            <div class="space-y-2">
                                <label class="block text-xs font-semibold text-gray-700">Email</label>
                                <input type="email" name="email" value="{{ old('email') }}" placeholder="email@perusahaan.com" required class="w-full px-4 py-2.5 rounded-lg border border-gray-200 focus:ring-2 focus:ring-[#820003] focus:border-[#820003] text-xs outline-none transition-all">
                                @error('email') <span class="text-[11px] text-red-600">{{ $message }}</span> @enderror
                            </div>

                            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                <!-- Lokasi -->
                                <div class="space-y-2">
                                    <label class="block text-xs font-semibold text-gray-700">Lokasi</label>
                                    <select name="location" class="w-full px-4 py-2.5 rounded-lg border border-gray-200 focus:ring-2 focus:ring-[#820003] focus:border-[#820003] text-xs outline-none bg-white">
                                        <option value="Surabaya">Surabaya</option>
                                        <option value="Sidoarjo">Sidoarjo</option>
                                        <option value="Gresik">Gresik</option>
                                        <option value="Malang">Malang</option>
                                        <option value="Jakarta">Jakarta</option>
                                        <option value="Lainnya">Lainnya</option>
                                    </select>
                                </div>

                                <!-- Jenis Properti -->
                                <div class="space-y-2">
                                    <label class="block text-xs font-semibold text-gray-700">Jenis Properti</label>
                                    <select name="property_type" class="w-full px-4 py-2.5 rounded-lg border border-gray-200 focus:ring-2 focus:ring-[#820003] focus:border-[#820003] text-xs outline-none bg-white">
                                        <option value="Rumah Tinggal">Rumah Tinggal</option>
                                        <option value="Perkantoran">Perkantoran</option>
                                        <option value="Ruko / Komersial">Ruko / Komersial</option>
                                        <option value="Pabrik / Industri">Pabrik / Industri</option>
                                        <option value="Fasilitas Umum">Fasilitas Umum</option>
                                    </select>
                                </div>
                            </div>

                            <!-- Catatan Detail Kebutuhan -->
                            <div class="space-y-2">
                                <label class="block text-xs font-semibold text-gray-700">Catatan Detail Kebutuhan</label>
                                <textarea name="notes" rows="4" placeholder="Ceritakan detail masalah atau kebutuhan properti Anda..." class="w-full px-4 py-2.5 rounded-lg border border-gray-200 focus:ring-2 focus:ring-[#820003] focus:border-[#820003] text-xs outline-none transition-all">{{ old('notes') }}</textarea>
                            </div>

                            <!-- Unggah Foto (Opsional) -->
                            <div class="space-y-2" x-data="{ fileName: '' }">
                                <label class="block text-xs font-semibold text-gray-700">Unggah Foto (Opsional)</label>
                                <div class="relative border-2 border-dashed border-gray-200 rounded-xl p-6 text-center hover:bg-gray-50 transition-colors cursor-pointer">
                                    <input type="file" name="photo" @change="fileName = $event.target.files[0] ? $event.target.files[0].name : ''" accept="image/*" class="absolute inset-0 w-full h-full opacity-0 cursor-pointer">
                                    <div class="space-y-2">
                                        <div class="w-8 h-8 rounded-full bg-red-50 text-[#820003] mx-auto flex items-center justify-center">
                                            <svg class="w-4 h-4 stroke-current" fill="none" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-8l-4-4m0 0L8 8m4-4v12"/>
                                            </svg>
                                        </div>
                                        <p class="text-xs font-semibold text-gray-800" x-text="fileName || 'Klik untuk upload foto'"></p>
                                        <p class="text-[10px] text-gray-400">Foto lokasi/masalah (Max 5MB)</p>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Submit Button -->
                        <div class="pt-4 flex justify-end">
                            <button type="submit" class="px-8 py-3.5 rounded-xl bg-[#820003] hover:bg-[#ba1a15] text-white font-bold text-xs sm:text-sm transition-all shadow-sm flex items-center gap-2 active:scale-95">
                                <span>Kirim Permintaan Konsultasi</span>
                                <span>→</span>
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
@endsection
