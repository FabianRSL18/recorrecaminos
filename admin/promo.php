<?php
require_once('promo.class.php');
$app = new Promo();
$accion = (isset($_GET['accion'])) ? $_GET['accion'] : NULL;
$id = (isset($_GET['id'])) ? $_GET['id'] : null;

switch ($accion) {
    case 'crear':
        include 'views/promo/crear.php';
        break;

    case 'nuevo':
        $data = $_POST['data'];
        $resultado = $app->create($data);
        if ($resultado) {
            $mensaje = "La promo se agregó correctamente";
            $tipo = "success";
        } else {
            $mensaje = "Hubo un error al agregar el promo";
            $tipo = "danger";
        }
         // Redirige al index.php después de la creación
        header('Location: index.php');
        exit(); // Asegúrate de terminar el script para evitar más ejecuciones
        break;

    case 'actualizar':
        $promos = $app->readOne($id);
        include 'views/promo/crear.php';
        break;

    case 'modificar':
        $data = $_POST['data'];
        $resultado = $app->update($id, $data);
        if ($resultado) {
            $mensaje = "La promo se actualizó correctamente";
            $tipo = "success";
        } else {
            $mensaje = "La promo no se actualizó";
            $tipo = "danger";
        }
        // Redirige al index.php después de la actualización
        header('Location: index.php');
        exit(); // Asegúrate de terminar el script para evitar más ejecuciones
        break;

    case 'eliminar':
        if (!is_null($id)) {
            if (is_numeric($id)) {
                $resultado = $app->delete($id);
                if ($resultado) {
                    $mensaje = "La promo se ha eliminado correctamente";
                    $tipo = "success";
                } else {
                    $mensaje = "Ocurrió un error al eliminar el promo";
                    $tipo = "danger";
                }
            }
        }
        // Redirige al index.php después de la actualización
        header('Location: index.php');
        exit(); // Asegúrate de terminar el script para evitar más ejecuciones
        break;

    default:
        $promos = $app->readAll();
        include 'views/promo/index.php';
}
require_once('views/footer.php');
?>