
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Mi Tienda de Teléfonos')</title>

   >
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
<body>
   
    <header>
        <nav>
            <ul>
                <li><a href="{{ route('telefonos.index') }}">Teléfonos</a></li>
                <li><a href="{{ route('accesorios.index') }}">Accesorios</a></li>
                <li><a href="{{ route('clientes.index') }}">Clientes</a></li>
            </ul>
        </nav>
        
    </header>

    <main>a
        @yield('content')
    </main>
    <footer>
        <p>&copy; 2024 Mi Tienda de Teléfonos. Todos los derechos reservados.</p>
    </footer>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>
    
</body>
</html>
