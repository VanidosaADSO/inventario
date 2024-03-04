<?php
include("../../models/conexion.php");

if (isset($_POST['Registrar'])) {
    $nombre = $_POST['nombre'];
    $apellido = $_POST['apellido'];
    $documento = $_POST['documento'];
    $direccion = $_POST['direccion'];

    $consulta = "INSERT INTO `cliente`(`nombre`, `apellido`, `documento`, `direccion`) 
    VALUES ('$nombre','$apellido','$documento','$direccion');";

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


