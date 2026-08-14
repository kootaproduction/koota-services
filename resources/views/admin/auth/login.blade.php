<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Admin - KOOTA SERVICE</title>
    <link rel="icon" type="image/png" href="{{ asset('images/logo.png') }}">
    
    <!-- Google Fonts Inter -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-[#1c1b1b] min-h-screen flex items-center justify-center p-4">
    <div class="w-full max-w-md bg-white rounded-3xl p-8 sm:p-10 shadow-2xl space-y-6">
        <div class="text-center space-y-3">
            <div class="inline-block bg-white p-2 rounded-2xl shadow-xs mx-auto">
                <img src="{{ asset('images/logo.png') }}" alt="KOOTA SERVICE" class="h-14 w-auto object-contain mx-auto">
            </div>
            <h1 class="text-xl font-bold text-gray-900">Panel Manajemen Admin</h1>
            <p class="text-xs text-gray-500">Masuk untuk mengelola layanan, portofolio, dan konsultasi</p>
        </div>

        @if($errors->any())
            <div class="p-3 rounded-xl bg-red-50 text-red-600 text-xs font-semibold">
                {{ $errors->first() }}
            </div>
        @endif

        <form action="{{ route('admin.login.submit') }}" method="POST" class="space-y-4">
            @csrf
            <div class="space-y-1">
                <label class="block text-xs font-bold text-gray-700 uppercase">Email Admin</label>
                <input type="email" name="email" value="{{ old('email', 'admin@kootaservice.com') }}" required class="w-full px-4 py-2.5 rounded-xl border border-gray-300 focus:ring-2 focus:ring-[#820003] focus:border-[#820003] outline-none text-xs">
            </div>

            <div class="space-y-1">
                <label class="block text-xs font-bold text-gray-700 uppercase">Kata Sandi (Password)</label>
                <input type="password" name="password" value="password" required class="w-full px-4 py-2.5 rounded-xl border border-gray-300 focus:ring-2 focus:ring-[#820003] focus:border-[#820003] outline-none text-xs">
            </div>

            <button type="submit" class="w-full py-3 rounded-xl bg-[#820003] hover:bg-[#ba1a15] text-white font-bold text-xs shadow-md transition-all active:scale-95">
                Masuk Ke Panel Admin
            </button>
        </form>

        <div class="text-center pt-2">
            <a href="{{ route('home') }}" class="text-xs text-gray-500 hover:text-[#820003] transition-colors">
                ← Kembali ke Website Publik
            </a>
        </div>
    </div>
</body>
</html>
