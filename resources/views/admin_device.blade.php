@extends('layouts.main')

@section('title', 'Daftar Device')

@section('content')
<div class="flex min-h-screen">
    @include('partials.sidebar-admin')

    <div class="flex-1">
        <!-- Header -->
        <header class="bg-white shadow p-4 flex justify-between items-center">
            <h1 class="text-2xl font-bold">Dashboard <span class="text-green-800">Admin</span></h1>
            <form action="{{ route('logout') }}" method="POST">
                @csrf
                <button class="bg-red-700 text-white px-4 py-2 rounded hover:bg-red-800">Keluar</button>
            </form>
        </header>

        <!-- Content -->
        <main class="p-6">
            <section class="bg-white p-6 rounded-lg shadow-md">
                <h2 class="text-xl font-bold mb-4">Device</h2>
                <a href="{{ route('admin.devices.create') }}" class="bg-blue-700 hover:bg-blue-800 text-white px-5 py-2.5 rounded mb-4 inline-block">Tambah Device</a>

                <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                    <table class="w-full text-sm text-left text-gray-500">
                        <thead class="text-xs text-gray-700 uppercase bg-gray-50">
                            <tr>
                                <th scope="col" class="px-6 py-3">No</th>
                                <th scope="col" class="px-6 py-3">Nama Device</th>
                                <th scope="col" class="px-6 py-3">ID Device</th>
                                <th scope="col" class="px-6 py-3">Status</th>
                                <th scope="col" class="px-6 py-3">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($devices as $index => $device)
                                <tr class="bg-white border-b hover:bg-gray-50">
                                    <td class="px-6 py-4 font-medium text-gray-900">{{ $index + 1 }}</td>
                                    <td class="px-6 py-4">{{ $device->device_name }}</td>
                                    <td class="px-6 py-4">{{ $device->device_id }}</td>
                                    <td class="px-6 py-4">{{ $device->device_status }}</td>
                                    <td class="px-6 py-4 text-right space-x-2">
                                        <a href="{{ route('admin.devices.edit', $device->device_id) }}" class="text-blue-600 hover:underline">Edit</a>
                                        <form action="{{ route('admin.devices.destroy', $device->device_id) }}" method="POST" class="inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="text-red-600 hover:underline" onclick="return confirm('Yakin ingin menghapus?')">Hapus</button>
                                        </form>
                                    </td>
                                </tr>
                            @empty
                                <tr><td colspan="5" class="text-center py-4">Tidak ada device.</td></tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </section>
        </main>
    </div>
</div>
@endsection
