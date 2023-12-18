<?php
    if (session_status() == PHP_SESSION_NONE) {
        session_start();
    }
    
    class Mail extends Mailer{

        function sendOTPByEmail(){

            $otp = $_SESSION['otp'];
            $email = $_SESSION['email'];

            $subject = "OTP from We bake";
            $body = "Your OTP is $otp";
            $this->sendMail($email, $subject, $body);
            
            return true;
        }

    }

?>