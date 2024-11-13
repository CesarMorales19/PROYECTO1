<!-- resources/views/clientes/edit.blade.php -->

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Cliente</title>
</head>
<body>
    <h1>Editar Cliente: {{ $cliente->nombre }}</h1>

    <!-- Formulario para editar un cliente -->
    <form action="{{ route('clientes.update', $cliente->id) }}" method="POST">
        @csrf
        @method('PUT') <!-- Indica que es una solicitud de tipo PUT para actualizar -->

        <label for="nombre">Nombre:</label>
        <input type="text" id="nombre" name="nombre" value="{{ old('nombre', $cliente->nombre) }}" required><br><br>

        <label for="email">Email:</label>
        <input type="email" id="email" name="email" value="{{ old('email', $cliente->email) }}" required><br><br>

        <label for="telefono">Teléfono:</label>
        <input type="text" id="telefono" name="telefono" value="{{ old('telefono', $cliente->telefono) }}" required><br><br>

        <button type="submit">Guardar Cambios</button>
    </form>

    <a href="{{ route('clientes.index') }}">Volver a la lista de clientes</a>
</body>
</html>
