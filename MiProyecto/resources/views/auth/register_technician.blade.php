@extends('layouts.app')

@section('content')

{{-- FONT AWESOME PARA EL ICONO DEL AVATAR --}}
<link rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css"
      integrity="sha512-1ycn6IcaQQ40/MKBW2W4Rhis/DbILU74C1v2Cq4qVJq6Digw1k3D6Z0fjQX+0Gooy2cZj0TNXjYy7+XxxhZqQ=="
      crossorigin="anonymous" referrerpolicy="no-referrer" />

<style>
    #space {
        pointer-events: none !important;
        position: fixed;
        inset: 0;
        width: 100%;
        height: 100%;
        z-index: 0;
    }

    .tech-register-wrapper {
        position: relative;
        min-height: 100vh;
        display: flex;
        align-items: center;
        justify-content: center;
        padding: 2rem 1rem;
        background: radial-gradient(circle at top, #312e81, #020617 55%, #000 100%);
    }

    .neon-card {
        position: relative;
        z-index: 10;
        width: 100%;
        max-width: 520px;
        padding: 2.5rem 2rem 2.8rem;
        border-radius: 30px;
        background: radial-gradient(circle at top, rgba(168,85,247,0.25),
                    rgba(15,23,42,0.95) 45%, rgba(15,23,42,1));
        box-shadow:
            0 0 60px rgba(168,85,247,0.7),
            0 25px 60px rgba(0,0,0,0.9);
        border: 1px solid rgba(129,140,248,0.65);
        color: #e5e7eb;
        backdrop-filter: blur(16px);
    }

    .neon-header {
        text-align: center;
        margin-bottom: 1.8rem;
    }

    /* AVATAR CLICKEABLE */
    .neon-avatar-wrap {
        width: 120px;
        height: 120px;
        border-radius: 999px;
        margin: 0 auto 1rem;
        position: relative;
        display: flex;
        align-items: center;
        justify-content: center;
        background: radial-gradient(circle at 30% 0, #f97316, #7c3aed);
        box-shadow: 0 0 40px rgba(129,140,248,0.8);
        cursor: pointer;
        overflow: hidden;
    }

    .neon-avatar-inner {
        width: 90px;
        height: 90px;
        border-radius: 999px;
        background: radial-gradient(circle at 30% 0, #0f172a, #020617);
        display: flex;
        align-items: center;
        justify-content: center;
        color: #64748b;
        font-size: 2.8rem;
        overflow: hidden;
    }

    .neon-avatar-inner img {
        width: 100%;
        height: 100%;
        object-fit: cover;
    }

    .neon-title {
        font-size: 1.6rem;
        font-weight: 900;
        letter-spacing: .12em;
        text-transform: uppercase;
        background: linear-gradient(to right, #60a5fa, #a855f7, #f97316);
        -webkit-background-clip: text;
        background-clip: text;
        color: transparent;
        margin-bottom: .35rem;
    }

    .neon-subtitle {
        font-size: .95rem;
        color: #cbd5f5;
    }

    .neon-field {
        margin-bottom: 0.85rem;
    }

    .neon-input,
    .neon-select {
        width: 100%;
        border-radius: 999px;
        border: 1px solid rgba(148,163,184,0.7);
        padding: .6rem 1rem;
        font-size: .9rem;
        background: rgba(15,23,42,0.9);
        color: #e5e7eb;
        outline: none;
        transition: 0.25s ease;
    }

    .neon-input::placeholder {
        color: #64748b;
    }

    .neon-btn {
        margin-top: 1.1rem;
        width: 100%;
        border: none;
        border-radius: 999px;
        padding: .7rem 1rem;
        font-weight: 800;
        text-transform: uppercase;
        letter-spacing: .14em;
        font-size: .82rem;
        background: linear-gradient(90deg, #2563eb, #a855f7, #f97316);
        background-size: 200% 200%;
        color: #f9fafb;
        cursor: pointer;
        box-shadow:
            0 14px 40px rgba(59,130,246,.7),
            0 0 35px rgba(168,85,247,.9);
        transition: 0.25s ease;
    }

    .neon-btn:hover {
        transform: translateY(-2px) scale(1.02);
        box-shadow:
            0 18px 55px rgba(59,130,246,.95),
            0 0 40px rgba(168,85,247,1);
        background-position: 100% 0;
    }
</style>

<canvas id="space"></canvas>

<div class="tech-register-wrapper">
    <div class="neon-card">

        <div class="neon-header">

            {{-- AVATAR CLICKEABLE --}}
            <div class="neon-avatar-wrap" onclick="document.getElementById('avatarInput').click()">
                <div class="neon-avatar-inner" id="previewAvatar">
                    <i class="fa fa-user"></i>
                </div>
            </div>

            <div class="neon-title">Registrar Técnico</div>
            <p class="neon-subtitle">Crea tu cuenta profesional para que los clientes te encuentren por servicio.</p>
        </div>

        <form action="{{ route('register.technician.submit') }}" method="POST" enctype="multipart/form-data">
            @csrf

            {{-- INPUT OCULTO. YA NO HAY BOTÓN EXTRA --}}
            <input type="file"
                   name="photo"
                   id="avatarInput"
                   accept="image/*"
                   style="display:none"
                   onchange="loadAvatar(event)">

            <div class="neon-field">
                <label>Nombre completo</label>
                <input type="text" name="name" class="neon-input" placeholder="Ej. Juan Pérez" autocomplete="off" required>
            </div>

            <div class="neon-field">
                <label>Correo electrónico</label>
                <input type="email" name="email" class="neon-input" placeholder="tucorreo@ejemplo.com" autocomplete="off" required>
            </div>

            <div class="neon-field">
                <label>Selecciona un servicio</label>
                <select name="service_id" class="neon-select" required>
                    <option value="">Selecciona un servicio</option>
                    @foreach ($services as $service)
                        <option value="{{ $service->id }}">{{ $service->name }}</option>
                    @endforeach
                </select>
            </div>

            <div class="neon-field">
                <label>Contraseña</label>
                <input type="password" name="password" class="neon-input" placeholder="Mínimo 8 caracteres" autocomplete="new-password" required>
            </div>

            <div class="neon-field">
                <label>Confirmar contraseña</label>
                <input type="password" name="password_confirmation" class="neon-input" placeholder="Repite tu contraseña" autocomplete="new-password" required>
            </div>

            <button type="submit" class="neon-btn">
                Crear cuenta de técnico
            </button>
        </form>

    </div>
</div>

{{-- SCRIPT PARA PREVISUALIZAR EL AVATAR --}}
<script>
function loadAvatar(event) {
    const preview = document.getElementById('previewAvatar');
    preview.innerHTML = "";

    const img = document.createElement("img");
    img.src = URL.createObjectURL(event.target.files[0]);

    preview.appendChild(img);
}
</script>

{{-- Burbujas animadas --}}
<script src="https://cdn.jsdelivr.net/gh/VincentGarreau/particles.js/particles.min.js"></script>
<script>
particlesJS("space", {
    "particles": {
        "number": {"value": 120},
        "size": {"value": 2},
        "move": {"speed": 0.8},
        "line_linked": {"enable": false},
        "color": {"value": "#9f7aea"}
    }
});
</script>

@endsection
