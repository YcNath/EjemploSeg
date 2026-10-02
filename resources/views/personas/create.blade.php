@extends('layouts.plantilla')

@section('title', 'Crear persona')

@section('content')

    <div class="mx-auto max-w-3xl">

        <div class="mb-8">

            <p class="mb-2 text-sm font-semibold text-blue-600">
                Personas
            </p>

            <h1 class="text-3xl font-bold tracking-tight text-slate-900">
                Registrar persona
            </h1>

            <p class="mt-2 text-slate-500">
                Completa la información de la nueva persona y selecciona sus intereses.
            </p>

        </div>

        <div
            class="overflow-hidden rounded-3xl border border-slate-200
                   bg-white shadow-sm"
        >

            <div
                class="border-b border-slate-100 bg-slate-50
                       px-6 py-5 sm:px-8"
            >
                <h2 class="font-semibold text-slate-800">
                    Información personal
                </h2>

                <p class="mt-1 text-sm text-slate-500">
                    Los campos marcados son necesarios para guardar el registro.
                </p>
            </div>

            <form
                action="{{ route('personas.store') }}"
                method="POST"
                class="space-y-7 p-6 sm:p-8"
            >
                @csrf

                {{-- Nombre --}}
                <div>
                    <label
                        for="nombre"
                        class="mb-2 block text-sm font-semibold text-slate-700"
                    >
                        Nombre
                    </label>

                    <input
                        type="text"
                        name="nombre"
                        id="nombre"
                        value="{{ old('nombre') }}"
                        placeholder="Nombre completo"
                        class="w-full rounded-xl border border-slate-300
                               bg-slate-50 px-4 py-3 text-sm
                               outline-none transition
                               focus:border-blue-500 focus:bg-white
                               focus:ring-4 focus:ring-blue-100"
                        required
                    >

                    @error('nombre')
                        <p class="mt-2 text-sm text-red-500">
                            {{ $message }}
                        </p>
                    @enderror
                </div>

                {{-- Email --}}
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
                        class="w-full rounded-xl border border-slate-300
                               bg-slate-50 px-4 py-3 text-sm
                               outline-none transition
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

                {{-- Intereses --}}
                <div>

                    <div class="mb-3">

                        <p class="text-sm font-semibold text-slate-700">
                            Intereses
                        </p>

                        <p class="mt-1 text-xs text-slate-400">
                            Puedes seleccionar uno o varios.
                        </p>

                    </div>

                    <div class="grid grid-cols-1 gap-3 sm:grid-cols-2">

                        @foreach($intereses as $interes)

                            <label
                                class="group flex cursor-pointer items-center
                                       gap-3 rounded-xl border border-slate-200
                                       bg-slate-50 px-4 py-4 transition
                                       hover:border-blue-300 hover:bg-blue-50"
                            >

                                <input
                                    type="checkbox"
                                    name="intereses[]"
                                    value="{{ $interes->id }}"
                                    class="h-4 w-4 rounded border-slate-300
                                           text-blue-600 focus:ring-blue-500"
                                >

                                <span
                                    class="text-sm font-medium text-slate-700
                                           group-hover:text-blue-700"
                                >
                                    {{ $interes->nombre }}
                                </span>

                            </label>

                        @endforeach

                    </div>

                </div>

                {{-- Botones --}}
                <div
                    class="flex flex-col-reverse gap-3
                           border-t border-slate-100 pt-6
                           sm:flex-row sm:justify-end"
                >

                    <a
                        href="{{ route('dashboard') }}"
                        class="rounded-xl border border-slate-300
                               px-5 py-3 text-center text-sm
                               font-semibold text-slate-600 transition
                               hover:bg-slate-50"
                    >
                        Cancelar
                    </a>

                    <button
                        type="submit"
                        class="rounded-xl bg-gradient-to-r
                               from-blue-600 to-indigo-600
                               px-6 py-3 text-sm font-semibold
                               text-white shadow-lg shadow-blue-500/20
                               transition hover:-translate-y-0.5"
                    >
                        Guardar persona
                    </button>

                </div>

            </form>

        </div>

    </div>

@endsection