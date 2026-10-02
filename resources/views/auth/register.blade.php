@extends('layouts.guest')

@section('title', 'Crear cuenta')

@section('content')

    <div class="mb-8 text-center">

        <div
            class="mx-auto mb-4 flex h-12 w-12 items-center justify-center
                   rounded-2xl bg-indigo-50 text-indigo-600"
        >
            <svg
                xmlns="http://www.w3.org/2000/svg"
                class="h-6 w-6"
                fill="none"
                viewBox="0 0 24 24"
                stroke="currentColor"
            >
                <path
                    stroke-linecap="round"
                    stroke-linejoin="round"
                    stroke-width="2"
                    d="M18 9v3m0 0v3m0-3h3m-3 0h-3M13 7a4 4 0 11-8 0 4 4 0 018 0zM3 21a6 6 0 0112 0"
                />
            </svg>
        </div>

        <h1 class="text-2xl font-bold text-slate-900">
            Crear una cuenta
        </h1>

        <p class="mt-2 text-sm text-slate-500">
            Completa los siguientes datos para registrarte
        </p>

    </div>

    <form action="{{ route('register') }}" method="POST" class="space-y-5">
        @csrf

        <div>
            <label for="name" class="mb-2 block text-sm font-semibold text-slate-700">
                Nombre
            </label>

            <input
                type="text"
                name="name"
                id="name"
                value="{{ old('name') }}"
                placeholder="Tu nombre"
                class="w-full rounded-xl border border-slate-300 bg-slate-50
                       px-4 py-3 text-sm outline-none transition
                       focus:border-blue-500 focus:bg-white
                       focus:ring-4 focus:ring-blue-100"
                required
                autofocus
            >

            @error('name')
                <p class="mt-2 text-sm text-red-500">
                    {{ $message }}
                </p>
            @enderror
        </div>

        <div>
            <label for="email" class="mb-2 block text-sm font-semibold text-slate-700">
                Correo electrónico
            </label>

            <input
                type="email"
                name="email"
                id="email"
                value="{{ old('email') }}"
                placeholder="correo@ejemplo.com"
                class="w-full rounded-xl border border-slate-300 bg-slate-50
                       px-4 py-3 text-sm outline-none transition
                       focus:border-blue-500 focus:bg-white
                       focus:ring-4 focus:ring-blue-100"
                required
            >

            @error('email')
                <p class="mt-2 text-sm text-red-500">
                    {{ $message }}
                </p>
            @enderror
        </div>

        <div>
            <label for="password" class="mb-2 block text-sm font-semibold text-slate-700">
                Contraseña
            </label>

            <input
                type="password"
                name="password"
                id="password"
                placeholder="••••••••"
                class="w-full rounded-xl border border-slate-300 bg-slate-50
                       px-4 py-3 text-sm outline-none transition
                       focus:border-blue-500 focus:bg-white
                       focus:ring-4 focus:ring-blue-100"
                required
            >

            @error('password')
                <p class="mt-2 text-sm text-red-500">
                    {{ $message }}
                </p>
            @enderror
        </div>

        <div>
            <label
                for="password_confirmation"
                class="mb-2 block text-sm font-semibold text-slate-700"
            >
                Confirmar contraseña
            </label>

            <input
                type="password"
                name="password_confirmation"
                id="password_confirmation"
                placeholder="••••••••"
                class="w-full rounded-xl border border-slate-300 bg-slate-50
                       px-4 py-3 text-sm outline-none transition
                       focus:border-blue-500 focus:bg-white
                       focus:ring-4 focus:ring-blue-100"
                required
            >
        </div>

        <button
            type="submit"
            class="w-full rounded-xl bg-gradient-to-r
                   from-blue-600 to-indigo-600 px-4 py-3
                   text-sm font-semibold text-white shadow-lg
                   shadow-blue-500/20 transition
                   hover:-translate-y-0.5 hover:shadow-xl"
        >
            Crear cuenta
        </button>

        <div class="border-t border-slate-100 pt-5 text-center">

            <p class="text-sm text-slate-500">
                ¿Ya tienes una cuenta?

                <a
                    href="{{ route('login') }}"
                    class="font-semibold text-blue-600 hover:text-blue-700"
                >
                    Inicia sesión
                </a>
            </p>

        </div>

    </form>

@endsection