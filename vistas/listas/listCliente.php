<?php
include('../../models/conexion.php');

$registros_por_pagina = 5; 
$pagina_actual = isset($_GET['pagina']) ? $_GET['pagina'] : 1;
$inicio = ($pagina_actual - 1) * $registros_por_pagina;

// Consulta para obtener el total de registros
$total_registros_query = "SELECT COUNT(*) as total FROM cliente";
$total_registros_result = mysqli_query($conexion, $total_registros_query);
$total_registros = mysqli_fetch_assoc($total_registros_result)['total'];
$total_paginas = ceil($total_registros / $registros_por_pagina);

// Obtener el valor de búsqueda por cualquier campo
$nombre_busqueda = isset($_GET['buscar']) ? $_GET['buscar'] : '';

// Consulta para obtener los registros de la página actual con búsqueda general
$sql = "SELECT * FROM cliente 
        WHERE Nombre LIKE '%$nombre_busqueda%' OR Apellido LIKE '%$nombre_busqueda%' OR Documento LIKE '%$nombre_busqueda%' OR Direccion LIKE '%$nombre_busqueda%' 
        LIMIT $inicio, $registros_por_pagina";
$resultado = mysqli_query($conexion, $sql);
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="../../styles/listVentas.css">
  <title>ListUsuario</title>
</head>

<body>
  <?php include('../listas/menuDashboard.php'); ?>

  <div class="hola">
    <div class="contenedor">
      <h1 class="title">LISTA DE CLIENTES</h1>
      <div class="container-list">
        <div class="conten-search">
          <a class="link-registrar" href="../crear/cliente.php">Registrar cliente</a>

          <form id="form-buscar" method="GET" action="">
            <div class="container-input-search">
              <input class="input-buscar" name="buscar" id="buscar" type="text" placeholder="Buscar" value="<?php echo htmlspecialchars($nombre_busqueda); ?>" />
              <img class="search-icon" src="../img/search.svg" alt="" />
            </div>
          </form>
        </div>
        <div class="container-table">
          <div class="content-table">
            <table class="main-table">
              
              <thead>
                <tr>
                  <th class="th-style">ID</th>
                  <th class="th-style">Nombre</th>
                  <th class="th-style">Apellido</th>
                  <th class="th-style">Documento</th>
                  <th class="th-style">Correo</th>
                  <th class="th-style th-actions">Acciones</th>
                </tr>
              </thead>
              <tbody>
                <?php while ($filas = mysqli_fetch_array($resultado)) { ?>
                
                  <tr>
                    <td class="td-style"><?php echo $filas['Id_Cliente'] ?></td>
                    <td class="td-style"><?php echo $filas['Nombre'] ?></td>
                    <td class="td-style"><?php echo $filas['Apellido'] ?></td>
                    <td class="td-style"><?php echo $filas['Documento'] ?></td>
                    <td class="td-style"><?php echo $filas['Direccion'] ?></td>
                    <td class="td-style td-actions">
                      <form method="POST" action="../modificar/modificarCliente.php">
                        <input type="hidden" name="Id_Cliente" value="<?php echo $filas['Id_Cliente']; ?>">
                        <button style="border: none;" type="submit">
                          <img class="icon-menu" src="../img/edit.svg" alt="Edit" />
                        </button>
                      </form>
                      <a href="../../controller/eliminar/eliminarCliente.php?Id_Cliente=<?php echo $filas['Id_Cliente']; ?>">
                        <img class="icon-menu" src="../img/eliminar.png" alt="Eliminar usuario">
                      </a>
                    </td>
                  </tr>
                <?php } ?>
              </tbody>
            </table>
          </div>
          
          <!-- Paginación -->
          <div class="container-pagination-report">
            <div class="container-pagination">
              <div class="content-pagination">
                <a href="?pagina=1" class="item-pagination">&laquo;</a>
                <?php for ($i = 1; $i <= $total_paginas; $i++) { ?>
                  <a href="?pagina=<?php echo $i; ?>&buscar=<?php echo htmlspecialchars($nombre_busqueda); ?>" class="item-pagination <?php if ($pagina_actual == $i) echo 'active'; ?>"><?php echo $i; ?></a>
                <?php } ?>
                <a href="?pagina=<?php echo $total_paginas; ?>&buscar=<?php echo htmlspecialchars($nombre_busqueda); ?>" class="item-pagination">&raquo;</a>
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
