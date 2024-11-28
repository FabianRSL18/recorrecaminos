<?php 
// Inicia la sesión si no está activa
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// Verifica si el usuario tiene el rol de 'Administrador' o 'Usuario'
$esAdmin = isset($_SESSION['roles']) && in_array('Administrador', $_SESSION['roles']);
$esCliente = isset($_SESSION['roles']) && in_array('Cliente', $_SESSION['roles']);
$id_usuario = $_SESSION['id_usuario'];  // Asumiendo que el ID del usuario está almacenado en la sesión

// Verifica el rol y carga el header correspondiente
if ($esAdmin) {
    require_once('views/header/header_admin.php');
} elseif ($esCliente) {
    require_once('views/header/header_cliente.php');
} else {
    // Si no es ni Administrador ni Cliente, se puede cargar un header por defecto
    require_once('views/header.php');
}
$googleMapsApiKey = "AIzaSyCe1d7MWxY28izsGaB6QBcjDQTFgJ59ydM";

?>

<!-- Header Start -->
<div class="container-fluid bg-breadcrumb">
    <div class="container text-center py-5" style="max-width: 900px;">
        <h4 class="text-white display-4 mb-4 wow fadeInDown" data-wow-delay="0.1s">Reservas</h4>
        <ol class="breadcrumb d-flex justify-content-center mb-0 wow fadeInDown" data-wow-delay="0.3s">
            <li class="breadcrumb-item"><a href="index.php">Inicio</a></li>
            <li class="breadcrumb-item text-primary"><a href="reserva.php">Reservas</a></li>
            <li class="breadcrumb-item active text-primary"><?php echo ($accion == "crear") ? "Nueva " : "Modificar "; ?> Reserva</li>
        </ol>    
    </div>
</div>
<!-- Header End -->

<div class="mx-3 my-5">
    <form action="reserva.php?accion=<?php echo ($accion == "crear") ? 'nuevo' : 'modificar&id=' . $id; ?>" method="post">
        <!-- Estado -->
        <div class="row mb-3">
            <label for="estado" class="col-sm-2 col-form-label">Estado</label>
            <div class="col-sm-10">
                <select class="form-select" name="data[estado]" id="estado">
                    <option value="Pendiente" <?php echo (isset($reservas['estado']) && $reservas['estado'] == 'Pendiente') ? 'selected' : ''; ?>>Pendiente</option>
                    <?php if ($esAdmin): ?>
                    <option value="Aprobado" <?php echo (isset($reservas['estado']) && $reservas['estado'] == 'Aprobado') ? 'selected' : ''; ?>>Aprobado</option>
                    <option value="Rechazado" <?php echo (isset($reservas['estado']) && $reservas['estado'] == 'Rechazado') ? 'selected' : ''; ?>>Rechazado</option>
                    <?php endif; ?>
                </select>
            </div>
        </div>

        <!-- Fecha de Reserva -->
        <div class="row mb-3">
            <label for="fecha_reserva" class="col-sm-2 col-form-label">Fecha Reserva</label>
            <div class="col-sm-10">
                <input type="date" name="data[fecha_reserva]" class="form-control" value="<?php echo isset($reservas['fecha_reserva']) ? $reservas['fecha_reserva'] : ''; ?>" />
            </div>
        </div>

        <!-- Fecha de Salida -->
        <div class="row mb-3">
            <label for="fecha_salida" class="col-sm-2 col-form-label">Fecha Salida</label>
            <div class="col-sm-10">
                <input type="date" name="data[fecha_salida]" class="form-control" value="<?php echo isset($reservas['fecha_salida']) ? $reservas['fecha_salida'] : ''; ?>" />
            </div>
        </div>

        <!-- Fecha de Regreso -->
        <div class="row mb-3">
            <label for="fecha_regreso" class="col-sm-2 col-form-label">Fecha Regreso</label>
            <div class="col-sm-10">
                <input type="date" name="data[fecha_regreso]" class="form-control" value="<?php echo isset($reservas['fecha_regreso']) ? $reservas['fecha_regreso'] : ''; ?>" />
            </div>
        </div>

        <!-- Origen -->
        <div class="row mb-3">
            <label for="origen" class="col-sm-2 col-form-label">Origen</label>
            <div class="col-sm-10">
                <select class="form-select" name="data[origen]" id="origen">
                    <option value="Cortazar" <?php echo (isset($reservas['origen']) && $reservas['origen'] == 'Cortazar') ? 'selected' : ''; ?>>Cortazar</option>
                    <option value="Villagran" <?php echo (isset($reservas['origen']) && $reservas['origen'] == 'Villagran') ? 'selected' : ''; ?>>Villagran</option>
                    <option value="Celaya" <?php echo (isset($reservas['origen']) && $reservas['origen'] == 'Celaya') ? 'selected' : ''; ?>>Celaya</option>
                </select>
            </div>
        </div>

        <!-- Destino -->
        <div class="row mb-3">
            <label for="destino" class="col-sm-2 col-form-label">Destino</label>
            <div class="col-sm-10">
                <input type="text" name="data[destino]" class="form-control" id="destino" value="<?php echo isset($reservas['destino']) ? $reservas['destino'] : ''; ?>" />
            </div>
        </div>

        <!-- Pasajeros -->
        <div class="row mb-3">
            <label for="pasajeros" class="col-sm-2 col-form-label">Pasajeros</label>
            <div class="col-sm-10">
                <input type="text" name="data[pasajeros]" class="form-control" value="<?php echo isset($reservas['pasajeros']) ? $reservas['pasajeros'] : ''; ?>" />
            </div>
        </div>

        <!-- Campos ocultos de latitud y longitud -->
        <input type="hidden" name="data[latitud]" id="latitud" value="<?php echo isset($reservas['latitud']) ? $reservas['latitud'] : ''; ?>" />
        <input type="hidden" name="data[longitud]" id="longitud" value="<?php echo isset($reservas['longitud']) ? $reservas['longitud'] : ''; ?>" />

        <!-- Selección de usuario (solo para Administradores) -->
        <?php if ($esAdmin): ?>
        <div class="row mb-3">
            <label for="id_usuario" class="col-sm-2 col-form-label">Usuario</label>
            <div class="col-sm-10">
                <select name="data[id_usuario]" class="form-select">
                    <?php foreach($usuarios as $usuario): ?>
                        <?php $selected = ($reservas['id_usuario'] == $usuario['id_usuario']) ? "selected" : ""; ?>
                        <option value="<?php echo($usuario['id_usuario']); ?>" <?php echo($selected); ?>><?php echo($usuario['nombre']); ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
        </div>
        <?php else: ?>
            <input type="hidden" name="data[id_usuario]" value="<?php echo $id_usuario; ?>" />
        <?php endif; ?>

        <!-- Mapa interactivo -->
        <div class="row mb-3">
            <label for="mapa" class="col-sm-2 col-form-label">Seleccionar Destino en el Mapa</label>
            <div class="col-sm-10">
                <div id="mapa" style="height: 400px; width: 100%;"></div>
            </div>
        </div>

        <!-- Botón para enviar el formulario -->
        <div class="d-flex justify-content-center">
            <input type="submit" name="data[enviar]" value="Guardar" class="btn btn-success" />
        </div>
    </form>
</div>

<script src="https://maps.googleapis.com/maps/api/js?key=<?php echo $googleMapsApiKey; ?>&callback=initMap" async defer></script>

<script>
// Inicializa el mapa
let map;
let geocoder;
let marker;
let latitudInput = document.getElementById("latitud");
let longitudInput = document.getElementById("longitud");
let destinoInput = document.getElementById("destino");

function initMap() {
    geocoder = new google.maps.Geocoder();
    const initialLatLng = { lat: parseFloat(latitudInput.value || '19.835'), lng: parseFloat(longitudInput.value || '-100.812') };
    
    map = new google.maps.Map(document.getElementById("mapa"), {
        zoom: 15,
        center: initialLatLng
    });
    
    marker = new google.maps.Marker({
        position: initialLatLng,
        map: map,
        draggable: true
    });

    // Permite seleccionar un lugar al hacer clic en el mapa
    google.maps.event.addListener(map, 'click', function(event) {
        const latLng = event.latLng;
        marker.setPosition(latLng);
        latitudInput.value = latLng.lat();
        longitudInput.value = latLng.lng();
        
        // Geocodificación inversa para obtener el nombre del lugar
        geocodeLatLng(latLng);
    });

    marker.addListener('dragend', function(event) {
        latitudInput.value = event.latLng.lat();
        longitudInput.value = event.latLng.lng();
        
        // Geocodificación inversa para obtener el nombre del lugar
        geocodeLatLng(event.latLng);
    });
    
    // Inicializa el campo de destino con el nombre del lugar actual
    geocodeLatLng(initialLatLng);
}

function geocodeLatLng(latLng) {
    geocoder.geocode({ location: latLng }, function(results, status) {
        if (status === "OK" && results[0]) {
            destinoInput.value = results[0].formatted_address;
        } else {
            console.log("Geocode no exitoso:", status);
        }
    });
}
</script>
