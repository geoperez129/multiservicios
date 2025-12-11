@extends('layouts.app')

@section('content')

@push('styles')
<style>
    .contact-container {
        max-width: 750px;
        margin: 50px auto;
        padding: 35px;
        border-radius: 28px;
        background: radial-gradient(circle at top left, rgba(37, 99, 235, 0.35), transparent 60%),
                    radial-gradient(circle at bottom right, rgba(16, 185, 129, 0.25), transparent 60%),
                    rgba(15, 23, 42, 0.92);
        border: 1px solid rgba(148, 163, 184, 0.35);
        box-shadow: 0 0 50px rgba(15, 23, 42, 0.9);
        color: white;
        animation: fadeIn 0.5s ease-out;
    }

    @keyframes fadeIn {
        from { opacity: 0; transform: translateY(10px); }
        to   { opacity: 1; transform: translateY(0); }
    }

    .contact-title {
        text-align: center;
        font-size: 2rem;
        font-weight: 800;
        margin-bottom: 10px;
    }

    .contact-sub {
        text-align: center;
        font-size: 0.95rem;
        color: #9ca3af;
        margin-bottom: 25px;
    }

    .contact-form {
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 18px;
    }

    .contact-form textarea {
        grid-column: span 2;
        height: 120px;
        resize: none;
    }

    .contact-label {
        font-size: 0.85rem;
        font-weight: 600;
        margin-bottom: 4px;
        color: #cbd5f5;
    }

    .contact-input,
    .contact-textarea {
        width: 100%;
        padding: 12px;
        border-radius: 12px;
        border: 1px solid rgba(148, 163, 184, 0.5);
        background: rgba(15, 23, 42, 0.95);
        color: white;
        font-size: 0.95rem;
        transition: 0.25s;
    }

    .contact-input:focus,
    .contact-textarea:focus {
        border-color: #38bdf8;
        box-shadow: 0 0 0 1px rgba(56, 189, 248, 0.9);
        outline: none;
    }

    .btn-send {
        grid-column: span 2;
        padding: 14px;
        border: none;
        border-radius: 12px;
        background: linear-gradient(135deg, #2563eb, #22c55e);
        font-size: 1.05rem;
        font-weight: 700;
        color: white;
        cursor: pointer;
        box-shadow: 0 0 18px rgba(37, 99, 235, 0.9);
        transition: 0.25s ease;
        margin-top: 10px;
    }

    .btn-send:hover {
        transform: scale(1.02);
        box-shadow: 0 0 26px rgba(37, 99, 235, 1);
    }

    @media (max-width: 650px) {
        .contact-form {
            grid-template-columns: 1fr;
        }

        .btn-send {
            grid-column: 1;
        }
    }
</style>
@endpush

<div class="contact-container">

    <h1 class="contact-title">Contactar Técnico</h1>
    <p class="contact-sub">Llena el formulario para enviar tu solicitud a un técnico de nuestra plataforma.</p>

    <form action="{{ route('contact.send') }}" method="POST" class="contact-form">
        @csrf

        {{-- NOMBRE --}}
        <div>
            <label class="contact-label">Tu nombre</label>
            <input type="text" name="name" class="contact-input" required>
        </div>

        {{-- CORREO --}}
        <div>
            <label class="contact-label">Correo</label>
            <input type="email" name="email" class="contact-input" required>
        </div>

        {{-- TELÉFONO --}}
        <div>
            <label class="contact-label">Teléfono</label>
            <input type="text" name="phone" class="contact-input" required>
        </div>

        {{-- MENSAJE --}}
        <div>
            <label class="contact-label">Describe el problema</label>
            <textarea name="message" class="contact-textarea" required></textarea>
        </div>

        <button class="btn-send">📨 Enviar Solicitud</button>

    </form>

</div>

@endsection
