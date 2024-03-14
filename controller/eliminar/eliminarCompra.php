<?php
require_once '../../models/conexion.php';

if(isset($_GET['Id_Compra'])) {
    $Id_Compra = $_GET['Id_Compra'];
    $sql = "DELETE FROM `compra` WHERE Id_Compra=$Id_Compra";
    $query = $conexion->query($sql);

    if ($query) {
        header("Location: ../../vistas/listas/listCompras.php?eliminado=success");
        exit();
    } else {
        header("Location: ../../vistas/listas/listCompras.php?eliminado=error");
        exit();
    }
} else {
    // Si no se proporcionó un ID de producto, redirigir con un mensaje de error
    header("Location: ../../vistas/listas/listCompras.php?eliminado=error");
    exit();
}
?>
