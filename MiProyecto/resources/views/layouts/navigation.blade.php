<nav class="bg-gray-900 text-white shadow-md">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16 items-center">

            <!-- LOGO -->
            <div class="flex items-center space-x-3">
                <img src="/imagenes/soporte.webp" class="h-10 rounded-lg">
                <span class="text-xl font-bold">MultiServicios</span>
            </div>

            <!-- LINKS PÚBLICOS -->
            <x-nav-link href="{{ route('home') }}" :active="request()->routeIs('home')">Inicio</x-nav-link>
            <x-nav-link href="{{ route('services.index') }}" :active="request()->routeIs('services.index')">Servicios</x-nav-link>


            <!-- LINKS SEGÚN ROL -->
            @auth

                {{-- =======================
                     ROL: USER
                ======================= --}}
                @if(Auth::user()->role === 'user')
                    <x-nav-link href="{{ route('user.profile') }}" :active="request()->routeIs('user.profile')">
                        Mi Perfil
                    </x-nav-link>
                    <x-nav-link href="{{ route('user.edit') }}" :active="request()->routeIs('user.edit')">
                        Editar Perfil
                    </x-nav-link>
                @endif

                {{-- =======================
                     ROL: TECHNICIAN
                ======================= --}}
                @if(Auth::user()->role === 'technician')
                    <x-nav-link href="{{ route('technician.profile') }}" :active="request()->routeIs('technician.profile')">
                        Perfil Técnico
                    </x-nav-link>
                    <x-nav-link href="{{ route('technician.profile.edit') }}" :active="request()->routeIs('technician.profile.edit')">
                        Editar Técnico
                    </x-nav-link>
                @endif

            @endauth


            <!-- USUARIO LOGUEADO O BOTONES DE LOGIN -->
            <div class="hidden md:flex items-center space-x-4">

                @auth
                    <!-- MENU DROPDOWN -->
                    <div class="relative group">
                        <button class="bg-cyan-600 px-4 py-2 rounded-lg">
                            {{ Auth::user()->name }}
                        </button>

                        <div class="absolute right-0 mt-2 w-56 bg-white text-gray-800 rounded-xl shadow-xl
                                    py-2 z-50 opacity-0 group-hover:opacity-100 transition">

                            @if(Auth::user()->role === 'user')
                                <a href="{{ route('user.profile') }}" class="block px-4 py-2 hover:bg-gray-200">
                                    Perfil de Usuario
                                </a>
                            @endif

                            @if(Auth::user()->role === 'technician')
                                <a href="{{ route('technician.profile') }}" class="block px-4 py-2 hover:bg-gray-200">
                                    Perfil Técnico
                                </a>
                            @endif

                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <button class="w-full text-left px-4 py-2 text-red-600 hover:bg-red-100">
                                    Cerrar sesión
                                </button>
                            </form>

                        </div>
                    </div>

                @else
                    <a href="{{ route('register') }}" class="bg-blue-600 px-4 py-2 rounded-lg shadow hover:bg-blue-700 transition">
                        Registrarse
                    </a>

                    <a href="{{ route('login') }}" class="hover:text-cyan-400">
                        Iniciar sesión
                    </a>
                @endauth

            </div>
        </div>
    </div>
</nav>
