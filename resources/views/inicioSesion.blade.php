<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inicio Sesion</title>
    <link rel="stylesheet" href="{{ asset('vendor/bootstrap/css/bootstrap.min.css') }}">
    <style>

                 /* Estilos globales aplicados al cuerpo del documento */
                body {
                    background-color: #c1a391; /* Color de fondo definido por el usuario */
                    color: #9f9393;           /* Color de fuente definido por el usuario */
                }
                body {
                    background-image: url(bg1.png);
                    background-repeat: repeat;
                    background-size: 700px; /* Aquí controlas el tamaño */
                }
                 /* Estilos globales aplicados al cuerpo del documento */
                body {
                    background-color: #c1a391; /* Color de fondo definido por el usuario */
                    color: #9f9393;           /* Color de fuente definido por el usuario */
                }
                body {
                    background-image: url(bg1.png);
                    background-repeat: repeat;
                    background-size: 700px; /* Aquí controlas el tamaño */
                }
        </style>
</head>
<body class="d-flex flex-column min-vh-100 bg-light">
    <div class= "mt-5">
    @include('header')
    </div>
    <div class= "mt-5"></div>
    <main class="container flex-grow-1 d-flex align-items-center justify-content-center pt-5 pb-5">
        <div class="card shadow-sm" style="max-width: 450px; width: 100%;">
            <div class="card-body p-4">

                <h3 class="card-title text-center mb-4 fw-bold text-dark">Iniciar Sesion</h3>

                <form action="#" method="POST">

                    <div class="mb-3">
                        <label for="email" class="form-label fw-semibold">Correo Electrónico</label>
                        <input type="email" class="form-control" id="email" name="email" placeholder="nombre@ejemplo.com" required>
                    </div>

                    <div class="mb-3">
                        <label for="password" class="form-label fw-semibold">Contraseña</label>
                        <input type="password" id="password" name="password" class="form-control" aria-describedby="passwordHelpBlock" required>
                        <div id="passwordHelpBlock" class="form-text mt-2" style="font-size: 0.82rem;">
                            Debe tener entre 8 y 20 caracteres, incluir letras y números, sin espacios ni caracteres especiales.
                        </div>
                    </div>

                    <div class="d-grid gap-2 mt-4">
                        <button type="submit" class="btn btn-dark btn-lg">Registrarse</button>
                    </div>
                </form>
                <div class="text-center mt-3">
                    <small class="text-muted">¿No tienes cuenta? <a href="registro" class="text-decoration-none text-dark fw-semibold">Registrarse</a></small>
                </div>

            </div>
        </div>
    </main>

    @include('footer')

    <script src="{{ asset('vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
</body>
</html>
