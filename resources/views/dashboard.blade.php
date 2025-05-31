@extends('layouts.main')

@section('title', 'Dashboard - Sistem Perawatan Bibit Kakao')

@section('content')
<h2 class="text-3xl font-bold text-center text-gray-800 mb-8">Status Tanaman</h2>
<div id="realtime-status" class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8">
    <!-- Card Kelembapan Tanah -->
    <div class="bg-white p-8 rounded-lg shadow-lg text-center hover:scale-105 transition duration-300">
        <h3 class="text-2xl font-bold mb-4 text-green-600">Kelembapan Tanah</h3>
        <p id="soil-humidity" class="text-3xl font-semibold text-gray-700">
    {{ $kelembapan ?? 'Belum ada data' }}</p>

    </div>
    <!-- Card Suhu -->
    <div class="bg-white p-8 rounded-lg shadow-lg text-center hover:scale-105 transition duration-300">
        <h3 class="text-2xl font-bold mb-4 text-green-600">Suhu</h3>
       <p id="temperature" class="text-3xl font-semibold text-gray-700">
    {{ $suhu !== null ? $suhu . ' °C' : '°C' }}</p>
    </div>
    <!-- Card Cahaya -->
    <div class="bg-white p-8 rounded-lg shadow-lg text-center hover:scale-105 transition duration-300">
        <h3 class="text-2xl font-bold mb-4 text-green-600">Cahaya</h3>
        <p id="light-intensity" class="text-3xl font-semibold text-gray-700">aktif</p>
    </div>
</div>

<!-- Sisanya... (jadwal, about us, dll bisa kamu masukkan di sini) -->

@endsection
