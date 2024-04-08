<?php
include('../models/conexion.php');

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

$conn = $conexion; // Assigning the database connection object to $conn
$sql = "SELECT MONTH(Fecha) AS Mes, COUNT(*) AS TotalVentas  FROM venta GROUP BY MONTH(Fecha)";

$result = $conn->query($sql);
$comprasMensuales = [];
if ($result->num_rows > 0) {
  // Output de datos de cada fila
  while ($row = $result->fetch_assoc()) {
    $comprasMensuales[$row["Mes"]] = $row["TotalVentas "];
  }
}

// Consulta para saber cuanto se a generado durante el mes
$conn = $conexion; 

$sql = "SELECT MONTH(Fecha) AS Mes, SUM(PrecioTotalVenta) AS TotalVentas 
        FROM venta 
        WHERE YEAR(Fecha) = YEAR(CURRENT_DATE) 
        GROUP BY MONTH(Fecha)";

$result = $conn->query($sql);
$gananciasMensuales = [];
if ($result->num_rows > 0) {
  // Recorrer los resultados de la consulta y almacenar los totales de ventas por mes
  while ($row = $result->fetch_assoc()) {
    $gananciasMensuales[$row["Mes"]] = $row["TotalVentas"];
  }
}
mysqli_close($conexion);
?>
