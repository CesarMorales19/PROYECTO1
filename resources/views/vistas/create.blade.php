<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Formulario de Usuario</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card shadow-sm">
                    <div class="card-header text-center">
                        <h4>Bienvenido</h4>
                    </div>
                    <div class="card-body">
                        @if($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach($errors->all() as $error)
                                        <li>{{$error}}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        <form action="{{ route('user.store') }}" method="post" id="create_user_form">
                            @csrf
                            <div class="form-group">
                                <label for="nombre">Nombre:</label>
                                <input type="text" name="nombre" id="nombre" class="form-control" placeholder="Ingrese su nombre" required>
                            </div>
                            <div class="form-group">
                                <label for="email">Correo:</label>
                                <input type="email" name="email" id="email" class="form-control" placeholder="Ingrese su correo" required>
                            </div>
                            <div class="form-group">
                                <label for="password">Contraseña:</label>
                                <input type="password" name="password" id="password" class="form-control" placeholder="Ingrese su contraseña" required>
                            </div>
                            <div class="form-group">
                                <input type="submit" value="Enviar" class="btn btn-primary btn-block">
                            </div>
                            <div class="form-group">
                                <a href="{{ route('login') }}" class="btn btn-secondary btn-block">Cancelar</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    <script>
        $(document).ready(function() {
            $('#create_user_form').on('submit', function(event) {
                event.preventDefault();
                alert('ENVIO DE FORMULARIO');

                var data = $(this).serialize();
                var url = $(this).attr('action');

                $.ajax({
                    type: 'POST',
                    url: url,
                    data: data,
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    success: function(response) {
                        alert('Usuario creado con éxito');
                        window.location.href = "{{ route('user.list') }}";
                    },
                    error: function(error) {
                        alert('Hubo un error al crear el usuario. Intenta de nuevo.');
                    }
                });
            });
        });
    </script>
</body>
</html>
