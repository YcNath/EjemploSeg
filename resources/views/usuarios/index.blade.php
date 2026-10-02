@extends('layouts.plantilla')

@section('title', 'Usuarios')

@section('content')

    <div class="mb-8 flex flex-col gap-4 sm:flex-row sm:items-end sm:justify-between">

        <div>

            <p class="mb-2 text-sm font-semibold text-violet-600">
                Seguridad
            </p>

            <h1 class="text-3xl font-bold tracking-tight text-slate-900">
                Usuarios
            </h1>

            <p class="mt-2 text-slate-500">
                Consulta las cuentas registradas en el sistema.
            </p>

        </div>

        <div
            class="inline-flex w-fit items-center gap-2 rounded-xl
                   border border-slate-200 bg-white px-4 py-2
                   text-sm text-slate-500 shadow-sm"
        >
            <span
                class="h-2 w-2 rounded-full bg-emerald-500"
            ></span>

            {{ $usuarios->count() }} usuarios
        </div>

    </div>

    <div
        class="overflow-hidden rounded-3xl border
               border-slate-200 bg-white shadow-sm"
    >

        <div class="overflow-x-auto">

            <table class="min-w-full">

                <thead class="border-b border-slate-200 bg-slate-50">

                    <tr
                        class="text-left text-xs font-semibold uppercase
                               tracking-wider text-slate-500"
                    >
                        <th class="px-6 py-4">
                            ID
                        </th>

                        <th class="px-6 py-4">
                            Usuario
                        </th>

                        <th class="px-6 py-4">
                            Correo electrónico
                        </th>

                        <th class="px-6 py-4">
                            Fecha de registro
                        </th>
                    </tr>

                </thead>

                <tbody class="divide-y divide-slate-100">

                    @forelse ($usuarios as $usuario)

                        <tr class="transition hover:bg-slate-50">

                            <td class="px-6 py-5">

                                <span
                                    class="rounded-lg bg-slate-100
                                           px-2.5 py-1 text-xs
                                           font-semibold text-slate-500"
                                >
                                    #{{ $usuario->id }}
                                </span>

                            </td>

                            <td class="px-6 py-5">

                                <div class="flex items-center gap-3">

                                    <div
                                        class="flex h-10 w-10
                                               items-center justify-center
                                               rounded-full bg-gradient-to-br
                                               from-blue-100 to-indigo-100
                                               text-sm font-bold text-blue-700"
                                    >
                                        {{ strtoupper(substr($usuario->name, 0, 1)) }}
                                    </div>

                                    <div>

                                        <p class="text-sm font-semibold text-slate-800">
                                            {{ $usuario->name }}
                                        </p>

                                        <p class="text-xs text-slate-400">
                                            Usuario registrado
                                        </p>

                                    </div>

                                </div>

                            </td>

                            <td class="px-6 py-5 text-sm text-slate-600">
                                {{ $usuario->email }}
                            </td>

                            <td class="px-6 py-5">

                                <p class="text-sm font-medium text-slate-600">
                                    {{ $usuario->created_at->format('d/m/Y') }}
                                </p>

                                <p class="mt-1 text-xs text-slate-400">
                                    {{ $usuario->created_at->format('H:i') }}
                                </p>

                            </td>

                        </tr>

                    @empty

                        <tr>
                            <td
                                colspan="4"
                                class="px-6 py-16 text-center"
                            >

                                <div
                                    class="mx-auto mb-3 flex h-12 w-12
                                           items-center justify-center rounded-full
                                           bg-slate-100 font-bold text-slate-400"
                                >
                                    U
                                </div>

                                <p class="font-medium text-slate-600">
                                    No hay usuarios registrados
                                </p>

                                <p class="mt-1 text-sm text-slate-400">
                                    Los usuarios aparecerán aquí cuando se registren.
                                </p>

                            </td>
                        </tr>

                    @endforelse

                </tbody>

            </table>

        </div>

    </div>

@endsection