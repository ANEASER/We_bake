<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\SMTP;

require '../vendor/phpmailer/src/Exception.php';
require '../vendor/phpmailer/src/PHPMailer.php';
require '../vendor/phpmailer/src/SMTP.php';

class Mailer {
    function sendMail($email, $otp, $subject="subject", $body="body") {
    
        $mail = new PHPMailer;
        $mail->isSMTP();
        $mail->Host = "smtp.gmail.com"; 
        $mail->Port = 465;
        $mail->SMTPAuth = true;
        $mail->SMTPSecure = 'ssl'; 
        $mail->Username = 'easermailsender@gmail.com'; 
        $mail->Password = 'ygherqgqmcpqbemw'; 
        $mail->setFrom('easermailsender@gmail.com','We bake');
        $mail->addAddress($email);
        $mail->isHTML(true);
    
        $mail->Subject =  $subject;
        $mail->Body = "$body";
    
        if (!$mail->send()) {
            echo "Mailer Error: " . $mail->ErrorInfo;
        } else {
           return true;
        }
    }
}

?>