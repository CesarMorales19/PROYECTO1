@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Crear Orden</h1>

        <form action="{{ route('orders.store') }}" method="POST">
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
    </div>
@endsection
