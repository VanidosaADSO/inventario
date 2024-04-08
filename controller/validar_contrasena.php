<?php
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['contrasena'])) {

    include('../models/conexion.php');
    $contrasena = $_POST['contrasena'];
    $contrasena = mysqli_real_escape_string($conexion, $contrasena);
    $consulta = "SELECT * FROM usuario WHERE Contrasena='$contrasena'";
    $resultado = mysqli_query($conexion, $consulta);
    $filas = mysqli_num_rows($resultado);
    if ($filas) {
        include("../vistas/confiCuenta.php");
    } else {
        $mensaje = "Credenciales inválidas. Intente nuevamente";
        echo "<script>alert('$mensaje');</script>";
    }
    mysqli_free_result($resultado);
    mysqli_close($conexion);
}
?>
