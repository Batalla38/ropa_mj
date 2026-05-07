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
                    background-color: #c1a391; /* Color de fondo definido por el usuario */
                    color: #9f9393;           /* Color de fuente definido por el usuario */
                }
                body {
                    background-image: url(bg1.png);
                    background-repeat: repeat;
                    background-size: 700px; /* Aquí controlas el tamaño */
                }
                 /* Estilos globales aplicados al cuerpo del documento */
                body {
                    background-color: #c1a391; /* Color de fondo definido por el usuario */
                    color: #9f9393;           /* Color de fuente definido por el usuario */
                }
                body {
                    background-image: url(bg1.png);
                    background-repeat: repeat;
                    background-size: 700px; /* Aquí controlas el tamaño */
                }

        /* Estilos globales aplicados al cuerpo del documento */
            body {
            background-color: #a39898; /* Color de fondo definido por el usuario */
            color: #9f9393;           /* Color de fuente definido por el usuario */
            }
            .carousel {
                .carousel-inner {
        height: 650px; /* Ajusta este valor según qué tan alto lo quieras */

            border: none; /* Quitamos el borde predeterminado */
            border-radius: 25px !important; /* Bordes muy redondeados (efecto circular) */
            box-shadow: 0 10px 20px rgba(0,0,0,0.15); /* Sombra suave para dar profundidad */
            overflow: hidden; /* Asegura que el contenido interno respete el borde redondeado */
            background-color: #a39898; /* Fondo blanco para las tarjetas */
            backdrop-filter: blur(5px);
            transition: transform 0.3s ease; /* Efecto suave al pasar el mouse */
            padding: 1px;
        }
        </style>

        <h1></h1>
    </head>

    <body>

                @include('header')

                <div class="container mt-5">
                    <h2 class="text-center">Mujer</h2>
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

                                <img src="ropa/mujer/mujer (1).jpeg" class="d-block img-fluid w-75 d-block mx-auto" alt="conjunto de rayas">
                                </div>
                                <div class="carousel-item">
                                <img src="ropa/mujer/mujer (2).jpeg" class="d-block img-fluid w-75 d-block mx-auto" alt="conjunto de rayas">

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
                                    <h5 class="card-title fw-bold fs-1">Polera de Hilo</h5>
                                    <p class="card-text fs-4">Destaca por su textura suave y su diseño de tejido acanalado que se adapta  a la silueta. <br>Es una prenda básica de alta calidad, ideal para crear looks sofisticados y abrigados durante los días de media estación. </p>
                                   <h5 class="card-title fw-bold fs-3">$30.000</h5>
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
                                    <p class="card-text fs-5">Material: Hilo de punto fino con textura canelada.</p>
                                    <p class="card-text fs-5">Patrón: Cuello media polera y mangas largas con acabado elástico</p>
                                    <p class="card-text fs-5">Cuidado: Lavado a mano o ciclo delicado con agua fría.</p>
                                    <div class="container mt-3">

                                    <p class="mb-2">Seleccione su talle</p>
                                    <div class="row g-2 mb-3">

                                        <div class="col-auto">
                                        <input type="radio" class="btn-check" name="talle" id="t345" value="34.5">
                                        <label class="btn btn-outline-dark" for="t345">XS</label>
                                        </div>
                                        <div class="col-auto">
                                        <input type="radio" class="btn-check" name="talle" id="t35" value="35">
                                        <label class="btn btn-outline-dark" for="t35">S</label>
                                        </div>
                                        <div class="col-auto">
                                        <input type="radio" class="btn-check" name="talle" id="t36" value="36">
                                        <label class="btn btn-outline-dark" for="t36">L</label>
                                        </div>
                                        <div class="col-auto">
                                        <input type="radio" class="btn-check" name="talle" id="t365" value="36.5">
                                        <label class="btn btn-outline-dark" for="t365">M</label>
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
