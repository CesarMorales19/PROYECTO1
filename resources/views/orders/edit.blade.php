@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Editar Orden</h1>

        <form action="{{ route('orders.update', $order) }}" method="POST">
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
@endsection
