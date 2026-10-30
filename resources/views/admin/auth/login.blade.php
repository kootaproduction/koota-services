<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Admin - KOOTA SERVICES</title>
    <link rel="icon" type="image/svg+xml" href="{{ asset('images/logo.svg') }}">
    
    <!-- Google Fonts Inter -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800;900&display=swap" rel="stylesheet">

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-[#1c1b1b] min-h-screen flex items-center justify-center p-4 relative overflow-hidden">
    <!-- Background glow -->
    <div class="absolute top-1/4 -left-20 w-80 h-80 bg-[#820003]/20 rounded-full blur-3xl pointer-events-none"></div>

    <div class="w-full max-w-md bg-white rounded-3xl p-8 sm:p-10 shadow-2xl space-y-6 relative z-10 border border-gray-100">
        <div class="text-center space-y-3">
            <div class="flex items-center justify-center gap-2.5 mx-auto">
                <img src="{{ asset('images/logo.svg') }}" alt="KOOTA SERVICES" class="h-12 w-auto object-contain">
                <span class="font-black text-xl tracking-tight text-gray-900">
                    KOOTA <span class="text-[#820003]">SERVICES</span>
                </span>
            </div>
            <h1 class="text-lg font-bold text-gray-900">Panel Manajemen Admin</h1>
            <p class="text-xs text-gray-500">Masuk untuk mengelola layanan, portofolio katalog, dan konsultasi</p>
        </div>

        @if($errors->any())
            <div class="p-3.5 rounded-xl bg-red-50 border border-red-200 text-red-700 text-xs font-semibold">
                {{ $errors->first() }}
            </div>
        @endif

        <!-- Petunjuk Kredensial Admin -->
        <div class="p-3.5 rounded-xl bg-gray-50 border border-gray-200 text-xs space-y-1">
            <p class="font-bold text-gray-800">Akses Khusus Admin:</p>
            <p class="text-gray-600">Username: <span class="font-mono font-bold text-[#820003]">admin</span> atau <span class="font-mono font-bold text-[#820003]">admin@kootaservice.com</span></p>
            <p class="text-gray-600">Password: <span class="font-mono font-bold text-[#820003]">admin123</span></p>
        </div>

        <form action="{{ route('admin.login.submit') }}" method="POST" class="space-y-4">
            @csrf
            <div class="space-y-1">
                <label class="block text-xs font-bold text-gray-700 uppercase">Username / Email Admin</label>
                <input type="text" name="login" value="{{ old('login', 'admin') }}" required class="w-full px-4 py-3 rounded-xl border border-gray-300 focus:ring-2 focus:ring-[#820003] focus:border-[#820003] outline-none text-xs sm:text-sm">
            </div>

            <div class="space-y-1">
                <label class="block text-xs font-bold text-gray-700 uppercase">Kata Sandi (Password)</label>
                <input type="password" name="password" value="admin123" required class="w-full px-4 py-3 rounded-xl border border-gray-300 focus:ring-2 focus:ring-[#820003] focus:border-[#820003] outline-none text-xs sm:text-sm">
            </div>

            <button type="submit" class="w-full py-3.5 rounded-xl bg-[#820003] hover:bg-[#ba1a15] text-white font-bold text-xs sm:text-sm shadow-md transition-all active:scale-95">
                Masuk Ke Panel Admin
            </button>
        </form>

        <div class="text-center pt-2">
            <a href="{{ route('home') }}" class="text-xs font-semibold text-gray-500 hover:text-[#820003] transition-colors">
                Kembali ke Website Publik
            </a>
        </div>
    </div>
</body>
</html>
