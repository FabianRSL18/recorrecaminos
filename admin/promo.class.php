<?php
require_once ('../sistema.class.php');
class Promo extends Sistema{
    function create($data) {
        $result = [];
        $this->conexion();
        $sql = "INSERT INTO promo (titulo, fecha, descripcion, fotografia) 
                VALUES (:titulo, :fecha, :descripcion, :fotografia);";
        $insertar = $this->con->prepare($sql);
        $fotografia = $this -> uploadFoto();
        $insertar->bindParam(':titulo', $data['titulo'], PDO::PARAM_STR);
        $insertar->bindParam(':fecha', $data['fecha'], PDO::PARAM_STR);
        $insertar->bindParam(':descripcion', $data['descripcion'], PDO::PARAM_STR);
        $insertar->bindParam(':fotografia', $fotografia, PDO::PARAM_STR);

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
        $sql = 'UPDATE promo SET 
                    titulo = :titulo, 
                    fecha = :fecha, 
                    descripcion = :descripcion ' . 
                    ($tmp ? ', ' . $tmp : '') . 
                    'WHERE id_promo = :id_promo';
        // Prepara la consulta
        $modificar = $this->con->prepare($sql);
        // Enlaza los parámetros
        $modificar->bindParam(':id_promo', $id, PDO::PARAM_INT);
        $modificar->bindParam(':titulo', $data['titulo'], PDO::PARAM_STR);
        $modificar->bindParam(':fecha', $data['fecha'], PDO::PARAM_STR);
        $modificar->bindParam(':descripcion', $data['descripcion'], PDO::PARAM_STR);
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
        $sql="DELETE from promo where id_promo =:id_promo";
        $borrar = $this->con-> prepare($sql);
        $borrar -> bindParam(':id_promo',$id,PDO::PARAM_INT);
        $borrar -> execute();
        $result = $borrar -> rowCount();
        return $result;
    }
    function readOne($id) {
        $this -> conexion();
        $result=[];
        $query = "SELECT * FROM promo where id_promo=:id_promo;";
        $sql = $this -> con->prepare($query);
        $sql->bindParam(":id_promo",$id,PDO::PARAM_INT);
        $sql->execute();
        $result = $sql->fetch(PDO::FETCH_ASSOC);
        return $result;
    }
    function readAll(){
        $this -> conexion();
        $result=[];
        $sql="SELECT * FROM promo";
        $sql = $this -> con->prepare($sql);
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
                    $titulo = explode('.',$data['name']);
                    $imagen = md5($n.$titulo[0]).".".$titulo[sizeof($titulo)-1];
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