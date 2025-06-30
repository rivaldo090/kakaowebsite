@extends('layouts.main')

@section('title', 'Profil')

@section('content')
<div class="bg-green-600 min-h-screen p-4">
    <!-- Header -->
    <div class="flex items-center justify-between text-white mb-6">
        <a href="{{ route('dashboard') }}" class="text-white text-2xl font-bold">&larr;</a>
        <h1 class="text-xl font-bold">Profile</h1>
        <div class="flex space-x-4">
            <a href="#"><i class="fa fa-calendar"></i></a>
            <a href="#"><i class="fa fa-bell"></i></a>
        </div>
    </div>

    <!-- Profile Picture -->
    <div class="flex justify-center mb-6">
        <div class="w-32 h-32 rounded-full bg-white flex items-center justify-center overflow-hidden shadow-md">
            <img src="{{ asset('img/profil.jpg') }}" alt="Foto Profil" class="w-full h-full object-cover">
        </div>
    </div>

    <!-- Profile Form -->
    <div class="bg-white p-6 rounded-2xl shadow-md space-y-4">
        <div>
            <label class="block text-sm font-semibold text-gray-700">Username</label>
            <input type="text" value="{{ Auth::user()->name ?? '' }}" class="w-full p-2 border rounded focus:outline-none focus:ring focus:border-green-500">
        </div>
        <div>
            <label class="block text-sm font-semibold text-gray-700">Email</label>
            <input type="email" value="{{ Auth::user()->email ?? '' }}" class="w-full p-2 border rounded focus:outline-none focus:ring focus:border-green-500">
        </div>
        <div>
            <label class="block text-sm font-semibold text-gray-700">No Telp</label>
            <input type="text" value="{{ Auth::user()->no_telp ?? '' }}" class="w-full p-2 border rounded focus:outline-none focus:ring focus:border-green-500">
        </div>

        <!-- Tombol Simpan -->
        <div class="pt-4">
            <button class="w-full bg-green-600 text-white py-2 rounded hover:bg-green-700">Simpan Perubahan</button>
        </div>
    </div>
</div>
@endsection
