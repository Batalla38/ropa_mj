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

                            <h5 class="fw-bold fs-5 mb-2 text-dark">Características:</h5>
                            <p class="card-text mb-1 fs-6"><strong>Material:</strong> Lino de alta calidad</p>
                            <p class="card-text mb-1 fs-6"><strong>Patrón:</strong> Rayas finas (pinstripe) blanco y negro</p>
                            <p class="card-text mb-3 fs-6"><strong>Cuidado:</strong> Lavado a máquina en frío.</p>

                           <form action="{{ route('carrito.agregar', 1) }}" method="POST">
                                @csrf

                                <p class="mb-2 fw-semibold text-dark">Seleccione su talle</p>
                                <div class="row g-2 mb-4">
                                    <div class="col-auto">
                                        <input type="radio" class="btn-check" name="talle" id="tS" value="S" checked>
                                        <label class="btn btn-outline-dark" for="tS">S</label>
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

                                @if(session('success'))
                                    <div class="alert alert-success d-flex align-items-center py-2 px-3 mb-3 rounded-3 shadow-sm" role="alert" style="font-size: 0.9rem; animation: fadeIn 0.5s ease;">
                                        <span class="me-2">✅</span>
                                        <div>
                                            {{ session('success') }}
                                            <a href="{{ route('carrito.ver') }}" class="alert-link text-decoration-underline ms-1 text-success fw-bold">Ver mi carrito</a>
                                        </div>
                                    </div>
                                @endif

                            </form>

                        </div>
                    </div>
                </div>
            </div>
        </div>

        @include('footer')

    </body>
</html>
