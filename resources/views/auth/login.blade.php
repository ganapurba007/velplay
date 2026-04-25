@extends('layouts.auth')
@section('title', 'Login')
@section('page-title', 'Sign In')

@section('content')
    <form action="{{ route('login') }}" method="POST" class="space-y-6 bg-white/10 backdrop-blur-md rounded-xl shadow-lg p-8">
        @csrf
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
            {{-- @error('email')
                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
            @enderror --}}
        </div>

        <!-- Password -->
        <div class="relative">
            <label for="password" class="block text-md font-medium text-gray-200">Password</label>
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
            {{-- @error('password')
                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
            @enderror --}}
        </div>

        <div class="flex items-center justify-between">
            <div class="flex items-center">
                <input id="remember" name="remember" type="checkbox"
                    class="h-4 w-4 text-indigo-600 focus:ring-indigo-500 border-gray-300 rounded">
                <label for="remember-me" class="ml-2 block text-sm text-gray-200">
                    Remember me
                </label>
            </div>

            <div class="text-sm">
                <a href="{{ route('password.request') }}" class="font-medium text-indigo-600 hover:text-indigo-500">
                    Forgot your password?
                </a>
            </div>
        </div>

        <button type="submit"
            class="w-full bg-gradient-to-r from-indigo-600 to-purple-600 text-white py-3 px-4 rounded-lg shadow-lg hover:from-indigo-700 hover:to-purple-700 focus:outline-none focus:ring-2 focus:ring-indigo-500">
            Sign In
        </button>
        <div class="mt-4 text-center text-md text-gray-300">
            Don't have an account?
            <a href="{{ route('register') }}" class="text-indigo-400 font-medium hover:underline">Sign Up</a>
        </div>
    </form>
@endsection

@section('script')
