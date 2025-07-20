@extends('layouts.main')

@section('title', 'Pengaturan Pencahayaan - Sistem Perawatan Bibit Kakao')

@section('content')

<div class="container mx-auto py-12 px-4">
    <h2 class="text-4xl font-bold text-center text-gray-800 mb-8">Pengaturan Pencahayaan</h2>

    @if (session('success'))
        <div class="bg-green-100 text-green-800 p-4 rounded mb-6 text-center font-semibold">
            {{ session('success') }}
        </div>
    @endif

    <div class="bg-white p-8 rounded-lg shadow-lg max-w-xl mx-auto">
        <h3 class="text-2xl font-bold mb-6 text-green-600 text-center">Kontrol Manual Pencahayaan</h3>

        <form action="{{ route('pencahayaan.manual') }}" method="POST">
            @csrf

            <!-- Intensitas -->
            <div class="mb-6">
                <label for="intensitas" class="block text-gray-700 font-semibold mb-2">Intensitas Cahaya: <span id="nilai-intensitas">100</span>%</label>
                <input type="range" name="intensitas" id="intensitas" min="0" max="100" value="100" class="w-full">
            </div>

            <!-- Tombol kontrol -->
            <div class="flex justify-center gap-4">
                <button type="submit" name="status" value="on"
                    class="bg-green-500 text-white px-6 py-2 rounded hover:bg-green-600">Nyalakan</button>
                <button type="submit" name="status" value="off"
                    class="bg-red-500 text-white px-6 py-2 rounded hover:bg-red-600">Matikan</button>
            </div>
        </form>
    </div>
</div>

<!-- Script untuk memperbarui label intensitas -->
<script>
    const slider = document.getElementById('intensitas');
    const label = document.getElementById('nilai-intensitas');
    slider.addEventListener('input', function () {
        label.textContent = slider.value;
    });
</script>

@endsection
