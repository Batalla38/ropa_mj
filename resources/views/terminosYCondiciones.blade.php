<!DOCTYPE html>
    <html>
        <head>
            <title>Terminos y Condiciones</title>
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
            body {
            background-color: #a39898; /* Color de fondo definido por el usuario */
            color: #9f9393;           /* Color de fuente definido por el usuario */
            }
            body {
                background-image: url(https://images.vexels.com/media/users/3/142647/isolated/preview/7975c8713e6cd70ff26097efbbebdbd1-ropa-de-camiseta.png);
                background-repeat: repeat;
                background-size: 80px; /* Aquí controlas el tamaño */
                }
        </style>
    </head>

    <body>
    //header
        <div class="container mt-3 mb-4" >
            @include('header')
        </div>

            <div class="container mt-5"><div class="card p-4">
                    <p class="h1">Terminos Y Condiciones</p>
                        <hr> <p class= "fs-4">Bienvenido a Ropa MJ.
                            Al acceder y utilizar nuestro sitio web, usted acepta cumplir y estar sujeto a
                            los siguientes términos y condiciones. Si no está de acuerdo con alguna parte de estos términos,
                            le rogamos que no utilice nuestros servicios.</p>
                    <p class="h2 mt-4">1. Uso del Sitio</p>

<p class="fs-5 text-muted">
    El contenido de este sitio es para su información general y uso personal.
    Queda prohibida la reproducción total o parcial de los diseños, logotipos y material gráfico
    de <strong>Ropa MJ</strong> sin previa autorización.
</p>

<hr>

<p class="h2 mt-4">2. Productos y Precios</p>
<p class="fs-5 text-muted">
    Nos esforzamos por mostrar con la mayor precisión posible los colores y detalles de nuestras prendas.
    Sin embargo, no podemos garantizar que el monitor de su dispositivo refleje exactamente el tono real.
    Los precios están sujetos a cambios sin previo aviso.
</p>

<hr>

<p class="h2 mt-4">3. Cambios y Devoluciones</p>
<p class="fs-5 text-muted">
    En <strong>Ropa MJ</strong>, queremos que ames lo que compras. Si la talla no es la correcta o el producto
    presenta fallas de fábrica, dispones de 30 días naturales tras la recepción del pedido para
    solicitar un cambio, siempre que la prenda conserve sus etiquetas originales y no presente signos de uso.
</p>

<hr>

<p class="h2 mt-4">4. Envíos y Entregas</p>
<p class="fs-5 text-muted">
    Los tiempos de entrega pueden variar según la ubicación y la logística de la transportadora.
    No nos hacemos responsables por retrasos ajenos a nuestra operación, pero te brindaremos
    todo el soporte necesario para rastrear tu paquete.
</p>

<hr>

<p class="h2 mt-4">5. Protección de Datos</p>
<p class="fs-5 text-muted">
    Tu información personal está segura con nosotros. Los datos proporcionados para la compra
    serán utilizados estrictamente para procesar el pedido y mejorar tu experiencia como cliente.
</p>

                </div></div>

                <div class=" mt-3">
                @include('footer')
                </div>
        </body>

</html>
