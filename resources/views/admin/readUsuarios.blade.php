<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Panel de Usuarios - Ropa MJ</title>
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
            <h2 class="fw-bold text-dark mb-0">Control de Usuarios Registrados</h2>
            <span class="badge bg-primary fs-6 px-3 py-2 rounded-pill">Total: {{ count($usuarios) }}</span>
        </div>

        <div class="card shadow border-0 rounded-3 overflow-hidden">
            <table class="table table-hover align-middle mb-0 bg-white">
                <thead class="table-dark">
                    <tr>
                        <th style="width: 15%;">ID Usuario</th>
                        <th>Nombre Completo</th>
                        <th>Correo Electrónico</th>
                        <th class="text-center" style="width: 20%;">Rol / Estado</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($usuarios as $user)
                        <tr>
                            <td class="text-secondary fw-bold">#{{ $user->id }}</td>
                            <td class="text-dark">{{ $user->nombre }} {{ $user->apellido }}</td>
                            <td class="fw-bold text-dark">{{ $user->correo }}</td>
                            <td class="text-center">
                                <span class="badge {{ $user->id_rol == 1 ? 'bg-danger' : 'bg-success' }} px-3 py-2 rounded-pill">
                                    {{ $user->id_rol == 1 ? 'Administrador' : 'Cliente' }}
                                </span>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="4" class="text-center py-5 text-muted fw-bold bg-white">
                                No hay usuarios registrados en el sistema actualmente.
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
