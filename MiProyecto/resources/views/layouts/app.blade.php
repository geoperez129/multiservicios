<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>MultiServicios</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <style>
        * { box-sizing: border-box; margin: 0; padding: 0; }

        body {
            font-family: system-ui, sans-serif;
            background: radial-gradient(circle at top, #101632 0, #030712 45%, #000 100%);
            color: #f9fafb;
            min-height: 100vh;
        }

        .nav-wrapper {
            position: sticky;
            top: 0;
            z-index: 40;
            background: rgba(3, 7, 18, 0.92);
            backdrop-filter: blur(18px);
            border-bottom: 1px solid rgba(148, 163, 184, 0.25);
        }

        .navbar {
            max-width: 1200px;
            margin: 0 auto;
            padding: 12px 20px;
            display: flex;
            align-items: center;
            justify-content: space-between;
        }

        .brand {
            display: flex;
            align-items: center;
            gap: 8px;
            font-weight: 800;
            font-size: 1.1rem;
            color: #e5e7eb;
        }

        .brand-icon {
            width: 28px;
            height: 28px;
            border-radius: 999px;
            background: radial-gradient(circle at 30% 0, #38bdf8, #2563eb 40%, #0f172a 100%);
            display: flex;
            align-items: center;
            justify-content: center;
            box-shadow: 0 0 18px rgba(56, 189, 248, 0.8);
        }

        .nav-links { display: flex; gap: 18px; align-items: center; }

        .nav-link {
            font-size: 0.95rem;
            color: #cbd5f5;
            padding: 6px 10px;
            border-radius: 999px;
            transition: 0.2s;
        }

        .nav-link:hover {
            background: rgba(37, 99, 235, 0.12);
            color: #fff;
        }

        .nav-link-active {
            background: linear-gradient(135deg, #2563eb, #22c55e);
            color: #fff;
            box-shadow: 0 0 14px rgba(37, 99, 235, 0.8);
        }

        .user-menu { position: relative; }
        .user-button {
            background: rgba(15,23,42,0.85);
            padding: 8px 14px;
            border-radius: 999px;
            border: 1px solid rgba(148,163,184,0.5);
            cursor: pointer;
        }

        .user-dropdown {
            position: absolute;
            right: 0;
            margin-top: 10px;
            width: 200px;
            background: #0f172a;
            border-radius: 12px;
            overflow: hidden;
            display: none;
            box-shadow: 0 0 15px rgba(0,0,0,.4);
        }

        .user-dropdown a,
        .user-dropdown button {
            display: block;
            padding: 12px;
            color: #e5e7eb;
            text-align: left;
            width: 100%;
        }

        .user-dropdown a:hover,
        .user-dropdown button:hover {
            background: #1e293b;
        }

        .user-menu:hover .user-dropdown { display: block; }

        .page-wrapper {
            max-width: 1200px;
            margin: 0 auto;
            padding: 30px 16px 60px;
        }
    </style>

    <!-- ⭐ LEAFLET AGREGADO ⭐ -->
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css" />
    <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"></script>

</head>

<body>

    <div class="nav-wrapper">
        <div class="navbar">

            <div class="brand">
                <div class="brand-icon">MS</div>
                <span>MultiServicios</span>
            </div>

            <div class="nav-links">
                <a href="{{ route('home') }}" 
                    class="nav-link {{ request()->routeIs('home') ? 'nav-link-active' : '' }}">
                    Inicio
                </a>

                <a href="{{ route('services.index') }}"
                    class="nav-link {{ request()->routeIs('services.*') ? 'nav-link-active' : '' }}">
                    Servicios
                </a>

                <a href="{{ route('contact.form') }}"
                    class="nav-link {{ request()->routeIs('contact.*') ? 'nav-link-active' : '' }}">
                    Contactar Técnico
                </a>

                <a href="{{ route('prices') }}"
                    class="nav-link {{ request()->routeIs('prices') ? 'nav-link-active' : '' }}">
                    Precios
                </a>

                <a href="{{ route('about') }}"
                    class="nav-link {{ request()->routeIs('about') ? 'nav-link-active' : '' }}">
                    Acerca de Nosotros
                </a>
            </div>

            <div>
                @auth
                    <div class="user-menu">

                        <div class="user-button">
                            {{ Auth::user()->name }}
                        </div>

                        <div class="user-dropdown">

                            @if(Auth::user()->role === 'user')
                                <a href="{{ route('user.profile') }}">👤 Mi Perfil</a>
                                <a href="{{ route('user.edit') }}">✏️ Editar Perfil</a>
                            @endif

                            @if(Auth::user()->role === 'technician')
                                <a href="{{ route('technician.profile') }}">🛠️ Perfil Técnico</a>
                                <a href="{{ route('technician.profile.edit') }}">✏️ Editar Perfil Técnico</a>
                            @endif

                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <button type="submit" style="color:#f87171">🚪 Cerrar sesión</button>
                            </form>

                        </div>

                    </div>
                @else
                    <a href="{{ route('login') }}" class="nav-link">Iniciar sesión</a>
                    <a href="{{ route('register') }}" class="nav-link nav-link-active">Crear cuenta</a>
                @endauth
            </div>

        </div>
    </div>

    <div class="page-wrapper">
        @yield('content')
    </div>

    <!-- ⭐ IMPORTANTE PARA EL MAPA ⭐ -->
    @yield('scripts')

</body>
</html>
