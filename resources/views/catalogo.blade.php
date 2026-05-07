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
            background-color:  #efefefef; /* Fondo blanco para las tarjetas */
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

        <div class="container mt-3 mb-4" >
            @include('header')
        </div>


        <div class="container-fluid mt-5 py-4">
            <div class="row">

                <div class="col-md-3">
                    <div class="sticky-top" style="top: 20px; z-index: 1000;">
                        <div class="p-4 bg-white shadow-sm border rounded">
                            <h5 class="fw-bold mb-3">Genero</h5>
                            <label class="form-label text-muted small"></label>
                            <select class="form-select" aria-label="Default select example">
                                <option selected>Todos los productos</option>
                                <option value="1">Hombre</option>
                                <option value="2">Mujer</option>
                                <option value="3">Unisex</option>
                            </select>
                        </div>
                    </div>
                    <div class="p-3 bg-white border rounded  mb-0">

                        <div class="card-body">

                            <div class="form-check form-switch">
                                <input class="form-check-input" type="checkbox" role="switch" id="switchCheckDefault">
                                <label class="form-check-label text-dark" for="switchCheckDefault "><h5 class="card-title text-dark">Retiro de Sucursal</h5></label>
                            </div>

                        </div>
                    </div>
                    <div class="p-3 bg-white border rounded  mb-0">

                        <div class="card-body">

                            <div class="form-check form-switch">
                                <input class="form-check-input" type="checkbox" role="switch" id="switchCheckDefault">
                                <label class="form-check-label text-dark" for="switchCheckDefault "><h5 class="card-title text-dark">Envio a Domicilio</h5></label>
                            </div>

                        </div>
                    </div>

            <div class="p-3 bg-white border rounded shadow-sm mb-0">
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
                            <h5 class="fw-bold mb-1">Temporadas</h5>
                            <label class="form-label text-muted small"></label>
                            <select class="form-select" aria-label="Default select example">
                                <option selected>Todos los productos</option>
                                <option value="1">Verano</option>
                                <option value="2">Invierno</option>
                                <option value="3">Otoño</option>
                                <option value="3">Primavera</option>
                            </select>
                        </div>
                        <div class="p-4 bg-white shadow-sm border rounded">
                            <h5 class="fw-bold mb-1">Categoria</h5>
                            <label class="form-label text-muted small"></label>
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

                        <!-- 1. Agregamos controles (flechas) para que puedas cambiar la imagen manualmente -->
                        <div id="carouselCol1" class="carousel slide" data-bs-ride="hover">
                            <div class="carousel-inner">

                                <!-- Primera Imagen -->
                                <div class="carousel-item active">
                                    <!-- Cambiamos card-img-top por d-block w-100 para que Bootstrap la reconozca bien -->
                                    <img src="ropa/casual/ChalecoH.jpg" class="d-block w-100" alt="Chomba Hombre Vista 1" style="height: 350px; object-fit: cover;">
                                </div>

                                <!-- Segunda Imagen -->
                                <div class="carousel-item">
                                    <img src="ropa/casual/ChalecoH2.jpg" class="d-block w-100" alt="Chomba Hombre Vista 2" style="height: 350px; object-fit: cover;">
                                </div>

                            </div>

                            <!-- 2. Botones de Control (Opcional, pero recomendados para que el usuario vea la otra foto) -->
                            <button class="carousel-control-prev" type="button" data-bs-target="#carouselCol1" data-bs-slide="prev">
                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                <span class="visually-hidden">Anterior</span>
                            </button>
                            <button class="carousel-control-next" type="button" data-bs-target="#carouselCol1" data-bs-slide="next">
                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                <span class="visually-hidden">Siguiente</span>
                            </button>
                        </div>
                        <div class="card-body text-center mt-2">
                            <h5 class="text-dark fw-bold">Chaleco</h5>
                            <p class="text-muted small">Outfit Adidas Masculino.</p>
                            <p class="text-black fw-bold fs-5">$150.000</p>
                        </div>
                    </div>
                </div>


                <div class="col-md-4">
                    <div class="card h-100 shadow-sm border-0">

                        <!-- 1. Agregamos controles (flechas) para que puedas cambiar la imagen manualmente -->
                        <div id="carouselCol1" class="carousel slide" data-bs-ride="hover">
                            <div class="carousel-inner">

                                <!-- Primera Imagen -->
                                <div class="carousel-item active">
                                    <!-- Cambiamos card-img-top por d-block w-100 para que Bootstrap la reconozca bien -->
                                    <img src="ropa/casual/ChombaLargaH.jpg" class="d-block w-100" alt="Chomba Hombre Vista 1" style="height: 350px; object-fit: cover;">
                                </div>

                                <!-- Segunda Imagen -->
                                <div class="carousel-item">
                                    <img src="ropa/casual/ChombaLargaH1.jpg" class="d-block w-100" alt="Chomba Hombre Vista 2" style="height: 350px; object-fit: cover;">
                                </div>

                            </div>

                            <!-- 2. Botones de Control (Opcional, pero recomendados para que el usuario vea la otra foto) -->
                            <button class="carousel-control-prev" type="button" data-bs-target="#carouselCol1" data-bs-slide="prev">
                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                <span class="visually-hidden">Anterior</span>
                            </button>
                            <button class="carousel-control-next" type="button" data-bs-target="#carouselCol1" data-bs-slide="next">
                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                <span class="visually-hidden">Siguiente</span>
                            </button>
                        </div>
                        <div class="card-body text-center mt-2">
                            <h5 class="text-dark fw-bold">Chomba Larga </h5>
                            <p class="text-muted small">Outfit Adidas Masculino.</p>
                            <p class="text-black fw-bold fs-5">$150.000</p>
                        </div>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="card h-100 shadow-sm border-0">

                        <!-- 1. Agregamos controles (flechas) para que puedas cambiar la imagen manualmente -->
                        <div id="carouselCol1" class="carousel slide" data-bs-ride="hover">
                            <div class="carousel-inner">

                                <!-- Primera Imagen -->
                                <div class="carousel-item active">
                                    <!-- Cambiamos card-img-top por d-block w-100 para que Bootstrap la reconozca bien -->
                                    <img src="ropa/casual/JeanH.jpg" class="d-block w-100" alt="Chomba Hombre Vista 1" style="height: 350px; object-fit: cover;">
                                </div>

                                <!-- Segunda Imagen -->
                                <div class="carousel-item">
                                    <img src="ropa/casual/JeanH2.jpg" class="d-block w-100" alt="Chomba Hombre Vista 2" style="height: 350px; object-fit: cover;">
                                </div>

                            </div>

                            <!-- 2. Botones de Control (Opcional, pero recomendados para que el usuario vea la otra foto) -->
                            <button class="carousel-control-prev" type="button" data-bs-target="#carouselCol1" data-bs-slide="prev">
                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                <span class="visually-hidden">Anterior</span>
                            </button>
                            <button class="carousel-control-next" type="button" data-bs-target="#carouselCol1" data-bs-slide="next">
                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                <span class="visually-hidden">Siguiente</span>
                            </button>
                        </div>
                        <div class="card-body text-center mt-2">
                            <h5 class="text-dark fw-bold">Chomba Larga </h5>
                            <p class="text-muted small">Outfit Adidas Masculino.</p>
                            <p class="text-black fw-bold fs-5">$150.000</p>
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
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

        <div class= " mt-3">
                @include('footer')
        </div>
    </body>
<html>
