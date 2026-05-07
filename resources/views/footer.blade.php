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
<footer class="py-5 bg-white text-dark">
    <div class="container text-center">
        <div class="d-flex justify-content-center align-items-center mb-4">
            <span class="fs-4 fw-bold">ROPA MJ</span>
        </div>
        <nav class="row text-center align-items-start">
            
            <!-- Columna Izquierda -->
            <div class="col-md-4 mb-4">
                <a href="/terminosYCondiciones" class="text-muted text-decoration-none fs-5">
                    Términos y Usos
                </a>
            </div>

            <div class="col-md-4 mb-4">
                <a href="/consultas" class="text-muted text-decoration-none fs-5 d-block mb-4">
                    Consultas
                </a>
                
                <div class="d-flex flex-column align-items-center gap-3">
                    <a href="https://wa.me/5493794123456" target="_blank" class="text-decoration-none d-flex align-items-center text-dark">
                        <img src="WhatsA.png" alt="WhatsApp" width="25" height="25" class="me-2">
                        <span class="fw-medium">3794-123456</span>
                    </a>
                    <a href="#" target="_blank" class="text-decoration-none d-flex align-items-center text-dark">
                        <img src="Ig.png" alt="Instagram" width="25" height="25" class="me-2">
                        <span class="fw-medium">@RopaMJ_ok</span>
                    </a>
                    <a href="#" target="_blank" class="text-decoration-none d-flex align-items-center text-dark">
                          <img src="FB.png" alt="Facebook" width="25" height="25" class="me-2">
                        <span class="fw-medium">@RopaMJ_ok</span>
                    </a>
                    <a href="#" target="_blank" class="text-decoration-none d-flex align-items-center text-dark">
                         <img src="TikT.png" alt="TikTok" width="25" height="25" class="me-2">
                        <span class="fw-medium">@RopaMJ_ok</span>
                    </a>
                </div>
            </div>

            <div class="col-md-4 mb-4">
                <a href="/metodosDePago" class="text-muted text-decoration-none fs-5">
                    Métodos de Pago
                </a>
            </div>
        </nav>

        
        <div class="border-top pt-4 mt-4 text-center">
            <p class="text-muted small mb-0">&copy; 2026 Distribuidora ROPA MJ. Creada por Batalla Juan Cruz & Teruel Laola Melanie.</p>
        </div>
    </div>
</footer>


</body>
</html>
