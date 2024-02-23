

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="../styles/index.css" />
    <title>INICIO DE SESION</title>
  </head>
  <body class="inicio-sesion">
    <div class="container_login">
      <div
        class="content-form d-flex justify-content-center align-items-center login"
      >
        <div class="content-title-form">
          <h1 class="title-login">BIENVENIDOS</h1>
          <img class="img-login" src="../vistas/img/logo.png" alt="" />
          <form action="../controller/validarLogin.php" id="formulario" method="post" 
          className="input-inicio">
            <input
              class="input_login"
              type="text"
              name="documento"
              placeholder="Documento"
            /><br />

            <input
              class="input_login"
              type="password"
              name="contrasena"
              placeholder="Contraseña"
            /><br />

            <p class="link-login">
              ¿Has olvidado tu contraseña?
              <a class="link" href="../vistas/recuperar.php">Recuperar</a>
              <!-- <a class="link" href="./recuperar.html">Recuperar</a> -->
            </p>

             <div class="content-button-login">
              <input class="bnt-loguear"  type="submit" value="Ingresar" name="ingresar">
              <!-- <button class="bnt-loguear" type="submit" value>
                Ingresar
                </button> -->
            </div>
          </form>
        </div>
      </div>
    </div>
  </body>
</html>
