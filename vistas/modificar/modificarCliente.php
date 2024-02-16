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

  <header class="header">

    <div>
      <label for="menuToggle" class="bars-icon-customer">
        <img class="bars-icon" src="../img/menuLateral.svg" alt="Menu icon" />
      </label>
    </div>
    <a href="../vistas/dahsboard.php">
      <img class="logo-header" src="../img/logo.png" alt="logo" />
    </a>

    <img class="img-account" src="../img/bugatti.jpg" alt="" />

  </header>

  <input type="checkbox" id="menuToggle" class="toggle-menu" />

  <div class="container-menu menuActive" id="menuToggle">

    <div class="content-logo">
      <a href="../vistas/dahsboard.php">
        <img class="logo-menu" src="../img/logo.png" alt="logo" />
      </a>
    </div>

    <div class="menu">
      <a class="content-link-menu" href="../vistas/dahsboard.php">
        <div class="content-icon-menu">
          <img class="icon-menu" src="../img/home.png" alt="" />
        </div>
        <span class="text-menu">Inicio</span>
      </a>

      <a class="content-link-menu" href="../listas/linstUsuario.php">
        <div class="content-icon-menu">
          <img class="icon-menu" src="../img/usuarios.png" alt="" />
        </div>
        <span class="text-menu">Administrador</span>
      </a>


      <a class="content-link-menu" href="../listas/listCliente.php">
        <div class="content-icon-menu">
          <img class="icon-menu" src="../img/clientes.png" alt="" />
        </div>
        <span class="text-menu">Clientes</span>
      </a>

      <a class="content-link-menu" href="../listas/listProveedor.php">
        <div class="content-icon-menu ">
          <img class="icon-menu" src="../img/proveedor.png" alt="" />
        </div>
        <span class="text-menu">Proveedores</span>
      </a>

      <a class="content-link-menu" href="../listas/listProductos.php">
        <div class="content-icon-menu ">
          <img class="icon-menu" src="../img/productos.png" alt="" />
        </div>
        <span class="text-menu">Productos</span>
      </a>
      <a class="content-link-menu" href="../listas/listCliente.php">
        <div class="content-icon-menu">
          <img class="icon-menu" src="../img/ventas.png" alt="" />
        </div>
        <span class="text-menu">Ventas</span>
      </a>

    </div>

  </div>

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
            <div class="content-button">
              <input class="general-button boton" name="guardarcambios" type="submit" value="Modificar" id="guardarcambios" />
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