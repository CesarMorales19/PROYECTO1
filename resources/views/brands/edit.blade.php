@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Editar Marca</h1>

        <form action="{{ route('brands.update', $brand) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="name">Nombre</label>
                <input type="text" name="name" id="name" class="form-control" value="{{ old('name', $brand->name) }}" required>
            </div>

            <div class="form-group">
                <label for="description">Descripción</label>
                <textarea name="description" id="description" class="form-control">{{ old('description', $brand->description) }}</textarea>
            </div>

            <button type="submit" class="btn btn-success mt-3">Actualizar Marca</button>
        </form>
    </div>
@endsection
