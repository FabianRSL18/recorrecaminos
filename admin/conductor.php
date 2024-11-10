<?php
require_once('conductor.class.php');
require_once('usuario.class.php');

$app = new Conductor(); 
$appUsuario = new Usuario();

$app -> checkRol('Administrador');
$accion = (isset($_GET['accion'])) ? $_GET['accion'] : NULL;
$id = (isset($_GET['id'])) ? $_GET['id'] : null;

switch ($accion) {
    case 'crear':
        $usuarios = $appUsuario->readAll();
        include 'views/conductor/crear.php'; 
        break;
    case 'nuevo':
        $data = $_POST['data'];
        $resultado = $app->create($data);
        if ($resultado) {
            $mensaje = "El conductor se agregó correctamente"; 
            $tipo = "success";
        } else {
            $mensaje = "Hubo un error al agregar el conductor"; 
            $tipo = "danger";
        }
        $conductores = $app->readAll(); 
        include('views/conductor/index.php'); 
        break;
    case 'actualizar':
        $conductores = $app->readOne($id); 
        $usuarios = $appUsuario->readAll();
        include('views/conductor/crear.php'); 
        break;
    case 'modificar':
        $data = $_POST['data'];
        $resultado = $app->update($id, $data);
        if ($resultado) {
            $mensaje = "El conductor se actualizó correctamente"; 
            $tipo = "success";
        } else {
            $mensaje = "El conductor no se actualizó"; 
            $tipo = "danger";
        }
        $conductores = $app->readAll(); 
        include('views/conductor/index.php'); 
        break;

    case 'eliminar':
        if (!is_null($id)) {
            if (is_numeric($id)) {
                $resultado = $app->delete($id);
                if ($resultado) {
                    $mensaje = "El conductor se ha eliminado correctamente"; 
                    $tipo = "success";
                } else {
                    $mensaje = "Ocurrió un error"; 
                    $tipo = "danger";
                }
            }
        }
        $conductores = $app->readAll(); 
        include("views/conductor/index.php"); 
        break;
    default:
        $conductores = $app->readAll(); 
        include 'views/conductor/index.php'; 
}
require_once('views/footer.php');
?>
