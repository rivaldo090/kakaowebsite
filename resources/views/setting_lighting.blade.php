@extends('layouts.main')

@section('title', 'Pengaturan Pencahayaan - Sistem Perawatan Bibit Kakao')

@section('content')

<div class="container mx-auto py-12 px-4">
    <h2 class="text-4xl font-bold text-center text-gray-800 mb-8">Pengaturan Pencahayaan</h2>

    <!-- Status dari Session -->
    @if (session('success'))
        <div class="bg-green-100 text-green-800 p-4 rounded mb-6 text-center font-semibold">
            {{ session('success') }}
        </div>
    @endif

    <!-- Kontrol Manual -->
    <div class="bg-white p-8 rounded-lg shadow-lg mb-8 text-center">
        <h3 class="text-2xl font-bold mb-4 text-green-600">Kontrol Manual</h3>

        <form action="{{ route('pencahayaan.manual') }}" method="POST">
            @csrf
            <button type="submit" name="manual_control" value="on"
                class="bg-green-500 text-white px-4 py-2 rounded hover:bg-green-600">On</button>
            <button type="submit" name="manual_control" value="off"
                class="bg-red-500 text-white px-4 py-2 rounded hover:bg-red-600">Off</button>
        </form>
    </div>

    <!-- Pengaturan Jadwal Otomatis -->
    <div class="bg-white p-8 rounded-lg shadow-lg text-center">
        <h3 class="text-2xl font-bold mb-4 text-green-600">Pengaturan Jadwal</h3>
        <p class="text-gray-600 mb-4">Atur waktu mulai dan selesai untuk pencahayaan otomatis.</p>

        <form method="POST" action="{{ route('setting_lighting.store') }}">
            @csrf

            <div class="mb-4">
                <label for="intensitas" class="block mb-2 font-semibold">Intensitas Cahaya (%)</label>
                <input type="number" name="intensitas" id="intensitas" required class="w-full p-2 border rounded" placeholder="Contoh: 80">
            </div>

            <div class="mb-4">
                <label for="jam_mulai" class="block mb-2 font-semibold">Waktu Mulai</label>
                <input type="time" name="jam_mulai" id="jam_mulai" required class="w-full p-2 border rounded">
            </div>

            <div class="mb-4">
                <label for="jam_selesai" class="block mb-2 font-semibold">Waktu Selesai</label>
                <input type="time" name="jam_selesai" id="jam_selesai" required class="w-full p-2 border rounded">
            </div>

            <button type="submit" class="bg-green-600 text-white py-2 px-6 rounded-full hover:bg-green-700">Simpan</button>
        </form>
    </div>
</div>

@endsection
