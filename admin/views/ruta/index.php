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
        <h4 class="text-white display-4 mb-4 wow fadeInDown" data-wow-delay="0.1s">Rutas</h4>
        <ol class="breadcrumb d-flex justify-content-center mb-0 wow fadeInDown" data-wow-delay="0.3s">
            <li class="breadcrumb-item"><a href="index.php">Inicio</a></li>
            <li class="breadcrumb-item active text-primary">Rutas Escolares</li>
        </ol>    
    </div>
</div>
<!-- Header End -->
<?php if (isset($mensaje)) : $app->alert($tipo, $mensaje); endif; ?>

<!-- Formulario de Filtro -->
<div class="my-5 mx-3">
    <form method="GET" action="ruta.php">
        <div class="row justify-content-center">
            <div class="col-md-4">
                <input type="text" name="origen" class="form-control mb-3" placeholder="Origen" value="<?= isset($_GET['origen']) ? $_GET['origen'] : ''; ?>" />
            </div>
            <div class="col-md-4">
                <input type="text" name="destino" class="form-control mb-3" placeholder="Destino" value="<?= isset($_GET['destino']) ? $_GET['destino'] : ''; ?>" />
            </div>
            <div class="col-md-2">
                <button type="submit" class="btn btn-primary w-100 mb-3">Buscar</button>
            </div>
        </div>
    </form>
</div>


<!-- Botón 'Nuevo' solo para administradores -->
<div class="my-5 mx-3">
    <?php if ($esAdmin): ?>
        <a href="ruta.php?accion=crear" class="btn btn-success">Nueva Ruta</a>
    <?php endif; ?>

    <table class="table">
        <thead>
            <tr>
                <?php if ($esAdmin): ?>
                    <th scope="col">Id</th>
                <?php endif; ?>
                <th scope="col">Origen</th>
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
                <?php if ($esAdmin): ?>
                    <th scope="row"><?php echo $ruta['id_ruta']; ?></th>
                <?php endif; ?>
                <td><?php echo $ruta['origen']; ?></td>
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
</div>

<?php require('views/footer.php'); ?>
