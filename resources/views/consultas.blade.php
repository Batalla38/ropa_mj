<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <title>Quienes Somos / Preguntas Frecuentes</title>
        <link rel="stylesheet" href="{{ asset('vendor/bootstrap/css/bootstrap.min.css') }}">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
        <style>
            body {
                background-color: #c1a391; 
                color: #9f9393;           
                background-image: url("{{ asset('bg1.png') }}");
                background-repeat: repeat;
                background-size: 700px; 
            }
        </style>
    </head>
    <body>
        
        <script src="{{ asset('vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

        <div class="container mt-3 mb-4">
            @include('header')
        </div>

        <div class="container mt-5">
            <div class="card p-4 text-dark"> <p class="h1">Preguntas Frecuentes</p>
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
                </div>

                <div class="container mt-4">

                    @if(session('exito'))
                        <div class="toast-container position-fixed top-0 start-50 translate-middle-x p-3" style="z-index: 1100;">
                            <div id="liveToast" class="toast align-items-center text-white bg-success border-0 show p-3" role="alert" aria-live="assertive" aria-atomic="true" style="min-width: 350px; margin-top: 20px;">
                                <div class="d-flex align-items-center">
                                    <div class="toast-body fs-4 fw-bold text-center w-100">
                                        <i class="bi bi-check-circle-fill me-2 fs-3"></i> ¡Se ha enviado con éxito!
                                    </div>
                                    <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast" aria-label="Close"></button>
                                </div>
                            </div>
                        </div>

                        <script>
                            // Ahora que Bootstrap cargó arriba, este script funciona nativamente sin errores
                            setTimeout(function() {
                                var toastEl = document.getElementById('liveToast');
                                if (toastEl) {
                                    var toast = new bootstrap.Toast(toastEl);
                                    toast.hide();
                                }
                            }, 4000); // Reducido a 4 segundos razonables de lectura
                        </script>
                    @endif

                    <h3 class="mb-3 text-dark">Dejanos tu consulta</h3>

                    <!-- Cambiá la línea 101 por esta -->
                    <form action="{{ url('/consultas') }}" method="POST" autocomplete="off">

                        @csrf
                        
                        <div class="mb-3">
                            <label class="form-label text-dark fw-bold">Ingrese su Correo</label>
                            <input type="email" name="correo" class="form-control" placeholder="nombre@ejemplo.com" required>
                        </div>

                        <div class="mb-3">
                            <label class="form-label text-dark fw-bold">Tipo de Consulta:</label>
                            <select name="tipoConsul" class="form-control" required>
                                <option value="">Seleccione una opción</option>
                                @foreach(App\Models\Consulta::TIPOS as $tipo)
                                    <option value="{{ $tipo }}">{{ $tipo }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="mb-3">
                            <label class="form-label text-dark fw-bold">Tu Pregunta:</label>
                            <textarea name="descripcion" class="form-control" rows="4" placeholder="Escribí tu pregunta aquí (máximo 300 caracteres)..." required></textarea>
                        </div>

                        <div class="text-end">
                            <button type="submit" class="btn btn-primary btn-lg px-4">
                                <i class="bi bi-stars me-2"></i> Enviar Pregunta
                            </button>
                        </div>
                    </form>
                </div>

            </div>
        </div>

        <div class="mt-5">
            @include('footer')
        </div>
    </body>
</html>