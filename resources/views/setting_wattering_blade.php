@extends('layouts.main')

@section('title', 'Tentang Kami - Sistem Perawatan Bibit Kakao')

@section('content')

<div class="container mx-auto py-8 px-4">
        <h2 class="text-3xl font-bold mb-6">Pengaturan Penyiraman</h2>
        <form action="proses_penyiraman.php" method="POST" class="bg-white p-6 rounded shadow-md">
            <!-- Atur kelembapan -->
            <label class="block text-gray-700 mb-2">Kelembapan Minimum (%)</label>
            <input type="number" name="min_humidity" id="min_humidity" required class="w-full p-2 border rounded mb-4">

            <label class="block text-gray-700 mb-2">Kelembapan Maksimum (%)</label>
            <input type="number" name="max_humidity" id="max_humidity" required class="w-full p-2 border rounded mb-4">

            <!-- Atur jadwal penyiraman -->
            <div class="mb-4">
                <h3 class="text-xl font-semibold text-gray-800">Jadwal Penyiraman</h3>
                <label class="block text-gray-700 mb-2">Waktu Mulai</label>
                <input type="time" name="schedule_start" id="schedule_start" required class="w-full p-2 border rounded mb-4">
                
                <label class="block text-gray-700 mb-2">Waktu Berhenti</label>
                <input type="time" name="schedule_end" id="schedule_end" required class="w-full p-2 border rounded mb-4">
            </div>

            <button type="submit" class="bg-green-700 text-white px-4 py-2 rounded hover:bg-green-600">Simpan Pengaturan</button>
        </form>
    </div>
      
@endsection