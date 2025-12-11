@extends('layouts.app')

@section('content')
<div class="container py-5">
    <div class="text-center mb-4">
        <h1 class="fw-bold text-primary">{{ $service->name }}</h1>
        <p class="lead text-muted">{{ $service->description }}</p>
    </div>

    <div class="card shadow-sm border-0 mx-auto" style="max-width: 600px;">
        <div class="card-body text-center">
            <i class="fas fa-user-cog fa-4x text-primary mb-3"></i>
            <h4 class="fw-bold">Técnicos disponibles próximamente...</h4>
            <p class="text-muted">Aquí podrás ver la lista de técnicos calificados para este servicio.</p>
            <a href="{{ route('home') }}" class="btn btn-outline-primary mt-3">
                <i class="fas fa-arrow-left me-2"></i>Volver al inicio
            </a>
        </div>
    </div>
</div>
@endsection

