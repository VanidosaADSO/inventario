<?php
include("../../models/conexion.php");

if (isset($_POST['Registrar'])) {
    $cliente = $_POST['cliente'];
    $fecha = $_POST['fecha'];
    $totalFactura = $_POST['totalFactura'];
    $productosJson = $_POST['productosJson'];
    $productos = json_decode($productosJson, true);
    $productosJsonArray = json_encode($productos);

    $consulta_cliente = "SELECT Id_Cliente FROM cliente WHERE Nombre = '$cliente'";
    $resultado_cliente = mysqli_query($conexion, $consulta_cliente);

    if ($resultado_cliente && mysqli_num_rows($resultado_cliente) > 0) {
        $fila_cliente = mysqli_fetch_assoc($resultado_cliente);
        $id_cliente = $fila_cliente['Id_Cliente'];


        $consultaVenta = "INSERT INTO venta(Productos , PrecioTotalVenta,Fecha,Id_Cliente) VALUES (?, ?, ?, ?);";
        $stmtVenta = mysqli_prepare($conexion, $consultaVenta);
        mysqli_stmt_bind_param($stmtVenta, 'ssss', $productosJsonArray, $totalFactura, $fecha, $id_cliente);

        $resultadoVenta = mysqli_stmt_execute($stmtVenta);

        if ($resultadoVenta) {
            $mss = "Guardado correctamente";
            echo "<script> alert('" . $mss . "');
                  window.location.href = '../../vistas/listas/listVentas.php';
                  </script> ";
            exit;
        } else {
            $mss = "Error al guardar";
            echo "<script> alert('" . $mss . "');</script> ";
            include('../vistas/crear/ventas.php');
        }
    } else {
        $mss = "El cliente no existe";
        echo "<script> alert('" . $mss . "');</script> ";
        include('../vistas/crear/ventas.php');
    }
}