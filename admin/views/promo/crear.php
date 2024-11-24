<?php require('views/header/header_admin.php'); ?>
<!-- Header Start -->
<div class="container-fluid bg-breadcrumb">
        <div class="container text-center py-5" style="max-width: 900px;">
            <h4 class="text-white display-4 mb-4 wow fadeInDown" data-wow-delay="0.1s">Promos</h4>
            <ol class="breadcrumb d-flex justify-content-center mb-0 wow fadeInDown" data-wow-delay="0.3s">
                <li class="breadcrumb-item"><a href="index.php">Inicio</a></li>
                <li class="breadcrumb-item text-primary"><a href="promo.php">Promos</a></li>
                <li class="breadcrumb-item active text-primary"><?php echo ($accion == "crear") ? "Nueva " : "Modificar "; ?> Promo</li>
            </ol>    
        </div>
    </div>
<!-- Header End -->

<form action="promo.php?accion=<?php if ($accion == "crear"): echo('nuevo'); else: echo('modificar&id=' . $id); endif; ?>" method="post" enctype="multipart/form-data"> 
    <div class="row mb-3">
        <label for="titulo" class="col-sm-2 col-form-label">Titulo</label>
        <div class="col-sm-10">
            <input type="text" name="data[titulo]" placeholder="Escribe aquí el titulo" class="form-control" value="<?php if (isset($promos['titulo'])): echo($promos['titulo']); endif; ?>"/> 
        </div>
    </div>

    <div class="row mb-3">
        <label for="fecha" class="col-sm-2 col-form-label">Fecha Salida</label>
        <div class="col-sm-10">
            <input type="date" name="data[fecha]" class="form-control" value="<?php echo isset($promos['fecha']) ? $promos['fecha'] : ''; ?>" />
        </div>
    </div>

    <div class="row mb-3">
        <label for="rfc" class="col-sm-2 col-form-label">Descripcion</label>
        <div class="col-sm-10">
            <input type="text" name="data[descripcion]" placeholder="Escribe aquí el RFC" class="form-control" value="<?php if(isset($promos['descripcion'])):echo($promos['descripcion']);endif; ?>"/>
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