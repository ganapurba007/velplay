<div class="w-full grid grid-cols-1 sm:grid-cols-2 md:grid-cols-{{ count($categories) }} gap-6 p-4">
    @foreach ($categories as $chunk)
        <div class="space-y-2">
            @foreach ($chunk as $category)
                <a href="#"
                   class="block px-3 py-2 rounded-md text-sm font-medium text-gray-300 hover:bg-gray-700 hover:text-white transition">
                    {{ $category->title }}
                </a>
            @endforeach
        </div>
    @endforeach
</div>
