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
            <div class="table-responsive">
                <table class="table table-hover align-middle mb-0 bg-white">
                    <thead class="table-dark">
                        <tr>
                            <th style="width: 12%;">ID Pedido</th>
                            <th style="width: 18%;">Fecha y Hora</th>
                            <th style="width: 15%;">Medio de Pago</th>
                            <th style="width: 15%;">Monto Total</th>
                            <th style="width: 12%;" class="text-center">Estado</th>
                            <th style="width: 20%;">Dirección de Entrega</th>
                            <th style="width: 8%;" class="text-center">Prendas</th>
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
                                <td class="text-dark text-truncate" style="max-width: 220px;">
                                    {{ $compra->direccion }}, {{ $compra->localidad }} ({{ $compra->provincia }})
                                </td>
                                <td class="text-center">
                                    {{-- ✨ BOTÓN DINÁMICO: Permite desplegar el colapsable usando el ID único del pedido --}}
                                    <button class="btn btn-xs btn-outline-secondary btn-sm rounded-pill font-weight-bold shadow-sm" type="button" data-bs-toggle="collapse" data-bs-target="#detalle-pedido-{{ $compra->id }}" aria-expanded="false">
                                        👁️ Ver
                                    </button>
                                </td>
                            </tr>

                            {{-- ✨ NUEVA FILA COLAPSABLE: Muestra los artículos de este pedido justo abajo --}}
                            <tr class="collapse bg-light" id="detalle-pedido-{{ $compra->id }}">
                                <td colspan="7" class="p-3">
                                    <div class="card border-0 shadow-sm rounded-3">
                                        <div class="card-header bg-secondary text-white py-2 fw-bold small rounded-top-3 text-start">
                                            🛍️ Artículos incluidos en tu Pedido #MJ-{{ $compra->id }}
                                        </div>
                                        <div class="table-responsive">
                                            <table class="table table-sm table-bordered mb-0 align-middle text-center">
                                                <thead class="table-light small text-secondary text-uppercase" style="font-size: 0.8rem;">
                                                    <tr>
                                                        <th class="text-start ps-3" style="width: 50%;">Producto / Prenda</th>
                                                        <th style="width: 15%;">Precio Unitario</th>
                                                        <th style="width: 15%;">Cantidad</th>
                                                        <th class="text-end pe-3" style="width: 20%;">Subtotal</th>
                                                    </tr>
                                                </thead>
                                                <tbody class="small" style="font-size: 0.85rem;">
                                                    @foreach($compra->detalles as $detalle)
                                                        <tr>
                                                            <td class="text-start fw-bold text-dark ps-3 py-2">
                                                                {{ $detalle->nombre_producto }}
                                                            </td>
                                                            <td class="text-muted">
                                                                ${{ number_format($detalle->precio_unitario, 2, ',', '.') }}
                                                            </td>
                                                            <td class="fw-bold text-dark">
                                                                {{ $detalle->cantidad }}
                                                            </td>
                                                            <td class="text-end font-monospace text-success fw-bold pe-3">
                                                                ${{ number_format($detalle->precio_unitario * $detalle->cantidad, 2, ',', '.') }}
                                                            </td>
                                                        </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="7" class="text-center py-5 text-muted fw-bold bg-white">
                                    <p class="mb-2">Aún no has realizado ninguna compra en Ropa MJ.</p>
                                    <a href="{{ route('catalogo.index') }}" class="btn btn-sm btn-outline-primary rounded-pill px-3">Ver catálogo</a>
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <div class="mt-5">
        @include('footer')
    </div>

    <script src="{{ asset('vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
</body>
</html>