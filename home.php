<?php

include('class/config.php');
include('includes/session.php');
include('class/Stock.php');

$userDetails = $userClass->userDetails($session_uid);
?>

<h1>Bienvenido al sistema de Stock, <?php echo $userDetails->nombre; ?></h1>
<h4><a href="<?php echo BASE_URL . 'logout.php'; ?>">Logout</a></h4>


<h3>Elementos en stock</h3>
<?php
    $stockClass = new Stock();
    $data = $stockClass->listarTodo();
    //print_r($data); ?>

<table border="">
    <thead>
        <th>id Stock</th>
        <th>Nombre</th>
        <th>Descripcion</th>
        <th>cantidad</th>
        <th>Estado</th>
        <th>Opcion</th>
    </thead>
    <tbody>
        <?php foreach ($data as $valor) { ?>
        <tr>
            <td><?php echo $valor['idStock']?></td>
            <td><?php echo $valor['nombre']?> </td>
            <td><?php echo $valor['descripcion']?></td>
            <td><?php echo $valor['cantidad']?></td>
            <td><?php echo $valor['estado']?> </td>
            <td>
            <a href="modificar.php?idStock=<?php echo $valor['idStock']?>" class="btn" >Modificar</a>
        </td>

        </tr> 
        <?php }
        ?>
    </tbody>
</table>





<!-- VER PAGINADO-->



<p></p>