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

        <form action="{{ route('orderitems.update', [$order->id, $orderItem->id]) }}" method="POST">
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
@endsection
