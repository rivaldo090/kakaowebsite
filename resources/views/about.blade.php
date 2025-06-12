@extends('layouts.main')

@section('title', 'Tentang Kami - Sistem Perawatan Bibit Kakao')

@section('content')

<div class="max-w-4xl mx-auto px-4 py-8">
    <h2 class="text-3xl font-bold text-center text-green-700 mb-6">Tentang Sistem Perawatan Bibit Kakao</h2>

    <p class="text-lg text-gray-700 leading-relaxed mb-4">
        Aplikasi ini merupakan sistem pemantauan dan perawatan bibit kakao berbasis IoT yang dikembangkan untuk memudahkan proses penyiraman dan pemeliharaan tanaman secara otomatis maupun manual.
    </p>

    <p class="text-lg text-gray-700 leading-relaxed mb-4">
        Sistem ini dilengkapi dengan sensor kelembaban tanah dan suhu/kelembaban udara, serta dikendalikan menggunakan Raspberry Pi. Data disimpan secara real-time dan ditampilkan melalui antarmuka web dan aplikasi mobile.
    </p>

    <p class="text-lg text-gray-700 leading-relaxed mb-4">
        Kami bertujuan untuk membantu petani atau peneliti dalam memonitor kondisi tanaman secara efisien, serta memberikan sistem perawatan yang hemat energi dan air.
    </p>

    <div class="mt-8 text-center">
        <span class="text-sm text-gray-500">© {{ date('Y') }} Sistem Perawatan Bibit Kakao. All rights reserved.</span>
    </div>
</div>

@endsection
