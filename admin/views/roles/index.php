<?php require('views/header/header_admin.php'); ?>
<!-- Header Start -->
<div class="container-fluid bg-breadcrumb">
        <div class="container text-center py-5" style="max-width: 900px;">
            <h4 class="text-white display-4 mb-4 wow fadeInDown" data-wow-delay="0.1s">Roles</h4>
            <ol class="breadcrumb d-flex justify-content-center mb-0 wow fadeInDown" data-wow-delay="0.3s">
                <li class="breadcrumb-item"><a href="index.php">Inicio</a></li>
                <li class="breadcrumb-item active text-primary">Roles</li>
            </ol>    
        </div>
    </div>
<!-- Header End -->
<?php if (isset($mensaje)) : $app->alert($tipo, $mensaje); endif; ?>
<div class="mx-3 my-5">
    <a href="roles.php?accion=crear" class="btn btn-success">Nuevo Rol</a>
    <table class="table">
        <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Nombre del Rol</th>
                <th scope="col">Opciones</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($roles as $rol) : ?>
            <tr>
                <th scope="row"><?php echo $rol['id_rol']; ?></th>
                <td><?php echo $rol['rol']; ?></td>
                <td>
                    <div class="btn-group" role="group" aria-label="Basic example">
                        <a href="roles.php?accion=actualizar&id=<?php echo $rol['id_rol']; ?>" class="btn btn-primary">Actualizar</a>
                        <a href="roles.php?accion=eliminar&id=<?php echo $rol['id_rol']; ?>" class="btn btn-danger">Eliminar</a>
                    </div>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>
<?php require('views/footer.php'); ?>