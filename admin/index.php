<?php
// Inicia la sesión si no está activa
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
// Verifica si el usuario tiene el rol de 'Administrador'
if (isset($_SESSION['roles']) && in_array('Administrador', $_SESSION['roles'])) {
    require_once('views/header/header_admin.php');
} else {
    require_once('views/header.php');
}
?>
<div id="carouselExampleIndicators" class="carousel slide">
    <div class="carousel-indicators">
        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
    </div>
    <div class="carousel-inner">
        <div class="carousel-item active">
            <img src="../images/carrusel_1.jpg" class="d-block w-100" alt="...">
        </div>
        <div class="carousel-item">
            <img src="../images/carrusel_2.jpg" class="d-block w-100" alt="...">
        </div>
        <div class="carousel-item">
            <img src="../images/carrusel_3.jpg" class="d-block w-100" alt="...">
        </div>
        <div class="carousel-item">
            <img src="../images/carrusel_4.jpg" class="d-block w-100" alt="...">
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
            <div class="col-md-3">
                <label for="origen" class="form-label">Origen</label>
                <input type="text" class="form-control" id="origen" placeholder="Buscar Origen">
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
                    <option selected>1 pasajero</option>
                    <option value="2">2 pasajeros</option>
                    <option value="3">3 pasajeros</option>
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

<?php 
require_once('views/footer.php');
?>