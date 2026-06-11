<link rel="stylesheet" href="{{ asset('vendor/bootstrap/css/bootstrap.min.css') }}">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
<script src="{{ asset('vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script> ```


<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <title>{{ $producto->nombre }} - Ropa MJ</title>
        <link rel="stylesheet" href="{{ asset('vendor/bootstrap/css/bootstrap.min.css') }}">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
        <style>
            body {
                background-color: #c1a391;
                color: #333333;
                background-image: url({{ asset('bg1.png') }});
                background-repeat: repeat;
                background-size: 700px;
            }
            .carousel .carousel-inner {
                height: 550px;
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

        <div class="container pt-5 mt-4">
    {{-- Si viene por sesión o si viene el "check" en la URL, mostramos el cartel --}}
    @if(session('success') || request()->get('check') == 1)
        <div class="alert alert-success alert-dismissible fade show text-center fw-bold shadow-sm" role="alert">
            <i class="bi bi-cart-plus-fill me-2"></i> ¡Excelente! Producto agregado al carrito.
            <a href="{{ route('carrito.ver') }}" class="alert-link text-decoration-underline ms-2 text-success">Ver mi carrito →</a>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    @if($errors->has('stock_error'))
        <div class="alert alert-warning alert-dismissible fade show fw-bold shadow-sm" role="alert">
            <i class="bi bi-exclamation-diamond-fill me-2"></i> {{ $errors->first('stock_error') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif
</div>

        <div class="container mt-2">
            <h2 class="text-center mb-4 text-dark fw-bold">Detalle del Producto</h2>
            <div class="row">

                <div id="carouselExampleIndicators" class="col-md-6 py-3 carousel slide">
                    <div class="carousel-indicators">
                        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
                    </div>
                    <div class="carousel-inner d-flex align-items-center">
                        <div class="carousel-item active">
                            @if($producto->url_imagen)
                                <img src="{{ asset($producto->url_imagen) }}" class="d-block img-fluid w-75 mx-auto rounded-3" alt="{{ $producto->nombre }}">
                            @else
                                <img src="{{ asset('images/default.png') }}" class="d-block img-fluid w-75 mx-auto rounded-3" alt="Imagen no disponible">
                            @endif
                        </div>
                        
                        <div class="carousel-item">
                            @if($producto->url_imagen)
                                <img src="{{ asset($producto->url_imagen) }}" class="d-block img-fluid w-75 mx-auto rounded-3" style="filter: brightness(0.9);" alt="Vista alternativa">
                            @else
                                <img src="{{ asset('images/default.png') }}" class="d-block img-fluid w-75 mx-auto rounded-3" alt="Imagen no disponible">
                            @endif
                        </div>
                    </div>
                    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Previous</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Next</span>
                    </button>
                </div>

                <div class="col-md-6 py-3">
                    <div class="card border-0 shadow-sm rounded-4 p-2 bg-white">
                        <div class="card-body">
                            <h5 class="card-title fw-bold fs-1 text-dark">{{ $producto->nombre }}</h5>

                            <p class="card-text text-muted fs-5">{{ $producto->descripcion ?? 'Esta prenda no cuenta con una descripción detallada todavía.' }}</p>

                            <h5 class="card-title fw-bold fs-2 text-success my-3">
                                ${{ number_format($producto->precio, 0, ',', '.') }}
                            </h5>

                            <div class="mb-4">
                                <p class="text-muted small fs-6 mb-2">Medios de pago aceptados:</p>
                                <div class="d-flex flex-wrap gap-2 align-items-center">
                                    <img src="{{ asset('visa-logo.png') }}" alt="Visa" style="height: 30px;">
                                    <img src="{{ asset('Mastercard-logo.png') }}" alt="mastercard" style="height: 30px;">
                                    <img src="{{ asset('Logo_Naranja.png') }}" alt="naranja" style="height: 30px;">
                                    <img src="{{ asset('logo_mp.png') }}" alt="MP" style="height: 30px;">
                                </div>
                            </div>

                            <h5 class="fw-bold fs-5 mb-2 text-dark">Características Técnicas:</h5>
                            <p class="card-text mb-1 fs-6"><strong>Género:</strong> {{ ucfirst($producto->genero ?? 'Unisex') }}</p>
                            <p class="card-text mb-1 fs-6"><strong>Talle disponible:</strong> {{ $producto->talle ?? 'Único / No especificado' }}</p>
                            <p class="card-text mb-3 fs-6"><strong>Disponibilidad:</strong> En stock ({{ $producto->stock }} unidades)</p>

                            <form action="{{ route('carrito.agregar', $producto->id) }}" method="POST">
                                @csrf

                                <p class="mb-2 fw-semibold text-dark">Talle seleccionado</p>
                                <div class="row g-2 mb-4">
                                    <div class="col-auto">
                                        <input type="radio" class="btn-check" name="talle" id="talleUnico" value="{{ $producto->talle ?? 'Único' }}" checked>
                                        <label class="btn btn-outline-dark px-4" for="talleUnico">{{ $producto->talle ?? 'Único' }}</label>
                                    </div>
                                </div>

                                <div class="d-flex align-items-center gap-3 mb-4">
                                    <span class="fw-semibold text-dark">Cantidad:</span>
                                    <div class="input-group" style="width: 130px;">
                                        <button class="btn btn-outline-secondary" type="button" onclick="decrease()">−</button>
                                        <input type="text" class="form-control text-center fw-bold" value="1" id="cantidad" name="cantidad" readonly>
                                        <button class="btn btn-outline-secondary" type="button" onclick="increase({{ $producto->stock }})">+</button>
                                    </div>
                                </div>

                                <div class="d-grid gap-2">
                                    @if($producto->stock > 0)
                                        <button type="submit" class="btn btn-dark btn-lg fw-bold">🛒 Agregar al Carrito</button>
                                    @else
                                        <button type="button" class="btn btn-secondary btn-lg disabled" disabled>🚫 Sin Stock Temporal</button>
                                    @endif
                                </div>
                            </form>

                        </div>
                    </div>
                </div>

            </div>
        </div>

        @include('footer')

        <script>
            function increase(maxStock) {
                let input = document.getElementById("cantidad");
                if (parseInt(input.value) < maxStock) {
                    input.value = parseInt(input.value) + 1;
                }
            }

            function decrease() {
                let input = document.getElementById("cantidad");
                if (parseInt(input.value) > 1) {
                    input.value = parseInt(input.value) - 1;
                }
            }
        </script>

        <script src="{{ asset('vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    </body>
</html>