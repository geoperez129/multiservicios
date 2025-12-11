@extends('layouts.app')

@section('content')
<div class="min-h-screen bg-gray-950 px-8 py-16 text-white">
    <h1 class="text-5xl font-extrabold text-center mb-12">Precios</h1>

    <div class="grid md:grid-cols-3 gap-10 max-w-6xl mx-auto">

        @php
            $plans = [
                ['name' => 'Básico', 'price' => '$150', 'desc' => 'Servicio rápido y económico.'],
                ['name' => 'Estándar', 'price' => '$300', 'desc' => 'Incluye inspección y diagnóstico.'],
                ['name' => 'Premium', 'price' => '$500', 'desc' => 'Atención prioritaria y garantía extendida.'],
            ];
        @endphp

        @foreach ($plans as $p)
            <div class="bg-gray-800/80 p-8 rounded-2xl shadow-xl hover:scale-105 transition">
                <h2 class="text-3xl font-bold mb-3">{{ $p['name'] }}</h2>
                <p class="text-4xl font-extrabold text-blue-400 mb-4">{{ $p['price'] }}</p>
                <p class="text-blue-200 mb-6">{{ $p['desc'] }}</p>

                <button class="w-full bg-blue-600 hover:bg-blue-500 py-2 rounded-lg font-bold">
                    Contratar
                </button>
            </div>
        @endforeach

    </div>
</div>
@endsection
