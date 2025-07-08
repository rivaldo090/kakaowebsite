<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Admin</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100">

    <div class="flex min-h-screen">
        <!-- Main Content -->
        <div class="flex-1 flex flex-col">
            <!-- Header -->
            <header class="bg-white shadow p-4 flex justify-between items-center">
                <h1 class="text-2xl font-bold text-gray-800">Dashboard <span class="text-green-700">Admin</span></h1>
                <form action="{{ route('logout') }}" method="POST">
                    @csrf
                    <button type="submit" class="bg-red-600 hover:bg-red-700 text-white px-4 py-2 rounded">
                        Keluar
                    </button>
                </form>
            </header>

            <!-- Content -->
            <main class="p-6">
                <section class="bg-white p-6 rounded-lg shadow">
                    <div class="flex justify-between items-center mb-6">
                        <h2 class="text-xl font-semibold text-gray-800">Statistik</h2>
                        <div class="flex space-x-2">
                            <a href="{{ route('register') }}" class="bg-green-600 hover:bg-green-700 text-white px-4 py-2 rounded">
                                + Tambah User Baru
                            </a>
                            <a href="{{ route('admin.devices.create') }}" class="bg-green-600 hover:bg-green-700 text-white px-4 py-2 rounded">
                                + Tambah Device Baru
                            </a>
                        </div>
                    </div>

                    <!-- Statistik -->
                    <div class="grid grid-cols-2 md:grid-cols-4 gap-4 mb-6">
                        <div class="bg-green-100 p-4 rounded-lg text-center">
                            <p class="text-3xl font-bold">{{ $total_user ?? 0 }}</p>
                            <p class="text-gray-600">Total User</p>
                        </div>
                        <div class="bg-green-100 p-4 rounded-lg text-center">
                            <p class="text-3xl font-bold">{{ $total_device ?? 0 }}</p>
                            <p class="text-gray-600">Total Device</p>
                        </div>
                    </div>

                    <!-- List Data -->
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <!-- Daftar User -->
                        <div class="bg-gray-50 p-4 rounded-lg shadow-sm">
                            <h3 class="text-lg font-semibold mb-3">Daftar User</h3>
                            <ul class="space-y-2 max-h-64 overflow-y-auto">
                                @forelse ($users as $user)
                                    <li class="flex justify-between items-center bg-white p-2 rounded shadow-sm">
                                        <span>{{ $user->username ?? $user->name }}</span>
                                        <button onclick="showPopup('ID User: {{ $user->id }}')" class="bg-blue-500 hover:bg-blue-600 text-white text-sm px-3 py-1 rounded">
                                            Detail
                                        </button>
                                    </li>
                                @empty
                                    <li class="text-gray-500">Tidak ada user.</li>
                                @endforelse
                            </ul>
                        </div>

                        <!-- Daftar Device -->
                        <div class="bg-gray-50 p-4 rounded-lg shadow-sm">
                            <h3 class="text-lg font-semibold mb-3">Daftar Device</h3>
                            <ul class="space-y-2 max-h-64 overflow-y-auto">
                                @forelse ($devices as $device)
                                    <li class="flex justify-between items-center bg-white p-2 rounded shadow-sm">
                                        <span>{{ $device->device_name }}</span>
                                        <button onclick="showPopup('ID Device: {{ $device->device_id }}')" class="bg-blue-500 hover:bg-blue-600 text-white text-sm px-3 py-1 rounded">
                                            Detail
                                        </button>
                                    </li>
                                @empty
                                    <li class="text-gray-500">Tidak ada device.</li>
                                @endforelse
                            </ul>
                        </div>
                    </div>
                </section>
            </main>
        </div>

        <!-- Modal -->
        <div id="popup" class="hidden fixed inset-0 bg-black bg-opacity-50 flex justify-center items-center z-50">
            <div class="bg-white p-6 rounded-lg shadow-md w-72 text-center">
                <h4 class="text-lg font-bold mb-4">Informasi</h4>
                <p id="popupContent" class="text-gray-800 text-xl mb-4"></p>
                <button onclick="closePopup()" class="bg-red-500 hover:bg-red-600 text-white px-4 py-2 rounded">
                    Tutup
                </button>
            </div>
        </div>
    </div>

    <script>
        function showPopup(text) {
            document.getElementById('popupContent').textContent = text;
            document.getElementById('popup').classList.remove('hidden');
        }

        function closePopup() {
            document.getElementById('popup').classList.add('hidden');
        }
    </script>
</body>
</html>
