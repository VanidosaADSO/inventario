<link rel="stylesheet" href="../../styles/modalCompra.css">
<style>
  .main-table {
    width: 100%;
    border-collapse: collapse;
  }

  .main-table th,
  .main-table td {
    padding: 8px;
    border: 1px solid #ddd;
    text-align: center;
    font-size: 13px;
  }

  .main-table th {
    background-color: #f2f2f2;
    font-weight: bold;
  }

  .main-table tbody tr:nth-child(even) {
    background-color: #f2f2f2;
  }
</style>

<div id="myModalCompra" class="modal" style="display: none;">
  <div class="container-modalCompra">
    <div class="container-compras">
      <div class="content-label-input">
        <label>Producto:</label><br>
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
        <label>Precio venta:</label><br>
        <input class="input-registrar" type="number" id="precioVenta" name="precioVenta">
      </div>

      <div class="content-label-input">
        <label>Stock Minimo:</label><br>
        <input class="input-registrar" type="number" id="stockMinimo" name="stockMinimo">
      </div>



      <div class="container-button">
        <div class="content-button">
          <button style="
            text-decoration: none;
            height: 34px;
            padding: 10px 12px;
            border-radius: 5px;
            margin-bottom: 10px ;
            color: #ffffff;
            background-color: #41af46;
            border: 0px solid #dee2e6;
        " type="button" onclick="return agregarProducto()">Agregar Producto</button>
        </div>
      </div>

      <div class="container-item-modal-account">
        <input type="button" class="close close-button" value="Cerrar modal">
      </div>
    </div>

    <!-- Lista de productos -->
    <div class="container-table-item" style="max-height: 400px; 
      overflow: auto;
      background-color: #c4c4c4;
      border: 1.5px solid #e9e9e9;
      border-radius: 10px;
      padding: 20px 15px 16px;
      box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.281);
    ">
      <div class="content-table">
        <table class="main-table table-bordered">
          <thead>
            <tr>
              <th class="th-style text-center">ID</th>
              <th class="th-style text-center">Producto</th>
              <th class="th-style text-center">Cantidad</th>
              <th class="th-style text-center">Precio U</th>
              <th class="th-style text-center">Precio Venta</th>
              <th class="th-style text-center">Stock Minimo</th>
              <th class="th-style text-center">Acciones</th>
            </tr>
          </thead>
          <tbody id="tableBody">
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>

<script src="../../controller/js/validarCompra.js"></script>
<script>
  var productos = [];

  function agregarProducto() {
    var nombre = document.getElementById('productos').value;
    var cantidad = document.getElementById('cantidad').value;
    var precioUnidad = document.getElementById('precioUnidad').value;
    var precioVenta = document.getElementById('precioVenta').value;
    var stockMinimo = document.getElementById('stockMinimo').value;

    if (nombre === '' || cantidad === '' || precioUnidad === '' || precioVenta === '' ||
      stockMinimo === '') {
      alert('Por favor, complete todos los campos de producto requeridos.');
      return false;
    }



    var producto = {
      nombre: document.getElementById('productos').value,
      cantidad: parseInt(document.getElementById('cantidad').value),
      precioUnidad: parseFloat(document.getElementById('precioUnidad').value),
      precioVenta: parseFloat(document.getElementById('precioVenta').value),
      stockMinimo: parseFloat(document.getElementById('stockMinimo').value)
    };

    productos.push(producto);
    mostrarProductos();
    calcularTotales();
    limpiarCampos();

     var productosJson = JSON.stringify(productos);
    document.getElementById('productosJson').value = productosJson;

  }

  function mostrarProductos() {
    var tbody = document.getElementById('tableBody');
    tbody.innerHTML = '';

    productos.forEach(function(producto, index) {
      var tr = document.createElement('tr');

      var idTd = document.createElement('td');
      idTd.textContent = index + 1;
      tr.appendChild(idTd);

      var productoTd = document.createElement('td');
      productoTd.textContent = producto.nombre;
      tr.appendChild(productoTd);

      var cantidadTd = document.createElement('td');
      cantidadTd.textContent = producto.cantidad;
      tr.appendChild(cantidadTd);

      var precioUnidadTd = document.createElement('td');
      precioUnidadTd.textContent = producto.precioUnidad;
      tr.appendChild(precioUnidadTd);

      var precioVentaTd = document.createElement('td');
      precioVentaTd.textContent = producto.precioVenta;
      tr.appendChild(precioVentaTd);

      var stockMinimoTd = document.createElement('td');
      stockMinimoTd.textContent = producto.stockMinimo;
      tr.appendChild(stockMinimoTd);

      var accionesTd = document.createElement('td');
      var eliminarButton = document.createElement('button');
      eliminarButton.textContent = 'Eliminar';
      eliminarButton.addEventListener('click', function() {
        eliminarProducto(index);
      });
      accionesTd.appendChild(eliminarButton);
      tr.appendChild(accionesTd);

      tbody.appendChild(tr);

    });
  }

  function eliminarProducto(index) {
    productos.splice(index, 1);
    mostrarProductos();
    calcularTotales();

  }

  function limpiarCampos() {
    document.getElementById('productos').value = '';
    document.getElementById('cantidad').value = '';
    document.getElementById('precioUnidad').value = '';
    document.getElementById('precioVenta').value = '';
    document.getElementById('stockMinimo').value = '';
  }

  function calcularTotales() {
    var totalFactura = 0;

    productos.forEach(function(producto) {
      totalFactura += producto.cantidad * producto.precioUnidad;
    });

    document.getElementById('totalFactura').value = totalFactura;
  }
</script>