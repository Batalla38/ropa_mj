<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mi Carrito - Ropa MJ</title>
    <link rel="stylesheet" href="{{ asset('vendor/bootstrap/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <style>
        /* Mantenemos tu fondo personalizado de Ropa MJ */
        body {
            background-color: #c1a391; 
            background-image: url({{ asset('bg1.png') }}); 
            background-repeat: repeat;
            background-size: 700px; 
        }
        .table img {
            object-fit: cover;
            border-radius: 8px;
        }
    </style>
</head>
<body class="bg-light">

    @include('header')

    <main class="container my-5 pt-5">
        <h2 class="mb-4 fw-bold text-dark text-center">Tu Carrito</h2>

        @if(session('success'))
            <div class="alert alert-success alert-dismissible fade show fw-bold shadow-sm mb-4" role="alert">
                <i class="bi bi-shield-check me-2"></i> {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        @if(session('status'))
            <div class="alert alert-secondary alert-dismissible fade show fw-bold shadow-sm mb-4" role="alert">
                <i class="bi bi-trash-fill me-2"></i> {{ session('status') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        @if($errors->has('stock_final'))
            <div class="alert alert-danger alert-dismissible fade show fw-bold shadow-sm mb-4" role="alert">
                <i class="bi bi-exclamation-triangle-fill me-2"></i> {{ $errors->first('stock_final') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
        @if(empty($carrito) || count($carrito) == 0)
            <div class="text-center py-5 bg-white rounded-4 shadow-sm">
                <p class="text-muted fs-4">Aun no tiene productos cargados</p>
                <a href="{{ url('/catalogo') }}" class="btn btn-dark btn-lg rounded-pill">Ver Catálogo</a>
            </div>
        @else
            <div class="row g-4">
                <div class="col-md-8">
                    <div class="card shadow-sm p-3 border-0 rounded-4">
                        <table class="table align-middle mb-0">
                            <thead class="table-light">
                                <tr>
                                    <th>Producto</th>
                                    <th class="text-center">Precio</th>
                                    <th class="text-center">Cantidad</th>
                                    <th class="text-end">Subtotal</th>
                                    <th class="text-center">Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($carrito as $id => $detalles)
                                    <tr>
                                        <td>
                                            <div class="d-flex align-items-center gap-3">
                                                <img src="{{ asset($detalles['imagen']) }}" alt="{{ $detalles['nombre'] }}" style="width: 55px; height: 55px;">
                                                <span class="fw-semibold text-dark">{{ $detalles['nombre'] }}</span>
                                            </div>
                                        </td>
                                        <td class="text-center">${{ number_format($detalles['precio'], 0, ',', '.') }}</td>
                                        <td class="text-center fw-bold">{{ $detalles['cantidad'] }}</td>
                                        <td class="text-end fw-bold text-dark">${{ number_format($detalles['precio'] * $detalles['cantidad'], 0, ',', '.') }}</td>
                                        <td class="text-center">
                                            <form action="{{ route('carrito.eliminar', $id) }}" method="POST" onsubmit="return confirm('¿Quitar este producto del carrito?');">
                                                @csrf
                                                <button type="submit" class="btn btn-outline-danger btn-sm rounded-3">Eliminar</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="card shadow-sm p-4 bg-white border-0 rounded-4">
                        <h4 class="fw-bold mb-3 text-dark">Resumen</h4>
                        <div class="d-flex justify-content-between mb-4 fs-5">
                            <span class="text-muted">Total:</span>
                            <span class="fw-bold text-success fs-3">${{ number_format($total, 0, ',', '.') }}</span>
                        </div>
                        
                        <form action="{{ route('carrito.comprar') }}" method="POST">
                            @csrf
                            <button type="submit" class="btn btn-dark w-100 btn-lg py-3 rounded-3 fw-bold">Continuar con la Compra</button>
                        </form>
                        
                        <a href="{{ url('/catalogo') }}" class="btn btn-outline-secondary w-100 mt-2 rounded-3">Seguir mirando</a>
                    </div>
                </div>
            </div>
        @endif
    </main>

    @include('footer')

    <script src="{{ asset('vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
</body>
</html>