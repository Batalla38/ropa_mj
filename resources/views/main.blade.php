<!DOCTYPE html>
    <html>
        <head>
<title>Ropa MJ</title>
    <link rel="stylesheet" href="{{asset('vendor/bootstrap/css/bootstrap.min.css')}}">
    <style>
        body {
        background-color: #a39898; /* Gris claro neutro */
        color: #9f9393;            /* Texto oscuro para contraste */
        }
    </style>
</head>


        <body>
            <div class="container mt-3">
            @include('header')
            </div>

            <div class="container mt-5"> <div class="card p-4">
                <div id="carouselExampleAutoplaying" class="carousel slide" data-bs-ride="carousel">
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <img src="jeans.jpg"  width="400" class="rounded mx-auto d-block" style="height: 450px; object-fit: cover;" class="d-block w-80" alt="20">
                        </div>
                        <div class="carousel-item">
                            <img src="" class="rounded mx-auto d-block" width="400" style="height: 450px; object-fit: cover;" class="d-block w-80" alt="20">
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



