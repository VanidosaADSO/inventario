function validarVenta(){
  var cliente = document.getElementById('cliente').value.trim();
  var fecha = document.getElementById('fecha').value.trim();

  if (cliente === '' || fecha === '') {
    alert('Por favor, complete todos los campos.');
    return false;
  }


  return true;
}