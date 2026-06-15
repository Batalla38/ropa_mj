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
            /* Contenedor gris opaco del lado izquierdo que envuelve tu carrusel */
            .carousel-container-wrapper {
                background-color: #a89a93;
                border-radius: 25px;
                padding: 15px;
                box-shadow: 0 10px 20px rgba(0,0,0,0.1);
            }
            /* Estilo unificado de tu carrusel interno */
            .carousel .carousel-inner {
                height: 530px;
                border: none;
                border-radius: 20px !important;
                overflow: hidden;
                background-color: #a39898;
                backdrop-filter: blur(5px);
                transition: transform 0.3s ease;
                padding: 1px;
            }
            /* Bloque único unificado blanco para la información de la derecha */
            .info-panel-unique {
                background-color: #ffffff;
                border-radius: 25px;
                padding: 35px;
                box-shadow: 0 10px 20px rgba(0,0,0,0.08);
            }
            .divider-line {
                border-top: 1px solid #eee;
                margin: 20px 0;
            }
            .label-title {
                font-weight: bold;
                color: #7a7a7a;
                font-size: 0.85rem;
                text-transform: uppercase;
                letter-spacing: 0.5px;
                margin-bottom: 5px;
            }
        </style>
    </head>

    <body>

        @include('header')

        <div style="position: fixed; top: 20px; left: 50%; transform: translateX(-50%); width: 90%; max-width: 600px; z-index: 9999;">
            
            {{-- Cartel de Éxito (Soporta 'success' o 'exito') --}}
            @if(session('success') || session('exito') || request()->get('check') == 1)
                <div class="alert alert-success alert-dismissible fade show text-center fw-bold shadow-lg border-0 p-3" role="alert" style="border-radius: 15px; background-color: #d1e7dd; color: #0f5132;">
                    <i class="bi bi-cart-plus-fill me-2 fs-5"></i> ¡Excelente! Producto agregado al carrito.
                    <a href="{{ route('carrito.index') }}" class="alert-link text-decoration-underline ms-2 text-success">Ver mi carrito →</a>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close" style="top: 18px;"></button>
                </div>
            @endif

            {{-- Cartel de Error de Stock --}}
            @if($errors->has('stock_error'))
                <div class="alert alert-warning alert-dismissible fade show fw-bold shadow-lg border-0 p-3" role="alert" style="border-radius: 15px;">
                    <i class="bi bi-exclamation-diamond-fill me-2"></i> {{ $errors->first('stock_error') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close" style="top: 18px;"></button>
                </div>
            @endif
        </div>
        <div class="container mt-2 mb-5" style="padding-top: 100px;">
            <h2 class="text-center mb-4 text-dark fw-bold">Detalle del Producto</h2>

            <div class="row g-4">

                <div class="col-md-6">
                    <div class="carousel-container-wrapper h-100 d-flex flex-column justify-content-center">
                        <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="false">
                            <div class="carousel-indicators">
                                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
                            </div>
                            <div class="carousel-inner d-flex align-items-center">

                                <div class="carousel-item active">
                                    <img src="{{ asset($producto->url_imagen) }}" class="d-block img-fluid w-75 mx-auto rounded-3 shadow" alt="{{ $producto->nombre }}">
                                </div>

                                <div class="carousel-item">
                                    <img src="{{ asset($producto->url_imagen) }}" class="d-block img-fluid w-75 mx-auto rounded-3 shadow" alt="Vista alternativa">
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
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="info-panel-unique">

                        <div>
                            <h1 class="fw-bold text-dark mb-2 fs-2">{{ $producto->nombre }}</h1>
                            <p class="text-muted fs-5 mb-0">{{ $producto->descripcion ?? 'Esta prenda no cuenta con una descripción detallada todavía.' }}</p>
                        </div>

                        <div class="divider-line"></div>

                        <div>
                            <div class="label-title">Precio</div>
                            <h3 class="fw-bold text-success fs-1 m-0">
                                ${{ number_format($producto->precio, 0, ',', '.') }}
                            </h3>
                        </div>

                        <div class="divider-line"></div>

                        <div>
                            <div class="label-title">Medios de pago aceptados</div>
                            <div class="d-flex flex-wrap gap-2 align-items-center mt-2">
                                <img src="{{ asset('visa-logo.png') }}" alt="Visa" style="height: 28px;">
                                <img src="{{ asset('Mastercard-logo.png') }}" alt="Mastercard" style="height: 28px;">
                                <img src="{{ asset('Logo_Naranja.png') }}" alt="Naranja" style="height: 28px;">
                                <img src="{{ asset('logo_mp.png') }}" alt="Mercado Pago" style="height: 28px;">
                            </div>
                        </div>

                        <div class="divider-line"></div>

                        <div class="row g-3">
                            <div class="col-sm-6">
                                <div class="label-title">Género</div>
                                <div class="fw-semibold text-dark text-capitalize">{{ ucfirst($producto->genero ?? 'Unisex') }}</div>
                            </div>
                            <div class="col-sm-6">
                                <div class="label-title">Disponibilidad</div>
                                <div class="fw-semibold text-dark">En stock ({{ $producto->stock }} unidades)</div>
                            </div>
                        </div>

                        <div class="divider-line"></div>

                        <form action="{{ route('carrito.agregar', $producto->id) }}" method="POST">
                            @csrf

                            <div class="mb-4">
                                <div class="label-title">Talle Seleccionado</div>
                                <div class="d-flex flex-wrap gap-2 mt-2">
                                    @php
                                        $tallesArray = !empty($producto->talle) ? explode(', ', $producto->talle) : ['Único'];
                                    @endphp

                                    @foreach($tallesArray as $index => $talle)
                                        <input type="radio" class="btn-check" name="talle" id="talle_{{ $index }}" value="{{ $talle }}" {{ $loop->first ? 'checked' : '' }}>
                                        <label class="btn btn-outline-dark px-4 fw-bold shadow-sm" for="talle_{{ $index }}">{{ $talle }}</label>
                                    @endforeach
                                </div>
                            </div>

                            <div class="d-flex align-items-center gap-3 mb-4">
                                <span class="fw-bold text-dark" style="font-size: 0.95rem;">CANTIDAD:</span>
                                <div class="input-group" style="width: 140px;">
                                    <button class="btn btn-outline-secondary fw-bold" type="button" onclick="decrease()">−</button>
                                    <input type="text" class="form-control text-center fw-bold bg-light" value="1" id="cantidad" name="cantidad" readonly style="color: #222;">
                                    <button class="btn btn-outline-secondary fw-bold" type="button" onclick="increase({{ $producto->stock }})">+</button>
                                </div>
                            </div>

                            <div class="d-grid gap-2">
                                @if($producto->stock > 0)
                                    <button type="submit" class="btn btn-dark btn-lg fw-bold py-3 shadow-sm">
                                        <i class="bi bi-cart-plus me-2"></i> Agregar al Carrito
                                    </button>
                                @else
                                    <button type="button" class="btn btn-secondary btn-lg py-3 disabled" disabled>
                                        🚫 Sin Stock Temporal
                                    </button>
                                @endif

                                <a href="{{ route('catalogo.index') }}" class="btn btn-link text-center text-secondary text-decoration-none fw-semibold mt-1">
                                    ← Volver al Catálogo Público
                                </a>
                            </div>
                        </form>

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

            // Corregí la palabra extraña "label工作" que andaba colgada en tu talle general
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