function validarCliente() {
  var nombre = document.getElementById('nombre').value.trim();
  var apellido = document.getElementById('apellido').value.trim();
  var documento = document.getElementById('documento').value.trim();
  var direccion = document.getElementById('direccion').value.trim();

  if (nombre === '' || apellido === '' || documento === '' || direccion === '') {
    alert('Por favor, complete todos los campos.');
    return false;
  }

  // if (documento.length  >= 10){
  //     alert('El DOCUMENTO debe de tener maximo 10 numeros');
  //     return false;
  // }else if (documento.length  < 8){
  //     alert('El DOCUMENTO debe de tener minimo 8 numeros');
  //     return false;
  // }

  return true;
}