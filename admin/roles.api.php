<?php
header("Content-type: application/json; charset=utf-8");
include('roles.class.php');

$app = new Roles();
//$app->checkRol('Administrador');
$accion = $_SERVER['REQUEST_METHOD'];
$id = (isset($_GET['id'])) ? $_GET['id'] : null;
$data = [];

switch ($accion) {
    case 'POST':
        $datos = $_POST;
        if(!is_null($id) && is_numeric($id)){
            $resultado = $app->update($id,$datos);
        }else{
            $resultado = $app->create($datos);
        }
        
        if($resultado == 1){
            $data['mensaje'] = "El permiso se creo correctamente";
        } else{
            $data['mensaje'] = "Ocurrio algun error";
        }
        break;
    case 'DELETE':
        if (!is_null($id)) {
            if (is_numeric($id)) {
                $resultado = $app->delete($id);
                if ($resultado) {
                    $mensaje = "El permiso se ha eliminado correctamente";
                } else {
                    $mensaje = "Ocurrió un error al eliminar el permiso";
                }
            }
        }
        $data['mensaje'] = $mensaje;
        break;
    default:
        if(!is_null($id) && is_numeric($id)){
            $permisos = $app->readOne($id);
        }else{
            $permisos = $app->readAll();
        }
        $data = $permisos;
}
echo json_encode($data);
?>