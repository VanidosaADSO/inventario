<link rel="stylesheet" href="../../styles/menu.css">

<header class="header">

  <div>
    <label for="menuToggle" class="bars-icon-customer">
      <img class="bars-icon" src="../vistas/img/menuLateral.svg" alt="Menu icon" />
    </label>
  </div>
  <a href="../vistas/dahsboard.php">
    <img class="logo-header" src="../vistas/img/logo.png" alt="logo" />
  </a>

  <?php include '../listas/modal_content.php'; ?>

  <!-- Tu imagen que abrirá la ventana modal -->
  <img class="img-account" src="data:image/jpg;base64,<?php echo base64_encode($_SESSION['imagen']); ?>" alt="" />


  <script>
    document.addEventListener('DOMContentLoaded', function() {
      var imgAccount = document.querySelector('.img-account');
      var modal = document.getElementById('myModal');
      var closeModalBtn = modal.querySelector('.close');

      // Evento clic en la imagen para abrir la modal
      imgAccount.onclick = function() {
        modal.style.display = 'block';
      }

      closeModalBtn.onclick = function() {
        modal.style.display = 'none';
      }

      window.onclick = function(event) {
        if (event.target == modal) {
          modal.style.display = 'none';
        }
      }
    });
  </script>

</header>

<input type="checkbox" id="menuToggle" class="toggle-menu" />

<div class="container-menu menuActive" id="menuToggle">

  <div class="content-logo">
    <a href="../dahsboard.php">
      <img class="logo-menu" src="../img/logo.png" alt="logo" />
    </a>
  </div>

  <div class="menu">
    <a class="content-link-menu" href="../dahsboard.php">
      <div class="content-icon-menu">
        <img class="icon-menu" src="../img/home.png" alt="" />
      </div>
      <span class="text-menu">Inicio</span>
    </a>

    <a class="content-link-menu" href="../listas/listUsuario.php">
      <div class="content-icon-menu">
        <img class="icon-menu" src="../img/usuarios.png" alt="" />
      </div>
      <span class="text-menu">Administrador</span>
    </a>


    <a class="content-link-menu" href="../listas/listCliente.php">
      <div class="content-icon-menu">
        <img class="icon-menu" src="../img/clientes.png" alt="" />
      </div>
      <span class="text-menu">Clientes</span>
    </a>

    <a class="content-link-menu" href="../listas/listProveedor.php">
      <div class="content-icon-menu ">
        <img class="icon-menu" src="../img/proveedor.png" alt="" />
      </div>
      <span class="text-menu">Proveedores</span>
    </a>

    <a class="content-link-menu" href="../listas/listProductos.php">
      <div class="content-icon-menu ">
        <img class="icon-menu" src="../img/compras.png" alt="" />
      </div>
      <span class="text-menu">Compras</span>
    </a>

    <a class="content-link-menu" href="../listas/listProductos.php">
      <div class="content-icon-menu ">
        <img class="icon-menu" src="../img/productos.png" alt="" />
      </div>
      <span class="text-menu">Productos</span>
    </a>
    <a class="content-link-menu" href="../listas/listVentas.php">
      <div class="content-icon-menu">
        <img class="icon-menu" src="../img/ventas.png" alt="" />
      </div>
      <span class="text-menu">Ventas</span>
    </a>

  </div>

</div>