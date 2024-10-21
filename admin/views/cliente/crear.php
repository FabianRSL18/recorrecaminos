<?php require('views/header.php'); ?>
<h1><?php if ($accion == "crear"): echo("Nuevo"); else: echo("Modificar"); endif; ?>Cliente</h1>
<form action="cliente.php?accion=<?php if ($accion == "crear"): echo('nuevo'); else: echo('modificar&id=' . $id); endif; ?>" method="post">
    <div class="row mb-3">
        <label for="nombre" class="col-sm-2 col-form-label">Nombre</label>
        <div class="col-sm-10">
            <input type="text" name="data[nombre]" placeholder="Escribe aquí el nombre" class="form-control" value="<?php if (isset($clientes['nombre'])): echo($clientes['nombre']); endif; ?>"/>
        </div>
    </div>
    <div class="row mb-3">
        <label for="apellido" class="col-sm-2 col-form-label">Apellido</label>
        <div class="col-sm-10">
            <input type="text" name="data[apellido]" placeholder="Escribe aquí el apellido" class="form-control" value="<?php if (isset($clientes['apellido'])): echo($clientes['apellido']); endif; ?>"/>
        </div>
    </div>
    <div class="row mb-3">
        <label for="correo" class="col-sm-2 col-form-label">Correo</label>
        <div class="col-sm-10">
            <input type="email" name="data[correo]" placeholder="Escribe aquí el correo" class="form-control" value="<?php if (isset($clientes['correo'])): echo($clientes['correo']); endif; ?>"/>
        </div>
    </div>
    <div class="row mb-3">
        <label for="telefono" class="col-sm-2 col-form-label">Teléfono</label>
        <div class="col-sm-10">
            <input type="text" name="data[telefono]" placeholder="Escribe aquí el teléfono" class="form-control" value="<?php if (isset($clientes['telefono'])): echo($clientes['telefono']); endif; ?>"/>
        </div>
    </div>
    <div class="row mb-3">
        <label for="direccion" class="col-sm-2 col-form-label">Dirección</label>
        <div class="col-sm-10">
            <textarea name="data[direccion]" placeholder="Escribe aquí la dirección" class="form-control"><?php if (isset($clientes['direccion'])): echo($clientes['direccion']); endif; ?></textarea>
        </div>
    </div>
    <input type="submit" name="data[enviar]" value="Guardar" class="btn btn-success"/>
</form>
<?php require('views/footer.php'); ?>
