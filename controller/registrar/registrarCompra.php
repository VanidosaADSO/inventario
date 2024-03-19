<?php
include("../../models/conexion.php");

if (isset($_POST['Registrar'])) {
    $fecha = $_POST['fecha'];
    $proveedor = $_POST['proveedor'];
    $totalFactura = $_POST['totalFactura'];
    $productosJson = $_POST['productosJson'];
    $productos = json_decode($productosJson, true);
    $productosJsonArray = json_encode($productos);

    $consultaCompra = "INSERT INTO `compra`(`Fecha`, `Proveedor`, `Total`, `Productos`) VALUES (?, ?, ?, ?);";
    $stmtCompra = mysqli_prepare($conexion, $consultaCompra);
    mysqli_stmt_bind_param($stmtCompra, 'ssss', $fecha, $proveedor, $totalFactura, $productosJsonArray);

    $resultadoCompra = mysqli_stmt_execute($stmtCompra);

    if ($resultadoCompra) {
        $consultaUpdateProveedor = "UPDATE `proveedor` SET `cantidadCompra` = `cantidadCompra` + 1 WHERE `Nombre` = ?";
        $stmtUpdateProveedor = mysqli_prepare($conexion, $consultaUpdateProveedor);
        mysqli_stmt_bind_param($stmtUpdateProveedor, 's', $proveedor);
        mysqli_stmt_execute($stmtUpdateProveedor);

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

