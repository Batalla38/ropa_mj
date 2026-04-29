<!DOCTYPE html>
    <html>
        <head>
            <title>Ropa MJ</title>
            <link rel="stylesheet" href="{{asset('vendor/bootstrap/css/bootstrap.min.css')}}">
            <style>
                /* Estilos globales aplicados al cuerpo del documento */
                body {
                    background-color: #c1a391; /* Color de fondo definido por el usuario */
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
            //header
            <div class="container mt-3 mb-4" >
                @include('header')
            </div>

            <div class="container mt-5">
                <div class="card p-4">
                <div id="carouselExampleAutoplaying" class="carousel carousel-dark slide" data-bs-ride="carousel">
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <img src="ropa Hombre/JeanH.jpg"  width="400" class="rounded mx-auto d-block" style="height: 440px; object-fit: cover;" class="d-block w-80" alt="20">
                        </div>
                        <div class="carousel-item">
                            <img src="ropa Hombre/ShortRusticoH1.jpg" class="rounded mx-auto d-block" width="400" style="height: 440px; object-fit: cover;" class="d-block w-80" alt="20">
                        </div>
                        <div class="carousel-item">
                            <img src="ropa Hombre/JeanH2.jpg" width="400" class="rounded mx-auto d-block" style="height: 440px; object-fit: cover;" class="d-block w-80" alt="20">
                        </div>
                        <div class="carousel-item">
                            <img src="ropa Hombre/ShortRusticoH.jpg" width="400" class="rounded mx-auto d-block" style="height: 440px; object-fit: cover;" class="d-block w-80" alt="20">
                        </div>


                        <div class="carousel-item">
                            <img src="ropa Hombre/SueterPolarH.jpg" width="400" class="rounded mx-auto d-block" style="height: 440px; object-fit: cover;" class="d-block w-80" alt="20">
                        </div>
                        <div class="carousel-item">
                            <img src="ropa Hombre/ConjuntoVeranoH.jpg" width="400" class="rounded mx-auto d-block" style="height: 440px; object-fit: cover;" class="d-block w-80" alt="20">
                        </div>
                        <div class="carousel-item">
                            <img src="ropa Hombre/ConjuntoVeranoH2.jpg" width="400" class="rounded mx-auto d-block" style="height: 440px; object-fit: cover;" class="d-block w-80" alt="20">
                        </div>
                        <div class="carousel-item">
                            <img src="ropa Hombre/ConjuntoRayasH.jpg" width="400" class="rounded mx-auto d-block" style="height: 440px; object-fit: cover;" class="d-block w-80" alt="20">
                        </div>
                        <div class="carousel-item">
                            <img src="ropa Hombre/ConjuntoRayasH2.jpg" width="400" class="rounded mx-auto d-block" style="height: 440px; object-fit: cover;" class="d-block w-80" alt="20">
                        </div>
                    </div>
                    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleAutoplaying" data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Previous</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleAutoplaying" data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Next</span>
                    </button>
                </div>
            </div>





 <!-- aca empíeza el slider -->
    <!-- Añadimos data-bs-pause="hover" para pausar al pasar el ratón -->
<div id="carouselRopaHombre" class="carousel slide mt-5 mb-5" data-bs-ride="carousel" data-bs-pause="hover">
    <div class="carousel-inner">

        <!-- SLIDE 1 -->
        <div class="carousel-item active">
            <div class="container mt-2 mb-2">
                <div class="row">
                    <div class="col-md-4">
                        <div class="card h-100">
                            <img src="ropa Hombre/JeanH.jpg" class="card-img-top" alt="Jean" style="height: 250px; object-fit: cover;">
                            <div class="card-body text-center">
                                <h5 class="card-title">Jean Hombre</h5>
                                <p class="card-text">Texto de ejemplo para el jean.</p>
                                <a href="#" class="btn btn-primary">Ver más</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card h-100">
                            <img src="ropa Hombre/SueterPolarH.jpg" class="card-img-top" alt="Sueter" style="height: 250px; object-fit: cover;">
                            <div class="card-body text-center">
                                <h5 class="card-title">Sueter Polar</h5>
                                <p class="card-text">Texto de ejemplo para el sueter.</p>
                                <a href="#" class="btn btn-primary">Ver más</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card h-100">
                            <img src="ropa Hombre/ConjuntoRayasH.jpg" class="card-img-top" alt="Conjunto" style="height: 250px; object-fit: cover;">
                            <div class="card-body text-center">
                                <h5 class="card-title">Conjunto Rayas</h5>
                                <p class="card-text">Texto de ejemplo para el conjunto.</p>
                                <a href="#" class="btn btn-primary">Ver más</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- SLIDE 2 -->
        <div class="carousel-item">
            <div class="container mt-2 mb-2">
                <div class="row">
                    <div class="col-md-4">
                        <div class="card h-100">
                            <img src="ropa Hombre/NuevoProducto1.jpg" class="card-img-top" alt="..." style="height: 250px; object-fit: cover;">
                            <div class="card-body text-center">
                                <h5 class="card-title">Nuevo Producto 1</h5>
                                <p class="card-text">Descripción del segundo grupo.</p>
                                <a href="#" class="btn btn-primary">Ver más</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card h-100">
                            <img src="ropa Hombre/NuevoProducto2.jpg" class="card-img-top" alt="..." style="height: 250px; object-fit: cover;">
                            <div class="card-body text-center">
                                <h5 class="card-title">Nuevo Producto 2</h5>
                                <p class="card-text">Descripción del segundo grupo.</p>
                                <a href="#" class="btn btn-primary">Ver más</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card h-100">
                            <img src="ropa Hombre/NuevoProducto3.jpg" class="card-img-top" alt="..." style="height: 250px; object-fit: cover;">
                            <div class="card-body text-center">
                                <h5 class="card-title">Nuevo Producto 3</h5>
                                <p class="card-text">Descripción del segundo grupo.</p>
                                <a href="#" class="btn btn-primary">Ver más</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Controles laterales con flechas negras para visibilidad -->
    <button class="carousel-control-prev" type="button" data-bs-target="#carouselRopaHombre" data-bs-slide="prev" style="width: 5%;">
        <span class="carousel-control-prev-icon" aria-hidden="true" style="filter: invert(100%);"></span>
        <span class="visually-hidden">Anterior</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#carouselRopaHombre" data-bs-slide="next" style="width: 5%;">
        <span class="carousel-control-next-icon" aria-hidden="true" style="filter: invert(100%);"></span>
        <span class="visually-hidden">Siguiente</span>
    </button>
</div>

        <!-- ata aca elñ primer carousel -->
    </div>


    <!-- Controles de navegación -->

</div>


                <div class="container">
                <div class="row">
                    <div class="col-md-4">
                        <div class="card" style="height: 100%;"> <img src="ropa Hombre/PuloverH.jpg"
                                class="card-img-top"
                                alt="..."
                                style="height: 100%; width: 100%; object-fit: cover;">
                            <div class="card-body">
                                <h5 class="card-title">Pulover</h5>
                                <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card’s content.</p>
                                <a href="#" class="btn btn-primary">Go somewhere</a>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="card" style="height: 100%;"> <img src="ropa Hombre/BermudaH.jpg"
                                class="card-img-top"
                                alt="..."
                                style="height: 100%; width: 100%; object-fit: cover;">
                            <div class="card-body">
                                <h5 class="card-title">Bermuda</h5>
                                <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card’s content.</p>
                                <a href="#" class="btn btn-primary">Go somewhere</a>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="card" style="height: 100%;"> <img src="ropa Hombre/ShortRusticoH.jpg"
                                class="card-img-top"
                                alt="..."
                                style="height: 100%; width: 100%; object-fit: cover;">
                            <div class="card-body">
                                <h5 class="card-title">Short Rustico</h5>
                                <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card’s content.</p>
                                <a href="#" class="btn btn-primary">Go somewhere</a>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
            <div class="container-fluid bg-light py-5 text-center text-dark mt-4">

            <div class="row">
                <div class="col-sm-6 col-md-3 border-end border-secondary fs-3">LEVIS</div>
                <div class="col-sm-6 col-md-3 border-end border-secondary fs-3">KEVINGSTON</div>
                <div class="col-sm-6 col-md-3 border-end border-secondary fs-3">NIKE</div>
                <div class="col-sm-6 col-md-3 fs-3">LEUTTE</div> </div>
            </div>


            <script src="{{ asset('vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
</div></div></div>
            <div class=" mt-3">
                @include('footer')
            </div>
        </body>

</html>
