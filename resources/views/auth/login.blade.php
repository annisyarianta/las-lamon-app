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

            <!-- EMAIL -->
            <div>
                <label class="text-sm text-gray-600">Email</label>
                <input type="email" name="email"
                    class="w-full mt-1 p-3 border rounded-lg focus:ring-2 focus:ring-lime-500 outline-none"
                    placeholder="you@example.com"
                    required>
            </div>

            <!-- PASSWORD -->
            <div class="relative">
                <label class="text-sm text-gray-600">Password</label>

                <input type="password" name="password" id="password"
                    class="w-full mt-1 p-3 border rounded-lg focus:ring-2 focus:ring-lime-500 outline-none pr-10"
                    placeholder="••••••••"
                    required>

                <!-- SVG EYE -->
                <span onclick="togglePassword()"
                    class="absolute right-3 top-[45px] cursor-pointer text-gray-500">

                    <!-- EYE ICON -->
                    <svg id="eyeIcon" xmlns="http://www.w3.org/2000/svg" 
                        fill="none" viewBox="0 0 24 24" stroke-width="1.5" 
                        stroke="currentColor" class="w-5 h-5">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M2.036 12.322c.54-1.12 1.29-2.14 2.222-3.022C6.364 7.27 9.02 6 12 6s5.636 1.27 7.742 3.3c.932.882 1.682 1.902 2.222 3.022a.75.75 0 010 .656c-.54 1.12-1.29 2.14-2.222 3.022C17.636 16.73 14.98 18 12 18s-5.636-1.27-7.742-3.3a12.01 12.01 0 01-2.222-3.022.75.75 0 010-.656z" />
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                    </svg>

                </span>
            </div>

            <!-- REGISTER -->
            <div class="text-center">
                <p class="text-sm text-gray-500">
                    Don't have an account?
                    <a href="/register" class="text-lime-600 hover:underline font-medium">
                        Register here
                    </a>
                </p>
            </div>

            <!-- BUTTON -->
            <button type="submit"
                class="w-full bg-lime-800 text-white py-3 rounded-lg hover:bg-lime-700 transition">
                Login
            </button>
        </form>

        <!-- FOOTER -->
        <p class="text-center text-xs text-gray-400 mt-6">
            © {{ date('Y') }} Las Lamon
        </p>
    </div>
</div>

<!-- SWEET ALERT -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

@if(session('success'))
<script>
    Swal.fire({
        icon: 'success',
        title: "You're all set!",
        text: '{{ session('success') }}',
        confirmButtonColor: '#84cc16'
    });
</script>
@endif

@if(session('error'))
<script>
    Swal.fire({
        icon: 'error',
        title: 'Login Failed',
        text: '{{ session('error') }}'
    });
</script>
@endif

<!-- TOGGLE PASSWORD -->
<script>
function togglePassword() {
    const password = document.getElementById("password");
    const icon = document.getElementById("eyeIcon");

    if (password.type === "password") {
        password.type = "text";

        icon.innerHTML = `
        <path stroke-linecap="round" stroke-linejoin="round"
            d="M3.98 8.223A10.477 10.477 0 002.036 12c1.887 4.419 6.07 7.5 9.964 7.5 1.379 0 2.718-.263 3.96-.743M6.228 6.228A10.45 10.45 0 0112 4.5c3.894 0 8.077 3.081 9.964 7.5a10.522 10.522 0 01-4.293 5.127M15 12a3 3 0 00-3-3m0 6a3 3 0 003-3m6 6L3 3" />
        `;

    } else {
        password.type = "password";

        icon.innerHTML = `
        <path stroke-linecap="round" stroke-linejoin="round"
            d="M2.036 12.322c.54-1.12 1.29-2.14 2.222-3.022C6.364 7.27 9.02 6 12 6s5.636 1.27 7.742 3.3c.932.882 1.682 1.902 2.222 3.022a.75.75 0 010 .656c-.54 1.12-1.29 2.14-2.222 3.022C17.636 16.73 14.98 18 12 18s-5.636-1.27-7.742-3.3a12.01 12.01 0 01-2.222-3.022.75.75 0 010-.656z" />
        <path stroke-linecap="round" stroke-linejoin="round"
            d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
        `;
    }
}
</script>

@endsection