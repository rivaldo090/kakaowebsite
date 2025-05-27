@extends('layouts.main')

@section('title', 'Dashboard Admin')

@section('content')
<div class="flex min-h-screen">
    <!-- Sidebar -->
    <aside class="w-64 bg-green-700 text-white flex-shrink-0">
        <div class="p-4 text-center font-bold text-xl">Admin Panel</div>
        <nav class="mt-4">
            <ul class="space-y-2">
                <li><a href="{{ route('admin.dashboard') }}" class="block px-4 py-2 hover:bg-green-600">Dashboard</a></li>
                <li><a href="{{ route('admin.users') }}" class="block px-4 py-2 hover:bg-green-600">Daftar User</a></li>
                <li><a href="{{ route('admin.devices') }}" class="block px-4 py-2 hover:bg-green-600">Daftar Device</a></li>
            </ul>
        </nav>
    </aside>

    <!-- Main Content -->
    <div class="flex-1">
        <!-- Header -->
        <header class="bg-white shadow p-4 flex justify-between items-center">
            <h1 class="text-2xl font-bold">Dashboard <span class="text-green-800">Admin</span></h1>
            <form action="{{ route('logout') }}" method="POST">
                @csrf
                <button type="submit" class="bg-red-700 text-white px-4 py-2 rounded hover:bg-red-800">Keluar</button>
            </form>
        </header>

        <!-- Content -->
        <main class="p-6">
            <section class="bg-white p-6 rounded-lg shadow-md">
                <h2 class="text-xl font-bold mb-4">Dashboard</h2>

                <div class="grid grid-cols-2 gap-4 mb-6">
                    <div class="bg-green-100 p-4 rounded-lg text-center">
                        <p class="text-2xl font-bold">{{ $total_user }}</p>
                        <p class="text-gray-600">Total User</p>
                    </div>
                    <div class="bg-green-100 p-4 rounded-lg text-center">
                        <p class="text-2xl font-bold">{{ $total_device }}</p>
                        <p class="text-gray-600">Total Device</p>
                    </div>
                </div>

                <div class="grid grid-cols-2 gap-4">
                    <!-- Daftar Konsumen -->
                    <div class="bg-gray-50 p-4 rounded-lg">
                        <h3 class="font-bold mb-2">Daftar Konsumen</h3>
                        <ul class="space-y-2">
                            @foreach ($konsumen as $k)
                                <li class="flex justify-between items-center">
                                    <span>{{ $k->username }}</span>
                                    <button class="bg-blue-500 text-white px-2 py-1 rounded text-sm hover:bg-blue-600"
                                        onclick="showUserId('{{ $k->user_id }}')">
                                        Detail
                                    </button>
                                </li>
                            @endforeach
                        </ul>
                    </div>

                    <!-- Daftar Device -->
                    <div class="bg-gray-50 p-4 rounded-lg">
                        <h3 class="font-bold mb-2">Daftar Device</h3>
                        <ul class="space-y-2">
                            @foreach ($produk as $p)
                                <li class="flex justify-between items-center">
                                    <span>{{ $p->device_name }}</span>
                                    <button class="bg-blue-500 text-white px-2 py-1 rounded text-sm hover:bg-blue-600"
                                        onclick="showUserId('{{ $p->user_id }}')">
                                        Detail
                                    </button>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>

                <!-- Popup Modal -->
                <div id="userIdPopup" class="hidden fixed inset-0 bg-gray-800 bg-opacity-50 flex justify-center items-center">
                    <div class="bg-white p-6 rounded-lg shadow-md w-64">
                        <h4 class="text-xl font-bold mb-4">User ID</h4>
                        <p id="userIdDisplay" class="text-gray-700 text-lg"></p>
                        <button class="bg-red-500 text-white px-4 py-2 mt-4 rounded hover:bg-red-600"
                            onclick="closePopup()">Close</button>
                    </div>
                </div>

            </section>
        </main>
    </div>
</div>

<script>
    function showUserId(userId) {
        document.getElementById('userIdDisplay').textContent = userId;
        document.getElementById('userIdPopup').classList.remove('hidden');
    }

    function closePopup() {
        document.getElementById('userIdPopup').classList.add('hidden');
    }
</script>
@endsection
