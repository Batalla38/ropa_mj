<!DOCTYPE html>
    <html>
        <head>
            <title>Ropa MJ</title>
            <link rel="stylesheet" href="{{asset('vendor/bootstrap/css/bootstrap.min.css')}}">
        <style>
        /* Estilos globales aplicados al cuerpo del documento */
            body {
            background-color: #a39898; /* Color de fondo definido por el usuario */
            color: #9f9393;           /* Color de fuente definido por el usuario */
            }
body {
                background-image: url(https://images.vexels.com/media/users/3/142647/isolated/preview/7975c8713e6cd70ff26097efbbebdbd1-ropa-de-camiseta.png);
                background-repeat: repeat;
                background-size: 80px; /* Aquí controlas el tamaño */
                }

.card,
        .carousel {
            border: none; /* Quitamos el borde predeterminado */
            border-radius: 25px !important; /* Bordes muy redondeados (efecto circular) */
            box-shadow: 0 10px 20px rgba(0,0,0,0.15); /* Sombra suave para dar profundidad */
            overflow: hidden; /* Asegura que el contenido interno respete el borde redondeado */
            background-color: #fff; /* Fondo blanco para las tarjetas */
            transition: transform 0.3s ease; /* Efecto suave al pasar el mouse */
        }

        /* Efecto sutil al pasar el mouse sobre las tarjetas de productos */
        .col-md-4 .card:hover {
            transform: translateY(-5px);
            box-shadow: 0 15px 30px rgba(0,0,0,0.2);
        }

        /* Redondeado específico para las imágenes dentro de las tarjetas */
        .card-img-top {
            border-top-left-radius: 25px;
            border-top-right-radius: 25px;
            object-fit: cover; /* Asegura que la imagen no se deforme */
            height: 250px; /* Altura uniforme para las imágenes de tarjetas */
        }

        /* Ajuste para el borde del carrusel */
        .carousel-item img {
            border-radius: 20px; /* Ligeramente menos redondeado que la tarjeta padre */
        }

        </style>
    </head>

    <body>

        <div class="container mt-3 mb-4" >
            @include('header')
        </div>


        <div class="container-fluid mt-5 py-4">
            <div class="row">
                <div class="col-md-3">
                    <div class="sticky-top" style="top: 20px; z-index: 1000;">
                        <div class="p-4 bg-white shadow-sm border rounded">
                            <h5 class="fw-bold mb-3">Filtros</h5>
                            <label class="form-label text-muted small">Genero</label>
                            <select class="form-select" aria-label="Default select example">
                                <option selected>Todos los productos</option>
                                <option value="1">Hombre</option>
                                <option value="2">Mujer</option>
                                <option value="3">Niños</option>
                            </select>
                        </div>
                    </div>


            <div class="p-3 bg-white border rounded shadow-sm mb-3">
                <h6 class="fw-bold mb-3">Seleccionar Talles</h6>

                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="checkbox" id="inlineCheckbox1" value="option1">
                    <label class="form-check-label" for="inlineCheckbox1">X</label>
                </div>

                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="checkbox" id="inlineCheckbox2" value="option2">
                    <label class="form-check-label" for="inlineCheckbox2">XL</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="checkbox" id="inlineCheckbox2" value="option2">
                    <label class="form-check-label" for="inlineCheckbox2">XXL</label>
                </div>



            </div>
                        <div class="p-4 bg-white shadow-sm border rounded">
                            <h5 class="fw-bold mb-1">Filtros</h5>
                            <label class="form-label text-muted small">Categoria</label>
                            <select class="form-select" aria-label="Default select example">
                                <option selected>Todos los productos</option>
                                <option value="1">Verano</option>
                                <option value="2">Invierno</option>
                                <option value="3">Otoño</option>
                                <option value="3">Primavera</option>
                            </select>
                        </div>

        </div>

        <div class="col-md-9">

            <div class="row g-4 mb-5">
                <div class="col-md-4">
                    <div class="card h-100 shadow-sm border-0">
                        <div id="carouselCol1" class="carousel slide" data-bs-ride="false">
                            <div class="carousel-inner">
                                <div class="carousel-item active">
                                    <img src="ropa Hombre/JeanH.jpg" class="card-img-top" alt="Jeans Hombre">
                                </div>
                                <div class="carousel-item">
                                    <img src="ropa Hombre/JeanH2.jpg" class="card-img-top" alt="Remera Hombre">
                                </div>
                            </div>
                            <button class="carousel-control-prev" type="button" data-bs-target="#carouselCol1" data-bs-slide="prev">
                                <span class="carousel-control-prev-icon" aria-hidden="true" style="filter: invert(1);"></span>
                            </button>
                            <button class="carousel-control-next" type="button" data-bs-target="#carouselCol1" data-bs-slide="next">
                                <span class="carousel-control-next-icon" aria-hidden="true" style="filter: invert(1);"></span>
                            </button>
                        </div>
                        <div class="card-body text-center mt-2">
                            <h5 class="text-dark fw-bold">Outfit Hombre</h5>
                            <p class="text-muted small">Outfit Adidas Masculino.</p>
                            <p class="text-black fw-bold fs-5">$150.000</p>
                        </div>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="card h-100 shadow-sm border-0">
                        <div id="carouselCol2" class="carousel slide" data-bs-ride="false">
                            <div class="carousel-inner">
                                <div class="carousel-item active">
                                    <img src="ropa Hombre/ConjuntoVeranoH2.jpg" class="card-img-top" alt="Jeans Hombre">
                                </div>
                                <div class="carousel-item">
                                    <img src="ropa Hombre/ConjuntoVeranoH.jpg" class="card-img-top" alt="Remera Hombre">
                                </div>
                            </div>
                            <button class="carousel-control-prev" type="button" data-bs-target="#carouselCol2" data-bs-slide="prev">
                                <span class="carousel-control-prev-icon" aria-hidden="true" style="filter: invert(1);"></span>
                            </button>
                            <button class="carousel-control-next" type="button" data-bs-target="#carouselCol2" data-bs-slide="next">
                                <span class="carousel-control-next-icon" aria-hidden="true" style="filter: invert(1);"></span>
                            </button>
                        </div>
                        <div class="card-body text-center mt-2">
                            <h5 class="text-dark fw-bold">Outfit Masculino</h5>
                            <p class="text-muted small">Outfit de Dama Nike.</p>
                            <p class="text-black fw-bold fs-5">$200.500</p>
                        </div>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="card h-100 shadow-sm border-0">
                        <div id="carouselCol3" class="carousel slide" data-bs-ride="false">
                            <div class="carousel-inner">
                                <div class="carousel-item active">
                                    <img src="ropa Hombre/ConjuntoRayasH2.jpg" class="card-img-top" alt="Jeans Hombre">
                                </div>
                                <div class="carousel-item">
                                    <img src="ropa Hombre/ConjuntoRayasH.jpg" class="card-img-top" alt="Remera Hombre">
                                </div>
                            </div>
                            <button class="carousel-control-prev" type="button" data-bs-target="#carouselCol3" data-bs-slide="prev">
                                <span class="carousel-control-prev-icon" aria-hidden="true" style="filter: invert(1);"></span>
                            </button>
                            <button class="carousel-control-next" type="button" data-bs-target="#carouselCol3" data-bs-slide="next">
                                <span class="carousel-control-next-icon" aria-hidden="true" style="filter: invert(1);"></span>
                            </button>
                        </div>
                        <div class="card-body text-center mt-2">
                            <h5 class="text-dark fw-bold">Conjunto Masculino</h5>
                            <p class="text-muted small">Remeras/Short Nike </p>
                            <p class="text-black fw-bold fs-5">$80.900</p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row g-4">
                <div class="col-md-4">
                    <div class="card h-100 shadow-sm border-0">
                        <div id="carouselCol4" class="carousel slide" data-bs-ride="false">
                            <div class="carousel-inner">
                                <div class="carousel-item active">
                                    <img src="ropa Hombre/PuloverH1.jpg" class="card-img-top" alt="Jeans Hombre">
                                </div>
                                <div class="carousel-item">
                                    <img src="ropa Hombre/PuloverH.jpg" class="card-img-top" alt="Remera Hombre">
                                </div>
                            </div>
                            <button class="carousel-control-prev" type="button" data-bs-target="#carouselCol4" data-bs-slide="prev">
                                <span class="carousel-control-prev-icon" aria-hidden="true" style="filter: invert(1);"></span>
                            </button>
                            <button class="carousel-control-next" type="button" data-bs-target="#carouselCol4" data-bs-slide="next">
                                <span class="carousel-control-next-icon" aria-hidden="true" style="filter: invert(1);"></span>
                            </button>
                        </div>
                        <div class="card-body text-center mt-2">
                            <h5 class="text-dark fw-bold">Outfit Hombre</h5>
                            <p class="text-muted small">Pulover Masculino</p>
                            <p class="text-black fw-bold fs-5">$150.000</p>
                        </div>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="card h-100 shadow-sm border-0">
                        <div id="carouselCol5" class="carousel slide" data-bs-ride="false">
                            <div class="carousel-inner">
                                <div class="carousel-item active">
                                    <img src="ropa Hombre/PuloverH2.jpg" class="card-img-top" alt="Jeans Hombre">
                                </div>
                                <div class="carousel-item">
                                    <img src="ropa Hombre/PuloverH3.jpg" class="card-img-top" alt="Remera Hombre">
                                </div>
                            </div>
                            <button class="carousel-control-prev" type="button" data-bs-target="#carouselCol5" data-bs-slide="prev">
                                <span class="carousel-control-prev-icon" aria-hidden="true" style="filter: invert(1);"></span>
                            </button>
                            <button class="carousel-control-next" type="button" data-bs-target="#carouselCol5" data-bs-slide="next">
                                <span class="carousel-control-next-icon" aria-hidden="true" style="filter: invert(1);"></span>
                            </button>
                        </div>
                        <div class="card-body text-center mt-2">
                            <h5 class="text-dark fw-bold">Outfit Hombre</h5>
                            <p class="text-muted small">Outfit de Dama Nike.</p>
                            <p class="text-black fw-bold fs-5">$200.500</p>
                        </div>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="card h-100 shadow-sm border-0">
                        <div id="carouselCol6" class="carousel slide" data-bs-ride="false">
                            <div class="carousel-inner">
                                <div class="carousel-item active">
                                    <img src="ropa Hombre/SueterPolarH.jpg" class="card-img-top" alt="Ropa Niños">
                                </div>
                                <div class="carousel-item">
                                    <img src="ropa Hombre/SueterPolarH2.jpg" class="card-img-top" alt="Remera Niños">
                                </div>
                            </div>
                            <button class="carousel-control-prev" type="button" data-bs-target="#carouselCol6" data-bs-slide="prev">
                                <span class="carousel-control-prev-icon" aria-hidden="true" style="filter: invert(1);"></span>
                            </button>
                            <button class="carousel-control-next" type="button" data-bs-target="#carouselCol6" data-bs-slide="next">
                                <span class="carousel-control-next-icon" aria-hidden="true" style="filter: invert(1);"></span>
                            </button>
                        </div>
                        <div class="card-body text-center mt-2">
                            <h5 class="text-dark fw-bold">Outfit Hombre</h5>
                            <p class="text-muted small">Suerter Nike/</p>
                            <p class="text-black fw-bold fs-5">$80.900</p>
                        </div>
                    </div>
                </div>




        </div>
    </div>

</div>



</div> </div> </div>
        <script src="{{ asset('vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

        <div class= " mt-3">
                @include('footer')
        </div>
    </body>
<html>
