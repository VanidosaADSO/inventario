<?php
include("../../models/conexion.php");

if (isset($_POST['Registrar'])) {
    $nombre = $_POST['nombre'];
    $apellido = $_POST['apellido'];
    $documento = $_POST['documento'];
    $correo = $_POST['correo'];
    $contrasena = $_POST['contrasena'];
    $contrasenaEncryp = md5($contrasena);
    $imagen = addslashes(file_get_contents($_FILES['imagen']['tmp_name']));

    $consulta = "INSERT INTO `usuario`(`nombre`, `apellido`, `documento`, `correo`,`contrasena`, `imagen`) 
    VALUES ('$nombre','$apellido','$documento','$correo','$contrasenaEncryp', '$imagen');";

    $resultado = mysqli_query($conexion, $consulta);

    if ($resultado) {
        $mss = "Guardado correctamente";
        echo "<script> alert('" . $mss . "');
        window.location.href = '../../vistas/listas/listUsuario.php';
        </script> ";
        exit;
    } else {
        $mss = "Error al guardar";
        echo "<script> alert('" . $mss . "');</script> ";
        include('../vistas/crear/administrador.php');
    }
}
