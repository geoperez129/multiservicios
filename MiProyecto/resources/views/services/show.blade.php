@extends('layouts.app')

@section('content')

<div class="container py-5">

    <h2 class="text-center mb-4 fw-bold" style="color:#1d4ed8;">
        {{ $service->name }} — Técnicos disponibles
    </h2>

    <p class="text-center text-muted mb-5">{{ $service->description }}</p>

    <div class="row justify-content-center">

        @forelse($technicians as $tech)
        <div class="col-md-4 mb-4">
            <div class="card shadow border-0 p-3" style="border-radius:20px;">

                <!-- Foto -->
                <div class="text-center">
                    <img src="https://cdn-icons-png.flaticon.com/512/3135/3135715.png"
                         style="width:100px;height:100px;border-radius:50%;">
                </div>

                <!-- Información -->
                <h4 class="text-center mt-3 fw-bold">{{ $tech->name }}</h4>
                <p class="text-center text-muted">{{ $tech->specialty }}</p>

                <div class="text-center" style="color:#facc15;font-size:18px;">
                    ⭐⭐⭐⭐⭐
                </div>

                <p class="mt-3"><strong>📍 Ciudad:</strong> {{ $tech->city }}</p>
                <p><strong>📞 Teléfono:</strong> {{ $tech->phone }}</p>

                <!-- Botón -->
                <a href="{{ route('technicians.show', $tech->id) }}"
                   class="btn btn-primary w-100"
                   style="background:#1d4ed8;border:none;border-radius:10px;">
                    Ver técnico
                </a>

            </div>
        </div>
        @empty

        <h4 class="text-center text-muted mt-5">
            No hay técnicos registrados en este servicio.
        </h4>

        @endforelse

    </div>

</div>

@endsection
