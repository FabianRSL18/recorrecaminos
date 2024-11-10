<?php require('views/header/header_admin.php'); ?>
<h1><?php if ($accion == "crear"): echo("Nuevo"); else: echo("Modificar"); endif; ?> Conductor</h1> 

<form action="conductor.php?accion=<?php if ($accion == "crear"): echo('nuevo'); else: echo('modificar&id=' . $id); endif; ?>" method="post" enctype="multipart/form-data"> 
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
        <label for="rfc" class="col-sm-2 col-form-label">RFC</label>
        <div class="col-sm-10">
            <input type="text" name="data[rfc]" placeholder="Escribe aquí el RFC" class="form-control" value="<?php if(isset($conductores['rfc'])):echo($conductores['rfc']);endif; ?>"/>
        </div>
    </div>
    <div class="row mb-3">
        <label for="telefono" class="col-sm-2 col-form-label">Teléfono</label>
        <div class="col-sm-10">
            <input type="text" name="data[telefono]" placeholder="Escribe aquí el teléfono" class="form-control" value="<?php if (isset($conductores['telefono'])): echo($conductores['telefono']); endif; ?>"/> 
        </div>
    </div>
    <div class="row mb-3">
        <label for="id_usuario" class="col-sm-2 col-form-label">Correo</label>
        <div class="col-sm-10">
            <select name="data[id_usuario]" class="form-select">
                <?php foreach($usuarios as $usuario): ?>
                    <?php 
                    $selected = "";
                    if(isset($conductor['id_usuario']) && $conductor['id_usuario'] == $usuario['id_usuario']) {
                        $selected = "selected";
                    }
                    ?>
                    <option value="<?php echo($usuario['id_usuario']); ?>" <?php echo($selected); ?>>
                        <?php echo($usuario['correo']); ?>
                    </option>
                <?php endforeach; ?>
            </select>
        </div>
    </div>
    <div class="row mb-3">
        <label for="licencia" class="col-sm-2 col-form-label">Licencia</label>
        <div class="col-sm-10">
            <input type="text" name="data[licencia]" placeholder="Escribe aquí la licencia" class="form-control" value="<?php if (isset($conductores['licencia'])): echo($conductores['licencia']); endif; ?>"/> 
        </div>
    </div>
    <div class="row mb-3">
        <label for="fotografia" class="col-sm-2 col-form-label">Fotografía</label>
        <div class="col-sm-10">
            <input type="file" name="fotografia" placeholder="URL de la fotografía" class="form-control" />
        </div>
    </div>
    <input type="submit" name="data[enviar]" value="Guardar" class="btn btn-success"/>
</form>
<?php require('views/footer.php'); ?>
