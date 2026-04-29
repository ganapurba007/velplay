@extends('layouts.subscribe')

@section('title', 'Payment Success')
@section('page-title', 'Payment Success')

@section('content')
<div class="flex justify-center">
    <div class="w-full max-w-md text-center bg-white/10 backdrop-blur-md border border-indigo-300 rounded-xl shadow-lg p-8">
        
        <!-- Logo -->
        <img src="{{ asset('assets/img/velplay-logo.png') }}" alt="Velplay Logo" class="mx-auto mb-3 w-100">

        <!-- Success Message -->
        <div class="text-green-500 mb-4">
            <i class="fas fa-check-circle fa-3x"></i>
        </div>
        <h2 class="text-2xl font-bold text-white mb-2">Selamat, Pembayaran Anda Berhasil</h2>
        <h3 class="text-lg text-gray-300 mb-6">Pembayaran telah kami terima</h3>

        <h4 class="text-md text-gray-200 mb-8">Selamat menikmati layanan kami</h4>

        <!-- Button -->
        <a href="/" 
            class="block w-full bg-gradient-to-r from-indigo-600 to-purple-600 text-white py-3 px-4 rounded-lg shadow-lg hover:from-indigo-700 hover:to-purple-700 focus:outline-none focus:ring-2 focus:ring-indigo-500">
            Mulai Nonton
        </a>
    </div>
</div>
@endsection

@section('scripts')
@endsection
