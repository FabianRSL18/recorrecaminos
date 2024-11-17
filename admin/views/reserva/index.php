<?php 
// Inicia la sesión si no está activa
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// Verifica si el usuario tiene el rol de 'Administrador'
$esAdmin = isset($_SESSION['roles']) && in_array('Administrador', $_SESSION['roles']);
$esCliente = isset($_SESSION['roles']) && in_array('Cliente', $_SESSION['roles']);

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

<h1>Reservas</h1>
<?php if (isset($mensaje)) : $app->alert($tipo, $mensaje); endif; ?>

<!-- Botón 'Nueva Reserva' solo para administradores -->
<?php if ($esAdmin): ?>
    <a href="reserva.php?accion=crear" class="btn btn-success">Nueva Reserva</a>
<?php endif; ?>

<table class="table">
    <thead>
        <tr>
            <!-- Muestra el ID solo para administradores -->
            <?php if ($esAdmin): ?>
                <th scope="col">Id</th>
            <?php endif; ?>
            <th scope="col">Estado</th>
            <th scope="col">Fecha Reserva</th>
            <th scope="col">Fecha Salida</th>
            <th scope="col">Fecha Regreso</th>
            <th scope="col">Origen</th>
            <th scope="col">Destino</th>
            <th scope="col">Pasajeros</th>
            <th scope="col">Cliente</th>
            <!-- Opciones solo para administradores -->
            <?php if ($esAdmin): ?>
                <th scope="col">Opciones</th>
            <?php endif; ?>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($reservas as $reserva): ?>
        <tr>
            <!-- Muestra el ID solo para administradores -->
            <?php if ($esAdmin): ?>
                <th scope="row"><?php echo $reserva['id_reserva']; ?></th>
            <?php endif; ?>
            <td><?php echo $reserva['estado']; ?></td>
            <td><?php echo $reserva['fecha_reserva']; ?></td>
            <td><?php echo $reserva['fecha_salida']; ?></td>
            <td><?php echo $reserva['fecha_regreso']; ?></td>
            <td><?php echo $reserva['origen']; ?></td>
            <td><?php echo $reserva['destino']; ?></td>
            <td><?php echo $reserva['pasajeros']; ?></td>
            <td><?php echo $reserva['correo']; ?></td>
            <!-- Opciones solo para administradores -->
            <?php if ($esAdmin): ?>
                <td>
                    <div class="btn-group" role="group" aria-label="Basic radio toggle button group">
                        <a href="reserva.php?accion=actualizar&id=<?php echo $reserva['id_reserva']; ?>" class="btn btn-primary">Actualizar</a>
                        <a href="reserva.php?accion=eliminar&id=<?php echo $reserva['id_reserva']; ?>" class="btn btn-danger">Eliminar</a>
                    </div>
                </td>
            <?php endif; ?>
        </tr>
        <?php endforeach; ?>
    </tbody>
</table>

<?php require('views/footer.php'); ?>
