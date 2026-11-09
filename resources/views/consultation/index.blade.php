@extends('layouts.app')

@section('title', __('Konsultasi & Reservasi Layanan') . ' - KOOTA SERVICES')

@section('content')
    <div class="relative bg-[#fcf9f8] min-h-screen pb-24 pt-4 sm:pt-8" 
         x-data="{ 
            selectedService: '{{ old('service_type', $selectedService ?? 'Pembersihan Rumah') }}',
            scheduleChoice: 'Fleksibel',
            photoPreview: null,
            photoName: '',
            photoSize: '',
            handlePhotoSelect(e) {
                const file = e.target.files[0];
                if (!file) return;
                this.photoName = file.name;
                this.photoSize = (file.size / 1024 / 1024).toFixed(2) + ' MB';
                this.photoPreview = URL.createObjectURL(file);
            },
            removePhoto() {
                this.photoPreview = null;
                this.photoName = '';
                this.photoSize = '';
                this.$refs.photoInput.value = '';
            },
            activeFaq: null
         }">
        
        <!-- Subtle Top Ambient Glow -->
        <div class="absolute inset-x-0 top-0 h-96 bg-gradient-to-b from-[#faeae7]/60 via-[#fcf5f4]/30 to-transparent pointer-events-none"></div>

        <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 space-y-10">

            <!-- Success State Toast / Banner -->
            @if(session('success'))
                <div class="overflow-hidden rounded-3xl border border-emerald-300 bg-gradient-to-r from-emerald-50 via-teal-50/70 to-emerald-50 p-6 sm:p-8 shadow-xl shadow-emerald-900/5">
                    <div class="flex flex-col sm:flex-row items-start sm:items-center justify-between gap-6">
                        <div class="space-y-1">
                            <h3 class="text-lg font-black text-emerald-950">{{ __('Permintaan Konsultasi Berhasil Terkirim!') }}</h3>
                            <p class="text-xs sm:text-sm text-emerald-800 leading-relaxed max-w-xl">
                                {{ session('success') }}
                            </p>
                        </div>

                        @if(session('wa_url'))
                            <a href="{{ session('wa_url') }}" target="_blank" 
                               class="inline-flex items-center justify-center rounded-2xl bg-[#25d366] hover:bg-[#20ba59] px-6 py-3.5 text-xs sm:text-sm font-extrabold text-white shadow-lg shadow-green-600/25 transition-all hover:-translate-y-0.5 active:scale-95 shrink-0">
                                <span>{{ __('Lanjutkan Chat via WhatsApp') }} &rarr;</span>
                            </a>
                        @endif
                    </div>
                </div>
            @endif

            <!-- 1. Clean Minimal Hero Section (Typography-Focused, No Clutter Icons) -->
            <div class="text-center max-w-3xl mx-auto space-y-4 pt-4 sm:pt-6">
                <!-- Trust Pill Badge -->
                <div class="inline-flex items-center gap-2 px-4 py-1.5 rounded-full bg-red-100/80 text-[#820003] border border-red-200/90 text-xs font-black uppercase tracking-wider">
                    <span>{{ __('Layanan Siaga & Estimasi Biaya Transparan') }}</span>
                </div>

                <!-- Main Headline -->
                <h1 class="text-3xl sm:text-4xl lg:text-5xl font-black text-[#1c1b1b] tracking-tight leading-[1.18]">
                    {{ __('Konsultasi & Reservasi Layanan Properti') }}
                </h1>

                <!-- Subtitle -->
                <p class="text-xs sm:text-sm md:text-base text-gray-600 leading-relaxed max-w-2xl mx-auto">
                    {{ __('Dapatkan analisis kebutuhan, jadwal survei lokasi tanpa biaya, serta rincian biaya yang jelas dari teknisi dan tim terpercaya KOOTA SERVICES.') }}
                </p>

                <!-- Trust Metrics Bar (No Emojis or Icons) -->
                <div class="pt-2 flex flex-wrap items-center justify-center gap-4 sm:gap-8 text-xs font-semibold text-gray-600">
                    <div>
                        <span class="text-[#820003] font-bold">4.9 / 5.0</span>
                        <span class="text-gray-500"> Kepuasan Klien (500+ Proyek)</span>
                    </div>
                    <span class="text-gray-300 hidden sm:inline">•</span>
                    <div>
                        <span class="font-bold text-gray-800">Respon WhatsApp</span>
                        <span class="text-gray-500"> Kurang dari 15 Menit</span>
                    </div>
                    <span class="text-gray-300 hidden sm:inline">•</span>
                    <div>
                        <span class="font-bold text-gray-800">Survei Lokasi</span>
                        <span class="text-gray-500"> Bebas Biaya</span>
                    </div>
                </div>
            </div>

            <!-- 2. Main 12-Column Layout Grid -->
            <div class="grid grid-cols-1 lg:grid-cols-12 gap-8 lg:gap-10 items-start">

                <!-- Left Column: Support Desk & Authority Info (4 Cols) -->
                <aside class="lg:col-span-4 space-y-6">
                    
                    <!-- Card 1: Live Support Consultant Card -->
                    <div class="rounded-3xl border border-gray-200/90 bg-white p-6 sm:p-7 shadow-xs space-y-5">
                        
                        <!-- Consultant Header with Live Indicator -->
                        <div class="pb-3 border-b border-gray-100">
                            <h3 class="text-base font-extrabold text-gray-900 leading-tight">
                                {{ __('Konsultan Siaga KOOTA') }}
                            </h3>
                            <p class="text-[11px] font-bold text-emerald-600 mt-1">
                                {{ __('Online & Siap Membantu') }}
                            </p>
                        </div>

                        <p class="text-xs text-gray-600 leading-relaxed">
                            {{ __('Punya kendala darurat, ingin negosiasi kontrak korporat, atau membutuhkan respon langsung detik ini?') }}
                        </p>

                        <!-- Direct WhatsApp Action Button (Clean Text Button) -->
                        <a href="https://wa.me/6281217597109?text=Halo%20KOOTA%20SERVICES,%20saya%20ingin%20berkonsultasi%20layanan%20properti." 
                           target="_blank"
                           rel="noopener noreferrer"
                           class="group flex items-center justify-between gap-3 p-4 rounded-2xl bg-[#25d366] hover:bg-[#20ba59] text-white shadow-md transition-all active:scale-98">
                            <div>
                                <span class="block text-[10px] font-bold uppercase tracking-wider text-green-100">{{ __('WhatsApp Siaga Resmi') }}</span>
                                <span class="block text-sm font-black tracking-tight">0812-1759-7109</span>
                            </div>
                            <span class="text-xs font-bold px-3 py-1.5 rounded-xl bg-white/20 text-white group-hover:translate-x-1 transition-transform">
                                {{ __('Chat Sekarang') }} &rarr;
                            </span>
                        </a>

                        <!-- Email Direct -->
                        <a href="mailto:kootaproduction@gmail.com?subject=Konsultasi%20Layanan%20KOOTA%20SERVICES" 
                           class="flex items-center justify-between gap-3 p-3.5 rounded-2xl bg-neutral-50 border border-gray-200/80 hover:bg-neutral-100/80 transition-all text-gray-700">
                            <div class="min-w-0">
                                <span class="block text-[10px] font-bold uppercase tracking-wider text-gray-500">{{ __('Email Resmi') }}</span>
                                <span class="block text-xs font-bold text-gray-900 truncate">kootaproduction@gmail.com</span>
                            </div>
                            <span class="text-xs font-bold text-gray-500">&rarr;</span>
                        </a>

                        <!-- Operating Hours Badge -->
                        <div class="pt-3 border-t border-gray-100 flex items-center justify-between text-[11px] text-gray-500 font-medium">
                            <span>{{ __('Jam Kerja Tim Survei:') }}</span>
                            <span class="font-bold text-gray-800">07.30 – 21.00 WIB</span>
                        </div>
                    </div>

                    <!-- Card 2: 3 Core Guarantees & Why KOOTA -->
                    <div class="rounded-3xl border border-gray-200/90 bg-white p-6 sm:p-7 shadow-xs space-y-4">
                        <h3 class="text-xs font-black uppercase tracking-wider text-[#820003]">
                            {{ __('Jaminan Layanan KOOTA') }}
                        </h3>

                        <ul class="space-y-3.5 text-xs text-gray-700">
                            <li class="flex items-start gap-3">
                                <div class="w-6 h-6 rounded-lg bg-red-50 text-[#820003] flex items-center justify-center font-bold text-xs shrink-0 mt-0.5">
                                    1
                                </div>
                                <div>
                                    <span class="font-bold text-gray-900 block">{{ __('Estimasi Transparan & Terukur') }}</span>
                                    <span class="text-gray-500 leading-relaxed">{{ __('Rincian material, volume pekerjaan, dan durasi kerja disepakati di awal tanpa biaya siluman.') }}</span>
                                </div>
                            </li>

                            <li class="flex items-start gap-3">
                                <div class="w-6 h-6 rounded-lg bg-red-50 text-[#820003] flex items-center justify-center font-bold text-xs shrink-0 mt-0.5">
                                    2
                                </div>
                                <div>
                                    <span class="font-bold text-gray-900 block">{{ __('Teknisi Terlatih & Berasuransi') }}</span>
                                    <span class="text-gray-500 leading-relaxed">{{ __('Kru berseragam resmi dengan verifikasi identitas, SOP sanitasi ketat, dan perlengkapan safety.') }}</span>
                                </div>
                            </li>

                            <li class="flex items-start gap-3">
                                <div class="w-6 h-6 rounded-lg bg-red-50 text-[#820003] flex items-center justify-center font-bold text-xs shrink-0 mt-0.5">
                                    3
                                </div>
                                <div>
                                    <span class="font-bold text-gray-900 block">{{ __('Garansi Hasil Rapi & Bersih') }}</span>
                                    <span class="text-gray-500 leading-relaxed">{{ __('Pengerjaan ulang tanpa biaya tambahan bila hasil akhir belum memenuhi checklist kepuasan Anda.') }}</span>
                                </div>
                            </li>
                        </ul>
                    </div>

                    <!-- Card 3: Coverage Area Strip -->
                    <div class="rounded-3xl border border-gray-200/90 bg-gradient-to-br from-neutral-900 to-neutral-800 text-white p-6 shadow-md space-y-2">
                        <span class="text-xs font-bold text-red-300 uppercase tracking-wider block">
                            {{ __('Wilayah Layanan Aktif') }}
                        </span>
                        <p class="text-xs text-gray-300 leading-relaxed">
                            Surabaya Raya (Surabaya, Sidoarjo, Gresik), Malang Raya, Bali (Denpasar, Badung, Sanur), dan DKI Jakarta.
                        </p>
                    </div>

                    <!-- Card 4: Quick Mini FAQ Accordion -->
                    <div class="rounded-3xl border border-gray-200/90 bg-white p-6 shadow-xs space-y-3">
                        <h4 class="text-xs font-black uppercase tracking-wider text-gray-800">
                            {{ __('Pertanyaan Umum (FAQ)') }}
                        </h4>

                        <div class="space-y-2 text-xs">
                            <div class="border border-gray-100 rounded-xl overflow-hidden">
                                <button type="button" @click="activeFaq = activeFaq === 1 ? null : 1" class="w-full p-3 text-left font-bold text-gray-800 flex items-center justify-between bg-gray-50/70 hover:bg-gray-100 transition-colors">
                                    <span>{{ __('Berapa lama estimasi biaya keluar?') }}</span>
                                    <span class="text-gray-400 font-mono text-sm" x-text="activeFaq === 1 ? '−' : '+'"></span>
                                </button>
                                <div x-show="activeFaq === 1" x-collapse class="p-3 text-gray-600 leading-relaxed bg-white border-t border-gray-100">
                                    {{ __('Untuk layanan standar, tim kami memberikan estimasi dalam waktu 15–30 menit via WhatsApp setelah spesifikasi properti diterima.') }}
                                </div>
                            </div>

                            <div class="border border-gray-100 rounded-xl overflow-hidden">
                                <button type="button" @click="activeFaq = activeFaq === 2 ? null : 2" class="w-full p-3 text-left font-bold text-gray-800 flex items-center justify-between bg-gray-50/70 hover:bg-gray-100 transition-colors">
                                    <span>{{ __('Apakah survei lokasi berbayar?') }}</span>
                                    <span class="text-gray-400 font-mono text-sm" x-text="activeFaq === 2 ? '−' : '+'"></span>
                                </button>
                                <div x-show="activeFaq === 2" x-collapse class="p-3 text-gray-600 leading-relaxed bg-white border-t border-gray-100">
                                    {{ __('Survei lokasi 100% GRATIS dan tanpa ikatan komitmen untuk seluruh wilayah operasional utama kami.') }}
                                </div>
                            </div>
                        </div>
                    </div>

                </aside>

                <!-- Right Column: Interactive Consultation & Booking Form (8 Cols) -->
                <div class="lg:col-span-8">
                    
                    <form action="{{ route('consultation.store') }}" 
                          method="POST" 
                          enctype="multipart/form-data" 
                          class="rounded-3xl border border-gray-200/90 bg-white shadow-xl shadow-gray-200/50 overflow-hidden">
                        @csrf

                        <!-- Form Header Banner -->
                        <div class="p-6 sm:p-8 bg-gradient-to-r from-red-50/50 via-[#fcf9f8] to-white border-b border-gray-100 flex flex-col sm:flex-row sm:items-center justify-between gap-4">
                            <div>
                                <h2 class="text-xl sm:text-2xl font-black text-gray-900 tracking-tight">
                                    {{ __('Formulir Pemesanan & Survei') }}
                                </h2>
                                <p class="text-xs sm:text-sm text-gray-500 mt-1">
                                    {{ __('Isi formulir di bawah ini untuk pencatatan jadwal tim dan penawaran estimasi biaya.') }}
                                </p>
                            </div>

                            <span class="text-[11px] font-bold text-gray-400 self-start sm:self-auto">
                                Terenkripsi & Terlindungi
                            </span>
                        </div>

                        <div class="p-6 sm:p-8 md:p-10 space-y-10">

                            <!-- ============================================== -->
                            <!-- STEP 1: PILIH JENIS LAYANAN (CLEAN CARDS)     -->
                            <!-- ============================================== -->
                            <div class="space-y-4">
                                <div class="flex items-center justify-between">
                                    <div class="flex items-center gap-2">
                                        <span class="w-6 h-6 rounded-full bg-[#820003] text-white text-xs font-black flex items-center justify-center">1</span>
                                        <h3 class="text-xs sm:text-sm font-black uppercase tracking-wider text-gray-900">
                                            {{ __('Pilih Jenis Layanan Utama') }} <span class="text-red-500">*</span>
                                        </h3>
                                    </div>
                                    <span class="text-[11px] text-gray-400 font-medium">{{ __('Klik salah satu opsi') }}</span>
                                </div>

                                <input type="hidden" name="service_type" x-model="selectedService">
                                <input type="hidden" name="schedule_preference" :value="scheduleChoice">

                                <div class="grid grid-cols-1 sm:grid-cols-3 gap-4">
                                    
                                    <!-- 1. Home Cleaning Card (Clean Minimal, No Icon Box) -->
                                    <div @click="selectedService = 'Pembersihan Rumah'"
                                         :class="selectedService === 'Pembersihan Rumah' || selectedService === 'Home Cleaning' || selectedService === 'Cleaning Service'
                                            ? 'border-[#820003] bg-gradient-to-br from-red-50/70 via-white to-red-50/30 ring-2 ring-[#820003]/20 shadow-md -translate-y-1'
                                            : 'border-gray-200 bg-[#fcfbfb] hover:border-gray-300 hover:bg-white'"
                                         class="relative rounded-2xl border p-5 cursor-pointer transition-all duration-200 flex flex-col justify-between min-h-[140px] group">
                                        
                                        <div class="flex items-center justify-between mb-2">
                                            <span class="text-[10px] font-extrabold uppercase tracking-wider text-[#820003]">
                                                {{ __('Facility Service') }}
                                            </span>
                                            <span class="w-5 h-5 rounded-full flex items-center justify-center transition-all"
                                                  :class="selectedService === 'Pembersihan Rumah' || selectedService === 'Home Cleaning' || selectedService === 'Cleaning Service' ? 'bg-[#820003] text-white shadow-sm' : 'border border-gray-300 text-transparent'">
                                                <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M5 13l4 4L19 7"/></svg>
                                            </span>
                                        </div>

                                        <div>
                                            <h4 class="text-base font-black text-gray-900 group-hover:text-[#820003] transition-colors">
                                                {{ __('Pembersihan Rumah') }}
                                            </h4>
                                            <p class="text-xs text-gray-500 mt-1 leading-snug">
                                                Deep cleaning, sedot tungau, sanitasi kamar mandi & pascarenovasi.
                                            </p>
                                        </div>
                                    </div>

                                    <!-- 2. Home Repair Card (Clean Minimal, No Icon Box) -->
                                    <div @click="selectedService = 'Perbaikan Rumah'"
                                         :class="selectedService === 'Perbaikan Rumah' || selectedService === 'Jasa Tukang & Renovasi'
                                            ? 'border-[#820003] bg-gradient-to-br from-red-50/70 via-white to-red-50/30 ring-2 ring-[#820003]/20 shadow-md -translate-y-1'
                                            : 'border-gray-200 bg-[#fcfbfb] hover:border-gray-300 hover:bg-white'"
                                         class="relative rounded-2xl border p-5 cursor-pointer transition-all duration-200 flex flex-col justify-between min-h-[140px] group">
                                        
                                        <div class="flex items-center justify-between mb-2">
                                            <span class="text-[10px] font-extrabold uppercase tracking-wider text-[#820003]">
                                                {{ __('Tukang & Renovasi') }}
                                            </span>
                                            <span class="w-5 h-5 rounded-full flex items-center justify-center transition-all"
                                                  :class="selectedService === 'Perbaikan Rumah' || selectedService === 'Jasa Tukang & Renovasi' ? 'bg-[#820003] text-white shadow-sm' : 'border border-gray-300 text-transparent'">
                                                <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M5 13l4 4L19 7"/></svg>
                                            </span>
                                        </div>

                                        <div>
                                            <h4 class="text-base font-black text-gray-900 group-hover:text-[#820003] transition-colors">
                                                {{ __('Perbaikan Rumah') }}
                                            </h4>
                                            <p class="text-xs text-gray-500 mt-1 leading-snug">
                                                Pipa bocor, atap rembes, cat dinding, kelistrikan & kusen.
                                            </p>
                                        </div>
                                    </div>

                                    <!-- 3. Waste Management Card (Clean Minimal, No Icon Box) -->
                                    <div @click="selectedService = 'Pengangkutan Sampah'"
                                         :class="selectedService === 'Pengangkutan Sampah'
                                            ? 'border-[#820003] bg-gradient-to-br from-red-50/70 via-white to-red-50/30 ring-2 ring-[#820003]/20 shadow-md -translate-y-1'
                                            : 'border-gray-200 bg-[#fcfbfb] hover:border-gray-300 hover:bg-white'"
                                         class="relative rounded-2xl border p-5 cursor-pointer transition-all duration-200 flex flex-col justify-between min-h-[140px] group">
                                        
                                        <div class="flex items-center justify-between mb-2">
                                            <span class="text-[10px] font-extrabold uppercase tracking-wider text-[#820003]">
                                                {{ __('Limbah & Puing') }}
                                            </span>
                                            <span class="w-5 h-5 rounded-full flex items-center justify-center transition-all"
                                                  :class="selectedService === 'Pengangkutan Sampah' ? 'bg-[#820003] text-white shadow-sm' : 'border border-gray-300 text-transparent'">
                                                <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M5 13l4 4L19 7"/></svg>
                                            </span>
                                        </div>

                                        <div>
                                            <h4 class="text-base font-black text-gray-900 group-hover:text-[#820003] transition-colors">
                                                {{ __('Pengangkutan Sampah') }}
                                            </h4>
                                            <p class="text-xs text-gray-500 mt-1 leading-snug">
                                                Sampah residensial, kafe/resto, puing semen & kayu sisa renovasi.
                                            </p>
                                        </div>
                                    </div>

                                </div>
                            </div>

                            <!-- ============================================== -->
                            <!-- STEP 2: LOKASI & JENIS PROPERTI               -->
                            <!-- ============================================== -->
                            <div class="space-y-5 pt-8 border-t border-gray-100">
                                <div class="flex items-center gap-2">
                                    <span class="w-6 h-6 rounded-full bg-[#820003] text-white text-xs font-black flex items-center justify-center">2</span>
                                    <h3 class="text-xs sm:text-sm font-black uppercase tracking-wider text-gray-900">
                                        {{ __('Informasi Properti & Lokasi') }} <span class="text-red-500">*</span>
                                    </h3>
                                </div>

                                <div class="grid grid-cols-1 md:grid-cols-2 gap-5">
                                    <!-- Lokasi Kota -->
                                    <div class="space-y-1.5">
                                        <label class="block text-xs font-bold text-gray-800">
                                            {{ __('Kota Operasional') }} <span class="text-red-500">*</span>
                                        </label>
                                        <select name="location" required class="w-full px-4 py-3 rounded-2xl border border-gray-200/90 bg-[#fdfdfd] text-xs sm:text-sm text-gray-900 font-medium focus:bg-white focus:border-[#820003] focus:ring-4 focus:ring-[#820003]/10 transition-all outline-none">
                                            <option value="Surabaya" {{ old('location') === 'Surabaya' ? 'selected' : '' }}>Surabaya</option>
                                            <option value="Sidoarjo" {{ old('location') === 'Sidoarjo' ? 'selected' : '' }}>Sidoarjo</option>
                                            <option value="Gresik" {{ old('location') === 'Gresik' ? 'selected' : '' }}>Gresik</option>
                                            <option value="Malang" {{ old('location') === 'Malang' ? 'selected' : '' }}>Malang Raya</option>
                                            <option value="Bali" {{ old('location') === 'Bali' ? 'selected' : '' }}>Bali (Denpasar & Sekitarnya)</option>
                                            <option value="Jakarta" {{ old('location') === 'Jakarta' ? 'selected' : '' }}>DKI Jakarta & Sekitarnya</option>
                                            <option value="Lainnya" {{ old('location') === 'Lainnya' ? 'selected' : '' }}>{{ __('Kota Lainnya') }}</option>
                                        </select>
                                        @error('location') <span class="text-[11px] text-red-600 block">{{ $message }}</span> @enderror
                                    </div>

                                    <!-- Jenis Properti -->
                                    <div class="space-y-1.5">
                                        <label class="block text-xs font-bold text-gray-800">
                                            {{ __('Tipe Properti / Bangunan') }} <span class="text-red-500">*</span>
                                        </label>
                                        <select name="property_type" required class="w-full px-4 py-3 rounded-2xl border border-gray-200/90 bg-[#fdfdfd] text-xs sm:text-sm text-gray-900 font-medium focus:bg-white focus:border-[#820003] focus:ring-4 focus:ring-[#820003]/10 transition-all outline-none">
                                            <option value="Rumah Tinggal / Hunian" {{ old('property_type') === 'Rumah Tinggal / Hunian' ? 'selected' : '' }}>Rumah Tinggal / Residensial</option>
                                            <option value="Apartemen / Studio" {{ old('property_type') === 'Apartemen / Studio' ? 'selected' : '' }}>Apartemen / Studio</option>
                                            <option value="Ruko / Tempat Usaha" {{ old('property_type') === 'Ruko / Tempat Usaha' ? 'selected' : '' }}>Ruko / Kantor Ruko</option>
                                            <option value="Restoran / Cafe / Rumah Makan" {{ old('property_type') === 'Restoran / Cafe / Rumah Makan' ? 'selected' : '' }}>Kafe / Restoran / Rumah Makan</option>
                                            <option value="Kantor / Gedung Bisnis" {{ old('property_type') === 'Kantor / Gedung Bisnis' ? 'selected' : '' }}>Gedung Kantor / Perusahaan</option>
                                            <option value="Pabrik / Gudang" {{ old('property_type') === 'Pabrik / Gudang' ? 'selected' : '' }}>Gudang / Pabrik Komersial</option>
                                            <option value="Lainnya" {{ old('property_type') === 'Lainnya' ? 'selected' : '' }}>{{ __('Lainnya') }}</option>
                                        </select>
                                        @error('property_type') <span class="text-[11px] text-red-600 block">{{ $message }}</span> @enderror
                                    </div>
                                </div>

                                <!-- Alamat Lengkap -->
                                <div class="space-y-1.5">
                                    <label class="block text-xs font-bold text-gray-800">
                                        {{ __('Alamat Lengkap Lokasi Properti') }}
                                        <span class="text-gray-400 font-normal">({{ __('Nama jalan, nomor rumah/unit, RT/RW, kelurahan/kecamatan') }})</span>
                                    </label>
                                    <textarea name="address" rows="2" placeholder="Contoh: Jl. Mayjen Sungkono No. 45, Dukuh Pakis, Surabaya Barat (Dekat Bundaran Satelit)..." class="w-full px-4 py-3 rounded-2xl border border-gray-200/90 bg-[#fdfdfd] text-xs sm:text-sm text-gray-900 font-medium focus:bg-white focus:border-[#820003] focus:ring-4 focus:ring-[#820003]/10 transition-all outline-none leading-relaxed">{{ old('address') }}</textarea>
                                    @error('address') <span class="text-[11px] text-red-600 block">{{ $message }}</span> @enderror
                                </div>
                            </div>

                            <!-- ============================================== -->
                            <!-- STEP 3: DATA PEMOHON & ESTIMASI JADWAL         -->
                            <!-- ============================================== -->
                            <div class="space-y-5 pt-8 border-t border-gray-100">
                                <div class="flex items-center gap-2">
                                    <span class="w-6 h-6 rounded-full bg-[#820003] text-white text-xs font-black flex items-center justify-center">3</span>
                                    <h3 class="text-xs sm:text-sm font-black uppercase tracking-wider text-gray-900">
                                        {{ __('Informasi Pemohon & Jadwal Survei') }} <span class="text-red-500">*</span>
                                    </h3>
                                </div>

                                <div class="grid grid-cols-1 md:grid-cols-2 gap-5">
                                    <!-- Nama Pemohon -->
                                    <div class="space-y-1.5">
                                        <label class="block text-xs font-bold text-gray-800">
                                            {{ __('Nama Lengkap / Instansi') }} <span class="text-red-500">*</span>
                                        </label>
                                        <input type="text" name="name" value="{{ old('name') }}" required placeholder="Contoh: Bpk. Hendra Gunawan" class="w-full px-4 py-3 rounded-2xl border border-gray-200/90 bg-[#fdfdfd] text-xs sm:text-sm text-gray-900 font-medium focus:bg-white focus:border-[#820003] focus:ring-4 focus:ring-[#820003]/10 transition-all outline-none">
                                        @error('name') <span class="text-[11px] text-red-600 block">{{ $message }}</span> @enderror
                                    </div>

                                    <!-- Nomor WhatsApp -->
                                    <div class="space-y-1.5">
                                        <label class="block text-xs font-bold text-gray-800">
                                            {{ __('Nomor WhatsApp Aktif') }} <span class="text-red-500">*</span>
                                        </label>
                                        <input type="tel" name="whatsapp" value="{{ old('whatsapp') }}" required placeholder="0812-xxxx-xxxx" class="w-full px-4 py-3 rounded-2xl border border-gray-200/90 bg-[#fdfdfd] text-xs sm:text-sm text-gray-900 font-medium focus:bg-white focus:border-[#820003] focus:ring-4 focus:ring-[#820003]/10 transition-all outline-none">
                                        @error('whatsapp') <span class="text-[11px] text-red-600 block">{{ $message }}</span> @enderror
                                    </div>
                                </div>

                                <div class="grid grid-cols-1 md:grid-cols-2 gap-5">
                                    <!-- Email -->
                                    <div class="space-y-1.5">
                                        <label class="block text-xs font-bold text-gray-800">
                                            {{ __('Alamat Email') }} <span class="text-red-500">*</span>
                                        </label>
                                        <input type="email" name="email" value="{{ old('email') }}" required placeholder="email@perusahaan.com" class="w-full px-4 py-3 rounded-2xl border border-gray-200/90 bg-[#fdfdfd] text-xs sm:text-sm text-gray-900 font-medium focus:bg-white focus:border-[#820003] focus:ring-4 focus:ring-[#820003]/10 transition-all outline-none">
                                        @error('email') <span class="text-[11px] text-red-600 block">{{ $message }}</span> @enderror
                                    </div>

                                    <!-- Pilihan Preferensi Waktu Kunjungan (Clean Buttons, No Emojis) -->
                                    <div class="space-y-1.5">
                                        <label class="block text-xs font-bold text-gray-800">
                                            {{ __('Preferensi Waktu Layanan / Survei') }}
                                        </label>
                                        
                                        <div class="grid grid-cols-3 gap-2">
                                            <button type="button" @click="scheduleChoice = 'Hari Ini'"
                                                    :class="scheduleChoice === 'Hari Ini' ? 'bg-[#820003] text-white font-bold border-[#820003] shadow-xs' : 'bg-gray-50 text-gray-700 border-gray-200 hover:bg-gray-100'"
                                                    class="py-2.5 px-2 rounded-xl border text-xs text-center font-medium transition-all">
                                                Hari Ini
                                            </button>
                                            <button type="button" @click="scheduleChoice = 'Besok'"
                                                    :class="scheduleChoice === 'Besok' ? 'bg-[#820003] text-white font-bold border-[#820003] shadow-xs' : 'bg-gray-50 text-gray-700 border-gray-200 hover:bg-gray-100'"
                                                    class="py-2.5 px-2 rounded-xl border text-xs text-center font-medium transition-all">
                                                Besok
                                            </button>
                                            <button type="button" @click="scheduleChoice = 'Fleksibel'"
                                                    :class="scheduleChoice === 'Fleksibel' ? 'bg-[#820003] text-white font-bold border-[#820003] shadow-xs' : 'bg-gray-50 text-gray-700 border-gray-200 hover:bg-gray-100'"
                                                    class="py-2.5 px-2 rounded-xl border text-xs text-center font-medium transition-all">
                                                Fleksibel
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- ============================================== -->
                            <!-- STEP 4: UPLOAD FOTO & CATATAN KEBUTUHAN       -->
                            <!-- ============================================== -->
                            <div class="space-y-5 pt-8 border-t border-gray-100">
                                <div class="flex items-center gap-2">
                                    <span class="w-6 h-6 rounded-full bg-[#820003] text-white text-xs font-black flex items-center justify-center">4</span>
                                    <h3 class="text-xs sm:text-sm font-black uppercase tracking-wider text-gray-900">
                                        {{ __('Foto Kondisi & Detail Kebutuhan') }}
                                    </h3>
                                </div>

                                <!-- Photo Upload Dropzone with Live Preview (Clean & Minimal) -->
                                <div class="space-y-2">
                                    <label class="block text-xs font-bold text-gray-800 flex items-center justify-between">
                                        <span>{{ __('Foto Lokasi / Kerusakan / Area Layanan') }} <span class="text-gray-400 font-normal">({{ __('Opsional, Max 5MB') }})</span></span>
                                        <span class="text-[11px] text-gray-400">JPG, PNG, WEBP</span>
                                    </label>

                                    <div class="relative rounded-2xl border-2 border-dashed border-gray-300 bg-gray-50/70 hover:bg-gray-50 transition-colors p-6 text-center">
                                        
                                        <!-- Template when image is selected -->
                                        <template x-if="photoPreview">
                                            <div class="space-y-3">
                                                <div class="relative inline-block mx-auto rounded-xl overflow-hidden border border-gray-200 shadow-sm max-h-48">
                                                    <img :src="photoPreview" alt="Preview Foto" class="h-44 w-auto object-cover rounded-xl">
                                                </div>
                                                <div class="flex items-center justify-center gap-3">
                                                    <span class="text-xs font-semibold text-gray-700 truncate max-w-xs" x-text="photoName + ' (' + photoSize + ')'"></span>
                                                    <button type="button" @click="removePhoto()" class="text-xs font-bold text-red-600 hover:text-red-700 underline">
                                                        {{ __('Hapus Foto') }}
                                                    </button>
                                                </div>
                                            </div>
                                        </template>

                                        <!-- Template when no image is selected -->
                                        <template x-if="!photoPreview">
                                            <div class="space-y-1 cursor-pointer py-2" @click="$refs.photoInput.click()">
                                                <p class="text-xs sm:text-sm font-bold text-gray-800">
                                                    {{ __('Klik untuk Mengunggah Foto') }}
                                                </p>
                                                <p class="text-[11px] text-gray-500">
                                                    {{ __('Lampirkan foto area yang kotor, bocor, rusak, atau tumpukan sampah untuk estimasi biaya kilat.') }}
                                                </p>
                                            </div>
                                        </template>

                                        <!-- Hidden Input -->
                                        <input type="file" 
                                               name="photo" 
                                               x-ref="photoInput" 
                                               accept="image/*" 
                                               @change="handlePhotoSelect($event)" 
                                               class="hidden">
                                    </div>
                                    @error('photo') <span class="text-[11px] text-red-600 block">{{ $message }}</span> @enderror
                                </div>

                                <!-- Catatan Detail Kebutuhan -->
                                <div class="space-y-1.5">
                                    <label class="block text-xs font-bold text-gray-800">
                                        {{ __('Catatan Spesifik Kebutuhan & Kendala Properti') }}
                                    </label>
                                    <textarea name="notes" rows="4" placeholder="Ceritakan detail kendala (misal: luas ruangan perkiraan, jumlah kamar mandi berkerak, pipa plafon bocor aktif, atau volume sampah yang perlu diangkut)..." class="w-full px-4 py-3 rounded-2xl border border-gray-200/90 bg-[#fdfdfd] text-xs sm:text-sm text-gray-900 font-medium focus:bg-white focus:border-[#820003] focus:ring-4 focus:ring-[#820003]/10 transition-all outline-none leading-relaxed">{{ old('notes', request('notes')) }}</textarea>
                                </div>
                            </div>

                            <!-- ============================================== -->
                            <!-- STEP 5: SUBMISSION & CONFIRMATION              -->
                            <!-- ============================================== -->
                            <div class="pt-8 border-t border-gray-100 space-y-4">
                                <div class="p-4 rounded-2xl bg-gray-50 border border-gray-200/70 text-[11px] sm:text-xs text-gray-600 leading-relaxed">
                                    {{ __('Data pemohon dijamin aman dan hanya digunakan oleh tim teknis KOOTA SERVICES untuk kebutuhan estimasi biaya serta konfirmasi jadwal survei lokasi.') }}
                                </div>

                                <div class="flex flex-col sm:flex-row items-center justify-between gap-4 pt-2">
                                    <p class="text-xs text-gray-500 text-center sm:text-left">
                                        {{ __('Estimasi biaya & konfirmasi akan dikirim ke WhatsApp Anda.') }}
                                    </p>

                                    <button type="submit" 
                                            class="w-full sm:w-auto inline-flex items-center justify-center px-8 py-4 rounded-2xl bg-gradient-to-r from-[#820003] via-[#9e0509] to-[#ac0c0c] hover:brightness-110 text-white font-black text-xs sm:text-sm shadow-xl shadow-red-950/20 hover:shadow-2xl hover:shadow-red-900/30 transition-all hover:-translate-y-0.5 active:scale-95">
                                        <span>{{ __('Kirim Permintaan Konsultasi & Jadwalkan Survei') }} &rarr;</span>
                                    </button>
                                </div>
                            </div>

                        </div>
                    </form>

                </div>

            </div>

        </div>
    </div>
@endsection
