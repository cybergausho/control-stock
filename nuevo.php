<?php

//implementar un header estandar con session_control

include_once("class/Stock.php");
include_once("class/config.php");
$mod = new Stock();
//RECEPCION DE VARIABLES
$nuevo = $_POST['nuevo'];
$nombre = $_POST['nombre'];
$descripcion = $_POST['descripcion'];
$cantidad = $_POST['cantidad'];
$estado = $_POST['estado'];
$ubicacion = $_POST['ubicacion'];

//AGREGAR
if ($nuevo) {
    $mod->stockAgregar($nombre, $descripcion, $cantidad, $estado, $ubicacion);
}



?>

<form method="post">
    <p>
        <label for="nombre">Nombre</label>
        <input id="nombre" type="text" name="nombre" value="">
    </p>
    <p>
        <label for="descripcion">Descripcion</label>
        <input id="descripcion" type="text" name="descripcion" value="">
    </p>
    <p>
        <label for="nombre">Cantidad</label>
        <input id="cantidad" type="text" name="cantidad" value="">
    </p>
    <p>
        <label for="estado">Estado</label>
        <input id="estado" type="text" name="estado" value="">
    </p>
    <p>
        <label for="ubicacion">Ubicacion</label>
        <input id="ubicacion" type="text" name="ubicacion" value="">
    </p>
    <p>
        <input type="submit" name= "nuevo" value="Agregar">
    </p>

</form>