<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <title>Producto Especifico</title>
        <link rel="stylesheet" href="{{asset('vendor/bootstrap/css/bootstrap.min.css')}}">
        <script src="{{ asset('vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
            <style>
        /* Estilos globales aplicados al cuerpo del documento */
            body {
            background-color: #a39898; /* Color de fondo definido por el usuario */
            color: #9f9393;           /* Color de fuente definido por el usuario */
            }
        </style>

        <h1></h1>
    </head>

    <body>

                @include('header')

                <div class="container mt-5">
                    <h2 class="text-center">Hombre</h2>
                    <div class="row">
                        <div id="carouselExampleIndicators" class=" col-6 py-3 carousel slide">
                            <div class="carousel-indicators">
                                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
                            </div>
                            <div class="carousel-inner">
                                <div class="carousel-item active">
                                <img src="ropa Hombre/ConjuntoRayasH.jpg" class="d-block img-fluid w-75 d-block mx-auto" alt="conjunto de rayas">
                                </div>
                                <div class="carousel-item">
                                <img src="ropa Hombre/ConjuntoRayasH2.jpg" class="d-block img-fluid w-75 d-block mx-auto" alt="conjunto de rayas">
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


                        <div class="col-6 py-3">
                            <div class="card border-0">
                                <div class="card-body">
                                    <h5 class="card-title fw-bold fs-1">Conjunto a Rayas</h5>
                                    <p class="card-text fs-4">Este conjunto destaca por su comodidad y su diseño pinstripe atemporal en blanco y negro. <br>El set incluye una camiseta de manga corta y pantalones cortos a juego, perfectos para los días cálidos de verano. </p>
                                   <h5 class="card-title fw-bold fs-3">$90.000</h5>
                                    <div class="mt-2">
                                        <p class="text-muted small fs-4">Medios de pago aceptados:</p>
                                        <div class="d-flex flex-wrap gap-2 align-items-center">
                                            <img src="visa-logo.png" alt="Visa" style="height: 40px; width: auto;">
                                            <img src="Mastercard-logo.png" alt="mastercard" style="height: 40px; width: auto;">
                                            <img src="Logo_Naranja.png" alt="naranja" style="height: 40px; width: auto;">
                                            <img src="logo_mp.png" alt="MP" style="height: 40px; width: auto;">

                                        </div>
                                    </div>

                                    <h5 class="card-title py-2 fs-5">Caracteristicas:</h5>
                                    <p class="card-text fs-5">Material: Lino de alta calidad</p>
                                    <p class="card-text fs-5">Patrón: Rayas finas (pinstripe) blanco y negro</p>
                                    <p class="card-text fs-5">Cuidado: Lavado a máquina [especificar temperatura, si se sabe, ej. frío].</p>
                                    <div class="container mt-3">

                                    <p class="mb-2">Seleccione su talle</p>
                                    <div class="row g-2 mb-3">

                                        <div class="col-auto">
                                        <input type="radio" class="btn-check" name="talle" id="t345" value="34.5">
                                        <label class="btn btn-outline-dark" for="t345">S</label>
                                        </div>
                                        <div class="col-auto">
                                        <input type="radio" class="btn-check" name="talle" id="t35" value="35">
                                        <label class="btn btn-outline-dark" for="t35">M</label>
                                        </div>
                                        <div class="col-auto">
                                        <input type="radio" class="btn-check" name="talle" id="t36" value="36">
                                        <label class="btn btn-outline-dark" for="t36">L</label>
                                        </div>
                                        <div class="col-auto">
                                        <input type="radio" class="btn-check" name="talle" id="t365" value="36.5">
                                        <label class="btn btn-outline-dark" for="t365">XL</label>
                                        </div>

                                    </div>
                                    </div>

                                    <div class="d-flex align-items-center gap-2">

                                    <span>Quiero</span>

                                    <div class="input-group" style="width: 120px;">

                                        <button class="btn btn-outline-secondary" type="button" onclick="decrease()">−</button>

                                        <input type="text" class="form-control text-center" value="1" id="cantidad">

                                        <button class="btn btn-outline-secondary" type="button" onclick="increase()">+</button>

                                    </div>
                                    </div>
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

                                    <a href="#" class="btn btn-primary mt-3">Comprar</a>
                                </div>
                            </div>
                        </div>
                        </div>
                    </div>

                </div>

                @include('footer')

    </body>

<html>
