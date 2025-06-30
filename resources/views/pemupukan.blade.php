@extends('layouts.main')

@section('title', 'Pengaturan Pemupukan - Sistem Perawatan Bibit Kakao')

@section('content')

<div class="container mx-auto py-8 px-4">
    <h2 class="text-3xl font-bold mb-6">Pengaturan Pemberian Pupuk</h2>

    @if (session('success'))
        <div class="bg-green-100 text-green-800 p-4 rounded mb-6 text-center font-semibold">
            {{ session('success') }}
        </div>
    @endif

    <form action="{{ route('pemupukan.store') }}" method="POST" class="bg-white p-6 rounded shadow-md">
        @csrf

        <div class="mb-4">
            <label class="block text-gray-700 font-semibold mb-2">Jenis Pupuk:</label>
            <input type="text" name="jenis_pupuk" required class="w-full p-2 border rounded">
        </div>

        <div class="mb-4">
            <label class="block text-gray-700 font-semibold mb-2">Jumlah (gram/ml):</label>
            <input type="number" name="jumlah" required class="w-full p-2 border rounded">
        </div>

        <div class="mb-4">
            <label class="block text-gray-700 font-semibold mb-2">Tanggal Pemupukan:</label>

            <div id="fertilization-dates">
                <input type="date" name="fertilization_dates[]" required class="w-full p-2 border rounded mb-2">
            </div>

            <button type="button" onclick="addDateInput()"
                class="bg-blue-500 text-white px-3 py-1 rounded hover:bg-blue-600">
                + Tambah Tanggal
            </button>
        </div>

        <button type="submit" class="bg-green-600 text-white py-2 px-6 rounded hover:bg-green-700">Simpan</button>
    </form>
</div>

<script>
    function addDateInput() {
        const container = document.getElementById('fertilization-dates');
        const input = document.createElement('input');
        input.type = 'date';
        input.name = 'fertilization_dates[]';
        input.required = true;
        input.className = 'w-full p-2 border rounded mb-2';
        container.appendChild(input);
    }
</script>

@endsection
