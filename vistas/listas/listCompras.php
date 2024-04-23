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

<style>
  .btn {
    text-decoration: none;
    height: 34px;
    padding: 9px 12px;
    border-radius: 5px;
    color: #ffffff;
    background-color: #0AA3E1;
    border-top: 0px solid #dee2e6;
    border-bottom: 0px solid #dee2e6;
    border-left: 1px solid #dee2e6;
    border-right: 0px solid #dee2e6;
  }

  .modalProducto {
    display: none;
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background-color: rgba(0, 0, 0, 0.5);
    z-index: 1000;
    justify-content: center;
    align-items: center;
  }

  .modalProducto-content {
    background-color: #fff;
    padding: 20px;
    border-radius: 5px;
    box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.5);
    width: 450px;
    border-radius: 1px solid red;
  }

  .CloseModal {
    margin-left: 166px;
    margin-right: 166px;
  }

  .table-productos {
    width: 100%;
    border-collapse: collapse;
  }

  .table-productos th,
  .table-productos td {
    border: 1px solid #ddd;
    padding: 8px;
    text-align: left;
  }

  .table-productos th {
    background-color: #f2f2f2;
  }
</style>

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="../../styles/listVentas.css">
  <title>ListCompras</title>
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
                <?php while ($filas = mysqli_fetch_array($resultado)) {
                  $productos = json_decode($filas['Productos'], true);
                ?>
                  <tr>
                    <td class="td-style" label-item='Id'>
                      <?php echo $filas['Id_Compra'] ?>
                    </td>
                    <td class="td-style" label-item='Fecha'><?php echo $filas['Fecha'] ?></td>
                    <td class="td-style" label-item='Productos' style="text-align: center;">
                      <button type="button" class="btn" onclick="openModalProductos(<?php echo htmlspecialchars(json_encode($productos)); ?>)">Ver Productos</button>
                    </td>
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
                <?php } ?>
              </tbody>
            </table>
          </div>

          <!-- --------------------Modal--------------------------->
          <div id="myModalProducto" class="modalProducto">
            <div class="modalProducto-content">
              <h3 id="modalTitle" style="text-align: center;"></h3>
              <table id="productosTable" class="table-productos">
                <thead>
                  <tr>
                    <th>Nombre</th>
                    <th>Cantidad</th>
                    <th>Precio Unidad</th>
                    <th>Precio Venta</th>
                    <th>Stock Mínimo</th>
                  </tr>
                </thead>
                <tbody id="productosBody">
                  <!-- Aquí se llenarán dinámicamente los datos de los productos -->
                </tbody>
              </table>
              <button class="link-registrar CloseModal" onclick="closeModal()">Cerrar Modal</button>
            </div>
          </div>

          <!-- ---------------------PAGINADOR---------------------- -->

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
          location.href = formBuscar.getAttribute('action');

        }, 400);
      });
    });

    function openModalProductos(productos) {
      const modal = document.getElementById('myModalProducto');
      const modalTitle = document.getElementById('modalTitle');
      const tableBody = document.getElementById('productosBody');

      // Limpiar contenido previo
      tableBody.innerHTML = '';

      // Verificar si hay productos para mostrar
      if (productos && productos.length > 0) {
        modalTitle.textContent = 'PRODUCTOS REGISTRADOS';
        productos.forEach(producto => {
          const row = document.createElement('tr');
          row.innerHTML = `
                <td>${producto.nombre}</td>
                <td>${producto.cantidad}</td>
                <td>${producto.precioUnidad}</td>
                <td>${producto.precioVenta}</td>
                <td>${producto.stockMinimo}</td>
            `;
          tableBody.appendChild(row);
        });
      } else {
        modalTitle.textContent = 'No hay productos disponibles';
      }

      // Mostrar la modal
      modal.style.display = 'flex';
    }

    function closeModal() {
      document.getElementById('myModalProducto').style.display = 'none';
    }

    // Cerrar la modal si se hace clic fuera del contenido
    window.onclick = function(event) {
      var modal = document.getElementById('myModalProducto');
      if (event.target == modal) {
        modal.style.display = 'none';
      }
    }
  </script>

</body>

</html>