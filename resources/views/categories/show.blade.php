@extends('layouts.app')

@section('content')
<div class="min-h-screen px-4 py-6 mx-auto max-w-7xl sm:px-6 lg:px-8">

    <!-- Header -->
    <div class="mb-8">
        <h1 class="text-2xl font-bold text-white md:text-3xl">
            Kategori :
            <span class="text-cyan-400">
                {{ $category->title }}
            </span>
        </h1>

        <p class="mt-2 text-sm text-slate-400">
            Daftar film berdasarkan kategori {{ $category->title }}
        </p>
    </div>

    @if ($movies->count() > 0)

    <!-- Movie Grid -->
    <div class="grid grid-cols-2 gap-5 sm:grid-cols-3 md:grid-cols-4 lg:grid-cols-5">

        @foreach ($movies as $movie)
        <a href="{{ route('movies.show', $movie->slug) }}" class="group">

            <div
                class="relative overflow-hidden transition-all duration-500 border shadow-xl rounded-3xl bg-slate-900/70 border-white/10 hover:-translate-y-2 hover:shadow-cyan-500/20">

                <!-- Poster -->
                <div class="relative overflow-hidden">

                    <img
                        src="{{ $movie->poster }}"
                        alt="{{ $movie->title }}"
                        class="object-cover w-full transition duration-500 h-72 group-hover:scale-110">

                    <!-- Overlay -->
                    <div
                        class="absolute inset-0 bg-gradient-to-t from-black via-black/20 to-transparent opacity-80">
                    </div>

                    <!-- Rating -->
                    <div
                        class="absolute top-3 right-3 flex items-center gap-1 px-3 py-1 text-xs font-semibold text-white border rounded-full backdrop-blur-md bg-black/60 border-white/10">

                        <i class="text-yellow-400 fa-solid fa-star"></i>

                        <span>{{ $movie->average_rating }}</span>
                    </div>

                    <!-- Hover Effect -->
                    <div
                        class="absolute inset-0 transition duration-500 opacity-0 bg-cyan-400/10 group-hover:opacity-100">
                    </div>
                </div>

                <!-- Content -->
                <div class="p-4">

                    <h3
                        class="text-sm font-semibold leading-6 text-white transition duration-300 line-clamp-2 group-hover:text-cyan-400">
                        {{ $movie->title }}
                    </h3>

                    <div class="flex items-center justify-between mt-3">

                        <span
                            class="px-3 py-1 text-xs font-medium rounded-full bg-cyan-500/10 text-cyan-300 border border-cyan-400/10">
                            Movie
                        </span>

                        <span class="text-xs text-slate-400">
                            {{ $movie->release_date->format('Y') }}
                        </span>
                    </div>
                </div>

                <!-- Glossy Effect -->
                <div
                    class="absolute top-0 left-[-120%] h-full w-[70%] bg-gradient-to-r from-transparent via-white/10 to-transparent skew-x-12 transition-all duration-1000 group-hover:left-[140%]">
                </div>
            </div>
        </a>
        @endforeach

    </div>

    @else

    <!-- Empty State -->
    <div
        class="flex flex-col items-center justify-center py-20 text-center border shadow-lg rounded-3xl bg-slate-900/50 border-white/10">

        <div
            class="flex items-center justify-center w-24 h-24 mb-6 rounded-full bg-cyan-500/10 border border-cyan-400/10">
            <i class="text-4xl text-cyan-400 fa-solid fa-film"></i>
        </div>

        <h2 class="text-2xl font-bold text-white">
            Belum Ada Film
        </h2>

        <p class="max-w-md mt-3 text-slate-400">
            Saat ini belum ada film yang tersedia pada kategori
            <span class="font-semibold text-cyan-400">
                {{ $category->title }}
            </span>.
        </p>

        <a href="{{ route('home') }}"
            class="px-6 py-3 mt-6 text-sm font-semibold text-white transition-all duration-300 rounded-2xl bg-cyan-500 hover:bg-cyan-400 hover:scale-105">
            Kembali ke Beranda
        </a>
    </div>

    @endif

</div>
@endsection