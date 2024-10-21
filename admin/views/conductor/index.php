<?php require('views/header.php'); ?>
<h1>Conductores</h1> 
<?php if (isset($mensaje)) : $app->alert($tipo, $mensaje); endif; ?>
<a href="conductor.php?accion=crear" class="btn btn-success">Nuevo</a>
<table class="table">
    <thead>
        <tr>
            <th scope="col">Id</th>
            <th scope="col">Nombre</th> 
            <th scope="col">Apellido</th>
            <th scope="col">Teléfono</th>
            <th scope="col">Licencia</th>
            <th scope="col">Opciones</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($conductores as $conductor): ?> 
        <tr>
            <th scope="row"><?php echo $conductor['id_conductor']; ?></th> 
            <td><?php echo $conductor['nombre']; ?></td> 
            <td><?php echo $conductor['apellido']; ?></td>
            <td><?php echo $conductor['telefono']; ?></td>
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