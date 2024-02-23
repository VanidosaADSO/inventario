<?php
include("../../models/conexion.php");

if (isset($_POST['Registrar'])) {
    $cliente = $_POST['cliente'];
    $fecha = $_POST['fecha'];
    $productos = $_POST['productos'];
    $cantidad = $_POST['cantidad'];
    $precioUnidad = $_POST['precioUnidad'];
    $precioTotal = $_POST['precioTotal'];
    $totalFactura = $_POST['totalFactura'];

    $consulta_cliente = "SELECT `Id_Cliente` FROM `cliente` WHERE `Nombre` = '$cliente'";
    $resultado_cliente = mysqli_query($conexion, $consulta_cliente);

    if ($resultado_cliente && mysqli_num_rows($resultado_cliente) > 0) {
        $fila_cliente = mysqli_fetch_assoc($resultado_cliente);
        $id_cliente = $fila_cliente['Id_Cliente'];

        $consulta = "INSERT INTO `venta`(`Productos`, `Cantidad`, `PrecioUnidad`, `PrecioTotal`, `PrecioTotalVenta`, `Fecha`, `Id_Cliente`) 
                     VALUES ('$productos', '$cantidad', '$precioUnidad', '$precioTotal', '$totalFactura', '$fecha', '$id_cliente')";

        $resultado = mysqli_query($conexion, $consulta);

        if ($resultado) {
            $mss = "Guardado correctamente";
            echo "<script> alert('" . $mss . "');
                  window.location.href = '../vistas/listas/listVentas.php';
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
?>
