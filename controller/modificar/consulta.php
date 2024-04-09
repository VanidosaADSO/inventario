<?php
include('../models/conexion.php');


// ------------------------------------------------------------------------------
// Consulta para hacer la grafica del total de ventas mes a mes
$query = "SELECT MONTH(Fecha) AS Mes, SUM(PrecioTotalVenta) AS TotalVentas 
            FROM venta 
            WHERE YEAR(Fecha) = YEAR(CURRENT_DATE) 
            GROUP BY MONTH(Fecha)";
$resultado = mysqli_query($conexion, $query);

$datos_grafica = [];
while ($fila = mysqli_fetch_assoc($resultado)) {
  $mes = date('F', mktime(0, 0, 0, $fila['Mes'], 1));
  $total_ventas = $fila['TotalVentas'];
  $datos_grafica[$mes] = $total_ventas;
}

$meses = array_keys($datos_grafica);
$ventas = array_values($datos_grafica);


// ------------------------------------------------------------------------------
// Consulta para hacer la grafica pare ver los productos mas vendidos en el mes
$sql = "SELECT JSON_UNQUOTE(JSON_EXTRACT(Productos, '$[*].nombre')) AS nombre_producto, 
JSON_UNQUOTE(JSON_EXTRACT(Productos, '$[*].cantidad')) AS cantidad
FROM venta";

$resultado = $conexion->query($sql);

$productos_mas_vendidos = array();

if ($resultado->num_rows > 0) {
  while ($fila = $resultado->fetch_assoc()) {
    $productos = json_decode($fila['nombre_producto']);
    $cantidades = json_decode($fila['cantidad']);

    foreach ($productos as $key => $producto) {
      $cantidad = $cantidades[$key];

      if (array_key_exists($producto, $productos_mas_vendidos)) {
        $productos_mas_vendidos[$producto] += $cantidad;
      } else {
        $productos_mas_vendidos[$producto] = $cantidad;
      }
    }
  }
}

arsort($productos_mas_vendidos);
$productos_mas_vendidos = array_slice($productos_mas_vendidos, 0, 5, true);

// ------------------------------------------------------------------------------
// Consulta para hacer la grafica de los clientes con mas compras
$query = "SELECT Nombre, compras
            FROM cliente
            ORDER BY compras DESC
            LIMIT 5";
$resultado = mysqli_query($conexion, $query);

$nombresClientes = [];
$comprasClientes = [];
$totalCompras = 0;

while ($fila = mysqli_fetch_assoc($resultado)) {
  $nombresClientes[] = $fila['Nombre'];
  $comprasClientes[] = $fila['compras'];
  $totalCompras += $fila['compras'];
}

$porcentajesCompras = [];
foreach ($comprasClientes as $compras) {
  $porcentaje = ($compras / $totalCompras) * 100;
  $porcentajesCompras[] = round($porcentaje, 2);
}


// ------------------------------------------------------------------------------
// Consulta para obtener los productos que están llegando al stock mínimo
$queryStockMinimo = "SELECT Nombre, Cantidad, StockMinimo 
                     FROM producto 
                     WHERE (Cantidad - StockMinimo) <= 10 OR Cantidad = StockMinimo
                     ORDER BY (Cantidad - StockMinimo) ASC 
                     LIMIT 5";
$resultadoStockMinimo = mysqli_query($conexion, $queryStockMinimo);

$nombresProductos = [];
$cantidadProductos = [];
$unidadesRestantes = [];

while ($fila = mysqli_fetch_assoc($resultadoStockMinimo)) {
  $nombresProductos[] = $fila['Nombre'];
  $cantidadProductos[] = $fila['Cantidad'];
  $unidadesRestantes[] = $fila['Cantidad'] - $fila['StockMinimo'];
}

// Consulta para obtener los valores de ventasEstimadas y gananciasEstimadas
$consulta_valores = "SELECT ventasEstimadas, gananciasEstimadas FROM mesventa WHERE Id_MesVenta = 1";
$resultado_valores = mysqli_query($conexion, $consulta_valores);

if ($resultado_valores) {
  $fila = mysqli_fetch_assoc($resultado_valores);
  $ventasEstimadas = $fila['ventasEstimadas'];
  $gananciasEstimadas = $fila['gananciasEstimadas'];
} else {
  $ventasEstimadas = 0;
  $gananciasEstimadas = 0;
}


// -------------------------------------------------------------------------------------------------------
// Consulta para saber cuantas ventas se hicieron en un mes
$conn = $conexion;
$sql = "SELECT MONTH(Fecha) AS Mes, COUNT(*) AS TotalVentas FROM venta GROUP BY MONTH(Fecha)";

$result = $conn->query($sql);
$ventasMensuales = [];
if ($result->num_rows > 0) {
  // Almacenar los datos de cada fila en $ventasMensuales
  while ($row = $result->fetch_assoc()) {
    $ventasMensuales[$row["Mes"]] = $row["TotalVentas"];
  }
}


// -------------------------------------------------------------------------------------------------------
// Consulta para saber cuanto se a generado durante el mes
$conn = $conexion;

$sql = "SELECT MONTH(Fecha) AS Mes, SUM(PrecioTotalVenta) AS TotalVentas 
        FROM venta 
        WHERE YEAR(Fecha) = YEAR(CURRENT_DATE) 
        GROUP BY MONTH(Fecha)";

$result = $conn->query($sql);
$gananciasMensuales = [];
if ($result->num_rows > 0) {

  while ($row = $result->fetch_assoc()) {
    $gananciasMensuales[$row["Mes"]] = $row["TotalVentas"];
  }
}
mysqli_close($conexion);
