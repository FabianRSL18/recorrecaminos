<?php
// Inicia la sesión si no está activa
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// Verifica si el usuario tiene el rol de 'Administrador' o 'Cliente'
if (isset($_SESSION['roles'])) {
    if (in_array('Administrador', $_SESSION['roles'])) {
        require_once('views/header/header_admin.php');  // Header para Administradores
    } elseif (in_array('Cliente', $_SESSION['roles'])) {
        require_once('views/header/header_cliente.php');  // Header para Clientes
    } else {
        require_once('views/header.php');  // Header por defecto
    }
} else {
    require_once('views/header.php');  // Header por defecto si no hay sesión
}
?>
    <!-- Carousel Start -->
    <div class="header-carousel owl-carousel">
        <div class="header-carousel-item">
            <img src="../img/carousel-1.jpg" class="img-fluid w-100" alt="Image">
            <div class="carousel-caption">
                <div class="container">
                    <div class="row gy-0 gx-5">
                        <div class="col-lg-0 col-xl-5"></div>
                            <div class="col-xl-7 animated fadeInLeft">
                                <div class="text-sm-center text-md-end">
                                    <h4 class="text-primary text-uppercase fw-bold mb-4">Bienvenido a Recorrecaminos</h4>
                                    <h1 class="display-4 text-uppercase text-white mb-4">Agenda un viaje el dia de hoy</h1>
                                    <p class="mb-5 fs-5">Agendar tu viaje es muy sencillo desde esta pagina web solo logueate y dejanos el resto.</p>
                                    <div class="d-flex align-items-center justify-content-center justify-content-md-end">
                                        <h2 class="text-white me-2">Siguenos en:</h2>
                                        <div class="d-flex justify-content-end ms-2">
                                            <a class="btn btn-md-square btn-light rounded-circle me-2" href=""><i class="fab fa-facebook-f"></i></a>
                                            <a class="btn btn-md-square btn-light rounded-circle mx-2" href=""><i class="fab fa-instagram"></i></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="header-carousel-item">
                <img src="../img/carousel-2.jpg" class="img-fluid w-100" alt="Image">
                <div class="carousel-caption">
                    <div class="container">
                        <div class="row g-5">
                            <div class="col-12 animated fadeInUp">
                                <div class="text-center">
                                    <h4 class="text-primary text-uppercase fw-bold mb-4">Con Recorrecaminos</h4>
                                    <h1 class="display-4 text-uppercase text-white mb-4">Puedes unirte a los viajes agendados a un solo clic</h1>
                                    <p class="mb-5 fs-5">Tenemos una cantidad de viajes agendados a diferentes lugares turisticos del pais unete a nosotros!!</p>
                                    <div class="d-flex justify-content-center flex-shrink-0 mb-4">
                                        <a class="btn btn-primary rounded-pill py-3 px-4 px-md-5 ms-2" href="#">Ver Más</a>
                                    </div>
                                    <div class="d-flex align-items-center justify-content-center">
                                        <h2 class="text-white me-2">Siguenos en:</h2>
                                        <div class="d-flex justify-content-end ms-2">
                                            <a class="btn btn-md-square btn-light rounded-circle me-2" href=""><i class="fab fa-facebook-f"></i></a>
                                            <a class="btn btn-md-square btn-light rounded-circle mx-2" href=""><i class="fab fa-instagram"></i></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Carousel End -->
        <!-- Sobre Nosotros inicia -->
        <div class="container-fluid about py-5">
            <div class="container py-5">
                <div class="row g-5 align-items-center">
                    <div class="col-xl-7 wow fadeInLeft" data-wow-delay="0.2s">
                        <div>
                            <h4 class="text-primary">Sobre Nosotros</h4>
                            <h1 class="display-5 mb-4">Recorrecaminos, tu mejor opción en transporte.</h1>
                            <p class="mb-4">Somos una empresa enfocada en llevar al destino deseado de nuestros clientes con total seguridad y en tiempo y forma, nos enfocamos en el transporte estudiantil a diversas universidades y tambien al transporte privado.
                            </p>
                            <div class="row g-4">
                                <div class="col-md-6 col-lg-6 col-xl-6">
                                    <div class="d-flex">
                                        <div><i class="fas fa-bullhorn fa-3x text-primary"></i></div>
                                        <div class="ms-4">
                                            <h4>Misión</h4>
                                            <p>Nuestro compromiso es brindar soluciones de movilidad eficientes para familias y empresas.</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6 col-lg-6 col-xl-6">
                                    <div class="d-flex">
                                        <div><i class="fas fa-eye fa-3x text-primary"></i></div>
                                        <div class="ms-4">
                                            <h4>Visión</h4>
                                            <p>Ser la empresa líder en transporte privado y escolar en la región, reconocida por su compromiso con la seguridad y la satisfacción de nuestros clientes.</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <a href="#" class="btn btn-primary rounded-pill py-3 px-5 flex-shrink-0">Decrubre Más</a>
                                </div>
                                <div class="col-sm-6">
                                    <div class="d-flex">
                                        <i class="fas fa-handshake fa-3x text-primary me-4"></i>
                                        <div>
                                            <h4>Valores</h4>
                                            <p class="mb-0 fs-5" style="letter-spacing: 1px;">
                                                <li><strong>Seguridad:</strong> La seguridad de es nuestra prioridad.</li>
                                                <li><strong>Compromiso:</strong> Nos comprometemos a ofrecer un servicio puntual y de calidad.</li>
                                                <li><strong>Responsabilidad:</strong> Nos hacemos responsables de cada viaje y cada cliente.</li>
                                                <li><strong>Confianza:</strong> Generamos confianza mediante la transparencia y el respeto en todo lo que hacemos.</li></p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-5 wow fadeInRight" data-wow-delay="0.2s">
                        <div class="bg-primary rounded position-relative overflow-hidden">
                            <div class="rounted-bottom">
                                <img src="../img/about-2.jpg" class="img-fluid rounded-bottom w-100" alt="">
                            </div>
                            <div class="rounded-bottom">
                                <img src="../img/about-5.jpg" class="img-fluid rounded-bottom w-100" alt="">
                            </div> 
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Sobre Nosotros termina -->

        <!-- Procximos Viajes inicia -->
        <div class="container-fluid blog pb-5">
            <div class="container pb-5">
                <div class="text-center mx-auto pb-5 wow fadeInUp" data-wow-delay="0.2s" style="max-width: 800px;">
                    <h4 class="text-primary">Acompañanos</h4>
                    <h1 class="display-5 mb-4">Proximos Viajes</h1>
                    <p class="mb-0">Estos son algunos de los proximos viajes que tenemos en las proximas fechas</p>
                </div>
                <div class="owl-carousel blog-carousel wow fadeInUp" data-wow-delay="0.2s">
                    <div class="blog-item p-4">
                        <div class="blog-img mb-4">
                            <img src="../img/service-4.jpg" class="img-fluid w-100 rounded" alt="">
                            <div class="blog-title">
                                <a href="#" class="btn">Non-Dividend Stocks</a>
                            </div>
                        </div>
                        <a href="#" class="h4 d-inline-block mb-3">Options Trading Business?</a>
                        <p class="mb-4">Lorem, ipsum dolor sit amet consectetur adipisicing elit. Dolore aut aliquam suscipit error corporis accusamus labore....
                        </p>
                        <div class="d-flex align-items-center">
                            <img src="../img/testimonial-1.jpg" class="img-fluid rounded-circle" style="width: 60px; height: 60px;" alt="">
                            <div class="ms-3">
                                <h5>Admin</h5>
                                <p class="mb-0">October 9, 2025</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Blog End -->
<?php 
require_once('views/footer.php');
?>