@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>{{ $category->name }}</h1>
        <p><strong>Descripción:</strong> {{ $category->description }}</p>

        <a href="{{ route('categories.edit', $category) }}" class="btn btn-warning">Editar</a>
        <form action="{{ route('categories.destroy', $category) }}" method="POST" style="display:inline;">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger">Eliminar</button>
        </form>

        <a href="{{ route('categories.index') }}" class="btn btn-secondary">Volver al listado</a>
    </div>
@endsection
