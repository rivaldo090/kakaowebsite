<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\History;

class HistoryController extends Controller
{
    public function index()
    {
        $histories = History::orderBy('tanggal', 'desc')->get(); // atau paginate()
        return view('history', compact('histories'));
    }
}
