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
    <nav class="navbar bg-primary navbar-expand-lg " data-bs-theme="dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">Recorrecaminos</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item me-4">
                        <a class="nav-link active" aria-current="page" href="index.php">Inicio</a>
                    </li>
                    <li class="nav-item me-4">
                        <a class="nav-link" href="ruta.php">Rutas Escolares</a>
                    </li>
                    <li class="nav-item me-4">
                        <a class="nav-link" href="#">Agendar</a>
                    </li>
                    <li class="nav-item me-4">
                        <a class="nav-link" href="#" data-bs-toggle="modal" data-bs-target="#loginModal">Iniciar Sesión</a>
                        <?php include('login.php'); ?>
                    </li>
                </ul>
            </div>
        </div>
    </nav>