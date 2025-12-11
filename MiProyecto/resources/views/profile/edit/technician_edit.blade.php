@extends('layouts.app')

@section('content')

<style>
    /* === MODO DIOS PARA FORMULARIO === */

    .glass-box {
        background: rgba(255,255,255,0.12);
        border-radius: 24px;
        padding: 40px;
        backdrop-filter: blur(16px);
        -webkit-backdrop-filter: blur(16px);
        border: 1px solid rgba(255,255,255,0.18);
        box-shadow:
            0 20px 50px rgba(0,0,0,0.45),
            0 0 0 1px rgba(255,255,255,0.1);
        animation: fadeUp 0.5s ease forwards;
    }

    @keyframes fadeUp {
        from { opacity: 0; transform: translateY(20px); }
        to   { opacity: 1; transform: translateY(0); }
    }

    .input-pro {
        background: rgba(255,255,255,0.85);
        border-radius: 14px;
        padding: 14px;
        border: 1px solid #cbd5e1;
        transition: 0.25s ease;
        font-size: 1rem;
    }

    .input-pro:focus {
        outline: none;
        box-shadow: 0 0 12px rgba(0, 120, 255, .6);
        transform: scale(1.02);
    }

    .btn-save {
        background: linear-gradient(135deg, #2563eb, #4f46e5);
        color: white;
        font-size: 1.1rem;
        padding: 14px 20px;
        border-radius: 14px;
        font-weight: bold;
        box-shadow: 0 10px 30px rgba(37,99,235,.4);
        transition: 0.25s ease;
        width: 100%;
    }

    .btn-save:hover {
        transform: scale(1.04);
        box-shadow: 0 14px 40px rgba(37,99,235,.6);
    }

    .btn-return {
        opacity: 0.8;
        transition: 0.2s ease;
    }

    .btn-return:hover {
        opacity: 1;
        transform: translateX(-5px);
    }

    .avatar-edit {
        width: 120px;
        height: 120px;
        border-radius: 100%;
        object-fit: cover;
        border: 4px solid #3b82f6;
        box-shadow: 0 0 12px rgba(59,130,246,.4);
    }
</style>

<div class="min-h-screen flex items-center justify-center p-5 bg-gradient-to-b from-slate-900 via-slate-950 to-black">

    <div class="glass-box max-w-3xl w-full text-white">

        <h2 class="text-4xl font-extrabold mb-8 text-center tracking-wide">
            ✏️ Editar Perfil del Técnico
        </h2>

        {{-- Avatar actual --}}
        <div class="flex flex-col items-center mb-6">
            <img src="{{ $techInfo->image ? asset($techInfo->image) : asset('images/default_user.png') }}"
                 class="avatar-edit">
            <p class="text-slate-300 text-sm mt-2">Esta es tu foto actual</p>
        </div>

        <form method="POST" action="{{ route('technician.profile.update') }}" enctype="multipart/form-data">
            @csrf

            {{-- FOTO DE PERFIL --}}
            <label class="font-semibold">📷 Foto de Perfil</label>
            <input type="file" name="image" accept="image/*"
                   class="input-pro w-full mb-5 text-black">

            {{-- ESPECIALIDAD --}}
            <label class="font-semibold">⭐ Especialidad</label>
            <input type="text" name="specialty"
                   value="{{ old('specialty', $techInfo->specialty) }}"
                   placeholder="Ej. Electricista, Plomero, Carpintero…"
                   class="input-pro w-full mb-5 text-black">

            {{-- TELÉFONO --}}
            <label class="font-semibold">📞 Teléfono</label>
            <input type="text" name="phone"
                   value="{{ old('phone', $techInfo->phone) }}"
                   placeholder="Ej. 5512345678"
                   class="input-pro w-full mb-5 text-black">

            {{-- CIUDAD --}}
            <label class="font-semibold">📍 Ciudad</label>
            <input type="text" name="city"
                   value="{{ old('city', $techInfo->city) }}"
                   placeholder="Ej. CDMX, Monterrey, Querétaro…"
                   class="input-pro w-full mb-5 text-black">

            {{-- SERVICIO --}}
            <label class="font-semibold">🔧 Tipo de Servicio</label>
            <select name="service_id" class="input-pro w-full mb-5 text-black">
                @foreach ($services as $service)
                    <option value="{{ $service->id }}"
                        {{ $techInfo->service_id == $service->id ? 'selected' : '' }}>
                        {{ $service->name }}
                    </option>
                @endforeach
            </select>

            {{-- DESCRIPCIÓN --}}
            <label class="font-semibold">📝 Descripción</label>
            <textarea
                name="description"
                rows="4"
                class="input-pro w-full mb-5 text-black"
                placeholder="Describe tu experiencia, herramientas, certificaciones…"
            >{{ old('description', $techInfo->description) }}</textarea>

            {{-- BOTÓN GUARDAR --}}
            <button class="btn-save mt-4">
                💾 Guardar Cambios
            </button>
        </form>

        {{-- REGRESAR --}}
        <div class="text-center mt-6">
            <a href="{{ route('technician.profile') }}"
               class="btn-return text-slate-300 text-sm inline-flex items-center gap-2">
                ← Regresar al perfil
            </a>
        </div>

    </div>

</div>

@endsection
