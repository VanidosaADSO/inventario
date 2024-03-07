<?php
include('../../models/conexion.php');

if (isset($_POST['Id_Proveedor'])) {
  $sqlid = $_POST['Id_Proveedor'];
  $sql = "SELECT * FROM proveedor WHERE Id_Proveedor ='$sqlid'";
  $query = $conexion->query($sql);

  if ($query && $campo = $query->fetch_object()) {
    $Id_Proveedor = $campo->Id_Proveedor;
    $nombre = $campo->Nombre;
    $telefono = $campo->Telefono;
    $direccion = $campo->Direccion;
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
  <title>Modificar cliente</title>
</head>

<body>

<?php include('../listas/menuDashboard.php'); ?>

  <div class="hola">
    <div class="contenedor">
      <h1 class="title">MODIFICAR CLIENTE</h1>
      <div>
        <form method="post" action="">
          <input type="hidden" name="Id_Proveedor" value="<?php echo $Id_Proveedor; ?>">
          <div class="container-fields">
            <div class="content-label-input">
              <label>ID:</label><br>
              <input class="input-registrar" type="text" id="id" name="id" value="<?php echo @$Id_Proveedor ?>" readonly>
            </div>
            <div class="content-label-input">
              <label>Nombre:</label><br>
              <input class="input-registrar" type="text" id="nombre" name="nombre" value="<?php echo @$nombre ?>">
            </div>
            <div class="content-label-input">
              <label>Telefono:</label><br>
              <input class="input-registrar" type="text" id="telefono" name="telefono" value="<?php echo @$telefono ?>">
            </div>
            <div class="content-label-input">
              <label>Dirección:</label><br>
              <input class="input-registrar" type="text" id="direccion" name="direccion" value="<?php echo @$direccion ?>">
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
              " href="../listas/listProveedor.php">Cancelar</a>

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
    $Id_Proveedor = $_POST['Id_Proveedor'];
    $nombre = $_POST['nombre'];
    $telefono = $_POST['telefono'];
    $direccion = $_POST['direccion'];
    $correo = $_POST['correo'];

    $sql = "UPDATE proveedor 
    SET Nombre=?, Telefono=?, Direccion=?, Correo=?
    WHERE Id_Proveedor=?";
    $info = $conexion->prepare($sql);
    $info->bind_param("ssssi", $nombre, $telefono, $direccion, $correo, $Id_Proveedor);
    if ($info->execute()) {
      include("../listas/listProveedor.php");
    } else {
      echo "Error al actualizar el usuario.";
    }
  }
  ?>
</body>

</html>