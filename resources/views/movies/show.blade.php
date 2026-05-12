@extends('layouts.app')

@section('content')
<div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

    <!-- Overlay -->
    <div id="overlay-dark"
        class="fixed inset-0 bg-black/90 z-40 hidden transition-all duration-300">
    </div>

    <!-- Content -->
    <div class="container mx-auto px-4 py-8 movie-container relative z-50">

        <!-- Breadcrumb -->
        <nav class="mb-8">
            <ol class="flex items-center gap-2 text-sm text-gray-400">
                <li>
                    <a href="#" class="hover:text-white transition">
                        Home
                    </a>
                </li>

                <li>/</li>

                <li class="text-white font-medium truncate">
                    {{ $movie->title }}
                </li>
            </ol>
        </nav>

        <!-- Movie Detail -->
        <div class="grid grid-cols-1 lg:grid-cols-12 gap-8">

            <!-- Poster -->
            <div class="lg:col-span-3">
                <img
                    src="{{ $movie->poster }}"
                    alt="{{ $movie->title }}"
                    class="w-full rounded-3xl shadow-2xl object-cover border border-white/10"
                >
            </div>

            <!-- Main Info -->
            <div class="lg:col-span-5">
                <h1 class="text-4xl font-bold text-white leading-tight">
                    {{ $movie->title }}
                </h1>

                <div class="flex flex-wrap items-center gap-3 mt-4 text-gray-400">
                    <span>
                        {{ $movie->release_date->format('d M Y') }}
                    </span>

                    <span class="w-1 h-1 rounded-full bg-gray-500"></span>

                    <span>
                        {{ $movie->formatted_duration }}
                    </span>
                </div>

                <!-- Categories -->
                <div class="flex flex-wrap gap-3 mt-6">
                    @foreach ($movie->categories as $category)
                        <a href="{{ route('categories.show', $category->slug) }}" class="px-4 py-2 rounded-full bg-red-500/20 text-red-300 border border-red-500/20 text-sm">
                            {{ $category->title }}
                        </a>
                    @endforeach
                </div>

                <!-- Description -->
                <p class="mt-6 text-gray-300 leading-8 text-[15px]">
                    {{ $movie->description }}
                </p>
            </div>

            <!-- Rating -->
            <div class="lg:col-span-4">

                <!-- Rating Card -->
                <div class="bg-white/5 border border-white/10 rounded-3xl p-6 backdrop-blur-xl shadow-2xl">

                    <h3 class="text-xl font-semibold text-white">
                        Rating
                    </h3>

                    <div class="flex items-center gap-4 mt-6">
                        <div class="w-14 h-14 rounded-2xl bg-yellow-500/20 flex items-center justify-center">
                            <i class="fa-solid fa-star text-yellow-400 text-2xl"></i>
                        </div>

                        <div>
                            <div class="text-3xl font-bold text-white">
                                {{ $movie->average_rating }}
                                <span class="text-lg text-gray-400">/10</span>
                            </div>

                            <p class="text-sm text-gray-400">
                                User Rating
                            </p>
                        </div>
                    </div>

                    <!-- Movie Info -->
                    <div class="mt-8 space-y-6">

                        <div>
                            <h6 class="text-sm uppercase tracking-widest text-gray-500">
                                Director
                            </h6>

                            <p class="mt-2 text-white font-medium">
                                {{ $movie->director }}
                            </p>
                        </div>

                        <div>
                            <h6 class="text-sm uppercase tracking-widest text-gray-500">
                                Writers
                            </h6>

                            <p class="mt-2 text-white font-medium">
                                {{ $movie->writers }}
                            </p>
                        </div>

                        <div>
                            <h6 class="text-sm uppercase tracking-widest text-gray-500">
                                Stars
                            </h6>

                            <p class="mt-2 text-white font-medium">
                                {{ $movie->stars }}
                            </p>
                        </div>

                    </div>
                </div>

            </div>

        </div>

        <!-- Video -->
        <div class="mt-12">

            <div class="overflow-hidden rounded-3xl border border-white/10 shadow-2xl aspect-video">
                <iframe
                    class="w-full h-full"
                    src="{{ $streamingUrl }}"
                    title="YouTube video"
                    allowfullscreen>
                </iframe>
            </div>

            <!-- Tools -->
            <div class="flex flex-col md:flex-row items-start md:items-center justify-between gap-4 mt-5">

                <div class="flex flex-wrap gap-3">

                    <!-- Lamp -->
                    <button id="light-toggle"
                        class="flex items-center gap-2 px-5 py-3 rounded-2xl bg-white/5 border border-white/10 text-gray-200 hover:bg-white/10 transition">

                        <i class="fa-regular fa-lightbulb text-yellow-400"></i>

                        <span>Matikan Lampu</span>
                    </button>

                    <!-- Trailer -->
                    <button
                        class="flex items-center gap-2 px-5 py-3 rounded-2xl bg-white/5 border border-white/10 text-gray-200 hover:bg-white/10 transition">

                        <i class="fa-solid fa-film text-red-400"></i>

                        <span>Trailer</span>
                    </button>

                </div>

                <!-- Rating -->
                <button
                    class="flex items-center gap-2 px-5 py-3 rounded-2xl bg-red-500 text-white hover:bg-red-600 transition shadow-lg shadow-red-500/20">

                    <i class="fa-solid fa-star"></i>

                    <span>Berikan Rating</span>
                </button>

            </div>

        </div>

    </div>
</div>
@endsection

@push('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function () {

        const lightToggle = document.getElementById('light-toggle');
        const overlay = document.getElementById('overlay-dark');
        const movieContainer = document.querySelector('.movie-container');

        lightToggle.addEventListener('click', function () {

            overlay.classList.toggle('hidden');

            movieContainer.classList.toggle('relative');
            movieContainer.classList.toggle('z-50');
        });

        overlay.addEventListener('click', function () {
            overlay.classList.add('hidden');
        });

    });
</script>
@endpush