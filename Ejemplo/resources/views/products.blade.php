@extends('layout')
@section('content')
    <h1>Productos</h1>
    <!-- Crea un formulario bootstrap para agregar un nuevo producto, tiene un name, precio y category_id, las categoprías deben ser cargadas por la vista -->
    <form action="{{ route('products.store') }}" method="POST" class="mb-3">
        @csrf
        <div class="mb-3">
            <label for="name" class="form-label">Nombre del producto</label>
            <input type="text" class="form-control" id="name" name="name" required>
        </div>
        <div class="mb-3">
            <label for="precio" class="form-label">Precio</label>
            <input type="number" class="form-control" id="price" name="precio" required>
        </div>
        <div class="mb-3">
            <label for="category_id" class="form-label
            ">Categoría</label>
            <select class="form-select" id="category_id" name="category_id" required>
                <option value="">Seleccione una categoría</option>
                @foreach($categories as $category)
                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                @endforeach
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Agregar producto</button>
    </form>

    <!-- Mostrar los productos en una tabla bootstrap -->
    <table class="table table-striped">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Precio</th>
                <th>Categoría</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach($products as $product)
                <tr>
                    <td>{{ $product->id }}</td>
                    <td>{{ $product->name }}</td>
                    <td>{{ $product->price }}</td>
                    <td>{{ $product->category->name ?? 'Sin categoría' }}</td>
                    <!-- opción para eliminar un producto -->
                    <td>
                        <form action="{{ route('products.destroy', $product->id) }}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm">Eliminar</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

@endsection

