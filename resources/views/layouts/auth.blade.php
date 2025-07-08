<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>@yield('title', 'Media Perawatan Bibit Kakao')</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100 font-sans leading-normal tracking-normal">

    <!-- Navbar -->
    <nav class="bg-green-600 text-white p-4 shadow">
        <div class="container mx-auto flex justify-between items-center">
            <a href="/" class="text-lg font-bold">Media Perawatan Bibit Kakao</a>
            <div class="space-x-4">
                <a href="{{ route('login') }}" class="hover:underline">Login</a>
                <a href="{{ route('login_admin') }}" class="hover:underline">login admin</a>
            </div>
        </div>
    </nav>

    <!-- Konten utama -->
    <main class="container mx-auto mt-10 px-4">
        @yield('content')
    </main>