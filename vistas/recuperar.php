<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="stylesheet" href="../styles/index.css" />
  <title>RECUPERAR CONTRASEÑA</title>
</head>

<body class="inicio-sesion">
  <div class="container_login">
    <div class="content-form d-flex justify-content-center align-items-center login">
      <div class="content-title-form">
        <h1 class="title-login">RECUPERAR</h1>
        <img class="img-login" src="../vistas/img/logo.png" alt="" />
        <form action="../controller/recuperarContra.php" id="formulario" method="post" className="input-inicio">
          <input class="input_login" type="email" name="email" placeholder="Correo electrónico" /><br />
          <br />
          <div class="content-button-login">
            <input class="bnt-loguear" type="submit" value="Ingresar" name="ingresar">
          </div>
        </form>
      </div>
    </div>
  </div>
</body>

</html>