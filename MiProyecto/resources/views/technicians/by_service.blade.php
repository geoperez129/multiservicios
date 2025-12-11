@extends('layouts.app')

@section('content')
<style>
    .tech-section {
        min-height: 100vh;
        background: radial-gradient(circle at top, #1d4ed8 0, #020617 55%, #000);
        color: white;
        padding: 40px 16px 50px;
    }

    .tech-title {
        text-align: center;
        font-size: 2.3rem;
        font-weight: 900;
        text-transform: uppercase;
        letter-spacing: .08em;
        background: linear-gradient(to right,#60a5fa,#a855f7);
        -webkit-background-clip: text;
        color: transparent;
        margin-bottom: .25rem;
    }

    .tech-subtitle {
        text-align: center;
        color: #cbd5f5;
        margin-bottom: 2rem;
    }

    .tech-grid {
        max-width: 1140px;
        margin: 0 auto;
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(260px, 1fr));
        gap: 24px;
    }

    .tech-card {
        background: rgba(15,23,42,0.85);
        border-radius: 20px;
        border: 1px solid rgba(148,163,184,0.4);
        padding: 16px 16px 18px;
        backdrop-filter: blur(8px);
        box-shadow: 0 18px 40px rgba(15,23,42,0.9);
        transition: .35s ease;
        position: relative;
        overflow: hidden;
    }

    .tech-card:hover {
        transform: translateY(-8px) scale(1.02);
        box-shadow: 0 24px 60px rgba(37,99,235,0.8);
        border-color: rgba(191,219,254,0.8);
    }

    .avatar-wrap {
        display: flex;
        align-items: center;
        gap: 12px;
        margin-bottom: .75rem;
    }

    .avatar {
        width: 60px;
        height: 60px;
        border-radius: 999px;
        object-fit: cover;
        border: 2px solid #60a5fa;
        box-shadow: 0 0 18px rgba(96,165,250,.8);
    }

    .tech-name {
        font-weight: 800;
        font-size: 1.05rem;
        text-transform: uppercase;
        letter-spacing: .06em;
        color: #e5e7eb;
    }

    .tech-badge-service {
        font-size: .75rem;
        color: #bfdbfe;
        background: rgba(37,99,235,.2);
        border-radius: 999px;
        padding: 2px 10px;
        display: inline-flex;
        align-items: center;
        gap: 4px;
        margin-top: 4px;
    }

    .status-pill {
        font-size: .75rem;
        padding: 2px 9px;
        border-radius: 999px;
        display: inline-flex;
        align-items: center;
        gap: 5px;
        margin-top: 3px;
    }

    .status-online {
        background: rgba(22,163,74,.2);
        color: #bbf7d0;
    }

    .status-offline {
        background: rgba(148,163,184,.2);
        color: #e5e7eb;
    }

    .status-busy {
        background: rgba(239,68,68,.2);
        color: #fecaca;
    }

    .info-line {
        font-size: .85rem;
        color: #e2e8f0;
        margin-bottom: 4px;
    }

    .rating-row {
        display: flex;
        align-items: center;
        gap: 6px;
        margin: 6px 0 4px;
        font-size: .9rem;
        color: #fde68a;
    }

    .star {
        color: #facc15;
        font-size: 1rem;
    }

    .tech-buttons {
        display: flex;
        gap: 8px;
        margin-top: 10px;
    }

    .btn-whatsapp {
        flex: 1;
        background: linear-gradient(90deg,#16a34a,#22c55e);
        color: #e5e7eb;
        display: inline-flex;
        justify-content: center;
        align-items: center;
        gap: 6px;
        padding: 7px 10px;
        border-radius: 999px;
        font-weight: 700;
        font-size: .85rem;
        text-decoration: none;
        box-shadow: 0 12px 25px rgba(22,163,74,.8);
        transition: .25s ease;
    }

    .btn-whatsapp:hover {
        transform: translateY(-2px);
        box-shadow: 0 16px 40px rgba(34,197,94,.9);
    }

    .btn-rate {
        flex: 1;
        background: radial-gradient(circle at top,#4f46e5,#1d4ed8);
        color: #e5e7eb;
        border-radius: 999px;
        padding: 7px 10px;
        font-weight: 700;
        font-size: .85rem;
        text-align: center;
        cursor: pointer;
        border: none;
        box-shadow: 0 12px 25px rgba(37,99,235,.7);
        transition: .25s;
    }

    .btn-rate:hover {
        transform: translateY(-2px);
        box-shadow: 0 16px 35px rgba(79,70,229,.9);
    }

    .back-btn {
        display: block;
        width: fit-content;
        margin: 32px auto 0;
        padding: 10px 22px;
        border-radius: 999px;
        background: linear-gradient(90deg,#2563eb,#4f46e5);
        font-weight: 700;
        color: #e5e7eb;
        text-decoration: none;
        box-shadow: 0 14px 30px rgba(37,99,235,.7);
        transition: .25s;
    }

    .back-btn:hover {
        transform: translateY(-3px);
        box-shadow: 0 18px 40px rgba(59,130,246,.9);
    }

    /* Modal */
    .modal-bg {
        position: fixed;
        inset: 0;
        background: rgba(15,23,42,.8);
        backdrop-filter: blur(6px);
        display: none;
        align-items: center;
        justify-content: center;
        z-index: 50;
    }
    .modal-bg.active {
        display: flex;
    }
    .modal-card {
        background: #020617;
        border-radius: 20px;
        border: 1px solid rgba(148,163,184,.7);
        padding: 18px 20px;
        max-width: 380px;
        width: 90%;
        box-shadow: 0 20px 50px rgba(15,23,42,.9);
    }
    .modal-title {
        font-weight: 800;
        font-size: 1.05rem;
        margin-bottom: 8px;
        color: #bfdbfe;
    }
    .modal-subtitle {
        font-size: .85rem;
        color: #cbd5f5;
        margin-bottom: 10px;
    }
    .modal-label {
        font-size: .8rem;
        color: #cbd5f5;
        margin-top: 6px;
    }
    .modal-input,
    .modal-textarea {
        width: 100%;
        border-radius: 10px;
        border: 1px solid #4b5563;
        background: #020617;
        color: #e5e7eb;
        padding: 6px 8px;
        font-size: .85rem;
        margin-top: 2px;
    }
    .modal-textarea {
        min-height: 70px;
        resize: vertical;
    }
    .modal-actions {
        display: flex;
        gap: 8px;
        justify-content: flex-end;
        margin-top: 10px;
    }
    .modal-btn-cancel {
        padding: 6px 10px;
        border-radius: 999px;
        background: #111827;
        border: 1px solid #4b5563;
        color: #e5e7eb;
        font-size: .8rem;
        cursor: pointer;
    }
    .modal-btn-save {
        padding: 6px 12px;
        border-radius: 999px;
        background: linear-gradient(90deg,#22c55e,#16a34a);
        color: #e5e7eb;
        border: none;
        font-size: .8rem;
        font-weight: 700;
        cursor: pointer;
    }
</style>

<div class="tech-section">

    <h1 class="tech-title">Técnicos en {{ $service->name }}</h1>
    <p class="tech-subtitle">Profesionales verificados cerca de ti</p>

    @if(session('success'))
        <p class="text-center text-green-400 mb-4">{{ session('success') }}</p>
    @endif
    @if(session('error'))
        <p class="text-center text-red-400 mb-4">{{ session('error') }}</p>
    @endif

    @if($technicians->isEmpty())
        <p class="text-center text-gray-300 mt-10 text-lg">
            Aún no hay técnicos registrados para este servicio.
        </p>
    @endif

    <div class="tech-grid">
        @foreach($technicians as $tech)
            @php
                $isOnline = $tech->user->last_login_at && $tech->user->last_login_at->gt(now()->subMinutes(5));
                $statusClass = 'status-offline';
                $statusText  = 'No disponible';

                if ($tech->status === 'disponible') {
                    $statusClass = 'status-online';
                    $statusText = 'Disponible';
                } elseif ($tech->status === 'ocupado') {
                    $statusClass = 'status-busy';
                    $statusText = 'Ocupado';
                }

                if ($isOnline) {
                    $statusClass = 'status-online';
                    $statusText  = 'En línea ahora';
                }

                $avg = $tech->avg_rating;
                $count = $tech->rating_count;
                $fullStars = floor($avg);
                $hasHalf = ($avg - $fullStars) >= 0.5;
            @endphp

            <div class="tech-card">

                <div class="avatar-wrap">
                    <img src="{{ $tech->image ? asset($tech->image) : asset('imagenes/default.webp') }}"
                         class="avatar">

                    <div>
                        <div class="tech-name">{{ $tech->user->name }}</div>

                        <div class="tech-badge-service">
                            🛠 {{ $service->name }}
                        </div>

                        <div class="status-pill {{ $statusClass }}">
                            <span>●</span> <span>{{ $statusText }}</span>
                        </div>
                    </div>
                </div>

                <div class="rating-row">
                    @for($i = 1; $i <= 5; $i++)
                        @if($i <= $fullStars)
                            <span class="star">★</span>
                        @elseif($hasHalf && $i == $fullStars + 1)
                            <span class="star">☆</span>
                        @else
                            <span class="star" style="opacity:0.3;">★</span>
                        @endif
                    @endfor
                    <span>{{ $avg > 0 ? $avg : 'Sin calificaciones' }}</span>
                    @if($count > 0)
                        <span class="text-xs text-gray-300">({{ $count }} voto{{ $count > 1 ? 's' : '' }})</span>
                    @endif
                </div>

                <div class="info-line"><strong>Especialidad:</strong> {{ $tech->specialty ?? $service->name }}</div>
                <div class="info-line"><strong>Ciudad:</strong> {{ $tech->city ?? 'No especificada' }}</div>
                <div class="info-line"><strong>Teléfono:</strong> {{ $tech->phone ?? 'No registrado' }}</div>

                <div class="tech-buttons">
                    @if($tech->phone || $tech->whatsapp)
                        @php
                            $waNumber = $tech->whatsapp ?? $tech->phone;
                            $waNumber = preg_replace('/\D/', '', $waNumber); // limpiar espacios, guiones
                            $waUrl = "https://wa.me/52{$waNumber}?text=" . urlencode('Hola, vi tu perfil en Multiservicios');
                        @endphp
                        <a href="{{ $waUrl }}" target="_blank" class="btn-whatsapp">
                            💬 WhatsApp
                        </a>
                    @else
                        <span class="btn-whatsapp" style="opacity:.6; cursor:not-allowed;">
                            WhatsApp no disponible
                        </span>
                    @endif

                    @auth
                        @if(auth()->id() !== $tech->user_id)
                            <button
                                class="btn-rate"
                                type="button"
                                onclick="openRatingModal({{ $tech->id }}, '{{ addslashes($tech->user->name) }}')">
                                ★ Calificar
                            </button>
                        @else
                            <span class="btn-rate" style="opacity:.6; cursor:not-allowed;">
                                Tu perfil
                            </span>
                        @endif
                    @else
                        <a href="{{ route('login') }}" class="btn-rate">
                            Inicia sesión
                        </a>
                    @endauth

                </div>

            </div>
        @endforeach
    </div>

    {{-- BOTÓN REGRESAR --}}
    <a href="{{ route('services.index') }}" class="back-btn">← Regresar a Servicios</a>
</div>

{{-- MODAL DE CALIFICACIÓN --}}
<div class="modal-bg" id="ratingModal">
    <div class="modal-card">
        <div class="modal-title" id="modalTechName">Calificar técnico</div>
        <div class="modal-subtitle">Tu opinión ayuda a otros usuarios a elegir mejor.</div>

        <form id="ratingForm" method="POST">
            @csrf

            <label class="modal-label">Calificación (1 a 5)</label>
            <select name="score" class="modal-input" required>
                <option value="5">⭐⭐⭐⭐⭐ - Excelente</option>
                <option value="4">⭐⭐⭐⭐ - Muy bueno</option>
                <option value="3">⭐⭐⭐ - Bueno</option>
                <option value="2">⭐⭐ - Regular</option>
                <option value="1">⭐ - Malo</option>
            </select>

            <label class="modal-label">Comentario (opcional)</label>
            <textarea name="comment" class="modal-textarea" placeholder="Escribe tu experiencia con este técnico..."></textarea>

            <div class="modal-actions">
                <button type="button" class="modal-btn-cancel" onclick="closeRatingModal()">Cancelar</button>
                <button type="submit" class="modal-btn-save">Guardar</button>
            </div>
        </form>
    </div>
</div>

<script>
    function openRatingModal(technicianId, techName) {
        const modal = document.getElementById('ratingModal');
        const form = document.getElementById('ratingForm');
        const nameLabel = document.getElementById('modalTechName');

        nameLabel.innerText = 'Calificar a ' + techName;

        form.action = '{{ url("/tecnicos") }}/' + technicianId + '/calificar';

        modal.classList.add('active');
    }

    function closeRatingModal() {
        document.getElementById('ratingModal').classList.remove('active');
    }
</script>

@endsection
