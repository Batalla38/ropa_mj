crud
creat
remove eliminar
update editar
delete borrar

<!DOCTYPE html>
<html>
    <head>
        <title>Gestión de Consultas</title>
        <link rel="stylesheet" href="{{ asset('vendor/bootstrap/css/bootstrap.min.css') }}">
        <style>
            body {
                background-color: #c1a391;
                color: #9f9393;
                background-image: url(bg1.png);
                background-repeat: repeat;
                background-size: 700px;
            }
        </style>
    </head>
    <body>
        <div class="container-fluid bg-light py-4 border-bottom">
            <div class="container">
                @include('header')
            </div>
        </div>
        <div class="container mt-2 pt-2 mb-3">
        </div>


        <div class="container mt-2 bg-light rounded shadow-sm d-flex  align-items-center" style="min-height: 50px;">
            <div class="container text-center">
            <div class="row align-items-start">
                <div class="col">
                Nombre
                </div>
                <div class="col">
                Descripción
                </div>
                <div class="col">
                Talles
                </div>
                <div class="col">
                Precio
                </div>
                <div class="col">
                Stock
                </div>
                <div class="col">
                Metodo de Pago
                </div>
                <div class="col">
                    Acciones
                </div>
            </div>
            </div>
        </div>

        <div class="container mt-2 bg-light rounded shadow-sm d-flex  align-items-center" style="min-height: 50px;">
            <div class="container text-center">
            <div class="row align-items-start">
                <div class="col">
                Nombre
                </div>
                <div class="col">
                Descripción
                </div>
                <div class="col">
                Talles
                </div>
                <div class="col">
                Precio
                </div>
                <div class="col">
                Stock
                </div>
                <div class="col">
                Metodo de Pago
                </div>
                <div class="col">
                    <div class="btn-group" role="group" aria-label="Basic mixed styles example">
                    <button type="button" class="btn btn-danger">Eliminar</button>
                    <button type="button" class="btn btn-warning">Editar</button>
                    <button type="button" class="btn btn-success">Activo</button>
                    </div>
                </div>
            </div>
            </div>
        </div>


        <div class="container mt-2 bg-light rounded shadow-sm d-flex  align-items-center" style="min-height: 50px;">
            <div class="container text-center">
            <div class="row align-items-start">
                <div class="col">
                Nombre
                </div>
                <div class="col">
                Descripción
                </div>
                <div class="col">
                Talles
                </div>
                <div class="col">
                Precio
                </div>
                <div class="col">
                Stock
                </div>
                <div class="col">
                Metodo de Pago
                </div>
                <div class="col">
                    <div class="btn-group" role="group" aria-label="Basic mixed styles example">
                    <button type="button" class="btn btn-danger">Eliminar</button>
                    <button type="button" class="btn btn-warning">Editar</button>
                    <button type="button" class="btn btn-success">Activo</button>
                    </div>
                </div>
            </div>
            </div>
        </div>

        <div class="container mt-2 bg-light rounded shadow-sm d-flex  align-items-center" style="min-height: 50px;">
            <div class="container text-center">
            <div class="row align-items-start">
                <div class="col">
                Nombre
                </div>
                <div class="col">
                Descripción
                </div>
                <div class="col">
                Talles
                </div>
                <div class="col">
                Precio
                </div>
                <div class="col">
                Stock
                </div>
                <div class="col">
                Metodo de Pago
                </div>
                <div class="col">
                    <div class="btn-group" role="group" aria-label="Basic mixed styles example">
                    <button type="button" class="btn btn-danger">Eliminar</button>
                    <button type="button" class="btn btn-warning">Editar</button>
                    <button type="button" class="btn btn-success">Activo</button>
                    </div>
                </div>
            </div>
            </div>
        </div>







        <script src="{{ asset('vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
        <div class="mt-3">
            @include('footer')
        </div>
    </body>
</html>

