<?php
$idStock = $_GET['idStock']; 
include_once("class/Stock.php");
include_once("class/config.php");


$mod = new Stock();
$data =  $mod->stockDetalles($idStock);

//RECEPCION DE VARIABLES
$modify = $_POST['modify'];
$deleter = $_POST['deleter'];
$nombre = $_POST['nombre'];
$descripcion = $_POST['descripcion'];
$cantidad = $_POST['cantidad'];
$estado = $_POST['estado'];
$ubicacion = $_POST['ubicacion'];

//GUARDAR
if ($modify) {
    $mod->stockModificar($idStock, $nombre, $descripcion, $cantidad, $estado, $ubicacion);
    echo "Guardado con exito";
}
//ELIMINAR
if ($deleter) {
    $mod->stockEliminar($idStock);
}

?>

<form method="post">
    <p>
        <label for="nombre">Nombre</label>
        <input id="nombre" type="text" name="nombre" value="<?= $data['nombre']; ?>">
    </p>
    <p>
        <label for="descripcion">Descripcion</label>
        <input id="descripcion" type="text" name="descripcion" value="<?= $data['descripcion']; ?>">
    </p>
    <p>
        <label for="nombre">Cantidad</label>
        <input id="cantidad" type="text" name="cantidad" value="<?= $data['cantidad']; ?>">
    </p>
    <p>
        <label for="estado">Estado</label>
        <input id="estado" type="text" name="estado" value="<?= $data['estado']; ?>">
    </p>
    <p>
        <label for="ubicacion">Ubicacion</label>
        <input id="ubicacion" type="text" name="ubicacion" value="<?= $data['ubicacion']; ?>">
    </p>
    <p>
        <input type="hidden" name="idStock" value="<?= $idStock ?>">
        <input type="submit" name="modify" value="Modificar">
    </p>
    <p>
        <input type="hidden" name="idStock" value="<?= $idStock ?>">
        <input type="submit" name="deleter" value="Eliminar">
    </p>

</form>