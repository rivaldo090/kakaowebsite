<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pencahayaan;
use App\Models\History;
use Carbon\Carbon;
use Illuminate\Support\Facades\Log;

class PencahayaanController extends Controller
{
    /**
     * Simpan pengaturan otomatis pencahayaan
     */
    public function simpanPengaturan(Request $request)
    {
        $request->validate([
            'intensitas'   => 'required|integer|min:0|max:100',
            'jam_mulai'    => 'required|date_format:H:i',
            'jam_selesai'  => 'required|date_format:H:i',
        ]);

        Pencahayaan::create([
            'intensitas'   => $request->intensitas,
            'jam_mulai'    => $request->jam_mulai,
            'jam_selesai'  => $request->jam_selesai,
            'status'       => 'otomatis',
        ]);

        return back()->with('success', 'Pengaturan pencahayaan otomatis berhasil disimpan.');
    }

    /**
     * Kontrol manual pencahayaan: nyalakan atau matikan
     */
    public function manual(Request $request)
    {
        $request->validate([
            'status'     => 'required|in:on,off',
            'intensitas' => 'nullable|integer|min:0|max:100',
        ]);

        $status     = $request->status;
        $intensitas = $request->intensitas ?? 100;
        $now        = Carbon::now();
        $today      = $now->toDateString();
        $timeNow    = $now->format('H:i');

        // Simpan ke tabel pencahayaans
        $pencahayaan = new Pencahayaan();
        $pencahayaan->intensitas = $intensitas;
        $pencahayaan->jam_mulai = $timeNow;
        $pencahayaan->jam_selesai = $status === 'off' ? $timeNow : null;
        $pencahayaan->status = $status;
        $pencahayaan->save();

        Log::info("Status pencahayaan disimpan: " . $status);

        // Simpan ke tabel history
        if ($status === 'on') {
            History::create([
                'tanggal'     => $today,
                'jenis'       => 'pencahayaan',
                'jam_mulai'   => $timeNow,
                'jam_selesai' => null,
            ]);
        } else {
            $last = History::where('jenis', 'pencahayaan')
                ->whereDate('tanggal', $today)
                ->whereNull('jam_selesai')
                ->latest()
                ->first();

            if ($last) {
                $last->update(['jam_selesai' => $timeNow]);
            } else {
                History::create([
                    'tanggal'     => $today,
                    'jenis'       => 'pencahayaan',
                    'jam_mulai'   => $timeNow,
                    'jam_selesai' => $timeNow,
                ]);
            }
        }

        return back()->with('success', 'Pencahayaan berhasil di-' . ($status === 'on' ? 'nyalakan' : 'matikan') . '.');
    }

    /**
     * Ambil status terbaru pencahayaan
     */
    public function statusTerbaru()
    {
        $data = Pencahayaan::latest()->first();

        return response()->json([
            'status'      => $data->status ?? 'unknown',
            'intensitas'  => $data->intensitas ?? 0,
            'jam_mulai'   => $data->jam_mulai ?? '-',
            'jam_selesai' => $data->jam_selesai ?? '-',
            'waktu'       => $data->created_at?->format('Y-m-d H:i:s') ?? now()->format('Y-m-d H:i:s')
        ]);
    }
}
