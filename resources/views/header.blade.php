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
    /* Esto hace que el submenú se posicione a la derecha del menú principal /
.dropdown-menu li {
    position: relative;
}

.dropdown-menu .submenu {
    display: none; / Oculto por defecto /
    position: absolute;
    left: 100%; / Lo mueve a la derecha /
    top: -7px;
}

/ Muestra el submenú cuando pasas el mouse por la categoría padre */
.dropdown-menu li:hover > .submenu {
    display: block;
}
/* Posicionamiento del submenú */
.dropdown-submenu {
    position: relative;
}

.dropdown-submenu .dropdown-menu {
    top: 0;
    left: 100%; /* Lo mueve a la derecha del menú principal */
    margin-top: -1px;
    display: none; /* Oculto por defecto */
}

/* Mostrar al hacer hover */
.dropdown-submenu:hover > .dropdown-menu {
    display: block;
}

/* Ajuste para que la flecha apunte a la derecha en el submenú */
.dropdown-submenu .dropdown-toggle::after {
    transform: rotate(-90deg);
    vertical-align: middle;
    margin-left: 10px;
}


</style>

<body>
<nav class="navbar navbar-expand-lg bg-white fixed-top shadow-sm">
    <div class="container-fluid">
        <a class="navbar-brand fw-bold" href="/main">
            <p class="fs-2 mb-0">ROPA MJ</p>
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <!-- Enlaces del lado izquierdo (Tus categorías originales) -->
            <ul class="navbar-nav me-auto mb-2 mb-lg-0 align-items-center">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="/main"><p class="fs-4 mb-0">Inicio</p></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link p-0" href="/quienesSomos">
                        <p class="fs-4 m-0 p-2">Quiénes Somos</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/catalogo"><p class="fs-4 mb-0">Catálogo</p></a>
                </li>

                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle fs-4 d-flex align-items-center" href="/catalogo" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Ropas
                    </a>
                    <ul class="dropdown-menu">
                        <!-- Submenú Masculino -->
                        <li class="dropdown-submenu">
                            <a class="dropdown-item dropdown-toggle" href="/catalogoM">Masculino</a>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="/catalogoChaleco">Chaleco</a></li>
                                <li><a class="dropdown-item" href="/catalogoChaleco">Pantalones</a></li>
                                <li><a class="dropdown-item" href="/catalogoChaleco">Buzos</a></li>
                            </ul>
                        </li>
                        <li><a class="dropdown-item" href="/catalogoF">Femenino</a></li>
                        <li><a class="dropdown-item" href="/catalogoN">Niños</a></li>
                        <li><hr class="dropdown-divider"></li>
                        <li><a class="dropdown-item" href="/catalogo">Otros</a></li>
                    </ul>
                </li>
            </ul>
            <div class="d-flex align-items-center ms-auto gap-2">

                <a href="{{ route('carrito.ver') }}" class="btn btn-outline-dark position-relative me-2">
                    <span class="me-1">🛒</span> 
                    @if(session()->has('carrito') && count(session('carrito')) > 0)
                        <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">
                            {{ count(session('carrito')) }}
                        </span>
                    @endif
                </a>

                @if(session()->has('user_id'))
                    <div class="dropdown me-2">
                        <button class="btn btn-outline-dark dropdown-toggle fw-semibold" type="button" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">
                            👤 Hola, {{ session('user_name') }}

                            @if(session('id_rol') == 1 || session('user_id') == 1)
                                <span class="badge bg-danger ms-1" style="font-size: 0.7rem;">Admin</span>
                            @endif
                        </button>

                        <ul class="dropdown-menu dropdown-menu-end shadow" aria-labelledby="dropdownMenuButton">
                            @if(session('id_rol') == 1 || session('user_id') == 1)
                                <li><h6 class="dropdown-header text-dark fw-bold">Panel de Gestión</h6></li>
                                <li><a class="dropdown-item" href="{{ url('/main') }}"> Productos</a></li>
                                <li><a class="dropdown-item" href="{{ url('/gestionar-ventas') }}">💰 Gestionar Ventas</a></li>
                                <li><a class="dropdown-item" href="{{ url('/consultas') }}">💬 Gestionar Consultas</a></li>
                                <li><hr class="dropdown-divider"></li>
                            @endif

                            <li>
                                <form action="{{ route('logout') }}" method="POST" class="px-3 py-1">
                                    @csrf
                                    <button type="submit" class="btn btn-sm btn-dark w-100">Cerrar Sesión</button>
                                </form>
                            </li>
                        </ul>
                    </div>
                @else
                    <a href="{{ url('/login') }}" class="btn btn-outline-dark me-2 fw-semibold">Iniciar Sesión</a>
                @endif

                <form class="d-flex" role="search">
                    <input class="form-control me-2" type="search" placeholder="Buscar" aria-label="Search">
                    <button class="btn btn-outline-dark" type="submit">Search</button>
                </form>

            </div>  

        </div>
    </div>
</nav>
</body>

</html>


