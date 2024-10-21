<?php require('views/header.php'); ?>
<h1>Rutas</h1>
<?php if (isset($mensaje)) : $app->alert($tipo, $mensaje); endif; ?>
<a href="ruta.php?accion=crear" class="btn btn-success">Nuevo</a>
<table class="table">
    <thead>
        <tr>
        <th scope="col">Id</th>
        <th scope="col">Destino</th>
        <th scope="col">Abordaje</th>
        <th scope="col">Hora de Abordaje</th>
        <th scope="col">Parada</th>
        <th scope="col">Hora de Parada</th>
        <th scope="col">Opciones</th>
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
        <td>
            <div class="btn-group" role="group" aria-label="Basic radio toggle button group">
            <a href="ruta.php?accion=actualizar&id=<?php echo $ruta['id_ruta']; ?>" class="btn btn-primary">Actualizar</a>
            <a href="ruta.php?accion=eliminar&id=<?php echo $ruta['id_ruta']; ?>" class="btn btn-danger">Eliminar</a>
            </div>
        </td>
        </tr>
        <?php endforeach; ?>
    </tbody>
</table>
<?php require('views/footer.php'); ?>
