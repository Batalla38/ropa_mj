<!DOCTYPE html>
    <html>
        <head>
            <title>Quienes Somos</title>
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
            <div class="container mt-3">
                @include('header')
            </div>
                <div class="container mt-5"><div class="card p-4">
                    <p class="h1">¿Quienes Somos?</p>
                        <hr> <p class= "fs-4">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Accusamus,
                            optio aspernatur esse sit recusandae labore fuga natus nemo maxime
                            rerum molestias aut dignissimos pariatur debitis expedita animi suscipit cum inventore?
                            Lorem ipsum dolor sit amet, consectetur adipisicing elit. Accusamus,
                            optio aspernatur esse sit recusandae labore fuga natus nemo maxime
                            rerum molestias aut dignissimos pariatur debitis expedita animi suscipit cum inventore?</p>
                    <p class="h2">Misión: </p>
                        <hr> <p class= "fs-4">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Accusamus,
                            optio aspernatur esse sit recusandae labore fuga natus nemo maxime
                            rerum molestias aut dignissimos pariatur debitis expedita animi suscipit cum inventore?
                            Lorem ipsum dolor sit amet, consectetur adipisicing elit. Accusamus,
                            optio aspernatur esse sit recusandae labore fuga natus nemo maxime
                            rerum molestias aut dignissimos pariatur debitis expedita animi suscipit cum inventore?</p>

                    </div>

                </div>







        <script src="{{ asset('vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
        //footer
            <div class="container mt-4">
                @include('footer')
            </div>
        </body>
</html>
