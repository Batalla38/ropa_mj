<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <title>Producto</title>
        <link rel="stylesheet" href="{{asset('vendor/bootstrap/css/bootstrap.min.css')}}">


        <h1></h1>   
    </head>

    <body>
         <div class="container mt-3">
                @include('header')
            </div>
 
            @extends('layouts.app') {{-- O el layout que uses --}}

            @section('content')
            <div class="container my-5">
                <div class="row">
                    <div class="col-md-7">
                        <div class="row g-2">
                            <div class="col-6">
                                <img src="{{ asset('img/remera-frente.jpg') }}" class="img-fluid border rounded" alt="Frente del producto">
                            </div>
                            <div class="col-6">
                                <img src="{{ asset('img/remera-espalda.jpg') }}" class="img-fluid border rounded" alt="Espalda del producto">
                            </div>
                            <div class="col-12 mt-2">
                                <img src="{{ asset('img/remera-detalle.jpg') }}" class="img-fluid border rounded" alt="Detalle tela">
                            </div>
                        </div>
                    </div>

                    <div class="col-md-5 ps-md-5">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="#">Inicio</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Tenis</li>
                            </ol>
                        </nav>

                        <h1 class="h2 fw-bold">Remera Tenis adidas Club Mujer Climacool</h1>
                        <p class="text-muted small">Item No. ADJN7094</p>

                        <div class="pricing my-4">
                            <h2 class="fw-bold text-dark">$59.999</h2>
                            <p class="text-muted mb-1 small">Precio sin impuestos nacionales: $49.586</p>
                            <div class="p-3 bg-light border rounded">
                                <p class="mb-0 text-success fw-semibold">Cuotas habituales</p>
                                <p class="mb-0">2 Cuotas sin interés de <strong>$30.000</strong></p>
                                <div class="mt-2">
                                    <img src="https://img.icons8.com/color/35/visa.png" alt="Visa">
                                    <img src="https://img.icons8.com/color/35/mastercard.png" alt="Mastercard">
                                    <img src="https://img.icons8.com/color/35/amex.png" alt="Amex">
                                </div>
                            </div>
                        </div>

                        <div class="mb-4">
                            <label class="form-label fw-bold">Seleccioná talle (ARG):</label>
                            <div class="d-flex flex-wrap gap-2">
                                @foreach(['XXS', 'XS', 'S', 'M', 'L', 'XL', 'XXL'] as $talle)
                                    <input type="radio" class="btn-check" name="talle" id="talle-{{ $talle }}" autocomplete="off">
                                    <label class="btn btn-outline-dark px-3" for="talle-{{ $talle }}">{{ $talle }}</label>
                                @endforeach
                            </div>
                            <div class="mt-3">
                                <a href="#" class="text-dark small text-decoration-underline me-3"><i class="bi bi-person-walking"></i> Probador Virtual</a>
                                <a href="#" class="text-dark small text-decoration-underline"><i class="bi bi-rulers"></i> Tabla de talles</a>
                            </div>
                        </div>

                        <div class="d-grid gap-2 mb-4">
                            <button class="btn btn-dark btn-lg fw-bold py-3" type="button">AGREGAR AL CARRITO</button>
                        </div>

                        <div class="row g-2">
                            <div class="col-6">
                                <div class="card h-100 text-center p-2 border-dark">
                                    <i class="bi bi-shop h3"></i>
                                    <p class="small mb-0 fw-bold">Retiro</p>
                                    <span class="x-small text-muted">Seleccioná talle</span>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="card h-100 text-center p-2 border-dark">
                                    <i class="bi bi-truck h3"></i>
                                    <p class="small mb-0 fw-bold">Envío</p>
                                    <span class="x-small text-muted">A domicilio</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endsection

        <div class="container mt-4">
                @include('footer')
            </div>
    </body>
    
<html>
