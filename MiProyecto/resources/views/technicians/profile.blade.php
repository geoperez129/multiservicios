@extends('layouts.app')

@section('content')

<style>
    #space {
        pointer-events: none !important;
        position: fixed;
        inset: 0;
        width: 100%;
        height: 100%;
        z-index: 0;
    }

    .profile-wrapper {
        position: relative;
        min-height: 100vh;
        padding: 3rem 1rem;
        background: radial-gradient(circle at top, #312e81, #020617 55%, #000 100%);
        display: flex;
        justify-content: center;
        align-items: flex-start;
    }

    .neon-card {
        position: relative;
        z-index: 10;
        width: 100%;
        max-width: 620px;
        padding: 2.8rem 2rem;
        border-radius: 30px;
        background: radial-gradient(circle at top, rgba(168,85,247,0.25), rgba(15,23,42,0.95) 45%, rgba(15,23,42,1));
        box-shadow:
            0 0 60px rgba(168,85,247,0.7),
            0 25px 60px rgba(0,0,0,0.9);
        border: 1px solid rgba(129,140,248,0.65);
        color: #e5e7eb;
        backdrop-filter: blur(16px);
    }

    .neon-title {
        font-size: 2rem;
        font-weight: 900;
        text-align: center;
        background: linear-gradient(to right, #60a5fa, #a855f7, #f97316);
        -webkit-background-clip: text;
        color: transparent;
        letter-spacing: .1em;
        margin-bottom: 1.5rem;
        text-transform: uppercase;
    }

    /* Avatar futurista */
    .avatar-container {
        width: 150px;
        height: 150px;
        border-radius: 999px;
        margin: 0 auto 1.5rem;
        position: relative;
        overflow: hidden;
        border: 4px solid #7c3aed;
        box-shadow: 0 0 30px rgba(168,85,247,1),
                    inset 0 0 25px rgba(168,85,247,0.6);
        cursor: pointer;
    }

    .avatar-container img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        pointer-events: none;
    }

    #imageUpload {
        position: absolute;
        inset: 0;
        width: 100%;
        height: 100%;
        opacity: 0;
        cursor: pointer;
    }

    .neon-label {
        font-size: .9rem;
        font-weight: 600;
        margin-bottom: 3px;
        color: #c7d2fe;
    }

    .neon-input, .neon-select, .neon-textarea {
        width: 100%;
        border-radius: 14px;
        border: 1px solid rgba(148,163,184,0.7);
        padding: .7rem 1rem;
        font-size: .95rem;
        background: rgba(15,23,42,0.9);
        color: #e5e7eb;
        outline: none;
        margin-bottom: 1rem;
        transition: 0.25s ease;
    }

    .neon-btn {
        margin-top: .8rem;
        width: 100%;
        border: none;
        border-radius: 999px;
        padding: .9rem 1.2rem;
        font-weight: 800;
        text-transform: uppercase;
        letter-spacing: .14em;
        font-size: .95rem;
        background: linear-gradient(90deg, #2563eb, #a855f7, #f97316);
        background-size: 200% 200%;
        color: #f9fafb;
        cursor: pointer;
        box-shadow:
            0 14px 40px rgba(59,130,246,.7),
            0 0 35px rgba(168,85,247,.9);
        transition: 0.3s ease;
    }

    .neon-btn:hover {
        transform: translateY(-2px) scale(1.02);
        background-position: 100% 0;
    }

    .back-btn {
        display: inline-block;
        margin-top: 1.5rem;
        font-size: .9rem;
        color: #93c5fd;
        text-decoration: underline;
        cursor: pointer;
    }

</style>

<canvas id="space"></canvas>

<div class="profile-wrapper">

    <div class="neon-card">

        <h2 class="neon-title">Perfil del Técnico</h2>

        {{-- Avatar clickeable --}}
        <div class="avatar-container" onclick="document.getElementById('imageUpload').click()">
            <img src="{{ $techInfo->image ? asset($techInfo->image) : asset('images/default_user.png') }}">
            <input id="imageUpload" type="file" name="image" accept="image/*" form="techForm">
        </div>

        {{-- FORMULARIO --}}
        <form id="techForm" method="POST" action="{{ route('technician.profile.update') }}" enctype="multipart/form-data">
            @csrf

            <label class="neon-label">Nombre</label>
            <input type="text" value="{{ $user->name }}" disabled class="neon-input opacity-70">

            <label class="neon-label">Especialidad</label>
            <input type="text" name="specialty" class="neon-input"
                   value="{{ old('specialty', $techInfo->specialty) }}">

            <label class="neon-label">Ciudad</label>
            <input type="text" name="city" class="neon-input"
                   value="{{ old('city', $techInfo->city) }}">

            <label class="neon-label">Servicio que ofreces</label>
            <select name="service_id" class="neon-select">
                @foreach ($services as $service)
                <option value="{{ $service->id }}"
                    {{ $techInfo->service_id == $service->id ? 'selected' : '' }}>
                    {{ $service->name }}
                </option>
                @endforeach
            </select>

            <label class="neon-label">Descripción</label>
            <textarea name="description" class="neon-textarea" rows="4">{{ old('description', $techInfo->description) }}</textarea>

            <button class="neon-btn">Guardar Cambios</button>
        </form>

        <a href="{{ route('technician.profile') }}" class="back-btn">← Regresar al perfil</a>

    </div>

</div>

@endsection
