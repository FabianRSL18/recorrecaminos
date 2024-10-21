<?php
require_once ('../sistema.class.php');
class Ruta extends Sistema{
    function create($data) {
        $result = [];
        $this->conexion();
        $sql = "INSERT INTO ruta (destino, abordaje, hora_a, parada, hora_p) 
                VALUES (:destino, :abordaje, :hora_a, :parada, :hora_p);";
        $insertar = $this->con->prepare($sql);
        $insertar->bindParam(':destino', $data['destino'], PDO::PARAM_STR);
        $insertar->bindParam(':abordaje', $data['abordaje'], PDO::PARAM_STR);
        $insertar->bindParam(':hora_a', $data['hora_a'], PDO::PARAM_STR);
        $insertar->bindParam(':parada', $data['parada'], PDO::PARAM_STR);
        $insertar->bindParam(':hora_p', $data['hora_p'], PDO::PARAM_STR);
        $insertar->execute();
        $result = $insertar->rowCount();
        return $result;
    }
    
    function update($id, $data) {
        $this->conexion();
        $result = [];
        $sql = "UPDATE ruta SET destino = :destino, abordaje = :abordaje, hora_a = :hora_a, 
                parada = :parada, hora_p = :hora_p WHERE id_ruta = :id_ruta;";
        $modificar = $this->con->prepare($sql);
        $modificar->bindParam(':id_ruta', $id, PDO::PARAM_INT);
        $modificar->bindParam(':destino', $data['destino'], PDO::PARAM_STR);
        $modificar->bindParam(':abordaje', $data['abordaje'], PDO::PARAM_STR);
        $modificar->bindParam(':hora_a', $data['hora_a'], PDO::PARAM_STR);
        $modificar->bindParam(':parada', $data['parada'], PDO::PARAM_STR);
        $modificar->bindParam(':hora_p', $data['hora_p'], PDO::PARAM_STR); 
        $modificar->execute();
        $result = $modificar->rowCount();
        return $result;
    }
    
    function delete($id) {
        $result=[];
        $this-> conexion();
        $sql="DELETE from ruta where id_ruta =:id_ruta";
        $borrar = $this->con-> prepare($sql);
        $borrar -> bindParam(':id_ruta',$id,PDO::PARAM_INT);
        $borrar -> execute();
        $result = $borrar -> rowCount();
        return $result;
    }
    function readOne($id) {
        $this -> conexion();
        $result=[];
        $query = "SELECT * FROM ruta where id_ruta=:id_ruta;";
        $sql = $this -> con->prepare($query);
        $sql->bindParam(":id_ruta",$id,PDO::PARAM_INT);
        $sql->execute();
        $result = $sql->fetch(PDO::FETCH_ASSOC);
        return $result;
    }
    function readAll(){
        $this -> conexion();
        $result=[];
        $query = "SELECT * FROM ruta";
        $sql = $this -> con->prepare($query);
        $sql->execute();
        $result = $sql->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }
}
?>