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

<?php include('../listas/menuDashboard.php'); ?>


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
                        <button style="border: none;" type="submit">
                          <img class="icon-menu" src="../img/edit.svg" alt="Edit" />
                        </button>
                      </form>

                      <!-- <a href="../../controller/eliminar/?Id_Usuario=<?php echo $filas['Id_Usuario']; ?>">
                        <img 
                           class="icon-menu" src="../img/eliminar.png" alt="Eliminar usuario">
                      </a> -->
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