<!DOCTYPE html>
<html>
    <head>
        <title>Editar Producto - Ropa MJ</title>
        <link rel="stylesheet" href="{{ asset('vendor/bootstrap/css/bootstrap.min.css') }}">
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
    <body>
        <div class="container-fluid bg-light py-4 border-bottom">
            <div class="container">
                @include('header')
            </div>
        </div>

        <div class="container mt-5 pt-2 mb-5">

            <form action="{{ route('productos.update', $producto->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                @if ($errors->any())
                    <div class="alert alert-danger my-3 shadow-sm rounded-3">
                        <ul class="mb-0 text-start">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                @if(session('success'))
                    <div class="alert alert-success my-3 text-center fw-bold shadow-sm">
                        {{ session('success') }}
                    </div>
                @endif

                <div class="container mt-2 bg-light rounded shadow-sm d-flex align-items-center p-2">
                    <div class="w-100">
                        <label for="nombre" class="form-label fw-bold mb-1">Nombre del Producto</label>
                        <input type="text" class="form-control" id="nombre" name="nombre" placeholder="Ej: Campera de Jean" value="{{ old('nombre', $producto->nombre) }}" required>
                    </div>
                </div>

                <div class="container mt-2 bg-light rounded shadow-sm d-flex align-items-center p-2">
                    <div class="w-100">
                        <label for="descripcion" class="form-label fw-bold mb-1">Descripción</label>
                        <textarea class="form-control" id="descripcion" name="descripcion" rows="3" placeholder="Detalles del producto..." required>{{ old('descripcion', $producto->descripcion) }}</textarea>
                    </div>
                </div>

                <div class="container mt-2 bg-light rounded shadow-sm d-flex align-items-center p-2">
                    <div class="w-100">
                        <label for="precio" class="form-label fw-bold mb-1">Precio</label>
                        <div class="input-group">
                            <span class="input-group-text">$</span>
                            <input type="number" step="any" id="precio" class="form-control" name="precio" placeholder="0.00" value="{{ old('precio', $producto->precio) }}" required>
                        </div>
                    </div>
                </div>

                <div class="container mt-2 bg-light rounded shadow-sm d-flex align-items-center p-2" style="min-height: 50px;">
                    <span class="me-3 text-secondary fw-bold">Género:</span>

                    <input type="checkbox" class="btn-check" id="masculino" name="genero[]" value="Masculino" autocomplete="off"
                        {{ str_contains($producto->genero, 'Masculino') ? 'checked' : '' }}>
                    <label class="btn btn-outline-primary me-2" for="masculino">Masculino</label>

                    <input type="checkbox" class="btn-check" id="femenino" name="genero[]" value="Femenino" autocomplete="off"
                        {{ str_contains($producto->genero, 'Femenino') ? 'checked' : '' }}>
                    <label class="btn btn-outline-primary me-2" for="femenino">Femenino</label>

                    <input type="checkbox" class="btn-check" id="unisex" name="genero[]" value="Unisex" autocomplete="off"
                        {{ str_contains($producto->genero, 'Unisex') ? 'checked' : '' }}>
                    <label class="btn btn-outline-primary" for="unisex">Unisex</label>
                </div>

                <div class="container mt-2 bg-light rounded shadow-sm d-flex align-items-center p-2" style="min-height: 50px;">
                    <span class="me-3 text-secondary fw-bold">Talles:</span>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="checkbox" id="talleX" name="talle[]" value="X"
                            {{ str_contains($producto->talle, 'X') && !str_contains($producto->talle, 'XL') ? 'checked' : '' }}>
                        <label class="form-check-label" for="talleX">X</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="checkbox" id="talleXL" name="talle[]" value="XL"
                            {{ str_contains($producto->talle, 'XL') ? 'checked' : '' }}>
                        <label class="form-check-label" for="talleXL">XL</label>
                    </div>
                </div>

                <div class="container mt-2 bg-light rounded shadow-sm d-flex align-items-center p-2">
                    <div class="w-100">
                        <label for="stock" class="form-label fw-bold mb-1">Stock</label>
                        <input type="number" class="form-control" id="stock" name="stock" min="0" placeholder="Ej: 15" value="{{ old('stock', $producto->stock) }}" required>
                    </div>
                </div>

                <div class="container mt-2 bg-light rounded shadow-sm p-2">
                    <div class="w-100">
                        <label for="url_imagen" class="form-label fw-bold mb-1">Imagen del Producto</label>
                        <div class="d-flex align-items-center gap-3 mb-2">
                            <img src="{{ asset($producto->url_imagen) }}" width="60" height="60" class="rounded object-fit-cover border shadow-sm" alt="Miniatura actual">
                            <small class="text-muted">Imagen actual guardada. Subí un archivo nuevo solo si querés cambiarla.</small>
                        </div>
                        <input type="file" class="form-control" id="url_imagen" name="url_imagen" accept="image/*">
                    </div>
                </div>

                <div class="container mt-4 text-center">
                    <a href="{{ route('productos.index') }}" class="btn btn-secondary btn-lg px-4 me-2 shadow-sm">Cancelar</a>
                    <button type="submit" class="btn btn-success btn-lg px-5 shadow">Guardar Cambios</button>
                </div>
            </form>

        </div>

        <script src="{{ asset('vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
        <div class="mt-3">
            @include('footer')
        </div>
    </body>
</html>
