@extends('layouts.app')

@section('content')
<div class="max-w-3xl mx-auto mt-28 text-white px-6">
    <h1 class="text-3xl font-bold mb-4">Contratar Técnico</h1>
    <p class="mb-6 text-slate-300">
        Llena el formulario y te contactaremos con un técnico disponible en tu zona.
    </p>

    <form class="space-y-4">
        <div>
            <label class="block text-sm mb-1">Nombre completo</label>
            <input type="text" class="w-full bg-slate-800 border border-slate-600 rounded-lg px-3 py-2">
        </div>
        <div>
            <label class="block text-sm mb-1">Correo electrónico</label>
            <input type="email" class="w-full bg-slate-800 border border-slate-600 rounded-lg px-3 py-2">
        </div>
        <div>
            <label class="block text-sm mb-1">Teléfono</label>
            <input type="text" class="w-full bg-slate-800 border border-slate-600 rounded-lg px-3 py-2">
        </div>
        <div>
            <label class="block text-sm mb-1">Servicio requerido</label>
            <select class="w-full bg-slate-800 border border-slate-600 rounded-lg px-3 py-2">
                <option>Plomería</option>
                <option>Electricidad</option>
                <option>Soporte técnico</option>
                <option>Construcción</option>
            </select>
        </div>
        <div>
            <label class="block text-sm mb-1">Descripción del problema</label>
            <textarea rows="4" class="w-full bg-slate-800 border border-slate-600 rounded-lg px-3 py-2"></textarea>
        </div>
        <button class="bg-cyan-500 hover:bg-cyan-400 text-black font-bold px-5 py-2 rounded-lg">
            Enviar solicitud (demo)
        </button>
    </form>
</div>
@endsection
