<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Mi Carrito - Ropa MJ</title>
    <link rel="stylesheet" href="{{ asset('vendor/bootstrap/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <style>
        body {
            background-color: #c1a391;
            background-image: url("{{ asset('bg1.png') }}");
            background-repeat: repeat;
            background-size: 700px;
        }
        .contenedor-blanco {
            background-color: rgba(255, 255, 255, 0.95);
            border-radius: 8px;
            box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.15);
        }
        .titulo-carrito {
            background-color: rgba(255, 255, 255, 0.75);
            color: #4a3e3d !important;
            padding: 15px 25px;
            border-radius: 8px; 
            box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.15);
        }
    </style>
</head>
<body>

    <div class="container mt-3 mb-5">
        @include('header')
    </div>

    <div class="container" style="margin-top: 140px; margin-bottom: 4rem;">
        
        <div class="mb-4">
            <h2 class="titulo-carrito text-center fw-bold mb-0">Mi Carrito de Compras</h2>
        </div>

        @if(session('exito'))
            <div class="alert alert-success alert-dismissible fade show shadow-sm mb-4" role="alert" style="border-radius: 8px;">
                <strong>¡Hecho!</strong> {{ session('exito') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        @if(count($carrito) > 0)
            <div class="p-4 contenedor-blanco">
                <div class="table-responsive">
                    <table class="table align-middle">
                        <thead class="table-dark">
                            <tr>
                                <th>Imagen</th>
                                <th>Prenda</th>
                                <th>Precio</th>
                                <th class="text-center">Cantidad</th>
                                <th>Subtotal</th>
                                <th class="text-center">Quitar</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php $totalGeneral = 0; @endphp
                            @foreach($carrito as $id => $item)
                                @php 
                                    $subtotal = $item['precio'] * $item['cantidad']; 
                                    $totalGeneral += $subtotal;
                                @endphp
                                <tr>
                                    <td>
                                        <img src="{{ asset('storage/' . $item['url_imagen']) }}" alt="{{ $item['nombre'] }}" style="width: 60px; height: 60px; object-fit: cover; border-radius: 5px;">
                                    </td>
                                    <td><strong>{{ $item['nombre'] }}</strong></td>
                                    <td>${{ number_format($item['precio'], 2, ',', '.') }}</td>
                                    <td class="text-center">
                                        <div class="d-flex justify-content-center align-items-center gap-2">
                                            <form action="{{ route('carrito.restar', $id) }}" method="POST" class="m-0">
                                                @csrf
                                                <button type="submit" class="btn btn-sm btn-outline-secondary px-2 fw-bold">-</button>
                                            </form>
                                            
                                            <span class="fw-bold fs-5 px-2">{{ $item['cantidad'] }}</span>
                                            
                                            <form action="{{ route('carrito.agregar', $id) }}" method="POST" class="m-0">
                                                @csrf
                                                <button type="submit" class="btn btn-sm btn-outline-secondary px-2 fw-bold">+</button>
                                            </form>
                                        </div>
                                    </td>
                                    <td><strong>${{ number_format($subtotal, 2, ',', '.') }}</strong></td>
                                    <td class="text-center">
                                        <form action="{{ route('carrito.eliminar', $id) }}" method="POST" class="m-0">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-danger rounded-3">
                                                <i class="bi bi-trash-fill"></i>
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

                <hr class="my-4">

                <!-- Fila de acciones y totales perfectamente balanceada -->
                <div class="row align-items-center g-3">
                    <div class="col-md-6 text-center text-md-start">
                        <div class="d-flex gap-2">
                            <a href="{{ route('carrito.vaciar') }}" class="btn btn-outline-danger px-3" style="border-radius: 8px;">
                                <i class="bi bi-x-circle me-1"></i> Vaciar Carrito
                            </a>

                            <a href="{{ route('catalogo.index') }}" class="btn btn-outline-dark fw-bold px-3" style="border-radius: 8px;">
                                <i class="bi bi-arrow-left me-1"></i> Agregar más productos
                            </a>
                        </div>
                    </div>
                    <div class="col-md-6 text-center text-md-end">
                        <h3 class="mb-3">Total: <span class="text-success fw-bold">${{ number_format($totalGeneral, 2, ',', '.') }}</span></h3>
                        
                        @if(auth()->check() || session()->has('user_id'))
                            <a href="{{ route('carrito.pago') }}" class="btn btn-success btn-lg fw-bold px-5 shadow-sm" style="border-radius: 8px;">
                                <i class="bi bi-credit-card-2-back me-2"></i>Iniciar Pago
                            </a>
                        @else
                            <a href="{{ url('/login?redirigir=pago') }}" class="btn btn-success btn-lg fw-bold px-5 shadow-sm" style="border-radius: 8px;">
                                <i class="bi bi-credit-card-2-back me-2"></i>Iniciar Pago
                            </a>
                            <div class="text-muted small mt-2">
                                <i class="bi bi-info-circle me-1"></i> Te pedirá iniciar sesión o registrarte para completar el envío.
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        @else
            <div class="p-5 text-center contenedor-blanco">
                <i class="bi bi-cart-x text-muted" style="font-size: 4rem;"></i>
                <h3 class="mt-3 text-dark">Tu carrito está vacío</h3>
                <p class="text-muted">¡Date una vuelta por el catálogo para ver los ingresos de temporada!</p>
                <a href="{{ route('catalogo.index') }}" class="btn btn-primary fw-bold px-4 mt-2" style="border-radius: 8px;">Ver Catálogo de Ropa</a>
            </div>
        @endif

    </div>

    <script src="{{ asset('vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    @include('footer')

</body>
</html>