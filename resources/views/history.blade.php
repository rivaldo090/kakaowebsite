@extends('layouts.main')

@section('title', 'Riwayat Perawatan - Sistem Perawatan Bibit Kakao')

@section('content')

<h2 class="text-3xl font-bold text-center text-gray-800 mb-8">Riwayat Perawatan Tanaman</h2>

<div class="overflow-x-auto">
    <table class="min-w-full bg-white border border-gray-200 shadow-md rounded-lg">
        <thead class="bg-green-600 text-white">
            <tr>
                <th class="py-3 px-4 text-left">Tanggal</th>
                <th class="py-3 px-4 text-left">Jenis Perawatan</th>
                <th class="py-3 px-4 text-left">Jam Mulai</th>
                <th class="py-3 px-4 text-left">Jam Selesai</th>
            </tr>
        </thead>
        <tbody class="text-gray-700">
            @forelse ($histories as $history)
                <tr class="border-t hover:bg-gray-100">
                    <td class="py-2 px-4">{{ \Carbon\Carbon::parse($history->tanggal)->format('d-m-Y') }}</td>
                    <td class="py-2 px-4 capitalize">{{ $history->jenis }}</td>
                    <td class="py-2 px-4">{{ \Carbon\Carbon::parse($history->jam_mulai)->format('H:i') }}</td>
                    <td class="py-2 px-4">{{ \Carbon\Carbon::parse($history->jam_selesai)->format('H:i') }}</td>
                </tr>
            @empty
                <tr>
                    <td colspan="4" class="py-4 px-4 text-center text-gray-500">Belum ada riwayat perawatan.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>

@endsection
