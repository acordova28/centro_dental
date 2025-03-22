<!DOCTYPE html>
<html>
<head>
    <!-- Título de la página, que puede ser sobrescrito por las vistas hijas -->
    <title>@yield('title', 'Consulta Dental')</title>
    <!-- Enlace al CSS de Bootstrap para estilos -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Enlace al CSS de Font Awesome para usar iconos gratuitos -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
</head>
<body>
    <!-- Barra de navegación fija en la parte superior con márgenes laterales -->
    <nav class="navbar navbar-expand-lg navbar-light bg-light fixed-top">
        <div class="container">
            <a class="navbar-brand" href="{{ route('home') }}">Consulta Dental</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav me-auto">
                    <!-- Enlace al formulario de login -->
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('login') }}">Login</a>
                    </li>
                    <!-- Enlace al formulario de registro -->
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('register') }}">Register</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <!-- Añadimos un margen superior para evitar que el contenido quede oculto detrás de la barra de navegación fija -->
    <div class="container mt-5 pt-4">
        <!-- Muestra un mensaje de éxito si existe en la sesión -->
        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
        <!-- Muestra un mensaje de error si existe en la sesión -->
        @if (session('error'))
            <div class="alert alert-danger">
                {{ session('error') }}
            </div>
        @endif
        <!-- Sección de contenido que será definida por las vistas hijas -->
        @yield('content')
    </div>
    <!-- Scripts de JavaScript necesarios para Bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
