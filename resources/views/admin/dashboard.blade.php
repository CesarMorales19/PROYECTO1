<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Panel de Administrador</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container">
        <h1>Bienvenido al Panel de Administrador</h1>
        <p>¡Hola, {{ Auth::user()->name }}! Este es el panel de administración.</p>

        <!-- Opcional: Aquí puedes agregar más información y funcionalidades de administración -->
        <ul>
            <li><a href="{{ route('admin.users') }}">Gestionar Usuarios</a></li>
            <li><a href="{{ route('admin.settings') }}">Configuraciones</a></li>
            <!-- Más opciones para el administrador -->
        </ul>

        <a href="{{ route('logout') }}" class="btn btn-danger">Cerrar sesión</a>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>