@extends('layouts.main')

@section('title', 'Tentang Kami - Sistem Perawatan Bibit Kakao')

@section('content')

<div class="container mx-auto py-8 px-4">
        <h2 class="text-3xl font-bold mb-6">Pengaturan Pemberian Pupuk</h2>

       <form action="{{ route('pemupukan.store') }}" method="POST">
    @csrf
    <label>Jenis Pupuk:</label>
    <input type="text" name="jenis_pupuk" required>

    <label>Jumlah (gram/ml):</label>
    <input type="number" name="jumlah" required>

    <label>Tanggal Pemupukan:</label>
    <input type="date" name="fertilization_dates[]" required>
    <input type="date" name="fertilization_dates[]"> <!-- tambah jika lebih dari satu -->

    <button type="submit">Simpan</button>
</form>

    </div>
    <!-- // atur tanggal pemupukan -->
    <script>
        const fertilizationDatesContainer = document.getElementById('fertilization-dates');

        function addDateInput() {
            const newDateInput = document.createElement('input');
            newDateInput.type = 'date';
            newDateInput.name = 'fertilization_dates[]';
            newDateInput.className = 'w-full p-2 border rounded mb-4';
            fertilizationDatesContainer.parentNode.insertBefore(newDateInput, fertilizationDatesContainer.nextSibling);
        }
        const addDateButton = document.createElement('button');
        addDateButton.textContent = 'Tambah Tanggal';
        addDateButton.type = 'button';
        addDateButton.className = 'bg-green-500 text-white py-2 px-4 rounded mb-4';
        addDateButton.onclick = addDateInput;
        fertilizationDatesContainer.parentNode.insertBefore(addDateButton, fertilizationDatesContainer.nextSibling);
    </script>

@endsection
