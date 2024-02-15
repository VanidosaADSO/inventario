<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="../styles/dashboard.css">
  <title>Dashboard</title>
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

      <a class="content-link-menu" href="../vistas/linstUsuario.php">
        <div class="content-icon-menu">
          <img class="icon-menu" src="../img/usuarios.png" alt="" />
        </div>
        <span class="text-menu">Administrador</span>
      </a>


      <a class="content-link-menu" href="#">
        <div class="content-icon-menu">
          <img class="icon-menu" src="../img/clientes.png" alt="" />
        </div>
        <span class="text-menu">Clientes</span>
      </a>

      <a class="content-link-menu" href="#">
        <div class="content-icon-menu ">
          <img class="icon-menu" src="../img/proveedor.png" alt="" />
        </div>
        <span class="text-menu">Proveedores</span>
      </a>

      <a class="content-link-menu" href="#">
        <div class="content-icon-menu ">
          <img class="icon-menu" src="../img/productos.png" alt="" />
        </div>
        <span class="text-menu">Productos</span>
      </a>
      <a class="content-link-menu" href="./listVentas.html">
        <div class="content-icon-menu">
          <img class="icon-menu" src="../img/ventas.png" alt="" />
        </div>
        <span class="text-menu">Ventas</span>
      </a>

    </div>

  </div>


  <div class="hola">

    <div class="contenedor-valores">
      <div class="mensuales">
        <p class="text-ventas">Ventas mensuales:</p>
        <input type="range" class="range" id="rango" name="rango" value="Precio" min="15000" max="450000" />
        <p class="text-ventas">Ventas estimadas: 3000</p>
        
      </div>
     
      <div class="mensuales">
        <p class="text-ventas">Ganacias mensuales:</p>
        <input type="range" class="range" id="rango" name="rango" value="Precio" min="15000" max="450000" />
        <p class="text-ventas">Ganacias estimadas: 54.350.000$</p>
      </div>
     
    </div>

    <div class="contenedor-1">
      <h1>contendor 1</h1>
    </div>

    <div class="contenedor-2">
      <h1>contendor 2</h1>
    </div>
    <div class="contenedor-3">
      <h1>contendor 3</h1>
    </div>

    <div class="contenedor-4">
      <h1>contendor 4</h1>
    </div>

  </div>

</body>

</html>