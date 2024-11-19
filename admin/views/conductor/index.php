<?php  require('views/header/header_admin.php'); ?>
<!-- Header Start -->
<div class="container-fluid bg-breadcrumb">
    <div class="container text-center py-5" style="max-width: 900px;">
        <h4 class="text-white display-4 mb-4 wow fadeInDown" data-wow-delay="0.1s">Conductores</h4>
        <ol class="breadcrumb d-flex justify-content-center mb-0 wow fadeInDown" data-wow-delay="0.3s">
            <li class="breadcrumb-item"><a href="index.php">Inicio</a></li>
            <li class="breadcrumb-item active text-primary">Conductores</li>
        </ol>    
    </div>
</div>
<!-- Header End -->

<?php if (isset($mensaje)) : $app->alert($tipo, $mensaje); endif; ?>

<!-- Team Start -->
<div class="container-fluid team py-5">
    <div class="container py-5">
        <div class="text-center mx-auto pb-5 wow fadeInUp" data-wow-delay="0.2s" style="max-width: 800px;">
            <h4 class="text-primary">Nuestros Conductores</h4>
            <h1 class="display-5 mb-4">Panel de control</h1>
            <p class="mb-0">Puedes agregar, modificar y eliminar a los conductores que desees</p>
        </div>
        <a href="conductor.php?accion=crear" class="btn btn-success mb-4">Nuevo Conductor</a>
        <div class="row g-4">
            <?php foreach ($conductores as $conductor): ?> 
                <div class="col-md-6 col-lg-3 wow fadeInUp" data-wow-delay="0.2s">
                    <div class="team-item">
                        <div class="team-img">
                            <img src="<?php 
                                if(file_exists("../uploads/".$conductor['fotografia'])){
                                    echo("../uploads/".$conductor['fotografia']);
                                } else {
                                    echo('../uploads/default.png');
                                }
                                ?>" class="img-fluid" alt="">
                        </div>
                        <div class="team-title">
                            <h4 class="mb-0"><?php echo $conductor['nombre']; ?> <?php echo $conductor['apellido']; ?></h4>
                            <p class="mb-0">RFC: <?php echo $conductor['rfc']; ?></p>
                            <p class="mb-0">Teléfono: <?php echo $conductor['telefono']; ?></p>
                            <p class="mb-0">Correo: <?php echo $conductor['correo']; ?></p>
                        </div>
                        <div class="team-icon">
                            <div class="btn-group" role="group" aria-label="Basic radio toggle button group">
                                <a href="conductor.php?accion=actualizar&id=<?php echo $conductor['id_conductor']; ?>" class="btn btn-primary">Actualizar</a> 
                                <a href="conductor.php?accion=eliminar&id=<?php echo $conductor['id_conductor']; ?>" class="btn btn-danger">Eliminar</a> 
                            </div>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</div>
<!-- Team End -->

<?php require('views/footer.php'); ?>
