<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Mis Compras - Ropa MJ</title>
    <link rel="stylesheet" href="{{ asset('vendor/bootstrap/css/bootstrap.min.css') }}">
    <style>
        body {
            background-color: #c1a391;
            background-image: url("{{ asset('bg1.png') }}");
            background-repeat: repeat;
            background-size: 700px;
        }
    </style>
</head>
<body>

    <div class="container-fluid bg-light py-4 border-bottom">
        <div class="container">
            @include('header')
        </div>
    </div>

    <div class="container mt-5 mb-5">

        <div class="d-flex justify-content-between align-items-center mb-4 p-3 bg-light rounded shadow-sm">
            <h2 class="fw-bold text-dark mb-0">Mi Historial de Compras</h2>
            <span class="badge bg-primary fs-6 px-3 py-2 rounded-pill">Pedidos: {{ count($compras) }}</span>
        </div>

        <div class="card shadow border-0 rounded-3 overflow-hidden">
            <table class="table table-hover align-middle mb-0 bg-white">
                <thead class="table-dark">
                    <tr>
                        <th style="width: 15%;">ID Pedido</th>
                        <th style="width: 20%;">Fecha y Hora</th>
                        <th style="width: 15%;">Medio de Pago</th>
                        <th style="width: 15%;">Monto Total</th>
                        <th style="width: 15%;" class="text-center">Estado</th>
                        <th>Dirección de Entrega</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($compras as $compra)
                        <tr>
                            <td class="text-secondary fw-bold">#MJ-{{ $compra->id }}</td>
                            <td class="text-muted">{{ date('d/m/Y H:i', strtotime($compra->created_at)) }} hs</td>
                            <td class="text-dark">
                                {{ ucfirst($compra->medio_pago) }}
                                @if($compra->referencia_pago)
                                    <br><small class="text-muted">Ref: {{ $compra->referencia_pago }}</small>
                                @endif
                            </td>
                            <td class="fw-bold text-success">${{ number_format($compra->total, 2, ',', '.') }}</td>
                            <td class="text-center">
                                <span class="badge {{ $compra->estado === 'pagado' ? 'bg-success' : 'bg-warning text-dark' }} px-3 py-2 rounded-pill">
                                    {{ ucfirst($compra->estado) }}
                                </span>
                            </td>
                            <td class="text-dark text-truncate" style="max-width: 250px;">
                                {{ $compra->direccion }}, {{ $compra->localidad }} ({{ $compra->provincia }})
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="text-center py-5 text-muted fw-bold bg-white">
                                <p class="mb-2">Aún no has realizado ninguna compra en Ropa MJ.</p>
                                <a href="{{ route('catalogo.index') }}" class="btn btn-sm btn-outline-primary rounded-pill px-3">Ver catálogo</a>
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

    <div class="mt-5">
        @include('footer')
    </div>

    <script src="{{ asset('vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
</body>
</html>
