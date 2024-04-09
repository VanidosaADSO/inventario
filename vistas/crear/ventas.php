<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="../../styles/ventas.css">
  <title>Ventas</title>
</head>

<body>

  <?php include('../listas/menuDashboard.php');

  include('../../models/conexion.php');
  $query = "SELECT Nombre FROM cliente";
  $resultado = mysqli_query($conexion, $query);

  ?>


  <div class="hola">
    <div class="contenedor">
      <h1 class="title">REGISTRAR VENTA</h1>
      <div>



        <form onsubmit="return validarVenta()" action="../../controller/registrar/registrarVenta.php" method="post">
          <div class="container-fields">

            <div class="content-label-input">
              <label>Fecha:</label><br>
              <input class="input-registrar" type="date" id="fecha" name="fecha" max="<?php echo date('Y-m-d'); ?>" min="<?php echo date('Y-m-d', strtotime('-3 days')); ?>">
            </div>

            <div class="content-label-input">
              <label>Cliente:</label><br>
              <input class="input-registrar" list="lista-clientes" id="cliente" name="cliente" oninput="buscarCliente(this.value)">
              <datalist id="lista-clientes">
                <?php while ($fila = mysqli_fetch_assoc($resultado)) : ?>
                  <option value="<?php echo htmlspecialchars($fila['Nombre']); ?>">
                  <?php endwhile; ?>
              </datalist>
            </div>

            <div class="content-label-input">
              <label>Total Factura:</label><br>
              <input class="input-registrar" type="number" id="totalFactura" name="totalFactura" readonly>
            </div>

            <input type="hidden" id="productosJson" name="productosJson">


          </div>

          <?php include '../crear/modalVenta.php'; ?>
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
                function showModal() {
                  document.getElementById('myModalCompra').style.display = 'block';
                }

                function hideModal() {
                  document.getElementById('myModalCompra').style.display = 'none';
                }
                document.getElementById('openModalBtn').addEventListener('click', showModal);

                var closeModalBtn = document.querySelector('#myModalCompra .close-button');
                closeModalBtn.addEventListener('click', hideModal);

                window.addEventListener('click', function(event) {
                  var modal = document.getElementById('myModalCompra');
                  if (event.target == modal) {
                    hideModal();
                  }
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
        </form>
      </div>
    </div>

  </div>
  <script src="../../controller/js/validarVentas.js"></script>
  <script src="../crear/modalVenta.php"></script>
</body>

</html>