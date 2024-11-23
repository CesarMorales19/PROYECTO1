@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Editar Orden</h1>

        <form action="{{ route('orders.update', $order) }}" method="POST" id="edit_orders_form">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="user_id">Usuario</label>
                <select name="user_id" id="user_id" class="form-control" required>
                    <option value="">Seleccione un usuario</option>
                    @foreach($users as $user)
                        <option value="{{ $user->id }}" {{ $user->id == $order->user_id ? 'selected' : '' }}>
                            {{ $user->name }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label for="total">Total</label>
                <input type="number" name="total" id="total" class="form-control" value="{{ old('total', $order->total) }}" required>
            </div>

            <div class="form-group">
                <label for="status">Estado</label>
                <input type="text" name="status" id="status" class="form-control" value="{{ old('status', $order->status) }}" required>
            </div>

            <button type="submit" class="btn btn-success mt-3">Actualizar Orden</button>
        </form>
    </div>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function(){
        $('#edit_orders_form').on('submit', function(event){
            event.preventDefault(); 
            alert('ENVIO DE FORMULARIO');
            let data = $(this).serialize(); 
            console.log(data);
            let url = $(this).attr('action'); 
            console.log(url);
            data += '&_method=PUT';
            $.ajax({
                type: 'POST',
                url: url,
                data: data,
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') 
                },
                success: function(response){
                    console.log(response);
                    alert('orden actualizada correctamente');
                    window.location.href = "{{ route('orders.index') }}"; 
                },
                error: function(error){
                    console.error(error);
                    alert('Ocurrió un error al actualizar la orden.');
                }
            });
        });
    });
</script>
@endsection
