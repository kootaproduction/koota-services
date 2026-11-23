<!-- BANNER CTA KONSULTASI PREMIER (UNIFIED DESIGN ACROSS ALL PAGES) -->
<section class="py-16 sm:py-20 bg-slate-50 border-b border-gray-100">
    <div class="max-w-[1280px] mx-auto px-4 sm:px-6 lg:px-8 space-y-8">
        @if(isset($hook) && $hook)
            <!-- Optional Contextual Hook Heading -->
            <div class="text-center max-w-3xl mx-auto space-y-2">
                <h3 class="text-2xl sm:text-3xl font-extrabold text-[#0f172a] tracking-tight">
                    {{ $hook }}
                </h3>
                <p class="text-xs sm:text-sm text-gray-600">
                    {{ __('Hubungi kami sekarang untuk konsultasi gratis dan penawaran terbaik sesuai kebutuhan Anda.') }}
                </p>
            </div>
        @endif

        <!-- Card Container Clean White (Hilangkan Background Biru, Ganti Warna Putih) -->
        <div class="relative bg-white rounded-3xl overflow-hidden shadow-xl border border-gray-200/90 text-gray-900">
            <!-- Subtle Ambient Background Accents -->
            <div aria-hidden="true" class="absolute -top-24 -right-24 w-80 h-80 rounded-full bg-red-50/50 blur-3xl pointer-events-none"></div>
            <div aria-hidden="true" class="absolute -bottom-24 -left-24 w-80 h-80 rounded-full bg-slate-100/50 blur-3xl pointer-events-none"></div>

            <div class="grid grid-cols-1 lg:grid-cols-12 items-center relative z-10">
                <!-- Left Content -->
                <div class="lg:col-span-7 p-8 sm:p-12 lg:p-14 space-y-4">
                    <!-- Badge -->
                    <div class="inline-flex items-center gap-2 px-3 py-1 rounded-full bg-red-50 text-[#ac0c0c] text-xs font-semibold tracking-wide border border-red-100">
                        <span class="w-2 h-2 rounded-full bg-[#ac0c0c]"></span>
                        <span>{{ __('KONSULTASI BEBAS BIAYA') }}</span>
                    </div>

                    <!-- Title -->
                    <h3 class="text-2xl sm:text-3xl lg:text-4xl font-extrabold text-gray-900 tracking-tight leading-snug">
                        {{ __('Konsultasi Masalah dan Perawatan Rumah Gratis') }}
                    </h3>

                    <!-- Description -->
                    <p class="text-gray-600 text-xs sm:text-sm sm:leading-relaxed max-w-xl">
                        {{ __('Ceritakan kebutuhan Anda, kami siap bantu jadwalkan kunjungan tenaga ahli untuk solusi hunian bersih, rapi, dan terawat.') }}
                    </p>

                    <!-- Buttons -->
                    <div class="pt-4 flex flex-wrap items-center gap-3">
                        @php
                            $ctaWaMessage = isset($service) && $service
                                ? ('Halo KOOTA SERVICES, saya ingin konsultasi layanan ' . $service->title . '.')
                                : 'Halo KOOTA SERVICES, saya ingin berkonsultasi.';
                        @endphp
                        <a href="https://wa.me/6281217597109?text={{ urlencode($ctaWaMessage) }}" target="_blank" rel="noopener noreferrer" class="inline-flex items-center gap-2.5 px-7 py-3.5 rounded-xl bg-[#ac0c0c] hover:bg-[#8f0a0a] text-white font-bold text-xs sm:text-sm shadow-md hover:shadow-lg transition-all hover:scale-105 active:scale-95">
                            <svg class="w-4 h-4 fill-current" viewBox="0 0 24 24">
                                <path d="M.057 24l1.687-6.163c-1.041-1.804-1.588-3.849-1.587-5.946.003-6.556 5.338-11.891 11.893-11.891 3.181.001 6.167 1.24 8.413 3.488 2.245 2.248 3.481 5.236 3.48 8.414-.003 6.557-5.338 11.892-11.893 11.892-1.99-.001-3.951-.5-5.688-1.448l-6.305 1.654zm6.597-3.807c1.676.995 3.276 1.591 5.392 1.592 5.448 0 9.886-4.434 9.889-9.885.002-5.462-4.415-9.89-9.881-9.892-5.452 0-9.887 4.434-9.889 9.884-.001 2.225.651 3.891 1.746 5.634l-.999 3.648 3.742-.981zm11.387-5.464c-.074-.124-.272-.198-.57-.347-.297-.149-1.758-.868-2.031-.967-.272-.099-.47-.149-.669.149-.198.297-.768.967-.941 1.165-.173.198-.347.223-.644.074-.297-.149-1.255-.462-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.297-.347.446-.521.151-.172.2-.296.3-.495.099-.198.05-.372-.025-.521-.075-.148-.669-1.611-.916-2.206-.242-.579-.487-.501-.669-.51l-.57-.01c-.198 0-.52.074-.792.372s-1.04 1.016-1.04 2.479 1.065 2.876 1.213 3.074c.149.198 2.095 3.2 5.076 4.487.709.306 1.263.489 1.694.626.712.226 1.36.194 1.872.118.571-.085 1.758-.719 2.006-1.413.248-.695.248-1.29.173-1.414z"/>
                            </svg>
                            <span>{{ __('Konsultasi via WhatsApp') }}</span>
                        </a>

                        <a href="{{ route('consultation.index') }}" class="inline-flex items-center px-6 py-3.5 rounded-xl border border-gray-300 hover:border-gray-400 bg-white hover:bg-gray-50 text-gray-800 font-semibold text-xs sm:text-sm shadow-xs transition-all hover:scale-105 active:scale-95">
                            <span>{{ __('Form Reservasi') }}</span>
                        </a>
                    </div>
                </div>

                <!-- Right Image: Kenzo Yanuar (CEO Koota Production) with clean warm executive studio -->
                <div class="lg:col-span-5 relative flex justify-center lg:justify-end items-end pt-4 lg:pt-0 overflow-hidden">
                    <img src="{{ asset('images/kenzo-yanuar.png') }}" alt="Kenzo Yanuar - CEO Koota Production" class="w-auto h-72 sm:h-80 md:h-96 object-contain object-bottom select-none">
                </div>
            </div>
        </div>
    </div>
</section>
