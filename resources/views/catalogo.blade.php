<!DOCTYPE html>
<html>
<head>
    <title>Ropa MJ - Catálogo</title>
    <link rel="stylesheet" href="{{ asset('vendor/bootstrap/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <style>
        body {
            background-color: #c1a391;
            background-image: url("{{ asset('bg1.png') }}");
            background-repeat: repeat;
            background-size: 700px;
        }

        .card-animada {
            transition: transform 0.3s ease-in-out, box-shadow 0.3s ease-in-out;
            cursor: pointer;
        }

        .card-animada:hover {
            transform: scale(1.02);
            z-index: 10;
            box-shadow: 0 10px 20px rgba(0,0,0,0.2) !important;
        }

        .card {
            border: none;
            border-radius: 25px !important;
            box-shadow: 0 10px 20px rgba(0,0,0,0.15);
            overflow: hidden;
            background-color: #efefef;
        }

        /* Contenedor fijo para que la imagen estática mantenga proporciones impecables */
        .img-container-custom {
            height: 350px;
            width: 100%;
            overflow: hidden;
            border-top-left-radius: 25px;
            border-top-right-radius: 25px;
        }

        .card-img-custom {
            object-fit: cover;
            height: 100%;
            width: 100%;
        }

        /* Estilos estéticos para los radio buttons de los talles */
        .talle-box input[type="radio"] {
            display: none;
        }

        .talle-box label {
            display: inline-block;
            padding: 8px 15px;
            background-color: #f8f9fa;
            border: 2px solid #dee2e6;
            border-radius: 8px;
            cursor: pointer;
            font-weight: bold;
            transition: all 0.2s ease;
            color: #333;
        }

        .talle-box input[type="radio"]:checked + label {
            background-color: #212529;
            color: #fff;
            border-color: #212529;
        }
    </style>
</head>

<body>

    @if(session('exito'))
        <div style="position: fixed; top: 20px; left: 50%; transform: translateX(-50%); width: 90%; max-width: 600px; z-index: 9999;">
            <div class="alert alert-success alert-dismissible fade show shadow-lg border-0 p-3" role="alert" style="border-radius: 15px; background-color: #d1e7dd; color: #0f5132;">
                <div class="d-flex align-items-center">
                    <i class="bi bi-check-circle-fill fs-4 me-3"></i>
                    <div>
                        <strong class="fs-5">¡Excelente!</strong><br>
                        {{ session('exito') }}
                    </div>
                </div>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close" style="top: 22px;"></button>
            </div>
        </div>
    @endif
    <div class="container mt-3 mb-4">
        @include('header')
    </div>

    <div class="container-fluid py-4" style="margin-top: 140px !important;">
        <form action="{{ route('catalogo.index') }}" method="GET">
            <div class="row">

                <div class="col-md-3">
                    <div class="sticky-top mb-4" style="top: 20px; z-index: 100;">

                        <div class="p-4 bg-white shadow-sm border rounded mb-3">
                            <h5 class="fw-bold mb-3 text-dark">Género</h5>
                            <select name="genero" class="form-select" onchange="this.form.submit()">
                                <option value="Todos" {{ request('genero') == 'Todos' ? 'selected' : '' }}>Todos los productos</option>
                                <option value="Masculino" {{ request('genero') == 'Masculino' ? 'selected' : '' }}>Hombre</option>
                                <option value="Femenino" {{ request('genero') == 'Femenino' ? 'selected' : '' }}>Mujer</option>
                                <option value="Unisex" {{ request('genero') == 'Unisex' ? 'selected' : '' }}>Unisex</option>
                            </select>
                        </div>

                        <div class="p-4 bg-white shadow-sm border rounded mb-3">
                            <h6 class="fw-bold mb-3 text-dark">Seleccionar Talle</h6>
                            <div class="d-flex flex-wrap gap-2 talle-box">

                                <input type="radio" name="talle" id="talle_all" value="" {{ !request('talle') ? 'checked' : '' }} onchange="this.form.submit()">
                                <label工作 for="talle_all">Todos</label>

                                <input type="radio" name="talle" id="talle_x" value="X" {{ request('talle') == 'X' ? 'checked' : '' }} onchange="this.form.submit()">
                                <label for="talle_x">X</label>

                                <input type="radio" name="talle" id="talle_xl" value="XL" {{ request('talle') == 'XL' ? 'checked' : '' }} onchange="this.form.submit()">
                                <label for="talle_xl">XL</label>

                            </div>
                        </div>

                        <a href="{{ route('catalogo.index') }}" class="btn btn-outline-secondary w-100 rounded-pill py-2">Limpiar Filtros</a>
                    </div>
                </div>

                <div class="col-md-9">
                    <div class="row g-4 mb-5">

                        @forelse($productos as $producto)
                            <div class="col-md-4">
                                <div class="card h-100 shadow-sm border-0 card-animada">

                                    <div class="img-container-custom" onclick="window.location.href='{{ route('producto.show', $producto->id) }}'">
                                        <img src="{{ asset($producto->url_imagen) }}" class="card-img-custom" alt="{{ $producto->nombre }}">
                                    </div>

                                    <div class="card-body text-center mt-2" onclick="window.location.href='{{ route('producto.show', $producto->id) }}'">
                                        <h5 class="text-dark fw-bold mb-1">{{ $producto->nombre }}</h5>
                                        <p class="text-muted small mb-1">Talles: <span class="badge bg-secondary">{{ $producto->talle }}</span></p>
                                        <p class="text-black fw-bold fs-5 mb-0">${{ number_format($producto->precio, 0, ',', '.') }}</p>
                                    </div>

                                    <div class="p-3 pt-0">
                                        <form action="{{ route('carrito.agregar', $producto->id) }}" method="POST">
                                            @csrf
                                            <button type="submit" class="btn btn-primary w-100 fw-bold rounded-pill shadow-sm py-2">
                                                <i class="bi bi-cart-plus-fill me-2"></i>Agregar al Carrito
                                            </button>
                                        </form>
                                    </div>

                                </div>
                            </div>
                        @empty
                            <div class="col-12 text-center py-5">
                                <div class="p-5 bg-white border rounded rounded-4 shadow-sm">
                                    <h4 class="text-dark fw-bold">No se encontraron productos</h4>
                                    <p class="text-muted">Prueba cambiando los filtros seleccionados o limpia la búsqueda.</p>
                                </div>
                            </div>
                        @endforelse

                    </div>
                </div>

            </div>
        </form>
    </div>

    <div class="mt-3">
        @include('footer')
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>