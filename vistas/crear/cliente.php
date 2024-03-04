<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="../../styles/ventas.css">
  <title>Cliente</title>
</head>

<body>

<?php include('../listas/menuDashboard.php'); ?>


  <div class="hola">
    <div class="contenedor">
      <h1 class="title">REGISTRAR CLIENTE</h1>
      <div>
        <form onsubmit="return validarCliente()" action="../../controller/registrar/registrarCliente.php" method="post">
          <div class="container-fields">

            <div class="content-label-input">
              <label>Nombre</label><br>
              <input class="input-registrar" type="text" id="nombre" name="nombre">
            </div>

            <div class="content-label-input">
              <label>Apellido</label><br>
              <input class="input-registrar" type="text" id="apellido" name="apellido">
            </div>

            <div class="content-label-input">
              <label>Documento</label><br>
              <input class="input-registrar" type="number" id="documento" name="documento">
            </div>

            <div class="content-label-input">
              <label>Direccion</label><br>
              <input class="input-registrar" type="text" id="direccion" name="direccion">
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
              " href="../listas/listCliente.php">Cancelar</a>

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

  <script src="../../controller/js/validarCliente.js"></script>

</body>

</html>