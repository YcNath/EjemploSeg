@extends('layouts.plantilla')

@section('title', 'Crear interés')

@section('content')

    <div class="mx-auto max-w-3xl">

        <div class="mb-8">

            <p class="mb-2 text-sm font-semibold text-emerald-600">
                Intereses
            </p>

            <h1 class="text-3xl font-bold tracking-tight text-slate-900">
                Registrar interés
            </h1>

            <p class="mt-2 text-slate-500">
                Agrega un nuevo interés que posteriormente podrá asignarse a las personas.
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
                    Información del interés
                </h2>

                <p class="mt-1 text-sm text-slate-500">
                    Escribe un nombre claro y una breve descripción.
                </p>
            </div>

            <form
                action="{{ route('intereses.store') }}"
                method="POST"
                class="space-y-7 p-6 sm:p-8"
            >
                @csrf

                <div>

                    <label
                        for="nombre"
                        class="mb-2 block text-sm font-semibold text-slate-700"
                    >
                        Nombre del interés
                    </label>

                    <input
                        type="text"
                        name="nombre"
                        id="nombre"
                        value="{{ old('nombre') }}"
                        placeholder="Ejemplo: Tecnología"
                        class="w-full rounded-xl border border-slate-300
                               bg-slate-50 px-4 py-3 text-sm
                               outline-none transition
                               focus:border-emerald-500 focus:bg-white
                               focus:ring-4 focus:ring-emerald-100"
                        required
                    >

                    @error('nombre')
                        <p class="mt-2 text-sm text-red-500">
                            {{ $message }}
                        </p>
                    @enderror

                </div>

                <div>

                    <label
                        for="descripcion"
                        class="mb-2 block text-sm font-semibold text-slate-700"
                    >
                        Descripción
                    </label>

                    <textarea
                        name="descripcion"
                        id="descripcion"
                        rows="5"
                        placeholder="Describe brevemente este interés..."
                        class="w-full resize-none rounded-xl
                               border border-slate-300 bg-slate-50
                               px-4 py-3 text-sm outline-none transition
                               focus:border-emerald-500 focus:bg-white
                               focus:ring-4 focus:ring-emerald-100"
                    >{{ old('descripcion') }}</textarea>

                    @error('descripcion')
                        <p class="mt-2 text-sm text-red-500">
                            {{ $message }}
                        </p>
                    @enderror

                </div>

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
                               from-emerald-600 to-teal-600
                               px-6 py-3 text-sm font-semibold
                               text-white shadow-lg shadow-emerald-500/20
                               transition hover:-translate-y-0.5"
                    >
                        Guardar interés
                    </button>

                </div>

            </form>

        </div>

    </div>

@endsection