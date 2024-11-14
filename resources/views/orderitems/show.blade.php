@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Detalles del Elemento de la Orden #{{ $order->id }} - Producto: {{ $orderItem->product->name }}</h1>

        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Producto: {{ $orderItem->product->name }}</h5>
                <p class="card-text"><strong>Cantidad:</strong> {{ $orderItem->quantity }}</p>
                <p class="card-text"><strong>Precio:</strong> ${{ number_format($orderItem->price, 2) }}</p>
                <p class="card-text"><strong>Total:</strong> ${{ number_format($orderItem->quantity * $orderItem->price, 2) }}</p>
            </div>
        </div>

        <a href="{{ route('orderitems.index', $order) }}" class="btn btn-primary mt-3">Volver a los Elementos de la Orden</a>
    </div>
@endsection
