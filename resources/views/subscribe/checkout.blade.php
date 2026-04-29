@extends('layouts.subscribe')
@section('title', 'Payment Detail')
@section('page-title', 'Payment Detail')

@section('content')
<div class="flex justify-center">
    <div class="w-full max-w-4xl bg-white/10 backdrop-blur-md border border-indigo-600 rounded-xl shadow-lg 
                hover:shadow-xl transition-transform duration-300">
        
        <!-- Body -->
        <div class="space-y-4 text-gray-200 p-6">
            <div class="flex justify-between items-center">
                <p class="font-semibold text-xl">{{ $plan->title }} - {{ $plan->duration }} Hari</p>
                <p class="text-lg font-medium">Rp {{ number_format($plan->price, 0, ',', '.') }}</p>
            </div>
            <hr class="border-gray-600">

            <div class="flex justify-between">
                <p class="font-semibold">Subtotal</p>
                <p>Rp {{ number_format($plan->price, 0, ',', '.') }}</p>
            </div>
            <div class="flex justify-between">
                <p class="font-semibold">Ppn 12%</p>
                <p>Rp {{ number_format($plan->price * 0.12, 0, ',', '.') }}</p>
            </div>
            <hr class="border-gray-600">

            <div class="flex justify-between">
                <p class="font-semibold">Total Payment</p>
                <p class="text-lg font-bold text-indigo-300">
                    Rp {{ number_format($plan->price + ($plan->price * 0.12), 0, ',', '.') }}
                </p>
            </div>

            <div class="flex items-start space-x-2">
                <input id="terms" type="checkbox"
                       class="h-4 w-4 text-indigo-600 focus:ring-indigo-500 border-gray-300 rounded">
                <label for="terms" class="text-sm text-gray-200">
                    By continuing the payment, you agree to our
                    <a href="#" class="text-indigo-400 hover:text-indigo-300">Terms and Conditions</a> and
                    <a href="#" class="text-indigo-400 hover:text-indigo-300">Privacy Policy</a>
                </label>
            </div>
        </div>

        <!-- Footer -->
        <div class="px-6 pb-6">
 <a href="#"
                    class="block w-full text-center bg-gradient-to-r from-indigo-600 to-purple-600 
                          text-white py-3 px-4 rounded-lg shadow-lg 
                          hover:from-indigo-700 hover:to-purple-700 
                          focus:outline-none focus:ring-2 focus:ring-indigo-500 transition">
                    Continue
                </a>
                {{-- <a href="{{ route('subscribe.checkout', $plan->id) }}" 
                   class="block w-full text-center bg-gradient-to-r from-indigo-600 to-purple-600 
                          text-white py-3 px-4 rounded-lg shadow-lg 
                          hover:from-indigo-700 hover:to-purple-700 
                          focus:outline-none focus:ring-2 focus:ring-indigo-500 transition">
                   Continue
                </a> --}}
        </div>
    </div>
</div>
@endsection

@section('scripts')
@endsection
