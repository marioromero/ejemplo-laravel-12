@extends('layout')
@section('content')
    <h1>Categorias</h1>
    <!-- Crea un formulario bootstrap para agregar una nueva categoría, sólo tiene un nombre -->
    <form action="{{ route('categories.store') }}" method="POST" class="mb-3">
        @csrf
        <div class="mb-3">
            <label for="name" class="form-label">Nombre de la categoría</label>
            <input type="text" class="form-control" id="name" name="name" required>
        </div>
        <button type="submit" class="btn btn-primary">Agregar categoría</button>
    </form>

    <!-- Mostrar las categorias en una tabla botstrap  -->
    <table class="table table-striped">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Descripción</th>
            </tr>
        </thead>
        <tbody>
            @foreach($categories as $category)
                <tr>
                    <td>{{ $category->id }}</td>
                    <td>{{ $category->name }}</td>
                    <!-- opción para eliminar una categoría -->
                    <td>
                        <form action="{{ route('categories.destroy', $category->id) }}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm">Eliminar</button>
                        </form>
                </tr>
            @endforeach
        </tbody>
@endsection
