<?php
include('../../models/conexion.php');

if (isset($_POST['Id_Usuario'])) {
  $sqlid = $_POST['Id_Usuario'];
  $sql = "SELECT * FROM `usuario` WHERE Id_Usuario ='$sqlid'";
  $query = $conexion->query($sql);

  if ($query && $campo = $query->fetch_object()) {
    $Id_Usuario = $campo->Id_Usuario;
    $imagen = base64_encode($campo->imagen);
    $nombre = $campo->Nombre;
    $apellido = $campo->Apellido;
    $documento = $campo->Documento;
    $correo = $campo->Correo;
  } else {
    echo "No se encontraron datos para el usuario con ID $sqlid";
    exit();
  }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="../../styles/ventas.css">
  <title>Modificar usuario</title>
</head>

<body>
<?php include('../listas/menuDashboard.php'); ?>


  <div class="hola">
    <div class="contenedor">
      <h1 class="title">MODIFICAR USUARIO</h1>
      <div>
        <form method="post" action="" enctype="multipart/form-data">
          <input type="hidden" name="Id_Usuario" value="<?php echo $Id_Usuario; ?>">
          <div class="container-fields">

            <div class="content-label-input">
              <label>ID:</label><br>
              <input class="input-registrar" type="text" id="id" name="id" value="<?php echo @$Id_Usuario ?>" readonly>
            </div>

            <div class="content-label-input">
              <label>Imagen</label><br>
              <input class="input-registrar" type="file" id="imagen" name="imagen" value="<?php echo @$imagen ?>">
            </div>

            <div class="content-label-input">
              <label>Nombre:</label><br>
              <input class="input-registrar" type="text" id="nombre" name="nombre" value="<?php echo @$nombre ?>">
            </div>
            <div class="content-label-input">
              <label>Apellidos:</label><br>
              <input class="input-registrar" type="text" id="apellido" name="apellido" value="<?php echo @$apellido ?>">
            </div>
            <div class="content-label-input">
              <label>Documento:</label><br>
              <input class="input-registrar" type="text" id="documento" name="documento" value="<?php echo @$documento ?>">
            </div>
            <div class="content-label-input">
              <label>Correo:</label><br>
              <input class="input-registrar" type="text" id="correo" name="correo" value="<?php echo @$correo ?>">
            </div>
          </div>
          <div class="container-button">
            <div className="content-button">
              <a style="                       
              text-decoration: none ;
              height: 34px ;
              padding: 9px 12px ;
              border-radius:5px;
              color: #ffffff ;
              background-color: #0AA3E1 ;
              border-top: 0px solid #dee2e6 ;
              border-bottom: 0px solid #dee2e6 ;
              border-left: 1px solid #dee2e6 ;
              border-right: 0px solid #dee2e6 ;
              " href="../listas/listUsuario.php">Cancelar</a>

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

            
              <input style="                       
              text-decoration: none ;
              height: 34px ;
              padding: 10px 12px ;
              border-radius:5px;
              color: #ffffff ;
              background-color: #41AF46 ;
              border-top: 0px solid #dee2e6 ;
              border-bottom: 0px solid #dee2e6 ;
              border-left: 1px solid #dee2e6 ;
              border-right: 0px solid #dee2e6 ;" type="submit" value="Modificar" id="guardarcambios" name="guardarcambios" />
            </div>
          </div>
    
        </form>
      </div>
    </div>
  </div>
  <?php

  if (isset($_POST['guardarcambios'])) {

    $nombre = $_POST['nombre'];
    $apellido = $_POST['apellido'];
    $correo = $_POST['correo'];
    $documento = $_POST['documento'];
    $imagen = addslashes(file_get_contents($_FILES['imagen']['tmp_name']));


    $sql = "UPDATE `usuario` SET `Nombre`='$nombre',`Apellido`='$apellido',`Correo`='$correo' ,`Documento`='$documento' ,`imagen`='$imagen'
    WHERE Id_Usuario=$sqlid";

    $query = $conexion->query($sql);
    echo "<script>
    alert('Los cambios fueron guardados');  window.location = '../listas/listUsuario.php';</script>";
  }
  ?>
</body>

</html>