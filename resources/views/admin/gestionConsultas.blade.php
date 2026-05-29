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
        <div class="container mt-3 mb-5">
            @include('header')
        </div>

        <div class="container mt-5 mb-4">
            <div class="row row-cols-1 row-cols-sm-2 row-cols-md-4 g-3">
                <div class="col">
                    <div class="p-3 bg-light border text-dark">Columna 1</div>
                </div>
                <div class="col">
                    <div class="p-3 bg-light border text-dark">Columna 2</div>
                </div>
                <div class="col">
                    <div class="p-3 bg-light border text-dark">Columna 3</div>
                </div>
                <div class="col">
                    <div class="p-3 bg-light border text-dark">Columna 4</div>
                </div>
            </div>
        </div> <script src="{{ asset('vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

        <div class="mt-3">
            @include('footer') </div>
    </body>
</html>
