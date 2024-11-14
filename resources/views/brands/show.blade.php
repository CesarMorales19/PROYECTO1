@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>{{ $brand->name }}</h1>
        <p><strong>Descripción:</strong> {{ $brand->description }}</p>

        <a href="{{ route('brands.edit', $brand) }}" class="btn btn-warning">Editar</a>
        <form action="{{ route('brands.destroy', $brand) }}" method="POST" style="display:inline;">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger">Eliminar</button>
        </form>

        <a href="{{ route('brands.index') }}" class="btn btn-secondary">Volver al listado</a>
    </div>
@endsection
