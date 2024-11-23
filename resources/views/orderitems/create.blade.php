@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Agregar Elemento a la Orden #{{ $order->id }}</h1>

        <form action="{{ route('orderitems.store', $order) }}" method="POST" id="create_orderitems_form">
            @csrf

            <div class="form-group">
                <label for="product_id">Producto</label>
                <select name="product_id" id="product_id" class="form-control" required>
                    <option value="">Seleccione un producto</option>
                    @foreach($products as $product)
                        <option value="{{ $product->id }}">{{ $product->name }}</option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label for="quantity">Cantidad</label>
                <input type="number" name="quantity" id="quantity" class="form-control" required min="1">
            </div>

            <div class="form-group">
                <label for="price">Precio</label>
                <input type="number" name="price" id="price" class="form-control" required step="0.01">
            </div>

            <button type="submit" class="btn btn-success mt-3">Agregar Elemento</button>
        </form>
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#create_orderitems_form').on('submit', function(event) {
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
                        alert('items creados con éxito');
                        window.location.href = "{{ route('orderitems.index') }}";
                    },
                    error: function(error) {
                        console.log(error);
                        alert('Hubo un error al crear los items. Intenta de nuevo.');
                    }
                });
            });
        });
    </script>
    </div>
@endsection
