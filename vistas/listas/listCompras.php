<?php
include('../../models/conexion.php');
$registros_por_pagina = 5;
$pagina_actual = isset($_GET['pagina']) ? $_GET['pagina'] : 1;
$inicio = ($pagina_actual - 1) * $registros_por_pagina;
$total_registros_query = "SELECT COUNT(*) as total FROM compra";
$total_registros_result = mysqli_query($conexion, $total_registros_query);
$total_registros = mysqli_fetch_assoc($total_registros_result)['total'];
$total_paginas = ceil($total_registros / $registros_por_pagina);

// Obtener el valor de búsqueda por cualquier campo
$busqueda_general = isset($_GET['buscar']) ? $_GET['buscar'] : '';
$sql = "SELECT * FROM compra 
        WHERE Id_Compra LIKE '%$busqueda_general%' 
        OR Fecha LIKE '%$busqueda_general%' 
        OR Productos LIKE '%$busqueda_general%' 
        OR Proveedor LIKE '%$busqueda_general%' 
        OR Total LIKE '%$busqueda_general%' 
        LIMIT $inicio, $registros_por_pagina";
$resultado = mysqli_query($conexion, $sql);
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
    <h1 class="title">LISTA DE COMPRAS</h1>
    <div class="container-list">
      <div class="conten-search">
        <a class="link-registrar" href="../crear/compras.php">Registrar compra</a>

        <form id="form-buscar" method="GET" action="">
          <div class="container-input-search">
            <input class="input-buscar" name="buscar" id="buscar" type="text" placeholder="Buscar..." value="<?php echo htmlspecialchars($busqueda_general); ?>" />
            <img class="search-icon" src="../img/search.svg" alt="" />
          </div>
        </form>
      </div>


      <div class="container-table">
        <div class="content-table">
          <table class="main-table">
            <thead>
              <tr>
                <th class="th-style ">ID</th>
                <th class="th-style">Fecha</th>
                <th class="th-style ">Productos</th>
                <th class="th-style ">Proveedor</th>
                <th class="th-style ">Precio Total</th>

                <th class="th-style th-actions">Acciones</th>
              </tr>
            </thead>
            <tbody>
              <?php while ($filas = mysqli_fetch_array($resultado)) { ?>
                <tr>
                  <td class="td-style" label-item='Id'>
                    <?php echo $filas['Id_Compra'] ?>
                  </td>
                  <td class="td-style" label-item='Fecha'><?php echo $filas['Fecha'] ?></td>
                  <td class="td-style" label-item='Productos'><?php echo $filas['Productos'] ?></td>
                  <td class="td-style" label-item='Productos'><?php echo $filas['Proveedor'] ?></td>
                  <td class="td-style" label-item='Total '><?php echo number_format($filas['Total'], 0, '.', ',') ?></td>
                  <td class="td-style td-actions" label-item='Acciones'>
                    <form method="POST" action="../vistas/modificarUsuario.php">
                      <input type="hidden" name="Id_Compra" value="<?php echo $filas['Id_Compra']; ?>">
                      <button style="border: none;" type="submit">
                        <img class="icon-menu" src="../img/edit.svg" alt="Edit" />
                      </button>
                    </form>

                    <a href="../../controller/eliminar/eliminarCompra.php?Id_Compra=<?php echo $filas['Id_Compra']; ?>">
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

<script>
  document.addEventListener('DOMContentLoaded', function() {
    const formBuscar = document.getElementById('form-buscar');
    const inputBuscar = document.getElementById('buscar');

    let timeout = null;

    inputBuscar.addEventListener('input', function() {
      clearTimeout(timeout);
      timeout = setTimeout(function() {
        const valorBusqueda = inputBuscar.value.trim();
        formBuscar.setAttribute('action', `?buscar=${encodeURIComponent(valorBusqueda)}`);
        formBuscar.submit();
      }, 400);
    });
  });
</script>
</body>

</html>
