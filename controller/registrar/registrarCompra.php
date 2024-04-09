<?php
include("../../models/conexion.php");

if (isset($_POST['Registrar'])) {
    $fecha = $_POST['fecha'];
    $proveedor = $_POST['proveedor'];
    $totalFactura = $_POST['totalFactura'];
    $productosJson = $_POST['productosJson'];
    $productos = json_decode($productosJson, true);
    $productosJsonArray = json_encode($productos);
    echo "<script> 
            console.log('" . $productosJsonArray . "')
        </script> ";
    $consultaCompra = "INSERT INTO compra(Fecha, Proveedor, Total, Productos) VALUES (?, ?, ?, ?);";
    $stmtCompra = mysqli_prepare($conexion, $consultaCompra);
    mysqli_stmt_bind_param($stmtCompra, 'ssss', $fecha, $proveedor, $totalFactura, $productosJsonArray);

    $resultadoCompra = mysqli_stmt_execute($stmtCompra);

    if ($resultadoCompra) {

        foreach ($productos as $producto) {
            $nombre = $producto['nombre'];
            $precioUnidad = $producto['precioUnidad'];
            $cantidad = $producto['cantidad'];
            $precioVenta = $producto['precioVenta'];
            $stockMinimo = $producto['stockMinimo'];
            

            $sql_select = "SELECT * FROM producto WHERE Nombre = '$nombre'";
            $result = $conexion->query($sql_select);
            
            if ($result->num_rows > 0) {
                $row = $result->fetch_assoc();
                $cantidad_actual = $row['Cantidad'];
                $nueva_cantidad = $cantidad_actual + $cantidad;
                
                $sql_update = "UPDATE producto SET PrecioCompra = '$precioUnidad', Cantidad = '$nueva_cantidad', PrecioVenta = '$precioVenta', StockMinimo = '$stockMinimo' WHERE Nombre = '$nombre'";
                
                if ($conexion->query($sql_update) === TRUE) {
                    echo "<script>console.log('Producto $nombre actualizado correctamente')</script>";
                } else {
                    echo "<script>console.log('Error al actualizar producto $nombre: ". $conexion->error ."')</script>";
                }
            } else {
                $sql_insert = "INSERT INTO producto (Nombre, PrecioCompra, Cantidad, PrecioVenta, StockMinimo) 
                               VALUES ('$nombre', '$precioUnidad', '$cantidad', '$precioVenta', '$stockMinimo')";
                
                if ($conexion->query($sql_insert) === TRUE) {
                    echo "<script>console.log('Producto $nombre insertado correctamente')</script>";
                } else {
                    echo "<script>console.log('Error al insertar producto $nombre: ". $conexion->error ."')</script>";
                }
            }
        }

        $consultaUpdateProveedor = "UPDATE proveedor SET cantidadCompra = cantidadCompra + 1 WHERE Nombre = ?";
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