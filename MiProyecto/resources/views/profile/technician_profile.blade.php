@extends('layouts.app')

@section('content')
<div class="max-w-4xl mx-auto py-10">

    {{-- TITULO --}}
    <h1 class="text-4xl font-extrabold text-white mb-8 text-center tracking-tight">
        Perfil del Técnico
    </h1>

    {{-- TARJETA PRINCIPAL --}}
    <div class="bg-white rounded-2xl shadow-2xl p-8">

        {{-- HEADER DEL PERFIL --}}
        <div class="flex items-center space-x-6">

            {{-- IMAGEN / AVATAR --}}
            <img src="https://ui-avatars.com/api/?name={{ Auth::user()->name }}&background=0D8ABC&color=fff&size=140"
                 class="rounded-full shadow-lg border-4 border-blue-500">

            <div class="flex flex-col">

                <h2 class="text-3xl font-bold text-gray-900">
                    {{ Auth::user()->name }}
                </h2>

                {{-- CIUDAD --}}
                <p class="text-gray-600 flex items-center gap-2 mt-1">
                    <span>📍</span>
                    {{ $tech->city ?? 'Ciudad no especificada' }}
                </p>

                {{-- RATING --}}
                <div class="flex items-center gap-1 mt-2">
                    <span class="text-yellow-400 text-xl">★★★★★</span>
                    <span class="text-gray-500 ml-2 text-sm">(4.9 / 5.0)</span>
                </div>

            </div>
        </div>

        <hr class="my-8">

        {{-- INFORMACIÓN DETALLADA --}}
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">

            {{-- ESPECIALIDAD --}}
            <div class="p-4 bg-gray-100 rounded-xl">
                <h3 class="font-semibold text-gray-700 flex items-center gap-2">
                    🛠️ Especialidad
                </h3>
                <p class="text-gray-900 mt-1 text-lg">
                    {{ $tech->specialty ?? 'Sin especificar' }}
                </p>
            </div>

            {{-- TELEFONO --}}
            <div class="p-4 bg-gray-100 rounded-xl">
                <h3 class="font-semibold text-gray-700 flex items-center gap-2">
                    📱 Teléfono
                </h3>
                <p class="text-gray-900 mt-1 text-lg">
                    {{ $tech->phone ?? 'No registrado' }}
                </p>
            </div>

            {{-- CORREO --}}
            <div class="p-4 bg-gray-100 rounded-xl">
                <h3 class="font-semibold text-gray-700 flex items-center gap-2">
                    ✉️ Correo
                </h3>
                <p class="text-gray-900 mt-1 text-lg">
                    {{ Auth::user()->email }}
                </p>
            </div>

            {{-- FECHA --}}
            <div class="p-4 bg-gray-100 rounded-xl">
                <h3 class="font-semibold text-gray-700 flex items-center gap-2">
                    📅 Miembro desde
                </h3>
                <p class="text-gray-900 mt-1 text-lg">
                    {{ Auth::user()->created_at->format('d / m / Y') }}
                </p>
            </div>

        </div>

        <hr class="my-8">

        {{-- SERVICIOS DEL TÉCNICO --}}
        <h2 class="text-2xl font-bold text-gray-800 mb-4">
            🧰 Servicios que Ofrezco
        </h2>

        <div class="bg-blue-50 p-6 rounded-xl shadow">

            <ul class="list-disc pl-6 text-lg text-gray-800 space-y-2">
                <li>Reparación y mantenimiento general</li>
                <li>Instalaciones eléctricas</li>
                <li>Plomería y fugas de agua</li>
                <li>Carpintería básica</li>
                <li>Pintura y acabados</li>
            </ul>

        </div>

        <div class="mt-10 flex justify-between">

            <a href="{{ route('technician.profile.edit') }}"
               class="bg-blue-600 hover:bg-blue-700 text-white px-6 py-2 rounded-lg shadow-lg text-lg">
               📝 Editar Perfil
            </a>

            <a href="{{ route('services.index') }}"
               class="bg-green-600 hover:bg-green-700 text-white px-6 py-2 rounded-lg shadow-lg text-lg">
               🧩 Ver Servicios Disponibles
            </a>

        </div>

    </div>

</div>
@endsection
