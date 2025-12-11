@extends('layouts.app')

@section('content')

<div class="max-w-2xl mx-auto bg-white shadow-2xl rounded-3xl p-8 mt-10 text-gray-800">

    <h2 class="text-3xl font-bold mb-6 text-center">✏️ Editar Perfil de Técnico</h2>

    <form method="POST" action="{{ route('technician.profile.update') }}">
        @csrf

        <!-- Nombre -->
        <label class="font-semibold">Nombre</label>
        <input 
            type="text" 
            name="name" 
            value="{{ $user->name }}" 
            class="w-full p-3 rounded-xl bg-gray-100 border mt-1 mb-4">

        <!-- Email -->
        <label class="font-semibold">Correo</label>
        <input 
            type="email" 
            name="email" 
            value="{{ $user->email }}" 
            class="w-full p-3 rounded-xl bg-gray-100 border mt-1 mb-4">

        <!-- Especialidad -->
        <label class="font-semibold">Especialidad</label>
        <input 
            type="text" 
            name="specialty" 
            value="{{ $techInfo->specialty }}" 
            class="w-full p-3 rounded-xl bg-gray-100 border mt-1 mb-4">

        <!-- Ciudad -->
        <label class="font-semibold">Ciudad</label>
        <input 
            type="text" 
            name="city" 
            value="{{ $techInfo->city }}" 
            class="w-full p-3 rounded-xl bg-gray-100 border mt-1 mb-4">

        <!-- Teléfono -->
        <label class="font-semibold">Teléfono</label>
        <input 
            type="text" 
            name="phone" 
            value="{{ $techInfo->phone }}" 
            class="w-full p-3 rounded-xl bg-gray-100 border mt-1 mb-4">

        <!-- Servicio -->
        <label class="font-semibold">Servicio</label>
        <select 
            name="service_id" 
            class="w-full p-3 rounded-xl bg-gray-100 border mt-1 mb-6">
            
            @foreach($services as $service)
                <option 
                    value="{{ $service->id }}" 
                    @if($service->id == $techInfo->service_id) selected @endif>
                    {{ $service->name }}
                </option>
            @endforeach
        </select>

        <!-- Descripción -->
        <label class="font-semibold">Descripción</label>
        <textarea 
            name="description" 
            class="w-full p-3 rounded-xl bg-gray-100 border mt-1 mb-6"
            rows="4">{{ $techInfo->description }}</textarea>

        <button 
            class="w-full bg-blue-600 text-white p-3 rounded-xl font-semibold hover:bg-blue-700 transition">
            💾 Guardar Cambios
        </button>
    </form>

    <!-- Botón regresar -->
    <div class="text-center mt-4">
        <a href="{{ route('technician.profile') }}" 
           class="text-gray-600 hover:text-gray-900 font-semibold text-sm">
            🔙 Regresar al perfil
        </a>
    </div>

</div>

@endsection
