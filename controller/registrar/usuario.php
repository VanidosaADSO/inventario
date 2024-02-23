<?php
include("../../models/conexion.php");

if (isset($_POST['Registrar'])) {
    $nombre = $_POST['nombre'];
    $apellido = $_POST['apellido'];
    $documento = $_POST['documento'];
    $correo = $_POST['correo'];
    $contrasena = $_POST['contrasena'];
    $contrasenaEncryp = md5($contrasena);

    $consulta= "INSERT INTO usuario(Nombre, Apellido, Documento, Correo,Contrasena) 
    VALUES ('$nombre','$apellido','$documento','$correo','$contrasenaEncryp');";

    $resultado = mysqli_query($conexion, $consulta);

    if($resultado){
        include('../vistas/listas/linstUsuario.php');    
    }
}