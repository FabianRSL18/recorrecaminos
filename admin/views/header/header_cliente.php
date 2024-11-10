<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    
    <!-- Iconos -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">

    <title>Recorrecaminos</title>
</head>
<body>
    <?php
    // Obtener el nombre de la página actual
    $current_page = basename($_SERVER['PHP_SELF']);
    ?>

    <nav class="navbar bg-primary navbar-expand-lg " data-bs-theme="dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">Recorrecaminos</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item me-4">
                        <a class="nav-link <?php echo ($current_page == 'index.php') ? 'active' : ''; ?>" href="index.php">Inicio</a>
                    </li>
                    <li class="nav-item me-4">
                        <a class="nav-link <?php echo ($current_page == 'ruta.php') ? 'active' : ''; ?>" href="ruta.php">Rutas Escolares</a>
                    </li>
                    <li class="nav-item me-4">
                        <a class="nav-link <?php echo ($current_page == 'agendar.php') ? 'active' : ''; ?>" href="#">Agendar</a>
                    </li>
                    <li class="nav-item me-4">
                        <a class="nav-link <?php echo ($current_page == 'mis_viajes.php') ? 'active' : ''; ?>" href="#">Mis viajes</a>
                    </li>
                    <li class="nav-item me-4">
                        <a class="nav-link" href="login.php?accion=logout" aria-disabled="true">Salir</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>