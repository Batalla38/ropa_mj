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
                    <p class="h1">Preguntas Frecuentes</p>
<hr>

<div class="mb-5">
    <p class="h4 text-primary">¿Cómo realizo un pedido por mayor?</p>
    <p class="fs-5">
        Es muy sencillo. Solo debes registrarte en nuestro portal, añadir las prendas y cantidades deseadas al carrito de compras y finalizar el proceso. Uno de nuestros asesores se pondrá en contacto contigo para confirmar el stock y los detalles del envío.
    </p>
</div>

<hr>

<div class="mb-5">
    <p class="h4 text-primary">¿Cuál es el monto mínimo de compra?</p>
    <p class="fs-5">
        Para mantener nuestros precios competitivos de distribuidora, manejamos un monto mínimo de compra inicial. Puedes consultar el valor actualizado en el panel principal de tu cuenta o contactándonos directamente.
    </p>
</div>

<hr>

<div class="mb-5">
    <p class="h4 text-primary">¿Qué métodos de pago aceptan?</p>
    <p class="fs-5">
        Aceptamos transferencias bancarias, tarjetas de crédito/débito y plataformas de pago digitales. Todos nuestros pagos están protegidos por protocolos de seguridad para garantizar tu tranquilidad.
    </p>
</div>

<hr>

<div class="mb-5">
    <p class="h4 text-primary">¿Realizan envíos a todo el país?</p>
    <p class="fs-5">
        Sí, contamos con alianzas con las principales empresas de logística para asegurar que tus pedidos lleguen a cualquier rincón del país en un tiempo estimado de 3 a 7 días hábiles.
    </p>
</div>

<hr>

<div class="mb-5">
    <p class="h4 text-primary">¿Puedo solicitar muestras de las telas?</p>
    <p class="fs-5">
        ¡Claro que sí! Entendemos que la calidad es lo primero. Contamos con un "Kit de Muestras" que puedes solicitar para conocer la textura y durabilidad de nuestros textiles antes de realizar un pedido grande.
    </p>
</div></p>


<div class="container mt-4">
    <h3 class="mb-3">Preguntas</h3>
    
    <form id="formPregunta">
        <div class="row g-2 align-items-center">
            <div class="col">
                <input type="text" id="inputPregunta" class="form-control form-control-lg" placeholder="Escribí tu pregunta..." required>
            </div>
            <div class="col-auto">
                <button type="button" class="btn btn-primary btn-lg d-flex align-items-center" onclick="enviarConsulta()">
                    <i class="bi bi-stars me-2"></i> Preguntar
                </button>
            </div>
        </div>
    </form>
</div>

<div class="modal fade" id="modalExito" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-body text-center p-4">
                <i class="bi bi-check-circle-fill text-success" style="font-size: 3rem;"></i>
                <h4 class="mt-3">¡Consulta enviada!</h4>
                <p>La responderemos a la brevedad.</p>
                <button type="button" class="btn btn-primary w-100" data-bs-dismiss="modal">Aceptar</button>
            </div>
        </div>
    </div>
</div>
<script>
function enviarConsulta() {
    const input = document.getElementById('inputPregunta');
    const pregunta = input.value;

    if (pregunta.trim() === "") {
        alert("Por favor, escribí una pregunta.");
        return;
    }

    // Mostramos el modal
    const miModal = new bootstrap.Modal(document.getElementById('modalExito'));
    miModal.show();

    // Limpiamos el input
    input.value = "";
}
</script>

                    </div>
                </div>

                </div>

        <script src="{{ asset('vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

        

        <div class=" mt-3">
            @include('footer')
        </div>
</body>
</html>
