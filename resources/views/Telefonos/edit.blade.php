<!-- resources/views/telefonos/edit.blade.php -->

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Teléfono</title>
</head>
<body>
    <h1>Editar Teléfono: {{ $telefono->nombre }}</h1>

    <!-- Formulario para editar el teléfono -->
    <form action="{{ route('telefonos.update', $telefono->id) }}" method="POST">
        @csrf
        @method('PUT')  <!-- Indica que estamos haciendo una actualización -->

        <label for="nombre">Nombre:</label>
        <input type="text" id="nombre" name="nombre" value="{{ old('nombre', $telefono->nombre) }}" required><br><br>

        <label for="marca">Marca:</label>
        <input type="text" id="marca" name="marca" value="{{ old('marca', $telefono->marca) }}" required><br><br>

        <label for="modelo">Modelo:</label>
        <input type="text" id="modelo" name="modelo" value="{{ old('modelo', $telefono->modelo) }}" required><br><br>

        <label for="precio">Precio:</label>
        <input type="number" id="precio" name="precio" value="{{ old('precio', $telefono->precio) }}" step="0.01" required><br><br>

        <label for="stock">Stock:</label>
        <input type="number" id="stock" name="stock" value="{{ old('stock', $telefono->stock) }}" required><br><br>

        <button type="submit">Guardar Cambios</button>
    </form>

    <a href="{{ route('telefonos.index') }}">Volver a la lista</a>
</body>
</html>
