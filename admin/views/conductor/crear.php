<?php require('views/header/header_admin.php'); ?>
<!-- Header Start -->
<div class="container-fluid bg-breadcrumb">
        <div class="container text-center py-5" style="max-width: 900px;">
            <h4 class="text-white display-4 mb-4 wow fadeInDown" data-wow-delay="0.1s">Conductores</h4>
            <ol class="breadcrumb d-flex justify-content-center mb-0 wow fadeInDown" data-wow-delay="0.3s">
                <li class="breadcrumb-item"><a href="index.php">Inicio</a></li>
                <li class="breadcrumb-item text-primary"><a href="conductor.php">Conductores</a></li>
                <li class="breadcrumb-item active text-primary"><?php echo ($accion == "crear") ? "Nuevo " : "Modificar "; ?> Conductor</li>
            </ol>    
        </div>
    </div>
<!-- Header End -->
<div class="mx-3 my-5">
    <form action="conductor.php?accion=<?php if ($accion == "crear"): echo('nuevo'); else: echo('modificar&id=' . $id); endif; ?>" method="post" enctype="multipart/form-data"> 
        <!-- Campo Nombre -->
        <div class="row mb-3">
            <label for="nombre" class="col-sm-2 col-form-label">Nombre</label>
            <div class="col-sm-10">
                <input type="text" name="data[nombre]" placeholder="Escribe aquí el nombre" class="form-control" value="<?php if (isset($conductores['nombre'])): echo($conductores['nombre']); endif; ?>"/> 
            </div>
        </div>
        <!-- Campo Apellido -->
        <div class="row mb-3">
            <label for="apellido" class="col-sm-2 col-form-label">Apellido</label> 
            <div class="col-sm-10">
                <input type="text" name="data[apellido]" placeholder="Escribe aquí el apellido" class="form-control" value="<?php if (isset($conductores['apellido'])): echo($conductores['apellido']); endif; ?>"/> 
            </div>
        </div>
        <!-- Campo RFC -->
        <div class="row mb-3">
            <label for="rfc" class="col-sm-2 col-form-label">RFC</label>
            <div class="col-sm-10">
                <input type="text" name="data[rfc]" placeholder="Escribe aquí el RFC" class="form-control" value="<?php if(isset($conductores['rfc'])):echo($conductores['rfc']);endif; ?>"/>
            </div>
        </div>
        <!-- Campo Telefono -->
        <div class="row mb-3">
            <label for="telefono" class="col-sm-2 col-form-label">Teléfono</label>
            <div class="col-sm-10">
                <input type="text" name="data[telefono]" placeholder="Escribe aquí el teléfono" class="form-control" value="<?php if (isset($conductores['telefono'])): echo($conductores['telefono']); endif; ?>"/> 
            </div>
        </div>
        <!-- Campo Correo -->
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
        <!-- Campo Licencia -->
        <div class="row mb-3">
            <label for="licencia" class="col-sm-2 col-form-label">Licencia</label>
            <div class="col-sm-10">
                <input type="text" name="data[licencia]" placeholder="Escribe aquí la licencia" class="form-control" value="<?php if (isset($conductores['licencia'])): echo($conductores['licencia']); endif; ?>"/> 
            </div>
        </div>
        <!-- Campo Fotografia -->
        <div class="row mb-3">
            <label for="fotografia" class="col-sm-2 col-form-label">Fotografía</label>
            <div class="col-sm-10">
                <input type="file" name="fotografia" placeholder="URL de la fotografía" class="form-control" />
            </div>
        </div>
        <!-- Boton Guardar -->
        <div class="d-flex justify-content-center">
            <input type="submit" name="data[enviar]" value="Guardar" class="btn btn-success"/>
        </div>
    </form>
</div>
<?php require('views/footer.php'); ?>
