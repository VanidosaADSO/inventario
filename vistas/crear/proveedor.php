<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="../../styles/ventas.css">
  <title>Proveedor</title>
</head>

<body>

<?php include('../listas/menuDashboard.php'); ?>



  <div class="hola">
    <div class="contenedor">
      <h1 class="title">REGISTRAR PROVEEDOR</h1>
      <div>
        <form onsubmit="return validarProveedor()" action="../../controller/registrar/registrarProveedor.php" method="post">
          <div class="container-fields">

            <div class="content-label-input">
              <label>Nombre</label><br>
              <input class="input-registrar" type="text" id="nombre" name="nombre">
            </div>

            <div class="content-label-input">
              <label>Telefono</label><br>
              <input class="input-registrar" type="number" id="telefono" name="telefono">
            </div>

            <div class="content-label-input">
              <label>Direccion</label><br>
              <input class="input-registrar" type="text" id="direccion" name="direccion">
            </div>

            <div class="content-label-input">
              <label>Correo</label><br>
              <input class="input-registrar" type="email" id="correo" name="correo">
            </div>

          </div>
          <div class="container-button">
            <div className="content-button">
              <a style="                       
              text-decoration: none ;
              height: 34px ;
              padding: 9px 12px ;
              border-radius:5px;
              color: #ffffff ;
              background-color: #0AA3E1 ;
              border-top: 0px solid #dee2e6 ;
              border-bottom: 0px solid #dee2e6 ;
              border-left: 1px solid #dee2e6 ;
              border-right: 0px solid #dee2e6 ;
              " href="../listas/listProveedor.php">Cancelar</a>

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

              <!-- <button 
              id="btnRegistrar"
              class="general-button boton">
                Registrar
              </button> -->
              <input style="                       
              text-decoration: none ;
              height: 34px ;
              padding: 10px 12px ;
              border-radius:5px;
              color: #ffffff ;
              background-color: #41AF46 ;
              border-top: 0px solid #dee2e6 ;
              border-bottom: 0px solid #dee2e6 ;
              border-left: 1px solid #dee2e6 ;
              border-right: 0px solid #dee2e6 ;" type="submit" value="Registrar" id="btnRegistrar" name="Registrar" />
            </div>
          </div>
        </form>
      </div>
    </div>

  </div>

  <script src="../../controller/js/validarProveedor.js"></script>
</body>

</html>