@extends('layouts.main')

@section('title', 'Pengaturan Penyiraman - Sistem Perawatan Bibit Kakao')

@section('content')

@if (session('success'))
    <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4">
        {{ session('success') }}
    </div>
@endif

<div class="container mx-auto py-8 px-4">
    <h2 class="text-3xl font-bold mb-6">Pengaturan Penyiraman</h2>

    <form action="{{ route('penyiraman.store') }}" method="POST" class="bg-white p-6 rounded shadow-md">
        @csrf

        <!-- Kelembapan -->
        <div class="mb-4">
            <label for="min_humidity" class="block text-gray-700 font-semibold mb-2">Kelembapan Minimum (%)</label>
            <input type="number" name="min_humidity" id="min_humidity" required
                   class="w-full p-2 border border-gray-300 rounded" placeholder="Contoh: 40">
        </div>

        <div class="mb-4">
            <label for="max_humidity" class="block text-gray-700 font-semibold mb-2">Kelembapan Maksimum (%)</label>
            <input type="number" name="max_humidity" id="max_humidity" required
                   class="w-full p-2 border border-gray-300 rounded" placeholder="Contoh: 70">
        </div>

        <!-- Mode -->
        <div class="mb-4">
            <label for="mode" class="block text-gray-700 font-semibold mb-2">Mode Penyiraman</label>
            <select name="mode" id="mode" required class="w-full p-2 border border-gray-300 rounded">
                <option value="otomatis">Otomatis</option>
                <option value="manual">Manual</option>
            </select>
        </div>

        <!-- Jadwal -->
        <div class="mb-4">
            <h3 class="text-xl font-semibold text-gray-800">Jadwal Penyiraman</h3>

            <label for="jam_mulai" class="block text-gray-700 mb-2 mt-2">Jam Mulai</label>
            <input type="time" name="jam_mulai" id="jam_mulai" required class="w-full p-2 border border-gray-300 rounded">

            <label for="jam_selesai" class="block text-gray-700 mb-2 mt-2">Jam Selesai</label>
            <input type="time" name="jam_selesai" id="jam_selesai" required class="w-full p-2 border border-gray-300 rounded">
        </div>

        <!-- Submit -->
        <div class="mt-6">
            <button type="submit" class="bg-green-700 text-white px-4 py-2 rounded hover:bg-green-600">
                Simpan Pengaturan
            </button>
        </div>
    </form>
</div>

@endsection
