{{-- resources/views/pages/services.blade.php --}}
@extends('layouts.main')

@section('content')

<div class="services-section">
    <div class="container my-5">

        {{-- TÍTULO / HERO --}}
        <div class="text-center mb-5">
            <h1 class="display-4 fw-bold text-gradient">NUESTROS SERVICIOS</h1>
            <p class="lead text-light mt-3">
                Encuentra al técnico ideal para electricidad, plomería, carpintería, fumigación, CCTV y mucho más.
            </p>
        </div>

        @php
            // 👇 IMPORTANTE: estos nombres de imagen coinciden con /public/imagenes/*.webp
            $servicios = [
                [
                    'nombre' => 'Albañilería',
                    'desc'   => 'Muros, losas y mantenimiento general',
                    'img'    => 'albanileria.webp',
                    'slug'   => 'albanileria',
                ],
                [
                    'nombre' => 'Carpintería',
                    'desc'   => 'Muebles, closets y reparación',
                    'img'    => 'carpinteria.webp',
                    'slug'   => 'carpinteria',
                ],
                [
                    'nombre' => 'Cerrajería',
                    'desc'   => 'Cerraduras, llaves y apertura de puertas',
                    'img'    => 'cerrajeria.webp',
                    'slug'   => 'cerrajeria',
                ],
                [
                    'nombre' => 'Construcción',
                    'desc'   => 'Obra, remodelaciones y mantenimiento',
                    'img'    => 'construccion.webp',
                    'slug'   => 'construccion',
                ],
                [
                    'nombre' => 'Decoración de interiores',
                    'desc'   => 'Diseño y ambientación de espacios',
                    'img'    => 'decoracion_interiores.webp',
                    'slug'   => 'decoracion-interiores',
                ],
                [
                    'nombre' => 'Electricidad',
                    'desc'   => 'Instalaciones eléctricas y mantenimiento',
                    'img'    => 'electricidad.webp',
                    'slug'   => 'electricidad',
                ],
                [
                    'nombre' => 'Fumigación',
                    'desc'   => 'Control de plagas y sanitización',
                    'img'    => 'fumigacion.webp',
                    'slug'   => 'fumigacion',
                ],
                [
                    'nombre' => 'Herrería',
                    'desc'   => 'Estructuras metálicas y soldadura',
                    'img'    => 'herreria.webp',
                    'slug'   => 'herreria',
                ],
                [
                    'nombre' => 'Impermeabilización',
                    'desc'   => 'Sellado y protección contra humedad',
                    'img'    => 'impermeabilizacion.webp',
                    'slug'   => 'impermeabilizacion',
                ],
                [
                    'nombre' => 'Instalación de cámaras',
                    'desc'   => 'CCTV, seguridad y monitoreo',
                    'img'    => 'instalacion_camaras.webp',
                    'slug'   => 'instalacion-camaras',
                ],
                [
                    'nombre' => 'Jardinería',
                    'desc'   => 'Diseño y mantenimiento de jardines',
                    'img'    => 'jardineria.webp',
                    'slug'   => 'jardineria',
                ],
                [
                    'nombre' => 'Limpieza',
                    'desc'   => 'Casas, oficinas y comercios',
                    'img'    => 'limpieza.webp',
                    'slug'   => 'limpieza',
                ],
                [
                    'nombre' => 'Mudanzas',
                    'desc'   => 'Traslado de muebles y equipo',
                    'img'    => 'mudanzas.webp',
                    'slug'   => 'mudanzas',
                ],
                [
                    'nombre' => 'Multiservicios',
                    'desc'   => 'Equipo integral para tu hogar o negocio',
                    'img'    => 'multiservicios.webp',
                    'slug'   => 'multiservicios',
                ],
                [
                    'nombre' => 'Pintura',
                    'desc'   => 'Pintura residencial e industrial',
                    'img'    => 'pintura.webp',
                    'slug'   => 'pintura',
                ],
                [
                    'nombre' => 'Plomería',
                    'desc'   => 'Reparación e instalación de tuberías',
                    'img'    => 'plomeria.webp',
                    'slug'   => 'plomeria',
                ],
                [
                    'nombre' => 'Refrigeración',
                    'desc'   => 'Refrigeradores y cámaras frías',
                    'img'    => 'refrigeracion.webp',
                    'slug'   => 'refrigeracion',
                ],
                [
                    'nombre' => 'Soldadura',
                    'desc'   => 'Trabajos de soldadura especializada',
                    'img'    => 'soldadura.webp',
                    'slug'   => 'soldadura',
                ],
                [
                    'nombre' => 'Soporte técnico',
                    'desc'   => 'Computadoras, redes y sistemas',
                    'img'    => 'soporte_tecnico.webp',
                    'slug'   => 'soporte-tecnico',
                ],
                [
                    'nombre' => 'Vidriería',
                    'desc'   => 'Ventanas, canceles y cristales',
                    'img'    => 'vidrieria.webp',
                    'slug'   => 'vidrieria',
                ],
            ];
        @endphp

        {{-- GRID DE SERVICIOS --}}
        <div class="services-wrapper">
            <div class="services-grid">
                @foreach($servicios as $s)
                    <div class="service-card">
                        <div class="service-img-wrapper">
                            <img
                                class="service-img"
                                src="{{ asset('imagenes/' . $s['img']) }}"
                                alt="{{ $s['nombre'] }}"
                            >
                        </div>
                        <h3 class="service-title">
                            {{ strtoupper($s['nombre']) }}
                        </h3>
                        <p class="service-desc">
                            {{ $s['desc'] }}
                        </p>
                        <a
                            href="{{ url('/servicio/' . $s['slug']) }}"
                            class="btn btn-primary mt-3"
                            style="width:100%; font-weight:700; border-radius:15px;"
                        >
                            Ver Técnicos
                        </a>
                    </div>
                @endforeach
            </div>
        </div>

    </div>
</div>

@endsection
