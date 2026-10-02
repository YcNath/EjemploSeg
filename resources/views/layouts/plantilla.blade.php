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

<body class="min-h-screen bg-slate-100 font-sans antialiased text-slate-800">

    {{-- Barra superior --}}
    <nav
        class="sticky top-0 z-50 border-b border-slate-200
               bg-white/95 shadow-sm backdrop-blur"
    >
        <div
            class="flex min-h-[72px] items-center justify-between
                   gap-4 px-5 md:px-8"
        >

            {{-- Marca --}}
            <a
                href="{{ route('dashboard') }}"
                class="flex items-center gap-3"
            >
                <div
                    class="flex h-10 w-10 items-center justify-center
                           rounded-xl bg-gradient-to-br from-blue-600
                           to-indigo-600 font-bold text-white shadow-md"
                >
                    E
                </div>

                <div>
                    <p class="font-bold leading-tight text-slate-900">
                        EjemploSeg
                    </p>

                    <p class="text-xs text-slate-400">
                        Panel administrativo
                    </p>
                </div>
            </a>

            {{-- Usuario --}}
            <div class="flex items-center gap-3">

                <div class="hidden text-right sm:block">
                    <p class="text-sm font-semibold text-slate-700">
                        {{ Auth::user()->name }}
                    </p>

                    <p class="text-xs text-slate-400">
                        Sesión activa
                    </p>
                </div>

                <div
                    class="flex h-10 w-10 items-center justify-center
                           rounded-full bg-gradient-to-br from-blue-100
                           to-indigo-100 font-bold text-blue-700"
                >
                    {{ strtoupper(substr(Auth::user()->name, 0, 1)) }}
                </div>

                <form action="{{ route('logout') }}" method="POST">
                    @csrf

                    <button
                        type="submit"
                        class="rounded-xl border border-slate-200
                               bg-white px-4 py-2 text-sm font-medium
                               text-slate-600 transition
                               hover:border-red-200 hover:bg-red-50
                               hover:text-red-600"
                    >
                        Salir
                    </button>
                </form>

            </div>

        </div>
    </nav>

    <div class="flex min-h-[calc(100vh-72px)] flex-col md:flex-row">

        @include('layouts.sidebar')

        <main class="min-w-0 flex-1">

            <div class="p-5 sm:p-6 lg:p-10">

                @if(session('success'))
                    <div
                        class="mx-auto mb-6 max-w-7xl rounded-2xl
                               border border-emerald-200 bg-emerald-50
                               px-5 py-4 text-sm font-medium
                               text-emerald-700 shadow-sm"
                    >
                        {{ session('success') }}
                    </div>
                @endif

                <div class="mx-auto w-full max-w-7xl">
                    @yield('content')
                </div>

            </div>

        </main>

    </div>

</body>

</html>