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

        <div class="container mt-5 pt-2 mb-5">

        </div>

        <div class="container mt-2 bg-light rounded shadow-sm d-fl  ex align-items-center p-2">
            <div class="w-5">
                <label for="titulo" class="form-label">Titulo</label>
                <textarea class="form-control" id="titulo" name="titulo" rows="1"></textarea>
            </div>
        </div>

        <div class="container mt-2 bg-light rounded shadow-sm d-fl  ex align-items-center p-2">
            <div class="w-100">
                <label for="descripcion" class="form-label">Descripción del Producto</label>
                <textarea class="form-control" id="descripcion" name="descripcion" rows="3"></textarea>
            </div>
        </div>

        <div class="container mt-2 bg-light rounded shadow-sm d-flex  align-items-center" style="min-height: 50px;">
            <input type="checkbox" class="btn-check" id="masculino" autocomplete="off">
            <label class="btn btn-primary" for="masculino">Masculino</label>
            <input type="checkbox" class="btn-check" id="femenino" checked autocomplete="off">
            <label class="btn btn-primary" for="femenino">Femenino</label>
            <input type="checkbox" class="btn-check" id="nino" checked autocomplete="off">
            <label class="btn btn-primary" for="nino">Niño</label>
        </div>


        <div class="container mt-2 bg-light rounded shadow-sm d-flex  align-items-center" style="min-height: 50px;">
                <div class="form-check form-check-inline">
                <input class="form-check-input" type="checkbox" id="talleXL" value="option1">
                <label class="form-check-label" for="talleXL">XL</label>
                </div>
                <div class="form-check form-check-inline ">
                <input class="form-check-input" type="checkbox" id="talleX" value="option2">
                <label class="form-check-label" for="talleX">X</label>
                </div>
        </div>

        <div class="container mt-2 bg-light rounded shadow-sm d-flex  align-items-center" style="min-height: 50px;">
            <select class="form-select" aria-label="Default select example">
                <option selected>Seleccionar Metodo de Pago</option>
                <option value="1">Mercado Pago</option>
                <option value="2">Tarjeta de Naranja</option>
                <option value="3">Banco Corrientes</option>
            </select>
        </div>


        <div class="container mt-2 bg-light rounded shadow-sm d-flex  align-items-center" style="min-height: 50px;">
                <div class="input-group mb-3">
                <span class="input-group-text">$</span>
                <span class="input-group-text">0.00</span>
                <input type="text" class="form-control" aria-label="Dollar amount (with dot and two decimal places)">
                </div>
        </div>







        </div>
        <script src="{{ asset('vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
        <div class="mt-3">
            @include('footer') </div>
    </body>
</html>
