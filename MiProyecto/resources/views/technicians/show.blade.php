@extends('layouts.app')

@section('content')

<style>
    .profile-box {
        background: white;
        padding: 40px;
        border-radius: 20px;
        box-shadow: 0 8px 30px rgba(0,0,0,0.15);
        max-width: 900px;
        margin: 0 auto;
    }

    .profile-img {
        width: 140px;
        height: 140px;
        border-radius: 50%;
        border: 5px solid #1d4ed8;
        object-fit: cover;
        margin-bottom: 20px;
    }

    .btn-azul {
        background: #1d4ed8 !important;
        color: white !important;
        border-radius: 10px;
        padding: 10px 25px;
        font-weight: bold;
        transition: .2s;
        border: none;
        font-size: 16px;
    }

    .btn-azul:hover {
        transform: translateY(-3px);
        background: #153aa6 !important;
    }

    .rating-stars {
        font-size: 24px;
        color: #facc15;
        margin-bottom: 15px;
    }

    .title {
        color: #1d4ed8;
        font-weight: 700;
        margin-bottom: 10px;
        font-size: 28px;
    }

    .subtitle {
        font-size: 20px;
        color: #475569;
        margin-bottom: 20px;
    }

    .tech-label {
        font-weight: bold;
        color: #1e293b;
    }

    .tech-info {
        color: #334155;
        margin-bottom: 10px;
    }
</style>

<div class="container py-5">

    <div class="profile-box text-center">

        <!-- FOTO -->
        <img src="https://cdn-icons-png.flaticon.com/512/3135/3135715.png" class="profile-img">

        <!-- NOMBRE -->
        <h2 class="title">{{ $technician->name }}</h2>

        <!-- ESPECIALIDAD -->
        <h4 class="subtitle">{{ $technician->specialty }}</h4>

        <!-- ESTRELLAS -->
        <div class="rating-stars">
            ⭐⭐⭐⭐⭐
        </div>

        <!-- INFO -->
        <p class="tech-info"><span class="tech-label">Ciudad:</span> {{ $technician->city }}</p>
        <p class="tech-info"><span class="tech-label">Teléfono:</span> {{ $technician->phone }}</p>

        @if($technician->description)
        <p class="tech-info">
            <span class="tech-label">Descripción:</span><br>
            {{ $technician->description }}
        </p>
        @endif

        <!-- BOTÓN DE SOLICITAR SERVICIO -->
        <div class="mt-4">
            <a href="#" class="btn btn-azul">
                📩 Solicitar Servicio
            </a>
        </div>

    </div>

</div>

@endsection
