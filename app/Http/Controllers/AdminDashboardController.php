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

        $users = User::select('id', 'username')->get();
        $devices = Device::select('device_id', 'device_name')->get(); // ✅ Ganti dari $produk ke $devices

        return view('dashboard_admin', compact(
            'total_user',
            'total_device',
            'users',
            'devices' // ✅ Kirim ke view
        ));
    }

    public function users()
    {
        $users = User::all();
        return view('admin.users.index', compact('users'));
    }
}
