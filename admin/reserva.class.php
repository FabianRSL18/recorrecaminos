<?php
require_once ('../sistema.class.php');
class Reserva extends Sistema{
    function create($data) {
        $result = [];
        $this->conexion();
        $sql = "INSERT INTO reserva (estado, fecha_reserva, fecha_salida, fecha_regreso, origen, destino, latitud, longitud, pasajeros, id_usuario) 
                VALUES (:estado, :fecha_reserva, :fecha_salida, :fecha_regreso, :origen, :destino, :latitud, :longitud, :pasajeros, :id_usuario);";
        $insertar = $this->con->prepare($sql);
        $insertar->bindParam(':estado', $data['estado'], PDO::PARAM_STR);
        $insertar->bindParam(':fecha_reserva', $data['fecha_reserva'], PDO::PARAM_STR);
        $insertar->bindParam(':fecha_salida', $data['fecha_salida'], PDO::PARAM_STR);
        $insertar->bindParam(':fecha_regreso', $data['fecha_regreso'], PDO::PARAM_STR);
        $insertar->bindParam(':origen', $data['origen'], PDO::PARAM_STR);
        $insertar->bindParam(':destino', $data['destino'], PDO::PARAM_STR);
        $insertar->bindParam(':latitud', $data['latitud'], PDO::PARAM_STR); // Nueva columna
        $insertar->bindParam(':longitud', $data['longitud'], PDO::PARAM_STR); // Nueva columna
        $insertar->bindParam(':pasajeros', $data['pasajeros'], PDO::PARAM_INT);
        $insertar->bindParam(':id_usuario', $data['id_usuario'], PDO::PARAM_INT);
        $insertar->execute();
        $result = $insertar->rowCount();
        return $result;
    }
    
    
    function update($id, $data) {
        $this->conexion();
        $result = [];
        $sql = "UPDATE reserva SET estado = :estado, fecha_reserva = :fecha_reserva, fecha_salida = :fecha_salida, fecha_regreso = :fecha_regreso, origen = :origen, destino = :destino, latitud = :latitud, longitud = :longitud, pasajeros = :pasajeros, id_usuario = :id_usuario WHERE id_reserva = :id_reserva;";
        $modificar = $this->con->prepare($sql);
        $modificar->bindParam(':id_reserva', $id, PDO::PARAM_INT);
        $modificar->bindParam(':estado', $data['estado'], PDO::PARAM_STR);
        $modificar->bindParam(':fecha_reserva', $data['fecha_reserva'], PDO::PARAM_STR);
        $modificar->bindParam(':fecha_salida', $data['fecha_salida'], PDO::PARAM_STR);
        $modificar->bindParam(':fecha_regreso', $data['fecha_regreso'], PDO::PARAM_STR);
        $modificar->bindParam(':origen', $data['origen'], PDO::PARAM_STR);
        $modificar->bindParam(':destino', $data['destino'], PDO::PARAM_STR);
        $modificar->bindParam(':latitud', $data['latitud'], PDO::PARAM_STR); // Nueva columna
        $modificar->bindParam(':longitud', $data['longitud'], PDO::PARAM_STR); // Nueva columna
        $modificar->bindParam(':pasajeros', $data['pasajeros'], PDO::PARAM_INT);
        $modificar->bindParam(':id_usuario', $data['id_usuario'], PDO::PARAM_INT);
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
        $this->conexion();
        $result = [];
        
        // Verificar si el usuario es un administrador
        if (isset($_SESSION['roles']) && in_array('Administrador', $_SESSION['roles'])) {
            // Los administradores pueden ver todas las reservas
            $query = "SELECT reserva.*, usuario.correo FROM reserva JOIN usuario ON reserva.id_usuario = usuario.id_usuario";
            $sql = $this->con->prepare($query);
        } else {
            // Los clientes solo pueden ver sus propias reservas
            $id_usuario = $_SESSION['id_usuario'];  // Obtener el id_usuario de la sesión
            $query = "SELECT reserva.*, usuario.correo FROM reserva JOIN usuario ON reserva.id_usuario = usuario.id_usuario WHERE reserva.id_usuario = :id_usuario";
            $sql = $this->con->prepare($query);
            $sql->bindParam(':id_usuario', $id_usuario, PDO::PARAM_INT);  // Filtrar por el id_usuario
        }
    
        $sql->execute();
        $result = $sql->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }
    
}
?>