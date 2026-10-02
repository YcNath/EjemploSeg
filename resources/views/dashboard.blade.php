@extends('layouts.plantilla')

@section('title', 'Dashboard')

@section('content')

    {{-- Bienvenida --}}
    <div
        class="relative mb-8 overflow-hidden rounded-3xl
               bg-gradient-to-r from-blue-600 to-indigo-700
               p-8 text-white shadow-xl shadow-blue-900/10"
    >

        <div class="relative z-10">

            <p class="mb-2 text-sm font-medium text-blue-100">
                Panel principal
            </p>

            <h1 class="text-3xl font-bold sm:text-4xl">
                ¡Hola, {{ Auth::user()->name }}!
            </h1>

            <p class="mt-3 max-w-2xl text-sm text-blue-100 sm:text-base">
                Bienvenido a EjemploSeg. Desde aquí puedes consultar
                el estado general del sistema y acceder a las principales funciones.
            </p>

        </div>

        <div
            class="absolute -bottom-20 -right-16 h-64 w-64
                   rounded-full bg-white/10"
        ></div>

        <div
            class="absolute -right-4 -top-16 h-40 w-40
                   rounded-full bg-white/10"
        ></div>

    </div>

    {{-- Estadísticas --}}
    <div class="grid grid-cols-1 gap-6 md:grid-cols-3">

        {{-- Personas --}}
        <div
            class="group rounded-2xl border border-slate-200 bg-white
                   p-6 shadow-sm transition duration-300
                   hover:-translate-y-1 hover:shadow-lg"
        >

            <div class="flex items-start justify-between">

                <div>
                    <p class="text-sm font-medium text-slate-500">
                        Personas registradas
                    </p>

                    <p class="mt-3 text-4xl font-bold text-slate-900">
                        {{ $totalPersonas }}
                    </p>
                </div>

                <div
                    class="flex h-12 w-12 items-center justify-center
                           rounded-2xl bg-blue-50 text-xl font-bold
                           text-blue-600 transition group-hover:bg-blue-600
                           group-hover:text-white"
                >
                    P
                </div>

            </div>

            <div class="mt-6 border-t border-slate-100 pt-4">

                <a
                    href="{{ route('personas.create') }}"
                    class="text-sm font-semibold text-blue-600
                           hover:text-blue-700"
                >
                    Crear persona →
                </a>

            </div>

        </div>

        {{-- Intereses --}}
        <div
            class="group rounded-2xl border border-slate-200 bg-white
                   p-6 shadow-sm transition duration-300
                   hover:-translate-y-1 hover:shadow-lg"
        >

            <div class="flex items-start justify-between">

                <div>
                    <p class="text-sm font-medium text-slate-500">
                        Intereses registrados
                    </p>

                    <p class="mt-3 text-4xl font-bold text-slate-900">
                        {{ $totalIntereses }}
                    </p>
                </div>

                <div
                    class="flex h-12 w-12 items-center justify-center
                           rounded-2xl bg-emerald-50 text-xl font-bold
                           text-emerald-600 transition
                           group-hover:bg-emerald-600 group-hover:text-white"
                >
                    I
                </div>

            </div>

            <div class="mt-6 border-t border-slate-100 pt-4">

                <a
                    href="{{ route('intereses.create') }}"
                    class="text-sm font-semibold text-emerald-600
                           hover:text-emerald-700"
                >
                    Crear interés →
                </a>

            </div>

        </div>

        {{-- Usuarios --}}
        <div
            class="group rounded-2xl border border-slate-200 bg-white
                   p-6 shadow-sm transition duration-300
                   hover:-translate-y-1 hover:shadow-lg"
        >

            <div class="flex items-start justify-between">

                <div>
                    <p class="text-sm font-medium text-slate-500">
                        Usuarios registrados
                    </p>

                    <p class="mt-3 text-4xl font-bold text-slate-900">
                        {{ $totalUsuarios }}
                    </p>
                </div>

                <div
                    class="flex h-12 w-12 items-center justify-center
                           rounded-2xl bg-violet-50 text-xl font-bold
                           text-violet-600 transition
                           group-hover:bg-violet-600 group-hover:text-white"
                >
                    U
                </div>

            </div>

            <div class="mt-6 border-t border-slate-100 pt-4">

                <a
                    href="{{ route('usuarios.index') }}"
                    class="text-sm font-semibold text-violet-600
                           hover:text-violet-700"
                >
                    Ver usuarios →
                </a>

            </div>

        </div>

    </div>

@endsection