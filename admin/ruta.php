<?php
require_once('ruta.class.php');
$app = new Ruta();
$accion = (isset($_GET['accion'])) ? $_GET['accion'] : NULL;
$id = (isset($_GET['id'])) ? $_GET['id'] : null;

switch ($accion) {
    case 'crear':
        include 'views/ruta/crear.php';
        break;
    case 'nuevo':
        $data = $_POST['data'];
        $resultado = $app->create($data);
        if ($resultado) {
            $mensaje = "La ruta se agrego correctamente";
            $tipo = "success";
        } else {
            $mensaje = "Hubo un error al agregar la ruta";
            $tipo = "danger";
        }
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
            $mensaje = "La ruta se actualizo se actualizo";
            $tipo = "success";
        } else {
            $mensaje = "La ruta no se actualizo";
            $tipo = "danger";
        }
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
                    $mensaje = "Ocurrió un error";
                    $tipo = "danger";
                }
            }
        }
        $rutas = $app->readAll();
        include("views/ruta/index.php");
        break;
    default:
        $rutas = $app->readAll();
        include 'views/ruta/index.php';
}
require_once('views/footer.php');
?>