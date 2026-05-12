<div class="w-full p-4">

    <div class="grid grid-cols-1 gap-6 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4">

        @foreach ($categories as $chunk)

        <div class="space-y-2">

            @foreach ($chunk as $category)

            <a href="{{ route('categories.show', $category->slug) }}"
                class="flex items-center rounded-xl px-4 py-3 text-sm font-medium text-gray-300 transition duration-300 hover:bg-cyan-500/10 hover:text-cyan-400 hover:translate-x-1">

                <i class="fa-solid fa-film mr-3 text-xs text-cyan-400"></i>

                {{ $category->title }}

            </a>

            @endforeach

        </div>

        @endforeach

        <!-- All Movies -->
        <div class="space-y-2">

            <a href="{{ route('movies.index') }}"
                class="flex items-center rounded-xl px-4 py-3 text-sm font-semibold text-white bg-cyan-500/10 border border-cyan-400/20 transition duration-300 hover:bg-cyan-400 hover:text-slate-900">

                <i class="fa-solid fa-clapperboard mr-3"></i>

                Movies

            </a>

        </div>

    </div>

</div>