<?php 
// Inicia la sesión si no está activa
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// Verifica si el usuario tiene el rol de 'Administrador'
$esAdmin = isset($_SESSION['roles']) && in_array('Administrador', $_SESSION['roles']);
$esCliente = isset($_SESSION['roles']) && in_array('Cliente', $_SESSION['roles']);

// Verifica el rol y carga el header correspondiente
if ($esAdmin) {
    require_once('views/header/header_admin.php');
} elseif ($esCliente) {
    require_once('views/header/header_cliente.php');
} else {
    // Si no es ni Administrador ni Cliente, se puede cargar un header por defecto
    require_once('views/header.php');
}
?>
<?php if (isset($mensaje)) : $app->alert($tipo, $mensaje); endif; ?>

<div class="container-fluid blog pb-5">
            <div class="container pb-5">
                <div class="text-center mx-auto pb-5 wow fadeInUp" data-wow-delay="0.2s" style="max-width: 800px;">
                    <h4 class="text-primary">Acompañanos</h4>
                    <h1 class="display-5 mb-4">Proximos Viajes</h1>
                    <p class="mb-0">Estos son algunos de los proximos viajes que tenemos en las proximas fechas</p>
                </div>
                <!-- Botón 'Nuevo' solo para administradores -->
                <?php if ($esAdmin): ?>
                    <a href="promo.php?accion=crear" class="btn btn-success">Nueva Promo</a>
                <?php endif; ?>
                <div class="owl-carousel blog-carousel wow fadeInUp" data-wow-delay="0.2s">
                <?php foreach ($promos as $promo): ?>
                    <div class="blog-item p-4">
                        <div class="blog-img mb-4">
                            <img src="<?php 
                                if(file_exists("../uploads/".$promo['fotografia'])){
                                    echo("../uploads/".$promo['fotografia']);
                                } else {
                                    echo('../uploads/default.png');
                                }
                                ?>" class="img-fluid w-100 rounded" alt="">
                            <div class="blog-title">
                                <a href="#" class="btn">Ver Más</a>
                            </div>
                        </div>
                        <a href="#" class="h4 d-inline-block mb-3"><?php echo $promo['titulo']; ?></a>
                        <p class="mb-4"><?php echo $promo['descripcion']; ?></p>
                        <div class="d-flex align-items-center">
                            <div class="ms-3">
                                <p class="mb-0"><?php echo $promo['fecha']; ?></p>
                                <div class="btn-group" role="group" aria-label="Basic radio toggle button group">
                                    <a href="promo.php?accion=actualizar&id=<?php echo $promo['id_promo']; ?>" class="btn btn-primary">Actualizar</a>
                                    <a href="promo.php?accion=eliminar&id=<?php echo $promo['id_promo']; ?>" class="btn btn-danger">Eliminar</a>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
                </div>
            </div>
        </div>

<?php require('views/footer.php'); ?>