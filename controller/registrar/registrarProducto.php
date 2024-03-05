<?php
include("../../models/conexion.php");

if (isset($_POST['Registrar'])) {
    $nombre = $_POST['nombre'];
    $precioCompra = $_POST['precioCompra'];
    $cantidad = $_POST['cantidad'];
    $precioVenta = $_POST['precioVenta'];
    $stockMinimo = $_POST['stockMinimo'];

    $consulta = "INSERT INTO `producto`(`nombre`, `precioCompra`, `cantidad`, `precioVenta`,`stockMinimo`) 
    VALUES ('$nombre','$precioCompra','$cantidad','$precioVenta','$stockMinimo');";

    $resultado = mysqli_query($conexion, $consulta);

    if ($resultado) {
        $mss = "Producto uardado correctamente";
        echo "<script> alert('" . $mss . "');
        window.location.href = '../../vistas/listas/listProductos.php';
        </script> ";
        exit;
    } else {
        $mss = "Error al guardar";
        echo "<script> alert('" . $mss . "');</script> ";
        include('../vistas/crear/productos.php');
    }
}
