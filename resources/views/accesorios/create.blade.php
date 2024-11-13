@extends('layouts.app')

@section('content')
    <h1>Crear Nuevo Accesorio</h1>

    <form action="{{ route('accesorios.store') }}" method="POST">
        @csrf
        <label for="nombre">Nombre:</label>
        <input type="text" name="nombre" id="nombre" required>
        <br>

        <label for="descripcion">Descripción:</label>
        <textarea name="descripcion" id="descripcion" required></textarea>
        <br>

        <label for="precio">Precio:</label>
        <input type="number" name="precio" id="precio" required>
        <br>

        <label for="tipo">Tipo:</label>
        <input type="text" name="tipo" id="tipo" required>
        <br>

        <button type="submit">Guardar</button>
    </form>
@endsection