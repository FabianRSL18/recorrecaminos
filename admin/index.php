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

<div id="carouselExampleIndicators" class="carousel slide">
    <div class="carousel-indicators">
        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="3" aria-label="Slide 4"></button>
        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="4" aria-label="Slide 5"></button>
    </div>

    <div class="carousel-inner" style="background-color: #808080;">
        <div class="carousel-item active">
            <img src="../images/Banner.jpg" class="d-block w-70 mx-auto" alt="...">
        </div>
        <div class="carousel-item">
            <img src="../images/carrusel_1.jpg" class="d-block w-70 mx-auto" alt="...">
        </div>
        <div class="carousel-item">
            <img src="../images/carrusel_2.jpg" class="d-block w-70 mx-auto" alt="...">
        </div>
        <div class="carousel-item">
            <img src="../images/carrusel_3.jpg" class="d-block w-70 mx-auto" alt="...">
        </div>
        <div class="carousel-item">
            <img src="../images/carrusel_4.jpg" class="d-block w-70 mx-auto" alt="...">
        </div>
    </div>

    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
    </button>
</div>

<div class="container mt-4">
    <!-- Barra de búsqueda -->
    <div class="card p-3">
        <div class="row g-3">
            <!-- Campo de origen -->
            <div class="col-md-2">
                <label for="pasajeros" class="form-label">Origen</label>
                <select class="form-select" id="Origen">
                    <option selected> Villagran</option>
                    <option value="2">Cortazar</option>
                    <option value="3">Celaya</option>
                    <option value="3">Apaseo el grande</option>
                    <option value="3">Apaseo el alto</option>
                    <option value="3">Otro</option>

                </select>
            </div>

            <!-- Botón de cambio de destinos -->
            <div class="col-md-1 d-flex align-items-end">
                <button class="btn btn-outline-primary">
                    <i class="bi bi-arrow-left-right"></i>
                </button>
            </div>

            <!-- Campo de destino -->
            <div class="col-md-3">
                <label for="destino" class="form-label">Destino</label>
                <input type="text" class="form-control" id="destino" placeholder="Buscar Destino">
            </div>

            <!-- Selector de fecha -->
            <div class="col-md-3">
                <label for="fecha" class="form-label">¿Cuándo viajas?</label>
                <div class="btn-group w-100">
                    <button type="button" class="btn btn-outline-primary">Hoy</button>
                    <button type="button" class="btn btn-outline-primary">Mañana</button>
                    <button type="button" class="btn btn-outline-primary dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">Elegir</button>
                </div>
            </div>

            <!-- Selector de pasajeros -->
            <div class="col-md-2">
                <label for="pasajeros" class="form-label">¿Quiénes viajan?</label>
                <select class="form-select" id="pasajeros">
                    <option selected> 1 pasajero</option>
                    <option value="2">2 pasajeros</option>
                    <option value="3">5 pasajeros</option>
                    <option value="3">10 pasajeros</option>
                    <option value="3">15 pasajeros</option>
                    <option value="3">20 o más pasajeros</option>

                </select>
            </div>
        </div>

        <!-- Botón de búsqueda -->
        <div class="row mt-3">
            <div class="col-md-12 d-flex justify-content-end">
                <button class="btn btn-primary btn-lg">Buscar</button>
            </div>
        </div>
    </div>
</div>
<section id="sobre-nosotros" class="container mt-5">
    <div class="row text-center mb-4">
        <div class="col-md-12">
            <h1>Sobre Nosotros</h1>
            <h5>Conoce más acerca de Recorrecaminos, tu mejor opción en transporte privado y escolar.</h5>
        </div>
    </div>

    <!-- Misión, Visión y Valores -->
    <div class="row">

        <!-- Misión -->
        <div class="col-md-4 mb-4">
            <div class="card h-100">
                <div class="card-header bg-primary text-white">
                    <h3><i class="fas fa-bullhorn"></i> Misión</h3> <!-- Icono para Misión -->
                </div>
                <div class="card-body">
                    <p>En Recorrecaminos nos dedicamos a ofrecer servicios de transporte escolar y privado de alta calidad, asegurando la seguridad, comodidad y puntualidad de nuestros usuarios. Nuestro compromiso es brindar soluciones de movilidad eficientes para familias y empresas.</p>
                </div>
            </div>
        </div>

        <!-- Visión -->
        <div class="col-md-4 mb-4">
            <div class="card h-100">
                <div class="card-header bg-success text-white">
                    <h3><i class="fas fa-eye"></i> Visión</h3> <!-- Icono para Visión -->
                </div>
                <div class="card-body">
                    <p>Ser la empresa líder en transporte privado y escolar en la región, reconocida por su compromiso con la seguridad, la innovación y la satisfacción de nuestros clientes. Buscamos expandir nuestra red de servicios para cubrir las necesidades de movilidad de más personas cada día.</p>
                </div>
            </div>
        </div>

        <!-- Valores -->
        <div class="col-md-4 mb-4">
            <div class="card h-100">
                <div class="card-header bg-warning text-white">
                    <h3><i class="fas fa-handshake"></i> Valores</h3> <!-- Icono para Valores -->
                </div>
                <div class="card-body">
                    <ul class="list-unstyled">
                        <li><strong>Seguridad:</strong> La seguridad de nuestros pasajeros es nuestra prioridad.</li>
                        <li><strong>Compromiso:</strong> Nos comprometemos a ofrecer un servicio puntual y de calidad.</li>
                        <li><strong>Responsabilidad:</strong> Nos hacemos responsables de cada viaje y cada cliente.</li>
                        <li><strong>Innovación:</strong> Buscamos siempre mejorar nuestros servicios y la experiencia de nuestros usuarios.</li>
                        <li><strong>Confianza:</strong> Generamos confianza mediante la transparencia y el respeto en todo lo que hacemos.</li>
                    </ul>
                </div>
            </div>
        </div>

    </div>
</section>
<?php 
require_once('views/footer.php');
?>