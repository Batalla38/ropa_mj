<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
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
            .preview-img {
                width: 120px;
                height: 150px;
                object-fit: cover;
                border-radius: 8px;
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
                        <h6 class="fw-bold">Por favor, corrige los siguientes errores:</h6>
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

                <div class="container mt-2 bg-light rounded shadow-sm p-3">
                    <div class="w-100">
                        <label Skinner for="nombre" class="form-label fw-bold mb-1 text-secondary">Título del Producto</label>
                        <input type="text" class="form-control" id="nombre" name="nombre" placeholder="Ej: Camiseta de Verano" value="{{ old('nombre', $producto->nombre) }}" required>
                    </div>
                </div>

                <div class="container mt-2 bg-light rounded shadow-sm p-3">
                    <div class="w-100">
                        <label for="descripcion" class="form-label fw-bold mb-1 text-secondary">Descripción de la Prenda</label>
                        <textarea class="form-control" id="descripcion" name="descripcion" rows="3" placeholder="Detalles de la prenda..." required>{{ old('descripcion', $producto->descripcion) }}</textarea>
                    </div>
                </div>

                <div class="container mt-2 bg-light rounded shadow-sm p-3">
                    <div class="row">
                        <div class="col-md-6 mb-2 mb-md-0">
                            <label Skinner for="precio" class="form-label fw-bold mb-1 text-secondary">Precio ($)</label>
                            <input type="number" step="any" id="precio" class="form-control" name="precio" placeholder="0.00" value="{{ old('precio', $producto->precio) }}" required>
                        </div>
                        <div class="col-md-6">
                            <label for="stock" class="form-label fw-bold mb-1 text-secondary">Stock Disponible</label>
                            <input type="number" class="form-control" id="stock" name="stock" min="0" placeholder="Ej: 100" value="{{ old('stock', $producto->stock) }}" required>
                        </div>
                    </div>
                </div>

                <div class="container mt-2 bg-light rounded shadow-sm d-flex align-items-center p-3" style="min-height: 50px;">
                    <span class="me-3 text-secondary fw-bold">Género:</span>

                    @php
                        // Convertimos a minúsculas la cadena de la BD para evitar problemas de tipeo (Masculino vs masculino)
                        $generoBD = strtolower($producto->genero ?? '');
                    @endphp

                    <input type="checkbox" class="btn-check" id="masculino" name="genero[]" value="masculino" autocomplete="off"
                        {{ (is_array(old('genero')) && in_array('masculino', old('genero'))) || str_contains($generoBD, 'masculino') ? 'checked' : '' }}>
                    <label class="btn btn-outline-primary me-2" for="masculino">Masculino</label>

                    <input type="checkbox" class="btn-check" id="femenino" name="genero[]" value="femenino" autocomplete="off"
                        {{ (is_array(old('genero')) && in_array('femenino', old('genero'))) || str_contains($generoBD, 'femenino') ? 'checked' : '' }}>
                    <label class="btn btn-outline-primary me-2" for="femenino">Femenino</label>

                    <input type="checkbox" class="btn-check" id="unisex" name="genero[]" value="unisex" autocomplete="off"
                        {{ (is_array(old('genero')) && in_array('unisex', old('genero'))) || str_contains($generoBD, 'unisex') ? 'checked' : '' }}>
                    <label class="btn btn-outline-primary" for="unisex">Unisex</label>
                </div>

                <div class="container mt-2 bg-light rounded shadow-sm d-flex align-items-center p-3" style="min-height: 50px;">
                    <span class="me-3 text-secondary fw-bold">Talles:</span>

                    @php
                        // Separamos los talles guardados por coma en un array limpio
                        $tallesArray = array_map('trim', explode(',', strtolower($producto->talle ?? '')));
                    @endphp

                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="checkbox" id="talleX" name="talle[]" value="X"
                            {{ (is_array(old('talle')) && in_array('X', old('talle'))) || in_array('x', $tallesArray) ? 'checked' : '' }}>
                        <label class="form-check-label fw-bold" for="talleX">X</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="checkbox" id="talleXL" name="talle[]" value="XL"
                            {{ (is_array(old('talle')) && in_array('XL', old('talle'))) || in_array('xl', $tallesArray) ? 'checked' : '' }}>
                        <label class="form-check-label fw-bold" for="talleXL">XL</label>
                    </div>
                </div>

                <div class="container mt-2 bg-light rounded shadow-sm p-3">
                    <label class="form-label fw-bold mb-2 text-secondary d-block">Cambiar foto de la prenda</label>
                    <div class="d-flex flex-column flex-sm-row align-items-start align-items-sm-center gap-3">
                        @if($producto->url_imagen)
                            <img src="{{ asset($producto->url_imagen) }}" class="preview-img border shadow-sm" alt="Foto del producto">
                        @else
                            <div class="bg-secondary text-white rounded d-flex align-items-center justify-content-center preview-img">Sin imagen</div>
                        @endif
                        <div class="w-100">
                            <input type="file" class="form-control" id="url_imagen" name="url_imagen" accept="image/*">
                            <small class="text-muted mt-1 d-block">Deja este espacio en blanco si no deseas reemplazar la imagen actual del producto.</small>
                        </div>
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
