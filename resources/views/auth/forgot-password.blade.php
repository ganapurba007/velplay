@extends('layouts.auth')
@section('title', 'Forgot Password')
@section('page-title', 'Reset Passwrod')

@section('content')
<form action="{{ route('password.email') }}" method="POST">
    @csrf
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

                <button type="submit"
            class="mt-3 w-full bg-gradient-to-r from-indigo-600 to-purple-600 text-white py-3 px-4 rounded-lg shadow-lg hover:from-indigo-700 hover:to-purple-700 focus:outline-none focus:ring-2 focus:ring-indigo-500">
            Send Reset Link
        </button>
                <div class="mt-4 text-center text-md text-gray-300">
            Remember your password?
            <a href="{{ route('login') }}" class="text-indigo-400 font-medium hover:underline">Login</a>
        </div>

</form>

@endsection

@section('scripts')

@endsection