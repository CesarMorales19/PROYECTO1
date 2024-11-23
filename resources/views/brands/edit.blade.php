@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Editar Marca</h1>

        <form action="{{ route('brands.update', $brand) }}" method="POST" id="edit_brands_form">
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
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function(){
        $('#edit_brands_form').on('submit', function(event){
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
                    alert('marca actualizada correctamente');
                    window.location.href = "{{ route('brands.index') }}"; 
                },
                error: function(error){
                    console.error(error);
                    alert('Ocurrió un error al actualizar la marca.');
                }
            });
        });
    });
</script>
@endsection
