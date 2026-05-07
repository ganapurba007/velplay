<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('page-title') Velplay</title>
    @vite('resources/css/app.css')
    <link rel="stylesheet" href="{{ asset('assets/fontawesome-free-6.6.0-web/css/all.css') }}">
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
</head>

<body class="min-h-screen bg-gradient-to-br from-gray-900 via-gray-800 to-gray-900 text-white">
  <x-navbar/>
  
  @yield('content')

  <footer class="flex items-center justify-center py-7 h-10 bg-gray-900 border-b border-gray-700 bottom-0 mt-10">
    <div class="text-center text-white">
      <p>
        <script>document.write(new Date().getFullYear())</script> Gana Purba Kusuma. ALL rights reserved.
      </p>
    </div>
  </footer>
</body>



</html>
