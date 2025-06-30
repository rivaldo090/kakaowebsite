<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>@yield('title', 'Sistem Perawatan Bibit Kakao')</title>
  <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
  <style>
    #sidebar {
      transition: transform 0.3s ease-in-out;
      will-change: transform;
    }
  </style>
</head>
<body class="bg-gray-50 font-sans leading-normal tracking-normal">

  <!-- Tombol Hamburger -->
  <button id="menuToggle" class="fixed top-4 left-4 z-50 bg-green-700 text-white p-2 rounded-md shadow-md">
    <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
    </svg>
  </button>

  <!-- Sidebar -->
  <aside id="sidebar" class="fixed inset-y-0 left-0 w-64 bg-green-700 text-white transform -translate-x-full transition-transform duration-300 z-40">
    <div class="p-4">
      <h2 class="text-xl font-bold mb-4">Menu Sistem</h2>
      <ul class="space-y-4">
        <li><a href="{{ route('setting_wattering') }}" class="block bg-green-600 hover:bg-green-500 text-center py-3 rounded-lg shadow-md">Penyiraman</a></li>
        <li><a href="{{ route('setting_lighting') }}" class="block bg-yellow-600 hover:bg-yellow-500 text-center py-3 rounded-lg shadow-md">Pencahayaan</a></li>
        <li><a href="{{ route('pemupukan') }}" class="block bg-blue-600 hover:bg-blue-500 text-center py-3 rounded-lg shadow-md">Pemberian Pupuk</a></li>
        <li><a href="https://wa.me/083852743444" target="_blank" class="block bg-red-600 hover:bg-red-500 text-center py-3 rounded-lg shadow-md">Hubungi Admin</a></li>
      </ul>
    </div>
  </aside>

  <!-- Navbar -->
  <header class="bg-green-700 p-4 pl-20 shadow-lg">
    <div class="container mx-auto flex justify-between items-center">
      <div class="flex items-center space-x-2">
        <img src="{{ asset('img/begu.jpg') }}" alt="begu" class="h-10 w-10 rounded-full" />
        <a href="{{ route('dashboard') }}" class="text-white text-2xl font-bold">Perawatan Bibit Kakao</a>
      </div>
      <div class="flex items-center space-x-4">
        <a href="{{ route('dashboard') }}" class="text-white hover:text-green-300 font-bold">Dashboard</a>
        <a href="{{ route('about') }}" class="text-white hover:text-green-300 font-bold">About Us</a>
        <a href="{{ route('history') }}" class="text-white hover:text-green-300 font-bold">History</a>
        <div class="relative">
          <img src="{{ asset('img/profil.jpg') }}" alt="Profil" class="h-10 w-10 rounded-full cursor-pointer" id="profilePhoto" />
          <div class="absolute right-0 mt-2 w-48 bg-white rounded-lg shadow-lg z-10 hidden" id="profileMenu">
            <a href="{{ route('profil') }}" class="block px-4 py-2 text-gray-800 hover:bg-gray-100">Profil Anda</a>
            <form action="{{ route('logout') }}" method="POST" class="block">
              @csrf
              <button type="submit" class="w-full text-left px-4 py-2 text-gray-800 hover:bg-red-500 hover:text-white">
                Logout
              </button>
            </form>
          </div>
        </div>
      </div>
    </div>
  </header>

  <!-- Konten -->
  <main class="pl-4 pr-4 pt-8 transition-all duration-300" id="mainContent">
    @yield('content')
  </main>

  <!-- Footer -->
  <footer class="bg-green-700 text-white py-6 mt-12">
    <div class="container mx-auto text-center">
      <p class="text-lg font-semibold">Sistem Perawatan Bibit Kakao</p>
      <p class="text-sm">Dikembangkan oleh Tim Admin: Rivaldo</p>
      <p class="text-sm">Hak Cipta &copy; {{ date('Y') }} - Semua Hak Dilindungi</p>
    </div>
  </footer>

  <!-- Script -->
  <script>
    document.addEventListener('DOMContentLoaded', () => {
      const menuToggle = document.getElementById('menuToggle');
      const sidebar = document.getElementById('sidebar');
      const profilePhoto = document.getElementById('profilePhoto');
      const profileMenu = document.getElementById('profileMenu');

      // Toggle sidebar
      menuToggle.addEventListener('click', () => {
        console.log("Tombol hamburger diklik");
        sidebar.classList.toggle('-translate-x-full');
      });

      // Tutup sidebar jika klik di luar
      document.addEventListener('click', (event) => {
        if (!sidebar.contains(event.target) && !menuToggle.contains(event.target)) {
          sidebar.classList.add('-translate-x-full');
        }
      });

      // Toggle profil menu
      if (profilePhoto && profileMenu) {
        profilePhoto.addEventListener('click', () => {
          profileMenu.classList.toggle('hidden');
        });
      }
    });
  </script>

</body>
</html>
