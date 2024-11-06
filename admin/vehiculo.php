<?php
require_once('vehiculo.class.php');
$app = new Vehiculo();
$app -> checkRol('Administrador');

$accion = (isset($_GET['accion'])) ? $_GET['accion'] : NULL;
$id = (isset($_GET['id'])) ? $_GET['id'] : null;

switch ($accion) {
    case 'crear':
        include 'views/vehiculo/crear.php';
        break;
    case 'nuevo':
        $data = $_POST['data'];
        $resultado = $app->create($data);
        if ($resultado) {
            $mensaje = "El vehiculo se agrego correctamente";
            $tipo = "success";
        } else {
            $mensaje = "Hubo un error al agregar la ruta";
            $tipo = "danger";
        }
        $vehiculos = $app->readAll();
        include('views/vehiculo/index.php');
        break;
    case 'actualizar':
        $vehiculos = $app->readOne($id);
        include('views/vehiculo/crear.php');
        break;
    case 'modificar':
        $data = $_POST['data'];
        $resultado = $app->update($id, $data);
        if ($resultado) {
            $mensaje = "El vehiculo se actualizo";
            $tipo = "success";
        } else {
            $mensaje = "El vehiculo no se actualizo";
            $tipo = "danger";
        }
        $vehiculos = $app->readAll();
        include('views/vehiculo/index.php');
        break;

    case 'eliminar':
        if (!is_null($id)) {
            if (is_numeric($id)) {
                $resultado = $app->delete($id);
                if ($resultado) {
                    $mensaje = "El vehiculo se ha eliminado correctamente";
                    $tipo = "success";
                } else {
                    $mensaje = "Ocurrió un error";
                    $tipo = "danger";
                }
            }
        }
        $vehiculos = $app->readAll();
        include("views/vehiculo/index.php");
        break;
    default:
        $vehiculos = $app->readAll();
        include 'views/vehiculo/index.php';
}
require_once('views/footer.php');
?>