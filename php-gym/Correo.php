<?php
require_once "Conexion.php";
session_start();
$nombre = $_POST['name'];
$correo = $_POST['correo'];
$asunto = $_POST['asunto'];
$cuerpo = $_POST['msg'];

require '../php-gym/librerias/PHPMailer/Exception.php';
require '../php-gym/librerias/PHPMailer/PHPMailer.php';
require '../php-gym/librerias/PHPMailer/SMTP.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

//Create an instance; passing `true` enables exceptions
$mail = new PHPMailer(true);

try {
    //Server settings
    $mail->isSMTP();                                            //Send using SMTP
    $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
    $mail->Username   = 'megagyminfo@gmail.com';                     //SMTP username
    $mail->Password   = 'Megagym123';                               //SMTP password
    $mail->SMTPSecure = "tls";            //Enable implicit TLS encryption
    $mail->Port       = 587;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

    //Recipients
    $mail->setFrom('megagyminfo@gmail.com', $nombre);
    $mail->addAddress('megagyminfo@gmail.com');     //Add a recipient

    //Content
    $mail->isHTML(true);                                  //Set email format to HTML
    $mail->Subject = $asunto;
    $mail->Body    = $cuerpo . "<br> Debe responder al mail origen\r\n" . $correo;

    $mail->send();
    echo 'Message has been sent';
} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}

?>