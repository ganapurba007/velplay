<nav class="bg-gray-900 border-b border-gray-700 z-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex h-16 items-center justify-between">

            <!-- Left: Logo + Dropdown -->
            <div class="flex items-center space-x-6">
                <a href="{{ route('home') }}">
                    <img src="{{ asset('assets/img/logo-nav.png') }}" alt="Logo" class="h-10 w-auto">
                </a>

                <!-- Dropdown Kategori (desktop) -->
                <div class="relative hidden md:block">
                    <button class="flex items-center text-gray-300 hover:text-white focus:outline-none toggle-btn"
                        data-target="kategori-menu-desktop">
                        <span>Kategori</span>
                        <i class="fa-solid fa-chevron-down ml-2"></i>
                    </button>
                    <div id="kategori-menu-desktop"
                        class="absolute left-0 mt-2 w-auto min-w-max bg-gray-800 border border-indigo-300 rounded-md shadow-lg hidden z-[999]">
                        <x-category-nav />
                    </div>
                </div>
            </div>

            <!-- Center: Search -->
            <div class="flex-1 flex justify-center px-4">
                <form class="flex items-center bg-gray-800 rounded-md px-2 w-full max-w-md" method="GET" action="{{ route('movies.search') }}">
                    <input type="text" name="q" value="{{ request('q') }}" placeholder="Cari Disini"
                        class="bg-transparent text-white placeholder-gray-400 focus:outline-none px-2 py-1 w-full">
                    <button type="submit" class="text-gray-400 hover:text-white">
                        <i class="fa-solid fa-magnifying-glass"></i>
                    </button>
                </form>
            </div>

            <!-- Right: Notification + User (desktop) -->
            <div class="hidden md:flex items-center space-x-4">
                <button class="text-gray-400 hover:text-white">
                    <i class="fa-solid fa-bell"></i>
                </button>
                <div class="relative">
                    <button class="text-gray-400 hover:text-white focus:outline-none toggle-btn"
                        data-target="user-menu">
                        <i class="fa-solid fa-user"></i>
                    </button>
                    <div id="user-menu" class="absolute right-0 mt-2 w-40 bg-gray-800 rounded-md shadow-lg hidden">
                        <a href="#" class="block px-4 py-2 text-sm text-gray-300 hover:bg-gray-700">Profile
                            Settings</a>
                        <a href="#" class="block px-4 py-2 text-sm text-gray-300 hover:bg-gray-700">Logout</a>
                    </div>
                </div>
            </div>

            <!-- Mobile Hamburger -->
            <div class="md:hidden">
                <button id="hamburger-btn" class="text-gray-400 hover:text-white">
                    <i class="fa-solid fa-bars"></i>
                </button>
            </div>
        </div>
    </div>

    <!-- Mobile Menu -->
    <div id="mobile-menu" class="hidden md:hidden px-4 pt-2 pb-3 space-y-3">
        <div>
            <button
                class="flex items-center w-full px-3 py-2 rounded-md text-base font-medium text-gray-300 hover:bg-gray-700 toggle-btn"
                data-target="kategori-menu-mobile">
                <span>Kategori</span>
                <i class="fa-solid fa-chevron-down ml-2"></i>
            </button>
            <div id="kategori-menu-mobile" class="hidden mt-2 space-y-1 bg-gray-800 rounded-md shadow-lg z-[999]">
                <x-category-nav />
            </div>
        </div>

        <!-- Search -->
        <form class="flex items-center bg-gray-800 rounded-md px-2" method="GET" action="{{ route('movies.search') }}">
            <input type="text" name="q" value="{{ request('q') }}" placeholder="Cari Disini"
                class="bg-transparent text-white placeholder-gray-400 focus:outline-none px-2 py-1 w-full">
            <button type="submit" class="text-gray-400 hover:text-white">
                <i class="fa-solid fa-magnifying-glass"></i>
            </button>
        </form>

        <!-- Notification & User (mobile) -->
        <div class="flex items-center space-x-4">
            <button class="text-gray-400 hover:text-white">
                <i class="fa-solid fa-bell"></i>
            </button>
            <div class="relative">
                <button class="text-gray-400 hover:text-white focus:outline-none toggle-btn"
                    data-target="user-menu-mobile">
                    <i class="fa-solid fa-user"></i>
                </button>
                <div id="user-menu-mobile" class="absolute left-0 mt-2 w-40 bg-gray-800 rounded-md shadow-lg hidden">
                    <a href="#" class="block px-4 py-2 text-sm text-gray-300 hover:bg-gray-700">Profile
                        Settings</a>
                    <a href="#" class="block px-4 py-2 text-sm text-gray-300 hover:bg-gray-700">Logout</a>
                </div>
            </div>
        </div>
    </div>
</nav>

<script>
    // Hamburger toggle
    document.getElementById('hamburger-btn').addEventListener('click', () => {
        document.getElementById('mobile-menu').classList.toggle('hidden');
    });

    // Generic dropdown toggle
    document.querySelectorAll('.toggle-btn').forEach(btn => {
        btn.addEventListener('click', () => {
            const target = document.getElementById(btn.dataset.target);
            target.classList.toggle('hidden');
        });
    });

    window.addEventListener('click', (e) => {
    document.querySelectorAll('.toggle-btn').forEach(btn => {
        const target = document.getElementById(btn.dataset.target);
        // jika menu sedang terbuka dan klik bukan di tombol atau menu
        if (!target.classList.contains('hidden') && !btn.contains(e.target) && !target.contains(e.target)) {
            target.classList.add('hidden');
        }
    });
});

</script>
