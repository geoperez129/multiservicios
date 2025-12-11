<!DOCTYPE html>
<html lang="es" class="@if(auth()->check() && auth()->user()->dark_mode) dark @endif">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MultiServicios Pro - Encuentra Técnicos Expertos</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <link href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css" rel="stylesheet">
    <style>
        :root { --primary:#2c3e50; --secondary:#3498db; --accent:#e74c3c; --success:#27ae60; }
        .dark { background:#1a1a1a; color:#fff; }
        .dark .navbar { background:#2c3e50 !important; }
        .dark .card { background:#2d3748; border-color:#4a5568; }
        .dark .bg-light { background:#2d3748 !important; }
        .service-card { transition:transform .3s, box-shadow .3s; border:none; border-radius:15px; overflow:hidden; }
        .service-card:hover { transform:translateY(-5px); box-shadow:0 10px 25px rgba(0,0,0,.2); }
        .rating-stars { color:#ffc107; }
        .hero-section { background:linear-gradient(135deg, var(--primary) 0%, var(--secondary) 100%); color:#fff; padding:80px 0; }
    </style>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark" style="background-color: var(--primary);">
        <div class="container">
            <a class="navbar-brand fw-bold" href="{{ url('/') }}">
                <i class="fas fa-tools me-2"></i>MultiServicios Pro
            </a>
            <div class="navbar-nav ms-auto">
                <a href="{{ url('/') }}" class="nav-link text-light me-3">Inicio</a>
                <a href="{{ url('/services/1') }}" class="nav-link text-light me-3">Servicios</a>
                @auth
                    <a href="{{ route('dashboard') }}" class="nav-link text-light me-3">Dashboard</a>
                @endauth
                @guest
                    <a href="{{ route('login') }}" class="btn btn-outline-light btn-sm">Iniciar Sesión</a>
                @endguest
            </div>
        </div>
    </nav>

    <main>
        @yield('content')
    </main>

    <footer class="bg-dark text-white py-4 mt-5">
        <div class="container text-center">
            <p>&copy; {{ date('Y') }} MultiServicios Pro. Todos los derechos reservados.</p>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js"></script>
    <script>
        document.getElementById('darkModeToggle')?.addEventListener('click', function () {
            document.documentElement.classList.toggle('dark');
        });
    </script>
</body>
</html>
