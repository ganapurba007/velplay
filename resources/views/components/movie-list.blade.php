@foreach ($movies as $movie)

<a href="{{ route('movies.show', $movie->slug) }}"
    class="group block">

    <div
        class="relative overflow-hidden rounded-3xl border border-white/10 bg-slate-900/70 shadow-2xl backdrop-blur-md transition-all duration-500 hover:-translate-y-2 hover:shadow-cyan-500/20">

        <!-- Poster -->
        <div class="relative overflow-hidden">

            <img
                src="{{ $movie->poster }}"
                alt="{{ $movie->title }}"
                class="h-[340px] w-full object-cover transition duration-500 group-hover:scale-110">

            <!-- Overlay -->
            <div
                class="absolute inset-0 bg-gradient-to-t from-black via-black/30 to-transparent opacity-90">
            </div>

            <!-- Rating -->
            <div
                class="absolute top-4 right-4 flex items-center gap-1 rounded-full border border-white/10 bg-black/60 px-3 py-1.5 text-xs font-semibold text-white backdrop-blur-md">

                <i class="fa-solid fa-star text-yellow-400"></i>

                <span>{{ $movie->average_rating }}</span>
            </div>

            <!-- Category -->
            @if ($movie->categories->count())
            <div class="absolute top-4 left-4 flex flex-wrap gap-2">

                @foreach ($movie->categories->take(1) as $category)

                <span
                    class="rounded-full border border-cyan-400/20 bg-cyan-500/20 px-3 py-1 text-xs font-medium text-cyan-300 backdrop-blur-md">

                    {{ $category->title }}

                </span>

                @endforeach

            </div>
            @endif

            <!-- Content -->
            <div class="absolute bottom-0 left-0 w-full p-5">

                <h3
                    class="line-clamp-2 text-lg font-bold leading-7 text-white transition duration-300 group-hover:text-cyan-400">

                    {{ $movie->title }}

                </h3>

                <div class="mt-3 flex items-center justify-between">

                    <span class="text-sm text-slate-300">
                        {{ $movie->release_date->format('Y') }}
                    </span>

                    <span
                        class="rounded-full bg-white/10 px-3 py-1 text-xs text-slate-200 backdrop-blur-sm">

                        {{ $movie->formatted_duration ?? 'Movie' }}

                    </span>
                </div>
            </div>

            <!-- Glossy -->
            <div
                class="absolute top-0 left-[-120%] h-full w-[70%] skew-x-12 bg-gradient-to-r from-transparent via-white/10 to-transparent transition-all duration-1000 group-hover:left-[140%]">
            </div>

        </div>

    </div>

</a>

@endforeach