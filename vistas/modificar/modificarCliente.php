<?php
include('../../models/conexion.php');

if (isset($_POST['Id_Cliente'])) {
  $sqlid = $_POST['Id_Cliente'];
  $sql = "SELECT * FROM cliente WHERE Id_Cliente ='$sqlid'";
  $query = $conexion->query($sql);

  if ($query && $campo = $query->fetch_object()) {
    $Id_Cliente = $campo->Id_Cliente;
    $nombre = $campo->Nombre;
    $apellido = $campo->Apellido;
    $documento = $campo->Documento;
    $direccion = $campo->Direccion;
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
        <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
          <input type="hidden" name="Id_Cliente" value="<?php echo $Id_Cliente; ?>">
          <div class="container-fields">
            <div class="content-label-input">
              <label>ID:</label><br>
              <input class="input-registrar" type="text" id="id" name="id" value="<?php echo @$Id_Cliente ?>" readonly>
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
              <label>Dirección:</label><br>
              <input class="input-registrar" type="text" id="direccion" name="direccion" value="<?php echo @$direccion ?>">
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
              " href="../listas/listCliente.php">Cancelar</a>

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
    $Id_Cliente = $_POST['Id_Cliente'];
    $nombre = $_POST['nombre'];
    $apellido = $_POST['apellido'];
    $documento = $_POST['documento'];
    $direccion = $_POST['direccion'];

    $sql = "UPDATE cliente 
    SET Nombre=?, Apellido=?, Documento=?, Direccion=?
    WHERE Id_Cliente=?";
    $info = $conexion->prepare($sql);
    $info->bind_param("ssssi", $nombre, $apellido, $documento, $direccion, $Id_Cliente);
    if ($info->execute()) {
      include("../listas/listCliente.php");
    } else {
      echo "Error al actualizar el usuario.";
    }
  }
  ?>
</body>

</html>