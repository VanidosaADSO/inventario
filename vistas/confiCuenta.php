<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="../styles/confiCuenta.css">
  <title>Usuario</title>
</head>

<body>
  <div class="content-confi">
    <div class="contenedor-confi">
      <h1 class="title-confi">EDITAR PERFIL</h1>
      <div>
        <?php
        include('../models/conexion.php');

        session_start();
        if (!isset($_SESSION['Id_Usuario'])) {
          header('Location: ../vistas/index.php');
          exit();
        }

        $usuario_id = $_SESSION['Id_Usuario'];
        $sql = "SELECT * FROM usuario WHERE Id_Usuario = $usuario_id";
        $result = mysqli_query($conexion, $sql);

        if (!$result) {
          echo "Error al obtener los datos del usuario: " . mysqli_error($conexion);
          exit();
        }

        $usuario = mysqli_fetch_assoc($result);
        ?>

        <form method="post" action="../controller/modificar/modificarCuenta.php" enctype="multipart/form-data">
          <input type="hidden" name="Id_Usuario" value="<?php echo $usuario['Id_Usuario']; ?>" readonly>
          <div class="container-confi">
            <div class="content-label-input-confi">
              <label>ID:</label><br>
              <input class="input-registrar" type="text" id="Id_usuario" name="Id_usuario" value="<?php echo $usuario['Id_Usuario']; ?>" readonly>
            </div>
            <div class="content-label-input-confi">
              <label>Imagen</label><br>
              <img src="data:image/jpg;base64,<?php echo base64_encode($usuario['imagen']); ?>" alt="Imagen de perfil" width="100"><br>
              <input class="input-registrar" type="file" id="imagen" name="imagen">
            </div>
            <div class="content-label-input-confi">
              <label>Nombre</label><br>
              <input class="input-registrar" type="text" id="nombre" name="nombre" value="<?php echo $usuario['Nombre']; ?>">
            </div>
            <div class="content-label-input-confi">
              <label>Apellido</label><br>
              <input class="input-registrar" type="text" id="apellido" name="apellido" value="<?php echo $usuario['Apellido']; ?>">
            </div>
            <div class="content-label-input-confi">
              <label>Documento</label><br>
              <input class="input-registrar" type="number" id="documento" name="documento" value="<?php echo $usuario['Documento']; ?>">
            </div>
            <div class="content-label-input-confi">
              <label>Correo</label><br>
              <input class="input-registrar" type="email" id="correo" name="correo" value="<?php echo $usuario['Correo']; ?>">
            </div>
            <div class="content-label-input-confi">
              <label>Contraseña</label><br>
              <input class="input-registrar" type="password" id="contrasena" name="contrasena" value="<?php echo $usuario['Contrasena']; ?>">
            </div>
          </div>
          <div class="container-button">
            <div className="content-button">
              <a class="button-cancelar-confi" href="../vistas/dahsboard.php">Cancelar</a>
              <input style="                       
                                text-decoration: none ;
                                height: 34px ;
                                padding: 10px 12px ;
                                border-radius:5px;
                                color: #ffffff ;
                                background-color: red ;
                                border-top: 0px solid #dee2e6 ;
                                border-bottom: 0px solid #dee2e6 ;
                                border-left: 1px solid #dee2e6 ;
                                border-right: 0px solid #dee2e6 ;" type="reset" value="Limpiar" />
              <input class="general-button-confi" type="submit" value="Modificar" id="guardarcambios" name="guardarcambios" />
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
  <script src="../../controller/js/validarAdministrador.js"></script>
</body>

</html>