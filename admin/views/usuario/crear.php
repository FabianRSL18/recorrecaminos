<?php require('views/header/header_admin.php'); ?>
<h1><?php echo ($accion == "crear") ? "Nuevo " : "Modificar "; ?>Usuario</h1>
<form action="usuario.php?accion=<?php echo ($accion == "crear") ? 'nuevo' : 'modificar&id=' . $id; ?>" method="post">
    <div class="row mb-3">
        <label for="correo" class="col-sm-2 col-form-label">Correo electrónico</label>
        <div class="col-sm-10">
            <input type="email" name="data[correo]" placeholder="Escribe aquí el correo" class="form-control" value="<?php echo isset($usuario['correo']) ? $usuario['correo'] : ''; ?>" required />
        </div>
    </div>

    <div class="row mb-3">
        <label for="nombre" class="col-sm-2 col-form-label">Nombre</label>
        <div class="col-sm-10">
            <input type="text" name="data[nombre]" placeholder="Escribe aquí el nombre" class="form-control" value="<?php echo isset($usuario['nombre']) ? $usuario['nombre'] : ''; ?>" required />
        </div>
    </div>

    <div class="row mb-3">
        <label for="primer_apellido" class="col-sm-2 col-form-label">Primer Apellido</label>
        <div class="col-sm-10">
            <input type="text" name="data[primer_apellido]" placeholder="Escribe aquí el primer apellido" class="form-control" value="<?php echo isset($usuario['primer_apellido']) ? $usuario['primer_apellido'] : ''; ?>" required />
        </div>
    </div>

    <div class="row mb-3">
        <label for="segundo_apellido" class="col-sm-2 col-form-label">Segundo Apellido</label>
        <div class="col-sm-10">
            <input type="text" name="data[segundo_apellido]" placeholder="Escribe aquí el segundo apellido" class="form-control" value="<?php echo isset($usuario['segundo_apellido']) ? $usuario['segundo_apellido'] : ''; ?>" required />
        </div>
    </div>

    <div class="row mb-3">
        <label for="telefono" class="col-sm-2 col-form-label">Teléfono</label>
        <div class="col-sm-10">
            <input type="text" name="data[telefono]" placeholder="Escribe aquí el teléfono" class="form-control" value="<?php echo isset($usuario['telefono']) ? $usuario['telefono'] : ''; ?>" />
        </div>
    </div>

    <div class="row mb-3">
        <label for="direccion" class="col-sm-2 col-form-label">Dirección</label>
        <div class="col-sm-10">
            <textarea name="data[direccion]" placeholder="Escribe aquí la dirección" class="form-control"><?php echo isset($usuario['direccion']) ? $usuario['direccion'] : ''; ?></textarea>
        </div>
    </div>

    <div class="row mb-3">
        <label for="contrasena" class="col-sm-2 col-form-label">Contraseña</label>
        <div class="col-sm-10">
            <input type="password" name="data[contrasena]" placeholder="Escribe aquí la contraseña" class="form-control" required />
        </div>
    </div>

    <?php foreach($roles as $rol): ?>
    <div>
        <div class="form-check form-switch">
            <input class="form-check-input" type="checkbox" <?php $checked = ''; if(in_array($rol['id_rol'],$misRoles)):$checked = 'checked'; endif; echo($checked) ?> role="switch" id="flexSwitchCheckChecked" name="rol[<?php echo($rol['id_rol']);?>]">
            <label class="form-check-label" for="flexSwitchCheckChecked"><?php echo($rol['rol']);?></label>
        </div>
    </div>
    <?php endforeach;?>

    <input type="submit" name="data[enviar]" value="Guardar" class="btn btn-success" />
</form>

<?php require('views/footer.php'); ?>
