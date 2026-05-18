@extends('layouts.app')

@section('content')
    <!-- ================= NEW ADDED ================= -->
    <section class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 mt-14">

        <!-- HEADER -->
        <div class="flex items-center justify-between mb-6">

            <h3 class="text-2xl font-bold text-white">
                New Added
            </h3>

            <div class="flex gap-3">

                <button id="newPrev"
                    class="w-10 h-10 rounded-full bg-white/10 hover:bg-cyan-500/30 text-white backdrop-blur-md transition">
                    <i class="fa-solid fa-angle-left"></i>
                </button>

                <button id="newNext"
                    class="w-10 h-10 rounded-full bg-white/10 hover:bg-cyan-500/30 text-white backdrop-blur-md transition">
                    <i class="fa-solid fa-angle-right"></i>
                </button>

            </div>

        </div>

        <!-- VIEWPORT -->
        <div class="overflow-hidden">

            <!-- TRACK -->
            <div id="newCarousel" class="flex gap-6 transition-transform duration-500 ease-in-out">

                @foreach ($latestMovies as $movie)
                    <!-- CARD -->
                    <div
                        class="flex-shrink-0 w-full
           sm:w-[calc((100%-24px)/2)]
           lg:w-[calc((100%-48px)/3)]
           xl:w-[calc((100%-72px)/4)]">

                        <a href="{{ route('movies.show', $movie->slug) }}" class="group block h-full">

                            <div
                                class="relative overflow-hidden rounded-3xl border border-white/10 bg-slate-900/70 shadow-2xl backdrop-blur-md transition-all duration-500 hover:-translate-y-2 hover:shadow-cyan-500/20 h-full">

                                <!-- POSTER -->
                                <div class="relative overflow-hidden">

                                    <img src="{{ $movie->poster ?? asset('assets/img/default.webp') }}"
                                        alt="{{ $movie->title }}"
                                        class="w-full h-[260px] sm:h-[300px] lg:h-[340px] object-cover transition duration-500 group-hover:scale-110">

                                    <!-- OVERLAY -->
                                    <div
                                        class="absolute inset-0 bg-gradient-to-t from-black via-black/30 to-transparent opacity-90">
                                    </div>

                                    <!-- RATING -->
                                    <div
                                        class="absolute top-3 right-3 sm:top-4 sm:right-4 flex items-center gap-1 rounded-full border border-white/10 bg-black/60 px-2.5 py-1 sm:px-3 sm:py-1.5 text-[11px] sm:text-xs font-semibold text-white backdrop-blur-md">

                                        <i class="fa-solid fa-star text-yellow-400"></i>

                                        <span>
                                            {{ number_format($movie->average_rating, 1) }}
                                        </span>

                                    </div>

                                    <!-- CATEGORY -->
                                    @if ($movie->categories && $movie->categories->count())
                                        <div class="absolute top-3 left-3 sm:top-4 sm:left-4">

                                            @foreach ($movie->categories->take(1) as $category)
                                                <span
                                                    class="rounded-full border border-cyan-400/20 bg-cyan-500/20 px-2.5 py-1 sm:px-3 text-[10px] sm:text-xs font-medium text-cyan-300 backdrop-blur-md">

                                                    {{ $category->title }}

                                                </span>
                                            @endforeach

                                        </div>
                                    @endif

                                    <!-- CONTENT -->
                                    <div class="absolute bottom-0 left-0 w-full p-4 sm:p-5">

                                        <h3
                                            class="line-clamp-2 text-base sm:text-lg font-bold text-white transition group-hover:text-cyan-400">

                                            {{ $movie->title }}

                                        </h3>

                                        <div class="mt-3 flex items-center justify-between gap-2">

                                            <span class="text-xs sm:text-sm text-slate-300">
                                                {{ \Carbon\Carbon::parse($movie->release_date)->format('Y') }}
                                            </span>

                                            <span
                                                class="rounded-full bg-white/10 px-2.5 py-1 sm:px-3 text-[10px] sm:text-xs text-slate-200 backdrop-blur-sm whitespace-nowrap">

                                                {{ $movie->formatted_duration ?? 'Movie' }}

                                            </span>

                                        </div>

                                    </div>

                                    <!-- GLOSSY EFFECT -->
                                    <div
                                        class="absolute top-0 left-[-120%] h-full w-[70%] skew-x-12 bg-gradient-to-r from-transparent via-white/10 to-transparent transition-all duration-1000 group-hover:left-[140%]">
                                    </div>

                                </div>

                            </div>

                        </a>

                    </div>
                @endforeach

            </div>

        </div>

    </section>

    <!-- ================= TRENDING ================= -->
    <section class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 mt-14">

        <!-- HEADER -->
        <div class="flex items-center justify-between mb-6">

            <h3 class="text-2xl font-bold text-white">
                Trending
            </h3>

            <div class="flex gap-3">

                <button id="trendPrev"
                    class="w-10 h-10 rounded-full bg-white/10 hover:bg-cyan-500/30 text-white backdrop-blur-md transition">
                    <i class="fa-solid fa-angle-left"></i>
                </button>

                <button id="trendNext"
                    class="w-10 h-10 rounded-full bg-white/10 hover:bg-cyan-500/30 text-white backdrop-blur-md transition">
                    <i class="fa-solid fa-angle-right"></i>
                </button>

            </div>

        </div>

        <!-- VIEWPORT -->
        <div class="overflow-hidden">

            <!-- TRACK -->
            <div id="trendCarousel" class="flex gap-6 transition-transform duration-500 ease-in-out">

                @foreach ($popularMovies as $popular)
                    <!-- CARD -->
                    <div
                        class="flex-shrink-0 w-full
           sm:w-[calc((100%-24px)/2)]
           lg:w-[calc((100%-48px)/3)]
           xl:w-[calc((100%-72px)/4)]">

                        <a href="{{ route('movies.show', $popular->slug) }}" class="group block h-full">

                            <div
                                class="relative overflow-hidden rounded-3xl border border-white/10 bg-slate-900/70 shadow-2xl backdrop-blur-md transition-all duration-500 hover:-translate-y-2 hover:shadow-cyan-500/20 h-full">

                                <!-- POSTER -->
                                <div class="relative overflow-hidden">

                                    <img src="{{ $popular->poster ?? asset('assets/img/default.webp') }}"
                                        alt="{{ $popular->title }}"
                                        class="w-full h-[260px] sm:h-[300px] lg:h-[340px] object-cover transition duration-500 group-hover:scale-110">

                                    <!-- OVERLAY -->
                                    <div
                                        class="absolute inset-0 bg-gradient-to-t from-black via-black/30 to-transparent opacity-90">
                                    </div>

                                    <!-- RATING -->
                                    <div
                                        class="absolute top-3 right-3 sm:top-4 sm:right-4 flex items-center gap-1 rounded-full border border-white/10 bg-black/60 px-2.5 py-1 sm:px-3 sm:py-1.5 text-[11px] sm:text-xs font-semibold text-white backdrop-blur-md">

                                        <i class="fa-solid fa-star text-yellow-400"></i>

                                        <span>
                                            {{ number_format($popular->average_rating, 1) }}
                                        </span>

                                    </div>

                                    <!-- CATEGORY -->
                                    @if ($popular->categories && $popular->categories->count())
                                        <div class="absolute top-3 left-3 sm:top-4 sm:left-4">

                                            @foreach ($popular->categories->take(1) as $category)
                                                <span
                                                    class="rounded-full border border-cyan-400/20 bg-cyan-500/20 px-2.5 py-1 sm:px-3 text-[10px] sm:text-xs font-medium text-cyan-300 backdrop-blur-md">

                                                    {{ $category->title }}

                                                </span>
                                            @endforeach

                                        </div>
                                    @endif

                                    <!-- CONTENT -->
                                    <div class="absolute bottom-0 left-0 w-full p-4 sm:p-5">

                                        <h3
                                            class="line-clamp-2 text-base sm:text-lg font-bold text-white transition group-hover:text-cyan-400">

                                            {{ $popular->title }}

                                        </h3>

                                        <div class="mt-3 flex items-center justify-between gap-2">

                                            <span class="text-xs sm:text-sm text-slate-300">
                                                {{ \Carbon\Carbon::parse($popular->release_date)->format('Y') }}
                                            </span>

                                            <span
                                                class="rounded-full bg-white/10 px-2.5 py-1 sm:px-3 text-[10px] sm:text-xs text-slate-200 backdrop-blur-sm whitespace-nowrap">

                                                {{ $popular->formatted_duration ?? 'Movie' }}

                                            </span>

                                        </div>

                                    </div>

                                    <!-- GLOSSY EFFECT -->
                                    <div
                                        class="absolute top-0 left-[-120%] h-full w-[70%] skew-x-12 bg-gradient-to-r from-transparent via-white/10 to-transparent transition-all duration-1000 group-hover:left-[140%]">
                                    </div>

                                </div>

                            </div>

                        </a>

                    </div>
                @endforeach

            </div>

        </div>

    </section>

    <script>
        function initCarousel(carouselId, prevBtnId, nextBtnId) {

            const carousel = document.getElementById(carouselId);
            const prevBtn = document.getElementById(prevBtnId);
            const nextBtn = document.getElementById(nextBtnId);

            const cards = carousel.children;

            let index = 0;

            function getVisibleCards() {

                if (window.innerWidth < 640) {
                    return 1; // mobile
                } else if (window.innerWidth < 1024) {
                    return 2; // tablet
                } else if (window.innerWidth < 1280) {
                    return 3; // laptop
                }

                return 4; // desktop
            }

            function updateCarousel() {

                const gap = window.innerWidth < 640 ? 16 : 24;

                const cardWidth = cards[0].offsetWidth + gap;

                carousel.style.transform =
                    `translateX(-${index * cardWidth}px)`;
            }

            nextBtn.addEventListener('click', () => {

                const visibleCards = getVisibleCards();

                const maxIndex = cards.length - visibleCards;

                if (index < maxIndex) {
                    index++;
                    updateCarousel();
                }

            });

            prevBtn.addEventListener('click', () => {

                if (index > 0) {
                    index--;
                    updateCarousel();
                }

            });

            window.addEventListener('resize', () => {

                const visibleCards = getVisibleCards();
                const maxIndex = cards.length - visibleCards;

                if (index > maxIndex) {
                    index = maxIndex;
                }

                updateCarousel();
            });

            updateCarousel();
        }

        initCarousel('newCarousel', 'newPrev', 'newNext');
        initCarousel('trendCarousel', 'trendPrev', 'trendNext');
    </script>
@endsection
