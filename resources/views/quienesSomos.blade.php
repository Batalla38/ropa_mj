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
<p class="h1">Quiénes Somos</p>
<hr>

<p class="fs-4">
    En <strong>Ropa MJ</strong>, no solo distribuimos prendas; conectamos marcas con personas.
    Somos una distribuidora líder comprometida con la excelencia operativa y la vanguardia
    en el sector textil, facilitando el acceso a moda de alta calidad para negocios y emprendedores.
</p>

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

                                Avenida San Martín S/N,<br>
                                <strong>Barranqueras, Chaco</strong>.<br>
                                Código Postal H3503, Argentina.
                            </p>
                            <p class="fs-5">Contactanos al 3794-123456
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



        <script src="{{ asset('vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>


        <div class=" mt-3">
            @include('footer')
        </div>
</body>
</html>
