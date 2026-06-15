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
            .titulo-panel {
                background-color: rgba(255, 255, 255, 0.75);
                color: #4a3e3d !important;
                padding: 15px 25px;
                border-radius: 8px; 
                box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.15);
                width: 100%;
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

        <div class="container" style="margin-top: 140px; margin-bottom: 4rem;">
            
            <div class="mb-4">
                <h2 class="titulo-panel text-center font-weight-bold mb-0">Panel de Gestión de Consultas</h2>
            </div>

            @if(session('exito'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <strong>¡Hecho!</strong> {{ session('exito') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif

            @if($errors->any())
                <div class="alert alert-danger text-dark shadow-sm" role="alert">
                    <strong>⚠️ Hubo un problema con la respuesta:</strong>
                    <ul class="mb-0 mt-1">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
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
                                <!-- REEMPLAZÁ EL BLOQUE DE TUS BOTONES DE ACCIÓN POR ESTE -->
                                    <td class="text-center">
                                        @if($consulta->estado == 'Pendiente')
                                            <!-- Cambiado a etiqueta <a> para que el navegador NO intente enviar formularios antes de tiempo -->
                                            <a href="#" class="btn btn-sm btn-primary" data-bs-toggle="modal" data-bs-target="#responderModal{{ $consulta->id }}">
                                                Responder
                                            </a>
                                        @else
                                            <!-- Cambiado a etiqueta <a> por seguridad -->
                                            <a href="#" class="btn btn-sm btn-outline-secondary" data-bs-toggle="modal" data-bs-target="#verRespuestaModal{{ $consulta->id }}">
                                                Ver Respuesta
                                            </a>
                                        @endif
                                    </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5" class="text-center text-muted py-4">No se encontraron consultas en la base de datos.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>

        @foreach($consultas as $consulta)
            
            <div class="modal fade" id="responderModal{{ $consulta->id }}" tabindex="-1" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content text-dark">
                        <div class="modal-header">
                            <h5 class="modal-title">Responder a: {{ $consulta->correo }}</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        
                        <form action="{{ url('/gestionConsultas/' . $consulta->id . '/responder') }}" method="POST">
                            @csrf
                            
                            <div class="modal-body">
                                <p><strong>Consulta original ({{ $consulta->tipoConsul }}):</strong></p>
                                <blockquote class="bg-light p-2 rounded text-muted">
                                    "{{ $consulta->descripcion }}"
                                </blockquote>
                                
                                <div class="mb-3">
                                    <label class="form-label font-weight-bold">Escribe tu respuesta:</label>
                                    <textarea class="form-control" name="respuesta" rows="4" required placeholder="Escribí acá la respuesta oficial de la tienda..."></textarea>
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
                            <h5 class="modal-title">Detalle de Consulta</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <p><strong>Mensaje del cliente:</strong></p>
                            <p class="text-muted bg-light p-2 rounded">"{{ $consulta->descripcion }}"</p>
                            <hr>
                            <p class="text-success"><strong>Tu Respuesta:</strong></p>
                            <p class="bg-light p-2 rounded">"{{ $consulta->respuesta }}"</p>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                        </div>
                    </div>
                </div>
            </div>

        @endforeach

        <script src="{{ asset('vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

        <div class="mt-3">
            @include('footer')
        </div>
    </body>
</html>