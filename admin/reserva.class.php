<?php
require_once ('../sistema.class.php');
class Reserva extends Sistema{
    function create($data) {
        $result = [];
        $this->conexion();
        $sql = "INSERT INTO reserva (estado, fecha_reserva, fecha_salida, fecha_regreso, destino, id_cliente) 
                VALUES (:estado, :fecha_reserva, :fecha_salida, :fecha_regreso, :destino, :id_cliente);";
        $insertar = $this->con->prepare($sql);
        $insertar->bindParam(':estado', $data['estado'], PDO::PARAM_STR);
        $insertar->bindParam(':fecha_reserva', $data['fecha_reserva'], PDO::PARAM_STR);
        $insertar->bindParam(':fecha_salida', $data['fecha_salida'], PDO::PARAM_STR);
        $insertar->bindParam(':fecha_regreso', $data['fecha_regreso'], PDO::PARAM_STR);
        $insertar->bindParam(':destino', $data['destino'], PDO::PARAM_STR);
        $insertar->bindParam(':id_cliente', $data['id_cliente'], PDO::PARAM_INT);
        $insertar->execute();
        $result = $insertar->rowCount();
        return $result;
    }
    
    function update($id, $data) {
        $this->conexion();
        $result = [];
        $sql = "UPDATE reserva SET estado = :estado, fecha_reserva = :fecha_reserva, fecha_salida = :fecha_salida, fecha_regreso = :fecha_regreso, destino = :destino, id_cliente = :id_cliente WHERE id_reserva = :id_reserva;";
        $modificar = $this->con->prepare($sql);
        $modificar->bindParam(':id_reserva', $id, PDO::PARAM_INT);
        $modificar->bindParam(':estado', $data['estado'], PDO::PARAM_STR);
        $modificar->bindParam(':fecha_reserva', $data['fecha_reserva'], PDO::PARAM_STR);
        $modificar->bindParam(':fecha_salida', $data['fecha_salida'], PDO::PARAM_STR);
        $modificar->bindParam(':fecha_regreso', $data['fecha_regreso'], PDO::PARAM_STR);
        $modificar->bindParam(':destino', $data['destino'], PDO::PARAM_STR);
        $modificar->bindParam(':id_cliente', $data['id_cliente'], PDO::PARAM_INT);
        $modificar->execute();
        $result = $modificar->rowCount();
        return $result;
    }
    
    function delete($id) {
        $result=[];
        $this-> conexion();
        $sql="DELETE from reserva where id_reserva =:id_reserva";
        $borrar = $this->con-> prepare($sql);
        $borrar -> bindParam(':id_reserva',$id,PDO::PARAM_INT);
        $borrar -> execute();
        $result = $borrar -> rowCount();
        return $result;
    }
    function readOne($id) {
        $this -> conexion();
        $result=[];
        $query = "SELECT * FROM reserva where id_reserva=:id_reserva;";
        $sql = $this -> con->prepare($query);
        $sql->bindParam(":id_reserva",$id,PDO::PARAM_INT);
        $sql->execute();
        $result = $sql->fetch(PDO::FETCH_ASSOC);
        return $result;
    }
    function readAll(){
        $this -> conexion();
        $result=[];
        $query = "SELECT * FROM reserva";
        $sql = $this -> con->prepare($query);
        $sql->execute();
        $result = $sql->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }
}
?>