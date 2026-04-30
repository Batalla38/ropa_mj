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

            <div class="container mt-5"> <div class="card p-4">
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

                <div class="container mt-4">
                <div class="row">
                    <div class="col-md-4">
                        <div class="card" style="height: 100%;"> <img src="ropa Hombre/JeanH.jpg"
                                class="card-img-top"
                                alt="..."
                                style="height: 100%; width: 100%; object-fit: cover;">
                            <div class="card-body">
                                <p class="card-text fs-3">Jean</p>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="card" style="height: 100%;"> <img src="ropa Hombre/SueterPolarH.jpg"
                                class="card-img-top"
                                alt="..."
                                style="height: 100%; width: 100%; object-fit: cover;">
                            <div class="card-body">
                                <p class="card-text fs-3">Sueter Polar</p>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="card" style="height: 100%;"> <img src="ropa Hombre/ConjuntoRayasH.jpg"
                                class="card-img-top"
                                alt="..."
                                style="height: 100%; width: 100%; object-fit: cover;">
                            <div class="card-body">
                                <p class="card-text fs-3">Conjunto a Rayas</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


                <div class="container">
                <div class="row">
                    <div class="col-md-4">
                        <div class="card" style="height: 100%;"> <img src="ropa Hombre/PuloverH.jpg"
                                class="card-img-top"
                                alt="..."
                                style="height: 100%; width: 100%; object-fit: cover;">
                            <div class="card-body">
                                <p class="card-text fs-3">Pulover</p>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="card" style="height: 100%;"> <img src="ropa Hombre/BermudaH.jpg"
                                class="card-img-top"
                                alt="..."
                                style="height: 100%; width: 100%; object-fit: cover;">
                            <div class="card-body">
                                <p class="card-text fs-3">Bermuda</p>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="card" style="height: 100%;"> <img src="ropa Hombre/ShortRusticoH.jpg"
                                class="card-img-top"
                                alt="..."
                                style="height: 100%; width: 100%; object-fit: cover;">
                            <div class="card-body">
                                <p class="card-text fs-3">Short Rustico</p>
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
