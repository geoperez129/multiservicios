@extends('layouts.app')

@section('content')
<div class="container text-white py-5">
    <h2 class="text-3xl font-bold">Editar Perfil</h2>

    <form method="POST" action="{{ route('profile.updateUser') }}" class="mt-4">
        @csrf
        <label>Nombre</label>
        <input type="text" name="name" value="{{ auth()->user()->name }}" class="w-full p-2 rounded bg-gray-700">

        <label class="mt-3">Correo</label>
        <input type="email" name="email" value="{{ auth()->user()->email }}" class="w-full p-2 rounded bg-gray-700">

        <button class="mt-4 bg-blue-500 px-4 py-2 rounded">Guardar Cambios</button>
    </form>
</div>
@endsection
