<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <title>@yield('page-title') Velplay</title>

    @vite('resources/css/app.css')

    <link rel="stylesheet"
        href="{{ asset('assets/fontawesome-free-6.6.0-web/css/all.css') }}">

    <script defer
        src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js">
    </script>
</head>

<body
    class="bg-gradient-to-br from-gray-900 via-gray-800 to-gray-900 text-white">

    <!-- WRAPPER -->
    <div class="flex flex-col min-h-screen">

        <!-- NAVBAR -->
        <x-navbar />

        <!-- CONTENT -->
        <main class="flex-1 w-full mb-10">
            @yield('content')
        </main>

        <!-- FOOTER -->
        <footer
            class="mt-auto border-t border-gray-700 bg-gray-900 py-6">
            

            <div class="container mx-auto px-4 text-center text-sm text-white">
                <p>
                    <script>
                        document.write(new Date().getFullYear())
                    </script>
                    Gana Purba Kusuma. ALL rights reserved.
                </p>
            </div>

        </footer>

    </div>

    @stack('scripts')

</body>

</html>