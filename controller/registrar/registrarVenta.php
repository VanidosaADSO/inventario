<?php
include("../../models/conexion.php");

if (isset($_POST['Registrar'])) {
    $cliente = $_POST['cliente'];
    $fecha = $_POST['fecha'];
    $totalFactura = $_POST['totalFactura'];
    $productosJson = $_POST['productosJson'];
    $productos = json_decode($productosJson, true);
    $productosJsonArray = json_encode($productos);

    // Iniciar la transacción
    mysqli_begin_transaction($conexion);

    // Obtener el ID del cliente
    $consulta_cliente = "SELECT Id_Cliente FROM cliente WHERE Nombre = '$cliente'";
    $resultado_cliente = mysqli_query($conexion, $consulta_cliente);

    if ($resultado_cliente && mysqli_num_rows($resultado_cliente) > 0) {
        $fila_cliente = mysqli_fetch_assoc($resultado_cliente);
        $id_cliente = $fila_cliente['Id_Cliente'];

        // Insertar la venta
        $consultaVenta = "INSERT INTO venta(Productos, PrecioTotalVenta, Fecha, Id_Cliente) VALUES (?, ?, ?, ?);";
        $stmtVenta = mysqli_prepare($conexion, $consultaVenta);
        mysqli_stmt_bind_param($stmtVenta, 'ssss', $productosJsonArray, $totalFactura, $fecha, $id_cliente);

        $resultadoVenta = mysqli_stmt_execute($stmtVenta);

        if ($resultadoVenta) {
            // Actualizar las cantidades de los productos
            foreach ($productos as $producto) {
                $nombre_producto = $producto['nombre'];
                $cantidad_vendida = $producto['cantidad'];

                // Obtener el producto por su nombre
                $consultaProducto = "SELECT Id_Producto, Cantidad FROM producto WHERE Nombre = '$nombre_producto'";
                $resultadoProducto = mysqli_query($conexion, $consultaProducto);

                if ($resultadoProducto && mysqli_num_rows($resultadoProducto) > 0) {
                    $fila_producto = mysqli_fetch_assoc($resultadoProducto);
                    $id_producto = $fila_producto['Id_Producto'];
                    $cantidad_actual = $fila_producto['Cantidad'];

                    // Actualizar la cantidad disponible del producto
                    $cantidad_actual -= $cantidad_vendida;
                    $consultaActualizarProducto = "UPDATE producto SET Cantidad = $cantidad_actual WHERE Id_Producto = $id_producto";
                    mysqli_query($conexion, $consultaActualizarProducto);
                }
            }

            // Confirmar la transacción
            mysqli_commit($conexion);

            $mss = "Guardado correctamente";
            echo "<script> alert('" . $mss . "');
                  window.location.href = '../../vistas/listas/listVentas.php';
                  </script> ";
            exit;
        } else {
            // Cancelar la transacción en caso de error
            mysqli_rollback($conexion);

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