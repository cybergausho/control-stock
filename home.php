<?php

include('class/config.php');
include('includes/session.php');
include('class/Stock.php');

$userDetails = $userClass->userDetails($session_uid);
?>

<h1>Bienvenido al sistema de Stock, <?php echo $userDetails->nombre; ?></h1>
<h4><a href="<?php echo BASE_URL . 'logout.php'; ?>">Logout</a></h4>


<h3>Elementos en stock</h3>
<p><?php
    $stockClass = new Stock();
    $data = $stockClass->listarTodo();
    //print_r($data); ?></p>
    <form method="POST" action="<?php echo BASE_URL?>modificar.php">
<table border="1px">
    <thead>
        <th>id Stock</th>
        <th>Nombre</th>
        <th>Descripcion</th>
        <th>cantidad</th>
        <th>Estado</th>
        <th>Opcion</th>
    </thead>
    <tbody>
        <?php foreach ($data as $valor) {
            echo "
        <tr>
            <td>" . $valor['idStock']. "</td>
            <td>" . $valor['nombre'] . " </td>
            <td>" . $valor['descripcion'] . "  </td>
            <td>" . $valor['cantidad'] . "</td>
            <td>" . $valor['estado'] . '</td>
            <td>
            <input type="hidden" name="idStock" value="'.$valor['idStock'].'">
            <input type="submit" name="detalle" value="Detalles">
        </td>

        </tr> ';
        }
        ?>
    </tbody>
</table>
</form>





<!-- IMPLEMENTAR PAGINADO JS -->



<p></p>