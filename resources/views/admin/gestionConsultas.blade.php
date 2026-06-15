<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <title>Gestión de Consultas - Ropa MJ</title>
        <link rel="stylesheet" href="{{ asset('vendor/bootstrap/css/bootstrap.min.css') }}">
        <style>
            body {
                background-color: #c1a391;
                background-image: url("{{ asset('bg1.png') }}");
                background-repeat: repeat;
                background-size: 700px;
            }
            .tabla-contenedor {
                background-color: rgba(255, 255, 255, 0.95);
                border-radius: 8px;
                box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.15);
            }
            .badge-pendiente {
                background-color: #ffc107;
                color: #000;
            }
            .badge-respondido {
                background-color: #198754;
                color: #fff;
            }
        </style>
    </head>
    <body>
        
        <div class="container mt-3 mb-5">
            @include('header')
        </div>

        <div class="container mt-5 mb-5">
            <h2 class="text-white text-center mb-4 font-weight-bold">Panel de Gestión de Consultas</h2>

            @if(session('exito'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ session('exito') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif

            <div class="p-4 table-responsive tabla-contenedor">
                <table class="table table-hover align-middle mb-0">
                    <thead class="table-dark">
                        <tr>
                            <th>Correo</th>
                            <th>Tipo Consulta</th>
                            <th>Descripción</th>
                            <th class="text-center">Estado</th>
                            <th class="text-center">Acción</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($consultas as $consulta)
                            <tr>
                                <td><strong>{{ $consulta->correo }}</strong></td>
                                <td>
                                    <span class="badge bg-secondary">{{ $consulta->tipoConsul }}</span>
                                </td>
                                <td>{{ \Str::limit($consulta->descripcion, 60, '...') }}</td>
                                <td class="text-center">
                                    @if($consulta->estado == 'Pendiente')
                                        <span class="badge badge-pendiente p-2">Pendiente</span>
                                    @else
                                        <span class="badge badge-respondido p-2">Respondido</span>
                                    @endif
                                </td>
                                <td class="text-center">
                                    @if($consulta->estado == 'Pendiente')
                                        <button type="button" class="btn btn-sm btn-primary" data-bs-toggle="modal" data-bs-target="#responderModal{{ $consulta->id }}">
                                            Responder
                                        </button>
                                    @else
                                        <button type="button" class="btn btn-sm btn-outline-secondary" data-bs-toggle="modal" data-bs-target="#verRespuestaModal{{ $consulta->id }}">
                                            Ver Respuesta
                                        </button>
                                    @endif
                                </td>
                            </tr>

                            <div class="modal fade" id="responderModal{{ $consulta->id }}" tabindex="-1" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered">
                                    <div class="modal-content text-dark">
                                        <div class="modal-header">
                                            <h5 class="modal-title">Responder a: {{ $consulta->correo }}</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <form action="{{ route('admin.consultas.responder', $consulta->id) }}" method="POST">
                                            @csrf
                                            @method('PUT')
                                            <div class="modal-body">
                                                <p><strong>Consulta ({{ $consulta->tipoConsul }}):</strong></p>
                                                <blockquote class="bg-light p-2 rounded text-muted">
                                                    "{{ $consulta->descripcion }}"
                                                </blockquote>
                                                
                                                <div class="mb-3">
                                                    <label for="respuesta" class="form-label font-weight-bold">Escribe tu respuesta:</label>
                                                    <textarea class="form-control" name="respuesta" rows="4" required placeholder="Escribe aquí la solución o respuesta para el cliente..."></textarea>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                                                <button type="submit" class="btn btn-success">Enviar Respuesta</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>

                            <div class="modal fade" id="verRespuestaModal{{ $consulta->id }}" tabindex="-1" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered">
                                    <div class="modal-content text-dark">
                                        <div class="modal-header">
                                            <h5 class="modal-title">Consulta de {{ $consulta->correo }}</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <p><strong>Mensaje original:</strong></p>
                                            <p class="text-muted bg-light p-2 rounded">"{{ $consulta->descripcion }}"</p>
                                            <hr>
                                            <p class="text-success"><strong>Respuesta del Administrador:</strong></p>
                                            <p class="bg-light p-2 rounded">"{{ $consulta->respuesta }}"</p>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        @empty
                            <tr>
                                <td colspan="5" class="text-center text-muted py-4">No se encontraron consultas en la base de datos.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>

        <script src="{{ asset('vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

        <div class="mt-3">
            @include('footer')
        </div>
    </body>
</html>