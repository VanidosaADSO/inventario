<?php
include('../../models/conexion.php');
$registros_por_pagina = 5;
$pagina_actual = isset($_GET['pagina']) ? $_GET['pagina'] : 1;
$inicio = ($pagina_actual - 1) * $registros_por_pagina;
$total_registros_query = "SELECT COUNT(*) as total FROM usuario";
$total_registros_result = mysqli_query($conexion, $total_registros_query);
$total_registros = mysqli_fetch_assoc($total_registros_result)['total'];
$total_paginas = ceil($total_registros / $registros_por_pagina);


// Obtener el valor de búsqueda por cualquier campo
$busqueda_general = isset($_GET['buscar']) ? $_GET['buscar'] : '';
$sql = "SELECT * FROM usuario 
        WHERE Nombre LIKE '%$busqueda_general%' or Apellido LIKE '%$busqueda_general%' or Documento LIKE '%$busqueda_general%' or Correo LIKE '%$busqueda_general%' 
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
      <h1 class="title">LISTA DE USUARIOS</h1>
      <div class="container-list">
        <div class="conten-search">
          <a class="link-registrar" href="../crear/administrador.php">Registrar usuario</a>

          <form id="form-buscar" method="GET" action="">
            <div class="container-input-search">
              <input class="input-buscar" name="buscar" id="buscar" type="text" placeholder="Buscar" value="<?php echo htmlspecialchars($busqueda_general); ?>" />
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
                  <th class="th-style">Imagen</th>
                  <th class="th-style th-actions">Acciones</th>
                </tr>
              </thead>
              <tbody>
                <?php while ($filas = mysqli_fetch_array($resultado)) { ?>
                  <tr>
                    <td class="td-style" label-item='Id'><?php echo $filas['Id_Usuario'] ?></td>
                    <td class="td-style" label-item='Nombre'><?php echo $filas['Nombre'] ?></td>
                    <td class="td-style" label-item='Cantidad'><?php echo $filas['Apellido'] ?></td>
                    <td class="td-style" label-item='Documento'><?php echo $filas['Documento'] ?></td>
                    <td class="td-style" label-item='Correo'><?php echo $filas['Correo'] ?></td>
                    <td class="td-style" label-item='Nombre'><img src="data:image/jpg;base64,<?php echo base64_encode($filas['imagen']); ?>" alt="" height="36px"></td>
                    <td class="td-style td-actions" label-item='Acciones'>
                      <form method="POST" action="../modificar/modificarUsuario.php">
                        <input type="hidden" name="Id_Usuario" value="<?php echo $filas['Id_Usuario']; ?>">
                        <button style="border: none;" type="submit">
                          <img class="icon-menu" src="../img/edit.svg" alt="Edit" />
                        </button>
                      </form>

                      <a href="../../controller/eliminar/eliminarUsuario.php?Id_Usuario=<?php echo $filas['Id_Usuario']; ?>">
                        <img class="icon-menu" src="../img/eliminar.png" alt="Eliminar usuario">
                      </a>
                    </td>
                  </tr>
                <?php } ?>
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