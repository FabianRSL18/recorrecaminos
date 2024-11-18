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

?>
<h1><?php echo ($accion == "crear") ? "Nueva Reserva" : "Modificar Reserva"; ?></h1>

<form action="reserva.php?accion=<?php echo ($accion == "crear") ? 'nuevo' : 'modificar&id=' . $id; ?>" method="post">
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
            <input type="text" name="data[destino]" class="form-control" value="<?php echo isset($reservas['destino']) ? $reservas['destino'] : ''; ?>" />
        </div>
    </div>

    <!-- Pasajeros -->
    <div class="row mb-3">
        <label for="pasajeros" class="col-sm-2 col-form-label">Pasajeros</label>
        <div class="col-sm-10">
            <input type="text" name="data[pasajeros]" class="form-control" value="<?php echo isset($reservas['pasajeros']) ? $reservas['pasajeros'] : ''; ?>" />
        </div>
    </div>

    <!-- ID de Usuario (automáticamente asignado desde la sesión) -->
    <?php if ($esAdmin): ?>
    <div class="row mb-3">
        <label for="id_usuario" class="col-sm-2 col-form-label">Usuario</label>
        <div class="col-sm-10">
            <select name="data[id_usuario]" id="" class="form-select">
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

    <input type="submit" name="data[enviar]" value="Guardar" class="btn btn-success" />
</form>

<?php require('views/footer.php'); ?>
