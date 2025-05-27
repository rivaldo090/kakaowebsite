@extends('layouts.auth')

@section('title', 'Login')

@section('content')
<div class="max-w-md mx-auto bg-white rounded p-8 shadow">
    <h2 class="text-3xl font-bold text-gray-800 mb-6 text-center">Login</h2>

    @if (session('error'))
        <p class="text-red-500 mb-4 text-center">{{ session('error') }}</p>
    @endif

    <form method="POST" action="{{ route('login.submit') }}">
        @csrf
        <label for="username" class="block text-gray-700 font-bold mb-2">Username</label>
        <input type="text" name="username" id="username" class="w-full p-3 border border-gray-300 rounded mb-4" required>

        <label for="pass" class="block text-gray-700 font-bold mb-2">Password</label>
        <input type="password" name="pass" id="pass" class="w-full p-3 border border-gray-300 rounded mb-4" required>

        <button type="submit" class="w-full bg-green-600 text-white py-3 rounded font-bold hover:bg-green-700">
            Login
        </button>
    </form>

    <p class="text-center mt-4">Lupa Password?? <a href="https://wa.me/083852743444" class="text-green-600 font-bold">Hubungi Admin</a></p>
</div>
@endsection
