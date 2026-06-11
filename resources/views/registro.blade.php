<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">git commit -m "Merge y resolución de conflicto en vista registro"git commit -m "Merge y resolución de conflicto en vista registro"
    <title>Registro - Ropa MJ</title>
    <link rel="stylesheet" href="{{ asset('vendor/bootstrap/css/bootstrap.min.css') }}">
    <style>
        /* Estilos globales aplicados al cuerpo del documento */
        body {
            background-color: #c1a391; /* Color de fondo definido por el usuario */
            color: #9f9393;           /* Color de fuente definido por el usuario */
            background-image: url(bg1.png);
            background-repeat: repeat;
            background-size: 700px; /* Aquí controlas el tamaño */
        }
    </style>
</head>
<body class="d-flex flex-column min-vh-100 bg-light">
    <div class="mt-5">
        @include('header')
    </div>
    <div class="mt-5"></div>

    <main class="container flex-grow-1 d-flex align-items-center justify-content-center pt-5 pb-5">
        <div class="card shadow-sm" style="max-width: 450px; width: 100%;">
            <div class="card-body p-4">

                @if ($errors->any())
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <ul class="mb-0">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif
                <h3 class="card-title text-center mb-4 fw-bold text-dark">Crear Cuenta</h3>

                @if (session('success'))
                    <div class="alert alert-success alert-dismissible fade show text-center" role="alert">
                        {{ session('success') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif

                
                @if(session('success'))
                    <div class="alert alert-success alert-dismissible fade show fw-bold shadow-sm mb-4" role="alert">
                        <i class="bi bi-check-circle-fill me-2"></i> {{ session('success') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif

                @if($errors->any())
                    <div class="alert alert-danger alert-dismissible fade show shadow-sm mb-4" role="alert">
                        <strong class="d-block mb-1"><i class="bi bi-exclamation-triangle-fill me-2"></i> No se pudo crear la cuenta:</strong>
                        <ul class="mb-0 ps-3">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif

                <form action="{{ route('cuenta.procesar') }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label for="nombre" class="form-label fw-semibold">Nombre</label>
                        <input type="text" name="nombre" class="form-control" id="nombre" placeholder="Nombre" required>
                    </div>

                    <div class="mb-3">
                        <label for="apellido" class="form-label fw-semibold">Apellido</label>
                        <input type="text" name="apellido" class="form-control" id="apellido" placeholder="Apellido" required>
                    </div>

                    <div class="mb-3">
                        <label for="correo" class="form-label fw-semibold">Correo Electrónico</label>
                        <input type="email" class="form-control" id="correo" name="correo" value="{{ old('correo') }}" placeholder="nombre@ejemplo.com" required>
                    </div>

                   <div class="mb-3">
                        <label for="password" class="form-label fw-semibold">Contraseña</label>
                        <input type="password" id="password" name="password" class="form-control" aria-describedby="passwordHelpBlock" required>
                        <div id="passwordHelpBlock" class="form-text mt-2" style="font-size: 0.82rem;">
                            Debe tener entre 8 y 20 caracteres, incluir letras y números, sin espacios ni caracteres especiales.
                        </div>
                    </div>

                    <div class="mb-3">
                        <label for="password_confirmation" class="form-label fw-semibold">Repetir Contraseña</label>
                        <input type="password" id="password_confirmation" name="password_confirmation" class="form-control" aria-describedby="passwordConfirmationHelpBlock" required>
                        <div id="passwordConfirmationHelpBlock" class="form-text mt-2" style="font-size: 0.82rem;">
                            Por favor, vuelve a escribir la contraseña exactamente igual.
                        </div>
                    </div>

                    <div class="d-grid gap-2 mt-4">
                        <button type="submit" class="btn btn-dark btn-lg">Registrarse</button>
                    </div>
                </form>

                <div class="text-center mt-3">
                    <small class="text-muted">¿Ya tienes cuenta? <a href="inicioSesion" class="text-decoration-none text-dark fw-semibold">Inicia sesión</a></small>
                </div>

            </div>
        </div>
    </main>

    @include('footer')

    <script src="{{ asset('vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
</body>
</html>
