@extends('layouts.app')

@section('content')
    <h1>Accesorios</h1>
    <a href="{{ route('accesorios.create') }}">Crear Accesorio</a>

    <ul>
        @foreach ($accesorios as $accesorio)
            <li>
                {{ $accesorio->nombre }} - ${{ $accesorio->precio }}
                <a href="{{ route('accesorios.edit', $accesorio->id) }}">Editar</a>
                
                <form action="{{ route('accesorios.destroy', $accesorio->id) }}" method="POST" style="display:inline;" id="delete-form-{{ $accesorio->id }}">
                    @csrf
                    @method('DELETE')
                    <button type="button" class="btn btn-danger" onclick="confirmDelete({{ $accesorio->id }})">Eliminar</button>
                </form>
            </li>
        @endforeach
    </ul>

    <!-- Paginación -->
    <div class="pagination">
        {{ $accesorios->links() }} 
    </div>

    <!-- Notificación de éxito después de la eliminación o actualización -->
    @if (session('success'))
        <script>
            Swal.fire({
                title: 'Éxito!',
                text: '{{ session('success') }}',
                icon: 'success',
                confirmButtonText: 'Aceptar'
            });
        </script>
    @endif
@endsection

<<script>
    function confirmDelete(id) {
        Swal.fire({
            title: '¿Estás seguro?',
            text: 'Este accesorio será eliminado permanentemente.',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonText: 'Sí, eliminar',
            cancelButtonText: 'Cancelar'
        }).then((result) => {
            if (result.isConfirmed) {
                
                console.log('Formulario enviado para eliminar accesorio con ID:', id);
                document.getElementById('delete-form-' + id).submit();
            }
        });
    }
</script>
