<?php
require_once('../sistema.class.php');

class Cliente extends Sistema {
    function create($data) {
        $this->conexion();
        $sql = "INSERT INTO cliente (nombre, apellido, correo, telefono, direccion) 
                VALUES (:nombre, :apellido, :correo, :telefono, :direccion);";
        $insertar = $this->con->prepare($sql);
        $insertar->bindParam(':nombre', $data['nombre'], PDO::PARAM_STR);
        $insertar->bindParam(':apellido', $data['apellido'], PDO::PARAM_STR);
        $insertar->bindParam(':correo', $data['correo'], PDO::PARAM_STR);
        $insertar->bindParam(':telefono', $data['telefono'], PDO::PARAM_STR);
        $insertar->bindParam(':direccion', $data['direccion'], PDO::PARAM_STR);
        $insertar->execute();
        return $insertar->rowCount();
    }

    function update($id, $data) {
        $this->conexion();
        $sql = "UPDATE cliente SET nombre = :nombre, apellido = :apellido, correo = :correo, 
                telefono = :telefono, direccion = :direccion WHERE id_cliente = :id_cliente;";
        $modificar = $this->con->prepare($sql);
        $modificar->bindParam(':id_cliente', $id, PDO::PARAM_INT);
        $modificar->bindParam(':nombre', $data['nombre'], PDO::PARAM_STR);
        $modificar->bindParam(':apellido', $data['apellido'], PDO::PARAM_STR);
        $modificar->bindParam(':correo', $data['correo'], PDO::PARAM_STR);
        $modificar->bindParam(':telefono', $data['telefono'], PDO::PARAM_STR);
        $modificar->bindParam(':direccion', $data['direccion'], PDO::PARAM_STR); 
        $modificar->execute();
        return $modificar->rowCount();
    }

    function delete($id) {
        $result=[];
        $this-> conexion();
        $sql="DELETE from cliente where id_cliente =:id_cliente";
        $borrar = $this->con-> prepare($sql);
        $borrar -> bindParam(':id_cliente',$id,PDO::PARAM_INT);
        $borrar -> execute();
        $result = $borrar -> rowCount();
        return $result;
    }

    function readOne($id) {
        $this -> conexion();
        $result=[];
        $query = "SELECT * FROM cliente where id_cliente=:id_cliente;";
        $sql = $this -> con->prepare($query);
        $sql->bindParam(":id_cliente",$id,PDO::PARAM_INT);
        $sql->execute();
        $result = $sql->fetch(PDO::FETCH_ASSOC);
        return $result;
    }

    function readAll(){
        $this -> conexion();
        $result=[];
        $query = "SELECT * FROM cliente";
        $sql = $this -> con->prepare($query);
        $sql->execute();
        $result = $sql->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }
} 
?>
