<?php
  include('../models/conexion.php');

  if(isset($_POST['ingresar'])){
    session_start();

    $documento =$_POST['documento'];
    $contrasena =$_POST['contrasena'];
    // $contraEncryp = md5($contrasena);

    $consulta = "SELECT * FROM usuario WHERE Documento='$documento' and Contrasena='$contrasena'";
    $resultado=mysqli_query($conexion,$consulta);


    $filas=mysqli_num_rows($resultado);

    if($filas){

      $_SESSION['documento'] = $documento;   
      include("../vistas/dahsboard.php");
  }else{
      include("../vistas/index.php");
      
      $mss="Credenciales invalidas. intente nuevamente";
      echo "<script> alert('".$mss."');</script> ";
      
  }

    mysqli_free_result($resultado);
    mysqli_close($conexion);

  }
?>




