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

    @php
        $movies = ['Trex.webp', 'Foundation.webp', 'Godzilla Kingkong.webp', 'Lowlifes.webp', 'Boy.webp', 'Fights.webp'];
        $totalPages = ceil(count($movies) / 4);
    @endphp

@php
    $movies = ['Trex.webp', 'Foundation.webp', 'Godzilla Kingkong.webp', 'Lowlifes.webp', 'Boy.webp', 'Fights.webp'];
    $totalPages = ceil(count($movies) / 4);
@endphp

@foreach (['New Added', 'Trending'] as $section)
    <h3 class="text-2xl font-bold text-white mt-14 mb-6 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">{{ $section }}</h3>
    <section 
        x-data="{ 
            page: 0, 
            itemsPerPage: window.innerWidth < 640 ? 1 : (window.innerWidth < 768 ? 2 : (window.innerWidth < 1024 ? 3 : 4)) 
        }" 
        x-init="window.addEventListener('resize', () => {
            itemsPerPage = window.innerWidth < 640 ? 1 : (window.innerWidth < 768 ? 2 : (window.innerWidth < 1024 ? 3 : 4));
            page = 0; // reset ke awal saat resize
        })"
        class="relative overflow-hidden max-w-7xl mx-auto px-4 sm:px-6 lg:px-8"
    >
        <div class="flex transition-transform duration-700 ease-out"
             :style="`transform: translateX(-${page * 100}%)`">
            @foreach ($movies as $img)
                <div class="w-full sm:w-1/2 md:w-1/3 lg:w-1/4 flex-shrink-0 px-3">
                    <div class="relative rounded-lg overflow-hidden shadow-md hover:shadow-xl hover:scale-105 transition transform">
                        <img src="{{ asset('assets/img/' . $img) }}" alt="{{ $img }}"
                            class="w-full h-auto object-contain object-center max-h-72 sm:max-h-80 lg:max-h-96">
                        <span class="absolute top-2 right-5 text-white text-sm px-2 py-1 rounded flex items-center bg-black/60">
                            <img src="{{ asset('assets/img/star-rating.webp') }}" alt="Star Rating" class="h-4 w-4 mr-1">
                            (8,3)
                        </span>
                    </div>
                </div>
            @endforeach
        </div>

        <!-- Tombol Navigasi -->
        <button @click="if(page > 0) page -= 1"
            class="absolute left-0 top-1/2 -translate-y-1/2 bg-black/60 text-white p-3 rounded-full hover:bg-black transition">
            <i class="fa-solid fa-chevron-left"></i>
        </button>
        <button @click="if((page+1) * itemsPerPage < {{ count($movies) }}) page += 1"
            class="absolute right-0 top-1/2 -translate-y-1/2 bg-black/60 text-white p-3 rounded-full hover:bg-black transition">
            <i class="fa-solid fa-chevron-right"></i>
        </button>
    </section>
@endforeach

@endsection
