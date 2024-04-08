<?php
include("../../models/conexion.php");

if (isset($_POST['Registrar'])) {
    $nombre = $_POST['nombre'];
    $apellido = $_POST['apellido'];
    $documento = $_POST['documento'];
    $direccion = $_POST['direccion'];

    $consulta_documento = "SELECT * FROM `cliente` WHERE `documento` = '$documento'";
    $resultado_documento = mysqli_query($conexion, $consulta_documento);
    if (mysqli_num_rows($resultado_documento) > 0) {
        $mss = "El documento ya está registrado del cliente ya esta registrado";
        echo "<script> 
                alert('" . $mss . "');
                window.history.back();
             </script> ";
        exit;
    }

    $consulta = "INSERT INTO `cliente`(`nombre`, `apellido`, `documento`, `direccion`) 
    VALUES ('$nombre','$apellido','$documento','$direccion');";

    $resultado = mysqli_query($conexion, $consulta);

    if ($resultado) {
        $mss = "Guardado correctamente";
        echo "<script> alert('" . $mss . "');
        window.location.href = '../../vistas/listas/listCliente.php';
        </script> ";
        exit;
    } else {
        $mss = "Error al guardar";
        echo "<script> alert('" . $mss . "');</script> ";
        include('../vistas/crear/cliente.php');
    }
}


