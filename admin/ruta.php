<?php
require_once('ruta.class.php');
$app = new Ruta();
$accion = (isset($_GET['accion'])) ? $_GET['accion'] : NULL;
$id = (isset($_GET['id'])) ? $_GET['id'] : null;

// Obtener los filtros desde la URL o formularios, si existen
$origen = (isset($_GET['origen'])) ? $_GET['origen'] : '';
$destino = (isset($_GET['destino'])) ? $_GET['destino'] : '';

switch ($accion) {
    case 'crear':
        include 'views/ruta/crear.php';
        break;
    
    case 'nuevo':
        $data = $_POST['data'];
        $resultado = $app->create($data);
        if ($resultado) {
            $mensaje = "La ruta se agregó correctamente";
            $tipo = "success";
        } else {
            $mensaje = "Hubo un error al agregar la ruta";
            $tipo = "danger";
        }
        // Actualizar las rutas después de agregar una nueva
        $rutas = $app->readAll();
        include('views/ruta/index.php');
        break;

    case 'actualizar':
        $rutas = $app->readOne($id);
        include('views/ruta/crear.php');
        break;

    case 'modificar':
        $data = $_POST['data'];
        $resultado = $app->update($id, $data);
        if ($resultado) {
            $mensaje = "La ruta se actualizó correctamente";
            $tipo = "success";
        } else {
            $mensaje = "La ruta no se actualizó";
            $tipo = "danger";
        }
        // Actualizar las rutas después de modificar una
        $rutas = $app->readAll();
        include('views/ruta/index.php');
        break;

    case 'eliminar':
        if (!is_null($id)) {
            if (is_numeric($id)) {
                $resultado = $app->delete($id);
                if ($resultado) {
                    $mensaje = "La ruta se ha eliminado correctamente";
                    $tipo = "success";
                } else {
                    $mensaje = "Ocurrió un error al eliminar la ruta";
                    $tipo = "danger";
                }
            }
        }
        // Actualizar las rutas después de eliminar
        $rutas = $app->readAll();
        include("views/ruta/index.php");
        break;

    default:
        // Si hay filtros, buscar rutas filtradas
        if ($origen || $destino) {
            $rutas = $app->readFiltered($origen, $destino);  // Usar el filtro
        } else {
            $rutas = $app->readAll();  // Si no hay filtros, leer todas las rutas
        }
        include 'views/ruta/index.php';
}
require_once('views/footer.php');
?>
