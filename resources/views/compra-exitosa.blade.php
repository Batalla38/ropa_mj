<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>¡Compra Exitosa! - Ropa MJ</title>
    <link rel="stylesheet" href="{{ asset('vendor/bootstrap/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <style>
        body {
            background-color: #c1a391;
            background-image: url("{{ asset('bg1.png') }}");
            background-repeat: repeat;
            background-size: 700px;
            height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
        }
        .contenedor-exito {
            background-color: rgba(255, 255, 255, 0.95);
            border-radius: 15px;
            box-shadow: 0px 4px 20px rgba(0, 0, 0, 0.2);
            max-width: 600px;
            width: 100%;
        }
    </style>
</head>
<body>

    <div class="p-5 text-center contenedor-exito mx-3">
        <div class="mb-4">
            <i class="bi bi-check-circle-fill text-success" style="font-size: 5rem;"></i>
        </div>

        <h2 class="fw-bold text-dark mb-3">¡Gracias por tu compra!</h2>

        @if(session('medio_pago') === 'tarjeta')
            <p class="fs-5 text-muted">
                Tu pago con tarjeta ha sido validado y procesado de forma segura. El pedido ya se encuentra en preparación.
            </p>
            <div class="alert alert-success fw-semibold my-4" role="alert">
                <i class="bi bi-bag-check-fill me-2"></i> ¡Tu compra se realizó con éxito!
            </div>
        @endif

        @if(session('medio_pago') === 'efectivo')
            <p class="fs-5 text-muted">
                Tu pedido fue reservado correctamente. Para completar el pago en efectivo o transferencia, utilizá la siguiente referencia:
            </p>
            <div class="bg-light p-3 my-4 border rounded shadow-sm">
                <span class="text-secondary small d-block fw-bold text-uppercase">Código de Referencia</span>
                <span class="fs-2 fw-bold text-dark tracking-wider">{{ session('referencia') }}</span>
            </div>
            <p class="small text-danger fw-semibold">
                <i class="bi bi-exclamation-circle me-1"></i> Presentando este código realizás el pago y se despacha tu indumentaria.
            </p>
        @endif

        <hr class="my-4">

        <a href="{{ url('/main') }}" class="btn btn-dark btn-lg fw-bold px-5 py-3 w-100 shadow-sm" style="border-radius: 8px;">
            <i class="bi bi-house-door-fill me-2"></i> Volver al Inicio
        </a>
    </div>

    <script src="{{ asset('vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
</body>
</html>