<?php
require_once '../../models/conexion.php';

if(isset($_GET['Id_Cliente'])) {
    $Id_Cliente = $_GET['Id_Cliente'];
    $sql = "DELETE FROM `cliente` WHERE Id_Cliente=$Id_Cliente";
    $query = $conexion->query($sql);

    if ($query) {
        header("Location: ../../vistas/listas/listCliente.php?eliminado=success");
        exit();
    } else {
        header("Location: ../../vistas/listas/listCliente.php?eliminado=error");
        exit();
    }
} else {
    // Si no se proporcionó un ID de producto, redirigir con un mensaje de error
    header("Location: ../../vistas/listas/listCliente.php?eliminado=error");
    exit();
}
?>
