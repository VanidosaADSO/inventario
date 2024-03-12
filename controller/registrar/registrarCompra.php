<?php
include("../../models/conexion.php");

if (isset($_POST['Registrar'])) {
    $fecha = $_POST['fecha'];
    $proveedor = $_POST['proveedor'];
    $totalFactura = $_POST['totalFactura'];
    $productos = $_POST['productos'];




    $productosSerialized = serialize($productos);

    $consulta = "INSERT INTO `compra`(`Fecha`, `Proveedor`, `Total`, `Productos`) 
    VALUES ('$fecha','$proveedor','$totalFactura','$productos');";

    $resultado = mysqli_query($conexion, $consulta);

    if ($resultado) {
        $mss = "Guardado correctamente";
        echo "<script> alert('" . $mss . "');
        window.location.href = '../vistas/listas/listCliente.php';
        </script> ";
        exit;
    } else {
        $mss = "Error al guardar";
        echo "<script> alert('" . $mss . "');</script> ";
        include('../vistas/crear/cliente.php');
    }
}

?>