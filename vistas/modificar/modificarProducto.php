<?php
include('../../models/conexion.php');

if (isset($_POST['Id_Producto'])) {
  $sqlid = $_POST['Id_Producto'];
  $sql = "SELECT * FROM producto WHERE Id_Producto ='$sqlid'";
  $query = $conexion->query($sql);

  if ($query && $campo = $query->fetch_object()) {
    $Id_Producto = $campo->Id_Producto;
    $nombre = $campo->Nombre;
    $precioCompra = $campo->PrecioCompra;
    $cantidad = $campo->Cantidad;
    $precioVenta = $campo->PrecioVenta;
    $stockMinimo = $campo->StockMinimo;
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
  <title>Modificar producto</title>
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
      <h1 class="title">MODIFICAR PRODUCTO</h1>
      <div>
        <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
          <input type="hidden" name="Id_Producto" value="<?php echo $Id_Producto; ?>">
          <div class="container-fields">
            <div class="content-label-input">
              <label>ID:</label><br>
              <input class="input-registrar" type="text" id="Id_Producto" name="Id_Producto" value="<?php echo @$Id_Producto ?>" readonly>
            </div>
            <div class="content-label-input">
              <label>Nombre:</label><br>
              <input class="input-registrar" type="text" id="nombre" name="nombre" value="<?php echo @$nombre ?>">
            </div>
            <div class="content-label-input">
              <label>Precio Compra:</label><br>
              <input class="input-registrar" type="text" id="precioCompra" name="precioCompra" value="<?php echo @$precioCompra ?>">
            </div>
            <div class="content-label-input">
              <label>Cantidad:</label><br>
              <input class="input-registrar" type="text" id="cantidad" name="cantidad" value="<?php echo @$cantidad ?>">
            </div>
            <div class="content-label-input">
              <label>Precio Venta:</label><br>
              <input class="input-registrar" type="text" id="precioVenta" name="precioVenta" value="<?php echo @$precioVenta ?>">
            </div>
            <div class="content-label-input">
              <label>Stock Minimo:</label><br>
              <input class="input-registrar" type="text" id="stockMinimo" name="stockMinimo" value="<?php echo @$stockMinimo ?>">
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
    $Id_Producto = $_POST['Id_Producto'];
    $nombre = $_POST['nombre'];
    $precioCompra = $_POST['precioCompra'];
    $cantidad = $_POST['cantidad'];
    $precioVenta = $_POST['precioVenta'];
    $stockMinimo = $_POST['stockMinimo'];

    $sql = "UPDATE producto 
    SET Nombre=?, PrecioCompra=?, Cantidad=?, PrecioVenta=?, StockMinimo=?
    WHERE Id_Producto=?";
    $info = $conexion->prepare($sql);
    $info->bind_param("ssssii", $nombre, $precioCompra,$cantidad,$precioVenta,$stockMinimo, $Id_Producto);
    if ($info->execute()) {
      include("../listas/listProductos.php");
    } else {
      echo "Error al actualizar el usuario.";
    }
  }
  ?>
</body>

</html>