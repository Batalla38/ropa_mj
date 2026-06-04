<!DOCTYPE html>
<html>
    <head>
        <title>Gestión de Consultas</title>
        <link rel="stylesheet" href="{{ asset('vendor/bootstrap/css/bootstrap.min.css') }}">
        <style>
            body {
                background-color: #c1a391;
                color: #9f9393;
                background-image: url(bg1.png);
                background-repeat: repeat;
                background-size: 700px;
            }
        </style>
    </head>
    <body>
        <div class="container-fluid bg-light py-4 border-bottom">
            <div class="container">
                @include('header')
            </div>
        </div>

        <div class="container mt-5 pt-2 mb-5">

        </div>

<form action="{{ route('productos.guardar') }}" method="POST" enctype="multipart/form-data">
    @csrf

    @if(session('success'))
        <div class="alert alert-success my-3 text-center fw-bold shadow-sm">
            {{ session('success') }}
        </div>
    @endif

    <div class="container mt-2 bg-light rounded shadow-sm d-flex align-items-center p-2">
        <div class="w-100">
            <label for="titulo" class="form-label fw-bold mb-1">Título</label>
            <input type="text" class="form-control" id="titulo" name="titulo" placeholder="Ej: Campera de Jean" required>
        </div>
    </div>

    <div class="container mt-2 bg-light rounded shadow-sm d-flex align-items-center p-2">
        <div class="w-100">
            <label for="descripcion" class="form-label fw-bold mb-1">Descripción</label>
            <textarea class="form-control" id="descripcion" name="descripcion" rows="3" placeholder="Detalles del producto..." required></textarea>
        </div>
    </div>

    <div class="container mt-2 bg-light rounded shadow-sm d-flex align-items-center p-2">
        <div class="w-100">
            <label for="precio" class="form-label fw-bold mb-1">Precio</label>
            <div class="input-group">
                <span class="input-group-text">$</span>
                <input type="number" step="any" id="precio" class="form-control" name="precio" placeholder="0.00" required>
            </div>
        </div>
    </div>

    <div class="container mt-2 bg-light rounded shadow-sm d-flex align-items-center p-2" style="min-height: 50px;">
        <span class="me-3 text-secondary fw-bold">Género:</span>
        <input type="checkbox" class="btn-check" id="masculino" name="generos[]" value="masculino" autocomplete="off">
        <label class="btn btn-outline-primary me-2" for="masculino">Masculino</label>

        <input type="checkbox" class="btn-check" id="femenino" name="generos[]" value="femenino" autocomplete="off">
        <label class="btn btn-outline-primary me-2" for="femenino">Femenino</label>

        <input type="checkbox" class="btn-check" id="nino" name="generos[]" value="nino" autocomplete="off">
        <label class="btn btn-outline-primary" for="nino">Niño</label>
    </div>

    <div class="container mt-2 bg-light rounded shadow-sm d-flex align-items-center p-2" style="min-height: 50px;">
        <span class="me-3 text-secondary fw-bold">Talles:</span>
        <div class="form-check form-check-inline">
            <input class="form-check-input" type="checkbox" id="talleX" name="talles[]" value="X">
            <label class="form-check-label" for="talleX">X</label>
        </div>
        <div class="form-check form-check-inline">
            <input class="form-check-input" type="checkbox" id="talleXL" name="talles[]" value="XL">
            <label class="form-check-label" for="talleXL">XL</label>
        </div>
    </div>

    <div class="container mt-2 bg-light rounded shadow-sm d-flex align-items-center p-2">
        <div class="w-100">
            <label for="stock" class="form-label fw-bold mb-1">Stock</label>
            <input type="number" class="form-control" id="stock" name="stock" min="0" placeholder="Ej: 15" required>
        </div>
    </div>

    <div class="container mt-2 bg-light rounded shadow-sm d-flex align-items-center p-2">
        <div class="w-100">
            <label for="url_imagen" class="form-label fw-bold mb-1">Imagen</label>
            <input type="file" class="form-control" id="url_imagen" name="url_imagen" accept="image/*">
        </div>
    </div>

    <input type="hidden" name="activo" value="1">

    <div class="container mt-4 text-center">
        <button type="submit" class="btn btn-success btn-lg px-5 shadow">Cargar Producto</button>
    </div>
</form>

        </div>

        <script src="{{ asset('vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
        <div class="mt-3">
            @include('footer') </div>
    </body>
</html>
