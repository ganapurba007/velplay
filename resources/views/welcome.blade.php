<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title') - Velplay</title>
    @vite('resources/css/app.css')
    <link rel="stylesheet" href="{{ asset('assets/fontawesome-free-6.6.0-web/css/all.css') }}">
</head>

<body class="min-h-screen flex bg-cover bg-left-bottom bg-no-repeat relative"
    style="background-image: url('{{ asset('assets/img/bgLogin.webp') }}');">

    <!-- Overlay transparan + blur -->
    <div class="absolute inset-0 bg-black/40 backdrop-blur-sm"></div>

    <!-- Konten di atas background -->
    <div class="relative flex w-full min-h-screen items-center justify-center">
        <div class="w-full max-w-md bg-white/90 shadow-lg rounded-lg p-8">

            {{-- Error Alert --}}
            @if ($errors->any())
                <div class="mb-4 rounded-md bg-red-100 p-3 text-red-700">
                    <ul class="list-disc list-inside text-sm">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            {{-- Status Alert --}}
            @if (session('status'))
                <div class="mb-4 rounded-md bg-green-100 p-3 text-green-700 text-sm">
                    {{ session('status') }}
                </div>
            @endif

            @yield('content')
        </div>
    </div>

    @yield('script')
</body>



</html>
