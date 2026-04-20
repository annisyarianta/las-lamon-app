@extends('layouts.auth')

@section('title', 'Login - Las Lamon')

@section('content')

<div class="bg-gray-100 flex items-center justify-center min-h-screen px-4">

    <div class="w-full max-w-md bg-white rounded-2xl shadow-xl p-6 sm:p-8">

        <!-- Logo -->
        <div class="flex justify-center mb-5">
            <img src="{{ asset('assets/img/logo.png') }}" 
                 alt="Logo"
                 class="h-14 sm:h-16 w-auto">
        </div>

        <!-- Title -->
        <h2 class="text-xl sm:text-2xl font-bold text-center text-lime-800">
            Login
        </h2>

        <p class="text-center text-gray-500 text-sm mt-1">
            Login to your account
        </p>

        <!-- Error -->
        @if ($errors->any())
            <div class="bg-red-100 text-red-600 p-3 rounded-lg mt-4 text-sm">
                {{ $errors->first() }}
            </div>
        @endif

        <!-- Form -->
        <form method="POST" action="/login" class="mt-6 space-y-4">
            @csrf

            <!-- Email -->
            <div>
                <label class="text-sm text-gray-600">Email</label>
                <input type="email" name="email"
                    class="w-full mt-1 p-3 sm:p-3.5 border rounded-lg focus:ring-2 focus:ring-blue-400 outline-none"
                    placeholder="you@example.com"
                    required>
            </div>

            <!-- Password -->
            <div>
                <label class="text-sm text-gray-600">Password</label>
                <input type="password" name="password"
                    class="w-full mt-1 p-3 sm:p-3.5 border rounded-lg focus:ring-2 focus:ring-blue-400 outline-none"
                    placeholder="••••••••"
                    required>
            </div>

            <!-- Register link -->
            <div class="text-center">
                <p class="text-sm text-gray-500">
                    Don't have an account?
                    <a href="/register" class="text-lime-600 hover:underline font-medium">
                        Register here
                    </a>
                </p>
            </div>

            <!-- Button -->
            <button type="submit"
                class="w-full bg-lime-800 text-white py-3 rounded-lg hover:bg-lime-700 active:scale-[0.99] transition">
                Login
            </button>
        </form>

        <!-- Footer -->
        <p class="text-center text-xs text-gray-400 mt-6">
            © {{ date('Y') }} Las Lamon
        </p>
    </div>
</div>
@endsection