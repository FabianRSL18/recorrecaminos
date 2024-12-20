<?php
require_once ('../sistema.class.php');
class Ruta extends Sistema{
    function create($data) {
        $result = [];
        $this->conexion();
        $sql = "INSERT INTO ruta (origen, destino, abordaje, hora_a, parada, hora_p) 
                VALUES (:origen, :destino, :abordaje, :hora_a, :parada, :hora_p);";
        $insertar = $this->con->prepare($sql);
        $insertar->bindParam(':origen', $data['origen'], PDO::PARAM_STR);
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
        $sql = "UPDATE ruta SET origen = :origen, destino = :destino, abordaje = :abordaje, hora_a = :hora_a, parada = :parada, hora_p = :hora_p WHERE id_ruta = :id_ruta;";
        $modificar = $this->con->prepare($sql);
        $modificar->bindParam(':id_ruta', $id, PDO::PARAM_INT);
        $modificar->bindParam(':origen', $data['origen'], PDO::PARAM_STR);
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
        $query = "SELECT * FROM ruta where id_ruta = :id_ruta;";
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

        // Función para leer rutas filtradas por origen y destino
        function readFiltered($origen, $destino) {
            $this->conexion();
            $result = [];
            $query = "SELECT * FROM ruta WHERE 1";  // '1' es siempre verdadero para agregar condiciones dinámicas
            // Si el origen es proporcionado, lo agregamos a la consulta
            if ($origen) {
                $query .= " AND origen LIKE :origen";
            }
            // Si el destino es proporcionado, lo agregamos a la consulta
            if ($destino) {
                $query .= " AND destino LIKE :destino";
            }
            $sql = $this->con->prepare($query);
            // Asociar los parámetros con los valores
            if ($origen) {
                $sql->bindValue(':origen', "%" . $origen . "%");
            }
            if ($destino) {
                $sql->bindValue(':destino', "%" . $destino . "%");
            }
            $sql->execute();
            $result = $sql->fetchAll(PDO::FETCH_ASSOC);
            return $result;
        }
}
?>