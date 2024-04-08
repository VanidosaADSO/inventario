<!DOCTYPE html>
<html lang="en">
<?php
include('../controller/modificar/consulta.php');
?>


<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="../styles/dashboard.css">
  <style>
    #grafico {
      width: 500px !important;
      height: 350px !important;
    }

    #graficoProductos {
      width: 500px !important;
      height: 350px !important;
    }
  </style>
  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
  <title>Dashboard</title>
</head>

<body>
  <header class="header">

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

      <a class="content-link-menu" href="../vistas/listas/listCompras.php">
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
        <p class="text-ventas">Ventas mensuales:<?php foreach ($comprasMensuales as $mes => $cantidad) { ?>
          <?php echo $cantidad; ?>
        <?php } ?></p>
        <input type="range" class="range" id="rango" name="rango" value="Precio" min="15000" max="450000" />
        <p class="text-ventas">Ventas estimadas: <?php echo number_format($ventasEstimadas, 0, '', ','); ?></p>
      </div>

      <div class="mensuales">
        <p class="text-ventas">Ganancias mensuales:<?php foreach ($gananciasMensuales as $mes => $ganancias) { ?>
        <?php echo $ganancias ?>
        <?php } ?>
      </p>
        <input type="range" class="range" id="rango" name="rango" value="Precio" min="15000" max="450000" />
        <p class="text-ventas">Ganacias estimadas: <?php echo number_format($gananciasEstimadas, 0, '', ','); ?>$</p>
      </div>
    </div>

    <div class="contenedor-1">
      <div>
        <canvas id="grafico"></canvas>
      </div>

      <script>
        var ctx = document.getElementById('grafico').getContext('2d');

        var myChart = new Chart(ctx, {
          type: 'bar',
          data: {
            labels: <?php echo json_encode($meses); ?>,
            datasets: [{
              label: 'Ventas por Mes',
              data: <?php echo json_encode($ventas); ?>,
              backgroundColor: 'rgba(54, 162, 235, 0.5)',
              borderColor: 'rgba(54, 162, 235, 1)',
              borderWidth: 1
            }]
          },
          options: {
            scales: {
              y: {
                beginAtZero: true,
                min: 0,
                max: 400,
                ticks: {
                  stepSize: 50
                }
              }
            }
          }
        });
      </script>
    </div>

    <div class="contenedor-2">
      <h1>contendor 2</h1>
    </div>

    <div class="contenedor-3">
      <canvas id="graficoTorta"></canvas>
      <script>
        var ctxTorta = document.getElementById('graficoTorta').getContext('2d');
        var nombresClientes = <?php echo json_encode($nombresClientes); ?>;
        var porcentajesCompras = <?php echo json_encode($porcentajesCompras); ?>;
        var myPieChart = new Chart(ctxTorta, {
          type: 'pie',
          data: {
            labels: nombresClientes,
            datasets: [{
              data: porcentajesCompras,
              backgroundColor: [
                'rgba(255, 99, 132, 0.5)',
                'rgba(54, 162, 235, 0.5)',
                'rgba(255, 206, 86, 0.5)',
                'rgba(75, 192, 192, 0.5)',
                'rgba(153, 102, 255, 0.5)'
              ],
              borderColor: [
                'rgba(255, 99, 132, 1)',
                'rgba(54, 162, 235, 1)',
                'rgba(255, 206, 86, 1)',
                'rgba(75, 192, 192, 1)',
                'rgba(153, 102, 255, 1)'
              ],
              borderWidth: 1
            }]
          },
          options: {
            responsive: true,
            maintainAspectRatio: false,
            plugins: {
              legend: {
                position: 'top',
              },
              title: {
                display: true,
                text: 'Porcentaje de Compras por Cliente'
              }
            }
          }
        });
      </script>
    </div>

    <div class="contenedor-4">
      <h3>Productos que estan llegando a su StockMinimo:</h3>
      <canvas id="graficoProductos"></canvas>

      <script>
        var ctxProductos = document.getElementById('graficoProductos').getContext('2d');

        // Datos obtenidos de la consulta PHP
        var nombresProductos = <?php echo json_encode($nombresProductos); ?>;
        var cantidadProductos = <?php echo json_encode($cantidadProductos); ?>;
        var unidadesRestantes = <?php echo json_encode($unidadesRestantes); ?>;

        var myBarChart = new Chart(ctxProductos, {
          type: 'bar',
          data: {
            labels: nombresProductos,
            datasets: [{
                label: 'Cantidad Actual',
                data: cantidadProductos,
                backgroundColor: 'rgba(54, 162, 235, 0.5)',
                borderColor: 'rgba(54, 162, 235, 1)',
                borderWidth: 1
              },
              {
                label: 'Unidades Restantes para Stock Mínimo',
                data: unidadesRestantes,
                backgroundColor: 'rgba(255, 99, 132, 0.5)',
                borderColor: 'rgba(255, 99, 132, 1)',
                borderWidth: 1
              }
            ]
          },
          options: {
            scales: {
              y: {
                beginAtZero: true
              }
            }
          }
        });
      </script>
    </div>

  </div>

</body>

</html>