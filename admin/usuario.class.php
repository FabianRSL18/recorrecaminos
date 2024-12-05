<?php
require_once('../sistema.class.php');

class Usuario extends Sistema {
    function create($data) {
        $this->conexion();
        $rol = $data['rol'];
        $data = $data['data'];
        $this->con->beginTransaction();
        try {
            // Inserción de datos en la tabla usuario con los nuevos campos
            $sql = "INSERT INTO usuario (correo, contrasena, nombre, primer_apellido, segundo_apellido, telefono, direccion) VALUES (:correo, :contrasena, :nombre, :primer_apellido, :segundo_apellido, :telefono, :direccion)";
            $insertar = $this->con->prepare($sql);
            $data['contrasena'] = md5($data['contrasena']); 
            $insertar->bindParam(':correo', $data['correo'], PDO::PARAM_STR);
            $insertar->bindParam(':contrasena', $data['contrasena'], PDO::PARAM_STR);
            $insertar->bindParam(':nombre', $data['nombre'], PDO::PARAM_STR);
            $insertar->bindParam(':primer_apellido', $data['primer_apellido'], PDO::PARAM_STR);
            $insertar->bindParam(':segundo_apellido', $data['segundo_apellido'], PDO::PARAM_STR);
            $insertar->bindParam(':telefono', $data['telefono'], PDO::PARAM_STR);
            $insertar->bindParam(':direccion', $data['direccion'], PDO::PARAM_STR);
            $insertar->execute();

            // Obtener el id_usuario para insertar en la tabla de relaciones de roles
            $sql = "SELECT id_usuario from usuario where correo = :correo";
            $consulta = $this->con->prepare($sql);
            $consulta->bindParam(':correo', $data['correo'], PDO::PARAM_STR);
            $consulta->execute();
            $datos = $consulta->fetch(PDO::FETCH_ASSOC);
            $id_usuario = isset($datos['id_usuario']) ? $datos['id_usuario'] : null;

            // Asignar roles al usuario
            if (!is_null($id_usuario)) {
                foreach ($rol as $r => $k) {
                    $sql = "INSERT INTO usuario_rol(id_usuario, id_rol) VALUES(:id_usuario, :id_rol)";
                    $insertar_rol = $this->con->prepare($sql);
                    $insertar_rol->bindParam(':id_usuario', $id_usuario, PDO::PARAM_INT);
                    $insertar_rol->bindParam(':id_rol', $r, PDO::PARAM_INT);
                    $insertar_rol->execute();
                }
                $this->con->commit();
                return $insertar->rowCount(); 
            }
        } catch (Exception $e) {
            $this->con->rollback();
        }
        return false;
    }

    function update($id, $data) {
        $this->conexion();
        $rol = $data['rol'];
        $data = $data['data'];
        $this->con->beginTransaction();
        try {
            // Actualización de datos en la tabla usuario con los nuevos campos
            $sql = "UPDATE usuario SET correo = :correo, contrasena = :contrasena, nombre = :nombre, 
                    primer_apellido = :primer_apellido, segundo_apellido = :segundo_apellido, telefono = :telefono, direccion = :direccion 
                    WHERE id_usuario = :id_usuario";
            $modificar = $this->con->prepare($sql);
            $data['contrasena'] = md5($data['contrasena']);
            $modificar->bindParam(':id_usuario', $id, PDO::PARAM_INT);
            $modificar->bindParam(':correo', $data['correo'], PDO::PARAM_STR);
            $modificar->bindParam(':contrasena', $data['contrasena'], PDO::PARAM_STR);
            $modificar->bindParam(':nombre', $data['nombre'], PDO::PARAM_STR);
            $modificar->bindParam(':primer_apellido', $data['primer_apellido'], PDO::PARAM_STR);
            $modificar->bindParam(':segundo_apellido', $data['segundo_apellido'], PDO::PARAM_STR);
            $modificar->bindParam(':telefono', $data['telefono'], PDO::PARAM_STR);
            $modificar->bindParam(':direccion', $data['direccion'], PDO::PARAM_STR);
            $modificar->execute();

            // Borrar y volver a insertar los roles
            $sql = "DELETE FROM usuario_rol WHERE id_usuario = :id_usuario";
            $borrar_rol = $this->con->prepare($sql);
            $borrar_rol->bindParam(':id_usuario', $id, PDO::PARAM_INT);
            $borrar_rol->execute();

            if (!is_null($id)) {
                foreach ($rol as $r => $k) {
                    $sql = "INSERT INTO usuario_rol(id_usuario, id_rol) VALUES(:id_usuario, :id_rol)";
                    $insertar_rol = $this->con->prepare($sql);
                    $insertar_rol->bindParam(':id_usuario', $id, PDO::PARAM_INT);
                    $insertar_rol->bindParam(':id_rol', $r, PDO::PARAM_INT);
                    $insertar_rol->execute();
                }
                $this->con->commit();
                return $insertar_rol->rowCount(); 
            }
        } catch (Exception $e) {
            $this->con->rollback();
        }
        return false;
    }

    function delete($id) {
        $this->conexion();
        $sql = "DELETE FROM usuario WHERE id_usuario = :id_usuario";
        $borrar = $this->con->prepare($sql);
        $borrar->bindParam(':id_usuario', $id, PDO::PARAM_INT);
        $borrar->execute();
        return $borrar->rowCount();
    }

    function readOne($id) {
        $this->conexion();
        $sql = "SELECT * FROM usuario WHERE id_usuario = :id_usuario";
        $consulta = $this->con->prepare($sql);
        $consulta->bindParam(':id_usuario', $id, PDO::PARAM_INT);
        $consulta->execute();
        return $consulta->fetch(PDO::FETCH_ASSOC);
    }

    function readAll() {
        $this->conexion();
        $sql = "SELECT * FROM usuario";
        $consulta = $this->con->prepare($sql);
        $consulta->execute();
        return $consulta->fetchAll(PDO::FETCH_ASSOC);
    }

    function readAllRoles($id) {
        $this->conexion();
        $sql = "SELECT DISTINCT r.id_rol FROM usuario u 
                JOIN usuario_rol ur ON u.id_usuario = ur.id_usuario 
                JOIN rol r ON ur.id_rol = r.id_rol WHERE u.id_usuario = :id_usuario;";
        $consulta = $this->con->prepare($sql);
        $consulta->bindParam(':id_usuario', $id, PDO::PARAM_INT);
        $consulta->execute();
        $roles = $consulta->fetchAll(PDO::FETCH_ASSOC);
        $data = [];
        foreach ($roles as $rol) {
            array_push($data, $rol['id_rol']);
        }
        return $data;
    }
}
?>
