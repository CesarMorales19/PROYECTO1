<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Mi aplicación @yield('title')</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">

    <!-- Estilo personalizado -->
    <style>
        body {
            background-color: #f4f7fc;
            font-family: 'Arial', sans-serif;
            display: flex;
            min-height: 100vh;
        }

        /* Barra lateral */
        .sidebar {
            height: 100%;
            width: 250px;
            background-color: #34495e;
            position: fixed;
            top: 0;
            left: 0;
            padding-top: 20px;
            padding-left: 15px;
            z-index: 1000;
        }

        .sidebar .nav-item {
            margin-bottom: 15px;
        }

        .sidebar .nav-link {
            color: #ecf0f1;
            padding: 10px 15px;
        }

        .sidebar .nav-link:hover {
            background-color: #2c3e50;
            color: #3498db;
        }

        /* Contenido principal */
        .content {
            margin-left: 250px;
            width: 100%;
            padding: 30px;
        }

        .container {
            margin-top: 30px;
        }

        .navbar-brand, .nav-link {
            color: #ecf0f1 !important;
        }

        /* Ajuste para iconos */
        .sidebar .nav-item i {
            margin-right: 8px;
        }

        /* Opcional: Agregar un pequeño espacio al contenedor */
        .content {
            margin-left: 250px;
        }
    </style>

    @yield('styles')
</head>
<body>
    @unless(request()->is('login'))
    <div class="sidebar">
        <a class="navbar-brand" href="{{ route('home') }}">Tienda en Línea</a>
        <ul class="navbar-nav">
            @if(Auth::check())
                <li class="nav-item"><a class="nav-link" href="{{ route('products.index') }}"><i class="fas fa-laptop"></i> Productos</a></li>
                <li class="nav-item"><a class="nav-link" href="{{ route('categories.index') }}"><i class="fas fa-cogs"></i> Categorías</a></li>
                <li class="nav-item"><a class="nav-link" href="{{ route('brands.index') }}"><i class="fas fa-tag"></i> Marcas</a></li>
                <li class="nav-item"><a class="nav-link" href="{{ route('orders.index') }}"><i class="fas fa-box"></i> Órdenes</a></li>
                <li class="nav-item"><a class="nav-link" href="{{ route('user.list') }}"><i class="fas fa-list-alt"></i> Usuarios</a></li>
                <li class="nav-item">
                    <form action="{{ route('logout') }}" method="POST" style="display: inline;">
                        @csrf
                        <button type="submit" class="btn btn-link nav-link" style="color: inherit; text-decoration: none;">
                            <i class="fas fa-sign-out-alt"></i> Cerrar sesión
                        </button>
                    </form>
                </li>
            @else
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('login') }}"><i class="fas fa-sign-in-alt"></i> Iniciar sesión</a>
                </li>
            @endif
        </ul>
    </div>
    @endunless

    <div class="content">
        <div class="container">
            @yield('content')
        </div>
    </div>
</body>
</html>
