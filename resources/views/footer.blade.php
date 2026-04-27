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
<body class="d-flex flex-column min-vh-100">
        <ul class="nav justify-content-end bg-white p-3 shadow-sm w-100 m-10 border-top ">
            <li class="nav-item">
                <a class="nav-link text-dark" href="#"><p class="fs-4">Terminos y Usos</p></a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-dark fs-4" href="/quienesSomos">Quiénes Somos</a>
             </li>
            <li class="nav-item">
                <a class="nav-link text-dark " href="/consultas"><p class="fs-4">Consultas</p></a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-dark" href="/metodosDePago"><p class="fs-4">Metodos de Pago (Comercializacion)</p></a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-dark" href="#"><p class="fs-4"></p></a>
            </li>
        </ul>

</body>
</html>
