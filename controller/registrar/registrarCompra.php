<?php
include("../../models/conexion.php");

if (isset($_POST['Registrar'])) {


    $fecha = $_POST['fecha'];
    $proveedor = $_POST['proveedor'];
    $totalFactura = $_POST['totalFactura'];


    $productosJson = $_POST['productosJson'];
    $productos = json_decode($productosJson, true);

    $productosJsonArray = json_encode($productos);

    // Preparar la consulta
    $consulta = "INSERT INTO `compra`(`Fecha`, `Proveedor`, `Total`, `Productos`) 
    VALUES (?, ?, ?, ?);";
    $stmt = mysqli_prepare($conexion, $consulta);
    mysqli_stmt_bind_param($stmt, 'ssss', $fecha, $proveedor, $totalFactura, $productosJsonArray);

    $resultado = mysqli_stmt_execute($stmt);

    if ($resultado) {
        $mss = "Guardado correctamente";
        echo "<script> alert('" . $mss . "');
        window.location.href = '../../vistas/listas/listCompras.php';
        </script> ";
        exit;
    } else {
        $mss = "Error al guardar";
        echo "<script> alert('" . $mss . "');</script> ";
    }
}
