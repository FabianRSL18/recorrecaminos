<?php require('views/header/header_admin.php'); ?>
<!-- Header Start -->
<div class="container-fluid bg-breadcrumb">
        <div class="container text-center py-5" style="max-width: 900px;">
            <h4 class="text-white display-4 mb-4 wow fadeInDown" data-wow-delay="0.1s">Usuarios</h4>
            <ol class="breadcrumb d-flex justify-content-center mb-0 wow fadeInDown" data-wow-delay="0.3s">
                <li class="breadcrumb-item"><a href="index.php">Inicio</a></li>
                <li class="breadcrumb-item text-primary"><a href="usuario.php">Usuario</a></li>
                <li class="breadcrumb-item active text-primary"><?php echo ($accion == "crear") ? "Nuevo " : "Modificar "; ?> Usuario</li>
            </ol>    
        </div>
    </div>
<!-- Header End -->
<div class="mx-3 my-5">
    <form action="usuario.php?accion=<?php echo ($accion == "crear") ? 'nuevo' : 'modificar&id=' . $id; ?>" method="post">
        <!-- Campo Correo -->
        <div class="row mb-3">
            <label for="correo" class="col-sm-2 col-form-label">Correo electrónico</label>
            <div class="col-sm-10">
                <input type="email" name="data[correo]" placeholder="Escribe aquí el correo" class="form-control" value="<?php echo isset($usuario['correo']) ? $usuario['correo'] : ''; ?>" required />
            </div>
        </div>
        <!-- Campo Nombre -->
        <div class="row mb-3">
            <label for="nombre" class="col-sm-2 col-form-label">Nombre</label>
            <div class="col-sm-10">
                <input type="text" name="data[nombre]" placeholder="Escribe aquí el nombre" class="form-control" value="<?php echo isset($usuario['nombre']) ? $usuario['nombre'] : ''; ?>" required />
            </div>
        </div>
        <!-- Campo Primer Apellido -->
        <div class="row mb-3">
            <label for="primer_apellido" class="col-sm-2 col-form-label">Primer Apellido</label>
            <div class="col-sm-10">
                <input type="text" name="data[primer_apellido]" placeholder="Escribe aquí el primer apellido" class="form-control" value="<?php echo isset($usuario['primer_apellido']) ? $usuario['primer_apellido'] : ''; ?>" required />
            </div>
        </div>
        <!-- Campo Segundo Apellido -->
        <div class="row mb-3">
            <label for="segundo_apellido" class="col-sm-2 col-form-label">Segundo Apellido</label>
            <div class="col-sm-10">
                <input type="text" name="data[segundo_apellido]" placeholder="Escribe aquí el segundo apellido" class="form-control" value="<?php echo isset($usuario['segundo_apellido']) ? $usuario['segundo_apellido'] : ''; ?>" required />
            </div>
        </div>
        <!-- Campo Telefono -->
        <div class="row mb-3">
            <label for="telefono" class="col-sm-2 col-form-label">Teléfono</label>
            <div class="col-sm-10">
                <input type="text" name="data[telefono]" placeholder="Escribe aquí el teléfono" class="form-control" value="<?php echo isset($usuario['telefono']) ? $usuario['telefono'] : ''; ?>" />
            </div>
        </div>
        <!-- Campo Direccion -->
        <div class="row mb-3">
            <label for="direccion" class="col-sm-2 col-form-label">Dirección</label>
            <div class="col-sm-10">
                <textarea name="data[direccion]" placeholder="Escribe aquí la dirección" class="form-control"><?php echo isset($usuario['direccion']) ? $usuario['direccion'] : ''; ?></textarea>
            </div>
        </div>
        <!-- Campo Contraseña -->
        <div class="row mb-3">
            <label for="contrasena" class="col-sm-2 col-form-label">Contraseña</label>
            <div class="col-sm-10">
                <input type="password" name="data[contrasena]" placeholder="Escribe aquí la contraseña" class="form-control" required />
            </div>
        </div>
        <!-- Campo Roles -->
        <?php foreach($roles as $rol): ?>
        <div>
            <div class="form-check form-switch">
                <input class="form-check-input" type="checkbox" <?php $checked = ''; if(in_array($rol['id_rol'],$misRoles)):$checked = 'checked'; endif; echo($checked) ?> role="switch" id="flexSwitchCheckChecked" name="rol[<?php echo($rol['id_rol']);?>]">
                <label class="form-check-label" for="flexSwitchCheckChecked"><?php echo($rol['rol']);?></label>
            </div>
        </div>
        <?php endforeach;?>
        <!-- Boton Guardar -->
        <div class="d-flex justify-content-center">
            <input type="submit" name="data[enviar]" value="Guardar" class="btn btn-success" />
        </div>
    </form>
</div>

<?php require('views/footer.php'); ?>
