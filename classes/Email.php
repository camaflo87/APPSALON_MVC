<?php

namespace Classes;

use PHPMailer\PHPMailer\PHPMailer;

class Email
{

    public $email;
    public $nombre;
    public $token;

    public function __construct($email, $nombre, $token)
    {
        $this->email = $email;
        $this->nombre = $nombre;
        $this->token = $token;
    }

    public function enviarConfirmacion()
    {
        // Crear el objeto mail
        $mail = new PHPMailer();
        $mail->isSMTP();
        $mail->Host = 'sandbox.smtp.mailtrap.io';
        $mail->SMTPAuth = true;
        $mail->Port = 2525;
        $mail->Username = '0e6eb40cb32d8f';
        $mail->Password = 'f643b160184f8a';

        $mail->setFrom('correo@correo.com');
        $mail->addaddress('correo@correo.com', 'AppSalon.com');
        $mail->Subject = "Confirma tu cuenta";

        // Set html
        $mail->isHTML(TRUE);
        $mail->CharSet = 'UTF-8';

        $contenido = "<html>";
        $contenido .= "<p><strong> Hola " . $this->email . "</strong> Has creado tu cuenta en AppSalon, solo debes confirmarla presionando el siguiente enlace</p>";
        $contenido .= "<p> Presiona aquí: <a href='http://localhost:3000/public/confirmar-cuenta?token=" .$this->token.  "'>Crear cuenta.</p>";
        $contenido .= "<p>Si tu no solicitaste esta cuenta, puede ignorar el mensaje</p>";
        $contenido .= "</html>";

        $mail->Body = $contenido;

        // Enviar email
        $mail -> send();
    }

    public function enviarInstrucciones(){
        // Crear el objeto mail
        $mail = new PHPMailer();
        $mail->isSMTP();
        $mail->Host = 'sandbox.smtp.mailtrap.io';
        $mail->SMTPAuth = true;
        $mail->Port = 2525;
        $mail->Username = '0e6eb40cb32d8f';
        $mail->Password = 'f643b160184f8a';

        $mail->setFrom('correo@correo.com');
        $mail->addaddress('correo@correo.com', 'AppSalon.com');
        $mail->Subject = "Reestablece tu password";

        // Set html
        $mail->isHTML(TRUE);
        $mail->CharSet = 'UTF-8';

        $contenido = "<html>";
        $contenido .= "<p><strong> Hola " . $this->nombre . "</strong> Has solicitado restablecer tu password, sigue el siguiente enlace para hacerlo.</p>";
        $contenido .= "<p> Presiona aquí: <a href='http://localhost:3000/public/recuperar?token=" .$this->token. "'>Reestablecer Password</p>";
        $contenido .= "<p>Si tu no solicitaste esta cuenta, puede ignorar el mensaje</p>";
        $contenido .= "</html>";

        $mail->Body = $contenido;

        // Enviar email
        $mail -> send();
    }
}
