<!DOCTYPE html>
<html>
<head>
    <title>Panel de Administración - Ropa MJ</title>
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
            <h2 class="fw-bold text-dark mb-0">Control de Stock e Inventario</h2>
            <a href="{{ route('productos.create') }}" class="btn btn-primary fw-bold rounded-pill px-4">+ Cargar Nuevo Producto</a>
        </div>

        @if(session('success'))
            <div class="alert alert-success text-center fw-bold shadow-sm rounded-3">
                {{ session('success') }}
            </div>
        @endif

        <div class="card shadow border-0 rounded-3 overflow-hidden">
            <table class="table table-hover align-middle mb-0 bg-white">
                <thead class="table-dark">
                    <tr>
                        <th>ID</th>
                        <th>Imagen</th>
                        <th>Nombre</th>
                        <th>Precio</th>
                        <th>Género</th>
                        <th>Talles</th>
                        <th>Stock</th>
                        <th>Estado</th>
                        <th class="text-center">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($productos as $item)
                        <tr>
                            <td class="text-secondary fw-bold">{{ $item->id }}</td>
                            <td>
                                @if(!empty($item->url_imagen))
                                    @if(str_starts_with($item->url_imagen, 'images/'))
                                        <img src="{{ asset($item->url_imagen) }}" width="50" height="50" class="rounded object-fit-cover shadow-sm" alt="Prenda">
                                    @else
                                        <img src="{{ asset('images/' . $item->url_imagen) }}" width="50" height="50" class="rounded object-fit-cover shadow-sm" alt="Prenda">
                                    @endif
                                @else
                                    <img src="{{ asset('images/default.png') }}" width="50" height="50" class="rounded object-fit-cover shadow-sm" alt="Por defecto">
                                @endif
                            </td>
                            <td class="fw-bold text-dark">{{ $item->nombre }}</td>
                            <td class="fw-bold text-success">${{ number_format($item->precio, 0, ',', '.') }}</td>
                            <td>{{ $item->genero ?? 'No especificado' }}</td>
                            <td><span class="badge bg-secondary px-2 py-1">{{ $item->talle ?? 'Sin talle' }}</span></td>
                            <td class="fw-bold">{{ $item->stock }} u.</td>
                            <td>
                                @if($item->activo)
                                    <span class="badge bg-success">Activo</span>
                                @else
                                    <span class="badge bg-danger">Inactivo</span>
                                @endif
                            </td>
                            <td class="text-center">
                                <div class="d-inline-flex gap-2">
                                    <a href="{{ route('productos.edit', $item->id) }}" class="btn btn-sm btn-warning fw-bold px-3">Editar</a>

                                    <form action="{{ route('productos.estado', $item->id) }}" method="POST">
                                        @csrf
                                        @method('PATCH')
                                        <button type="submit" class="btn btn-sm fw-bold px-3 {{ $item->activo ? 'btn-danger' : 'btn-success' }}">
                                            {{ $item->activo ? 'Desactivar' : 'Activar' }}
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="9" class="text-center py-5 text-muted fw-bold bg-white">
                                No hay productos registrados en la base de datos.
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
