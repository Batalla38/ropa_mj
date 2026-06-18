<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Finalizar Compra - Ropa MJ</title>
    <link rel="stylesheet" href="{{ asset('vendor/bootstrap/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <style>
        body {
            background-color: #c1a391;
            background-image: url("{{ asset('bg1.png') }}");
            background-repeat: repeat;
            background-size: 700px;
        }
        .contenedor-checkout {
            background-color: rgba(255, 255, 255, 0.95);
            border-radius: 15px;
            box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.15);
        }
    </style>
</head>
<body>

    <div class="container mt-3 mb-5">
        @include('header')
    </div>

    <div class="container" style="margin-top: 140px; margin-bottom: 4rem;">
        <h2 class="text-center fw-bold mb-4 text-dark" style="background-color: rgba(255,255,255,0.75); padding: 15px; border-radius: 8px;">Finalizar tu Compra</h2>

        <form action="{{ route('carrito.procesarPago') }}" method="POST" class="needs-validation" novalidate>
            @csrf
            <div class="row g-4">

                <div class="col-md-7">

                    <div class="p-4 contenedor-checkout mb-4">
                        <h4 class="fw-bold text-dark mb-3"><i class="bi bi-truck me-2"></i>Datos de Envío</h4>
                        <div class="row g-3">
                            <div class="col-sm-6">
                                <label class="form-label fw-bold">Provincia</label>
                                <input type="text" name="provincia" class="form-control" placeholder="Ej: Corrientes" required pattern=".*\S+.*" minlength="3">
                            </div>
                            <div class="col-sm-6">
                                <label class="form-label fw-bold">Localidad</label>
                                <input type="text" name="localization" class="form-control" placeholder="Ej: Bella Vista" required pattern=".*\S+.*" minlength="3">
                            </div>
                            <div class="col-12">
                                <label class="form-label fw-bold">Dirección Completa (Calle, Número, Piso/Depto)</label>
                                <input type="text" name="direccion" class="form-control" placeholder="Calle Falsa 123" required pattern=".*\S+.*" minlength="5">
                            </div>
                        </div>
                    </div>

                    <div class="p-4 contenedor-checkout">
                        <h4 class="fw-bold text-dark mb-3"><i class="bi bi-credit-card me-2"></i>Medio de Pago</h4>

                        <div class="mb-4">
                            <label class="form-label fw-bold d-block">Seleccioná cómo querés abonar:</label>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="medio_pago" id="pago_tarjeta" value="tarjeta" checked onclick="alternarPago()">
                                <label class="form-check-label fw-semibold" for="pago_tarjeta">Tarjeta de Crédito / Débito</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="medio_pago" id="pago_efectivo" value="efectivo" onclick="alternarPago()">
                                <label class="form-check-label fw-semibold" for="pago_efectivo">Efectivo / Transferencia</label>
                            </div>
                        </div>

                        <div id="seccion_tarjeta" class="row g-3">
                            <div class="col-12">
                                <label class="form-label fw-bold">Nombre impreso en la tarjeta</label>
                                <input type="text" id="tarjeta_nombre" name="tarjeta_nombre" class="form-control" placeholder="JUAN PEREZ" required pattern=".*\S+.*" minlength="3">
                            </div>
                            <div class="col-12">
                                <label class="form-label fw-bold">Número de Tarjeta</label>
                                <input type="text" id="tarjeta_numero" name="tarjeta_numero" class="form-control" placeholder="0000 0000 0000 0000" pattern="\d{16}" minlength="16" maxlength="16" required>
                                <div class="form-text">Deben ser 16 dígitos numéricos corridos.</div>
                            </div>
                            <div class="col-sm-6">
                                <label class="form-label fw-bold">Vencimiento (MM/AA)</label>
                                <input type="text" id="tarjeta_vence" name="tarjeta_vence" class="form-control @error('tarjeta_vence') is-invalid @enderror" placeholder="12/28" value="{{ old('tarjeta_vence') }}" required pattern="\d{2}/\d{2}">

                                @error('tarjeta_vence')
                                    <div class="invalid-feedback fw-bold d-block">
                                        <i class="bi bi-exclamation-triangle-fill me-1"></i> {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="col-sm-6">
                                <label class="form-label fw-bold">Código de Seguridad (CVV)</label>
                                <input type="password" id="tarjeta_cvv" name="tarjeta_cvv" class="form-control" placeholder="123" pattern="\d{3,4}" minlength="3" maxlength="4" required>
                            </div>
                        </div>

                        <div id="seccion_efectivo" class="alert alert-info d-none mb-0 mt-2" role="alert">
                            <i class="bi bi-info-circle-fill me-2"></i>
                            Al confirmar, el sistema generará un <strong>Código de Referencia de Pago</strong> para que puedas abonar por Rapipago, Pago Fácil o transferencia bancaria.
                        </div>

                    </div>
                </div>

                <div class="col-md-5">
                    <div class="p-4 contenedor-checkout text-dark">
                        <h4 class="fw-bold mb-3">Resumen del Pedido</h4>
                        <hr>

                        @php $totalGeneral = 0; @endphp
                        @foreach($carrito as $item)
                            @php $subtotal = $item['precio'] * $item['cantidad']; $totalGeneral += $subtotal; @endphp
                            <div class="d-flex justify-content-between align-items-center mb-2">
                                <div>
                                    <span class="fw-bold">{{ $item['cantidad'] }}x</span> {{ $item['nombre'] }}
                                </div>
                                <span class="fw-semibold">${{ number_format($subtotal, 0, ',', '.') }}</span>
                            </div>
                        @endforeach

                        <hr class="my-3">
                        <div class="d-flex justify-content-between align-items-center mb-4">
                            <h5 class="fw-bold m-0">Total a Pagar:</h5>
                            <h3 class="text-success fw-bold m-0">${{ number_format($totalGeneral, 0, ',', '.') }}</h3>
                        </div>

                        <button type="submit" class="btn btn-success btn-lg w-100 fw-bold py-3 shadow-sm" style="border-radius: 8px;">
                            <i class="bi bi-shield-check me-2"></i>Confirmar y Pagar
                        </button>
                    </div>
                </div>

            </div>
        </form>
    </div>

    @include('footer')

    <script>
        function alternarPago() {
            let pagoTarjeta = document.getElementById('pago_tarjeta').checked;
            let seccionTarjeta = document.getElementById('seccion_tarjeta');
            let seccionEfectivo = document.getElementById('seccion_efectivo');

            let inputsTarjeta = [
                document.getElementById('tarjeta_nombre'),
                document.getElementById('tarjeta_numero'),
                document.getElementById('tarjeta_vence'),
                document.getElementById('tarjeta_cvv')
            ];

            if (pagoTarjeta) {
                seccionTarjeta.classList.remove('d-none');
                seccionEfectivo.classList.add('d-none');
                inputsTarjeta.forEach(input => input.setAttribute('required', 'required'));
            } else {
                seccionTarjeta.classList.add('d-none');
                seccionEfectivo.classList.remove('d-none');
                inputsTarjeta.forEach(input => input.removeAttribute('required'));
            }
        }

        (function () {
            'use strict'
            var forms = document.querySelectorAll('.needs-validation')
            Array.prototype.slice.call(forms).forEach(function (form) {
                form.addEventListener('submit', function (event) {
                    if (!form.checkValidity()) {
                        event.preventDefault()
                        event.stopPropagation()
                    }
                    form.classList.add('was-validated')
                }, false)
            })
        })()
    </script>
</body>
</html>
