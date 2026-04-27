<!DOCTYPE html>
<<<<<<< HEAD
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <title>Catalogo </title>
        <link rel="stylesheet" href="{{asset('vendor/bootstrap/css/bootstrap.min.css')}}">
=======
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
>>>>>>> 6bdf3c7e09334c13d146b87e275d43d2b207cfd4

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
        <div class="container mt-3">
                @include('header')
            </div>

        <div class="container mt-3 mb-4" >
            @include('header')
        </div>




        <div class="container-fluid mt-5 py-4">
    <div class="row">
        <div class="col-md-3">
            <div class="sticky-top" style="top: 20px; z-index: 1000;">
                <div class="p-4 bg-white shadow-sm border rounded">
                    <h5 class="fw-bold mb-3">Filtros</h5>
                    <label class="form-label text-muted small">Categoría</label>
                    <select class="form-select" aria-label="Default select example">
                        <option selected>Todos los productos</option>
                        <option value="1">Hombre</option>
                        <option value="2">Mujer</option>
                        <option value="3">Niños</option>
                    </select>
                </div>
            </div>
        </div>

<<<<<<< HEAD
                <div class="container mt-5">
                    <div class="row">
                        
                        <div class="col-md-4 col-sm-12">
                            <div id="carouselCol1" class="carousel slide" data-bs-ride="carousel">
                                <div class="carousel-inner">
                                    <div class="carousel-item active">
                                        <img src="{{ asset('jeans.jpg') }}" class="d-block w-100" alt="...">
                                    </div>
                                    <div class="carousel-item">
                                        <img src="{{ asset('remerA.jpg') }}" class="d-block w-100" alt="...">
                                    </div>
                                </div>
                                <button class="carousel-control-prev" type="button" data-bs-target="#carouselCol1" data-bs-slide="prev">
                                    <span class="carousel-control-prev-icon" aria-hidden="true" style="filter: invert(1);"></span>
                                </button>
                                <button class="carousel-control-next" type="button" data-bs-target="#carouselCol1" data-bs-slide="next">
                                    <span class="carousel-control-next-icon" aria-hidden="true" style="filter: invert(1);"></span>
                                </button>
                            </div>
                            <div class="mt-3 text-center">
                                <h5 class="text-dark fw-bold">Outfit Hombre</h5>
                                <p class="text-muted small">Outfit Adidas Masculino.</p>
                                <p class="text-black fw-bold fs-5">$150.000</p>
                            </div>
                        </div>

                        <div class="col-md-4 col-sm-12">
                            <div id="carouselCol2" class="carousel slide" data-bs-ride="carousel">
                                <div class="carousel-inner">
                                    <div class="carousel-item active">
                                        <img src="{{ asset('remerA.jpg') }}" class="d-block w-100" alt="...">
                                    </div>
                                    <div class="carousel-item">
                                        <img src="{{ asset('jeans.jpg') }}" class="d-block w-100" alt="...">
                                    </div>
=======


        <div class="col-md-9">

            <div class="row g-4 mb-5">
                <div class="col-md-4">
                    <div class="card h-100 shadow-sm border-0">
                        <div id="carouselCol1" class="carousel slide" data-bs-ride="false">
                            <div class="carousel-inner">
                                <div class="carousel-item active">
                                    <img src="{{ asset('jeans.jpg') }}" class="card-img-top" alt="Jeans Hombre">
                                </div>
                                <div class="carousel-item">
                                    <img src="{{ asset('remerA.jpg') }}" class="card-img-top" alt="Remera Hombre">
>>>>>>> 6bdf3c7e09334c13d146b87e275d43d2b207cfd4
                                </div>
                            </div>
                            <button class="carousel-control-prev" type="button" data-bs-target="#carouselCol1" data-bs-slide="prev">
                                <span class="carousel-control-prev-icon" aria-hidden="true" style="filter: invert(1);"></span>
                            </button>
                            <button class="carousel-control-next" type="button" data-bs-target="#carouselCol1" data-bs-slide="next">
                                <span class="carousel-control-next-icon" aria-hidden="true" style="filter: invert(1);"></span>
                            </button>
                        </div>
<<<<<<< HEAD

                        <div class="col-md-4 col-sm-12">
                            <div id="carouselCol3" class="carousel slide" data-bs-ride="carousel">
                                <div class="carousel-inner">
                                    <div class="carousel-item active">
                                        <img src="{{ asset('ropaNiños.jfif') }}" class="d-block w-100" alt="...">
                                    </div>
                                    <div class="carousel-item">
                                        <img src="{{ asset('remerA.jpg') }}" class="d-block w-100" alt="...">
                                    </div>
                                </div>
                                <button class="carousel-control-prev" type="button" data-bs-target="#carouselCol3" data-bs-slide="prev">
                                    <span class="carousel-control-prev-icon" aria-hidden="true" style="filter: invert(1);"></span>
                                </button>
                                <button class="carousel-control-next" type="button" data-bs-target="#carouselCol3" data-bs-slide="next">
                                    <span class="carousel-control-next-icon" aria-hidden="true" style="filter: invert(1);"></span>
                                </button>
                            </div>
                            <div class="mt-3 text-center">
                                <h5 class="text-dark fw-bold">Remera Niñ@s</h5>
                                <p class="text-muted small">Remeras Nike/Adidas Niñ@@section('')
                                    
                                @show.</p>
                                <p class="text-black fw-bold fs-5">$80.900</p>
                            </div>
=======
                        <div class="card-body text-center mt-2">
                            <h5 class="text-dark fw-bold">Outfit Hombre</h5>
                            <p class="text-muted small">Outfit Adidas Masculino.</p>
                            <p class="text-black fw-bold fs-5">$150.000</p>
>>>>>>> 6bdf3c7e09334c13d146b87e275d43d2b207cfd4
                        </div>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="card h-100 shadow-sm border-0">
                        <div id="carouselCol2" class="carousel slide" data-bs-ride="false">
                            <div class="carousel-inner">
                                <div class="carousel-item active">
                                    <img src="{{ asset('remerA.jpg') }}" class="card-img-top" alt="Remera Mujer">
                                </div>
                                <div class="carousel-item">
                                    <img src="{{ asset('jeans.jpg') }}" class="card-img-top" alt="Jeans Mujer">
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
                            <h5 class="text-dark fw-bold">Outfit Mujer</h5>
                            <p class="text-muted small">Outfit de Dama Nike.</p>
                            <p class="text-black fw-bold fs-5">$200.500</p>
                        </div>
                    </div>
                </div>

<<<<<<< HEAD
            <script src="{{ asset('vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

            <div class="container mt-4">
                @include('footer')
            </div>
=======
                <div class="col-md-4">
                    <div class="card h-100 shadow-sm border-0">
                        <div id="carouselCol3" class="carousel slide" data-bs-ride="false">
                            <div class="carousel-inner">
                                <div class="carousel-item active">
                                    <img src="{{ asset('ropaNiños.jfif') }}" class="card-img-top" alt="Ropa Niños">
                                </div>
                                <div class="carousel-item">
                                    <img src="{{ asset('remerA.jpg') }}" class="card-img-top" alt="Remera Niños">
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
                            <h5 class="text-dark fw-bold">Remera Niñ@s</h5>
                            <p class="text-muted small">Remeras Nike/Adidas Niñ@s.</p>
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
                                    <img src="{{ asset('jeans.jpg') }}" class="card-img-top" alt="Jeans Hombre">
                                </div>
                                <div class="carousel-item">
                                    <img src="{{ asset('remerA.jpg') }}" class="card-img-top" alt="Remera Hombre">
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
                            <p class="text-muted small">Outfit Adidas Masculino.</p>
                            <p class="text-black fw-bold fs-5">$150.000</p>
                        </div>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="card h-100 shadow-sm border-0">
                        <div id="carouselCol5" class="carousel slide" data-bs-ride="false">
                            <div class="carousel-inner">
                                <div class="carousel-item active">
                                    <img src="{{ asset('remerA.jpg') }}" class="card-img-top" alt="Remera Mujer">
                                </div>
                                <div class="carousel-item">
                                    <img src="{{ asset('jeans.jpg') }}" class="card-img-top" alt="Jeans Mujer">
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
                            <h5 class="text-dark fw-bold">Outfit Mujer</h5>
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
                                    <img src="{{ asset('ropaNiños.jfif') }}" class="card-img-top" alt="Ropa Niños">
                                </div>
                                <div class="carousel-item">
                                    <img src="{{ asset('remerA.jpg') }}" class="card-img-top" alt="Remera Niños">
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
                            <h5 class="text-dark fw-bold">Remera Niñ@s</h5>
                            <p class="text-muted small">Remeras Nike/Adidas Niñ@s.</p>
                            <p class="text-black fw-bold fs-5">$80.900</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card h-100 shadow-sm border-0">
                        <div id="carouselCol6" class="carousel slide" data-bs-ride="false">
                            <div class="carousel-inner">
                                <div class="carousel-item active">
                                    <img src="{{ asset('ropaNiños.jfif') }}" class="card-img-top" alt="Ropa Niños">
                                </div>
                                <div class="carousel-item">
                                    <img src="{{ asset('remerA.jpg') }}" class="card-img-top" alt="Remera Niños">
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
                            <h5 class="text-dark fw-bold">Remera Niñ@s</h5>
                            <p class="text-muted small">Remeras Nike/Adidas Niñ@s.</p>
                            <p class="text-black fw-bold fs-5">$80.900</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card h-100 shadow-sm border-0">
                        <div id="carouselCol6" class="carousel slide" data-bs-ride="false">
                            <div class="carousel-inner">
                                <div class="carousel-item active">
                                    <img src="{{ asset('ropaNiños.jfif') }}" class="card-img-top" alt="Ropa Niños">
                                </div>
                                <div class="carousel-item">
                                    <img src="{{ asset('remerA.jpg') }}" class="card-img-top" alt="Remera Niños">
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
                            <h5 class="text-dark fw-bold">Remera Niñ@s</h5>
                            <p class="text-muted small">Remeras Nike/Adidas Niñ@s.</p>
                            <p class="text-black fw-bold fs-5">$80.900</p>
                        </div>
                    </div>
                </div>
                <d<div class="col-md-4">
                    <div class="card h-100 shadow-sm border-0">
                        <div id="carouselCol2" class="carousel slide" data-bs-ride="false">
                            <div class="carousel-inner">
                                <div class="carousel-item active">
                                    <img src="{{ asset('remerA.jpg') }}" class="card-img-top" alt="Remera Mujer">
                                </div>
                                <div class="carousel-item">
                                    <img src="{{ asset('jeans.jpg') }}" class="card-img-top" alt="Jeans Mujer">
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
                            <h5 class="text-dark fw-bold">Outfit Mujer</h5>
                            <p class="text-muted small">Outfit de Dama Nike.</p>
                            <p class="text-black fw-bold fs-5">$200.500</p>
                        </div>
                    </div>
                </div>
            </div>



        </div> </div> </div>



1.  **`sticky-top`**: Esta es la clave. Al poner el contenedor del filtro dentro de un `div` con `sticky-top`, el filtro "flotará" y te seguirá mientras haces scroll hacia abajo por los productos.
2.  **Estructura de Columnas**: He separado claramente la columna del filtro (`col-md-3`) de la del catálogo (`col-md-9`). Esto garantiza que los cuadros de ropa nunca se muevan de su lugar ni se mezclen con el filtro.
3.  **Corrección de IDs de Carrusel**: En la segunda sección, cambié los IDs de `carouselCol1` a `carouselCol4` (y así sucesivamente). Si dejas el mismo nombre, cuando alguien haga clic en la flecha de la segunda fila, se movería la imagen de la primera fila. ¡Ahora cada uno es independiente!



        <script src="{{ asset('vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
        <div class="container mt-5"  >
            @include('footer')
        </div>
>>>>>>> 6bdf3c7e09334c13d146b87e275d43d2b207cfd4
    </body>
<html>
