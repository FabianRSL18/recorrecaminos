<?php
require_once('../sistema.class.php');

class Permiso extends Sistema {
    function create($data) {
        $this->conexion();
        $sql = "INSERT INTO permiso (permiso) 
                VALUES (:permiso);";
        $insertar = $this->con->prepare($sql);
        $insertar->bindParam(':permiso', $data['permiso'], PDO::PARAM_STR);
        $insertar->execute();
        return $insertar->rowCount();
    }

    function update($id, $data) {
        $this->conexion();
        $sql = "UPDATE permiso SET permiso = :permiso WHERE id_permiso = :id_permiso;";
        $modificar = $this->con->prepare($sql);
        $modificar->bindParam(':id_permiso', $id, PDO::PARAM_INT);
        $modificar->bindParam(':permiso', $data['permiso'], PDO::PARAM_STR);
        $modificar->execute();
        return $modificar->rowCount();
    }

    function delete($id) {
        $result=[];
        $this-> conexion();
        $sql="DELETE from permiso where id_permiso =:id_permiso";
        $borrar = $this->con-> prepare($sql);
        $borrar -> bindParam(':id_permiso',$id,PDO::PARAM_INT);
        $borrar -> execute();
        $result = $borrar -> rowCount();
        return $result;
    }

    function readOne($id) {
        $this -> conexion();
        $result=[];
        $query = "SELECT * FROM permiso where id_permiso =:id_permiso;";
        $sql = $this -> con->prepare($query);
        $sql->bindParam(":id_permiso",$id,PDO::PARAM_INT);
        $sql->execute();
        $result = $sql->fetch(PDO::FETCH_ASSOC);
        return $result;
    }

    function readAll(){
        $this -> conexion();
        $result=[];
        $query = "SELECT * FROM permiso";
        $sql = $this -> con->prepare($query);
        $sql->execute();
        $result = $sql->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }
} 
?>
