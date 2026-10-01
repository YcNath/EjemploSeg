@extends('auth.layout')
@section('title', 'Crear cuenta')
@section('content')
    <form method="POST" action="{{ route('register.store') }}">
        @csrf
        <label for="name">Nombre</label>
        <input id="name" name="name" type="text" value="{{ old('name') }}" maxlength="255" autocomplete="name" required autofocus>
        <label for="email">Correo electrónico</label>
        <input id="email" name="email" type="email" value="{{ old('email') }}" maxlength="255" autocomplete="email" required>
        <label for="password">Contraseña (mínimo 8 caracteres)</label>
        <input id="password" name="password" type="password" minlength="8" autocomplete="new-password" required>
        <label for="password_confirmation">Confirmar contraseña</label>
        <input id="password_confirmation" name="password_confirmation" type="password" minlength="8" autocomplete="new-password" required>
        <button type="submit">Crear cuenta</button>
    </form>
    <p>¿Ya tienes cuenta? <a href="{{ route('login') }}">Inicia sesión</a></p>
@endsection
