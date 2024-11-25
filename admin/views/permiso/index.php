<?php  require('views/header/header_admin.php');?>
<!-- Header Start -->
<div class="container-fluid bg-breadcrumb">
        <div class="container text-center py-5" style="max-width: 900px;">
            <h4 class="text-white display-4 mb-4 wow fadeInDown" data-wow-delay="0.1s">Permisos</h4>
            <ol class="breadcrumb d-flex justify-content-center mb-0 wow fadeInDown" data-wow-delay="0.3s">
                <li class="breadcrumb-item"><a href="index.php">Inicio</a></li>
                <li class="breadcrumb-item active text-primary">Permisos</li>
            </ol>    
        </div>
    </div>
<!-- Header End -->
<?php if (isset($mensaje)) : $app->alert($tipo, $mensaje); endif; ?>
<div class="mx-3 my-5">
    <a href="permiso.php?accion=crear" class="btn btn-success">Nuevo Permiso</a>
    <table class="table">
        <thead>
            <tr>
            <th scope="col">Id</th>
            <th scope="col">Permiso</th>
            <th scope="col">Opciones</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($permisos as $permiso): ?>
            <tr>
            <th scope="row"><?php echo $permiso['id_permiso']; ?></th>
            <td><?php echo $permiso['permiso']; ?></td>
            <td>
                <div class="btn-group" role="group" aria-label="Basic radio toggle button group">
                <a href="permiso.php?accion=actualizar&id=<?php echo $permiso['id_permiso']; ?>" class="btn btn-primary">Actualizar</a>
                <a href="permiso.php?accion=eliminar&id=<?php echo $permiso['id_permiso']; ?>" class="btn btn-danger">Eliminar</a>
                </div>
            </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>
<?php require('views/footer.php'); ?>
