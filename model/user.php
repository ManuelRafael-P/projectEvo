<?php

use PHPMailer\PHPMailer\PHPMailer;

class User
{
    private $pdo;

    public $user_id;
    public $user_names;
    public $user_surnames;
    public $user_email;
    public $user_password;
    public $user_address;
    public $user_phone;
    public $user_type;
    public $user_account_verified;
    public $user_registration_date;
    public $user_updated_date;

    public function __construct()
    {
        try {
            $this->pdo = Database::StartUp();
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }


    public function list_admins()
    {
        try {
            $stm = $this->pdo->prepare("SELECT * FROM users WHERE USER_TYPE = 1");
            $stm->execute();
            return $stm->fetchAll(PDO::FETCH_OBJ);
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function verify_account($email, $password)
    {
        try {
            $password_encrypted = md5($password);
            $stm = $this->pdo->prepare("SELECT * FROM users WHERE USER_EMAIL = ? AND USER_PASSWORD = ?");
            $stm->execute(array($email, $password_encrypted));
            return $stm->fetchAll(PDO::FETCH_OBJ);
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function select_last_id_users()
    {
        try {
            $stm = $this->pdo->prepare("SELECT max(USER_ID) as id FROM users ");
            $stm->execute();
            return $stm->fetchAll(PDO::FETCH_OBJ);
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function register_new_user_client(User $object)
    {
        try {
            $id = $this->select_last_id_users();
            $id = $id[0]->id+1;
            $sql = "INSERT INTO users (USER_ID,USER_NAMES,USER_SURNAMES,USER_EMAIL,USER_PASSWORD,USER_ADDRESS,USER_PHONE) VALUES(?,?,?,?,?,?,?)";

            $this->pdo->prepare($sql)->execute(array(
                $id,
                $object->user_names,
                $object->user_surnames,
                $object->user_email,
                $object->user_password,
                $object->user_address,
                $object->user_phone
            ));
            $number = rand(1, 1000000);
            $token = random_bytes(32);
            $expires = date("U") + 1800;
            $hashedToken = password_hash($token, PASSWORD_DEFAULT);
            $full_name = $object->user_names ." " . $object->user_surnames;
            $this->send_email_confirm_account($full_name, $object->user_email, $number);
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function send_email_recover_password()
    {
    }

    public function send_email_confirm_account($full_name, $email, $url)
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
        $mail->addAddress($email, $full_name);

        $mail->SMTPOptions = array(
            'ssl' => array(
                'verify_peer' => false,
                'verify_peer_name' => false,
                'allow_self_signed' => true
            )
        );
        $mail->Subject = "Verifica tu cuenta para Deliver Dukes Store.";
        $mail->msgHTML('<h3>Warning Store - Verificar cuenta</h3>
                    <p>Buen dia, ' . $full_name . ' </p>
                    <p>Recibimos una solicitud para verificar tu contraseña. El link aparecera despues de este mensaje. Si no hizo tal solicitud, usted puede ignorar este mensaje.</p>
                    <p>Este es su link para verificar su cuenta:</p><br>
                    <p>' . $url . '</a>');

        $mail->AltBody = 'This is a plain-text message body';

        if (!$mail->send()) {
            echo 'Mailer Error: ' . $mail->ErrorInfo;
        } else {
            echo 'Message sent!';
        }
    }
}
