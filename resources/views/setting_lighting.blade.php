@extends('layouts.main')

@section('title', 'Tentang Kami - Sistem Perawatan Bibit Kakao')

@section('content')

 <div class="container mx-auto py-12 px-4">
        <h2 class="text-4xl font-bold text-center text-gray-800 mb-8">Pengaturan Pencahayaan</h2>

        <!-- Status -->
        <?php if (isset($status)) : ?>
            <div class="bg-green-100 text-green-800 p-4 rounded mb-6 text-center font-semibold">
                <?php echo $status; ?>
            </div>
        <?php endif; ?>

        <!-- Tombol On/Off -->
        <div class="bg-white p-8 rounded-lg shadow-lg mb-8 text-center">
            <h3 class="text-2xl font-bold mb-4 text-green-600">Kontrol Manual</h3>
            <form action="proses_pencahayaan.php" method="POST">
                <button type="submit" name="manual_control" value="1" class="bg-green-500 text-white px-4 py-2 rounded hover:bg-green-600">On</button>
                <button type="submit" name="manual_control" value="2" class="bg-red-500 text-white px-4 py-2 rounded hover:bg-red-600">Off</button>
            </form>
        </div>

        <!-- Pengaturan Jadwal dengan Waktu Mulai dan Selesai -->
        <div class="bg-white p-8 rounded-lg shadow-lg text-center">
            <h3 class="text-2xl font-bold mb-4 text-green-600">Pengaturan Jadwal</h3>
            <p class="text-gray-600 mb-4">Atur waktu mulai dan selesai untuk pencahayaan otomatis.</p>
            <form method="POST" action="proses_pencahayaan.php">
                <label for="schedule_start">Schedule On (Jam):</label>
                <input type="time" name="schedule_start" id="schedule_start" required><br>

                <label for="schedule_end">Schedule Off (Jam):</label>
                <input type="time" name="schedule_end" id="schedule_end" required><br>

                <button type="submit" class="bg-green-600 text-white py-2 px-6 rounded-full mr-2 hover:bg-green-700">Simpan</button>
            </form>


        </div>
    </div>
    
@endsection