@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Crear Categoría</h1>

        <form action="{{ route('categories.store') }}" method="POST" id="create_categories_form">
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
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#create_categories_form').on('submit', function(event) {
                event.preventDefault();
                alert('ENVIO DE FORMULARIO');
                var data = $(this).serialize();
                console.log(data);
                var url = $(this).attr('action');
                console.log(url);
                $.ajax({
                    type: 'POST',
                    url: url,
                    data: data,
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    success: function(response) {
                        console.log(response);
                        alert('categoria creada con éxito');
                        window.location.href = "{{ route('categories.index') }}";
                    },
                    error: function(error) {
                        console.log(error);
                        alert('Hubo un error al crear la categoria. Intenta de nuevo.');
                    }
                });
            });
        });
    </script>
@endsection
