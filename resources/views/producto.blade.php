<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <title>Producto Especifico</title>
        <link rel="stylesheet" href="{{asset('vendor/bootstrap/css/bootstrap.min.css')}}">
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
                        <div class="col-6">
                            <img src="ropa Hombre/ConjuntoRayasH.jpg" class="img-fluid w-75 d-block mx-auto" alt="conjunto de rayas">
                        </div>
                        <div class="col-6">
                            <div class="card border-0">
                                <div class="card-body">
                                    <h5 class="card-title">Conjunto a Rayas</h5>
                                    <p class="card-text">Conjunto de Lino de Hombre, rayado especial traifo de la india. Disponible en varios colores, caqui, blanco, morado.</p>
                                    <a href="#" class="btn btn-primary">Comprar</a>
                                </div>
                            </div>
                        </div>
                        </div>
                    </div>

                </div>

                @include('footer')

    </body>

<html>
