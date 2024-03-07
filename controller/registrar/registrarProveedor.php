<?php
include("../../models/conexion.php");

if (isset($_POST['Registrar'])) {
    $nombre = $_POST['nombre'];
    $telefono = $_POST['telefono'];
    $direccion = $_POST['direccion'];
    $correo = $_POST['correo'];
    $cantidadCompra = $_POST['cantidadCompra'];
    

    $consulta_existe = "SELECT * FROM `proveedor` WHERE `telefono` = '$telefono' OR  `correo`='$correo'";
    $resultado_existe = mysqli_query($conexion, $consulta_existe);
    if (mysqli_num_rows($resultado_existe) > 0) {
        $mss = "El telefono o correo ya está registrado";
        echo "<script> 
                alert('" . $mss . "');
                window.history.back();
             </script> ";
        exit;
    }

    $consulta = "INSERT INTO `proveedor`(`nombre`, `telefono`, `direccion`, `correo`,`cantidadCompra`) 
    VALUES ('$nombre','$telefono','$direccion','$correo','$cantidadCompra');";

    $resultado = mysqli_query($conexion, $consulta);

    if ($resultado) {
        $mss = "Guardado correctamente";
        echo "<script> alert('" . $mss . "');
        window.location.href = '../../vistas/listas/listProveedor.php';
        </script> ";
        exit;
    } else {
        $mss = "Error al guardar";
        echo "<script> alert('" . $mss . "');</script> ";
        include('../vistas/crear/proveedor.php');
    }
}
