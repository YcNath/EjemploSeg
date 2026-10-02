<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>EjemploSeg - @yield('title', 'Acceso')</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="min-h-screen bg-slate-950 font-sans antialiased">

    <div class="relative flex min-h-screen items-center justify-center overflow-hidden px-4 py-10">

        {{-- Decoración de fondo --}}
        <div class="absolute -left-32 -top-32 h-96 w-96 rounded-full bg-blue-600/20 blur-3xl"></div>
        <div class="absolute -bottom-32 -right-32 h-96 w-96 rounded-full bg-indigo-600/20 blur-3xl"></div>

        <div class="relative z-10 w-full max-w-md">

            {{-- Logo --}}
            <div class="mb-8 text-center">
                <a href="/" class="inline-flex items-center gap-3">

                    <div
                        class="flex h-12 w-12 items-center justify-center rounded-2xl
                               bg-gradient-to-br from-blue-500 to-indigo-600
                               text-xl font-bold text-white shadow-lg shadow-blue-500/20"
                    >
                        E
                    </div>

                    <span class="text-2xl font-bold tracking-tight text-white">
                        EjemploSeg
                    </span>

                </a>

                <p class="mt-3 text-sm text-slate-400">
                    Sistema de gestión
                </p>
            </div>

            {{-- Tarjeta --}}
            <div
                class="rounded-3xl border border-white/10 bg-white p-8
                       shadow-2xl shadow-black/20"
            >

                @if(session('success'))
                    <div
                        class="mb-6 rounded-xl border border-emerald-200
                               bg-emerald-50 px-4 py-3 text-sm text-emerald-700"
                    >
                        {{ session('success') }}
                    </div>
                @endif

                @yield('content')

            </div>

            <p class="mt-6 text-center text-xs text-slate-500">
                © {{ date('Y') }} EjemploSeg
            </p>

        </div>

    </div>

</body>

</html>