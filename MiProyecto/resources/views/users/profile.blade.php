@extends('layouts.app')

@section('content')
<div class="min-h-screen bg-gray-950 text-white px-8 py-16">

    <h1 class="text-4xl font-extrabold text-center mb-10">Mi Perfil de Técnico</h1>

    <div class="max-w-2xl mx-auto bg-gray-800/60 p-10 rounded-2xl shadow-xl">

        <p class="mb-4 text-blue-300">Aquí podrás editar tu información como técnico.</p>

        <form>
            <input type="text" placeholder="Nombre" class="w-full mb-4 p-2 rounded bg-gray-700">
            <input type="text" placeholder="Especialidad" class="w-full mb-4 p-2 rounded bg-gray-700">
            <input type="text" placeholder="Ciudad" class="w-full mb-4 p-2 rounded bg-gray-700">
            <textarea placeholder="Descripción" class="w-full h-32 p-2 rounded bg-gray-700"></textarea>

            <button class="w-full mt-5 bg-blue-600 hover:bg-blue-500 py-2 rounded-lg font-bold">
                Guardar Cambios
            </button>
        </form>

    </div>
</div>
@endsection
