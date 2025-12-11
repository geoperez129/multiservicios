@extends('layouts.app')

@section('content')

<style>
    .login-card {
        max-width: 450px;
        margin: 60px auto;
        padding: 35px;
        border-radius: 18px;
        background: rgba(255,255,255,0.08);
        backdrop-filter: blur(12px);
        box-shadow: 0 0 25px rgba(255,255,255,0.1);
    }
</style>

<div class="login-card">

    <h2 class="text-center text-3xl font-bold mb-4">Iniciar Sesión</h2>

    <form action="{{ route('login.submit') }}" method="POST">
        @csrf

        <input type="email" name="email" class="input-login" placeholder="Correo electrónico" required>

        <input type="password" name="password" class="input-login" placeholder="Contraseña" required>

        <button class="btn-login">Entrar</button>
    </form>

    <a href="{{ route('register') }}" class="link">¿No tienes cuenta? Crear cuenta</a>
</div>

@endsection
