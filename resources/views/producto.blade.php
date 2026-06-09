<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <title>{{ $producto->nombre }} - Ropa MJ</title>
        <link rel="stylesheet" href="{{asset('vendor/bootstrap/css/bootstrap.min.css')}}">
        <script src="{{ asset('vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
        <style>
            body {
                background-color: #c1a391; 
                color: #9f9393;           
                background-image: url({{ asset('bg1.png') }}); 
                background-repeat: repeat;
                background-size: 700px; 
            }
            .carousel .carousel-inner {
                height: 650px; 
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

    <body class="bg-light">

        @include('header')

        <div class="container mt-5">
            <h2 class="text-center mb-4 text-dark fw-bold">Detalle del Producto</h2>
            <div class="row">
                <div id="carouselExampleIndicators" class="col-md-6 py-3 carousel slide">
                    <div class="carousel-indicators">
                        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
                    </div>
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <img src="{{ asset($producto->url_imagen ?? 'ropa Hombre/ConjuntoRayasH.jpg') }}" class="d-block img-fluid w-75 mx-auto" alt="{{ $producto->nombre }}">
                        </div>
                        <div class="carousel-item">
                            <img src="{{ asset('ropa Hombre/ConjuntoRayasH2.jpg') }}" class="d-block img-fluid w-75 mx-auto" alt="Vista secundaria">
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
                    <div class="card border-0 shadow-sm rounded-4 p-2">
                        <div class="card-body">
                            <h5 class="card-title fw-bold fs-1 text-dark">{{ $producto->nombre }}</h5>
                            
                            <p class="card-text text-muted fs-5">{{ $producto->descripcion ?? 'Sin descripción disponible.' }}</p>
                            
                            <h5 class="card-title fw-bold fs-2 text-success my-3">${{ number_format($producto->precio, 0, ',', '.') }}</h5>
                            
                            <div class="mb-4">
                                <p class="text-muted small fs-6 mb-2">Medios de pago aceptados:</p>
                                <div class="d-flex flex-wrap gap-2 align-items-center">
                                    <img src="{{ asset('visa-logo.png') }}" alt="Visa" style="height: 30px;">
                                    <img src="{{ asset('Mastercard-logo.png') }}" alt="mastercard" style="height: 30px;">
                                    <img src="{{ asset('Logo_Naranja.png') }}" alt="naranja" style="height: 30px;">
                                    <img src="{{ asset('logo_mp.png') }}" alt="MP" style="height: 30px;">
                                </div>
                            </div>

                            <h5 class="fw-bold fs-5 mb-2 text-dark">Características:</h5>
                            <p class="card-text mb-1 fs-6"><strong>Material:</strong> {{ $producto->material ?? 'Lino de alta calidad' }}</p>
                            <p class="card-text mb-1 fs-6"><strong>Patrón:</strong> {{ $producto->patron ?? 'Rayas finas' }}</p>
                            <p class="card-text mb-3 fs-6"><strong>Cuidado:</strong> {{ $producto->cuidado ?? 'Lavado en frío.' }}</p>
                            
                            <form action="{{ route('carrito.agregar', $producto->id) }}" method="POST">
                                @csrf

                                <p class="mb-2 fw-semibold text-dark">Seleccione su talle</p>
                                <div class="row g-2 mb-4">
                                    <div class="col-auto">
                                        <input type="radio" class="btn-check" name="talle" id="tS" value="S" checked>
                                        <label class="btn btn-outline-dark" for="tS">S</label>
                                    </div>
                                    <div class="col-auto">
                                        <input type="radio" class="btn-check" name="talle" id="tM" value="M">
                                        <label class="btn btn-outline-dark" for="tM">M</label>
                                    </div>
                                    <div class="col-auto">
                                        <input type="radio" class="btn-check" name="talle" id="tL" value="L">
                                        <label class="btn btn-outline-dark" for="tL">L</label>
                                    </div>
                                    <div class="col-auto">
                                        <input type="radio" class="btn-check" name="talle" id="tXL" value="XL">
                                        <label class="btn btn-outline-dark" for="tXL">XL</label>
                                    </div>
                                </div>

                                <div class="d-flex align-items-center gap-3 mb-4">
                                    <span class="fw-semibold text-dark">Cantidad:</span>
                                    <div class="input-group" style="width: 130px;">
                                        <button class="btn btn-outline-secondary" type="button" onclick="decrease()">−</button>
                                        <input type="text" class="form-control text-center fw-bold" value="1" id="cantidad" name="cantidad" readonly>
                                        <button class="btn btn-outline-secondary" type="button" onclick="increase()">+</button>
                                    </div>
                                </div>

                                @if(session('success'))
                                    <div class="alert alert-success alert-dismissible fade show d-flex align-items-center py-2 px-3 mb-3 rounded-3 shadow-sm" role="alert" style="font-size: 0.9rem; color: #155724; background-color: #d4edda; border-color: #c3e6cb;">
                                        <span class="me-2">✅</span>
                                        <div>
                                            {{ session('success') }} 
                                            <a href="{{ route('carrito.ver') }}" class="alert-link text-decoration-underline ms-1 text-success fw-bold">Ver mi carrito</a>
                                        </div>
                                        <button type="button" class="btn-close py-2" data-bs-dismiss="alert" aria-label="Close"></button>
                                    </div>
                                @endif
                                    
                                <div class="d-grid gap-2">
                                    <button type="submit" class="btn btn-dark btn-lg">🛒 Agregar al Carrito</button>
                                </div>
                            </form>

                        </div>
                    </div>
                </div>
            </div>
        </div>

        @include('footer')

        <script>
            function increase() {
                let input = document.getElementById("cantidad");
                input.value = parseInt(input.value) + 1;
            }

            function decrease() {
                let input = document.getElementById("cantidad");
                if (parseInt(input.value) > 1) {
                    input.value = parseInt(input.value) - 1;
                }
            }
        </script>
    </body>
</html>