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
                    <a href="{{ route('edit_profile') }}" class="block px-4 py-2 text-gray-800 hover:bg-gray-100">Pengaturan Profil</a>
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

<button id="menuToggle" class="top-4 left-4 z-50 bg-green-600 text-white p-2 rounded-md focus:outline-none shadow-md">
    <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
    </svg>
</button>
