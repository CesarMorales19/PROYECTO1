@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Crear Orden</h1>

        <form action="{{ route('orders.store') }}" method="POST" id="create_orders_form">
            @csrf
            <div class="form-group">
                <label for="user_id">Usuario</label>
                <select name="user_id" id="user_id" class="form-control" required>
                    <option value="">Seleccione un usuario</option>
                    @foreach($users as $user)
                        <option value="{{ $user->id }}">{{ $user->name }}</option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label for="total">Total</label>
                <input type="number" name="total" id="total" class="form-control" required>
            </div>

            <div class="form-group">
                <label for="status">Estado</label>
                <input type="text" name="status" id="status" class="form-control" required>
            </div>

            <button type="submit" class="btn btn-success mt-3">Crear Orden</button>
        </form>
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#create_orders_form').on('submit', function(event) {
                event.preventDefault();
                alert('ENVIO DE FORMULARIO');
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
                        alert('orden creada con éxito');
                        window.location.href = "{{ route('orders.index') }}";
                    },
                    error: function(error) {
                        console.log(error);
                        alert('Hubo un error al crear la orden. Intenta de nuevo.');
                    }
                });
            });
        });
    </script>
    </div>
@endsection
