<?php
require_once('reserva.class.php');
require_once('usuario.class.php');

$appUsuario = new Usuario();
$app = new Reserva();

//$app -> checkRol('Administrador');

$accion = (isset($_GET['accion'])) ? $_GET['accion'] : NULL;
$id = (isset($_GET['id'])) ? $_GET['id'] : null;

switch ($accion) {
    case 'crear':
        $usuarios = $appUsuario -> readAll();
        include 'views/reserva/crear.php';
        break;
    case 'nuevo':
        $data = $_POST['data'];
        $resultado = $app->create($data);
        if ($resultado) {
            $mensaje = "La reserva se agrego correctamente";
            $tipo = "success";
        } else {
            $mensaje = "Hubo un error al agregar la reserva";
            $tipo = "danger";
        }
        $reservas = $app->readAll();
        include('views/reserva/index.php');
        break;
    case 'actualizar':
        $reservas = $app->readOne($id);
        $usuarios = $appUsuario -> readAll();
        include('views/reserva/crear.php');
        break;
    case 'modificar':
        $data = $_POST['data'];
        $resultado = $app->update($id, $data);
        if ($resultado) {
            $mensaje = "La reserva se actualizo se actualizo";
            $tipo = "success";
        } else {
            $mensaje = "La reserva no se actualizo";
            $tipo = "danger";
        }
        $reservas = $app->readAll();
        include('views/reserva/index.php');
        break;

    case 'eliminar':
        if (!is_null($id)) {
            if (is_numeric($id)) {
                $resultado = $app->delete($id);
                if ($resultado) {
                    $mensaje = "La reserva se ha eliminado correctamente";
                    $tipo = "success";
                } else {
                    $mensaje = "Ocurrió un error";
                    $tipo = "danger";
                }
            }
        }
        $reservas = $app->readAll();
        include("views/reserva/index.php");
        break;
    default:
        $reservas = $app->readAll();
        include 'views/reserva/index.php';
}
require_once('views/footer.php');
?>