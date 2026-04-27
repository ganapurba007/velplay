@extends('layouts.auth')
@section('title', 'Reset Password')
@section('page-title', 'Set New Password')

@section('content')
<form action="{{ route('password.update') }}" method="POST">
    @csrf
    <input type="hidden" name="token" value="{{ $request->route('token') }}">
    <input type="hidden" name="email" value="{{ $request->email }}">

        <div class="relative mb-5">
            <label for="inputPassword" class="block text-md font-medium text-gray-200">Password</label>
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

        <div class="relative mb-5">
            <label for="password" class="block text-md font-medium text-gray-200">Password</label>
            <input type="password" name="password_confirmation" id="inputPasswordConfirmation"
                class="mt-2 p-3 w-full rounded-lg sm:text-sm 
                  bg-transparent text-white 
                  border border-white/30
                  focus:border-indigo-500 
                  focus:ring-2 focus:ring-indigo-400 
                  focus:shadow-lg focus:shadow-indigo-500/50 
                  transition duration-300 ease-in-out 
                  @error('password_confirmation') border-red-500 @enderror"
                required>
            <i class="fa fa-eye-slash toggle-password absolute right-3 top-11 cursor-pointer text-gray-400 hover:text-gray-200"
                data-target="inputPasswordConfirmation"></i>
            {{-- @error('password')
                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
            @enderror --}}
        </div>
            <button type="submit"
            class="w-full bg-gradient-to-r from-indigo-600 to-purple-600 text-white py-3 px-4 rounded-lg shadow-lg hover:from-indigo-700 hover:to-purple-700 focus:outline-none focus:ring-2 focus:ring-indigo-500">
            Reset Password
        </button>
</form>
@endsection

@section('scripts')
<script>
    document.querySelectorAll('.toggle-password').forEach(toggle => {
        toggle.addEventListener('click', function () {
            const inputId = this.getAttribute('data-target');
            const input = document.getElementById(inputId);

            if (!input) return; // safety check

            const isPassword = input.type === 'password';
            input.type = isPassword ? 'text' : 'password';

            // ubah icon sesuai kondisi
            this.classList.remove('fa-eye', 'fa-eye-slash');
            this.classList.add(isPassword ? 'fa-eye' : 'fa-eye-slash');
        });
    });
</script>
@endsection