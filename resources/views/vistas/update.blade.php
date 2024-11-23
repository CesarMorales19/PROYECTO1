@extends('layouts.app')

@section('title', 'Actualizar Usuario')

@section('styles')
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
@endsection

@section('content')
    <div class="container mt-5">
        <div class="card shadow">
            <div class="card-header text-center">
                <h4 class="mb-0">Actualizar Usuario</h4>
            </div>
            <div class="card-body">
                <form id="update_form" action="{{ route('user.update.data') }}" method="post">
                    {{ csrf_field() }}
                    <input type="hidden" name="id" value="{{ $usuario->id }}">
                    
                    <div class="form-group">
                        <label for="nombre">Nombre</label>
                        <input type="text" name="nombre" value="{{ $usuario->name }}" class="form-control" id="nombre" placeholder="Ingresa tu nombre" required>
                    </div>

                    <div class="form-group text-center">
                        <input type="submit" value="Actualizar" class="btn btn-success btn-lg">
                        <a href="{{ route('user.list') }}" class="btn btn-secondary btn-lg">Cancelar</a>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#update_form').on('submit', function(event) {
                event.preventDefault(); 
                alert('Verificando datos...');

                let data = $(this).serialize(); 
                console.log(data);

                let url = $(this).attr('action'); 
                console.log(url);

                $.ajax({
                    type: 'POST',
                    url: url,
                    data: data,
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') 
                    },
                    success: function(response) {
                        console.log(response);
                        alert('Usuario actualizado correctamente.');
                        window.location.href = "{{ route('home') }}"; 
                    },
                    error: function(xhr, status, error) {
                        console.error(xhr.responseText);
                        alert('Ocurrió un error al actualizar el usuario.');
                    }
                });
            });
        });
    </script>
@endsection