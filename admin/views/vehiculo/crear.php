<?php require('views/header/header_admin.php'); ?>
<!-- Header Start -->
<div class="container-fluid bg-breadcrumb">
    <div class="container text-center py-5" style="max-width: 900px;">
        <h4 class="text-white display-4 mb-4 wow fadeInDown" data-wow-delay="0.1s">Vehiculos</h4>
        <ol class="breadcrumb d-flex justify-content-center mb-0 wow fadeInDown" data-wow-delay="0.3s">
            <li class="breadcrumb-item"><a href="index.php">Inicio</a></li>
            <li class="breadcrumb-item text-primary"><a href="vehiculo.php">Vehiculo</a></li>
            <li class="breadcrumb-item active text-primary"><?php echo ($accion == "crear") ? "Nuevo " : "Modificar "; ?> Vehiculo</li>
        </ol>    
    </div>
</div>
<!-- Header End -->
<div class="mx-3 my-5">
<form action="vehiculo.php?accion=<?php if ($accion == "crear"): echo('nuevo'); else: echo('modificar&id=' . $id); endif; ?>" method="post">
    <!-- Campo Modelo -->
    <div class="row mb-3">
        <label for="modelo" class="col-sm-2 col-form-label">Modelo</label>
        <div class="col-sm-10">
            <input type="text" name="data[modelo]" placeholder="Escribe aquí el modelo" class="form-control" value="<?php if (isset($vehiculos['modelo'])): echo($vehiculos['modelo']); endif; ?>"/>
        </div>
    </div>
    <!-- Campo Tipo -->
    <div class="row mb-3">
        <label for="tipo" class="col-sm-2 col-form-label">Tipo</label>
        <div class="col-sm-10">
            <input type="text" name="data[tipo]" placeholder="Escribe aquí el tipo" class="form-control" value="<?php if (isset($vehiculos['tipo'])): echo($vehiculos['tipo']); endif; ?>"/>
        </div>
    </div>
    <!-- Campo Matricula -->
    <div class="row mb-3">
        <label for="matricula" class="col-sm-2 col-form-label">Matrícula</label>
        <div class="col-sm-10">
            <input type="text" name="data[matricula]" placeholder="Escribe aquí la matrícula" class="form-control" value="<?php if (isset($vehiculos['matricula'])): echo($vehiculos['matricula']); endif; ?>"/>
        </div>
    </div>
    <!-- Campo Capacidad -->
    <div class="row mb-3">
        <label for="capacidad" class="col-sm-2 col-form-label">Capacidad</label>
        <div class="col-sm-10">
            <input type="number" name="data[capacidad]" placeholder="Escribe aquí la capacidad" class="form-control" value="<?php if (isset($vehiculos['capacidad'])): echo($vehiculos['capacidad']); endif; ?>"/>
        </div>
    </div>
    <!-- Boton Guardar -->
    <div class="d-flex justify-content-center">
        <input type="submit" name="data[enviar]" value="Guardar" class="btn btn-success"/>
    </div>
</form>
</div>
<?php require('views/footer.php'); ?>
