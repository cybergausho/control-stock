<?php
class Stock
{

    public $idStock;
    public $nombre;
    public $descripcion;
    public $cantidad;
    public $estado;
    public $ubicacion;
 
    
    /* -------------------------- NUEVO STOCK --------------------- */
    public function stockAgregar($nombre, $descripcion, $cantidad, $estado, $ubicacion)
    {
        try {
            $db = getDB();
            $stmt = $db->prepare("INSERT INTO stock (nombre,  descripcion, cantidad, estado, ubicacion) VALUES (:nombre, :descripcion, :cantidad, :estado, :ubicacion)");

            $stmt->bindParam(":nombre", $nombre, PDO::PARAM_STR);
            $stmt->bindParam(":descripcion", $descripcion, PDO::PARAM_STR);
            $stmt->bindParam(":cantidad", $cantidad, PDO::PARAM_INT);
            $stmt->bindParam(":estado", $estado, PDO::PARAM_STR);
            $stmt->bindParam(":ubicacion", $ubicacion, PDO::PARAM_STR);
            var_dump($stmt);
            $stmt->execute();

            $db = null;
        } catch (PDOException $e) {
            echo 'Error al agregar stock' . $e->getMessage();
        }
    }


    /* -------------------------- MOSTRAR TODOS --------------------- */
    public function listarTodo()
    //instanciar db
    {
        try {
            $db = getDB();
            $stmt = $db->prepare("SELECT * FROM stock");
            $stmt->execute();
            $data = $stmt->fetchAll(PDO::FETCH_ASSOC);
            //var_dump($data);
            $db = null;
            return $data;
            //retornar objetivo con array
        } catch (PDOException $e) {
            echo 'Error al listar stock: ' . $e->getMessage();
        }
    }

    /* -------------------------- DETALLES DE STOCK --------------------- */
    public function stockDetalles($idStock)
    {
        try {
            $db = getDB();
            $stmt = $db->prepare("SELECT nombre, descripcion, cantidad, estado, ubicacion FROM stock WHERE idStock=:idStock");
            $stmt->bindParam("idStock", $idStock, PDO::PARAM_INT);
            $stmt->execute();
            $data = $stmt->fetch(PDO::FETCH_ASSOC);
            return $data;
            $db = null;
        } catch (PDOException $e) {
            echo 'Error de stock' . $e->getMessage();
        }
    }


    /* -------------------------- MODIFICAR DE STOCK --------------------- */
    public function stockModificar($idStock, $nombre, $descripcion, $cantidad, $estado, $ubicacion)
    {
        echo $idStock, $nombre, $descripcion, $cantidad, $estado, $ubicacion;
        try {
            $db = getDB();
            $stmt = $db->prepare("UPDATE stock SET nombre=:nombre, descripcion=:descripcion, cantidad=:cantidad, estado=:estado, ubicacion=:ubicacion WHERE idStock=:idStock");
            $stmt->bindParam("idStock", $idStock, PDO::PARAM_INT);
            $stmt->bindParam(":nombre", $nombre, PDO::PARAM_STR);
            $stmt->bindParam(":descripcion", $descripcion, PDO::PARAM_STR);
            $stmt->bindParam(":cantidad", $cantidad, PDO::PARAM_INT);
            $stmt->bindParam(":estado", $estado, PDO::PARAM_STR);
            $stmt->bindParam(":ubicacion", $ubicacion, PDO::PARAM_STR);
            var_dump($stmt);
            $stmt->execute();
            $db = null;
            
        } catch (PDOException $e) {
            echo 'Error al modificar stock' . $e->getMessage();
        }
    }


    /* -------------------------- ELIMINAR DE STOCK --------------------- */
    public function stockEliminar($idStock)
    {
        try {
            $db = getDB();
            $stmt = $db->prepare("DELETE FROM stock WHERE idStock=:idStock");
            $stmt->bindParam("idStock", $idStock, PDO::PARAM_INT);
            $stmt->execute();
            $db = null;
        } catch (PDOException $e) {
            echo 'Error al eliminar stock' . $e->getMessage();
        }
    }


    //setters y getters...



}
