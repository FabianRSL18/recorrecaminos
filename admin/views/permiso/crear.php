<?php require('views/header/header_admin.php'); ?>
<!-- Header Start -->
<div class="container-fluid bg-breadcrumb">
        <div class="container text-center py-5" style="max-width: 900px;">
            <h4 class="text-white display-4 mb-4 wow fadeInDown" data-wow-delay="0.1s">Permisos</h4>
            <ol class="breadcrumb d-flex justify-content-center mb-0 wow fadeInDown" data-wow-delay="0.3s">
                <li class="breadcrumb-item"><a href="index.php">Inicio</a></li>
                <li class="breadcrumb-item text-primary"><a href="permiso.php">Permisos</a></li>
                <li class="breadcrumb-item active text-primary"><?php echo ($accion == "crear") ? "Nuevo " : "Modificar "; ?> Permiso</li>
            </ol>    
        </div>
    </div>
<!-- Header End -->
<div class="mx-3 my-5">
    <form action="permiso.php?accion=<?php if ($accion == "crear"): echo('nuevo'); else: echo('modificar&id=' . $id); endif; ?>" method="post">
        <!-- Campo Permiso -->
        <div class="row mb-3">
            <label for="permiso" class="col-sm-2 col-form-label">Permiso</label>
            <div class="col-sm-10">
                <input type="text" name="data[permiso]" placeholder="Escribe aquí el permiso" class="form-control" value="<?php if (isset($permisos['permiso'])): echo($permisos['permiso']); endif; ?>"/>
            </div>
        </div>
        <div class="d-flex justify-content-center">
            <input type="submit" name="data[enviar]" value="Guardar" class="btn btn-success"/>
        </div>
    </form>
</div>
<?php require('views/footer.php'); ?>
