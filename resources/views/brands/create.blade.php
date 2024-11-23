@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Crear Marca</h1>

        <form action="{{ route('brands.store') }}" method="POST" id="create_brands_form">
            @csrf
            <div class="form-group">
                <label for="name">Nombre</label>
                <input type="text" name="name" id="name" class="form-control" required>
            </div>

            <div class="form-group">
                <label for="description">Descripción</label>
                <textarea name="description" id="description" class="form-control"></textarea>
            </div>

            <button type="submit" class="btn btn-success mt-3">Crear Marca</button>
        </form>
    </div>

    <meta name="csrf-token" content="{{ csrf_token() }}">

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#create_brands_form').on('submit', function(event) {
                event.preventDefault();
                
                var data = $(this).serialize();
                var url = $(this).attr('action');
                
                $.ajax({
                    type: 'POST',
                    url: url,
                    data: data,
                    success: function(response) {
                        alert('Marca creada con éxito');
                        window.location.href = "{{ route('brands.index') }}";
                    },
                    error: function(error) {
                        alert('Hubo un error al crear la marca. Intenta de nuevo.');
                    }
                });
            });
        });
    </script>
@endsection
