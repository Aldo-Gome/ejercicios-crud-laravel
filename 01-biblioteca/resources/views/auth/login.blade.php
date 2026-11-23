@extends('layouts.app')

@section('contenido')
    <h1>Iniciar sesión</h1>

    <form method="POST" action="{{ route('login.store') }}">
        @csrf

        <label for="usuario">Usuario</label>
        <input
            id="usuario"
            name="usuario"
            type="text"
            value="{{ old('usuario') }}"
            maxlength="50"
            autocomplete="username"
            required
        >

        <label for="password">Contraseña</label>
        <input
            id="password"
            name="password"
            type="password"
            autocomplete="current-password"
            required
        >

        <div>
            <button type="submit">Ingresar</button>
        </div>
    </form>
@endsection