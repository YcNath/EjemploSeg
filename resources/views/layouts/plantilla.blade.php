<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>EjemploSeg - @yield('title', 'Dashboard')</title>
    @if (file_exists(public_path('build/manifest.json')) || file_exists(public_path('hot')))
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    @else
        <link rel="stylesheet" href="{{ asset('css/dashboard.css') }}">
    @endif
</head>
<body class="bg-gray-100 font-sans antialiased">
    <nav class="flex flex-wrap items-center justify-between gap-4 bg-white px-8 py-4 shadow-md" aria-label="Cuenta">
        <a class="font-bold" href="{{ route('dashboard') }}">EjemploSeg</a>
        <div class="flex flex-wrap items-center gap-4">
            <span>{{ Auth::user()->name }}</span>
            <form action="{{ route('logout') }}" method="POST">
                @csrf
                <button class="text-blue-700 hover:underline" type="submit">Cerrar sesión</button>
            </form>
        </div>
    </nav>
    <div class="flex flex-col md:flex-row min-h-screen">
        @include('layouts.sidebar')
        <main class="flex-1 p-8">
            @if(session('success'))
                <div class="bg-green-100 text-green-700 px-4 py-3 rounded mb-4">
                    {{ session('success') }}
                </div>
            @endif
            @yield('content')
        </main>
    </div>
</body>
</html>
