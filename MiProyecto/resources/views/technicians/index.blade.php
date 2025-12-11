<x-app-layout>
    <div class="min-h-screen bg-gradient-to-br from-blue-900 to-black py-12 px-6 sm:px-12">

        <!-- TÍTULO -->
        <h1 class="text-4xl font-extrabold text-center text-white mb-10 drop-shadow-lg">
            Servicios Disponibles
        </h1>

        <!-- GRID DE SERVICIOS -->
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-10">

            @foreach ($services as $service)
                <div class="bg-white/20 backdrop-blur-xl p-6 rounded-2xl shadow-2xl 
                hover:shadow-blue-400/40 hover:scale-105 transition duration-300">

                    <!-- Imagen/Icono -->
                    <div class="flex justify-center mb-4">
                        <img src="{{ $service['img'] }}"
                             alt="Icono"
                             class="w-24 h-24 rounded-full shadow-lg border border-white/30">
                    </div>

                    <!-- Nombre del servicio -->
                    <h2 class="text-2xl font-bold text-white text-center mb-2">
                        {{ $service['name'] }}
                    </h2>

                    <!-- Descripción -->
                    <p class="text-blue-100 text-center mb-6">
                        {{ $service['desc'] }}
                    </p>

                    <!-- BOTÓN VER TÉCNICOS -->
                    <div class="flex justify-center">
                        <a href="{{ route('technicians.lista', ['service' => $service['id']]) }}"
                            class="px-6 py-3 bg-gradient-to-r from-blue-600 to-cyan-400 
                                   text-white font-bold rounded-full shadow-md
                                   hover:shadow-xl hover:scale-110 transition-all duration-300">
                            🔍 Ver técnicos
                        </a>
                    </div>

                </div>
            @endforeach

        </div>
    </div>
</x-app-layout>
