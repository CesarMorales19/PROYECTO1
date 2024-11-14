@extends('layouts.app')

@section('content')
@include('sweetalert::alert')
    <div class="container">
        <h1 class="text-center mb-4">Elementos de la Orden #{{ $order->id }}</h1>

        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <a href="{{ route('orderitems.create', $order) }}" class="btn btn-primary mb-3">Agregar Elemento</a>

        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Producto</th>
                    <th>Cantidad</th>
                    <th>Precio</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach($orderItems as $orderItem)
                    <tr>
                        <td>{{ $orderItem->product->name }}</td>
                        <td>{{ $orderItem->quantity }}</td>
                        <td>{{ $orderItem->price }}</td>
                        <td>
                            <a href="{{ route('orderitems.edit', [$order->id, $orderItem->id]) }}" class="btn btn-warning btn-sm">Editar</a>
                            <form action="{{ route('orderitems.destroy', [$order, $orderItem]) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm">Eliminar</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <div class="d-flex justify-content-center mt-3">
            <div class="text-center">
                {{ $orderItems->links('pagination::bootstrap-4') }}
            </div>
        </div>
    </div>
@endsection
