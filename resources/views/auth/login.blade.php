@extends('layouts.guest')

@section('title', 'Iniciar sesión')

@section('content')

    <div class="mb-8 text-center">

        <div
            class="mx-auto mb-4 flex h-12 w-12 items-center justify-center
                   rounded-2xl bg-blue-50 text-blue-600"
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
                    d="M5.121 17.804A8.966 8.966 0 0112 15c2.21 0 4.236.798 5.879 2.121M15 11a3 3 0 11-6 0 3 3 0 016 0z"
                />
            </svg>
        </div>

        <h1 class="text-2xl font-bold text-slate-900">
            Bienvenido
        </h1>

        <p class="mt-2 text-sm text-slate-500">
            Ingresa tus datos para acceder al sistema
        </p>

    </div>

    <form action="{{ route('login') }}" method="POST" class="space-y-5">
        @csrf

        <div>
            <label
                for="email"
                class="mb-2 block text-sm font-semibold text-slate-700"
            >
                Correo electrónico
            </label>

            <input
                type="email"
                name="email"
                id="email"
                value="{{ old('email') }}"
                placeholder="correo@ejemplo.com"
                class="w-full rounded-xl border border-slate-300 bg-slate-50
                       px-4 py-3 text-sm text-slate-900 outline-none transition
                       placeholder:text-slate-400
                       focus:border-blue-500 focus:bg-white
                       focus:ring-4 focus:ring-blue-100"
                required
                autofocus
            >

            @error('email')
                <p class="mt-2 text-sm text-red-500">
                    {{ $message }}
                </p>
            @enderror
        </div>

        <div>
            <label
                for="password"
                class="mb-2 block text-sm font-semibold text-slate-700"
            >
                Contraseña
            </label>

            <input
                type="password"
                name="password"
                id="password"
                placeholder="••••••••"
                class="w-full rounded-xl border border-slate-300 bg-slate-50
                       px-4 py-3 text-sm text-slate-900 outline-none transition
                       placeholder:text-slate-400
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

        <label class="flex cursor-pointer items-center gap-3">
            <input
                type="checkbox"
                name="remember"
                class="h-4 w-4 rounded border-slate-300
                       text-blue-600 focus:ring-blue-500"
            >

            <span class="text-sm text-slate-600">
                Recordarme
            </span>
        </label>

        <button
            type="submit"
            class="w-full rounded-xl bg-gradient-to-r
                   from-blue-600 to-indigo-600 px-4 py-3
                   text-sm font-semibold text-white shadow-lg
                   shadow-blue-500/20 transition
                   hover:-translate-y-0.5 hover:shadow-xl"
        >
            Iniciar sesión
        </button>

        <div class="border-t border-slate-100 pt-5 text-center">

            <p class="text-sm text-slate-500">
                ¿No tienes una cuenta?

                <a
                    href="{{ route('register') }}"
                    class="font-semibold text-blue-600 hover:text-blue-700"
                >
                    Regístrate
                </a>
            </p>

        </div>

    </form>

@endsection