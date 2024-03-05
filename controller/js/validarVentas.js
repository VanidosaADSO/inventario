function validarVenta(){
  var cliente = document.getElementById('cliente').value.trim();
  var fecha = document.getElementById('fecha').value.trim();
  var productos = document.getElementById('productos').value.trim();
  var cantidad = document.getElementById('cantidad').value.trim();
  var precioUnidad = document.getElementById('precioUnidad').value.trim();
  var precioTotal = document.getElementById('precioTotal').value.trim();
  var totalFactura = document.getElementById('totalFactura').value.trim();

  if (cliente === '' || fecha === '' || productos === '' 
  || cantidad === '' || precioTotal ==='' || precioUnidad === ''
  || totalFactura === '') {
    alert('Por favor, complete todos los campos.');
    return false;
  }


  return true;
}