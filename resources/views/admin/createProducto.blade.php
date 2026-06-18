<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crear Producto - Ropa MJ</title>
    <link rel="stylesheet" href="{{ asset('vendor/bootstrap/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <style>
        body {
            background-color: #c1a391;
            color: #9f9393;
            background-image: url("{{ asset('bg1.png') }}");
            background-repeat: repeat;
            background-size: 700px;
        }
    </style>
</head>
<body class="d-flex flex-column min-vh-100">

    <div class="mt-4">
        <div class="container">
            @include('header')
        </div>
    </div>

    <main class="container flex-grow-1 d-flex align-items-center justify-content-center py-5">
        <div class="card shadow-sm" style="max-width: 600px; width: 100%;">
            <div class="card-body p-4">
                <h3 class="card-title text-center mb-4 fw-bold text-dark">Cargar Nuevo Producto</h3>

                {{-- Mostrar Errores --}}
                @if ($errors->any())
                    <div class="alert alert-danger alert-dismissible fade show shadow-sm mb-4" role="alert" style="border-radius: 8px;">
                        <strong class="d-block mb-1"><i class="bi bi-exclamation-triangle-fill me-2"></i> No se pudo cargar el producto:</strong>
                        <ul class="mb-0 ps-3">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif

                {{-- Mostrar Éxito --}}
                @if(session('success'))
                    <div class="alert alert-success alert-dismissible fade show fw-bold shadow-sm mb-4" role="alert" style="border-radius: 8px;">
                        <i class="bi bi-check-circle-fill me-2"></i> {{ session('success') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif

                <form action="{{ route('productos.guardar') }}" method="POST" enctype="multipart/form-data">
                    @csrf

                    <div class="mb-3">
                        <label for="nombre" class="form-label fw-semibold">Nombre del Producto</label>
                        <input type="text" class="form-control" id="nombre" name="nombre" value="{{ old('nombre') }}" required>
                    </div>

                    <div class="mb-3">
                        <label for="descripcion" class="form-label fw-semibold">Descripción</label>
                        <textarea class="form-control" id="descripcion" name="descripcion" rows="3" required>{{ old('descripcion') }}</textarea>
                    </div>

                    <div class="mb-3">
                        <label for="precio" class="form-label fw-semibold">Precio</label>
                        <div class="input-group">
                            <span class="input-group-text">$</span>
                            <input type="number" step="any" id="precio" class="form-control" name="precio" value="{{ old('precio') }}" required>
                        </div>
                    </div>

                    <div class="mb-3">
                        <label class="form-label fw-semibold d-block">Género:</label>
                        <input type="checkbox" class="btn-check" id="masculino" name="genero[]" value="Masculino" autocomplete="off">
                        <label class="btn btn-outline-primary btn-sm me-1" for="masculino">Masculino</label>

                        <input type="checkbox" class="btn-check" id="femenino" name="genero[]" value="Femenino" autocomplete="off">
                        <label class="btn btn-outline-primary btn-sm me-1" for="femenino">Femenino</label>

                        <input type="checkbox" class="btn-check" id="unisex" name="genero[]" value="Unisex" autocomplete="off">
                        <label class="btn btn-outline-primary btn-sm" for="unisex">Unisex</label>
                    </div>

                    <div class="mb-3">
                        <label class="form-label fw-semibold d-block">Talles:</label>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="checkbox" id="talleX" name="talle[]" value="X">
                            <label class="form-check-label" for="talleX">X</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="checkbox" id="talleXL" name="talle[]" value="XL">
                            <label class="form-check-label" for="talleXL">XL</label>
                        </div>
                    </div>

                    <div class="mb-3">
                        <label for="stock" class="form-label fw-semibold">Stock</label>
                        <input type="number" class="form-control" id="stock" name="stock" min="0" value="{{ old('stock') }}" required>
                    </div>

                    <div class="mb-4">
                        <label for="url_imagen" class="form-label fw-semibold">Imagen</label>
                        {{-- Se agregó el atributo 'required' --}}
                        <input type="file" class="form-control" id="url_imagen" name="url_imagen" accept="image/*" required>
                    </div>

                    <input type="hidden" name="activo" value="1">

                    <div class="d-grid">
                        <button type="submit" class="btn btn-success btn-lg shadow-sm">Cargar Producto</button>
                    </div>
                </form>
            </div>
        </div>
    </main>

    <div class="mt-auto">
        @include('footer')
    </div>

    <script src="{{ asset('vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
</body>
</html>
