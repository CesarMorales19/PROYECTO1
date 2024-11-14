@extends('layouts.app')

@section('content')
@include('sweetalert::alert')
    <div class="container">
        <h1 class="text-center mb-4">Listado de Marcas</h1>
        <a href="{{ route('brands.create') }}" class="btn btn-primary mb-3">Crear Marca</a>

        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Nombre</th>
                    <th>Descripción</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach($brands as $brand)
                    <tr>
                        <td>{{ $brand->name }}</td>
                        <td>{{ $brand->description }}</td>
                        <td>
                            <a href="{{ route('brands.show', $brand) }}" class="btn btn-info btn-sm">Ver</a>
                            <a href="{{ route('brands.edit', $brand) }}" class="btn btn-warning btn-sm">Editar</a>
                            <form action="{{ route('brands.destroy', $brand) }}" method="POST" style="display:inline;">
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
                {{ $brands->links('pagination::bootstrap-4') }}
            </div>
        </div>
    </div>
@endsection
