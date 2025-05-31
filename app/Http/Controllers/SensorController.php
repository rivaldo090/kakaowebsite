<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Suhu;

class SensorController extends Controller
{
    public function terimaSuhu(Request $request)
    {
        $request->validate([
            'suhu' => 'required|numeric',
        ]);

        Suhu::create([
            'nilai' => $request->input('suhu')
        ]);

        return response()->json(['message' => 'Data suhu berhasil disimpan']);
    }
}
