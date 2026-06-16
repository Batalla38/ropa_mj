<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <title>Ropa MJ</title>
        <link rel="stylesheet" href="{{ asset('vendor/bootstrap/css/bootstrap.min.css') }}">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
        <style>
            body {
                background-color: #c1a391;
                color: #9f9393;
                background-image: url({{ asset('bg1.png') }});
                background-repeat: repeat;
                background-size: 700px;
            }

            .card-animada {
                transition: transform 0.3s ease-in-out, box-shadow 0.3s ease-in-out;
                cursor: pointer;
            }

            .card-animada:hover {
                transform: scale(1.04);
                z-index: 10;
                box-shadow: 0 12px 24px rgba(0,0,0,0.25) !important;
            }

            .card, .carousel {
                border: none;
                border-radius: 25px !important;
                box-shadow: 0 10px 20px rgba(0,0,0,0.15);
                overflow: hidden;
                background-color: #c1a391ef;
            }

            .card-img-top {
                border-top-left-radius: 25px;
                border-top-right-radius: 25px;
                object-fit: cover;
                height: 320px;
            }

            .marquee-wrapper {
                overflow: hidden;
                width: 100%;
                display: flex;
                align-items: center;
                white-space: nowrap;
            }

            .marquee-content {
                display: flex;
                animation: scroll-marcas 30s linear infinite;
            }

            .marquee-item {
                padding: 0 50px;
                color: #333;
                font-weight: bold;
                border-right: 1px solid #ccc;
            }

            @keyframes scroll-marcas {
                0% { transform: translateX(0); }
                100% { transform: translateX(-50%); }
            }
            .bg-personalizado {
                background-color: rgba(255, 255, 255, 0.9);
                border-radius: 15px;
            }
        </style>
    </head>

    <body>
        @if(isset($config['mostrar_alerta']) && $config['mostrar_alerta'] == '1' && !empty($config['texto_alerta']))
            <div class="alert alert-dark rounded-0 border-0 text-center fw-bold m-0 shadow-sm py-2 text-white" style="background-color: #111;">
                💥 {{ $config['texto_alerta'] }}
            </div>
        @endif

        <div class="container mt-3 mb-4">
            @include('header')
        </div>

        <div class="container mt-5">
            <div class="card p-4">
                <div class="container-fluid mt-1 p-1">
                    <div id="carouselExampleAutoplaying" class="carousel carousel-dark slide" data-bs-ride="carousel" data-bs-interval="10000">
                        <div class="carousel-inner">
                            <div class="carousel-item active"><img src="{{ asset('banner slider/banner1.jpeg') }}" class="d-block w-100" style="height: auto; object-fit: contain;" alt="Banner 1"></div>
                            <div class="carousel-item"><img src="{{ asset('banner slider/banner2.jpeg') }}" class="d-block w-100" style="height: auto; object-fit: contain;" alt="Banner 2"></div>
                            <div class="carousel-item"><img src="{{ asset('banner slider/banner3.jpeg') }}" class="d-block w-100" style="height: auto; object-fit: contain;" alt="Banner 3"></div>
                            <div class="carousel-item"><img src="{{ asset('banner slider/banner4.jpeg') }}" class="d-block w-100" style="height: auto; object-fit: contain;" alt="Banner 4"></div>
                            <div class="carousel-item"><img src="{{ asset('banner slider/banner5.jpeg') }}" class="d-block w-100" style="height: auto; object-fit: contain;" alt="Banner 5"></div>
                            <div class="carousel-item"><img src="{{ asset('banner slider/banner6.jpeg') }}" class="d-block w-100" style="height: auto; object-fit: contain;" alt="Banner 6"></div>
                            <div class="carousel-item"><img src="{{ asset('banner slider/banner7.jpeg') }}" class="d-block w-100" style="height: auto; object-fit: contain;" alt="Banner 7"></div>
                        </div>
                        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleAutoplaying" data-bs-slide="prev"><span class="carousel-control-prev-icon" aria-hidden="true"></span></button>
                        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleAutoplaying" data-bs-slide="next"><span class="carousel-control-next-icon" aria-hidden="true"></span></button>
                    </div>
                </div>
            </div>
        </div>

        <div class="container mt-5 mb-5">
            <div class="row g-4 p-4 rounded-4 shadow-sm" style="background-color: rgba(193, 163, 145, 0.95);">
                <div class="col-12">
                    <h2 class="display-5 text-dark text-center mb-4 fw-bold text-uppercase border-bottom pb-3">
                        ⭐ ULTIMOS ARTÍCULOS  ⭐
                    </h2>
                </div>

                @forelse($destacados as $prod)
                    <div class="col-6 col-md-4 col-lg-3">
                        <div class="card card-animada h-100 bg-white shadow-sm text-center">
                            <img src="{{ $prod->url_imagen }}" class="card-img-top" alt="{{ $prod->nombre }}">
                            <div class="card-body d-flex flex-column justify-content-between text-dark">
                                <h5 class="card-title fw-bold text-truncate mb-1">{{ $prod->nombre }}</h5>
                                <p class="card-text text-success fw-bold fs-5 mb-3">${{ number_format($prod->precio, 2, ',', '.') }}</p>
                                <a href="{{ route('producto.show', $prod->id) }}" class="btn btn-dark w-100 rounded-pill fw-bold">Ver Prenda</a>
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="col-12">
                        <p class="text-center text-dark fw-bold">No hay artículos destacados disponibles en este momento.</p>
                    </div>
                @endforelse
            </div>
        </div>

        <div class="container mt-5 mb-5">
            <div class="row g-4 p-4 rounded-4" style="background-color: #c1a391ef;">
                <div class="col-12">
                    <h1 class="display-5 text-black text-center mb-4 fw-bold text-uppercase">
                        <p class="bg-personalizado text-black p-3 text-center shadow-sm"><strong>{{ $config['titulo_masculino'] ?? 'Colección de Hombres' }}</strong></p>
                    </h1>
                </div>

                @forelse($productosHombre as $prod)
                    <div class="col-6 col-md-4 col-lg-3">
                        <div class="card card-animada h-100 bg-white shadow-sm text-center">
                            <img src="{{ $prod->url_imagen }}" class="card-img-top" alt="{{ $prod->nombre }}">
                            <div class="card-body d-flex flex-column justify-content-between text-dark">
                                <h5 class="card-title fw-bold text-truncate mb-1">{{ $prod->nombre }}</h5>
                                <p class="card-text text-success fw-bold fs-5 mb-3">${{ number_format($prod->precio, 2, ',', '.') }}</p>
                                <a href="{{ route('producto.show', $prod->id) }}" class="btn btn-dark w-100 rounded-pill fw-bold">Ver Prenda</a>
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="col-12">
                        <p class="text-center text-dark fw-bold">Próximamente más productos para hombres.</p>
                    </div>
                @endforelse
            </div>
        </div>

        <div class="container mt-5 mb-5">
            <div class="row g-4 p-4 rounded-4" style="background-color: #c1a391ef;">
                <div class="col-12">
                    <h1 class="display-5 text-black text-center mb-4 fw-bold text-uppercase">
                        <p class="bg-personalizado text-black p-3 text-center shadow-sm"><strong>{{ $config['titulo_femenino'] ?? 'Colección de Mujeres' }}</strong></p>
                    </h1>
                </div>

                @forelse($productosMujer as $prod)
                    <div class="col-6 col-md-4 col-lg-3">
                        <div class="card card-animada h-100 bg-white shadow-sm text-center">
                            <img src="{{ $prod->url_imagen }}" class="card-img-top" alt="{{ $prod->nombre }}">
                            <div class="card-body d-flex flex-column justify-content-between text-dark">
                                <h5 class="card-title fw-bold text-truncate mb-1">{{ $prod->nombre }}</h5>
                                <p class="card-text text-success fw-bold fs-5 mb-3">${{ number_format($prod->precio, 2, ',', '.') }}</p>
                                <a href="{{ route('producto.show', $prod->id) }}" class="btn btn-dark w-100 rounded-pill fw-bold">Ver Prenda</a>
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="col-12">
                        <p class="text-center text-dark fw-bold">Próximamente más productos para mujeres.</p>
                    </div>
                @endforelse
            </div>
        </div>

        <div class="container mt-5">
            <div class="card p-4 border-0 shadow-sm">
                <div class="container-fluid mt-1 p-1">
                    <div id="carruselInferiorMJ" class="carousel carousel-dark slide" data-bs-ride="carousel" data-bs-interval="5000">
                        <div class="carousel-inner">
                            <div class="carousel-item active"><img src="{{ asset('banner slider2/bannerM (1).jpeg') }}" class="d-block w-100" style="height: 400px; object-fit: cover;" alt="Banner 1"></div>
                            <div class="carousel-item"><img src="{{ asset('banner slider2/bannerM (2).jpeg') }}" class="d-block w-100" style="height: 400px; object-fit: cover;" alt="Banner 2"></div>
                            <div class="carousel-item"><img src="{{ asset('banner slider2/bannerM (3).jpeg') }}" class="d-block w-100" style="height: 400px; object-fit: cover;" alt="Banner 3"></div>
                        </div>
                        <button class="carousel-control-prev" type="button" data-bs-target="#carruselInferiorMJ" data-bs-slide="prev"><span class="carousel-control-prev-icon"></span></button>
                        <button class="carousel-control-next" type="button" data-bs-target="#carruselInferiorMJ" data-bs-slide="next"><span class="carousel-control-next-icon"></span></button>
                    </div>
                </div>
            </div>
        </div>

        <div class="marquee-wrapper border-top border-bottom bg-light py-4 mt-4">
            <div class="marquee-content">
                <div class="marquee-item fs-3">LEVIS</div><div class="marquee-item fs-3">KEVINGSTON</div><div class="marquee-item fs-3">NIKE</div><div class="marquee-item fs-3">ADIDAS</div><div class="marquee-item fs-3">PUMA</div><div class="marquee-item fs-3">LEUTTE</div>
                <div class="marquee-item fs-3">LEVIS</div><div class="marquee-item fs-3">KEVINGSTON</div><div class="marquee-item fs-3">NIKE</div><div class="marquee-item fs-3">ADIDAS</div><div class="marquee-item fs-3">PUMA</div><div class="marquee-item fs-3">LEUTTE</div>
            </div>
        </div>

        <script src="{{ asset('vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

        <div class="mt-3">
            @include('footer')
        </div>
    </body>
</html>
