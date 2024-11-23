<!-- resources/views/categories/edit.blade.php -->

@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Editar Categoría</h1>

        <form action="{{ route('categories.update', $category) }}" method="POST" id="edit_categories_form">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="name">Nombre</label>
                <input type="text" name="name" id="name" class="form-control" value="{{ old('name', $category->name) }}" required>
            </div>

            <div class="form-group">
                <label for="description">Descripción</label>
                <textarea name="description" id="description" class="form-control">{{ old('description', $category->description) }}</textarea>
            </div>

            <button type="submit" class="btn btn-success mt-3">Actualizar Categoría</button>
        </form>
    </div>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function(){
        $('#edit_categories_form').on('submit', function(event){
            event.preventDefault(); 
            alert('ENVIO DE FORMULARIO');
            let data = $(this).serialize(); 
            console.log(data);
            let url = $(this).attr('action'); 
            console.log(url);
            data += '&_method=PUT';
            $.ajax({
                type: 'POST',
                url: url,
                data: data,
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') 
                },
                success: function(response){
                    console.log(response);
                    alert('categoria actualizada correctamente');
                    window.location.href = "{{ route('categories.index') }}"; 
                },
                error: function(error){
                    console.error(error);
                    alert('Ocurrió un error al actualizar la categoria.');
                }
            });
        });
    });
</script>
@endsection
