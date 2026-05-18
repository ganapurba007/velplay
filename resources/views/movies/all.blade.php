@extends('layouts.app')

@section('content')
<div class="min-h-screen px-4 py-8 mx-auto max-w-7xl sm:px-6 lg:px-8">

    <!-- HEADER -->
    <div
        class="relative overflow-hidden border shadow-2xl rounded-3xl border-white/10 bg-gradient-to-br from-slate-900 via-slate-800 to-slate-900 mb-10">

        <!-- Glow -->
        <div class="absolute w-64 h-64 rounded-full -top-20 -right-20 bg-cyan-500/20 blur-3xl"></div>
        <div class="absolute w-56 h-56 rounded-full -bottom-20 -left-10 bg-blue-500/10 blur-3xl"></div>

        <div
            class="relative z-10 flex flex-col gap-6 px-6 py-8 md:flex-row md:items-center md:justify-between md:px-10">

            <!-- Title -->
            <div>

                <div
                    class="inline-flex items-center gap-2 px-4 py-2 mb-4 text-xs font-semibold tracking-wider uppercase border rounded-full bg-cyan-500/10 text-cyan-300 border-cyan-400/20">

                    <i class="fa-solid fa-film"></i>

                    Movie Collection

                </div>

                <h1
                    class="text-3xl font-black leading-tight text-white md:text-5xl">

                    Explore <span class="text-cyan-400">Movies</span>

                </h1>

                <p
                    class="max-w-2xl mt-4 text-sm leading-relaxed md:text-base text-slate-400">

       Discover a variety of your favorite top-rated movies with a modern interface, attractive ratings, and a more comfortable streaming experience.

                </p>
            </div>

            <!-- Stats -->
            <div
                class="flex items-center gap-4 p-5 border rounded-3xl bg-white/5 border-white/10 backdrop-blur-xl">

                <div
                    class="flex items-center justify-center w-14 h-14 rounded-2xl bg-cyan-500/20 text-cyan-300">

                    <i class="text-2xl fa-solid fa-clapperboard"></i>

                </div>

                <div>

                    <h3 class="text-2xl font-bold text-white">
                        {{ $movies->count() }}
                    </h3>

                    <p class="text-sm text-slate-400">
                        Total Movies
                    </p>

                </div>

            </div>

        </div>
    </div>

    <!-- MOVIE GRID -->
    <div
        id="movie-list"
        class="grid grid-cols-2 gap-5 sm:grid-cols-3 lg:grid-cols-4 xl:grid-cols-5">

        <x-movie-list :movies="$movies" />

    </div>

    <!-- LOAD MORE -->
    <div class="flex justify-center mt-14">

        <button
            type="button"
            id="load-more"
            data-page="2"
            class="group relative inline-flex items-center gap-3 overflow-hidden rounded-2xl border border-cyan-400/20 bg-cyan-500/10 px-7 py-4 text-sm font-semibold text-cyan-300 shadow-lg shadow-cyan-500/10 backdrop-blur-md transition-all duration-300 hover:-translate-y-1 hover:bg-cyan-400 hover:text-slate-900 hover:shadow-cyan-500/30">

            <!-- glossy -->
            <span
                class="absolute top-0 left-[-120%] h-full w-[60%] skew-x-12 bg-gradient-to-r from-transparent via-white/30 to-transparent transition-all duration-1000 group-hover:left-[140%]">
            </span>

            <i
                class="relative z-10 fa-solid fa-rotate-right transition duration-500 group-hover:rotate-180">
            </i>

            <span class="relative z-10">
                Load More
            </span>

        </button>

    </div>

</div>
@endsection

@push('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function() {

        const loadMoreBtn = document.querySelector('#load-more');

        loadMoreBtn.addEventListener('click', function() {

            let page = loadMoreBtn.getAttribute('data-page');

            // loading state
            loadMoreBtn.disabled = true;

            loadMoreBtn.innerHTML = `
                <i class="fa-solid fa-spinner animate-spin"></i>
                <span>Memuat...</span>
            `;

            fetch(`/movies?page=${page}`, {
                    headers: {
                        'X-Requested-With': 'XMLHttpRequest'
                    }
                })

                .then(response => response.json())

                .then(data => {

                    const movieList = document.querySelector('#movie-list');

                    movieList.insertAdjacentHTML('beforeend', data.html);

                    // next page
                    loadMoreBtn.setAttribute(
                        'data-page',
                        parseInt(page) + 1
                    );

                    // restore button
                    loadMoreBtn.disabled = false;

                    loadMoreBtn.innerHTML = `
                        <span class="absolute top-0 left-[-120%] h-full w-[60%] skew-x-12 bg-gradient-to-r from-transparent via-white/30 to-transparent transition-all duration-1000 group-hover:left-[140%]"></span>

                        <i class="relative z-10 fa-solid fa-rotate-right transition duration-500 group-hover:rotate-180"></i>

                        <span class="relative z-10">
                            Lebih Banyak
                        </span>
                    `;

                    // hide button if no next page
                    if (!data.next_page) {

                        loadMoreBtn.classList.add('hidden');
                    }
                })

                .catch(error => {

                    console.error('Error:', error);

                    loadMoreBtn.disabled = false;

                    loadMoreBtn.innerHTML = `
                        <i class="fa-solid fa-triangle-exclamation"></i>
                        <span>Gagal Memuat</span>
                    `;
                });
        });
    });
</script>
@endpush