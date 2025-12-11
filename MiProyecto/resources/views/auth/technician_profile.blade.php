@extends('layouts.app')

@section('content')

<style>
    /* MODO DIOS VISUAL */
    .perfil-card {
        background: rgba(255,255,255,0.15);
        backdrop-filter: blur(15px);
        border-radius: 30px;
        padding: 30px;
        box-shadow: 0 10px 35px rgba(0,0,0,0.3);
        animation: fadeIn 0.8s ease-out;
    }

    @keyframes fadeIn {
        from { opacity: 0; transform: translateY(20px); }
        to   { opacity: 1; transform: translateY(0); }
    }

    .foto-pro {
        border-radius: 999px;
        width: 140px;
        height: 140px;
        object-fit: cover;
        border: 6px solid transparent;
        background-image: linear-gradient(135deg, #00c6ff, #0072ff);
        box-shadow: 0 5px 20px rgba(0,0,0,0.4);
    }

    .info-box {
        background: rgba(255,255,255,0.20);
        border-radius: 20px;
        padding: 18px;
        box-shadow: inset 0 0 8px rgba(255,255,255,0.15);
        transition: transform 0.25s ease;
    }

    .info-box:hover {
        transform: scale(1.02);
    }

    .btn-wa {
        background: #25D366;
        color: white;
        padding: 14px 20px;
        border-radius: 15px;
        display: inline-flex;
        gap: 10px;
        align-items: center;
        font-size: 18px;
        font-weight: bold;
        box-shadow: 0 6px 15px rgba(0,0,0,0.3);
        transition: transform 0.25s ease;
    }

    .btn-wa:hover {
        transform: scale(1.05);
    }

    .btn-edit {
        background: #007bff;
        color: white;
        padding: 12px 18px;
        border-radius: 12px;
        display: inline-block;
        font-weight: bold;
        transition: transform 0.25s ease;
    }

    .btn-edit:hover {
        transform: scale(1.05);
        background: #006ae0;
    }

    .btn-back {
        color: #eee;
        transition: opacity 0.25s ease;
    }

    .btn-back:hover {
        opacity: 0.7;
    }
</style>


<div class="max-w-3xl mx-auto perfil-card mt-10 text-white">

    {{-- FOTO DEL TÉCNICO --}}
    <div class="flex flex-col items-center text-center">

        <img src="{{ $techInfo->image ? asset($techInfo->image) : asset('images/default_user.png') }}"
             alt="Foto del técnico"
             class="foto-pro">

        <h2 class="text-4xl font-extrabold mt-4">{{ $user->name }}</h2>

        {{-- ESTADO --}}
        <p class="mt-2 text-lg">
            @if($user->last_login_at && $user->last_login_at->diffInMinutes(now()) < 20)
                <span class="text-green-400 font-semibold">🟢 En línea ahora</span>
            @else
                <span class="text-yellow-300">🟡 Última vez:
                    {{ $user->last_login_at ? $user->last_login_at->diffForHumans() : 'Sin registro' }}
                </span>
            @endif
        </p>
    </div>


    {{-- INFORMACIÓN --}}
    <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mt-10">

        <div class="info-box">
            <h3 class="text-xl font-semibold mb-1">⭐ Especialidad</h3>
            <p>{{ $techInfo->specialty ?: 'Sin especificar' }}</p>
        </div>

        <div class="info-box">
            <h3 class="text-xl font-semibold mb-1">📍 Ciudad</h3>
            <p>{{ $techInfo->city ?: 'Sin asignar' }}</p>
        </div>

        <div class="info-box">
            <h3 class="text-xl font-semibold mb-1">📞 Teléfono</h3>
            <p>{{ $techInfo->phone ?: 'Sin asignar' }}</p>
        </div>

        <div class="info-box">
            <h3 class="text-xl font-semibold mb-1">📅 Registrado</h3>
            <p>{{ $techInfo->created_at->format('d/m/Y') }}</p>
        </div>

    </div>


    {{-- WHATSAPP --}}
    @if($techInfo->phone)
        <div class="text-center mt-10">
            <a href="https://wa.me/52{{ $techInfo->phone }}?text=Hola, vi tu perfil en Multiservicios y quiero contratar tus servicios 👍"
               class="btn-wa">
                💬 Contactar por WhatsApp
            </a>
        </div>
    @endif


    {{-- EDITAR --}}
    <div class="text-center mt-6">
        <a href="{{ route('technician.profile.edit') }}" class="btn-edit">
            ✏️ Editar perfil
        </a>
    </div>

    {{-- REGRESAR --}}
    <div class="mt-4 text-center">
        <a href="{{ route('services.index') }}" class="btn-back">
            ← Regresar a Servicios
        </a>
    </div>

</div>

@endsection
