<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <title>Productos </title>
        <link rel="stylesheet" href="{{asset('vendor/bootstrap/css/bootstrap.min.css')}}">


        <h1></h1>   
    </head>
    <body>

        <div class="container mt-5"> <div class="card p-4">
            
            <div id="carouselExampleCaptions" class="carousel slide">
                <div class="carousel-indicators">
                    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
                    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" aria-label="Slide 3"></button>
                </div>
                <div class="carousel-inner">
                    <div class="carousel-item active">
                    <img src="ropaNiños.jfif" class="d-block w-100" alt="50">
                    <div class="carousel-caption d-none d-md-block">
                        <h5 class="text-dark fs-1">La ropa mas canchera para los Peques</h5>
                        <p class="text-danger fw-bold fs-5">Aquí encontraras la ropa mas canchera para vestir a tus Peques.</p>
                    </div>
                    </div>
                    <div class="carousel-item">
                    <img src="remerA.jpg" class="d-block w-100" alt="50">
                    <div class="carousel-caption d-none d-md-block">
                        <h5 class="text-dark fs-1">Casual & Elegante</h5>
                        <p class="text-danger fw-bold fs-5">Aquí encontraras vestimenta muy elegante y casual para lucir bien en todas las ocaciones</p>
                    </div>
                    </div>
                    <div class="carousel-item">
                    <img src="jeans.jpg" class="d-block w-100" alt="50">
                    <div class="carousel-caption d-none d-md-block">
                        <h5 class="text-dark fs-1">Jeans</h5>
                        <p class="text-danger fw-bold fs-5">Toda la comidad y estilo en Jeans para Hombres y Mujeres</p>
                    </div>
                    </div>
                </div>
                <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                </button>
                </div>

                <div class="container mt-5">
                    <div class="row">
                        
                        <div class="col-md-4">
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

                        <div class="col-md-4">
                            <div id="carouselCol2" class="carousel slide" data-bs-ride="carousel">
                                <div class="carousel-inner">
                                    <div class="carousel-item active">
                                        <img src="{{ asset('remerA.jpg') }}" class="d-block w-100" alt="...">
                                    </div>
                                    <div class="carousel-item">
                                        <img src="{{ asset('jeans.jpg') }}" class="d-block w-100" alt="...">
                                    </div>
                                </div>
                                <button class="carousel-control-prev" type="button" data-bs-target="#carouselCol2" data-bs-slide="prev">
                                    <span class="carousel-control-prev-icon" aria-hidden="true" style="filter: invert(1);"></span>
                                </button>
                                <button class="carousel-control-next" type="button" data-bs-target="#carouselCol2" data-bs-slide="next">
                                    <span class="carousel-control-next-icon" aria-hidden="true" style="filter: invert(1);"></span>
                                </button>
                            </div>
                            <div class="mt-3 text-center">
                                <h5 class="text-dark fw-bold">Outfit Mujer</h5>
                                <p class="text-muted small"> Outfit de Dama Nike.</p>
                                <p class="text-black fw-bold fs-5">$200.500</p>
                            </div>
                        </div>

                        <div class="col-md-4">
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
                        </div>

                    </div>
                </div>
                <div class="container mt-5">
                    <div class="row">
                        
                        <div class="col-md-4">
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

                        <div class="col-md-4">
                            <div id="carouselCol2" class="carousel slide" data-bs-ride="carousel">
                                <div class="carousel-inner">
                                    <div class="carousel-item active">
                                        <img src="{{ asset('remerA.jpg') }}" class="d-block w-100" alt="...">
                                    </div>
                                    <div class="carousel-item">
                                        <img src="{{ asset('jeans.jpg') }}" class="d-block w-100" alt="...">
                                    </div>
                                </div>
                                <button class="carousel-control-prev" type="button" data-bs-target="#carouselCol2" data-bs-slide="prev">
                                    <span class="carousel-control-prev-icon" aria-hidden="true" style="filter: invert(1);"></span>
                                </button>
                                <button class="carousel-control-next" type="button" data-bs-target="#carouselCol2" data-bs-slide="next">
                                    <span class="carousel-control-next-icon" aria-hidden="true" style="filter: invert(1);"></span>
                                </button>
                            </div>
                            <div class="mt-3 text-center">
                                <h5 class="text-dark fw-bold">Outfit Mujer</h5>
                                <p class="text-muted small"> Outfit de Dama Nike.</p>
                                <p class="text-black fw-bold fs-5">$200.500</p>
                            </div>
                        </div>

                        <div class="col-md-4">
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
                        </div>

                    </div>
                </div>

                

            <script src="{{ asset('vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    </body>
<html>
