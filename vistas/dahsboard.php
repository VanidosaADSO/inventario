<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="../styles/dashboard.css">
  <title>Dashboard</title>
</head>

<body>


<style>

.header {
  position: fixed;
  top: 0;
  left: 0;
  display: flex;
  justify-content: end;
  align-items: center;
  width: 100%;
  height: 60px;
  background-color: #41AF46;

  box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.281);
  z-index: 1;
}

.bars-icon {
  display: none;
  height: 28px;
  margin-top: 2px;
  margin-left: 25px;
  cursor: pointer;
  z-index: 1;
}

.logo-header {
  display: none;
  width: 100px;
}

.img-account {
  width: 40px;
  height: 40px;
  margin-right: 25px;
  cursor: pointer;
  z-index: 1;
}


/* .container {
  display: flex;
} */

.container-menu {
  background-color: #0AA3E1;
  height: 100vh;
  position: fixed;
  transition: all .3s;
  width: 210px;
  padding: 0;
  z-index: 2;
}




.content-logo {
  align-items: center;
  display: flex;
  height: 100px;
  justify-content: center;
  margin-top: 10px;
}


.logo-menu {
  color: black;
  height: 120px;
}

.menu {
  margin-top: 40px;
}


.content-link-menu {
  color: #e9e9e9;
  height: 60px;
  padding-left: 20px;
  text-decoration: none;
  display: flex;
  align-items: center;

  transition: all 0.5s ease-out;
  transition-timing-function: linear;
}

.content-link-menu:hover {
  background-color: #ffffff;
  /* background-color: #41AF46; */
}

.content-icon-menu {
  margin-left: 16px;
  width: 27px;
}

.icon-menu {
  width: 26px;
}


.content-img-menu {
  margin-left: 10px;
}

.img-menu {
  height: 20px;
}

.text-menu {
  color: black;
  font-size: 20px;
  margin-left: 5px;
}

.toggle-menu {
  display: none;
}


</style>
<header class="header"
>

  <div>
    <label for="menuToggle" class="bars-icon-customer">
      <img class="bars-icon" src="..//img/menuLateral.svg" alt="Menu icon" />
    </label>
  </div>
  <a href="../vistas/dahsboard.php">
    <img class="logo-header" src="../img/logo.png" alt="logo" />
  </a>

  <?php include '../vistas/listas/modal_content.php'; ?>

  <!-- Tu imagen que abrirá la ventana modal -->
  <img class="img-account" src="data:image/jpg;base64,<?php echo base64_encode($_SESSION['imagen']); ?>" alt="" />


  <!-- <script>
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
  </script> -->

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
        <img class="icon-menu" src="../vistas/img/compras.png" alt="" />
      </div>
      <span class="text-menu">Compras</span>
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
