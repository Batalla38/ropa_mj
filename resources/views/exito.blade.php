<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Respuesta Recibida</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="container mt-5">
    <div class="alert alert-success">
        <p class="lead">
            Hola <strong>{{ $nombre }}</strong>, qué bueno recibir tu mensaje.
            Un miembro del equipo de ventas se pondrá en contacto con vos al correo:
            <strong>{{ $email }}</strong> ¡Muchas gracias!
        </p>
    </div>
    <a href="{{ url('/contacto') }}" class="btn btn-primary">Volver</a>
</body>
</html>
