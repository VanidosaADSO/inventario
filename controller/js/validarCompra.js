function validarCompra(){
  var fecha = document.getElementById('fecha').value.trim();
  var proveedor = document.getElementById('proveedor').value.trim();
  if (fecha === '' || proveedor === '') {
    alert('Por favor, complete todos los campos de producto.');
    return false;
  }


  return true;
}


// Funcion para almacenar los datos en el array
let productosArray = [];
function agregarProducto() {
  let productos = document.getElementById('productos').value;
  let cantidad = document.getElementById('cantidad').value;
  let precioUnidad = document.getElementById('precioUnidad').value;
  let precioVenta = document.getElementById('precioVenta').value;
  let stockMinimo = document.getElementById('stockMinimo').value;


  const Producto = [productos, cantidad, precioUnidad, precioVenta, stockMinimo];

  productosArray.push(Producto);

  mostrarProductos();
  limpiarCampos();
}



function eliminarProducto(index) {
  productosArray.splice(index, 1); 
  mostrarProductos();
}

function mostrarProductos() {
  let tablaHTML = '<table border="1">';
  tablaHTML += '<tr><th>Producto</th><th>Cantidad</th><th>Precio Unidad</th><th>Precio Venta</th><th>Stock Minimo</th><th>Acción</th></tr>';

  // Iterar sobre cada producto en el array
  productosArray.forEach((producto, index) => {
    tablaHTML += '<tr>';
    producto.forEach(item => {
      tablaHTML += '<td>' + item + '</td>';
    });
    tablaHTML += '<td><button onclick="eliminarProducto(' + index + ')">Eliminar</button></td>'; // Botón de eliminación con el índice como parámetro
    tablaHTML += '</tr>';
  });

  tablaHTML += '</table>';

  // Mostrar la tabla dentro del div con la clase "tablaProductos"
  document.querySelector('.tablaProductos').innerHTML = tablaHTML;
}


function limpiarCampos() {
  document.getElementById('productos').value = '';
  document.getElementById('cantidad').value = '';
  document.getElementById('precioUnidad').value = '';
  document.getElementById('precioVenta').value = '';
  document.getElementById('stockMinimo').value = '';
}
