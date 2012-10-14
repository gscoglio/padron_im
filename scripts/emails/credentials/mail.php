<?php

header('Content-Type: text/html; charset=utf-8');

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

include_once '../../../PHPMailer/class.phpmailer.php';
include_once '../../../PHPMailer/class.smtp.php';
include_once '../../../config/config.php';

function send_email($params) {

    $mail = new PHPMailer();

    $mail->IsSMTP();                                      // set mailer to use SMTP
    $mail->Host = "smtp.gmail.com";  // specify main and backup server
    $mail->Port = 465;
    $mail->SMTPSecure = "ssl";
    $mail->SMTPAuth = true;     // turn on SMTP authentication
    $mail->Username = EMAIL_USERNAME;  // SMTP username
    $mail->Password = EMAIL_PASSWORD; // SMTP password

    $mail->From = "no_reply@independientemistico.org";
    $mail->FromName = "Independiente Mistico";
    
    $mail->AddAddress($params['email'], $params['nombre'] . " " . $params['apellido']);

    $mail->AddReplyTo("elecciones@independientemistico.org", "Independiente Mistico");

    //$mail->WordWrap = 50;                                 // set word wrap to 50 characters
    $mail->IsHTML(true);                                  // set email format to HTML
    $mail->CharSet = "UTF-8";

    $mail->Subject = "[Elecciones 2012] Credenciales para votar";
    //$mail->AddEmbeddedImage('/home/gscoglio/pablobot/images/pablobot.jpg', 'logoimg', 'pablobot.jpg'); // attach file logo.jpg, and later link to it using identfier logoimg
    $body = file_get_contents("email_body.php");
    $body = str_replace('[nombre]', $params['nombre'], $body);
    $body = str_replace('[apellido]', $params['apellido'], $body);
    $body = str_replace('[usuario]', $params['socio_nro'], $body);
    $body = str_replace('[clave]', $params['clave'], $body);
    $mail->Body = $body;

    if (!$mail->Send()) {
        echo "Message could not be sent. <p>";
        echo "Mailer Error: " . $mail->ErrorInfo . " " . date('d-m-Y');
        exit;
    }

    echo "Message has been sent " . date('d-m-Y');
    return true;
}

?>