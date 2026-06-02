<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestión de Consultas</title>
    
    <link rel="stylesheet" href="{{ asset('vendor/bootstrap/css/bootstrap.min.css') }}">
    
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <style>
        body {
            background-color: #c1a391;
            color: #9f9393;
            background-image: url("{{ asset('bg1.png') }}");
            background-repeat: repeat;
            background-size: 700px;
        }
    </style>
</head>
<body>

    <div class="container mt-3 mb-5">
        @include('header')
    </div>

    <div class="container py-4">
        
        <div class="row align-items-center mb-4 p-4 rounded-3 shadow-sm" style="background-color: rgba(255, 255, 255, 0.85); backdrop-filter: blur(5px);">
            <div class="col-md-6">
                <h1 class="h2 mb-1 text-dark fw-bold">Buzón de Consultas</h1>
                <p class="text-dark mb-0 fw-semibold" style="opacity: 0.85;">Gestioná y respondé los mensajes que envían los clientes desde la web.</p>
            </div>
            <div class="col-md-6 text-md-end mt-3 mt-md-0">
                <span class="badge bg-secondary p-2 px-3 fs-6 me-2 shadow-sm">
                    Total: {{ $consultas->count() }}
                </span>
                <span class="badge bg-warning text-dark p-2 px-3 fs-6 me-2 shadow-sm">
                    Pendientes: {{ $consultas->whereNull('respuesta')->count() }}
                </span>
                <span class="badge bg-success p-2 px-3 fs-6 shadow-sm">
                    Respondidas: {{ $consultas->whereNotNull('respuesta')->count() }}
                </span>
            </div>
        </div>
        @if(session('success'))
            <div class="alert alert-success alert-dismissible fade show shadow-sm border-0 mb-4" role="alert">
                <div class="d-flex align-items-center text-dark">
                    <i class="fa-solid fa-circle-check me-2 fs-5 text-success"></i>
                    <div>{{ session('success') }}</div>
                </div>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        <div class="card border-0 shadow rounded-3 overflow-hidden">
            <div class="card-body p-0">
                <div class="table-responsive">
                    <table class="table table-hover align-middle mb-0 bg-white">
                        <thead class="table-light">
                            <tr class="text-secondary fw-semibold fs-7 text-uppercase">
                                <th class="ps-4" style="width: 15%">Fecha</th>
                                <th style="width: 25%">Cliente</th>
                                <th style="width: 15%">Tipo</th>
                                <th style="width: 25%">Consulta</th>
                                <th style="width: 13%">Estado</th>
                                <th class="text-end pe-4" style="width: 12%">Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($consultas as $consulta)
                                <tr class="@if(empty($consulta->respuesta)) fw-bold table-light @endif">
                                    <td class="ps-4 text-muted">
                                        {{ $consulta->created_at->format('d/m/Y') }}<br>
                                        <small class="text-muted fw-normal">{{ $consulta->created_at->format('H:i') }} hs</small>
                                    </td>
                                    <td>
                                        <div class="text-dark">{{ $consulta->nombre ?? 'Usuario Web' }}</div>
                                        <small class="text-muted text-break">{{ $consulta->correo }}</small>
                                    </td>
                                    <td>
                                        <span class="badge bg-info text-white text-capitalize px-2 py-1 shadow-sm">
                                            <i class="fa-solid fa-question-circle me-1"></i> {{ $consulta->tipoConsul ?? 'General' }}
                                        </span>
                                    </td>
                                    <td>
                                        <p class="mb-0 text-truncate text-dark" style="max-width: 280px;" title="{{ $consulta->descripcion }}">
                                            {{ $consulta->descripcion }}
                                        </p>
                                    </td>
                                    <td>
                                        @if(empty($consulta->respuesta))
                                            <span class="badge rounded-pill bg-warning text-dark px-3 py-2 shadow-sm">
                                                <i class="fa-solid fa-clock me-1"></i> Pendiente
                                            </span>
                                        @else
                                            <span class="badge rounded-pill bg-success px-3 py-2 shadow-sm">
                                                <i class="fa-solid fa-check-double me-1"></i> Respondido
                                            </span>
                                        @endif
                                    </td>
                                    <td class="text-end pe-4">
                                        <button type="button" class="btn btn-sm @if(empty($consulta->respuesta)) btn-primary @else btn-outline-secondary @endif shadow-sm" 
                                                data-bs-toggle="modal" 
                                                data-bs-target="#modalConsulta{{ $consulta->id }}">
                                            <i class="fa-solid fa-envelope-open me-1"></i> Gestionar
                                        </button>
                                    </td>
                                </tr>

                                <div class="modal fade" id="modalConsulta{{ $consulta->id }}" tabindex="-1" aria-labelledby="modalLabel{{ $consulta->id }}" aria-hidden="true">
                                    <div class="modal-dialog modal-lg modal-dialog-centered">
                                        <div class="modal-content border-0 shadow-lg">
                                            <div class="modal-header bg-dark text-white border-0">
                                                <h5 class="modal-title" id="modalLabel{{ $consulta->id }}">
                                                    <i class="fa-solid fa-user-circle me-2 text-info"></i> Consulta de {{ $consulta->nombre ?? $consulta->correo }}
                                                </h5>
                                                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>

                                            <form action="{{ route('admin.consultas.responder', $consulta->id) }}" method="POST">
                                                @csrf
                                                @method('PUT')
                                                
                                                <div class="modal-body p-4 text-start fw-normal">
                                                    <div class="row mb-3">
                                                        <div class="col-sm-6">
                                                            <small class="text-uppercase text-muted d-block fw-bold fs-8">Correo Electrónico</small>
                                                            <a href="mailto:{{ $consulta->correo }}" class="text-decoration-none fw-semibold">{{ $consulta->correo }}</a>
                                                        </div>
                                                        <div class="col-sm-6 text-sm-end mt-2 mt-sm-0">
                                                            <small class="text-uppercase text-muted d-block fw-bold fs-8">Fecha de recepción</small>
                                                            <span class="text-dark fw-semibold">{{ $consulta->created_at->format('d/m/Y - H:i') }} hs</span>
                                                        </div>
                                                    </div>

                                                    <div class="bg-light p-3 rounded-3 mb-4 border-start border-4 border-info">
                                                        <h6 class="text-info fw-bold mb-2"><i class="fa-solid fa-quote-left me-1"></i> Mensaje Recibido:</h6>
                                                        <p class="mb-0 text-dark" style="white-space: pre-wrap; line-height: 1.5;">{{ $consulta->descripcion }}</p>
                                                    </div>

                                                    <div class="mb-3">
                                                        <label for="respuesta{{ $consulta->id }}" class="form-label fw-bold text-dark">
                                                            <i class="fa-solid fa-reply me-1 text-primary"></i> Redactar respuesta para el cliente:
                                                        </label>
                                                        <textarea class="form-control text-dark" id="respuesta{{ $consulta->id }}" name="respuesta" rows="6" required placeholder="Escribí acá tu respuesta...">{{ $consulta->respuesta }}</textarea>
                                                    </div>
                                                </div>

                                                <div class="modal-footer bg-light border-0">
                                                    <button type="button" class="btn btn-secondary px-4" data-bs-dismiss="modal">Cerrar</button>
                                                    <button type="submit" class="btn btn-success px-4">
                                                        <i class="fa-solid fa-paper-plane me-1"></i> Guardar y Enviar
                                                    </button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            @empty
                                <tr>
                                    <td colspan="6" class="text-center py-5 text-muted">
                                        <i class="fa-regular fa-folder-open fs-1 d-block mb-3 text-secondary"></i>
                                        <span class="fs-5 fw-semibold d-block">No se encontraron consultas</span>
                                    </td>
                                endtr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <script src="{{ asset('vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

    <div class="mt-3">
        @include('footer')
    </div>
</body>
</html>