<!-- resources/views/clientes/create.blade.php -->

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agregar Nuevo Cliente</title>
</head>
<body>
    <h1>Agregar Nuevo Cliente</h1>

    <!-- Verificar si hay errores de validación -->
    @if ($errors->any())
        <div style="color: red;">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <!-- Formulario para crear cliente -->
    <form action="{{ route('clientes.store') }}" method="POST">
        @csrf  <!-- Protección contra CSRF -->

        <label for="nombre">Nombre:</label>
        <input type="text" id="nombre" name="nombre" value="{{ old('nombre') }}" required><br><br>

        <label for="email">Email:</label>
        <input type="email" id="email" name="email" value="{{ old('email') }}" required><br><br>

        <label for="telefono">Teléfono:</label>
        <input type="text" id="telefono" name="telefono" value="{{ old('telefono') }}" required><br><br>

        <button type="submit">Guardar Cliente</button>
    </form>

    <br>
    <a href="{{ route('clientes.index') }}">Volver a la lista de clientes</a>
</body>
</html>
