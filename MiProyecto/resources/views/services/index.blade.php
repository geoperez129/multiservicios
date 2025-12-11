@extends('layouts.app')

@section('content')

<style>
    .services-section {
        min-height: 100vh;
        background: radial-gradient(circle at top, #1d4ed8 0, #020617 45%, #000 100%);
        color: #fff;
        padding-top: 5rem;
        padding-bottom: 4rem;
    }

    .services-title {
        font-size: 2.8rem;
        font-weight: 900;
        text-align: center;
        background: linear-gradient(to right, #60a5fa, #a855f7, #f97316);
        -webkit-background-clip: text;
        background-clip: text;
        color: transparent;
        letter-spacing: .08em;
        text-transform: uppercase;
        margin-bottom: .5rem;
    }

    .services-subtitle {
        text-align: center;
        color: #cbd5f5;
        font-size: 1.05rem;
        margin-bottom: 2.5rem;
    }

    .carousel-wrapper {
        position: relative;
        width: 100%;
        max-width: 1200px;
        margin: 0 auto;
        padding-inline: 1rem;
        perspective: 1400px;
        overflow: hidden;
    }

    .carousel-track {
        display: flex;
        gap: 24px;
        transform: translateX(0);
        will-change: transform;
        transition: transform 0.6s cubic-bezier(.22,.61,.36,1);
    }

    .service-card {
        flex: 0 0 270px;
        background: radial-gradient(circle at top left,#1f2937 0,#020617 60%);
        border-radius: 20px;
        padding: 16px;
        border: 1px solid rgba(148,163,184,.35);
        box-shadow:
            0 15px 35px rgba(15,23,42,.8),
            0 0 0 1px rgba(15,23,42,.8);
        position: relative;
        overflow: hidden;
        transform-style: preserve-3d;
        transition:
            transform .45s ease,
            box-shadow .45s ease,
            border-color .45s ease,
            background .45s ease;
    }

    .service-card::before {
        content: "";
        position: absolute;
        inset: -60%;
        background:
            conic-gradient(from 180deg at 50% 50%,
                rgba(96,165,250,.25),
                transparent 40%,
                rgba(96,165,250,.18),
                transparent 70%,
                rgba(248,250,252,.25));
        opacity: 0;
        transform: translate3d(0,0,-1px) rotate(12deg);
        transition: opacity .5s ease;
        pointer-events: none;
    }

    .service-card:hover {
        transform: translateY(-10px) rotateX(8deg) rotateY(-8deg) scale(1.03);
        box-shadow:
            0 25px 55px rgba(37,99,235,.8),
            0 0 0 1px rgba(191,219,254,.4);
        border-color: rgba(191,219,254,.7);
        background: radial-gradient(circle at top, #0f172a 0, #020617 55%);
    }

    .service-card:hover::before {
        opacity: 1;
    }

    .service-img-wrapper {
        border-radius: 14px;
        overflow: hidden;
        position: relative;
        margin-bottom: 10px;
    }

    .service-img {
        width: 100%;
        height: 165px;
        object-fit: cover;
        transform-origin: center;
        transform: scale(1.03);
        transition: transform .6s ease, filter .6s ease;
    }

    .service-card:hover .service-img {
        transform: scale(1.12);
        filter: brightness(1.18);
    }

    .service-name {
        font-size: 1.05rem;
        font-weight: 800;
        color: #93c5fd;
        margin-bottom: 4px;
        text-transform: uppercase;
        letter-spacing: .08em;
    }

    .service-desc {
        font-size: .85rem;
        color: #e5e7eb;
        min-height: 44px;
        margin-bottom: 10px;
    }

    .service-btn {
        display: block;
        width: 100%;
        text-align: center;
        font-weight: 700;
        padding: .5rem .75rem;
        border-radius: 999px;
        background: linear-gradient(90deg,#2563eb,#4f46e5);
        color: #e5e7eb;
        text-decoration: none;
        box-shadow: 0 10px 25px rgba(37,99,235,.65);
        transition:
            transform .25s ease,
            box-shadow .25s ease,
            background .25s ease;
    }

    .service-btn:hover {
        transform: translateY(-2px);
        box-shadow: 0 16px 32px rgba(59,130,246,.85);
        background: linear-gradient(90deg,#4f46e5,#2563eb);
    }

    .carousel-arrow {
        position: absolute;
        top: 50%;
        transform: translateY(-50%);
        width: 46px;
        height: 46px;
        border-radius: 999px;
        background: radial-gradient(circle at 30% 0,#60a5fa,#0f172a);
        border: 1px solid rgba(148,163,184,.65);
        color: #e5e7eb;
        display: flex;
        justify-content: center;
        align-items: center;
        font-size: 1.5rem;
        cursor: pointer;
        box-shadow: 0 12px 30px rgba(15,23,42,.9);
        transition:
            transform .25s ease,
            box-shadow .25s ease,
            background .25s ease,
            border-color .25s ease;
        z-index: 20;
    }

    .carousel-arrow:hover {
        transform: translateY(-50%) scale(1.12);
        background: radial-gradient(circle at 30% 0,#a855f7,#1d4ed8);
        border-color: #bfdbfe;
        box-shadow: 0 18px 40px rgba(59,130,246,.9);
    }

    .arrow-left  { left: 10px; }
    .arrow-right { right: 10px; }

    @media (max-width: 768px) {
        .carousel-arrow {
            top: 92%;
            width: 42px;
            height: 42px;
        }
        .arrow-left  { left: 22px; }
        .arrow-right { right: 22px; }
        .service-card {
            flex: 0 0 240px;
        }
    }
</style>

<div class="services-section">
    <div class="max-w-6xl mx-auto px-4">
        <h1 class="services-title">Nuestros Servicios</h1>
        <p class="services-subtitle">
            Encuentra al técnico ideal para electricidad, plomería, carpintería, fumigación, CCTV y mucho más.
        </p>

        <div class="carousel-wrapper">

            <div class="carousel-arrow arrow-left" id="arrowLeft">❮</div>
            <div class="carousel-arrow arrow-right" id="arrowRight">❯</div>

            <div class="carousel-track" id="carouselTrack">

                {{-- LISTA ORIGINAL --}}
                @foreach($services as $service)
                    <div class="service-card">
                        <div class="service-img-wrapper">
                            <img src="{{ asset('imagenes/' . $service->image) }}" alt="{{ $service->name }}" class="service-img">
                        </div>

                        <div class="service-name">{{ $service->name }}</div>
                        <div class="service-desc">{{ $service->description }}</div>

                        <a href="{{ route('services.technicians', $service->id) }}" class="service-btn">
                            Ver Técnicos
                        </a>
                    </div>
                @endforeach

                {{-- DUPLICADO PARA LOOP INFINITO --}}
                @foreach($services as $service)
                    <div class="service-card">
                        <div class="service-img-wrapper">
                            <img src="{{ asset('imagenes/' . $service->image) }}" alt="{{ $service->name }}" class="service-img">
                        </div>

                        <div class="service-name">{{ $service->name }}</div>
                        <div class="service-desc">{{ $service->description }}</div>

                        <a href="{{ route('services.technicians', $service->id) }}" class="service-btn">
                            Ver Técnicos
                        </a>
                    </div>
                @endforeach

            </div>
        </div>
    </div>
</div>

<script>
window.addEventListener("load", () => {
    const track   = document.getElementById("carouselTrack");
    const cards   = track.querySelectorAll(".service-card");
    const totalOriginal = {{ count($services) }};
    const gapPx  = 24;

    if (!cards.length) return;

    let cardWidth = cards[0].offsetWidth;
    let offset = 0;
    const step = () => cardWidth + gapPx;
    let autoTimer = null;

    const originalWidth = () => step() * totalOriginal;

    const applyTransform = () => {
        track.style.transform = `translateX(${offset}px)`;
    };

    const slide = (dir = 1) => {
        offset -= dir * step();

        if (offset <= -originalWidth()) {
            offset += originalWidth();
        } else if (offset > 0) {
            offset -= originalWidth();
        }

        applyTransform();
    };

    const startAuto = () => {
        stopAuto();
        autoTimer = setInterval(() => slide(1), 3000);
    };

    const stopAuto = () => {
        if (autoTimer) clearInterval(autoTimer);
        autoTimer = null;
    };

    startAuto();

    track.addEventListener("mouseenter", stopAuto);
    track.addEventListener("mouseleave", startAuto);

    document.getElementById("arrowRight").addEventListener("click", () => {
        stopAuto();
        slide(1);
        setTimeout(startAuto, 2500);
    });

    document.getElementById("arrowLeft").addEventListener("click", () => {
        stopAuto();
        slide(-1);
        setTimeout(startAuto, 2500);
    });

    window.addEventListener("resize", () => {
        const prevStep = step();
        cardWidth = cards[0].offsetWidth;
        const newStep = step();
        offset = offset / prevStep * newStep;
        applyTransform();
    });
});
</script>

@endsection
