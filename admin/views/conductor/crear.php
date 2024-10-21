<?php require('views/header.php'); ?>
<h1><?php if ($accion == "crear"): echo("Nuevo"); else: echo("Modificar"); endif; ?> Conductor</h1> 
<form action="conductor.php?accion=<?php if ($accion == "crear"): echo('nuevo'); else: echo('modificar&id=' . $id); endif; ?>" method="post"> 
    <div class="row mb-3">
        <label for="nombre" class="col-sm-2 col-form-label">Nombre</label>
        <div class="col-sm-10">
            <input type="text" name="data[nombre]" placeholder="Escribe aquí el nombre" class="form-control" value="<?php if (isset($conductores['nombre'])): echo($conductores['nombre']); endif; ?>"/> 
        </div>
    </div>
    <div class="row mb-3">
        <label for="apellido" class="col-sm-2 col-form-label">Apellido</label> 
        <div class="col-sm-10">
            <input type="text" name="data[apellido]" placeholder="Escribe aquí el apellido" class="form-control" value="<?php if (isset($conductores['apellido'])): echo($conductores['apellido']); endif; ?>"/> 
        </div>
    </div>
    <div class="row mb-3">
        <label for="telefono" class="col-sm-2 col-form-label">Teléfono</label>
        <div class="col-sm-10">
            <input type="text" name="data[telefono]" placeholder="Escribe aquí el teléfono" class="form-control" value="<?php if (isset($conductores['telefono'])): echo($conductores['telefono']); endif; ?>"/> 
        </div>
    </div>
    <div class="row mb-3">
        <label for="licencia" class="col-sm-2 col-form-label">Licencia</label>
        <div class="col-sm-10">
            <input type="text" name="data[licencia]" placeholder="Escribe aquí la licencia" class="form-control" value="<?php if (isset($conductores['licencia'])): echo($conductores['licencia']); endif; ?>"/> 
        </div>
    </div>
    <input type="submit" name="data[enviar]" value="Guardar" class="btn btn-success"/>
</form>
<?php require('views/footer.php'); ?>
