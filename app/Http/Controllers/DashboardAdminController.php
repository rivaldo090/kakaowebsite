<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Device;

class AdminDashboardController extends Controller
{
    public function index()
    {
        $total_user = User::count();
        $total_device = Device::count();

        // Ambil data user dan device untuk ditampilkan
        $users = User::select('id', 'username')->get();
        $produk = Device::select('device_id', 'device_name')->get();

        return view('dashboard_admin', compact(
            'total_user',
            'total_device',
            'users',
            'produk'
        ));
    }
}
