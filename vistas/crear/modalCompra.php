<link rel="stylesheet" href="../../styles/modalCompra.css">
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
        <button class="close close-button" href="#">Cerrar modal</button>
      </div>
    </div>

    <!-- Lista de productos -->
    <div class="tablaProductos" style="
          display: flex;
          justify-content: center;">
    </div>
  </div>



</div>

<script src="../../controller/js/validarCompra.js"></script>