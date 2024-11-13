<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Teléfonos</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11.7.0/dist/sweetalert2.min.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.7.0/dist/sweetalert2.all.min.js"></script>
</head>
<body>
    <h1>Lista de Teléfonos</h1>

    @if($telefonos->isEmpty())
        <p>No hay teléfonos disponibles.</p>
    @else
        <table border="1">
            <thead>
                <tr>
                    <th>Nombre</th>
                    <th>Marca</th>
                    <th>Modelo</th>
                    <th>Precio</th>
                    <th>Stock</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach($telefonos as $telefono)
                    <tr>
                        <td>{{ $telefono->nombre }}</td>
                        <td>{{ $telefono->marca }}</td>
                        <td>{{ $telefono->modelo }}</td>
                        <td>${{ $telefono->precio }}</td>
                        <td>{{ $telefono->stock }}</td>
                        <td>
                            <a href="{{ route('telefonos.edit', $telefono->id) }}">Editar</a>
                            |
                            <form action="{{ route('telefonos.destroy', $telefono->id) }}" method="POST" style="display:inline;" onsubmit="return confirmDelete(event)">
                                @csrf
                                @method('DELETE')
                                <button type="submit">Eliminar</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <div>
            {{ $telefonos->links() }}
        </div>
    @endif

    <a href="{{ route('telefonos.create') }}">Agregar Teléfono</a>

    <script>
        function confirmDelete(event) {
            event.preventDefault();

            Swal.fire({
                title: '¿Estás seguro?',
                text: "¡Esta acción no se puede deshacer!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Sí, eliminar',
                cancelButtonText: 'Cancelar'
            }).then((result) => {
                if (result.isConfirmed) {
                    event.target.submit();
                }
            });
        }
    </script>
</body>
</html>
