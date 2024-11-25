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

<!-- Header Start -->
<div class="container-fluid bg-breadcrumb">
        <div class="container text-center py-5" style="max-width: 900px;">
            <h4 class="text-white display-4 mb-4 wow fadeInDown" data-wow-delay="0.1s">Reservas</h4>
            <ol class="breadcrumb d-flex justify-content-center mb-0 wow fadeInDown" data-wow-delay="0.3s">
                <li class="breadcrumb-item"><a href="index.php">Inicio</a></li>
                <li class="breadcrumb-item active text-primary">Reservas</li>
            </ol>    
        </div>
    </div>
<!-- Header End -->
<?php if (isset($mensaje)) : $app->alert($tipo, $mensaje); endif; ?>
<div class="mx-3 my-5">
    <a href="reserva.php?accion=crear" class="btn btn-success">Nueva Reserva</a>
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
                <?php if ($esAdmin): ?>
                    <th scope="col">Cliente</th>
                <?php endif; ?>
                <th scope="col">Opciones</th>
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
                <td><?php echo (new DateTime($reserva['fecha_reserva']))->format('Y-m-d'); ?></td>
                <td><?php echo $reserva['fecha_salida']; ?></td>
                <td><?php echo $reserva['fecha_regreso']; ?></td>
                <td><?php echo $reserva['origen']; ?></td>
                <td><?php echo $reserva['destino']; ?></td>
                <td><?php echo $reserva['pasajeros']; ?></td>
                <?php if ($esAdmin): ?>
                    <td><?php echo $reserva['correo']; ?></td>
                <?php endif; ?>
                <!-- Opciones solo para administradores -->
                
                    <td>
                        <div class="btn-group" role="group" aria-label="Basic radio toggle button group">
                            <a href="reserva.php?accion=actualizar&id=<?php echo $reserva['id_reserva']; ?>" class="btn btn-primary">Actualizar</a>
                            <a href="reserva.php?accion=eliminar&id=<?php echo $reserva['id_reserva']; ?>" class="btn btn-danger">Eliminar</a>
                        </div>
                    </td>

            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>
<?php require('views/footer.php'); ?>