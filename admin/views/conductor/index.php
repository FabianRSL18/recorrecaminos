<?php  require('views/header/header_admin.php');?>
<!-- Header Start -->
<div class="container-fluid bg-breadcrumb">
        <div class="container text-center py-5" style="max-width: 900px;">
            <h4 class="text-white display-4 mb-4 wow fadeInDown" data-wow-delay="0.1s">Conductores</h4>
            <ol class="breadcrumb d-flex justify-content-center mb-0 wow fadeInDown" data-wow-delay="0.3s">
                <li class="breadcrumb-item"><a href="index.php">Inicio</a></li>
                <li class="breadcrumb-item active text-primary">Conductores</li>
            </ol>    
        </div>
    </div>
<!-- Header End -->
<?php if (isset($mensaje)) : $app->alert($tipo, $mensaje); endif; ?>
<a href="conductor.php?accion=crear" class="btn btn-success">Nuevo Conductor</a>
<table class="table">
    <thead>
        <tr>
            <th scope="col">Id</th>
            <th scope="col">Fotografía</th>
            <th scope="col">Nombre</th> 
            <th scope="col">Apellido</th>
            <th scope="col">RFC</th>
            <th scope="col">Teléfono</th>
            <th scope="col">Correo</th>
            <th scope="col">Licencia</th>
            <th scope="col">Opciones</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($conductores as $conductor): ?> 
        <tr>
            <th scope="row"><?php echo $conductor['id_conductor']; ?></th> 
            <td><img class="rounded-circle w-25" src=" <?php 
                    if(file_exists("../uploads/".$conductor['fotografia'])){
                        echo("../uploads/".$conductor['fotografia']);
                    } else {
                        echo('../uploads/default.png');
                    }
                ?>">
            </td>
            <td><?php echo $conductor['nombre']; ?></td> 
            <td><?php echo $conductor['apellido']; ?></td>
            <td><?php echo $conductor['rfc']; ?></td>
            <td><?php echo $conductor['telefono']; ?></td>
            <td><?php echo $conductor['correo']; ?></td>
            <td><?php echo $conductor['licencia']; ?></td>
            <td>
                <div class="btn-group" role="group" aria-label="Basic radio toggle button group">
                    <a href="conductor.php?accion=actualizar&id=<?php echo $conductor['id_conductor']; ?>" class="btn btn-primary">Actualizar</a> 
                    <a href="conductor.php?accion=eliminar&id=<?php echo $conductor['id_conductor']; ?>" class="btn btn-danger">Eliminar</a> 
                </div>
            </td>
        </tr>
        <?php endforeach; ?>
    </tbody>
</table>
<?php require('views/footer.php'); ?>