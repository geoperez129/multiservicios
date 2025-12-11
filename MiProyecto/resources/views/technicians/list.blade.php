@extends('layouts.app')

@section('content')
<div class="min-h-screen bg-gray-900 px-8 py-10 text-white">

    <h1 class="text-4xl font-bold mb-6">
        Técnicos para {{ $service->name }}
    </h1>

    @if($technicians->isEmpty())
        <p class="text-blue-300">No hay técnicos disponibles para este servicio.</p>
    @endif

    <div class="grid md:grid-cols-3 gap-8">

        @foreach ($technicians as $tech)
        <div class="bg-gray-800 p-6 rounded-xl shadow-lg">

            @if($tech->image)
                <img src="{{ asset('storage/' . $tech->image) }}" 
                     class="h-40 w-full object-cover rounded-lg mb-3">
            @endif

            <h2 class="text-2xl font-bold">{{ $tech->name }}</h2>

            <p class="text-blue-200">Especialidad: {{ $tech->specialty }}</p>
            <p class="text-blue-200">Ciudad: {{ $tech->city }}</p>
            <p class="text-green-300 mt-2 font-bold">📞 {{ $tech->phone }}</p>

        </div>
        @endforeach

    </div>

</div>
@endsection
