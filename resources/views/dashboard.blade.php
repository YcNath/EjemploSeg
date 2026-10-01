@extends('layouts.plantilla')
@section('content')
    <h1 class="text-3xl font-bold">
        ¡Bienvenido, {{ Auth::user()->name }}!
    </h1>
    <p class="text-gray-600 mt-2">Panel de control de EjemploSeg</p>
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
        <div class="bg-white rounded-lg shadow-md p-6 border-l-4 border-blue-500">
            <p class="text-gray-500 text-sm">Total de Personas</p>
            <p class="text-3xl font-bold mt-2">{{ $totalPersonas }}</p>
        </div>
        <div class="bg-white rounded-lg shadow-md p-6 border-l-4 border-green-500">
            <p class="text-gray-500 text-sm">Total de Intereses</p>
            <p class="text-3xl font-bold mt-2">{{ $totalIntereses }}</p>
        </div>
        <div class="bg-white rounded-lg shadow-md p-6 border-l-4 border-purple-500">
            <p class="text-gray-500 text-sm">Total de Usuarios</p>
            <p class="text-3xl font-bold mt-2">{{ $totalUsuarios }}</p>
        </div>
    </div>
@endsection
