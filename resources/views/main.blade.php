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
                    background-image: url(bg1.png);
                    background-repeat: repeat;
                    background-size: 700px; /* Aquí controlas el tamaño */
                }

/* Creamos una clase personalizada para la animación */
.card-animada {
    transition: transform 0.3s ease-in-out, shadow 0.3s ease-in-out;
    cursor: pointer;
}

/* Efecto al pasar el mouse (hover) */
.card-animada:hover {
    transform: scale(1.05); /* Crece un 5% */
    z-index: 10; /* Asegura que la tarjeta quede por encima de las demás al crecer */
    box-shadow: 0 10px 20px rgba(0,0,0,0.2) !important; /* Aumenta la sombra para dar efecto de elevación */
}



.card,
        .carousel {
            border: none; /* Quitamos el borde predeterminado */
            border-radius: 25px !important; /* Bordes muy redondeados (efecto circular) */
            box-shadow: 0 10px 20px rgba(0,0,0,0.15); /* Sombra suave para dar profundidad */
            overflow: hidden; /* Asegura que el contenido interno respete el borde redondeado */
            background-color:  #c1a391ef; /* Fondo blanco para las tarjetas */
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



/* Contenedor principal que oculta el desbordamiento */
.marquee-wrapper {
    overflow: hidden;
    width: 100%;
    display: flex;
    align-items: center;
    white-space: nowrap;
}

/* El contenedor que se anima */
.marquee-content {
    display: flex;
    animation: scroll-marcas 30s linear infinite; /* 30s define la velocidad (más segundos = más lento) */
}

/* Estilo para cada marca */
.marquee-item {
    padding: 0 50px; /* Espacio entre marcas */
    color: #333;
    font-weight: bold;
    border-right: 1px solid #ccc; /* La rayita divisoria que tenías */
}

/* La animación mágica */
@keyframes scroll-marcas {
    0% { transform: translateX(0); }
    100% { transform: translateX(-50%); } /* Se mueve la mitad exacta para que no se note el salto */
}

/* Opcional: Pausar cuando el usuario pasa el mouse */
.marquee-wrapper:hover .marquee-content {
    animation-play-state: paused;
}
            </style>
        </head>

        <body>
            //header
            <div class="container mt-3 mb-4" >
                @include('header')
            </div>

<!-- BANNER SLAIDER-->
        <div class="container mt-5">
                <div class="card p-4">
                    <div class="container-fluid mt-1 p-1">
                        <div id="carouselExampleAutoplaying" class="carousel carousel-dark slide" data-bs-ride="carousel" data-bs-interval="10000">
                        <div class="carousel-inner" >
                            <div class="carousel-item active">
                                <img src="{{ asset('banner slider/banner1.jpeg') }}"
                                    class="d-block w-100"
                                    style="height: auto; object-fit: contain;"
                                    alt="Banner 1">
                            </div>
                        </div>
                        <div class="carousel-item">
                            <img src="{{ asset('banner slider/banner2.jpeg') }}"
                                    class="d-block w-100"
                                    style="height: auto; object-fit: contain;"
                                    alt="Banner 1"></div>
                        <div class="carousel-item">
                            <img src="{{ asset('banner slider/banner3.jpeg') }}"
                                    class="d-block w-100"
                                    style="height: auto; object-fit: contain;"
                                    alt="Banner 1"></div>
                        <div class="carousel-item">
                            <img src="{{ asset('banner slider/banner4.jpeg') }}"
                                    class="d-block w-100"
                                    style="height: auto; object-fit: contain;"
                                    alt="Banner 1">
                        </div>
                        <div class="carousel-item">
                            <img src="{{ asset('banner slider/banner5.jpeg') }}"
                                    class="d-block w-100"
                                    style="height: auto; object-fit: contain;"
                                    alt="Banner 1"></div>
                        <div class="carousel-item">
                            <img src="{{ asset('banner slider/banner6.jpeg') }}"
                                    class="d-block w-100"
                                    style="height: auto; object-fit: contain;"
                                    alt="Banner 1"></div>
                        <div class="carousel-item">
                            <img src="{{ asset('banner slider/banner7.jpeg') }}"
                                    class="d-block w-100"
                                    style="height: auto; object-fit: contain;"
                                    alt="Banner 1"></div>
                        <div class="carousel-item">
                            <img src="{{ asset('banner slider/banner1.jpeg') }}"
                                    class="d-block w-100"
                                    style="height: auto; object-fit: contain;"
                                    alt="Banner 1"></div>
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








 <!-- aca empíeza el primes slaider con categorias  -->
    <!-- Añadimos data-bs-pause="hover" para pausar al pasar el ratón -->

<div id="carouselRopaHombre" class="carousel slide mt-5 mb-5" data-bs-ride="carousel" data-bs-pause="hover">
    <div class="carousel-inner">

        <!-- SLIDE 1 -->
        <div class="carousel-item active">
            <div class="container mt-1 mb-1">
                <div class="row g-0 p-4 rounded-4" style="background-color: #c1a391ef;">
                    <h1 class="display-1 text-black text-center mb-4 fw-bold text-uppercase">
                        <p class="bg-personalizado text-black p-1 text-center">
                        <strong>Lo Mas Buscado</p></strong></h1>
                    <div class="col-md-4">
                        <div class="card h-100 shadow-sm card-animada">
                            <img src="ropa/relevante/ChalecoH.jpg" class="card-img-top" alt="Jean" style="height: 300px; object-fit: cover;">
                            <div class="card-body text-center bg-light">
                                <h5 class="card-title fs-2">Chaleco de Invierno</h5>
                                <p class="card-text fs-3">80.000$</p>
                                <a href="#" class="btn btn-primary">Ver más</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card h-100 shadow-sm card-animada">
                            <img src="ropa/relevante/ChombaLargaH.jpg" class="card-img-top" alt="Sueter" style="height: 300px; object-fit: cover;">
                            <div class="card-body text-center bg-light">
                                <h5 class="card-title fs-2">Chomba Larga</h5>
                                <p class="card-text fs-3">90.000$</p>
                                <a href="#" class="btn btn-primary">Ver más</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card h-100 shadow-sm card-animada">
                            <img src="ropa/relevante/mujer4.jpeg" class="card-img-top" alt="Conjunto" style="height: 300px; object-fit: cover;">
                            <div class="card-body text-center bg-light">
                                <h5 class="card-title fs-2">Tapado Rojo</h5>
                                <p class="card-text fs-3">120.000$</p>
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
                <div class="row g-0 p-4 rounded-4" style="background-color: #c1a391ef;">
                    <h1 class="display-1 text-black text-center mb-4 fw-bold text-uppercase">
                        <p class="bg-personalizado text-black p-1 text-center">
                        <strong>Lo Mas Buscado</p></strong></h1>
                    <div class="col-md-4">
                        <div class="card h-100 shadow-sm card-animada">
                            <img src="ropa/relevante/mujer8.jpeg" class="card-img-top" alt="..." style="height: 300px; object-fit: cover;">
                           <div class="card-body text-center bg-light">
                                <h5 class="card-title fs-2">Tapado Beige</h5>
                                <p class="card-text fs-3">125.000$</p>
                                <a href="#" class="btn btn-primary">Ver más</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card h-100 shadow-sm card-animada">
                            <img src="ropa/relevante/PuloverH3.jpg" class="card-img-top" alt="..." style="height: 300px; object-fit: cover;">
                            <div class="card-body text-center bg-light">
                                <h5 class="card-title fs-2">Pulover</h5>
                                <p class="card-text fs-3">100.000$</p>
                                <a href="#" class="btn btn-primary">Ver más</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card h-100 shadow-sm card-animada">
                            <img src="ropa/relevante/SueterPolarH.jpg" class="card-img-top" alt="..." style="height: 300px; object-fit: cover;">
                            <div class="card-body text-center bg-light">
                                <h5 class="card-title fs-2">Sueter Polar</h5>
                                <p class="card-text fs-3">150.000$</p>
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

    </div>
    <!-- Controles de navegación -->
</div>
<!-- termina  primer carousel -->








<!-- SEGUNDO CARRUSEL COLECCIONES -->

<div id="carouselRopaLargo" class="carousel slide mt-5 mb-5 bg-transparent" data-bs-ride="carousel" data-bs-pause="hover">
    <div class="carousel-inner bg-transparent">
        <div class="carousel-item active bg-transparent">
            <div class="container-fluid p-1 bg-transparent">
                <div class="row g-0 p-4 rounded-4" style="background-color: #c1a391ef;">
                    <h1 class="display-1 text-black text-center mb-4 fw-bold text-uppercase">
                        <p class="bg-personalizado text-black p-1 text-center">
                        <strong>COLECCIÓN COMPLETA </p></strong></h1>
                    <div class="col-md-3 px-2">
                        <div class="card h-80 border-1 rounded-2 shadow-sm card-animada">
                            <img src="ropa/colleccion/Campera cuero.jpeg" class="card-img-top rounded-0" alt="Jean" style="height: 350px; object-fit: cover;">
                            <div class="card-body text-center bg-light">
                                <h5 class="card-title fw-bold text-black fs-2">Campera de Cuero</h5>
                                <p class="card-text fs-3">120.000$</p>
                                <a href="#" class="btn btn-dark">Ver más</a>
                            </div>
                        </div>
                    </div>

                   <div class="col-md-3 px-2">
                        <div class="card h-80 border-1 rounded-2 shadow-sm card-animada">
                            <img src="ropa/colleccion/CamperaH2.jpg" class="card-img-top rounded-0" alt="Jean" style="height: 350px; object-fit: cover;">
                            <div class="card-body text-center bg-light">
                                <h5 class="card-title fw-bold text-black fs-2">Sueter Deportivo</h5>
                                <p class="card-text fs-3">120.000$</p>
                                <a href="#" class="btn btn-dark">Ver más</a>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-3 px-2">
                        <div class="card h-80 border-0 rounded-0 shadow-sm card-animada">
                            <img src="ropa/colleccion/ChombaH1.jpg" class="card-img-top rounded-0" alt="Jean" style="height: 350px; object-fit: cover;">
                            <div class="card-body text-center bg-light">
                                <h5 class="card-title fw-bold text-black fs-2">Chomba B/M</h5>
                                <p class="card-text fs-3">100.000$</p>
                                <a href="#" class="btn btn-dark">Ver más</a>
                            </div>
                        </div>
                    </div>


                    <div class="col-md-3 px-2">
                        <div class="card h-80 border-0 rounded-0 shadow-sm card-animada">
                            <img src="ropa/colleccion/conjunto2.jpg" class="card-img-top rounded-0" alt="Jean" style="height: 350px; object-fit: cover;">
                            <div class="card-body text-center bg-light">
                                <h5 class="card-title fw-bold text-black fs-2">Conjunto Casual</h5>
                                <p class="card-text fs-3">90.000$</p>
                                <a href="#" class="btn btn-dark">Ver más</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>



        <div class="carousel-item">
            <div class="container-fluid p-0 bg-transparent">
                <div class="row g-0 p-4 rounded-4" style="background-color: #c1a391ef;">
                    <h1 class="display-1 text-black text-center mb-4 fw-bold text-uppercase">
                        <p class="bg-personalizado text-black p-1 text-center">
                        <strong>NUEVO INGRESO</p></strong></h1>
                    <div class="col-md-3 px-2">
                        <div class="card h-100 border-0 rounded-0 shadow-sm card-animada">
                            <img src="ropa/ningreso/mujer (5).jpeg" class="card-img-top rounded-0" alt="Campera" style="height: 350px; object-fit: cover;">
                            <div class="card-body text-center bg-light">
                                <h5 class="card-title fw-bold text-black fs-2">Abrigos</h5>
                                 <p class="card-text fs-3">90.000$</p>
                                <a href="#" class="btn btn-dark">Ver más</a>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-3 px-2">
                        <div class="card h-100 border-0 rounded-0 shadow-sm card-animada">
                            <img src="ropa/colleccion/PuloverH1.jpg"  class="card-img-top rounded-0" alt="Campera" style="height: 350px; object-fit: cover;">
                            <div class="card-body text-center bg-light">
                                <h5 class="card-title fw-bold text-black fs-2">Pulover Beige</h5>
                                 <p class="card-text fs-3">90.000$</p>
                                <a href="#" class="btn btn-dark">Ver más</a>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-3 px-2">
                        <div class="card h-100 border-0 rounded-0 shadow-sm card-animada">
                        <img src="ropa/colleccion/PuloverH.jpg" class="card-img-top rounded-0" alt="Campera" style="height: 350px; object-fit: cover;">
                        <div class="card-body text-center bg-light">
                                <h5 class="card-title fw-bold text-black fs-2">Pulover Negro</h5>
                                <p class="card-text fs-3">90.000$</p>
                                <a href="#" class="btn btn-dark">Ver más</a>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-3 px-2">
                        <div class="card h-100 border-0 rounded-0 shadow-sm card-animada">
                        <img src="ropa/ningreso/PuloverH3.jpg" class="card-img-top rounded-0" alt="Campera" style="height: 350px; object-fit: cover;">
                        <div class="card-body text-center bg-light">
                                <h5 class="card-title fw-bold text-black fs-2">Pulover Gris</h5>
                                <p class="card-text fs-3">90.000$</p>
                                <a href="#" class="btn btn-dark">Ver más</a>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>

    </div>

    <button class="carousel-control-prev" type="button" data-bs-target="#carouselRopaLargo" data-bs-slide="prev" style="width: 7%;">
        <span class="carousel-control-prev-icon" aria-hidden="true" style="filter: invert(100%);"></span>
        <span class="visually-hidden">Anterior</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#carouselRopaLargo" data-bs-slide="next" style="width: 7%;">
        <span class="carousel-control-next-icon" aria-hidden="true" style="filter: invert(100%);"></span>
        <span class="visually-hidden">Siguiente</span>
    </button>
</div>



<!-- carrusel inferior -->
<div class="container mt-5">
                <div class="card p-4">
                    <div class="container-fluid mt-1 p-1">
                        <div id="carouselExampleAutoplaying" class="carousel carousel-dark slide" data-bs-ride="carousel" data-bs-interval="10000">
                        <div class="carousel-inner" >
                            <div class="carousel-item active">
                                <img src="{{ asset('banner slider/banner1.jpeg') }}"
                                    class="d-block w-100"
                                    style="height: auto; object-fit: contain;"
                                    alt="Banner 1">
                            </div>
                        </div>
                        <div class="carousel-item">
                            <img src="{{ asset('banner slider/banner2.jpeg') }}"
                                    class="d-block w-100"
                                    style="height: auto; object-fit: contain;"
                                    alt="Banner 1"></div>
                        <div class="carousel-item">
                            <img src="{{ asset('banner slider/banner3.jpeg') }}"
                                    class="d-block w-100"
                                    style="height: auto; object-fit: contain;"
                                    alt="Banner 1"></div>
                        <div class="carousel-item">
                            <img src="{{ asset('banner slider/banner4.jpeg') }}"
                                    class="d-block w-100"
                                    style="height: auto; object-fit: contain;"
                                    alt="Banner 1">
                        </div>
                        <div class="carousel-item">
                            <img src="{{ asset('banner slider/banner5.jpeg') }}"
                                    class="d-block w-100"
                                    style="height: auto; object-fit: contain;"
                                    alt="Banner 1"></div>
                        <div class="carousel-item">
                            <img src="{{ asset('banner slider/banner6.jpeg') }}"
                                    class="d-block w-100"
                                    style="height: auto; object-fit: contain;"
                                    alt="Banner 1"></div>
                        <div class="carousel-item">
                            <img src="{{ asset('banner slider/banner7.jpeg') }}"
                                    class="d-block w-100"
                                    style="height: auto; object-fit: contain;"
                                    alt="Banner 1"></div>
                        <div class="carousel-item">
                            <img src="{{ asset('banner slider/banner1.jpeg') }}"
                                    class="d-block w-100"
                                    style="height: auto; object-fit: contain;"
                                    alt="Banner 1"></div>
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



<!-- Marcas -->
                <div class="container mt-4">
                <div class="row">
                    <div class="col-md-4">
                        <div class="card" style="height: 100%;"> <img src="ropa/mujer/mujer (8).jpeg"
                                class="card-img-top"
                                alt="..."
                                style="height: 100%; width: 100%; object-fit: cover;">
                            <div class="card-body text-center bg-light">
                                <h5 class="card-title fs-2">Chaqueta de Levis</h5>
                                <p class="card-text fs-3">Diseñadores de confianza</p>
                                <a href="#" class="btn btn-primary">Ver mas</a>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="card" style="height: 100%;"> <img src="ropa/mujer/mujer (2).jpeg"
                                class="card-img-top"
                                alt="..."
                                style="height: 100%; width: 100%; object-fit: cover;">
                            <div class="card-body text-center bg-light">
                                <h5 class="card-title fs-2">Poleras</h5>
                                <p class="card-text fs-3">Poleras al por mayor con descuento</p>
                                <a href="#" class="btn btn-primary">Ver mas</a>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="card" style="height: 100%;"> <img src= "ropa/mujer/mujer (1).jpeg"
                                class="card-img-top"
                                alt="..."
                                style="height: 100%; width: 100%; object-fit: cover;">
                            <div class="card-body text-center bg-light">
                                <h5 class="card-title fs-2">Pulover Femenino LEUTTHE</h5>
                                <p class="card-text fs-3">Marcas de diseño que confian</p>
                                <a href="#" class="btn btn-primary">Ver mas</a>
                            </div>
                        </div>
                    </div>

                </div>
            </div>


<!-- Lista de Marcas -->

           <div class="marquee-wrapper border-top border-bottom bg-light py-4 mt-4">
                <div class="marquee-content">
                    <div class="marquee-item fs-3">LEVIS</div>
                    <div class="marquee-item fs-3">KEVINGSTON</div>
                    <div class="marquee-item fs-3">NIKE</div>
                    <div class="marquee-item fs-3">ADIDAS</div>
                    <div class="marquee-item fs-3">PUMA</div>
                    <div class="marquee-item fs-3">LEUTTE</div>

                    <div class="marquee-item fs-3">LEVIS</div>
                    <div class="marquee-item fs-3">KEVINGSTON</div>
                    <div class="marquee-item fs-3">NIKE</div>
                    <div class="marquee-item fs-3">ADIDAS</div>
                    <div class="marquee-item fs-3">PUMA</div>
                    <div class="marquee-item fs-3">LEUTTE</div>

                    <div class="marquee-item fs-3">LEVIS</div>
                    <div class="marquee-item fs-3">KEVINGSTON</div>
                    <div class="marquee-item fs-3">NIKE</div>
                    <div class="marquee-item fs-3">ADIDAS</div>
                    <div class="marquee-item fs-3">PUMA</div>
                    <div class="marquee-item fs-3">LEUTTE</div>

                    <div class="marquee-item fs-3">LEVIS</div>
                    <div class="marquee-item fs-3">KEVINGSTON</div>
                    <div class="marquee-item fs-3">NIKE</div>
                    <div class="marquee-item fs-3">ADIDAS</div>
                    <div class="marquee-item fs-3">PUMA</div>
                    <div class="marquee-item fs-3">LEUTTE</div>
                </div>
            </div>


            <script src="{{ asset('vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
</div></div></div>
            <div class=" mt-3">
                @include('footer')
            </div>
        </body>

</html>
