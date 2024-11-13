@extends('layouts.app')

@section('content')
    <h1>Editar Accesorio</h1>

    <form action="{{ route('accesorios.update', $accesorio->id) }}" method="POST">
        @csrf
        @method('PUT')

        <label for="nombre">Nombre:</label>
        <input type="text" name="nombre" id="nombre" value="{{ $accesorio->nombre }}" required>
        <br>

        <label for="descripcion">Descripción:</label>
        <textarea name="descripcion" id="descripcion" required>{{ $accesorio->descripcion }}</textarea>
        <br>

        <label for="precio">Precio:</label>
        <input type="number" name="precio" id="precio" value="{{ $accesorio->precio }}" step="0.01" required>
        <br>

        <label for="tipo">Tipo:</label>
        <input type="text" name="tipo" id="tipo" value="{{ $accesorio->tipo }}" required>
        <br>

        <button type="submit">Actualizar</button>
    </form>
@endsection
