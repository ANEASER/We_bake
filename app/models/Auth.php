<?php
    session_start();
    class Auth {
        public static function authenticate($user){
            $_SESSION["USER"] = $user;
        }

        public static function loggedIn(){
            if(isset($_SESSION["USER"])){
                return true;}
            else{
                return false;}
        }

        public static function logout(){
            if(isset($_SESSION["USER"])){
                    session_destroy();
                }
        }
    }

?>