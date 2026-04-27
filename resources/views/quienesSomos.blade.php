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
            <div class="container mt-3 mb-4" >
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
                    <p class="h2">Misión: </p>
                        <hr> <p class= "fs-4">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Accusamus,
                            optio aspernatur esse sit recusandae labore fuga natus nemo maxime
                            rerum molestias aut dignissimos pariatur debitis expedita animi suscipit cum inventore?
                            Lorem ipsum dolor sit amet, consectetur adipisicing elit. Accusamus,
                            optio aspernatur esse sit recusandae labore fuga natus nemo maxime
                            rerum molestias aut dignissimos pariatur debitis expedita animi suscipit cum inventore?</p>
                </div></div>

                <div class="container mt-5">
                <div class="card p-4">
                    <div class="row align-items-center"> <div class="col-md-7">
                            <p class="h1">¿Donde estamos?</p>
                            <hr>
                            <p class="fs-4">
                                Lorem ipsum dolor sit amet, consectetur adipisicing elit. Accusamus,
                                optio aspernatur esse sit recusandae labore fuga natus nemo maxime
                                rerum molestias aut dignissimos pariatur debitis expedita animi suscipit cum inventore?
                                Lorem ipsum dolor sit amet, consectetur adipisicing elit.
                            </p>
                        </div>

                        <div class="col-md-5">
                            <div class="ratio ratio-4x3 shadow-sm rounded overflow-hidden">
                                <iframe
                                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3284.016713276846!2d-58.3841507!3d-34.6037389!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x95bccac612470713%3A0x66f6424b9a7f3408!2sObelisco!5e0!3m2!1ses!2sar!4v1715000000000!5m2!1ses!2sar"
                                    style="border:0;"
                                    allowfullscreen=""
                                    loading="lazy"
                                    referrerpolicy="no-referrer-when-downgrade">
                                </iframe>
                            </div>
                        </div>

                    </div> </div>

                </div>


        <script src="{{ asset('vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>



                @include('footer')

</html>
