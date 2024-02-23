<?php
require_once '../../models/conexion.php';

if(isset($_GET['Id_Proveedor'])) {
    $Id_Proveedor = $_GET['Id_Proveedor'];
    $sql = "DELETE FROM `proveedor` WHERE Id_Proveedor=$Id_Proveedor";
    $query = $conexion->query($sql);

    if ($query) {
        header("Location: ../../vistas/listas/listProveedor.php?eliminado=success");
        exit();
    } else {
        header("Location: ../../vistas/listas/listProveedor.php?eliminado=error");
        exit();
    }
} else {
    // Si no se proporcionó un ID de producto, redirigir con un mensaje de error
    header("Location: ../../vistas/listas/listProveedor.php?eliminado=error");
    exit();
}
?>
