@extends('layouts.subscribe')
@section('title', 'Plan Detail')
@section('page-title', 'Plan Detail')

@section('content')
<div class="grid gap-6 sm:grid-cols-1 md:grid-cols-2 lg:grid-cols-3">
    @foreach ($plans as $plan)
        <div class="bg-white/10 backdrop-blur-md border border-indigo-600 rounded-xl shadow-lg 
                    hover:shadow-xl hover:-translate-y-1 transition-transform duration-300">
            
            <!-- Header -->
            <div class="mb-4 bg-gradient-to-r from-indigo-600 to-purple-600 rounded-t-xl px-6 py-3 text-white">
                <h5 class="text-2xl font-bold">{{ $plan->title }}</h5>
                <p class="mt-2 font-semibold text-lg">
                    Rp {{ number_format($plan->price, 0, ',', '.') }} / {{ $plan->duration }} Hari
                </p>
            </div>
            
            <!-- Body -->
            <div class="space-y-6 text-gray-200 px-6 py-4">
                <div>
                    <p class="font-semibold">Resolution</p>
                    <p class="text-indigo-300">{{ $plan->resolution }}</p>
                </div>
                <div>
                    <p class="font-semibold">Support Device</p>
                    <p class="text-indigo-300">Mobile, Computer, TV</p>
                </div>
                <div>
                    <p class="font-semibold">Maximum Devices</p>
                    <p class="text-indigo-300">{{ $plan->max_devices }} Device</p>
                </div>
            </div>
            
            <!-- Footer -->
            <div class="mt-6 px-6 pb-6">
                {{-- <a href="#" 
                   class="block w-full text-center bg-gradient-to-r from-indigo-600 to-purple-600 
                          text-white py-3 px-4 rounded-lg shadow-lg 
                          hover:from-indigo-700 hover:to-purple-700 
                          focus:outline-none focus:ring-2 focus:ring-indigo-500 transition">
                   Choose Plan
                </a> --}}
                <a href="{{ route('subscribe.checkout', $plan->id) }}" 
                   class="block w-full text-center bg-gradient-to-r from-indigo-600 to-purple-600 
                          text-white py-3 px-4 rounded-lg shadow-lg 
                          hover:from-indigo-700 hover:to-purple-700 
                          focus:outline-none focus:ring-2 focus:ring-indigo-500 transition">
                   Choose Plan
                </a>
            </div>
        </div>
    @endforeach
</div>

@endsection

@section('scripts')
@endsection
