<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="../../styles/modal.css">
  <title>Configurar Cuenta</title>
</head>

<body>

  <?php
  if (session_status() == PHP_SESSION_NONE) {
    session_start();
  }

  if (isset($_SESSION['Nombre']) && isset($_SESSION['Correo']) && isset($_SESSION['imagen'])) {
    $nombre = $_SESSION['Nombre'];
    $correo = $_SESSION['Correo'];
    $imagen_base64 = $_SESSION['imagen'];
  }
  ?>

  <div id="myModal" class="modal" style="display: none;">
    <div class="container-modal-account">
      <div class="content-modal-account">

        <div class="container-user-info">
          <img class="image-modal-account" src="data:image/jpg;base64,<?php echo base64_encode($_SESSION['imagen']); ?>" alt="User Image" />
          <span class="name-modal"><?php echo $_SESSION['Nombre']; ?></span>
          <span class="email-modal"><?php echo $_SESSION['Correo']; ?></span>
        </div>

        <div class="container-item-modal-account">
          <div class="content-item-modal-account">
            <img class="modal-account-icon" src="{settings}" alt="" />
            <a class="modal-account-link" href="#">Configurar mi cuenta</a>
          </div>
          <div id="passwordForm" style="display: none;">
            <form id="passwordSubmitForm" action="../../controller/validar_contrasena.php" method="post">
              <label for="password">Ingrese su contraseña:</label>
              <input type="password" id="password" name="contrasena" required>
              <button type="submit">Enviar</button>
            </form>
          </div>

        </div>

        <div class="container-item-modal-account">
          <div class="content-item-modal-account">
            <img class="modal-account-icon" src="{logout}" alt="" />
            <a class="modal-account-link" href="../../controller/cerrarsession.php">Cerrar sesión</a>
          </div>
        </div>

        <div class="container-item-modal-account">
          <button class="close close-button" href="#">Cerrar modal</button>
        </div>

      </div>
    </div>
  </div>

  <script>
    document.addEventListener('DOMContentLoaded', function() {
      document.querySelector('.modal-account-link').addEventListener('click', function(event) {
        event.preventDefault();
        document.getElementById('passwordForm').style.display = 'block';
      });

      document.getElementById('passwordSubmitForm').addEventListener('submit', function(event) {
        event.preventDefault();
        let password = document.getElementById('password').value;
        this.submit(); 
      });
    });
  </script>

</body>

</html>