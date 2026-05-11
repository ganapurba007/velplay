@extends('layouts.app')

@section('content')
    <!-- Jumbotron -->
    <div class="bg-gray-900 text-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-16 grid md:grid-cols-2 gap-10 items-center">
            <!-- Left: Text -->
            <div>
                <h1 class="text-4xl md:text-5xl font-bold mb-6">All New Simba</h1>
                <p class="text-lg text-gray-300 mb-8 leading-relaxed">
                    Simba adalah anak sebatang kara yang sedang mencari orang tuanya,
                    tetapi usaha nya terbatas. Mampukah simba menemukan orang tuanya?
                </p>
                <a href="#"
                    class="inline-flex items-center bg-indigo-600 hover:bg-indigo-700 text-white font-semibold px-6 py-3 rounded-lg shadow-lg transition transform hover:scale-105">
                    <i class="fa-solid fa-play mr-2"></i> Play
                </a>
            </div>
            <!-- Right: Image -->
            <div class="relative">
                <div class="absolute inset-0 bg-gradient-to-t from-black/50 to-transparent rounded-lg"></div>
                <img src="{{ asset('assets/img/Jumbotron-img.webp') }}" alt="Jumbotron" class="rounded-lg shadow-xl">
            </div>
        </div>
    </div>

    <!-- NEW ADDED -->
    <h3 class="text-2xl font-bold text-white mt-14 mb-6 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        New Added
    </h3>

    <section class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">

            @foreach ($latestMovies as $latest)
            {{-- {{ dd($latest) }} --}}
            <div class="relative rounded-lg overflow-hidden shadow-md hover:shadow-xl hover:scale-105 transition transform">
                <img
                    src="{{ $latest->poster ?? asset('assets/img/default.webp') }}"
                    alt="{{ $latest->title ?? 'Movie' }}"
                    class="w-full h-80 object-cover">

                <span class="absolute top-2 right-5 text-white text-sm px-2 py-1 rounded flex items-center bg-black/60">
                    <img src="{{ asset('assets/img/star-rating.webp') }}"
                        class="h-4 w-4 mr-1">
                    {{ $latest->average_rating ?? '0' }}
                </span>

                {{-- <div class="absolute bottom-0 left-0 right-0 bg-gradient-to-t from-black to-transparent p-4">
                    <h4 class="text-white font-bold">
                        {{ $latestMovies[0]->title ?? 'Movie Title' }}
                    </h4>
                </div> --}}
            </div>
            @endforeach

        </div>
    </section>

    <!-- TRENDING -->
    <h3 class="text-2xl font-bold text-white mt-14 mb-6 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        Trending
    </h3>

    <section class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">

            @foreach ($popularMovies as $popular)
            {{-- {{ dd($popular) }} --}}
            <div class="relative rounded-lg overflow-hidden shadow-md hover:shadow-xl hover:scale-105 transition transform">
                <img
                    src="{{ $popular->poster ?? asset('assets/img/default.webp') }}"
                    alt="{{ $popular->title ?? 'Movie' }}"
                    class="w-full h-80 object-cover">

                <span class="absolute top-2 right-5 text-white text-sm px-2 py-1 rounded flex items-center bg-black/60">
                    <img src="{{ asset('assets/img/star-rating.webp') }}"
                        class="h-4 w-4 mr-1">
                    {{ $popular->average_rating ?? '0' }}
                </span>

                {{-- <div class="absolute bottom-0 left-0 right-0 bg-gradient-to-t from-black to-transparent p-4">
                    <h4 class="text-white font-bold">
                        {{ $popularMovies[0]->title ?? 'Movie Title' }}
                    </h4>
                </div> --}}
            </div>
            @endforeach

        </div>
    </section>
@endsection