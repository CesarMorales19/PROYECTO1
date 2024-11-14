@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Detalles del Producto: {{ $product->name }}</h1>
        <p><strong>Descripción:</strong> {{ $product->description }}</p>
        <p><strong>Precio:</strong> {{ $product->price }}</p>
        <p><strong>Categoría:</strong> {{ $product->category->name }}</p>
        <p><strong>Marca:</strong> {{ $product->brand->name }}</p>

        <a href="{{ route('products.index') }}" class="btn btn-secondary">Volver</a>
    </div>
@endsection
