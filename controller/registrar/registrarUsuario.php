<?php
include("../../models/conexion.php");

if (isset($_POST['Registrar'])) {
    $nombre = $_POST['nombre'];
    $apellido = $_POST['apellido'];
    $documento = $_POST['documento'];
    $correo = $_POST['correo'];
    $contrasena = $_POST['contrasena'];
    // $contrasenaEncryp = md5($contrasena);
    $imagen = addslashes(file_get_contents($_FILES['imagen']['tmp_name']));

    $consulta_documento = "SELECT * FROM `usuario` WHERE `documento` = '$documento'";
    $resultado_documento = mysqli_query($conexion, $consulta_documento);
    if (mysqli_num_rows($resultado_documento) > 0) {
        $mss = "El documento ya está registrado";
        echo "<script> 
                alert('" . $mss . "');
                window.history.back();
             </script> ";
        exit;
    }


    $consulta_correo = "SELECT * FROM `usuario` WHERE `correo` = '$correo'";
    $resultado_correo = mysqli_query($conexion, $consulta_correo);
    if (mysqli_num_rows($resultado_correo) > 0) {
        $mss = "El correo electrónico ya está registrado";
        echo "<script> 
                alert('" . $mss . "');
                window.history.back();
             </script> ";
        exit;
    }

    $consulta_insertar = "INSERT INTO `usuario`(`nombre`, `apellido`, `documento`, `correo`,`contrasena`, `imagen`) 
    VALUES ('$nombre','$apellido','$documento','$correo','$contrasena', '$imagen');";

    $resultado_insertar = mysqli_query($conexion, $consulta_insertar);

    if ($resultado_insertar) {
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
?>
