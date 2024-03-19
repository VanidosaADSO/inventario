<?php
include('../../models/conexion.php');
$registros_por_pagina = 5;
$pagina_actual = isset($_GET['pagina']) ? $_GET['pagina'] : 1;
$inicio = ($pagina_actual - 1) * $registros_por_pagina;
$total_registros_query = "SELECT COUNT(*) as total FROM usuario";
$total_registros_result = mysqli_query($conexion, $total_registros_query);
$total_registros = mysqli_fetch_assoc($total_registros_result)['total'];
$total_paginas = ceil($total_registros / $registros_por_pagina);
$sql = "SELECT * FROM proveedor LIMIT $inicio, $registros_por_pagina";
$resultado = mysqli_query($conexion, $sql);
?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="../../styles/listVentas.css">
  <title>ListProveedor</title>
</head>

<body>

<?php include('../listas/menuDashboard.php'); ?>

  <div class="hola">
    <div class="contenedor">
      <h1 class="title">LISTA DE PROVEEDOR</h1>
      <div class="container-list">
        <div class="conten-search">
          <a class="link-registrar" href="../crear/proveedor.php">Registrar proveedor</a>

          <div class="container-input-search">
            <input class="input-buscar" name="buscar" id="buscar" type="text" placeholder="Buscar..." />
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
                  <th class="th-style ">Telefono</th>
                  <th class="th-style ">Dirección</th>
                  <th class="th-style ">Correo</th>
                  <th class="th-style ">Cantidad Compras</th>
                  <th class="th-style th-actions">Acciones</th>
                </tr>
              </thead>
              <tbody>

                <?php
                $sql = "SELECT * FROM proveedor ";
                $resultado = mysqli_query($conexion, $sql);

                while ($filas = mysqli_fetch_array($resultado)) {
                ?>
                  <tr>
                    <td class="td-style" label-item='Id'>
                      <?php echo $filas['Id_Proveedor'] ?>
                    </td>
                    <td class="td-style" label-item='Nombre'><?php echo $filas['Nombre'] ?></td>
                    <td class="td-style" label-item='Cantidad'><?php echo $filas['Telefono'] ?></td>
                    <td class="td-style" label-item='Direccion'><?php echo $filas['Direccion'] ?></td>
                    <td class="td-style" label-item='Correo'><?php echo $filas['Correo'] ?></td>
                    <td class="td-style" label-item='cantidadCompra'><?php echo $filas['cantidadCompra'] ?></td>
                    <td class="td-style td-actions" label-item='Acciones'>
                      <form method="POST" action="../modificar/modificarProveedor.php">
                        <input type="hidden" name="Id_Proveedor" value="<?php echo $filas['Id_Proveedor']; ?>">
                        <button style="border: none;" type="submit">
                          <img class="icon-menu" src="../img/edit.svg" alt="Edit" />
                        </button>
                      </form>
                      <a href="../../controller/eliminar/eliminarProveedor.php?Id_Proveedor=<?php echo $filas['Id_Proveedor']; ?>">
                        <img class="icon-menu" src="../img/eliminar.png" alt="Eliminar usuario">
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