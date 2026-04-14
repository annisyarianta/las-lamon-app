@extends('layouts.auth')

@section('title', 'Register - Las Lamon')

@section('content')

<div class="font-sans bg-gray-100 flex items-center justify-center min-h-screen">

    <div class="w-full max-w-md bg-white rounded-2xl shadow-xl p-8">

        <!-- Logo -->
        <div class="flex justify-center mb-3">
            <img src="{{ asset('assets/img/logo.png') }}" 
                 alt="Logo"
                 class="h-14 sm:h-16 w-auto">
        </div>

        <!-- Title -->
        <h2 class="text-2xl font-bold text-center text-lime-800">
            Create Account
        </h2>

        <p class="text-center text-gray-500 text-sm mt-1">
            Register to start using the system
        </p>

        <!-- Error -->
        @if ($errors->any())
            <div class="bg-red-100 text-red-600 p-3 rounded mt-4 text-sm">
                {{ $errors->first() }}
            </div>
        @endif

        <!-- Form -->
        <form method="POST" action="/register" class="mt-6 space-y-4">
            @csrf

            <!-- Name -->
            <div>
                <label class="text-sm text-gray-600">Full Name</label>
                <input type="text" name="name"
                    class="w-full mt-1 p-3 border rounded-lg focus:ring-2 focus:ring-blue-400 outline-none"
                    placeholder="John Doe">
            </div>

            <!-- Phone -->
            <div>
                <label class="text-sm text-gray-600">Phone Number</label>
                <input type="text" name="phone"
                    class="w-full mt-1 p-3 border rounded-lg focus:ring-2 focus:ring-blue-400 outline-none"
                    placeholder="08xxxxxxxxxx">
            </div>

            <!-- Email -->
            <div>
                <label class="text-sm text-gray-600">Email</label>
                <input type="email" name="email"
                    class="w-full mt-1 p-3 border rounded-lg focus:ring-2 focus:ring-blue-400 outline-none"
                    placeholder="you@example.com">
            </div>

            <!-- Password -->
            <div>
                <label class="text-sm text-gray-600">Password</label>
                <input type="password" name="password"
                    class="w-full mt-1 p-3 border rounded-lg focus:ring-2 focus:ring-blue-400 outline-none"
                    placeholder="••••••••">
            </div>

            <!-- Button -->
            <button type="submit"
                class="w-full bg-lime-600 text-white py-3 rounded-lg hover:bg-lime-700 transition">
                Register
            </button>
        </form>

        <!-- Footer -->
        <p class="text-center text-sm text-gray-500 mt-6">
            Already have an account?
            <a href="/login" class="text-lime-600 hover:underline">Login</a>
        </p>

    </div>
</div>
@endsection
