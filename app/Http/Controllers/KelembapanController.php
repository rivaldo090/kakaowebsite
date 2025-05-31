<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\KelembapanTanah;

class KelembapanController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'nilai' => 'required|integer',
        ]);

        KelembapanTanah::create([
            'nilai' => $request->nilai,
        ]);

        return response()->json(['status' => 'sukses']);
    }
}
