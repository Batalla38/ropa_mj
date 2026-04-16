<!DOCTYPE html>
    <html>
        <head>
<title>Sobre mí</title>

</head>
    <link rel="stylesheet" href="{{asset('vendor/bootstrap/css/bootstrap.min.css')}}">

        <body>
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            <div class="container">
            <a class="navbar-brand" href="#">Mi Sitio</a>
            <div class="navbar-nav">
            <a class="nav-link" href="/">Inicio</a>
            <a class="nav-link active" href="/sobremi">Sobre mí</a>
            </div>
            </div>
        </nav>
        <div class="container mt-3">

            <div class="card">

            </div>

            <div class="card mt-3">

            <div id="carouselExampleAutoplaying" class="carousel slide" data-bs-ride="carousel">
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <img src="jeans.jpg"  width="400" class="rounded mx-auto d-block" style="height: 450px; object-fit: cover;" class="d-block w-80" alt="20">
                    </div>
                    <div class="carousel-item">
                        <img src="mario fuck yu.webp" class="rounded mx-auto d-block" width="400" style="height: 450px; object-fit: cover;" class="d-block w-80" alt="20">
                    </div>

                    <div class="carousel-item">
                        <img src="remerA.jpg" width="400" class="rounded mx-auto d-block" style="height: 450px; object-fit: cover;" class="d-block w-80" alt="20">

                    </div>
                </div>
                <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleAutoplaying" data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleAutoplaying" data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                </button>
            </div>


        <script src="{{ asset('vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>


        </body>
</html>



