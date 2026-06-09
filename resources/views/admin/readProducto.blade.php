<!DOCTYPE html>
<html>
    <head>
        <title>Gestión de Productos - Ropa MJ</title>
        <link rel="stylesheet" href="{{ asset('vendor/bootstrap/css/bootstrap.min.css') }}">
        <style>
            body {
                background-color: #c1a391;
                color: #333333;
                background-image: url({{ asset('bg1.png') }});
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

        <div class="container mt-5">
            <div class="card p-4 shadow-sm bg-white border-0 mb-3">
                <div class="d-flex justify-content-between align-items-center">
                    <h1 class="h3 mb-0 fw-bold text-dark">Panel de Administración de Prendas</h1>
                    <span class="badge bg-secondary fs-6">Total: {{ $productos->count() }} prendas</span>
                </div>
            </div>
        </div>

        <div class="container mt-2 bg-light rounded shadow-sm py-3 px-4">
            <div class="row text-center fw-bold text-secondary align-items-center">
                <div class="col">Nombre</div>
                <div class="col">Descripción</div>
                <div class="col">Talles</div>
                <div class="col">Precio</div>
                <div class="col">Stock</div>
                <div class="col">Acciones</div>
            </div>
        </div>

        <div class="container mt-1">
            @forelse($productos as $item)
                <div class="bg-light rounded shadow-sm p-3 mb-2 border-0 px-4">
                    <div class="row text-center align-items-center">

                        <div class="col fw-bold text-dark">
                            {{ $item->nombre }}
                        </div>

                        <div class="col text-muted small">
                            {{ Str::limit($item->descripcion, 40, '...') }}
                        </div>

                        <div class="col text-secondary">
                            {{ $item->talle ?? 'N/A' }}
                        </div>

                        <div class="col text-success fw-bold">
                            ${{ number_format($item->precio, 2, ',', '.') }}
                        </div>

                        <div class="col text-dark">
                            {{ $item->stock }} u.
                        </div>

                        <div class="col">
                            <div class="btn-group" role="group" aria-label="Acciones de producto">

                                <button type="button" class="btn btn-danger btn-sm">Eliminar</button>

                                <a href="{{ route('productos.edit', $item->id) }}" class="btn btn-warning btn-sm fw-semibold">Editar</a>

                                <form action="{{ route('productos.estado', $item->id) }}" method="POST" style="display:inline;">
                                    @csrf
                                    @method('PATCH')
                                    @if($item->activo == 1)
                                        <button type="submit" class="btn btn-success btn-sm">Activo</button>
                                    @else
                                        <button type="submit" class="btn btn-secondary btn-sm">Inactivo</button>
                                    @endif
                                </form>

                            </div>
                        </div>

                    </div>
                </div>
            @empty
                <div class="alert alert-warning text-center mt-3" role="alert">
                    No se encontraron productos en la base de datos.
                </div>
            @endforelse
        </div>

        <script src="{{ asset('vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
        <div class="mt-5">
            @include('footer')
        </div>
    </body>
</html>
