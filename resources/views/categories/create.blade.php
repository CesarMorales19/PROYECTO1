@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Crear Categoría</h1>

        <form action="{{ route('categories.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="name">Nombre</label>
                <input type="text" name="name" id="name" class="form-control" required>
            </div>

            <div class="form-group">
                <label for="description">Descripción</label>
                <textarea name="description" id="description" class="form-control"></textarea>
            </div>

            <button type="submit" class="btn btn-success mt-3">Crear Categoría</button>
        </form>
    </div>
@endsection
