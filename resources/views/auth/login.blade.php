@extends('layouts.app')

@section('content')
<div class="align-items-center">
    <div class="col-md-6">
        <div class="card">
            <div class="card-header text-center">
                <h3>Iniciar sesión</h3>
            </div>
            <div class="card-body">
                <form action="{{ route('login') }}" method="post" id="login_form">
                    @csrf
                    
                    <div class="mb-3">
                        <label for="email" class="form-label">Correo electrónico</label>
                        <input type="email" class="form-control" name="email" id="email" required>
                    </div>

                    <div class="mb-3">
                        <label for="password" class="form-label">Contraseña</label>
                        <input type="password" class="form-control" name="password" id="password" required>
                    </div>

                    <div class="d-grid gap-2">
                        <button type="submit" class="btn btn-primary">Iniciar sesión</button>
                    </div>
                </form>

                <p class="mt-3 text-center">¿No tienes cuenta? <a href="{{ route('user.create') }}">Regístrate aquí</a></p>
            </div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#login_form').on('submit', function(event) {
                event.preventDefault();
                alert('Iniciando sesion');
                var data = $(this).serialize();
                console.log(data);
                var url = $(this).attr('action');
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
                        alert('Credenciales correctas, iniciando sesión');
                        window.location.href = "{{ route('home') }}";
                    },
                    error: function(error) {
                        console.log(error);
                        alert('Hubo un error al iniciar sesion. Intenta de nuevo.');
                    }
                });
            });
        });
    </script>
</div>
@endsection
