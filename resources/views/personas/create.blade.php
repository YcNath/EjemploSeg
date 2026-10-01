@extends('layouts.plantilla')
@section('content')
    <form action="{{ route('personas.store') }}" method="POST">
    @csrf
    <div class="mb-4">
        <label for="nombre">Nombre</label>
        <input type="text" name="nombre" value="{{ old('nombre') }}" required>
        @error('nombre') <p class="text-red-500">{{ $message }}</p> @enderror
    </div>
    <div class="mb-4">
    <label for="email">Correo electrónico</label>
    <input
        type="email"
        name="email"
        id="email"
        value="{{ old('email') }}"
        required
    >
    @error('email')
        <p class="text-red-500">{{ $message }}</p>
    @enderror
</div>
    <div class="mb-6">
        <label>Intereses</label>
        <div class="grid grid-cols-2 gap-2">
            @foreach($intereses as $interes)
                <label>
                    <input type="checkbox" name="intereses[]" value="{{ $interes->id }}">
                    {{ $interes->nombre }}
                </label>
            @endforeach
        </div>
    </div>

    <button type="submit">Guardar Persona</button>
   </form>
@endsection