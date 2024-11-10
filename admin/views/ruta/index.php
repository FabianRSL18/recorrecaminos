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

<h1>Rutas</h1>
<?php if (isset($mensaje)) : $app->alert($tipo, $mensaje); endif; ?>

<!-- Botón 'Nuevo' solo para administradores -->
<?php if ($esAdmin): ?>
    <a href="ruta.php?accion=crear" class="btn btn-success">Nueva Ruta</a>
<?php endif; ?>

<table class="table">
    <thead>
        <tr>
            <th scope="col">Id</th>
            <th scope="col">Destino</th>
            <th scope="col">Abordaje</th>
            <th scope="col">Hora de Abordaje</th>
            <th scope="col">Parada</th>
            <th scope="col">Hora de Parada</th>
            <!-- Muestra la columna 'Opciones' solo para administradores -->
            <?php if ($esAdmin): ?>
                <th scope="col">Opciones</th>
            <?php endif; ?>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($rutas as $ruta): ?>
        <tr>
            <th scope="row"><?php echo $ruta['id_ruta']; ?></th>
            <td><?php echo $ruta['destino']; ?></td>
            <td><?php echo $ruta['abordaje']; ?></td>
            <td><?php echo $ruta['hora_a']; ?></td>
            <td><?php echo $ruta['parada']; ?></td>
            <td><?php echo $ruta['hora_p']; ?></td>
            <!-- Muestra las opciones solo para administradores -->
            <?php if ($esAdmin): ?>
                <td>
                    <div class="btn-group" role="group" aria-label="Basic radio toggle button group">
                        <a href="ruta.php?accion=actualizar&id=<?php echo $ruta['id_ruta']; ?>" class="btn btn-primary">Actualizar</a>
                        <a href="ruta.php?accion=eliminar&id=<?php echo $ruta['id_ruta']; ?>" class="btn btn-danger">Eliminar</a>
                    </div>
                </td>
            <?php endif; ?>
        </tr>
        <?php endforeach; ?>
    </tbody>
</table>

<?php require('views/footer.php'); ?>
