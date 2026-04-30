<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
<style>
    /* Contenedor principal del footer referenciado */
    .footer-mj {
        background-color: #ffffff;
        /* Esquinas superiores muy redondeadas */
        border-radius: 40px 40px 0 0 !important;
        box-shadow: 0 -5px 25px rgba(0, 0, 0, 0.1);
        border-top: 1px solid rgba(255, 255, 255, 0.3);
        padding: 15px 0;
        transition: all 0.4s ease;
    }

    /* Estilo de los links */
    .nav-link-mj {
        color: #555 !important;
        font-size: 0.85rem; /* Más pequeño para que sea sutil */
        font-weight: 600;
        text-transform: uppercase; /* Estilo minimalista */
        letter-spacing: 1px;
        transition: color 0.3s ease;
    }

    .nav-link-mj:hover {
        color: #000 !important;
    }

    /* Punto separador decorativo */
    .footer-dot {
        color: #ccc;
        padding: 0 10px;
        display: flex;
        align-items: center;
    }
</style>


</head>
<footer class="py-5 bg-dark text-white">
    <div class="container text-center">
        <div class="d-flex justify-content-center align-items-center mb-4">
            <span class="fs-4 fw-bold">ROPA MJ</span>
        </div>
        <nav class="mb-4">
            <ul class="nav justify-content-center p-3 shadow-sm w-100 border-top">
            <a href="/terminosYCondiciones" class="text-white-50 text-decoration-none mx-3">
                <p class="fs-5">Terminos y Usos</p></a>
            <a href="/consultas" class="text-white-50 text-decoration-none mx-3">
                <p class="fs-5">Consultas</p></a>
            <a href="/metodosDePago" class="text-white-50 text-decoration-none mx-3">
                <p class="fs-5">Metodos de Pago</p></a>
            </ul>
        </nav>
        <p class="text-white-50 small">&copy; 2026 Distribuidora ROPA MJ. Creado por Batalla Juan Cruz & Teruel Laola Melanie.</p>
    </div>
</footer>
<body class="d-flex flex-column min-vh-100">
    <ul class="nav justify-content-center bg-white p-3 shadow-sm w-100 border-top">
        <li class="nav-item">
            <a class="nav-link text-dark mx-2" href="/terminosYCondiciones">
                <p class="fs-4 border-bottom border-dark">Terminos y Usos</p>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link text-dark mx-2" href="/quienesSomos">
                <p class="fs-4 border-bottom border-dark">Quiénes Somos</p>
                <div class="text-secondary">
                    <p class="mb-1"><i class="bi bi-envelope me-2"></i> mayoristamjropas@gmail.com</p>
                    <p class="mb-0"><i class="bi bi-geo-alt me-2"></i> Barranqueras, Chaco</p>
                </div>
            </a>

        </li>
        <li class="nav-item">
            <a class="nav-link text-dark mx-2" href="/consultas">
                <p class="fs-4 border-bottom border-dark">Consultas</p>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link text-dark mx-2" href="/metodosDePago">
                <p class="fs-4 border-bottom border-dark">Metodos de Pago</p>
            </a>
        </li>
    </ul>
</body>

</body>
</html>
