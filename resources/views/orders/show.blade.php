@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Detalles de la Orden</h1>
        <p><strong>Usuario:</strong> {{ $order->user->name }}</p>
        <p><strong>Total:</strong> {{ $order->total }}</p>
        <p><strong>Estado:</strong> {{ $order->status }}</p>

        <h3>Elementos de la Orden</h3>
        <ul>
            @foreach($order->items as $item)
                <li>{{ $item->product->name }} - {{ $item->quantity }} x {{ $item->price }}</li>
            @endforeach
        </ul>

        <a href="{{ route('orders.index') }}" class="btn btn-secondary">Volver al listado</a>
    </div>
@endsection
