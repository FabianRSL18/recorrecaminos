<?php require('views/header.php'); ?>
<h1>Reservas</h1>
<?php if (isset($mensaje)) : $app->alert($tipo, $mensaje); endif; ?>
<a href="reserva.php?accion=crear" class="btn btn-success">Nuevo</a>
<table class="table">
    <thead>
        <tr>
        <th scope="col">Id</th>
        <th scope="col">Estado</th>
        <th scope="col">Fecha Reserva</th>
        <th scope="col">Fecha Salida</th>
        <th scope="col">Fecha Regreso</th>
        <th scope="col">Destino</th>
        <th scope="col">Id Cliente</th>
        <th scope="col">Opciones</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($reservas as $reserva): ?>
        <tr>
        <th scope="row"><?php echo $reserva['id_reserva']; ?></th>
        <td><?php echo $reserva['estado']; ?></td>
        <td><?php echo $reserva['fecha_reserva']; ?></td>
        <td><?php echo $reserva['fecha_salida']; ?></td>
        <td><?php echo $reserva['fecha_regreso']; ?></td>
        <td><?php echo $reserva['destno']; ?></td>
        <td><?php echo $reserva['id_cliente']; ?></td>
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
<?php require('views/footer.php'); ?>
