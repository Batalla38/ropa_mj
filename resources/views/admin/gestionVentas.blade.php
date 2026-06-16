<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Panel de Ventas - Ropa MJ</title>
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
            <h2 class="fw-bold text-dark mb-0">Control Global de Ventas</h2>
            <span class="badge bg-danger fs-6 px-3 py-2 rounded-pill">Total Pedidos: {{ count($compras) }}</span>
        </div>

        <div class="row mb-4">
            <div class="col-md-12">
                <div class="card border-0 shadow-sm bg-white p-3 rounded-3 text-center">
                    <h6 class="text-muted fw-bold text-uppercase mb-1" style="font-size: 0.85rem;">Total Caja Recaudado</h6>
                    <span class="fs-3 fw-bold text-success">
                        ${{ number_format($compras->sum('total'), 2, ',', '.') }}
                    </span>
                </div>
            </div>
        </div>

        <div class="card shadow border-0 rounded-3 overflow-hidden">
            <div class="table-responsive">
                <table class="table table-hover align-middle mb-0 bg-white">
                    <thead class="table-dark">
                        <tr>
                            <th style="width: 10%;">ID Venta</th>
                            <th style="width: 22%;">Cliente Comprador</th>
                            <th style="width: 15%;">Fecha y Hora</th>
                            <th style="width: 15%;">Total Abonado</th>
                            <th style="width: 10%;" class="text-center">Estado</th>
                            <th style="width: 18%;">Dirección de Entrega / Pago</th>
                            <th style="width: 10%;" class="text-center">Artículos</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($compras as $compra)
                            <tr>
                                <td class="text-secondary fw-bold">#MJ-{{ $compra->id }}</td>
                                <td>
                                    {{-- Como usamos el user_id de la venta, extraemos el correo seguro del primer detalle --}}
                                    <div class="fw-bold text-dark">Usuario ID: {{ $compra->user_id }}</div>
                                    <small class="text-muted" style="font-size: 0.85rem;">
                                        {{ $compra->detalles->first()->correo ?? 'Sin correo registrado' }}
                                    </small>
                                </td>
                                <td class="text-muted">
                                    {{ date('d/m/Y H:i', strtotime($compra->created_at)) }} hs
                                </td>
                                <td class="fw-bold text-success">
                                    ${{ number_format($compra->total, 2, ',', '.') }}
                                </td>
                                <td class="text-center">
                                    @if(strtolower($compra->estado) == 'pendiente')
                                        <span class="badge bg-warning text-dark px-3 py-2 rounded-pill text-uppercase" style="font-size: 0.75rem;">Pendiente</span>
                                    @else
                                        <span class="badge bg-success px-3 py-2 rounded-pill text-uppercase" style="font-size: 0.75rem;">{{ $compra->estado }}</span>
                                    @endif
                                </td>
                                <td class="text-dark" style="font-size: 0.9rem; line-height: 1.4;">
                                    <div class="fw-bold">Envío a:</div>
                                    <div>{{ $compra->direccion }}, {{ $compra->localidad }} ({{ $compra->provincia }})</div>
                                    <div class="mt-1 text-muted small">
                                        <strong>Medio de Pago:</strong> {{ ucfirst($compra->medio_pago) }}
                                        @if($compra->referencia_pago)
                                            | <strong>Ref:</strong> {{ $compra->referencia_pago }}
                                        @endif
                                    </div>
                                </td>
                                <td class="text-center">
                                    {{-- ✨ Botón dinámico para desplegar el colapsable --}}
                                    <button class="btn btn-sm btn-outline-secondary fw-bold rounded-pill shadow-sm" type="button" data-bs-toggle="collapse" data-bs-target="#productos-{{ $compra->id }}" aria-expanded="false">
                                        👁️ Ver
                                    </button>
                                </td>
                            </tr>

                            {{-- ✨ NUEVO FILA COLAPSABLE: Desglose de productos de cada pedido --}}
                            <tr class="collapse bg-light" id="productos-{{ $compra->id }}">
                                <td colspan="7" class="p-3">
                                    <div class="card border-0 shadow-sm rounded-3">
                                        <div class="card-header bg-secondary text-white py-2 fw-bold small rounded-top-3">
                                            📦 Detalle de Artículos - Pedido #MJ-{{ $compra->id }}
                                        </div>
                                        <div class="table-responsive">
                                            <table class="table table-sm table-bordered mb-0 align-middle text-center">
                                                <thead class="table-light small">
                                                    <tr>
                                                        <th style="width: 15%;">Código Prenda</th>
                                                        <th class="text-start">Descripción del Producto</th>
                                                        <th>Precio Unitario</th>
                                                        <th>Cantidad</th>
                                                        <th class="text-end pe-3">Subtotal</th>
                                                    </tr>
                                                </thead>
                                                <tbody class="small">
                                                    @foreach($compra->detalles as $detalle)
                                                        <tr>
                                                            <td class="font-monospace text-secondary">#PROD-{{ $detalle->id_producto }}</td>
                                                            <td class="text-start fw-bold text-dark">{{ $detalle->nombre_producto }}</td>
                                                            <td>${{ number_format($detalle->precio_unitario, 2, ',', '.') }}</td>
                                                            <td class="fw-bold">{{ $detalle->cantidad }}</td>
                                                            <td class="text-end font-monospace text-success pe-3">
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
                                    No se registran ventas realizadas en el sistema todavía.
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