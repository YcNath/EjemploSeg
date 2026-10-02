<nav class="bg-white border-b shadow-sm">
    <div class="max-w-7xl mx-auto px-4 flex justify-between h-16 items-center">
        <a href="{{ route('dashboard') }}" class="font-bold text-lg">
            EjemploSeg
        </a>
        <div class="flex items-center space-x-4">
            <span class="text-sm text-gray-600">
                {{ Auth::user()->name }}
            </span>
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit" class="text-sm text-red-600 hover:underline">
                    Cerrar sesión
                </button>
            </form>
        </div>
    </div>
</nav>
