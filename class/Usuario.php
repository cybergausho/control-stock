<?php
class Usuario{

   public $dni;
   public $nombre;
   public $correo;
   public $password;


    /* -------------------------- INICIAR SESION --------------------- */
    public function userLogin($dni, $password){
        try {
            echo "<p>" . $dni . $password . "</p>";
            $db = getDB();
            $stmt = $db->prepare("SELECT dni FROM usuario WHERE dni=:dni AND passwd=:hash_password");
            $stmt->bindParam("dni", $dni, PDO::PARAM_STR);
            //cifrar pass
            $hash_password = hash('sha256', $password);
            $stmt->bindParam("hash_password", $hash_password, PDO::PARAM_STR);

            $stmt->execute();
            $count = $stmt->rowCount();
            $data = $stmt->fetch(PDO::FETCH_OBJ);
            echo "<p>" . var_dump($data) . "</p>";
            $db = null;
            if ($count) {
                $_SESSION['uid'] = $data->dni; // Almacenar dni del usuario como var de session
                return true;
            } else {
                return false;
            }
        } catch (PDOException $e) {
            echo 'Error login: ' . $e->getMessage();
        }
    }



    /* -------------------------- REGISTRAR USUARIO --------------------- */
    public function userRegistration($dni, $passwd, $correo, $nombre, $permiso){
        try {
            $db = getDB();
            $st = $db->prepare("SELECT * FROM usuario WHERE dni=:dni");
            $st->bindParam(":dni", $dni, PDO::PARAM_INT);
            $st->execute();
            $count = $st->rowCount();
            if ($count < 1) {
                $stmt = $db->prepare("INSERT INTO usuario(dni, nombre, passwd, correo, permiso) VALUES (:dni, :nombre, :hash_password,:correo, :permiso)");
                $stmt->bindParam(":dni", $dni, PDO::PARAM_STR);
                $stmt->bindParam(":nombre", $nombre, PDO::PARAM_STR);
                $hash_password = hash('sha256', $passwd);
                $stmt->bindParam(":hash_password", $hash_password, PDO::PARAM_STR);
                $stmt->bindParam(":correo", $correo, PDO::PARAM_STR);

                $stmt->bindParam(":permiso", $permiso, PDO::PARAM_STR);
                $stmt->execute();
                $uid = $db->lastInsertId(); // Last inserted row id -- VERIFICAR USO

                $db = null;
                $_SESSION['uid'] = $uid;
                return true;
            } else {
                $db = null;
                return false;
            }
        } catch (PDOException $e) {
            echo 'Error en el sistema de registro:' . $e->getMessage();
        }
    }

    /* -------------------------- DETALLES DEL USUARIO --------------------- */
    public function userDetails($dni){
        try {
            $db = getDB();
            $stmt = $db->prepare("SELECT dni,correo, nombre FROM usuario WHERE dni=:dni");
            $stmt->bindParam("dni", $dni, PDO::PARAM_INT);
            $stmt->execute();
            $data = $stmt->fetch(PDO::FETCH_OBJ); //User data
            return $data;
        } catch (PDOException $e) {
            echo 'Error de usuario' . $e->getMessage();
        }
    }
}
