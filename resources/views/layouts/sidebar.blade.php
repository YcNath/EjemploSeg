<aside class="w-full md:w-64 bg-white shadow-md">
    <div class="p-4">
        <h3 class="text-gray-500 text-xs uppercase mb-2">
            Navegación
        </h3>
        <ul class="space-y-2">
            <li>
                <a href="{{ route('intereses.create') }}"
                    class="block px-4 py-2 rounded hover:bg-blue-100">
                        + Crear Interés
                </a>
            </li>
            <li>
                <a href="{{ route('personas.create') }}"
                    class="block px-4 py-2 rounded hover:bg-blue-100">
                        + Crear Persona
                </a>
            </li>
        </ul>
        <h3 class="text-gray-500 text-xs uppercase mt-6 mb-2">
            Seguridad
        </h3>
        <ul class="space-y-2">
            <li>
                <a href="{{ route('usuarios.index') }}"
                    class="block px-4 py-2 rounded hover:bg-blue-100">
                        Gestión de Usuarios
                </a>
            </li>
        </ul>
    </div>
</aside>
