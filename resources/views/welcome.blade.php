<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Modul Pertemuan 1</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600&display=swap" rel="stylesheet">
    <style>
        body { font-family: 'Inter', sans-serif; }
    </style>
</head>
<body class="bg-[#0f0f0f] min-h-screen flex items-center justify-center p-4 antialiased relative">
    @if (Route::has('login'))
        <div class="absolute top-4 right-6 text-sm flex gap-4">
            @auth
                <a href="{{ url('/dashboard') }}" class="text-[#9ca3af] hover:text-white transition-colors focus:outline-none focus:ring-2 focus:ring-[#f8f8f8] focus:ring-offset-2 focus:ring-offset-[#1a1a1a] rounded p-1">Dashboard</a>
            @else
                <a href="{{ route('login') }}" class="text-[#9ca3af] hover:text-white transition-colors focus:outline-none focus:ring-2 focus:ring-[#f8f8f8] focus:ring-offset-2 focus:ring-offset-[#1a1a1a] rounded p-1">Log in</a>

                @if (Route::has('register'))
                    <a href="{{ route('register') }}" class="bg-[#2a2a2a] text-[#ffffff] px-4 py-1.5 rounded-[4px] border border-[#444444] hover:bg-[#333333] transition-colors focus:outline-none focus:ring-2 focus:ring-[#f8f8f8] focus:ring-offset-2 focus:ring-offset-[#1a1a1a]">Register</a>
                @endif
            @endauth
        </div>
    @endif

    <div class="bg-[#1a1a1a] border border-[#333333] w-full max-w-[800px] h-[350px] rounded-lg px-12 sm:px-[70px] flex flex-col justify-center shadow-lg">
        <h1 class="text-white font-semibold text-[17px]">Damar Sadewa</h1>
        <p class="text-[#9ca3af] text-[15px] mt-1 mb-5">20230140110</p>
        <div>
            <button class="bg-[#f8f8f8] text-[#111111] font-medium text-[14px] px-6 py-2.5 rounded-[4px] hover:bg-gray-200 transition-colors">
                Modul Pertemuan 1
            </button>
        </div>
    </div>
</body>
</html>
