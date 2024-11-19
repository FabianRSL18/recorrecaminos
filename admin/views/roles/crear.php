<?php require('views/header/header_admin.php'); ?>
<!-- Header Start -->
<div class="container-fluid bg-breadcrumb">
        <div class="container text-center py-5" style="max-width: 900px;">
            <h4 class="text-white display-4 mb-4 wow fadeInDown" data-wow-delay="0.1s">Roles</h4>
            <ol class="breadcrumb d-flex justify-content-center mb-0 wow fadeInDown" data-wow-delay="0.3s">
                <li class="breadcrumb-item"><a href="index.php">Inicio</a></li>
                <li class="breadcrumb-item text-primary"><a href="ruta.php">Roles</a></li>
                <li class="breadcrumb-item active text-primary"><?php echo ($accion == "crear") ? "Nuevo " : "Modificar "; ?> Rol</li>
            </ol>    
        </div>
    </div>
<!-- Header End -->
<form action="roles.php?accion=<?php echo ($accion == "crear") ? 'nuevo' : 'modificar&id=' . $id; ?>" method="post">
    <div class="row mb-3">
        <label for="rol" class="col-sm-2 col-form-label">Nombre del Rol</label>
        <div class="col-sm-10">
            <input type="text" name="data[rol]" placeholder="Escribe aquí el nombre del rol" class="form-control" value="<?php echo isset($rol['rol']) ? $rol['rol'] : ''; ?>" required/>
        </div>
    </div>
    <input type="submit" name="data[enviar]" value="Guardar" class="btn btn-success"/>
</form>
<?php require('views/footer.php'); ?>