@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>Editar Elemento de la Orden</h2>

        <!-- Mostrar los errores de validación -->
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('orderitems.update', [$order->id, $orderItem->id]) }}" method="POST" id="edit_orderitems_form">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label for="product_id">Producto</label>
                <select name="product_id" id="product_id" class="form-control" required>
                    <option value="">Selecciona un producto</option>
                    @foreach($products as $product)
                        <option value="{{ $product->id }}" 
                            {{ $orderItem->product_id == $product->id ? 'selected' : '' }}>
                            {{ $product->name }} - ${{ $product->price }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label for="quantity">Cantidad</label>
                <input type="number" name="quantity" id="quantity" class="form-control" value="{{ old('quantity', $orderItem->quantity) }}" min="1" required>
            </div>

            <div class="form-group">
                <label for="price">Precio</label>
                <input type="number" name="price" id="price" class="form-control" value="{{ old('price', $orderItem->price) }}" step="0.01" required>
            </div>

            <button type="submit" class="btn btn-primary">Actualizar Elemento</button>
            <a href="{{ route('orderitems.index', $order) }}" class="btn btn-secondary">Cancelar</a>
        </form>
    </div>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function(){
        $('#edit_orderitems_form').on('submit', function(event){
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
                    alert('item actualizado correctamente');
                    window.location.href = "{{ route('orderitems.index') }}"; 
                },
                error: function(error){
                    console.error(error);
                    alert('Ocurrió un error al actualizar el item.');
                }
            });
        });
    });
</script>
@endsection
