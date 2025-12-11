@extends('layouts.app')

@section('content')
<div class="max-w-3xl mx-auto bg-white text-gray-900 p-8 mt-10 rounded-xl shadow-2xl">

    <h1 class="text-3xl font-bold mb-6 text-center">
        Perfil de Usuario 👤
    </h1>

    {{-- Datos del usuario --}}
    <div class="space-y-4">

        <div class="flex justify-between py-3 border-b">
            <span class="font-semibold">Nombre:</span>
            <span>{{ auth()->user()->name }}</span>
        </div>

        <div class="flex justify-between py-3 border-b">
            <span class="font-semibold">Correo electrónico:</span>
            <span>{{ auth()->user()->email }}</span>
        </div>

        <div class="flex justify-between py-3 border-b">
            <span class="font-semibold">Rol:</span>
            <span class="capitalize">{{ auth()->user()->role }}</span>
        </div>

        <div class="flex justify-between py-3 border-b">
            <span class="font-semibold">Cuenta creada:</span>
            <span>{{ auth()->user()->created_at->format('d/m/Y') }}</span>
        </div>

    </div>

    {{-- BOTÓN EDITAR --}}
    <div class="text-center mt-8">
        <a href="{{ route('user.edit') }}"
           class="px-6 py-3 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition">
            Editar Perfil
        </a>
    </div>

</div>
@endsection
