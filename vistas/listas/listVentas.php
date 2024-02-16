<?php
include('../../models/conexion.php');
?>



<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="../../styles/listVentas.css">
  <title>ListVentas</title>
</head>

<body>

  <header class="header">

    <div>
      <label for="menuToggle" class="bars-icon-customer">
        <img class="bars-icon" src="../img/menuLateral.svg" alt="Menu icon" />
      </label>
    </div>
    <a href="../dahsboard.php">
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
      <h1 class="title">LISTA DE VENTAS</h1>
      <div class="container-list">
        <div class="conten-search">
          <a class="link-registrar" href="../crear/ventas.php">Registrar venta</a>

          <div class="container-input-search">
            <input class="input-buscar" type="text" placeholder="Buscar..." />
            <img class="search-icon" src="../img/search.svg" alt="" />
          </div>
        </div>


        <div class="container-table">
          <div class="content-table">
            <table class="main-table">
              <thead>
                <tr>
                  <th class="th-style ">ID</th>
                  <th class="th-style">Productos</th>
                  <th class="th-style ">Cantidad</th>
                  <th class="th-style ">Precio Unidad</th>
                  <th class="th-style ">Precio Total</th>
                  <th class="th-style ">Precio Venta</th>
                  <th class="th-style ">Fecha</th>
                  <th class="th-style ">Cliente</th>
                  <th class="th-style th-actions">Acciones</th>
                </tr>
              </thead>
              <tbody>
                <?php
                $sql = "SELECT * FROM venta";
                $resultado = mysqli_query($conexion, $sql);

                while ($filas = mysqli_fetch_array($resultado)) {
                ?>
                  <tr>
                    <td class="td-style" label-item='Id'>
                      <?php echo $filas['Id_Venta'] ?>
                    </td>
                    <td class="td-style" label-item='Productos'><?php echo $filas['Productos'] ?></td>
                    <td class="td-style" label-item='Cantidad'><?php echo $filas['Cantidad'] ?></td>
                    <td class="td-style" label-item='Precio Unidad'><?php echo $filas['PrecioUnidad'] ?></td>
                    <td class="td-style" label-item='Precio Total'><?php echo $filas['PrecioTotal'] ?></td>
                    <td class="td-style" label-item='Precio Venta'><?php echo $filas['PrecioTotalVenta'] ?></td>
                    <td class="td-style" label-item='Fecha'><?php echo $filas['Fecha'] ?></td>
                    <td class="td-style" label-item='Cliente'><?php echo $filas['Id_Cliente'] ?></td>
                    <td class="td-style td-actions" label-item='Acciones'>
                      <form method="POST" action="../vistas/modificarUsuario.php">
                        <input type="hidden" name="Id_Venta" value="<?php echo $filas['Id_Venta']; ?>">
                        <input type="submit" value="Modificar">
                      </form>

                    </td>
                  </tr>
                <?php

                }
                ?>
              </tbody>
            </table>
          </div>

          <div class="container-pagination-report">
            <div class="container-pagination">
              <div class="content-pagination">

                <button class="item-pagination" type="button">
                  Anterior
                </button>


                <button type="button">
                  {pageNumber}



                  <button class="item-pagination" type="button">
                    Siguiente
                  </button>

                  <button class="item-pagination" type="button">
                    <img class="arrow-right-icon" src={last} alt="" />
                  </button>

              </div>
            </div>


          </div>

        </div>
      </div>
    </div>

  </div>

</body>

</html>