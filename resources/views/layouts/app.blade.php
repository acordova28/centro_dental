<!DOCTYPE html>
<html>
<head>
    <!-- Título de la página, que puede ser sobrescrito por las vistas hijas -->
    <title>@yield('title', 'Consulta Dental')</title>
    <!-- Enlace al CSS de Bootstrap para estilos -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <!-- Barra de navegación -->
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="#">Consulta Dental</a>
        <div class="collapse navbar-collapse">
            <ul class="navbar-nav mr-auto">
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
    </nav>
    <div class="container mt-4">
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
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
