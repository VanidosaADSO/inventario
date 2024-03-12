function validarCompra(){
  var fecha = document.getElementById('fecha').value.trim();
  var proveedor = document.getElementById('proveedor').value.trim();
  if (fecha === '' || proveedor === '') {
    alert('Por favor, complete todos los campos.');
    return false;
  } 
  return true;
}





// Funcion para almacenar los datos en el array
