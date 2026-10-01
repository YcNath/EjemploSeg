@extends('layouts.plantilla')
@section('title', 'Crear Interés')

@section('content')
    <div class="bg-white p-6 rounded-lg shadow-md max-w-2xl">
        <h2 class="text-2xl font-bold mb-4">Registrar Nuevo Interés</h2>
        <form action="{{ route('intereses.store') }}" method="POST">
            @csrf
            <div class="mb-4">
                <label for="nombre">Nombre del Interés</label>
                <input type="text" name="nombre" id="nombre"
                    value="{{ old('nombre') }}" required>
                @error('nombre') <p class="text-red-500">{{ $message }}</p> @enderror
            </div>

            <div class="mb-6">
                <label for="descripcion">Descripción</label>
                <textarea name="descripcion" id="descripcion" rows="3">{{ old('descripcion') }}</textarea>
            </div>
            <button type="submit">Guardar Interés</button>
        </form>
    </div>
@endsection