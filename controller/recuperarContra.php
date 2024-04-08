<?php
// Incluir la biblioteca PHPMailer
require '../vendor/autoload.php'; // Ruta a tu carpeta de PHPMailer

// Suponiendo que ya tienes una conexión a la base de datos establecida y guardada en $conexion
include('../models/conexion.php');

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['ingresar'])) {
    $email = $_POST['email'];

    $consulta = $conexion->prepare("SELECT * FROM usuario WHERE Correo = ?");
    $consulta->bind_param("s", $email);
    $consulta->execute();
    
    // Verificar si el email existe en la base de datos
    $resultado = $consulta->get_result();
    if ($resultado->num_rows > 0) {
        $mensaje = "Hola, ¿cómo estás? Este es un correo de prueba.";
        $asunto = "Mensaje de prueba";

        $mail = new PHPMailer(true);

        try {
            $mail->isSMTP();
            $mail->Host = 'smtp.gmail.com';
            $mail->SMTPAuth = true;
            $mail->Username = 'guzmanforero3@gmail.com'; 
            $mail->Password = '26379012Daniel';
            $mail->SMTPSecure = 'tls';
            $mail->Port = 587;

            $mail->setFrom('guzmanforero3@gmail.com', 'Nombre Remitente');
            $mail->addAddress($email); 
            $mail->Subject = $asunto;
            $mail->Body = $mensaje; 

            $mail->send();
            echo "Correo enviado exitosamente a: " . $email;
        } catch (Exception $e) {
            echo "Error al enviar el correo: {$mail->ErrorInfo}";
        }
    } else {
        // El email no existe en la base de datos
        echo "El email ingresado no existe en la base de datos.";
    }
}
?>
