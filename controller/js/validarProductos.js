function validarProducto(){
  var nombre = document.getElementById('nombre').value.trim();
  var precioCompra = document.getElementById('precioCompra').value.trim();
  var cantidad = document.getElementById('cantidad').value.trim();
  var precioVenta = document.getElementById('precioVenta').value.trim();
  var stockMinimo = document.getElementById('stockMinimo').value.trim();


  if (nombre === '' || precioCompra === '' || cantidad === '' || precioVenta ==='' || stockMinimo === '') {
    alert('Por favor, complete todos los campos de producto.');
    return false;
  }


  return true;
}