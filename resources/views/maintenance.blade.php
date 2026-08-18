<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sedang Dalam Pemeliharaan - KOOTA SERVICES</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-[#1c1b1b] text-white font-sans antialiased min-h-screen flex items-center justify-center p-6 relative overflow-hidden">
    <!-- Subtle Background Glows -->
    <div class="absolute top-1/4 -left-20 w-96 h-96 bg-[#820003]/30 rounded-full blur-3xl pointer-events-none"></div>
    <div class="absolute bottom-1/4 -right-20 w-96 h-96 bg-[#ba1a15]/20 rounded-full blur-3xl pointer-events-none"></div>

    <div class="max-w-xl w-full text-center space-y-8 relative z-10 bg-neutral-900/80 backdrop-blur-xl p-8 sm:p-12 rounded-3xl border border-neutral-800 shadow-2xl">
        <!-- Logo -->
        <div class="flex justify-center">
            <div class="flex items-center gap-3 bg-white/5 px-5 py-2.5 rounded-2xl border border-white/10">
                <img src="{{ asset('images/logo-white.svg') }}" alt="KOOTA SERVICES" class="h-10 w-auto object-contain">
                <span class="font-extrabold text-lg sm:text-xl tracking-tight text-white">
                    KOOTA <span class="text-[#ff4d4d]">SERVICES</span>
                </span>
            </div>
        </div>

        <!-- Status Pill -->
        <div class="inline-flex items-center gap-2 px-4 py-1.5 rounded-full bg-red-950/80 border border-red-800/60 text-red-300 text-xs font-semibold">
            <span class="w-2 h-2 rounded-full bg-red-500 animate-ping"></span>
            <span>Maintenance Mode / Sedang Pemeliharaan</span>
        </div>

        <!-- Headline -->
        <div class="space-y-3">
            <h1 class="text-3xl sm:text-4xl font-bold tracking-tight text-white">
                Kami Akan Segera Kembali
            </h1>
            <p class="text-xs sm:text-sm text-neutral-300 leading-relaxed max-w-md mx-auto">
                {{ $message ?? 'Website KOOTA SERVICES saat ini sedang dalam proses pemeliharaan dan pembaruan sistem untuk memberikan pengalaman layanan terbaik bagi Anda.' }}
            </p>
        </div>

        <!-- Quick Contacts -->
        <div class="p-6 rounded-2xl bg-white/5 border border-white/10 space-y-3 text-xs text-neutral-300">
            <p class="font-semibold text-white">Butuh bantuan darurat atau konsultasi langsung?</p>
            <div class="flex flex-col sm:flex-row items-center justify-center gap-3 pt-1">
                <a href="https://wa.me/6281217597109?text=Halo%20KOOTA%20SERVICES,%20saya%20ingin%20berkonsultasi%20mengenai%20layanan." target="_blank" class="inline-flex items-center gap-2 px-6 py-2.5 rounded-xl bg-[#25d366] hover:bg-[#20ba59] text-white font-bold transition-all shadow-md active:scale-95">
                    <svg class="w-4 h-4 fill-current" viewBox="0 0 24 24">
                        <path d="M.057 24l1.687-6.163c-1.041-1.804-1.588-3.849-1.587-5.946.003-6.556 5.338-11.891 11.893-11.891 3.181.001 6.167 1.24 8.413 3.488 2.245 2.248 3.481 5.236 3.48 8.414-.003 6.557-5.338 11.892-11.893 11.892-1.99-.001-3.951-.5-5.688-1.448l-6.305 1.654zm6.597-3.807c1.676.995 3.276 1.591 5.392 1.592 5.448 0 9.886-4.434 9.889-9.885.002-5.462-4.415-9.89-9.881-9.892-5.452 0-9.887 4.434-9.889 9.884-.001 2.225.651 3.891 1.746 5.634l-.999 3.648 3.742-.981zm11.387-5.464c-.074-.124-.272-.198-.57-.347-.297-.149-1.758-.868-2.031-.967-.272-.099-.47-.149-.669.149-.198.297-.768.967-.941 1.165-.173.198-.347.223-.644.074-.297-.149-1.255-.462-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.297-.347.446-.521.151-.172.2-.296.3-.495.099-.198.05-.372-.025-.521-.075-.148-.669-1.611-.916-2.206-.242-.579-.487-.501-.669-.51l-.57-.01c-.198 0-.52.074-.792.372s-1.04 1.016-1.04 2.479 1.065 2.876 1.213 3.074c.149.198 2.095 3.2 5.076 4.487.709.306 1.263.489 1.694.626.712.226 1.36.194 1.872.118.571-.085 1.758-.719 2.006-1.413.248-.695.248-1.29.173-1.414z"/>
                    </svg>
                    <span>Chat WhatsApp: 0812-1759-7109</span>
                </a>
            </div>
        </div>
    </div>
</body>
</html>
