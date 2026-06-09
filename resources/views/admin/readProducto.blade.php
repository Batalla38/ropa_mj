<!DOCTYPE html>
<html>
    <head>
        <title>Catálogo de Productos - Ropa MJ</title>
        <link rel="stylesheet" href="{{ asset('vendor/bootstrap/css/bootstrap.min.css') }}">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
        <style>
            /* Estilos globales aplicados al cuerpo del documento */
            body {
                background-color: #c1a391;
                color: #333333; /* Oscurecido ligeramente para mejorar la legibilidad */
            }
            body {
                /* Adaptado con helper asset para que no se rompa la ruta */
                background-image: url("{{ asset('bg1.png') }}");
                background-repeat: repeat;
                background-size: 700px;
            }
            .product-img {
                max-height: 250px;
                object-fit: cover;
                border-radius: 8px;
            }
        </style>
    </head>
    <body>
        <div class="container mt-3 mb-4" >
            @include('header')
        </div>

        <div class="container mt-5">
            <div class="card p-4 shadow-sm">
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <p class="h1 mb-0">Nuestros Productos</p>
                    <span class="badge bg-secondary fs-6">Total: {{ $productos->count() }} prendas</span>
                </div>
                <hr>

                @if(session('success'))
                    <div class="toast-container position-fixed top-0 start-50 translate-middle-x p-3" style="z-index: 1100;">
                        <div id="liveToast" class="toast align-items-center text-white bg-success border-0 show p-3" role="alert" aria-live="assertive" aria-atomic="true" style="min-width: 350px;">
                            <div class="d-flex align-items-center">
                                <div class="toast-body fs-5 fw-bold text-center w-100">
                                    <i class="bi bi-check-circle-fill me-2 fs-4"></i> {{ session('success') }}
                                </div>
                                <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast" aria-label="Close"></button>
                            </div>
                        </div>
                    </div>

                    <script>
                        setTimeout(function() {
                            var toastEl = document.getElementById('liveToast');
                            if (toastEl) {
                                var toast = new bootstrap.Toast(toastEl);
                                toast.hide();
                            }
                        }, 4000);
                    </script>
                @endif

                <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 g-4 mt-2">
                    @forelse($productos as $item)
                        <div class="col">
                            <div class="card h-100 border-light shadow-sm">

                                <div class="position-relative">
                                    <img src="{{ asset('images/' . $item->url_imagen) }}" class="card-img-top product-img" alt="{{ $item->nombre }}">

                                    <div class="position-absolute top-0 end-0 m-2 d-flex flex-column gap-1">
                                        @if($item->activo)
                                            <span class="badge bg-success shadow-sm"><i class="bi bi-eye-fill"></i> Visible</span>
                                        @else
                                            <span class="badge bg-danger shadow-sm"><i class="bi bi-eye-slash-fill"></i> Oculto</span>
                                        @endif

                                        @if($item->stock == 0)
                                            <span class="badge bg-danger shadow-sm"><i class="bi bi-x-square-fill"></i> Sin Stock</span>
                                        @elseif($item->stock <= 5)
                                            <span class="badge bg-warning text-dark shadow-sm"><i class="bi bi-exclamation-triangle-fill"></i> ¡Últimas {{ $item->stock }} u.!</span>
                                        @else
                                            <span class="badge bg-info text-dark shadow-sm"><i class="bi bi-box-seam-fill"></i> Stock: {{ $item->stock }} u.</span>
                                        @endif
                                    </div>
                                </div>

                                <div class="card-body d-flex flex-column">
                                    <h5 class="card-title fw-bold text-dark mb-1">{{ $item->nombre }}</h5>

                                    <div class="mb-2">
                                        <small class="text-muted me-2"><i class="bi bi-gender-ambiguous"></i> {{ $item->genero ?? 'General' }}</small>
                                        <small class="text-muted"><i class="bi bi-tag-fill"></i> Talles: {{ $item->talle ?? 'Único' }}</small>
                                    </div>

                                    <p class="card-text text-muted small flex-grow-1">
                                        {{ Str::limit($item->descripcion, 90, '...') }}
                                    </p>

                                    <div class="d-flex justify-content-between align-items-center mt-3">
                                        <span class="h4 text-success fw-bold mb-0">${{ number_format($item->precio, 2, ',', '.') }}</span>

                                        @if($item->stock > 0 && $item->activo)
                                            <a href="{{ route('productos.mostrar', $item->id) }}" class="btn btn-outline-primary btn-sm">
                                                <i class="bi bi-cart-plus"></i> Ver más
                                            </a>
                                        @else
                                            <button class="btn btn-secondary btn-sm" disabled>
                                                <i class="bi bi-dash-circle"></i> No disp.
                                            </button>
                                        @endif
                                    </div>
                                </div>

                            </div>
                        </div>
                    @empty
                        <div class="col-12 text-center my-5 w-100">
                            <div class="p-5 bg-light rounded-3 border">
                                <i class="bi bi-bag-x text-muted display-1"></i>
                                <p class="h4 mt-3 text-secondary">No hay productos registrados en el catálogo actualmente.</p>
                            </div>
                        </div>
                    @endforelse
                </div>

            </div>
        </div>

        <script src="{{ asset('vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

        <div class="mt-5">
            @include('footer')
        </div>
    </body>
</html>
