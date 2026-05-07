<!DOCTYPE html>
    <html>
        <head>
            <title>Quienes Somos</title>
            <link rel="stylesheet" href="{{asset('vendor/bootstrap/css/bootstrap.min.css')}}">
            <style>
                 /* Estilos globales aplicados al cuerpo del documento */
                body {
                    background-color: #c1a391; /* Color de fondo definido por el usuario */
                    color: #9f9393;           /* Color de fuente definido por el usuario */
                }
                body {
                    background-image: url(bg1.png);
                    background-repeat: repeat;
                    background-size: 700px; /* Aquí controlas el tamaño */
                }
                /* Estilos globales aplicados al cuerpo del documento */

            </style>
        </head>
        <body>
            //header
            <div class="container mt-3 mb-4" >
                @include('header')
            </div>


                <div class="container mt-5"><div class="card p-4">
<p class="h1">Quiénes Somos</p>
<hr>

<p class="fs-4">
    En <strong>Ropa MJ</strong>, no solo distribuimos prendas; conectamos marcas con personas.
    Somos una distribuidora líder comprometida con la excelencia operativa y la vanguardia
    en el sector textil, facilitando el acceso a moda de alta calidad para negocios y emprendedores.
</p>
<div class="container my-5">
                    <div class="row justify-content-center">
                        <!-- Definimos el ancho de la tarjeta (col-md-8 para que no sea gigante) -->
                        <div class="col-md-8">
                            <div class=" shadow-sm ">
                                <div class=" text-center">
                                    <!-- Contenedor de la imagen con proporciones controladas -->
                                    <div class="ratio ratio-21x9 rounded overflow-hidden mx-auto">
                                        <img
                                            src="local.png"
                                            class="img-fluid object-fit-cover"
                                            alt="Distribuidora Ropa MJ"
                                        >
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
<div class="mt-5">
    <p class="h2">Nuestra Misión</p>
    <p class="fs-5 text-muted">
        Nuestra misión es simplificar la cadena de suministro de moda, ofreciendo un catálogo
        curado y un servicio de logística eficiente que garantice que cada prenda llegue a su
        destino en perfectas condiciones y en el tiempo acordado.
    </p>
</div>

<hr>

<div class="mt-4">
    <p class="h2">¿Por qué elegirnos?</p>
    <ul class="fs-5 text-muted">
        <li class="mb-2"><strong>Calidad Garantizada:</strong> Seleccionamos cuidadosamente cada textil y diseño.</li>
        <li class="mb-2"><strong>Compromiso Logístico:</strong> Contamos con una red de distribución optimizada para entregas rápidas.</li>
        <li class="mb-2"><strong>Atención Personalizada:</strong> Brindamos soporte directo para ayudar a crecer a nuestros aliados comerciales.</li>
    </ul>
</div>

<hr>

<div class="mt-4">
    <p class="h2">Nuestra Visión</p>
    <p class="fs-5 text-muted">
        Para el año 2030, buscamos ser el referente principal en la distribución mayorista de la región,
        impulsando la innovación tecnológica en nuestros procesos y promoviendo prácticas sostenibles
        dentro de la industria de la moda.
    </p>
</div>


                </div></div>

                <div class="container mt-5">
                <div class="card p-4">
                    <div class="row align-items-center"> <div class="col-md-7">
                            <p class="h1">¿Donde estamos?</p>
                            <hr>
                            <p class="fs-5">
                                Te dejamos nuestra ubicacion para que puedas visitarnos<br> en nuestro horiario habitual de 8.00 AM a 22.00PM <br>
                                Avenida San Martín S/N,<br>
                                <strong>Barranqueras, Chaco</strong>.<br>
                                Código Postal H3503, Argentina.
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

                    </div>
                </div>

                </div>

                <div class="container my-5">
    <div class="row justify-content-center">
        <div class="col-md-5">
            <div class="card shadow-sm border-0 p-4 rounded-4">
                <h3 class="mb-4 fw-bold">Contactanos</h3>

                <div class="d-flex flex-column gap-4">

                    <!-- WhatsApp -->
                    <a href="https://wa.me/5493794123456" target="_blank" class="text-decoration-none d-flex align-items-center text-dark">
                        <img src="https://upload.wikimedia.org/wikipedia/commons/6/6b/WhatsApp.svg" alt="WhatsApp" width="30" height="30" class="me-3">
                        <span class="fs-5 fw-medium">3794-123456</span>
                    </a>

                    <!-- Instagram -->
                    <a href="#" target="_blank" class="text-decoration-none d-flex align-items-center text-dark">
                        <img src="https://upload.wikimedia.org/wikipedia/commons/e/e7/Instagram_logo_2016.svg" alt="Instagram" width="30" height="30" class="me-3">
                        <span class="fs-5 fw-medium">@RopaMJ_ok</span>
                    </a>

                    <!-- Facebook -->
                    <a href="#" target="_blank" class="text-decoration-none d-flex align-items-center text-dark">
                        <img src="https://upload.wikimedia.org/wikipedia/commons/b/b8/2021_Facebook_icon.svg" alt="Facebook" width="30" height="30" class="me-3">
                        <span class="fs-5 fw-medium">Ropa MJ Mayorista</span>
                    </a>

                    <!-- TikTok -->
                    <a href="#" target="_blank" class="text-decoration-none d-flex align-items-center text-dark">
                        <img src="https://upload.wikimedia.org/wikipedia/en/a/a9/TikTok_logo.svg" alt="TikTok" width="30" height="30" class="me-3">
                        <span class="fs-5 fw-medium">ropamj_tiktok</span>
                    </a>
                    <hr class="my-4 opacity-25">

                                    <div class="text-secondary">
                                        <p class="mb-1"><i class="bi bi-envelope me-2"></i> mayoristamjropas@gmail.com</p>
                                        <p class="mb-0"><i class="bi bi-geo-alt me-2"></i> Barranqueras, Chaco</p>
                                    </div>
                </div>
            </div>
        </div>
    </div>
</div>



                </div>



        <script src="{{ asset('vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>


        <div class=" mt-3">
            @include('footer')
        </div>
</body>
</html>
