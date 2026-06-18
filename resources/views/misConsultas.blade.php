<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mis Consultas - Ropa MJ</title>
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
            <h2 class="fw-bold text-dark mb-0">Mi Historial de Consultas</h2>
            <span class="badge bg-dark fs-6 px-3 py-2 rounded-pill">Preguntas: {{ count($consultas) }}</span>
        </div>

        <div class="card shadow border-0 rounded-3 overflow-hidden">
            <div class="table-responsive">
                <table class="table table-hover align-middle mb-0 bg-white">
                    <thead class="table-dark">
                        <tr>
                            <th style="width: 15%;">Fecha</th>
                            <th style="width: 20%;">Motivo</th>
                            <th style="width: 35%;">Mi Pregunta</th>
                            <th style="width: 12%;" class="text-center">Estado</th>
                            <th style="width: 18%;">Respuesta</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($consultas as $consulta)
                            <tr>
                                <td class="text-muted" style="font-size: 0.88rem;">
                                    {{ date('d/m/Y H:i', strtotime($consulta->created_at)) }} hs
                                </td>
                                <td>
                                    <span class="fw-bold text-dark">{{ $consulta->tipoConsul }}</span>
                                </td>
                                <td class="text-secondary" style="font-size: 0.9rem;">
                                    {{ $consulta->descripcion }}
                                </td>
                                <td class="text-center">
                                    @if(strtolower($consulta->estado) == 'pendiente' || empty($consulta->respuesta))
                                        <span class="badge bg-warning text-dark px-3 py-2 rounded-pill text-uppercase" style="font-size: 0.72rem;">Pendiente</span>
                                    @else
                                        <span class="badge bg-success px-3 py-2 rounded-pill text-uppercase" style="font-size: 0.72rem;">Respondido</span>
                                    @endif
                                </td>
                                <td class="text-dark" style="font-size: 0.9rem; background-color: #fcfbfa;">
                                    @if(!empty($consulta->respuesta))
                                        <div class="p-2 bg-light rounded text-dark border-start border-success border-3">
                                            {{ $consulta->respuesta }}
                                        </div>
                                    @else
                                        <div class="text-muted text-center py-2" style="font-style: italic; font-size: 0.85rem;">—</div>
                                    @endif
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5" class="text-center py-5 text-muted fw-bold bg-white">
                                    <i class="bi bi-chat-left-x fs-4 d-block mb-2"></i>
                                    Aún no has realizado ninguna consulta en nuestra tienda.
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
