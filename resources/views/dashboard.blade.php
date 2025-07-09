@extends('layouts.main')

@section('title', 'Dashboard - Sistem Perawatan Bibit Kakao')

@section('content')

{{-- Judul --}}
<h2 class="text-3xl font-bold text-center text-gray-800 mb-8 mt-8">Status Tanaman</h2>

{{-- Kartu Status Tanaman --}}
<div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8 px-4">
    <!-- Kelembapan Tanah -->
    <div class="bg-white p-8 rounded-lg shadow-lg text-center hover:scale-105 transition duration-300">
        <h3 class="text-2xl font-bold mb-4 text-green-600">Kelembapan Tanah</h3>
        <p id="kelembapan" class="text-3xl font-semibold text-gray-700">
            {{ $kelembapan ?? 'Belum ada data' }}
        </p>
    </div>

    <!-- Suhu -->
    <div class="bg-white p-8 rounded-lg shadow-lg text-center hover:scale-105 transition duration-300">
        <h3 class="text-2xl font-bold mb-4 text-green-600">Suhu</h3>
        <p id="suhu" class="text-3xl font-semibold text-gray-700">
            {{ $suhu !== null ? $suhu . ' °C' : 'Belum ada data' }}
        </p>
    </div>

    <!-- Status Cahaya -->
    <div class="bg-white p-8 rounded-lg shadow-lg text-center hover:scale-105 transition duration-300">
        <h3 class="text-2xl font-bold mb-4 text-green-600">Cahaya</h3>
        <p id="statusLampu" class="text-3xl font-semibold text-gray-700">
            {{ $statusLampu ?? 'non-aktif' }}
        </p>
    </div>
</div>

{{-- Tabel Status Komponen --}}
<h2 class="text-2xl font-semibold text-center text-gray-800 mt-16 mb-4">Status Komponen Sistem</h2>

<div class="overflow-x-auto px-4 mb-16">
    <table class="min-w-full bg-white border border-gray-200 rounded-lg shadow-md">
        <thead class="bg-green-600 text-white">
            <tr>
                <th class="py-3 px-6 text-left">Komponen</th>
                <th class="py-3 px-6 text-left">Status</th>
                <th class="py-3 px-6 text-left">Terakhir Diperbarui</th>
            </tr>
        </thead>
        <tbody>
            <tr class="border-t border-gray-200">
                <td class="py-3 px-6">Lampu (Cahaya)</td>
                <td id="statusLampu" class="py-3 px-6 font-semibold {{ $statusLampu == 'Aktif' ? 'text-green-600' : 'text-red-600' }}">
                    {{ $statusLampu ?? '-' }}
                </td>
                <td id="waktuLampu" class="py-3 px-6">{{ $waktuLampu ?? '-' }}</td>
            </tr>
            <tr class="border-t border-gray-200">
                <td class="py-3 px-6">Pompa Pemupukan</td>
                <td id="statusPemupukan" class="py-3 px-6 font-semibold {{ $statusPemupukan == 'Aktif' ? 'text-green-600' : 'text-red-600' }}">
                    {{ $statusPemupukan ?? '-' }}
                </td>
                <td id="waktuPemupukan" class="py-3 px-6">{{ $waktuPemupukan ?? '-' }}</td>
            </tr>
            <tr class="border-t border-gray-200">
                <td class="py-3 px-6">Pompa Penyiraman</td>
                <td id="statusPenyiraman" class="py-3 px-6 font-semibold {{ $statusPenyiraman == 'Aktif' ? 'text-green-600' : 'text-red-600' }}">
                    {{ $statusPenyiraman ?? '-' }}
                </td>
                <td id="waktuPenyiraman" class="py-3 px-6">{{ $waktuPenyiraman ?? '-' }}</td>
            </tr>
        </tbody>
    </table>
</div>

<script>
    function updateSensorData() {
        fetch('/dashboard/latest-sensor')
            .then(res => res.json())
            .then(data => {
                document.getElementById('kelembapan').innerText = data.kelembapan + ' %';
                document.getElementById('suhu').innerText = data.suhu + ' °C';
                document.getElementById('statusLampu').innerText = data.statusLampu;
                document.getElementById('statusPemupukan').innerText = data.statusPemupukan;
                document.getElementById('statusPenyiraman').innerText = data.statusPenyiraman;

                document.getElementById('waktuLampu').innerText = data.updatedAt;
                document.getElementById('waktuPemupukan').innerText = data.updatedAt;
                document.getElementById('waktuPenyiraman').innerText = data.updatedAt;
            });
    }

    setInterval(updateSensorData, 5000);
    updateSensorData();
</script>

@endsection
