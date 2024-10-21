<?php
require_once ('../sistema.class.php');
class Vehiculo extends Sistema{
    function create($data) {
        $result = [];
        $this->conexion();
        $sql = "INSERT INTO vehiculo (modelo, tipo, matricula, capacidad) 
                VALUES (:modelo, :tipo, :matricula, :capacidad);";
        $insertar = $this->con->prepare($sql);
        $insertar->bindParam(':modelo', $data['modelo'], PDO::PARAM_STR);
        $insertar->bindParam(':tipo', $data['tipo'], PDO::PARAM_STR);
        $insertar->bindParam(':matricula', $data['matricula'], PDO::PARAM_STR);
        $insertar->bindParam(':capacidad', $data['capacidad'], PDO::PARAM_INT);
        $insertar->execute();
        $result = $insertar->rowCount();
        return $result;
    }
    
    function update($id, $data) {
        $this->conexion();
        $result = [];
        $sql = "UPDATE vehiculo SET modelo = :modelo, tipo = :tipo, matricula = :matricula, 
                capacidad = :capacidad WHERE id_vehiculo = :id_vehiculo;";
        $modificar = $this->con->prepare($sql);
        $modificar->bindParam(':id_vehiculo', $id, PDO::PARAM_INT);
        $modificar->bindParam(':modelo', $data['modelo'], PDO::PARAM_STR);
        $modificar->bindParam(':tipo', $data['tipo'], PDO::PARAM_STR);
        $modificar->bindParam(':matricula', $data['matricula'], PDO::PARAM_STR);
        $modificar->bindParam(':capacidad', $data['capacidad'], PDO::PARAM_STR); 
        $modificar->execute();
        $result = $modificar->rowCount();
        return $result;
    }
    
    function delete($id) {
        $result=[];
        $this-> conexion();
        $sql="DELETE from vehiculo where id_vehiculo =:id_vehiculo";
        $borrar = $this->con-> prepare($sql);
        $borrar -> bindParam(':id_vehiculo',$id,PDO::PARAM_INT);
        $borrar -> execute();
        $result = $borrar -> rowCount();
        return $result;
    }
    function readOne($id) {
        $this -> conexion();
        $result=[];
        $query = "SELECT * FROM vehiculo where id_vehiculo=:id_vehiculo;";
        $sql = $this -> con->prepare($query);
        $sql->bindParam(":id_vehiculo",$id,PDO::PARAM_INT);
        $sql->execute();
        $result = $sql->fetch(PDO::FETCH_ASSOC);
        return $result;
    }
    function readAll(){
        $this -> conexion();
        $result=[];
        $query = "SELECT * FROM vehiculo";
        $sql = $this -> con->prepare($query);
        $sql->execute();
        $result = $sql->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }
}
?>