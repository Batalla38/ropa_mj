<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mi Carrito - Ropa MJ</title>
    <link rel="stylesheet" href="{{ asset('vendor/bootstrap/css/bootstrap.min.css') }}">
</head>
<body class="bg-light">

    <main class="container my-5">
        <h2 class="mb-4 fw-bold text-dark text-center">Tu Carrito de Compras</h2>

        @if(session('success'))
            <div class="alert alert-success text-center">{{ session('success') }}</div>
        @endif

        @if(empty($carrito))
            <div class="text-center py-5">
                <p class="text-muted fs-4">No tienes productos en el carrito todavía.</p>
                <a href="{{ url('/') }}" class="btn btn-dark btn-lg">Ver Catálogo de Ropa</a>
            </div>
        @else
            <div class="row">
                <div class="col-md-8">
                    <div class="card shadow-sm p-3">
                        <table class="table align-middle">
                            <thead>
                                <tr>
                                    <th>Producto</th>
                                    <th>Precio</th>
                                    <th>Cantidad</th>
                                    <th>Subtotal</th>
                                    <th>Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($carrito as $id => $detalles)
                                    <tr>
                                        <td>
                                            <span class="fw-semibold text-dark">{{ $detalles['nombre'] }}</span>
                                        </td>
                                        <td>${{ $detalles['precio'] }}</td>
                                        <td>{{ $detalles['cantidad'] }}</td>
                                        <td>${{ $detalles['precio'] * $detalles['cantidad'] }}</td>
                                        <td>
                                            <form action="{{ route('carrito.eliminar', $id) }}" method="POST">
                                                @csrf
                                                <button type="submit" class="btn btn-danger btn-sm">Quitar</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="card shadow-sm p-4 bg-white">
                        <h4 class="fw-bold mb-3">Resumen</h4>
                        <div class="d-flex justify-content-between mb-3 fs-5">
                            <span>Total:</span>
                            <span class="fw-bold text-success">${{ $total }}</span>
                        </div>
                        
                        <form action="{{ route('carrito.comprar') }}" method="POST">
                            @csrf
                            <button type="submit" class="btn btn-dark w-100 btn-lg">Proceder a la Compra</button>
                        </form>
                        
                        <a href="{{ url('/') }}" class="btn btn-outline-secondary w-100 mt-2">Seguir mirando</a>
                    </div>
                </div>
            </div>
        @endif
    </main>

    <script src="{{ asset('vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
</body>
</html>