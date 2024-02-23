<?php
require_once '../../models/conexion.php';

if(isset($_GET['Id_Producto'])) {
    $Id_Producto = $_GET['Id_Producto'];
    $sql = "DELETE FROM `producto` WHERE Id_Producto=$Id_Producto";
    $query = $conexion->query($sql);

    if ($query) {
        header("Location: ../../vistas/listas/listProductos.php?eliminado=success");
        exit();
    } else {
        header("Location: ../../vistas/listas/listProductos.php?eliminado=error");
        exit();
    }
} else {
    // Si no se proporcionó un ID de producto, redirigir con un mensaje de error
    header("Location: ../../vistas/listas/listProductos.php?eliminado=error");
    exit();
}
?>
