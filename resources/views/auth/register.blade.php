@extends('layouts.auth')

@section('title', 'Register')

@section('content')
<div class="max-w-md mx-auto bg-white rounded p-8 shadow">
    <h2 class="text-3xl font-bold text-gray-800 mb-6 text-center">Registrasi Pengguna</h2>

    @if(session('error'))
        <div class="text-red-500 text-center mb-4">{{ session('error') }}</div>
    @elseif(session('success'))
        <div class="text-green-500 text-center mb-4">{{ session('success') }}</div>
    @endif

    <form method="POST" action="{{ route('register.submit') }}">
        @csrf

        <!-- Username -->
        <label for="username" class="block text-gray-700 font-bold mb-2">Username</label>
        <input type="text" name="username" id="username" value="{{ old('username') }}"
            class="w-full p-3 border border-gray-300 rounded mb-4" required>
        @error('username')
            <div class="text-red-500 text-sm mb-2">{{ $message }}</div>
        @enderror

        <!-- Email -->
        <label for="email" class="block text-gray-700 font-bold mb-2">Email</label>
        <input type="email" name="email" id="email" value="{{ old('email') }}"
            class="w-full p-3 border border-gray-300 rounded mb-4" required>
        @error('email')
            <div class="text-red-500 text-sm mb-2">{{ $message }}</div>
        @enderror

        <!-- Password -->
        <label for="password" class="block text-gray-700 font-bold mb-2">Password</label>
        <input type="password" name="password" id="password"
            class="w-full p-3 border border-gray-300 rounded mb-4" required>
        @error('password')
            <div class="text-red-500 text-sm mb-2">{{ $message }}</div>
        @enderror

        <!-- Konfirmasi Password -->
        <label for="password_confirmation" class="block text-gray-700 font-bold mb-2">Konfirmasi Password</label>
        <input type="password" name="password_confirmation" id="password_confirmation"
            class="w-full p-3 border border-gray-300 rounded mb-4" required>
        @error('password_confirmation')
            <div class="text-red-500 text-sm mb-2">{{ $message }}</div>
        @enderror

        <button type="submit"
            class="w-full bg-green-600 text-white py-3 rounded font-bold hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-green-600">
            Daftar
        </button>
    </form>
</div>
@endsection
