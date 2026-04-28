<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('page-title') - Velplay</title>
    @vite('resources/css/app.css')
    <link rel="stylesheet" href="{{ asset('assets/fontawesome-free-6.6.0-web/css/all.css') }}">
</head>

<body class="min-h-screen bg-gradient-to-br from-gray-900 via-gray-800 to-gray-700 text-white">
    
    <!-- Header -->
    <header class="py-10 text-center">
        <h1 class="text-4xl md:text-5xl font-semibold tracking-wide">@yield('title')</h1>
    </header>

    <!-- Konten utama -->
    <main class="flex justify-center px-4 md:px-8">
        <div class="w-full max-w-6xl">
            @yield('content')
        </div>
    </main>

    <!-- Script tambahan -->
    @yield('scripts')
</body>
</html>
