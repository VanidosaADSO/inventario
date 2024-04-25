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
$mes_actual = date('m');
$año_actual = date('Y');

$sql = "SELECT JSON_UNQUOTE(JSON_EXTRACT(Productos, '$[*].nombre')) AS nombre_producto, 
                JSON_UNQUOTE(JSON_EXTRACT(Productos, '$[*].cantidad')) AS cantidad
        FROM venta
        WHERE MONTH(Fecha) = $mes_actual
        AND YEAR(Fecha) = $año_actual";

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
// Consulta para hacer la grafica de los clientes con mas compras
$queryClientes = "SELECT c.Nombre AS NombreCliente,
    COUNT(v.Id_Venta) AS TotalCompras,
    (COUNT(v.Id_Venta) / (SELECT COUNT(*) FROM venta)) * 100 AS PorcentajeCompras
    FROM venta v
    INNER JOIN cliente c ON v.Id_Cliente = c.Id_Cliente
    GROUP BY v.Id_Cliente
    ORDER BY TotalCompras DESC
    LIMIT 5";

$resultadoClientes = mysqli_query($conexion, $queryClientes);

$nombresClientes = [];
$porcentajesCompras = [];

while ($fila = mysqli_fetch_assoc($resultadoClientes)) {
    $nombresClientes[] = $fila['NombreCliente'];
    $porcentajesCompras[] = $fila['PorcentajeCompras'];
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
$conn = $conexion; // Suponiendo que $conexion ya está definido previamente
$mes_actual = date('m');
$año_actual = date('Y');
$sql = "SELECT MONTH(Fecha) AS Mes, COUNT(*) AS TotalVentas 
        FROM venta 
        WHERE YEAR(Fecha) = $año_actual 
        AND MONTH(Fecha) = $mes_actual"; // Falta un paréntesis de cierre en el SQL

$result = $conn->query($sql);
$ventasMensuales = [];
if ($result->num_rows > 0) {
  while ($row = $result->fetch_assoc()) {
    $ventasMensuales[$row["Mes"]] = $row["TotalVentas"];
  }
}


// -------------------------------------------------------------------------------------------------------
// Consulta para saber cuanto se a generado durante el mes

$conn = $conexion;
$mes_actual = date('m');
$año_actual = date('Y');

$sql = "SELECT MONTH(Fecha) AS Mes, SUM(PrecioTotalVenta) AS TotalVentas 
        FROM venta 
        WHERE YEAR(Fecha) = $año_actual 
        AND MONTH(Fecha) = $mes_actual";

$result = $conn->query($sql);
$gananciasMensuales = [];
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $gananciasMensuales[$row["Mes"]] = $row["TotalVentas"];
    }
}

mysqli_close($conexion);
