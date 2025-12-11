@extends('layouts.app')

@section('content')
<div class="max-w-6xl mx-auto mt-10 text-white">

    @if($technicians->isEmpty())
        <p class="text-gray-300 text-lg">No hay técnicos registrados en esta categoría.</p>
    @else
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">

            @foreach($technicians as $tech)
            <div class="bg-gray-800 rounded-xl p-4 shadow-lg">

                <img src="{{ $tech->image ?? '/default-tech.png' }}"
                    class="rounded-lg mb-3 h-40 w-full object-cover">

                <h2 class="text-2xl font-bold">{{ $tech->user->name }}</h2>

                <p class="text-gray-300">📌 Especialidad: {{ $tech->specialty }}</p>
                <p class="text-gray-300">📞 Teléfono: {{ $tech->phone }}</p>
                <p class="text-gray-300">📍 Ciudad: {{ $tech->city }}</p>

            </div>
            @endforeach

        </div>
    @endif
</div>
@endsection
