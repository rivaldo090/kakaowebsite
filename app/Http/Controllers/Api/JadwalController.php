<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Pupuk;
use App\Models\Pencahayaan;
use App\Models\Wattering;

class JadwalController extends Controller
{
    // Simpan pengaturan penyiraman
    public function simpanPenyiraman(Request $request)
    {
        $validated = $request->validate([
            'start_time' => 'required|date_format:H:i',
            'end_time'   => 'required|date_format:H:i',
            'min_soil'   => 'required|integer|min:0|max:100',
            'max_soil'   => 'required|integer|min:0|max:100',
            'mode'       => 'required|in:otomatis,manual',
        ]);

        $data = Wattering::create($validated);

        return response()->json([
            'status' => 'success',
            'message' => 'Pengaturan penyiraman berhasil disimpan',
            'data' => $data,
        ], 201);
    }

    // Simpan pengaturan pencahayaan
    public function simpanPencahayaan(Request $request)
    {
        $validated = $request->validate([
            'intensitas' => 'required|integer|min:0|max:100',
            'jam_mulai'  => 'required|date_format:H:i',
            'jam_selesai'=> 'required|date_format:H:i',
        ]);

        $data = Pencahayaan::create($validated);

        return response()->json([
            'status' => 'success',
            'message' => 'Pengaturan pencahayaan berhasil disimpan',
            'data' => $data,
        ], 201);
    }

    // Simpan pengaturan pemupukan
    public function simpanPemupukan(Request $request)
    {
        $validated = $request->validate([
            'jenis_pupuk' => 'required|string',
            'jumlah'      => 'required|string',
            'tanggal'     => 'required|date',
        ]);

        $data = Pupuk::create($validated);

        return response()->json([
            'status' => 'success',
            'message' => 'Pengaturan pemupukan berhasil disimpan',
            'data' => $data,
        ], 201);
    }
}
