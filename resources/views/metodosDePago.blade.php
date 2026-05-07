<!DOCTYPE html>
<html>
    <head>
    <title>Metodos de Pago</title>
        <link rel="stylesheet" href="{{asset('vendor/bootstrap/css/bootstrap.min.css')}}">
        <style>
        /* Estilos globales aplicados al cuerpo del documento */
            body {
            background-color: #a39898; /* Color de fondo definido por el usuario */
            color: #9f9393;           /* Color de fuente definido por el usuario */
            }
            body {
                background-image: url(bg.png);
                background-repeat: repeat;
                background-size: 80px; /* Aquí controlas el tamaño */
                }https://images.vexels.com/media/users/3/142647/isolated/preview/7975c8713e6cd70ff26097efbbebdbd1-ropa-de-camiseta.png
        </style>
    </head>

    <body>
    //header
        <div class="container mt-3 mb-4" >
                @include('header')
        </div>



        <div class="container mt-5">
            <div class="p-4 bg-white border rounded shadow-sm">
                <div class="d-flex position-relative">
                <img src="logo_mp.png" alt="Placeholder" style="height: 130px;" >
                <div>
                    <h5 class="mt-4 display-5">Mercado Pago</h5>
                    <p class="text-dark display-6">Con compras de Mercado Pago tenes un reintegro del 15% por cada unidad comprada</p>

                </div>
                </div>
            </div>
        </div>

        <div class="container mt-2">
            <div class="p-4 bg-white border rounded shadow-sm">
                <div class="d-flex position-relative">

                <img src="logo_Naranja.png" alt="Placeholder style="height: 190px;">
                <div>
                    <h5 class="mt-4 display-5">Targeta Naranja</h5>
                    <p class="text-dark display-6">Con compras de Mercado Pago tenes un reintegro del 10% por cada unidad comprada</p>
                </div>
                </div>
            </div>
        </div>

        <div class="container mt-2">
            <div class="p-4 bg-white border rounded shadow-sm">
                <div class="d-flex position-relative">
                <img src="Mastercard-logo.png" alt="mastercard" style="height: 190px; width: auto;">
                <div>
                    <h5 class="mt-4 display-5">Mastercard</h5>
                    <p class="text-dark display-6">Con compras de Mercado Pago tenes un reintegro del 5% por cada unidad comprada y hasta 3 cuotas sin intereses</p>

                </div>
                </div>
            </div>
        </div>

        <div class="container mt-2">
            <div class="p-4 bg-white border rounded shadow-sm">
                <div class="d-flex position-relative">
                <img src="visa-logo.png" alt="mastercard" style="height: 190px; width: auto;">
                <div>
                    <h5 class="mt-4 display-6">Visa</h5>
                    <p class="text-dark display-6">Con compras de Mercado Pago tenes un reintegro del 34% por cada unidad comprada y hasta 6 cuotas sin intereses</p>

                </div>
                </div>
            </div>
        </div>


                <div class=" mt-3">
                @include('footer')
                </div>
</body>

</html>
