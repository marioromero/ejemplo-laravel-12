<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Ejemplo</title>
    <link rel="stylesheet" href="{{ asset('css/bootstrap.css') }}">
</head>
<body>

<!-- muestra mensaje de éxito si se completó la acción correctamente -->
@if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>

    <!-- muestra mensaje de error si no se pudo completar la acción -->
@elseif(session('error'))
    <div class="alert alert-danger">
        {{ session('error') }}
    </div>
@endif

<!-- muestra errores de validación si los hay -->
@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<!-- menu responsivo boottrap con enlaces hacia modulo de categorías y productos -->
<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container-fluid">
        <a class="navbar-brand" href="#">Ejemplo</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="{{ route('categories') }}">Categorías</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('products') }}">Productos</a>
                </li>
            </ul>
        </div>
    </div>
</nav>

<div class="container">
    <!-- aquí va el contenido que se va a mostrar en cada página -->
    @yield('content')
</div>


<script src="{{ asset("js/bootstrap.js") }}"></script>
</body>
</html>
