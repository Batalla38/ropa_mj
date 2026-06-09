<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <title>Editar Producto - Ropa MJ</title>
        <link rel="stylesheet" href="{{ asset('vendor/bootstrap/css/bootstrap.min.css') }}">
        <script src="{{ asset('vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
        <style>
            body {
                background-color: #c1a391;
                color: #333333;
                background-image: url({{ asset('bg1.png') }});
                background-repeat: repeat;
                background-size: 700px;
            }
            .carousel .carousel-inner {
                height: 520px;
                border: none;
                border-radius: 25px !important;
                box-shadow: 0 10px 20px rgba(0,0,0,0.15);
                overflow: hidden;
                background-color: #a39898;
                backdrop-filter: blur(5px);
                transition: transform 0.3s ease;
                padding: 1px;
            }
        </style>
    </head>

    <body>

        @include('header')

        <div class="container mt-5">
            <h2 class="text-center mb-4 text-dark fw-bold">Panel de Edición Dinámica</h2>

            @if ($errors->any())
                <div class="alert alert-danger shadow-sm rounded-4 mb-4" role="alert">
                    <div class="fw-bold mb-1">⚠️ Por favor, corrige los siguientes errores:</div>
                    <ul class="mb-0 small">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <div class="row">
                <div class="col-md-5 py-3">
                    <div id="productPreviewCarousel" class="carousel slide">
                        <div class="carousel-inner d-flex align-items-center">
                            <div class="carousel-item active">
                                @if($producto->url_imagen)
                                    <img src="{{ asset('images/' . $producto->url_imagen) }}" class="d-block img-fluid w-75 mx-auto rounded-3" alt="Imagen del producto">
                                @else
                                    <img src="{{ asset('images/default.png') }}" class="d-block img-fluid w-75 mx-auto rounded-3" alt="Imagen por defecto">
                                @endif
                            </div>
                        </div>
                    </div>

                    <p class="text-center text-muted small mt-3 fw-semibold">Vista previa de la prenda en base de datos</p>
                </div>

                <div class="col-md-7 py-3">
                    <div class="card border-0 shadow-sm rounded-4 p-3 bg-white">
                        <div class="card-body">

                            <form action="{{ route('productos.update', $producto->id) }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')

                                <div class="mb-3">
                                    <label for="titulo" class="form-label fw-bold text-dark fs-5">Nombre del Producto</label>
                                    <input type="text" class="form-control form-control-lg border-2" id="titulo" name="titulo" value="{{ old('titulo', $producto->nombre) }}" required>
                                </div>

                                <div class="mb-3">
                                    <label for="descripcion" class="form-label fw-bold text-dark fs-5">Descripción de la Prenda</label>
                                    <textarea class="form-control border-2 text-muted" id="descripcion" name="descripcion" rows="3" required>{{ old('descripcion', $producto->descripcion) }}</textarea>
                                </div>

                                <div class="row">
                                    <div class="col-sm-6 mb-3">
                                        <label for="precio" class="form-label fw-bold text-dark fs-5">Precio ($)</label>
                                        <input type="number" step="0.01" class="form-control form-control-lg border-2 text-success fw-bold" id="precio" name="precio" value="{{ old('precio', $producto->precio) }}" required>
                                    </div>

                                    <div class="col-sm-6 mb-3">
                                        <label for="stock" class="form-label fw-bold text-dark fs-5">Stock Disponible</label>
                                        <input type="number" class="form-control form-control-lg border-2 fw-bold" id="stock" name="stock" value="{{ old('stock', $producto->stock) }}" required>
                                    </div>
                                </div>

                                <div class="mb-4 p-3 bg-light rounded-3 border">
                                    <label for="url_imagen" class="form-label fw-bold text-dark">🔄 Reemplazar Imagen del Producto</label>
                                    <input class="form-control" type="file" id="url_imagen" name="url_imagen" accept="image/*">
                                    <div class="form-text text-muted small">Dejar vacío si deseas conservar la imagen actual.</div>
                                </div>

                                <div class="row g-2 pt-2">
                                    <div class="col-sm-8">
                                        <button type="submit" class="btn btn-dark btn-lg w-100 fw-bold">💾 Guardar Cambios</button>
                                    </div>
                                    <div class="col-sm-4">
                                        <a href="{{ route('productos.index') }}" class="btn btn-outline-secondary btn-lg w-100">Cancelar</a>
                                    </div>
                                </div>

                            </form>

                        </div>
                    </div>
                </div>
            </div>
        </div>

        @include('footer')

    </body>
</html>
