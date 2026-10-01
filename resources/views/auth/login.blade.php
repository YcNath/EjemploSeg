@extends('auth.layout')
@section('title', 'Iniciar sesión')
@section('content')
    <form method="POST" action="{{ route('login.store') }}">
        @csrf
        <label for="email">Correo electrónico</label>
        <input id="email" name="email" type="email" value="{{ old('email') }}" autocomplete="email" required autofocus>
        <label for="password">Contraseña</label>
        <input id="password" name="password" type="password" autocomplete="current-password" required>
        <label for="remember">
            <input id="remember" name="remember" type="checkbox" value="1" @checked(old('remember'))>
            Recordarme
        </label>
        <button type="submit">Entrar</button>
    </form>
    <p>¿Aún no tienes cuenta? <a href="{{ route('register') }}">Regístrate</a></p>
@endsection
