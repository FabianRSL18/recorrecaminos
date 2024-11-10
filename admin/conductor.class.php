<?php
require_once ('../sistema.class.php');
class Conductor extends Sistema{
    function create($data) {
        $result = [];
        $this->conexion();
        $sql = "INSERT INTO conductor (nombre, apellido, telefono, licencia, id_usuario, fotografia, rfc) 
                VALUES (:nombre, :apellido, :telefono, :licencia, :id_usuario, :fotografia, :rfc);";
        $insertar = $this->con->prepare($sql);
        $fotografia = $this -> uploadFoto();
        $insertar->bindParam(':nombre', $data['nombre'], PDO::PARAM_STR);
        $insertar->bindParam(':apellido', $data['apellido'], PDO::PARAM_STR);
        $insertar->bindParam(':telefono', $data['telefono'], PDO::PARAM_STR);
        $insertar->bindParam(':licencia', $data['licencia'], PDO::PARAM_STR);
        $insertar->bindParam(':id_usuario', $data['id_usuario'], PDO::PARAM_STR);
        $insertar->bindParam(':fotografia', $fotografia, PDO::PARAM_STR);
        $insertar->bindParam(':rfc', $data['rfc'], PDO::PARAM_STR);

        $insertar->execute();
        $result = $insertar->rowCount();
        return $result;
    }

    function update($id, $data) {
        $this->conexion();
        $result = [];
        $tmp = "";
        // Verifica si se subió una nueva imagen de fotografía
        if ($_FILES['fotografia']['error'] != 4) {
            $fotografia = $this->uploadFoto();
            $tmp = "fotografia = :fotografia, ";
        }
        // Construye la consulta SQL
        $sql = 'UPDATE conductor SET 
                    nombre = :nombre, 
                    apellido = :apellido, 
                    telefono = :telefono, 
                    licencia = :licencia, 
                    id_usuario = :id_usuario, ' . 
                    $tmp . ' 
                    rfc = :rfc 
                WHERE id_conductor = :id_conductor';
        // Prepara la consulta
        $modificar = $this->con->prepare($sql);
        // Enlaza los parámetros
        $modificar->bindParam(':id_conductor', $id, PDO::PARAM_INT);
        $modificar->bindParam(':nombre', $data['nombre'], PDO::PARAM_STR);
        $modificar->bindParam(':apellido', $data['apellido'], PDO::PARAM_STR);
        $modificar->bindParam(':telefono', $data['telefono'], PDO::PARAM_STR);
        $modificar->bindParam(':licencia', $data['licencia'], PDO::PARAM_STR);
        $modificar->bindParam(':id_usuario', $data['id_usuario'], PDO::PARAM_INT);
        $modificar->bindParam(':rfc', $data['rfc'], PDO::PARAM_STR);
        // Solo enlaza el parámetro de fotografía si se ha subido un archivo
        if ($_FILES['fotografia']['error'] != 4) {
            $modificar->bindParam(':fotografia', $fotografia, PDO::PARAM_STR);
        }
        // Ejecuta la consulta
        $modificar->execute();
        // Devuelve el número de filas afectadas
        $result = $modificar->rowCount();
        return $result;
    }
    
    
    function delete($id) {
        $result=[];
        $this-> conexion();
        $sql="DELETE from conductor where id_conductor =:id_conductor";
        $borrar = $this->con-> prepare($sql);
        $borrar -> bindParam(':id_conductor',$id,PDO::PARAM_INT);
        $borrar -> execute();
        $result = $borrar -> rowCount();
        return $result;
    }
    function readOne($id) {
        $this -> conexion();
        $result=[];
        $query = "SELECT * FROM conductor where id_conductor=:id_conductor;";
        $sql = $this -> con->prepare($query);
        $sql->bindParam(":id_conductor",$id,PDO::PARAM_INT);
        $sql->execute();
        $result = $sql->fetch(PDO::FETCH_ASSOC);
        return $result;
    }
    function readAll(){
        $this -> conexion();
        $result=[];
        $query = "SELECT conductor.*, usuario.correo FROM conductor JOIN usuario ON conductor.id_usuario = usuario.id_usuario";
        $sql = $this -> con->prepare($query);
        $sql->execute();
        $result = $sql->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }
    function uploadFoto(){
        $tipos = array("image/jpeg","image/png","image/gif");
        $data = $_FILES['fotografia'];
        $default = "default.png";
        if($data['error'] == 0){
            if($data['size'] <= 1048576){
                if(in_array($data['type'],$tipos)){
                    $n = rand(1,1000000);
                    $nombre = explode('.',$data['name']);
                    $imagen = md5($n.$nombre[0]).".".$nombre[sizeof($nombre)-1];
                    $origen = $data['tmp_name'];
                    $destino = "C:\\wamp64\\www\\recorrecaminos\\uploads\\".$imagen;
                    if(move_uploaded_file($origen,$destino)){
                        return $imagen;
                    }return $default;
                }
            }
        }
    }
    
}
?>