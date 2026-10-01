@extends('layouts.plantilla')
@section('content')
    <table class="min-w-full bg-white border">
        <thead>
            <tr class="bg-gray-100 uppercase text-sm">
                <th>ID</th>
                <th>Nombre</th>
                <th>Email</th>
                <th>Registro</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($usuarios as $usuario)
                <tr class="border-b hover:bg-gray-50">
                    <td>{{ $usuario->id }}</td>
                    <td>{{ $usuario->name }}</td>
                    <td>{{ $usuario->email }}</td>
                    <td>{{ $usuario->created_at->format('d/m/Y H:i') }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection