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
                <img src="jeans.jpg" class="flex-shrink-0 me-3" alt="Placeholder">
                <div>
                    <h5 class="mt-4">Mercado Pago</h5>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Accusamus,
                        optio aspernatur esse sit recusandae labore fuga natus nemo maxime
                        rerum molestias aut dignissimos pariatur debitis expedita animi suscipit cum inventore?
                        Lorem ipsum dolor sit amet, consectetur adipisicing elit. Accusamus,
                        optio aspernatur esse sit recusandae labore fuga natus nemo maxime
                        rerum molestias aut dignissimos pariatur debitis expedita animi suscipit cum inventore?</p>

                </div>
                </div>
            </div>
        </div>

        <div class="container mt-2">
            <div class="p-4 bg-white border rounded shadow-sm">
                <div class="d-flex position-relative">
                <img src="jeans.jpg" class="flex-shrink-0 me-3" alt="Placeholder">
                <div>
                    <h5 class="mt-4">Narana X</h5>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Accusamus,
                        optio aspernatur esse sit recusandae labore fuga natus nemo maxime
                        rerum molestias aut dignissimos pariatur debitis expedita animi suscipit cum inventore?
                        Lorem ipsum dolor sit amet, consectetur adipisicing elit. Accusamus,
                        optio aspernatur esse sit recusandae labore fuga natus nemo maxime
                        rerum molestias aut dignissimos pariatur debitis expedita animi suscipit cum inventore?</p>
                </div>
                </div>
            </div>
        </div>

        <div class="container mt-2">
            <div class="p-4 bg-white border rounded shadow-sm">
                <div class="d-flex position-relative">
                <img src="jeans.jpg" class="flex-shrink-0 me-3" alt="Placeholder">
                <div>
                    <h5 class="mt-4">Banco Corrientes</h5>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Accusamus,
                        optio aspernatur esse sit recusandae labore fuga natus nemo maxime
                        rerum molestias aut dignissimos pariatur debitis expedita animi suscipit cum inventore?
                        Lorem ipsum dolor sit amet, consectetur adipisicing elit. Accusamus,
                        optio aspernatur esse sit recusandae labore fuga natus nemo maxime
                        rerum molestias aut dignissimos pariatur debitis expedita animi suscipit cum inventore?</p>
                </div>
                </div>
            </div>
        </div>




        <footer class="mt-4">
            <div class="container mt-4"  >
                @include('footer')
            </div>
        </footer>
</body>

</html>
