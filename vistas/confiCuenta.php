<?php
include('../models/conexion.php');

session_start();
if (!isset($_SESSION['Id_Usuario'])) {
  header('Location: ../vistas/index.php');
  exit();
}

$usuario_id = $_SESSION['Id_Usuario'];
$sql = "SELECT * FROM usuario WHERE Id_Usuario = $usuario_id";
$result = mysqli_query($conexion, $sql);

if (!$result) {
  echo "Error al obtener los datos del usuario: " . mysqli_error($conexion);
  exit();
}

$usuario = mysqli_fetch_assoc($result);

if (isset($_POST['guardarcambios'])) {
  $nombre = $_POST['nombre'];
  $apellido = $_POST['apellido'];
  $documento = $_POST['documento'];
  $correo = $_POST['correo'];

  if ($_FILES['imagen']['tmp_name'] != '') {
    $imagen = addslashes(file_get_contents($_FILES['imagen']['tmp_name']));
    $imagen_query = ", imagen = '$imagen'";
  } else {
    $imagen_query = "";
  }

  $update_sql = "UPDATE usuario SET Nombre = '$nombre', Apellido = '$apellido', Documento = $documento, Correo = '$correo' $imagen_query WHERE Id_Usuario = $usuario_id";
  $update_result = mysqli_query($conexion, $update_sql);

  if (!$update_result) {
    echo "Error al guardar los cambios: " . mysqli_error($conexion);
    exit();
  }

   $query = $conexion->query($sql);
   echo "<script>
   alert('Los cambios fueron guardados');  window.location = '../vistas/listas/listUsuario.php';</script>";
}

mysqli_close($conexion);
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="../styles/confiCuenta.css">
  <title>Usuario</title>
</head>

<body>
  <div class="content-confi">
    <div class="contenedor-confi">
      <h1 class="title-confi">EDITAR PERFIL</h1>
      <div>
        <form method="post" action="" enctype="multipart/form-data">
          <input type="hidden" name="Id_Usuario" value="<?php echo $Id_Usuario; ?>" readonly>
          <div class="container-confi">

            <div class="content-label-input-confi">
              <label>ID:</label><br>
              <input class="input-registrar" type="text" id="id" name="id" value="<?php echo isset($usuario['Id_Usuario']) ? $usuario['Id_Usuario'] : ''; ?>" readonly>
            </div>

            <div class="content-label-input-confi">
              <label>Imagen</label><br>

              <img src="data:image/jpg;base64,<?php echo base64_encode($usuario['imagen']); ?>" alt="Imagen de perfil" width="100"><br>
              <input class="input-registrar" type="file" id="imagen" name="imagen">
            </div>

            <div class="content-label-input-confi">
              <label>Nombre</label><br>
              <input class="input-registrar" type="text" id="nombre" name="nombre" value="<?php echo isset($usuario['Nombre']) ? $usuario['Nombre'] : ''; ?>">

            </div>
            <div class="content-label-input-confi">
              <label>Apellido</label><br>
              <input class="input-registrar" type="text" id="apellido" name="apellido" value="<?php echo isset($usuario['Apellido']) ? $usuario['Apellido'] : ''; ?>">
            </div>
            <div class="content-label-input-confi">
              <label>Documento</label><br>
              <input class="input-registrar" type="number" id="documento" name="documento" value="<?php echo isset($usuario['Documento']) ? $usuario['Documento'] : ''; ?>">
            </div>
            <div class="content-label-input-confi">
              <label>Correo</label><br>
              <input class="input-registrar" type="email" id="correo" name="correo" value="<?php echo isset($usuario['Correo']) ? $usuario['Correo'] : ''; ?>">
            </div>

          </div>
          <div class="container-button">
            <div className="content-button">
              <a class="button-cancelar-confi"
               href="../listas/listUsuario.php">Cancelar</a>

              <input style="                       
              text-decoration: none ;
              height: 34px ;
              padding: 10px 12px ;
              border-radius:5px;
              color: #ffffff ;
              background-color: red ;
              border-top: 0px solid #dee2e6 ;
              border-bottom: 0px solid #dee2e6 ;
              border-left: 1px solid #dee2e6 ;
              border-right: 0px solid #dee2e6 ;" type="reset" value="Limpiar" />


              <input class="general-button-confi" type="submit" value="Modificar" id="guardarcambios" name="guardarcambios" />
            </div>
          </div>

        </form>

      </div>
    </div>
  </div>
  <script src="../../controller/js/validarAdministrador.js"></script>

</body>

</html>