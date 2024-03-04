
function ValidarAdministrador() {
  var nombre = document.getElementById('nombre').value.trim();
  var apellido = document.getElementById('apellido').value.trim();
  var documento = document.getElementById('documento').value.trim();
  var correo = document.getElementById('correo').value.trim();
  var contrasena = document.getElementById('contrasena').value;
  var imagen = document.getElementById('imagen').value;

  if (nombre === '' || apellido === '' || documento === '' || correo === '' || contrasena === '' || imagen === '') {
    alert('Por favor, complete todos los campos.');
    return false;
  }


  if (documento.length > 10) {
    alert('El DOCUMENTO debe tener como máximo 10 números.');
    return false;
  } else if (documento.length < 8) {
    alert('El DOCUMENTO debe tener como mínimo 8 números.');
    return false;
  }

  var formatoCorreo = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
  if (!formatoCorreo.test(correo)) {
    alert('Por favor, ingrese un correo electrónico válido.');
    return false;
  }

  if (contrasena.length < 8) {
    alert('La contraseña debe tener al menos 8 caracteres.');
    return false;
  }

  return true;
}