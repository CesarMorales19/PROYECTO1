@extends('layouts.app')
@section('title', 'Listado de usuarios')
@section('styles')
@endsection

@section('content')
@include('sweetalert::alert')
<div class="container mt-5">
    <h1 class="text-center mb-4">User List</h1>
    
    <div class="mb-3 text-right">
        <a href="{{ route('user.create') }}" class="btn btn-success"><i class="fas fa-plus"></i> Add User</a>
    </div>
    
    <table class="table table-striped table-hover">
        <thead class="thead-light">
            <tr>
                <th>Name</th>
                <th class="text-center">Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($usuarios as $usuario)
                <tr>
                    <td>{{ $usuario->name }}</td>
                    <td class="text-center">
                        <a href="{{ route('user.update', $usuario->id) }}" class="btn btn-primary btn-sm"><i class="fas fa-edit"></i> Edit</a>
                        <a href="{{ route('user.destroy', $usuario->id) }}" class="btn btn-danger btn-sm"><i class="fas fa-trash"></i> Delete</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    
    <nav aria-label="Page navigation">
        <ul class="pagination justify-content-center">
            {{ $usuarios->links('pagination::bootstrap-4') }}
        </ul>
    </nav>
</div>
@endsection
