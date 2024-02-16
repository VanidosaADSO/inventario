<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="../../styles/ventas.css">
  <title>Ventas</title>
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
      <a href="../dahsboard.php">
        <img class="logo-menu" src="../img/logo.png" alt="logo" />
      </a>
    </div>

    <div class="menu">
      <a class="content-link-menu" href="../dahsboard.php">
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
      <a class="content-link-menu" href="../listas/listVentas.php">
        <div class="content-icon-menu">
          <img class="icon-menu" src="../img/ventas.png" alt="" />
        </div>
        <span class="text-menu">Ventas</span>
      </a>

    </div>

  </div>

  <div class="hola">
    <div class="contenedor">
      <h1 class="title">REGISTRAR VENTA</h1>
      <div>
        <form action="formulario">
          <div class="container-fields">

            <div class="content-label-input">
              <label>Cliente:</label><br>
              <input class="input-registrar" type="text" id="cliente" name="cliente">
            </div>

            <div class="content-label-input">
              <label>Fecha:</label><br>
              <input class="input-registrar" type="date" id="fecha" name="fecha">
            </div>

            <div class="content-label-input">
              <label>Productos:</label><br>
              <input class="input-registrar" type="text" id="productos" name="productos">
            </div>

            <div class="content-label-input">
              <label>Cantidad:</label><br>
              <input class="input-registrar" type="number" id="cantidad" name="cantidad">
            </div>

            <div class="content-label-input">
              <label>Precio unidad:</label><br>
              <input class="input-registrar" type="number" id="preU" name="preU">
            </div>

            <div class="content-label-input">
              <label>Precio Total:</label><br>
              <input class="input-registrar" type="number" id="preT" name="preT">
            </div>

            <div class="content-label-input">
              <label>Total Factura:</label><br>
              <input class="input-registrar" type="number" id="totalfactura" name="totalfactura">
            </div>
          </div>
          <div class="container-button">
            <div className="content-button">
              <input type="submit" className="general-button cancel-button" value="Cancelar" />
              <input className="general-button clean-button" type="reset" value="Limpiar" />

              <!-- <button 
              id="btnRegistrar"
              class="general-button boton">
                Registrar
              </button> -->
              <input className="general-button submit-button" type="submit" value="Registrar" id="btnRegistrar" />
            </div>
          </div>
        </form>
      </div>
    </div>

  </div>

</body>

</html>