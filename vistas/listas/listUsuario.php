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
      <h1 class="title">LISTA DE USUARIOS</h1>
      <div class="container-list">
        <div class="conten-search">
          <a class="link-registrar" href="../crear/administrador.php">Registrar usuario</a>

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
                  <th class="th-style ">Apellido</th>
                  <th class="th-style ">Documento</th>
                  <th class="th-style ">Correo</th>
                  <th class="th-style">Imagen</th>
                  <th class="th-style th-actions">Acciones</th>
                </tr>
              </thead>
              <tbody>

                <?php
                $sql = "SELECT * FROM usuario";
                $resultado = mysqli_query($conexion, $sql);

                while ($filas = mysqli_fetch_array($resultado)) {
                ?>
                  <tr>
                    <td class="td-style" label-item='Id'>
                      <?php echo $filas['Id_Usuario'] ?>
                    </td>
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