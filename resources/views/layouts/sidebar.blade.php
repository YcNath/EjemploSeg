<aside
    class="w-full border-b border-slate-200 bg-slate-950
           text-white md:w-64 md:border-b-0 md:border-r"
>
    <div class="p-4 md:sticky md:top-[72px] md:p-5">

        {{-- Dashboard --}}
        <div class="mb-7">

            <p class="mb-3 px-3 text-xs font-semibold uppercase tracking-widest text-slate-500">
                Principal
            </p>

            <a
                href="{{ route('dashboard') }}"
                class="flex items-center gap-3 rounded-xl px-3 py-3
                       text-sm font-medium transition
                       {{ request()->routeIs('dashboard')
                            ? 'bg-blue-600 text-white shadow-lg shadow-blue-900/20'
                            : 'text-slate-300 hover:bg-slate-800 hover:text-white' }}"
            >

                <span
                    class="flex h-9 w-9 items-center justify-center
                           rounded-lg bg-white/10"
                >
                    D
                </span>

                <span>Dashboard</span>

            </a>

        </div>

        {{-- Gestión --}}
        <div class="mb-7">

            <p class="mb-3 px-3 text-xs font-semibold uppercase tracking-widest text-slate-500">
                Gestión
            </p>

            <div class="space-y-2">

                <a
                    href="{{ route('personas.create') }}"
                    class="flex items-center gap-3 rounded-xl px-3 py-3
                           text-sm font-medium transition
                           {{ request()->routeIs('personas.*')
                                ? 'bg-blue-600 text-white shadow-lg shadow-blue-900/20'
                                : 'text-slate-300 hover:bg-slate-800 hover:text-white' }}"
                >
                    <span
                        class="flex h-9 w-9 items-center justify-center
                               rounded-lg bg-white/10 font-bold"
                    >
                        P
                    </span>

                    <span>Crear persona</span>
                </a>

                <a
                    href="{{ route('intereses.create') }}"
                    class="flex items-center gap-3 rounded-xl px-3 py-3
                           text-sm font-medium transition
                           {{ request()->routeIs('intereses.*')
                                ? 'bg-blue-600 text-white shadow-lg shadow-blue-900/20'
                                : 'text-slate-300 hover:bg-slate-800 hover:text-white' }}"
                >
                    <span
                        class="flex h-9 w-9 items-center justify-center
                               rounded-lg bg-white/10 font-bold"
                    >
                        I
                    </span>

                    <span>Crear interés</span>
                </a>

            </div>

        </div>

        {{-- Seguridad --}}
        <div>

            <p class="mb-3 px-3 text-xs font-semibold uppercase tracking-widest text-slate-500">
                Seguridad
            </p>

            <a
                href="{{ route('usuarios.index') }}"
                class="flex items-center gap-3 rounded-xl px-3 py-3
                       text-sm font-medium transition
                       {{ request()->routeIs('usuarios.*')
                            ? 'bg-blue-600 text-white shadow-lg shadow-blue-900/20'
                            : 'text-slate-300 hover:bg-slate-800 hover:text-white' }}"
            >
                <span
                    class="flex h-9 w-9 items-center justify-center
                           rounded-lg bg-white/10 font-bold"
                >
                    U
                </span>

                <span>Usuarios</span>
            </a>

        </div>

    </div>
</aside>