<?php
require_once('views/header.php');
?>
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