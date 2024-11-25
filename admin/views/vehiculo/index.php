<?php  require('views/header/header_admin.php');?>
<!-- Header Start -->
<div class="container-fluid bg-breadcrumb">
        <div class="container text-center py-5" style="max-width: 900px;">
            <h4 class="text-white display-4 mb-4 wow fadeInDown" data-wow-delay="0.1s">Vehiculos</h4>
            <ol class="breadcrumb d-flex justify-content-center mb-0 wow fadeInDown" data-wow-delay="0.3s">
                <li class="breadcrumb-item"><a href="index.php">Inicio</a></li>
                <li class="breadcrumb-item active text-primary">Vehiculos</li>
            </ol>    
        </div>
    </div>
<!-- Header End -->
<?php if (isset($mensaje)) : $app->alert($tipo, $mensaje); endif; ?>
<div class="mx-3 my-5">
    <a href="vehiculo.php?accion=crear" class="btn btn-success">Nuevo</a>
    <table class="table">
        <thead>
            <tr>
            <th scope="col">Id</th>
            <th scope="col">Modelo</th>
            <th scope="col">Tipo</th>
            <th scope="col">Matrícula</th>
            <th scope="col">Capacidad</th>
            <th scope="col">Opciones</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($vehiculos as $vehiculo): ?>
            <tr>
            <th scope="row"><?php echo $vehiculo['id_vehiculo']; ?></th>
            <td><?php echo $vehiculo['modelo']; ?></td>
            <td><?php echo $vehiculo['tipo']; ?></td>
            <td><?php echo $vehiculo['matricula']; ?></td>
            <td><?php echo $vehiculo['capacidad']; ?></td>
            <td>
                <div class="btn-group" role="group" aria-label="Basic radio toggle button group">
                <a href="vehiculo.php?accion=actualizar&id=<?php echo $vehiculo['id_vehiculo']; ?>" class="btn btn-primary">Actualizar</a>
                <a href="vehiculo.php?accion=eliminar&id=<?php echo $vehiculo['id_vehiculo']; ?>" class="btn btn-danger">Eliminar</a>
                </div>
            </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>
<?php require('views/footer.php'); ?>
