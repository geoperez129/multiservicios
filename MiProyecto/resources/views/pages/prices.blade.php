{{-- resources/views/pages/prices.blade.php --}}
@extends('layouts.app') {{-- Cambia esto si tu layout se llama distinto --}}

@section('title', 'Precios')

@section('content')
<div class="container mt-5 mb-5" style="max-width: 900px; color: #ffffff;">
    <h1 class="text-center mb-4">Precios</h1>

    {{-- PLAN BÁSICO --}}
    <div class="card mb-3" style="background: rgba(0,0,0,0.6); border: 1px solid #444;">
        <div class="card-body">
            <h2 class="card-title">Básico</h2>
            <h4 class="card-subtitle mb-2">$150</h4>
            <p class="card-text">
                Servicio rápido y económico.
            </p>
            {{-- Mandamos a /servicios con el plan en la cadena de consulta --}}
            <a href="{{ route('services.index', ['plan' => 'basico']) }}" class="btn btn-primary">
                Contratar
            </a>
        </div>
    </div>

    {{-- PLAN ESTÁNDAR --}}
    <div class="card mb-3" style="background: rgba(0,0,0,0.6); border: 1px solid #444;">
        <div class="card-body">
            <h2 class="card-title">Estándar</h2>
            <h4 class="card-subtitle mb-2">$300</h4>
            <p class="card-text">
                Incluye inspección y diagnóstico.
            </p>
            <a href="{{ route('services.index', ['plan' => 'estandar']) }}" class="btn btn-primary">
                Contratar
            </a>
        </div>
    </div>

    {{-- PLAN PREMIUM --}}
    <div class="card mb-3" style="background: rgba(0,0,0,0.6); border: 1px solid #444;">
        <div class="card-body">
            <h2 class="card-title">Premium</h2>
            <h4 class="card-subtitle mb-2">$500</h4>
            <p class="card-text">
                Atención prioritaria y garantía extendida.
            </p>
            <a href="{{ route('services.index', ['plan' => 'premium']) }}" class="btn btn-primary">
                Contratar
            </a>
        </div>
    </div>
</div>
@endsection

