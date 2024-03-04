<?php
include('../models/conexion.php');

if (isset($_POST['ingresar'])) {
    session_start();

    $documento = $_POST['documento'];
    $contrasena = $_POST['contrasena'];

    $consulta = "SELECT * FROM usuario WHERE Documento='$documento' and Contrasena='$contrasena'";
    $resultado = mysqli_query($conexion, $consulta);

    $filas = mysqli_num_rows($resultado);
    if ($filas) {
        $_SESSION['documento'] = $documento;

        // Obtener información adicional del usuario y almacenarla en las variables de sesión
        $usuario = mysqli_fetch_assoc($resultado);
        $_SESSION['Nombre'] = $usuario['Nombre'];
        $_SESSION['Correo'] = $usuario['Correo'];
        $_SESSION['imagen'] = $usuario['imagen'];

        include("../vistas/dahsboard.php");
    } else {
        include("../vistas/index.php");

        $mss = "Credenciales inválidas. Intente nuevamente";
        echo "<script> alert('".$mss."');</script> ";
    }

    mysqli_free_result($resultado);
    mysqli_close($conexion);
}
?>
