<?php
include('../../models/conexion.php');
$registros_por_pagina = 5;
$pagina_actual = isset($_GET['pagina']) ? $_GET['pagina'] : 1;
$inicio = ($pagina_actual - 1) * $registros_por_pagina;
$total_registros_query = "SELECT COUNT(*) as total FROM usuario";
$total_registros_result = mysqli_query($conexion, $total_registros_query);
$total_registros = mysqli_fetch_assoc($total_registros_result)['total'];
$total_paginas = ceil($total_registros / $registros_por_pagina);
$sql = "SELECT * FROM producto LIMIT $inicio, $registros_por_pagina";
$resultado = mysqli_query($conexion, $sql);
?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="../../styles/listVentas.css">
  <title>ListProductos</title>
</head>

<body>

<?php include('../listas/menuDashboard.php'); ?>

  <div class="hola">
    <div class="contenedor">
      <h1 class="title">LISTA DE PRODUCTOS</h1>
      <div class="container-list">
        <div class="conten-search">
          <a class="link-registrar" href="../crear/productos.php">Registrar producto</a>

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
                  <th class="th-style">Nombre</th>
                  <th class="th-style ">Precio Compra</th>
                  <th class="th-style ">Cantidad</th>
                  <th class="th-style ">Precio Venta</th>
                  <th class="th-style ">Stock Minimo</th>
                  <th class="th-style th-actions">Acciones</th>
                </tr>
              </thead>
              <tbody>

                <?php
                $sql = "SELECT * FROM producto";
                $resultado = mysqli_query($conexion, $sql);

                while ($filas = mysqli_fetch_array($resultado)) {
                ?>
                  <tr>
                    <td class="td-style" label-item='Id'>
                      <?php echo $filas['Id_Producto'] ?>
                    </td>
                    <td class="td-style" label-item='Nombre'><?php echo $filas['Nombre'] ?></td>
                    <td class="td-style" label-item='PrecioCompra'><?php echo $filas['PrecioCompra'] ?></td>
                    <td class="td-style" label-item='Cantidad'><?php echo $filas['Cantidad'] ?></td>
                    <td class="td-style" label-item='PrecioVenta'><?php echo $filas['PrecioVenta'] ?></td>
                    <td class="td-style" label-item='StockMinimo'><?php echo $filas['StockMinimo'] ?></td>
                    <td class="td-style td-actions" label-item='Acciones'>
                      <form method="POST" action="../modificar/modificarProducto.php">
                        <input type="hidden" name="Id_Producto" value="<?php echo $filas['Id_Producto']; ?>">
                        <button style="border: none;" type="submit">
                          <img class="icon-menu" src="../img/edit.svg" alt="Edit" />
                        </button>
                      </form>
                      <a href="../../controller/eliminar/eliminarProducto.php?Id_Producto=<?php echo $filas['Id_Producto']; ?>" > 
                        <img 
                           class="icon-menu" src="../img/eliminar.png" alt="Eliminar usuario">
                      </a>
                    </a>
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
                <a href="?pagina=1" class="item-pagination">&laquo;</a>
                <?php for ($i = 1; $i <= $total_paginas; $i++) { ?>
                  <a href="?pagina=<?php echo $i; ?>" class="item-pagination <?php if ($pagina_actual == $i) echo 'active'; ?>"><?php echo $i; ?></a>
                <?php } ?>
                <a href="?pagina=<?php echo $total_paginas; ?>" class="item-pagination">&raquo;</a>
              </div>
            </div>
          </div>

        </div>
      </div>
    </div>

  </div>

</body>

</html>