<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    
    <title>Recorrecaminos</title>
</head>
<body>
    <nav class="navbar bg-primary navbar-expand-lg " data-bs-theme="dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="index.php">Recorrecaminos</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item me-4">
                        <a class="nav-link active" aria-current="page" href="index.php">Inicio</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Usuarios
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <li><a class="dropdown-item" href="usuario.php">Usuario</a></li>
                            <li><a class="dropdown-item" href="conductor.php">Conductores</a></li>
                            <li><a class="dropdown-item" href="cliente.php">Clientes</a></li>
                            <li><a class="dropdown-item" href="roles.php">Roles</a></li>
                            <li><a class="dropdown-item" href="permiso.php">Permisos</a></li>
                        </ul>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Viajes
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <li><a class="dropdown-item" href="vehiculo.php">Vehiculos</a></li>
                            <li><a class="dropdown-item" href="reserva.php">Reservas</a></li>
                        </ul>
                    </li>
                    <li class="nav-item me-4">
                        <a class="nav-link" href="ruta.php">Rutas Escolares</a>
                    </li>
                    <li class="nav-item me-4">
                        <a class="nav-link" href="#">Agendar</a>
                    </li>
                    <li class="nav-item me-4">
                        <a class="nav-link" href="login.php?accion=logout" aria-disabled="true">Salir</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>