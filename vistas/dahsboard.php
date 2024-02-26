<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="../styles/dashboard.css">
  <title>Dashboard</title>
</head>

<body>

  <header class="header">

    <div>
      <label for="menuToggle" class="bars-icon-customer">
        <img class="bars-icon" src="../img/menuLateral.svg" alt="Menu icon" />
      </label>
    </div>
    <a href="../vistas/dahsboard.php">
      <img class="logo-header" src="../img/logo.png" alt="logo" />
    </a>

    <?php include 'modal_content.php'; ?>

    <!-- Tu imagen que abrirá la ventana modal -->
    <img class="img-account" src="../vistas/img/bugatti.jpg" alt="" />
    
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
      <a href="../vistas/dahsboard.php">
        <img class="logo-menu" src="../vistas/img/logo.png" alt="logo" />
      </a>
    </div>

    <div class="menu">
      <a class="content-link-menu" href="../vistas/dahsboard.php">
        <div class="content-icon-menu">
          <img class="icon-menu" src="../vistas/img/home.png" alt="" />
        </div>
        <span class="text-menu">Inicio</span>
      </a>

      <a class="content-link-menu" href="../vistas/listas/listUsuario.php">
        <div class="content-icon-menu">
          <img class="icon-menu" src="../vistas/img/usuarios.png" alt="" />
        </div>
        <span class="text-menu">Administrador</span>
      </a>


      <a class="content-link-menu" href="../vistas/listas/listCliente.php">
        <div class="content-icon-menu">
          <img class="icon-menu" src="../vistas/img/clientes.png" alt="" />
        </div>
        <span class="text-menu">Clientes</span>
      </a>

      <a class="content-link-menu" href="../vistas/listas/listProveedor.php">
        <div class="content-icon-menu ">
          <img class="icon-menu" src="../vistas/img/proveedor.png" alt="" />
        </div>
        <span class="text-menu">Proveedores</span>
      </a>

      <a class="content-link-menu" href="../vistas/listas/listProductos.php">
        <div class="content-icon-menu ">
          <img class="icon-menu" src="../vistas/img/productos.png" alt="" />
        </div>
        <span class="text-menu">Productos</span>
      </a>
      <a class="content-link-menu" href="../vistas/listas/listVentas.php">
        <div class="content-icon-menu">
          <img class="icon-menu" src="../vistas/img/ventas.png" alt="" />
        </div>
        <span class="text-menu">Ventas</span>
      </a>

    </div>

  </div>


  <div class="hola">

    <div class="contenedor-valores">
      <div class="mensuales">
        <p class="text-ventas">Ventas mensuales:</p>
        <input type="range" class="range" id="rango" name="rango" value="Precio" min="15000" max="450000" />
        <p class="text-ventas">Ventas estimadas: 3000</p>

      </div>

      <div class="mensuales">
        <p class="text-ventas">Ganacias mensuales:</p>
        <input type="range" class="range" id="rango" name="rango" value="Precio" min="15000" max="450000" />
        <p class="text-ventas">Ganacias estimadas: 54.350.000$</p>
      </div>

    </div>

    <div class="contenedor-1">
      <h1>contendor 1</h1>
    </div>

    <div class="contenedor-2">
      <h1>contendor 2</h1>
    </div>
    <div class="contenedor-3">
      <h1>contendor 3</h1>
    </div>

    <div class="contenedor-4">
      <h1>contendor 4</h1>
    </div>

  </div>

</body>

</html>