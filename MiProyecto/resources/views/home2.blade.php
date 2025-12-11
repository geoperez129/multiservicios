@extends('layouts.app')

@section('content')
<div class="w-full bg-gray-900 text-white">

    <!-- HERO + MAPA -->
    <div class="relative w-full h-[480px]">
        <div id="map" class="absolute inset-0 w-full h-full rounded-lg shadow-2xl z-0"></div>

        <!-- TEXTO ENCIMA DEL MAPA -->
        <div class="absolute top-10 left-10 bg-black/60 backdrop-blur-md text-white p-6 
                    rounded-2xl shadow-lg w-[380px] z-10">

            <h1 class="text-3xl font-bold mb-3">Encuentra Técnicos Cerca de Ti 🔧</h1>

            <p class="text-blue-200">
                Servicios profesionales de electricidad, plomería, carpintería y más.
                Todo en un solo lugar.
            </p>

            <a href="{{ route('services.index') }}"
               class="mt-4 inline-block bg-blue-600 hover:bg-blue-500 px-4 py-2 rounded-lg">
               Ver Servicios
            </a>
        </div>
    </div>

    <!-- LEAFLET CSS -->
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css" />

    <!-- LEAFLET JS -->
    <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"></script>

    <!-- SCRIPT DEL MAPA -->
    <script>
        document.addEventListener("DOMContentLoaded", function () {

            // 📍 CENTRO DEL MAPA (CDMX)
            const center = [19.4326, -99.1332];

            // 🗺️ CREAR MAPA
            const map = L.map('map', {
                zoomControl: false,                 // zoom minimalista
                scrollWheelZoom: true,              // permitir scroll
            }).setView(center, 13);

            // 🌙 Mapa oscuro estilo "Bien vergas"
            L.tileLayer('https://{s}.basemaps.cartocdn.com/dark_all/{z}/{x}/{y}{r}.png', {
                maxZoom: 19,
                attribution: '©CartoDB'
            }).addTo(map);

            // 🚀 MARCADOR PERSONALIZADO
            const markerIcon = L.icon({
                iconUrl: 'https://cdn-icons-png.flaticon.com/512/684/684908.png',
                iconSize: [40, 40],
                iconAnchor: [20, 40],
            });

            // 📍 AGREGAR MARCADOR
            L.marker(center, { icon: markerIcon })
                .addTo(map)
                .bindPopup("<b>Zona de Servicio</b><br>Estamos cerca de ti.")
                .openPopup();

            // 📱 HACER QUE EL MAPA SE ADAPTE A CELULAR
            setTimeout(() => {
                map.invalidateSize();
            }, 400);

        });
    </script>
</div>
@endsection
