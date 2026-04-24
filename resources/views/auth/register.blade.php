@extends('layouts.auth')
@section('title', 'Create Account')
@section('page-title', 'Register')

@section('content')
    <form action="{{ route('register') }}" method="POST"
        class="space-y-6 bg-white/10 backdrop-blur-md rounded-xl shadow-lg p-8">
        @csrf

        <!-- Full Name -->
        <div>
            <label for="name" class="block text-md text-bold font-medium text-gray-200">Full Name</label>
            <input type="text" name="name" id="name" value="{{ old('name') }}"
                class="mt-2 p-3 w-full rounded-lg sm:text-sm 
                  bg-transparent text-white 
                  border border-white/30 
                  focus:border-indigo-500 
                  focus:ring-2 focus:ring-indigo-400 
                  focus:shadow-lg focus:shadow-indigo-500/50 
                  transition duration-300 ease-in-out
                  @error('name') border-red-500 focus:ring-red-400 focus:shadow-red-500/50 @enderror"
                required autofocus>
            @error('name')
                <p class="text-red-400 text-xs mt-1">{{ $message }}</p>
            @enderror
        </div>

        <!-- Email -->
        <div>
            <label for="email" class="block text-md text-bold font-medium text-gray-200">Email</label>
            <input type="email" name="email" id="email" value="{{ old('email') }}"
                class="mt-2 p-3 w-full rounded-lg sm:text-sm 
                bg-transparent text-white 
                border border-white/30
                focus:border-indigo-500 
                focus:ring-2 focus:ring-indigo-400 
                focus:shadow-lg focus:shadow-indigo-500/50 
                transition duration-300 ease-in-out 
                @error('email') border-red-500 focus:ring-red-400 focus:shadow-red-500/50 @enderror"
                required>
            @error('email')
                <p class="text-red-400 text-xs mt-1">{{ $message }}</p>
            @enderror
        </div>

        <!-- Password -->
        <div class="relative">
            <label for="password" class="block text-md text-bold font-medium text-gray-200">Password</label>
            <input type="password" name="password" id="InputPassword"
                class="mt-2 p-3 w-full rounded-lg sm:text-sm 
                bg-transparent text-white 
                border border-white/30
                focus:border-indigo-500 
                focus:ring-2 focus:ring-indigo-400 
                focus:shadow-lg focus:shadow-indigo-500/50 
                transition duration-300 ease-in-out 
                @error('password') border-red-500 @enderror"
                required>
            <i class="fa fa-eye-slash toggle-password absolute right-3 top-11 cursor-pointer text-gray-400 hover:text-gray-200"
                data-target="InputPassword"></i>
            @error('password')
                <p class="text-red-400 text-xs mt-1">{{ $message }}</p>
            @enderror
        </div>

        <!-- Confirm Password -->
        <div class="relative">
            <label for="password_confirmation" class="block text-md text-bold font-medium text-gray-200">Confirm
                Password</label>
            <input type="password" name="password_confirmation" id="InputPasswordConfirmation"
                class="mt-2 p-3 w-full rounded-lg sm:text-sm 
                bg-transparent text-white 
                border border-white/30
                focus:border-indigo-500 
                focus:ring-2 focus:ring-indigo-400 
                focus:shadow-lg focus:shadow-indigo-500/50 
                transition duration-300 ease-in-out "
                required>
            <i class="fa fa-eye-slash toggle-password absolute right-3 top-11 cursor-pointer text-gray-400 hover:text-gray-200"
                data-target="InputPasswordConfirmation"></i>
        </div>

        <!-- Submit -->
        <button type="submit"
            class="w-full bg-gradient-to-r from-indigo-600 to-purple-600 text-white py-3 px-4 rounded-lg shadow-lg hover:from-indigo-700 hover:to-purple-700 focus:outline-none focus:ring-2 focus:ring-indigo-500">
            Register
        </button>

        <!-- Link to login -->
        <div class="mt-4 text-center text-md text-gray-300">
            Already have an account?
            <a href="{{ route('login') }}" class="text-indigo-400 font-medium hover:underline">Login</a>
        </div>
    </form>
@endsection

@section('scripts')
    <script>
        document.querySelectorAll('.toggle-password').forEach(toggle => {
            toggle.addEventListener('click', function() {
                const inputId = this.getAttribute('data-target');
                const input = document.getElementById(inputId);
                const type = input.getAttribute('type') === 'password' ? 'text' : 'password';
                input.setAttribute('type', type);
                this.classList.toggle('fa-eye');
                this.classList.toggle('fa-eye-slash');
            });
        });
    </script>
@endsection
