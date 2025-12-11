@extends('layouts.app')

@section('content')

<style>
    body {
        overflow-x: hidden;
    }

    /* CANVAS DE ESTRELLAS */
    #space {
        position: fixed;
        inset: 0;
        width: 100%;
        height: 100%;
        z-index: 0;
        pointer-events: none;
    }

    /* CONTENEDOR */
    .register-box {
        position: relative;
        z-index: 10;
        max-width: 480px;
        margin: 90px auto;
        padding: 45px 40px;
        border-radius: 28px;
        background: rgba(15,23,42,0.78);
        backdrop-filter: blur(18px);
        border: 1px solid rgba(129,140,248,0.4);

        box-shadow:
            0 0 90px rgba(168,85,247,0.55),
            inset 0 0 25px rgba(56,189,248,0.15);
        animation: floatBox 5s ease-in-out infinite;
    }

    @keyframes floatBox {
        0%, 100% { transform: translateY(0); }
        50% { transform: translateY(-6px); }
    }

    .title-register {
        font-size: 2.2rem;
        font-weight: 900;
        text-align: center;
        background: linear-gradient(to right, #60a5fa, #a855f7, #f97316);
        -webkit-background-clip: text;
        color: transparent;
        letter-spacing: .12em;
        margin-bottom: 28px;
        text-transform: uppercase;
    }

    /* INPUT WRAPPER */
    .input-group {
        position: relative;
        margin-bottom: 1.3rem;
    }

    .input-icon {
        position: absolute;
        top: 50%;
        left: 14px;
        transform: translateY(-50%);
        font-size: 1.1rem;
        color: #94a3b8;
    }

    .neon-input {
        width: 100%;
        padding: .85rem 1rem;
        padding-left: 42px;
        border-radius: 14px;
        border: 1px solid rgba(148,163,184,.55);
        background: rgba(15,23,42,0.85);
        color: #e5e7eb;
        font-size: .95rem;
        outline: none;
        transition: .3s;
    }

    .neon-input:focus {
        border-color: #818cf8;
        box-shadow: 0 0 18px rgba(129,140,248,.9);
        transform: translateY(-2px);
    }

    /* BOTÓN */
    .neon-btn {
        margin-top: .5rem;
        width: 100%;
        border: none;
        border-radius: 999px;
        padding: 1rem 1.2rem;
        font-weight: 800;
        letter-spacing: .14em;
        font-size: .95rem;
        text-transform: uppercase;
        background: linear-gradient(90deg, #2563eb, #a855f7, #f97316);
        background-size: 200% 200%;
        box-shadow:
            0 12px 35px rgba(59,130,246,.6),
            0 0 25px rgba(168,85,247,.7);
        color: #fff;
        cursor: pointer;
        transition: .35s ease;
    }

    .neon-btn:hover {
        transform: translateY(-3px) scale(1.02);
        background-position: 100% 0;
        box-shadow:
            0 18px 55px rgba(59,130,246,.95),
            0 0 40px rgba(168,85,247,1);
    }

    /* LINK ABAJO */
    .small-link {
        margin-top: 18px;
        text-align: center;
        font-size: .9rem;
        color: #cbd5ff;
    }

    .small-link a {
        color: #38bdf8;
        text-decoration: underline;
    }
</style>

<canvas id="space"></canvas>

<div class="register-box">

    <h2 class="title-register">Crear Cuenta ✨</h2>

    <form action="{{ route('register.submit') }}" method="POST" autocomplete="off">
        @csrf

        {{-- Nombre --}}
        <div class="input-group">
            <i class="fa fa-user input-icon"></i>
            <input type="text" name="name" class="neon-input" placeholder="Nombre completo" autocomplete="off" required>
        </div>

        {{-- Email --}}
        <div class="input-group">
            <i class="fa fa-envelope input-icon"></i>
            <input type="email" name="email" class="neon-input" placeholder="Correo electrónico" autocomplete="off" required>
        </div>

        {{-- Contraseña --}}
        <div class="input-group">
            <i class="fa fa-lock input-icon"></i>
            <input type="password" name="password" class="neon-input" placeholder="Contraseña" autocomplete="new-password" required>
        </div>

        {{-- Confirmación --}}
        <div class="input-group">
            <i class="fa fa-lock input-icon"></i>
            <input type="password" name="password_confirmation" class="neon-input" placeholder="Confirmar contraseña" autocomplete="new-password" required>
        </div>

        <button class="neon-btn">Crear Cuenta</button>

    </form>

    <p class="small-link">¿Eres técnico?
        <a href="{{ route('register.technician') }}">Registrar como técnico</a>
    </p>

</div>

{{-- SCRIPT DE ESTRELLAS (MISMO DEL PERFIL DE TÉCNICO) --}}
<script>
const canvas = document.getElementById("space");
const ctx = canvas.getContext("2d");

let w, h;
function resize(){
    w = canvas.width = window.innerWidth;
    h = canvas.height = window.innerHeight;
}
resize();
window.onresize = resize;

let stars = Array.from({length: 120}, () => ({
    x: Math.random() * w,
    y: Math.random() * h,
    r: Math.random() * 1.4 + 0.2,
    dx: (Math.random() - 0.5) * 0.4,
    dy: (Math.random() - 0.5) * 0.4
}));

function animate(){
    ctx.fillStyle = "rgba(0,0,0,0.18)";
    ctx.fillRect(0,0,w,h);

    ctx.fillStyle = "#fff";
    stars.forEach(s => {
        ctx.beginPath();
        ctx.arc(s.x, s.y, s.r, 0, Math.PI * 2);
        ctx.fill();

        s.x += s.dx;
        s.y += s.dy;

        if (s.x < 0) s.x = w;
        if (s.x > w) s.x = 0;
        if (s.y < 0) s.y = h;
        if (s.y > h) s.y = 0;
    });

    requestAnimationFrame(animate);
}
animate();
</script>

@endsection
