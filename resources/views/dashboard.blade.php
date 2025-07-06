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
        <p class="text-3xl font-semibold text-gray-700">
            {{ $kelembapan ?? 'Belum ada data' }}
        </p>
    </div>

    <!-- Suhu -->
    <div class="bg-white p-8 rounded-lg shadow-lg text-center hover:scale-105 transition duration-300">
        <h3 class="text-2xl font-bold mb-4 text-green-600">Suhu</h3>
        <p class="text-3xl font-semibold text-gray-700">
            {{-- {{ $suhu !== null ? $suhu . ' °C' : 'Belum ada data' }}ini penting--}}
        </p>
    </div>

    <!-- Status Cahaya -->
    <div class="bg-white p-8 rounded-lg shadow-lg text-center hover:scale-105 transition duration-300">
        <h3 class="text-2xl font-bold mb-4 text-green-600">Cahaya</h3>
        <p class="text-3xl font-semibold text-gray-700">
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
                <td class="py-3 px-6 font-semibold {{ $statusLampu == 'Aktif' ? 'text-green-600' : 'text-red-600' }}">
                    {{ $statusLampu ?? '-' }}
                </td>
                <td class="py-3 px-6">{{ $waktuLampu ?? '-' }}</td>
            </tr>
            <tr class="border-t border-gray-200">
                <td class="py-3 px-6">Pompa Pemupukan</td>
                <td class="py-3 px-6 font-semibold {{ $statusPemupukan == 'Aktif' ? 'text-green-600' : 'text-red-600' }}">
                    {{ $statusPemupukan ?? '-' }}
                </td>
                <td class="py-3 px-6">{{ $waktuPemupukan ?? '-' }}</td>
            </tr>
            <tr class="border-t border-gray-200">
                <td class="py-3 px-6">Pompa Penyiraman</td>
                <td class="py-3 px-6 font-semibold {{ $statusPenyiraman == 'Aktif' ? 'text-green-600' : 'text-red-600' }}">
                    {{ $statusPenyiraman ?? '-' }}
                </td>
                <td class="py-3 px-6">{{ $waktuPenyiraman ?? '-' }}</td>
            </tr>
        </tbody>
    </table>
</div>

@endsection
