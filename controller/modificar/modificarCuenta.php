<?php
include('../../models/conexion.php');

if (isset($_POST['guardarcambios'])) {
  $nombre = $_POST['nombre'];
  $apellido = $_POST['apellido'];
  $documento = $_POST['documento'];
  $correo = $_POST['correo'];
  $contrasena = $_POST['contrasena'];
  $contrasenaEncryp = md5($contrasena);
  $usuario_id = $_POST['Id_usuario'];

  $imagen_query = "";
  if ($_FILES['imagen']['tmp_name'] != '') {
    $imagen = addslashes(file_get_contents($_FILES['imagen']['tmp_name']));
    $imagen_query = ", imagen = '$imagen'";
  }

  $consulta = "UPDATE `usuario` SET `nombre`='$nombre', `apellido`='$apellido', `documento`='$documento', `correo`='$correo', `contrasena`='$contrasenaEncryp' $imagen_query WHERE `Id_Usuario`='$usuario_id'";

  $update_result = mysqli_query($conexion, $consulta);

  if (!$update_result) {
    echo "Error al guardar los cambios: " . mysqli_error($conexion);
    exit();
  }

  // Destruir la sesión
  session_start();
  session_destroy();

  // Redireccionar al usuario al inicio de sesión
  echo "<script>
      alert('Los cambios fueron guardados');  
      window.location = '../../vistas/index.php';
    </script>";
}
?>
