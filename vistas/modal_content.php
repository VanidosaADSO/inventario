<link rel="stylesheet" href="../styles/modal.css">

<div id="myModal" class="modal">
  <div class="container-modal-account">
    <div class="content-modal-account">

      <div class="container-user-info">
        <!-- <img class="image-modal-account" src="{perfil}" alt="" /> -->
        <img class="image-modal-account" src="data:image/jpg;base64,<?php echo base64_encode($_SESSION['imagen']); ?>" alt="">
        <span class="name-modal"><?php echo isset($_SESSION['Nombre']) ?></span>
        <span class="email-modal"><?php echo isset($_SESSION['Correo']) ?></span>
      </div>


      <div class="container-item-modal-account">
        <div class="content-item-modal-account">
          <img class="modal-account-icon" src="{settings}" alt="" />
          <a class="modal-account-link" href="/EditAccount">Configurar mi cuenta</a>
        </div>
      </div>

      <div class="container-item-modal-account">
        <div class="content-item-modal-account">
          <img class="modal-account-icon" src="{logout}" alt="" />

          <a class="modal-account-link" href="../controller/cerrarsession.php">Cerrar sesión</a>

        </div>
      </div>

      <div class="container-item-modal-account">
        <button class="close close-button" href="#">Cerrar modal</button>
      </div>
    </div>
  </div>
</div>