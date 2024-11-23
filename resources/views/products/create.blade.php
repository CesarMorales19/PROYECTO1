@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Crear Producto</h1>

        <form action="{{ route('products.store') }}" method="POST" id="create_products_form">
            @csrf
            <div class="form-group">
                <label for="name">Nombre</label>
                <input type="text" name="name" id="name" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="description">Descripción</label>
                <textarea name="description" id="description" class="form-control" required></textarea>
            </div>
            <div class="form-group">
                <label for="price">Precio</label>
                <input type="number" name="price" id="price" class="form-control" required step="0.01">
            </div>
            <div class="form-group">
                <label for="category_id">Categoría</label>
                <select name="category_id" id="category_id" class="form-control" required>
                    @foreach ($categories as $category)
                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="brand_id">Marca</label>
                <select name="brand_id" id="brand_id" class="form-control" required>
                    @foreach ($brands as $brand)
                        <option value="{{ $brand->id }}">{{ $brand->name }}</option>
                    @endforeach
                </select>
            </div>
            <button type="submit" class="btn btn-primary mt-3">Guardar</button>
        </form>
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#create_products_form').on('submit', function(event) {
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
                        alert('producto creado con éxito');
                        window.location.href = "{{ route('products.index') }}";
                    },
                    error: function(error) {
                        console.log(error);
                        alert('Hubo un error al crear el producto. Intenta de nuevo.');
                    }
                });
            });
        });
    </script>
    </div>
@endsection
