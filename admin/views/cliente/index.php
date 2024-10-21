<?php require('views/header.php'); ?>
<h1>Clientes</h1>
<?php if (isset($mensaje)) : $app->alert($tipo, $mensaje); endif; ?>
<a href="cliente.php?accion=crear" class="btn btn-success">Nuevo</a>
<table class="table">
    <thead>
        <tr>
            <th scope="col">Id</th>
            <th scope="col">Nombre</th>
            <th scope="col">Apellido</th>
            <th scope="col">Correo</th>
            <th scope="col">Teléfono</th>
            <th scope="col">Dirección</th>
            <th scope="col">Opciones</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($clientes as $cliente): ?>
        <tr>
            <th scope="row"><?php echo $cliente['id_cliente']; ?></th>
            <td><?php echo $cliente['nombre']; ?></td>
            <td><?php echo $cliente['apellido']; ?></td>
            <td><?php echo $cliente['correo']; ?></td>
            <td><?php echo $cliente['telefono']; ?></td>
            <td><?php echo $cliente['direccion']; ?></td>
            <td>
                <div class="btn-group" role="group" aria-label="Basic radio toggle button group">
                    <a href="cliente.php?accion=actualizar&id=<?php echo $cliente['id_cliente']; ?>" class="btn btn-primary">Actualizar</a>
                    <a href="cliente.php?accion=eliminar&id=<?php echo $cliente['id_cliente']; ?>" class="btn btn-danger">Eliminar</a>
                </div>
            </td>
        </tr>
        <?php endforeach; ?>
    </tbody>
</table>
<?php require('views/footer.php'); ?>
