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

      <a class="content-link-menu" href="../listas/listUsuario.php">
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
      <h1 class="title">MODIFICAR USUARIO</h1>
      <div>
        <form method="post" action="" enctype="multipart/form-data">
          <input type="hidden" name="Id_Usuario" value="<?php echo $Id_Usuario; ?>" >
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