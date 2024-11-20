<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Absensi</title>
    @vite('resources/css/app.css')
    <script src="//unpkg.com/alpinejs" defer></script>
</head>
<body class="bg-gray-100">
    <div class="flex flex-col md:flex-row min-h-screen">
        <!-- Sidebar -->
        <div class="w-full md:w-64 bg-gray-800 text-white">
            @include('layouts.sidebar')
        </div>
        
        <!-- Content Area -->
        <div class="flex-1 w-full bg-white p-10">
            @yield('content')
        </div>
    </div>
</body>
</html>
