<?php
require_once ('../sistema.class.php');
class Conductor extends Sistema{
    function create($data) {
        $result = [];
        $this->conexion();
        $sql = "INSERT INTO conductor (nombre, apellido, telefono, licencia) 
                VALUES (:nombre, :apellido, :telefono, :licencia);";
        $insertar = $this->con->prepare($sql);
        $insertar->bindParam(':nombre', $data['nombre'], PDO::PARAM_STR);
        $insertar->bindParam(':apellido', $data['apellido'], PDO::PARAM_STR);
        $insertar->bindParam(':telefono', $data['telefono'], PDO::PARAM_STR);
        $insertar->bindParam(':licencia', $data['licencia'], PDO::PARAM_STR);
        $insertar->execute();
        $result = $insertar->rowCount();
        return $result;
    }

    function update($id, $data) {
        $this->conexion();
        $result = [];
        $sql = "UPDATE conductor SET nombre = :nombre, apellido = :apellido, 
                telefono = :telefono, licencia = :licencia WHERE id_conductor = :id_conductor;";
        $modificar = $this->con->prepare($sql);
        $modificar->bindParam(':id_conductor', $id, PDO::PARAM_INT);
        $modificar->bindParam(':nombre', $data['nombre'], PDO::PARAM_STR);
        $modificar->bindParam(':apellido', $data['apellido'], PDO::PARAM_STR);
        $modificar->bindParam(':telefono', $data['telefono'], PDO::PARAM_STR);
        $modificar->bindParam(':licencia', $data['licencia'], PDO::PARAM_STR); 
        $modificar->execute();
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
        $query = "SELECT * FROM conductor";
        $sql = $this -> con->prepare($query);
        $sql->execute();
        $result = $sql->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }
}
?>