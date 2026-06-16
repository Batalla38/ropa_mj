<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Preguntas Frecuentes - Ropa MJ</title>
    <link rel="stylesheet" href="{{ asset('vendor/bootstrap/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <style>
        body {
            background-color: #c1a391;
            color: #333333;
            background-image: url("{{ asset('bg1.png') }}");
            background-repeat: repeat;
            background-size: 700px;
        }
        .card { background-color: rgba(255, 255, 255, 0.95); }
    </style>
</head>
<body>

    <script src="{{ asset('vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

    @if(session('exito'))
        <div class="toast-container position-fixed top-0 start-50 translate-middle-x p-3" style="z-index: 2000;">
            <div id="liveToast" class="toast align-items-center text-white bg-success border-0 show p-3" role="alert">
                <div class="d-flex">
                    <div class="toast-body fs-5 fw-bold text-center w-100">
                        <i class="bi bi-check-circle-fill me-2"></i> {{ session('exito') }}
                    </div>
                    <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast"></button>
                </div>
            </div>
        </div>
        <script>
            setTimeout(function() {
                var toastEl = document.getElementById('liveToast');
                if (toastEl) { new bootstrap.Toast(toastEl).hide(); }
            }, 4000);
        </script>
    @endif

    <div class="container mt-4">
        @include('header')
    </div>

    <div class="container" style="margin-top: 140px; margin-bottom: 1.5rem;">
        <div class="card p-4 shadow-sm">
            <p class="h1 text-dark border-bottom pb-2">Preguntas Frecuentes</p>

            {{-- ✨ BUCLE DINÁMICO: Recorre las consultas reales respondidas por el admin --}}
            @forelse($faqDinamicas as $index => $faq)
                <div class="mt-3">
                    {{-- Usamos $faq->descripcion que es el nombre real en tu tabla --}}
                    <p class="h4 text-primary"><i class="bi bi-question-circle me-1"></i> {{ $faq->descripcion }}</p>
                    <p class="fs-5 text-muted ps-3"><i class="bi bi-arrow-return-right me-1"></i> {{ $faq->respuesta }}</p>
                </div>
                {{-- Ponemos una línea divisoria decorativa a menos que sea la última pregunta --}}
                @if(!$loop->last)
                    <hr>
                @endif
            @empty
                {{-- 💡 RESPALDO: Si no hay respuestas en la BD todavía, muestra tus textos originales --}}
                <div class="mt-3">
                    <p class="h4 text-primary">¿Cómo realizo un pedido por mayor?</p>
                    <p class="fs-5 text-muted">Solo debes registrarte en nuestro portal, añadir las prendas al carrito y finalizar el proceso.</p>
                </div>
                <hr>
                <div>
                    <p class="h4 text-primary">¿Cuál es el monto mínimo de compra?</p>
                    <p class="fs-5 text-muted">Manejamos un monto mínimo competitivo de distribuidora inicial visible en tu panel principal.</p>
                </div>
            @endforelse

        </div>
    </div>

    <div class="container mb-5">
        <div class="card p-4 shadow-sm">
            <h2 class="mb-4 text-dark"><i class="bi bi-chat-left-text-fill me-2 text-primary"></i> Dejanos tu Consulta</h2>

            <form action="{{ url('/consultas') }}" method="POST" autocomplete="off">
                @csrf

                <div class="mb-3">
                    <label class="form-label fw-bold">Tu Correo Electrónico:</label>
                    <input type="email" name="correo" class="form-control form-control-lg" placeholder="ejemplo@correo.com" required>
                </div>

                <div class="mb-3">
                    <label class="form-label fw-bold">Motivo de la Consulta:</label>
                    <select name="tipoConsul" class="form-select form-select-lg" required>
                        <option value="">-- Seleccione una opción --</option>
                        @foreach(App\Models\Consulta::TIPOS as $tipo)
                            <option value="{{ $tipo }}">{{ $tipo }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="mb-3">
                    <label class="form-label fw-bold">Escribí tu pregunta (Máximo 300 caracteres):</label>
                    <textarea name="descripcion" class="form-control form-control-lg" rows="4" maxlength="300" placeholder="Escribí acá tu duda..." required></textarea>
                </div>

                <div class="text-end">
                    <button type="submit" class="btn btn-primary btn-lg px-5 fw-bold shadow-sm">
                        <i class="bi bi-stars me-2"></i> Enviar Pregunta
                    </button>
                </div>
            </form>
        </div>
    </div>

    @include('footer')

</body>
</html>
