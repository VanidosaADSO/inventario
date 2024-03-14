<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="../../styles/ventas.css">

  <title>Compras</title>
</head>

<body>

  <?php include('../listas/menuDashboard.php'); ?>


  <div class="hola">
    <div class="contenedor">
      <h1 class="title">REGISTRAR COMPRA</h1>
      <div>
        <form onsubmit="return validarCompra()" action="../../controller/registrar/registrarCompra.php" method="post">
          <div class="container-fields">

            <div class="content-label-input">
              <label>Fecha:</label><br>
              <input class="input-registrar" type="date" id="fecha" name="fecha" max="<?php echo date('Y-m-d'); ?>" min="<?php echo date('Y-m-d', strtotime('-3 days')); ?>">
            </div>

            <div class="content-label-input">
              <label>Proveedor:</label><br>
              <input class="input-registrar" type="text" id="proveedor" name="proveedor">
            </div>

            <div class="content-label-input">
              <label>Total Factura:</label><br>
              <input class="input-registrar" type="number" id="totalFactura" name="totalFactura">
            </div>

          </div>

          

          <?php include '../crear/modalCompra.php'; ?>
          <div class="container-button">
            <div class="content-button">
              <button id="openModalBtn" style="
                text-decoration: none;
                height: 34px;
                padding: 10px 12px;
                border-radius: 5px;
                margin-bottom: 10px;
                color: #ffffff;
                background-color: #41af46;
                border: 0px solid #dee2e6;
            " type="button">Agregar Producto</button>
            </div>
         
            <script>
              document.addEventListener('DOMContentLoaded', function() {            
                document.getElementById('openModalBtn').addEventListener('click', function() {            
                  document.getElementById('myModalCompra').style.display = 'block';
                });
            
                var closeModalBtn = document.querySelector('#myModalCompra .close-button');
                closeModalBtn.addEventListener('click', function() {             
                  document.getElementById('myModalCompra').style.display = 'none';
                });
              });
            </script>

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
              " href="../listas/listCompras.php">Cancelar</a>

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

  <script src="../../controller/js/validarCompra.js"></script>
  <script src="../crear/modalCompra.php"></script>

</body>

</html>