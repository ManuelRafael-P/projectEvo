<?php

use PHPMailer\PHPMailer\PHPMailer;

require_once 'model/entity/Email.entity.php';

class EmailDao
{
    public function sendEmailToResetPassword(Email $e)
    {
        require 'PHPMailer-master/src/Exception.php';
        require 'PHPMailer-master/src/PHPMailer.php';
        require 'PHPMailer-master/src/SMTP.php';

        $mail = new PHPMailer();
        $mail->isSMTP();
        $mail->CharSet = 'UTF-8';
        $mail->Encoding = 'base64';
        $mail->SMTPDebug = 0;
        $mail->Host = gethostbyname('smtp.gmail.com');
        $mail->Port = 587;
        $mail->SMTPSecure = 'PHPMailer::ENCRYPTION_STARTTLS';
        $mail->SMTPAuth = true;
        $mail->Username = 'test.dummy.dd.01@gmail.com';
        $mail->Password = 'deliverduk01$';
        $mail->setFrom('no-reply@example.com', 'Deliver Dukes Store ');
        $mail->addReplyTo('replyto@example.com', 'First Last');
        $mail->addAddress($e->getEmail(), $e->getFullname());

        $mail->SMTPOptions = array(
            'ssl' => array(
                'verify_peer' => false,
                'verify_peer_name' => false,
                'allow_self_signed' => true
            )
        );
        $mail->Subject = "Reestablecer contraseña para cuenta de Deliver Dukes Store.";
        $mail->msgHTML('<h3>DeliverDukes - reestablecer contraseña</h3>
                    <p>Buen dia, ' . $e->getFullname() . ' </p>
                    <p>Recibimos una solicitud para reestablecer tu contraseña. El link aparecera despues de este mensaje. Si no hizo tal solicitud, usted puede ignorar este mensaje.</p>
                    <p>Este es su link para reestablecer su contraseña:</p><br>
                    <a href="' . $e->getUrl() . '">' . $e->getUrl() . '</a>');

        $mail->AltBody = 'This is a plain-text message body';
        if (!$mail->send()) {
            echo 'Mailer Error: ' . $mail->ErrorInfo;
        } else {
            echo 'Message sent!';
        }
    }

    public function sendEmailToConfirmAccount(Email $e)
    {
        require 'PHPMailer-master/src/Exception.php';
        require 'PHPMailer-master/src/PHPMailer.php';
        require 'PHPMailer-master/src/SMTP.php';

        $mail = new PHPMailer();
        $mail->isSMTP();
        $mail->CharSet = 'UTF-8';
        $mail->Encoding = 'base64';
        $mail->SMTPDebug = 0;
        $mail->Host = gethostbyname('smtp.gmail.com');
        $mail->Port = 587;
        $mail->SMTPSecure = 'PHPMailer::ENCRYPTION_STARTTLS';
        $mail->SMTPAuth = true;
        $mail->Username = 'test.dummy.dd.01@gmail.com';
        $mail->Password = 'deliverduk01$';
        $mail->setFrom('no-reply@example.com', 'Deliver Dukes Store ');
        $mail->addReplyTo('replyto@example.com', 'First Last');
        $mail->addAddress($e->getEmail(), $e->getFullname());

        $mail->SMTPOptions = array(
            'ssl' => array(
                'verify_peer' => false,
                'verify_peer_name' => false,
                'allow_self_signed' => true
            )
        );
        $mail->Subject = "Verifica tu cuenta para Deliver Dukes Store.";
        $mail->msgHTML('<h3>Warning Store - Verificar cuenta</h3>
                    <p>Buen dia, ' . $e->getFullname() . ' </p>
                    <p>Recibimos una solicitud para verificar tu contraseña. El link aparecera despues de este mensaje. Si no hizo tal solicitud, usted puede ignorar este mensaje.</p>
                    <p>Este es su link para verificar su cuenta:</p><br>
                    <a href="' . $e->getUrl() . '">' . $e->getUrl() . '</a>');

        $mail->AltBody = 'This is a plain-text message body';

        if (!$mail->send()) {
            echo 'Mailer Error: ' . $mail->ErrorInfo;
        } else {
            echo 'Message sent!';
        }
    }
}
