<?php
include('../../models/conexion.php');
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
                  <th class="th-style ">Apellido</th>
                  <th class="th-style ">Documento</th>
                  <th class="th-style ">Correo</th>
                  <th class="th-style th-actions">Acciones</th>
                </tr>
              </thead>
              <tbody>

                <?php
                $sql = "SELECT * FROM cliente ";
                $resultado = mysqli_query($conexion, $sql);

                while ($filas = mysqli_fetch_array($resultado)) {
                ?>
                  <tr>
                    <td class="td-style" label-item='Id'>
                      <?php echo $filas['Id_Cliente'] ?>
                    </td>
                    <td class="td-style" label-item='Nombre'><?php echo $filas['Nombre'] ?></td>
                    <td class="td-style" label-item='Cantidad'><?php echo $filas['Apellido'] ?></td>
                    <td class="td-style" label-item='Documento'><?php echo $filas['Documento'] ?></td>
                    <td class="td-style" label-item='Direccion'><?php echo $filas['Direccion'] ?></td>
                    <td class="td-style td-actions" label-item='Acciones'>
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