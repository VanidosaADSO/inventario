<?php
require_once '../../models/conexion.php';

if(isset($_GET['Id_Usuario'])) {
    $Id_Usuario = $_GET['Id_Usuario'];
    $sql = "DELETE FROM `usuario` WHERE Id_Usuario=$Id_Usuario";
    $query = $conexion->query($sql);

    if ($query) {
        header("Location: ../../vistas/listas/linstUsuario.php?eliminado=success");
        exit();
    } else {
        header("Location: ../../vistas/listas/linstUsuario.php?eliminado=error");
        exit();
    }
} else {
    // Si no se proporcionó un ID de producto, redirigir con un mensaje de error
    header("Location: ../../vistas/listas/linstUsuario.php?eliminado=error");
    exit();
}
?>
