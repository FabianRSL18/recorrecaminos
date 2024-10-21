<?php require('views/header.php'); ?>
<h1><?php if ($accion == "crear"): echo("Nuevo"); else: echo("Modificar"); endif; ?> Vehículo</h1>
<form action="vehiculo.php?accion=<?php if ($accion == "crear"): echo('nuevo'); else: echo('modificar&id=' . $id); endif; ?>" method="post">
    <div class="row mb-3">
        <label for="modelo" class="col-sm-2 col-form-label">Modelo</label>
        <div class="col-sm-10">
            <input type="text" name="data[modelo]" placeholder="Escribe aquí el modelo" class="form-control" value="<?php if (isset($vehiculos['modelo'])): echo($vehiculos['modelo']); endif; ?>"/>
        </div>
    </div>
    <div class="row mb-3">
        <label for="tipo" class="col-sm-2 col-form-label">Tipo</label>
        <div class="col-sm-10">
            <input type="text" name="data[tipo]" placeholder="Escribe aquí el tipo" class="form-control" value="<?php if (isset($vehiculos['tipo'])): echo($vehiculos['tipo']); endif; ?>"/>
        </div>
    </div>
    <div class="row mb-3">
        <label for="matricula" class="col-sm-2 col-form-label">Matrícula</label>
        <div class="col-sm-10">
            <input type="text" name="data[matricula]" placeholder="Escribe aquí la matrícula" class="form-control" value="<?php if (isset($vehiculos['matricula'])): echo($vehiculos['matricula']); endif; ?>"/>
        </div>
    </div>
    <div class="row mb-3">
        <label for="capacidad" class="col-sm-2 col-form-label">Capacidad</label>
        <div class="col-sm-10">
            <input type="number" name="data[capacidad]" placeholder="Escribe aquí la capacidad" class="form-control" value="<?php if (isset($vehiculos['capacidad'])): echo($vehiculos['capacidad']); endif; ?>"/>
        </div>
    </div>
    <input type="submit" name="data[enviar]" value="Guardar" class="btn btn-success"/>
</form>
<?php require('views/footer.php'); ?>
