<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="../../styles/ventas.css">
  <title>Ventas</title>
</head>

<body>

<?php include('../listas/menuDashboard.php'); ?>


  <div class="hola">
    <div class="contenedor">
      <h1 class="title">REGISTRAR VENTA</h1>
      <div>
        <form onsubmit="return validarVenta()" action="../../controller/registrar/registrarVenta.php" method="post">
          <div class="container-fields">

            <div class="content-label-input">
              <label>Cliente:</label><br>
              <input class="input-registrar" type="text" id="cliente" name="cliente">
            </div>

            <div class="content-label-input">
              <label>Fecha:</label><br>
              <input class="input-registrar" type="date" id="fecha" name="fecha" max="<?php echo date('Y-m-d'); ?>" min="<?php echo date('Y-m-d', strtotime('-3 days')); ?>">
            </div>

            <div class="content-label-input">
              <label>Productos:</label><br>
              <input class="input-registrar" type="text" id="productos" name="productos">
            </div>

            <div class="content-label-input">
              <label>Cantidad:</label><br>
              <input class="input-registrar" type="number" id="cantidad" name="cantidad">
            </div>

            <div class="content-label-input">
              <label>Precio unidad:</label><br>
              <input class="input-registrar" type="number" id="precioUnidad" name="precioUnidad">
            </div>

            <div class="content-label-input">
              <label>Precio Total:</label><br>
              <input class="input-registrar" type="number" id="precioTotal" name="precioTotal">
            </div>

            <div class="content-label-input">
              <label>Total Factura:</label><br>
              <input class="input-registrar" type="number" id="totalFactura" name="totalFactura">
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
              " href="../listas/listVentas.php">Cancelar</a>

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
  <script src="../../controller/js/validarVentas.js"></script>
</body>

</html>