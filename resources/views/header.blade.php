<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<style>
    /* Versión Extra Pequeña y Minimalista */
    .header-mj-container {
        background-color: #ffffff;
        border-radius: 50px !important;
        /* Reducimos padding vertical al mínimo (2px) */
        padding: 2px 15px;
        box-shadow: 0 2px 10px rgba(0,0,0,0.05);
        border: 1px solid rgba(0,0,0,0.03);
        /* Opcional: limitar el ancho máximo para que no se estire tanto */
        max-width: fit-content;
        margin: 0 auto;
    }

    /* Fuente más pequeña y links más juntos */
    .header-mj-container .nav-link {
        font-size: 0.8rem !important; /* Bajamos de 0.9 a 0.8 */
        padding: 4px 10px !important; /* Reducimos el espacio entre botones */
        font-weight: 500;
        text-transform: uppercase; /* Las mayúsculas pequeñas se ven más finas */
        letter-spacing: 0.5px;
    }

    /* Logo más compacto */
    .header-mj-container .navbar-brand {
        font-size: 0.95rem !important; /* Bajamos de 1.1 a 0.95 */
        font-weight: 800;
        margin-right: 10px;
    }

    /* Si usas iconos en el navbar, esto los achica también */
    .header-mj-container .navbar-toggler {
        padding: 0.30rem 0.5rem;
        font-size: 0.75rem;
    }
</style>


<body>
<nav class="navbar navbar-expand-lg bg-white fixed-top shadow-sm">
    <div class="container-fluid">
        <a class="navbar-brand fw-bold" href="/main">
            <p class="fs-2">ROPA MJ</p></a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>


        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="/main"><p class= "fs-4">Inicio</p></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link p-0" href="/quienesSomos" >
                        <p class="fs-4 m-0 p-2">Quiénes Somos</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/catalogo"><p class= "fs-4">Catálogo</p></a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle fs-4 d-flex align-items-center" href="/catalogo" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Ropas
                    </a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="/producto">Masculino</a></li>
                        <li><a class="dropdown-item" href="/producto">Femenino</a></li>
                        <li><a class="dropdown-item" href="/producto">Niños</a></li>
                        <li><hr class="dropdown-divider"></li>
                        <li><a class="dropdown-item" href="/catalogo">Otros</a></li>
                    </ul>
                </li>
            </ul>
            <form class="d-flex" role="search">
                <input class="form-control me-2" type="search" placeholder="Buscar" aria-label="Search">
                <button class="btn btn-outline-dark" type="submit">Search</button>
            </form>
        </div>
    </div>
</nav>


</body>

</html>
