function validarProveedor() {
  var nombre = document.getElementById('nombre').value;
  var telefono = document.getElementById('telefono').value;
  var direccion = document.getElementById('direccion').value;
  var correo = document.getElementById('correo').value;

  if (nombre.trim() === '' || telefono.trim() === '' || direccion.trim() === '' || correo.trim() === '') {
    alert('Por favor, complete todos los campos.');
    return false;
  }

  var formatoCorreo = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
  if (!formatoCorreo.test(correo)) {
    alert('Por favor, ingrese un correo electrónico válido.');
    return false;
  }
  return true;
}