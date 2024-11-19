<?php require('views/header/header_admin.php'); ?>
<!-- Header Start -->
<div class="container-fluid bg-breadcrumb">
        <div class="container text-center py-5" style="max-width: 900px;">
            <h4 class="text-white display-4 mb-4 wow fadeInDown" data-wow-delay="0.1s">Rutas</h4>
            <ol class="breadcrumb d-flex justify-content-center mb-0 wow fadeInDown" data-wow-delay="0.3s">
                <li class="breadcrumb-item"><a href="index.php">Inicio</a></li>
                <li class="breadcrumb-item text-primary"><a href="ruta.php">Rutas Escolares</a></li>
                <li class="breadcrumb-item active text-primary"><?php if ($accion == "crear"): echo("Nueva"); else: echo("Modificar"); endif; ?> Ruta</li>
            </ol>    
        </div>
    </div>
<!-- Header End -->
<h1></h1>
<form action="ruta.php?accion=<?php if ($accion == "crear"): echo('nuevo'); else: echo('modificar&id=' . $id); endif; ?>" method="post">
    <div class="row mb-3">
        <label for="destino" class="col-sm-2 col-form-label">Destino</label>
        <div class="col-sm-10">
            <input type="text" name="data[destino]" placeholder="Escribe aquí el destino" class="form-control" value="<?php if (isset($rutas['destino'])): echo($rutas['destino']); endif; ?>"/>
        </div>
    </div>
    <div class="row mb-3">
        <label for="abordaje" class="col-sm-2 col-form-label">Abordaje</label>
        <div class="col-sm-10">
            <input type="text" name="data[abordaje]" placeholder="Escribe aquí el abordaje" class="form-control" value="<?php if (isset($rutas['abordaje'])): echo($rutas['abordaje']); endif; ?>"/>
        </div>
    </div>
    <div class="row mb-3">
        <label for="hora_a" class="col-sm-2 col-form-label">Hora de Abordaje</label>
        <div class="col-sm-10">
            <input type="time" name="data[hora_a]" class="form-control" value="<?php if (isset($rutas['hora_a'])): echo($rutas['hora_a']); endif; ?>"/>
        </div>
    </div>
    <div class="row mb-3">
        <label for="parada" class="col-sm-2 col-form-label">Parada</label>
        <div class="col-sm-10">
            <input type="text" name="data[parada]" placeholder="Escribe aquí la parada" class="form-control" value="<?php if (isset($rutas['parada'])): echo($rutas['parada']); endif; ?>"/>
        </div>
    </div>
    <div class="row mb-3">
        <label for="hora_p" class="col-sm-2 col-form-label">Hora de Parada</label>
        <div class="col-sm-10">
            <input type="time" name="data[hora_p]" class="form-control" value="<?php if (isset($rutas['hora_p'])): echo($rutas['hora_p']); endif; ?>"/>
        </div>
    </div>
    <input type="submit" name="data[enviar]" value="Guardar" class="btn btn-success"/>
</form>
<?php require('views/footer.php'); ?>
