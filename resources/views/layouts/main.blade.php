<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>@yield('title', 'Sistem Perawatan Bibit Kakao')</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-50 font-sans leading-normal tracking-normal">

    <!-- Navbar -->
    <header class="bg-green-700 p-4 shadow-lg">
        <div class="container mx-auto flex justify-between items-center">
            <div class="flex items-center space-x-2">
                <img src="{{ asset('img/foto_logo.png') }}" alt="Logo Kakao" class="h-10 w-10 rounded-full" />
                <a href="{{ route('dashboard') }}" class="text-white text-2xl font-bold">Perawatan Bibit Kakao</a>
            </div>
            <div class="flex items-center space-x-4">
                <a href="{{ route('dashboard') }}" class="text-white hover:text-green-300 font-bold">Dashboard</a>
                <a href="{{ route('about') }}" class="text-white hover:text-green-300 font-bold">About Us</a>
                <a href="{{ route('history') }}" class="text-white hover:text-green-300 font-bold">History</a>
                <div class="relative">
                    <img src="{{ asset('img/foto_logo.png') }}" alt="Profil" class="h-10 w-10 rounded-full cursor-pointer" id="profilePhoto" />
                    <div class="absolute right-0 mt-2 w-48 bg-white rounded-lg shadow-lg z-10 hidden" id="profileMenu">
                        <a href="{{ route('profile') }}" class="block px-4 py-2 text-gray-800 hover:bg-gray-100">Profil Anda</a>
                        <a href="{{ route('profile.edit') }}" class="block px-4 py-2 text-gray-800 hover:bg-gray-100">Pengaturan Profil</a>
                        <a href="{{ route('logout') }}" class="block px-4 py-2 text-gray-800 hover:bg-red-500 hover:text-white">Logout</a>


                    </div>
                </div>
            </div>
        </div>
        <script>
            const profilePhoto = document.getElementById('profilePhoto');
            const profileMenu = document.getElementById('profileMenu');
            profilePhoto.addEventListener('click', () => {
                profileMenu.classList.toggle('hidden');
            });
        </script>
    </header>

    <!-- Sidebar -->
    <aside id="sidebar" class="fixed inset-y-0 left-0 w-64 bg-green-700 text-white transform -translate-x-full transition-transform duration-300 z-40">
        <div class="p-4">
            <h2 class="text-xl font-bold mb-4">Menu Sistem</h2>
            <ul class="space-y-4">
                <li><a href="{{ route('settings.watering') }}" class="block bg-green-600 hover:bg-green-500 text-center py-3 rounded-lg shadow-md">Penyiraman</a></li>
                <li><a href="{{ route('settings.lighting') }}" class="block bg-yellow-600 hover:bg-yellow-500 text-center py-3 rounded-lg shadow-md">Pencahayaan</a></li>
                <li><a href="{{ route('settings.fertilization') }}" class="block bg-blue-600 hover:bg-blue-500 text-center py-3 rounded-lg shadow-md">Pemberian Pupuk</a></li>
                <li><a href="https://wa.me/083852743444" target="_blank" class="block bg-red-600 hover:bg-red-500 text-center py-3 rounded-lg shadow-md">Hubungi Admin</a></li>
            </ul>
        </div>
    </aside>

    <!-- Konten halaman -->
    <main class="container mx-auto py-12 px-4">
        @yield('content')
    </main>

    <!-- Footer -->
    <footer class="bg-green-700 text-white py-6">
        <div class="container mx-auto text-center">
            <p class="text-lg font-semibold">Sistem Perawatan Bibit Kakao</p>
            <p class="text-sm">Dikembangkan oleh Tim Admin: Rivaldo</p>
            <p class="text-sm">Hak Cipta &copy; {{ date('Y') }} - Semua Hak Dilindungi</p>
        </div>
    </footer>

    <script>
        // JS untuk sidebar toggle dan lainnya bisa ditambahkan di sini
    </script>

</body>
</html>
