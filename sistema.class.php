<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
include('config.class.php');
class Sistema{
    var $con;
    function conexion(){
        $this->con = new PDO(SGBD . ':host=' . DBHOST . ';dbname=' . DBNAME . ';port=' . DBPORT, DBUSER, DBPASS);
    }

    function alert($tipo, $mensaje){
        include('views/alert.php');
    }

    function getRol($correo){
        $this->conexion();
        $data = [];
        if (filter_var($correo, FILTER_VALIDATE_EMAIL)) {
            $sql = "SELECT r.rol
                from usuario u join usuario_rol ur on u.id_usuario = ur.id_usuario
                join rol r on ur.id_rol = r.id_rol 
                where u.correo=:correo;";
            $roles = $this->con->prepare($sql);
            $roles->bindParam(':correo', $correo, PDO::PARAM_STR);
            $roles->execute();
            $data = $roles->fetchAll(PDO::FETCH_ASSOC);
            $roles = [];
            foreach ($data as $rol) {
                array_push($roles, $rol['rol']);
            }
            $data = $roles;
        }
        return $data;
    }
    function getPrivilegio($correo){
        $this->conexion();
        $data = [];
        if (filter_var($correo, FILTER_VALIDATE_EMAIL)) {
            $sql = "SELECT p.permiso
                    from usuario u join usuario_rol ur on u.id_usuario = ur.id_usuario
                    join rol r on ur.id_rol = r.id_rol
                    join rol_permiso rp on r.id_rol = rp.id_rol
                    join permiso p on rp.id_permiso = p.id_permiso 
                    where u.correo =:correo ;";
            $privilegio = $this->con->prepare($sql);
            $privilegio->bindParam(':correo', $correo, PDO::PARAM_STR);
            $privilegio->execute();
            $data = $privilegio->fetchAll(PDO::FETCH_ASSOC);
            $permisos = [];
            foreach ($data as $permiso) {
                array_push($permisos, $permiso['permiso']);
            }
            $data = $permisos;
        }
        return $data;
    }

    function login($correo, $contrasena) {
        $contrasena = md5($contrasena);
        $acceso = false;
        // Validación del formato de correo electrónico
        if (filter_var($correo, FILTER_VALIDATE_EMAIL)) {
            if (session_status() === PHP_SESSION_NONE) {
                session_start(); // Inicia la sesión si no está activa
            }
            $this->conexion();
            $sql = "SELECT * FROM usuario WHERE correo = :correo AND contrasena = :contrasena";
            $sql = $this->con->prepare($sql);
            $sql->bindParam(':correo', $correo, PDO::PARAM_STR);
            $sql->bindParam(':contrasena', $contrasena, PDO::PARAM_STR);
            $sql->execute();
            $resultado = $sql->fetchAll(PDO::FETCH_ASSOC);
            if (isset($resultado[0])) {
                $acceso = true;
                $_SESSION['correo'] = $correo;
                $_SESSION['validado'] = $acceso;
                $_SESSION['roles'] = $this->getRol($correo);
                $_SESSION['privilegios'] = $this->getPrivilegio($correo);
                return $acceso;
            }
        }
        // Establecer sesión como no válida si no hay acceso
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }
        $_SESSION['validado'] = false;
        return $acceso;
    }
    
    function logout() {
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }
        $_SESSION = [];
        session_destroy();
        // Redirige al index
        echo "<script>
                window.location.href = 'index.php';
                // Elimina cualquier parámetro adicional en la URL después de redirigir
                history.replaceState(null, '', 'index.php');
            </script>";
        exit();
    }
    
    

    function checkRol($rol){
        if (isset($_SESSION['roles'])) {
            $roles = $_SESSION['roles'];
            if (!in_array($rol, $roles)) {
                $mensaje = "ERORR: usted no tiene el rol adecuado";
                $tipo = "danger";
                require_once('views/header.php');
                $this->alert($tipo, $mensaje);
                die();
            }
        } else {
            $mensaje = "Requiere iniciar sesión <a href='login.php'>Presione aquí para iniciar sesión<a/>";
            $tipo = "danger";
            require_once('views/header.php');
            $this->alert($tipo, $mensaje);
            die();
        }
    }
}
?>