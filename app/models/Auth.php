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

        public static function iscustomer(){
            if(isset($_SESSION["USER"])){
                if(!$_SESSION["USER"]->Role){
                    return true;
                }
            }
            return false;
        }

        public static function isReceptionist(){
            if(isset($_SESSION["USER"])){
                if($_SESSION["USER"]->Role == "receptionist"){
                    return true;
                }
            }
            return false;
        }

        public static function isOutletManager(){
            if(isset($_SESSION["USER"])){
                if($_SESSION["USER"]->Role == "outletmanager"){
                    return true;
                }
            }
            return false;
        }

        public static function isBillingClerk(){
            if(isset($_SESSION["USER"])){
                if($_SESSION["USER"]->Role == "billingclerk"){
                    return true;
                }
            }
            return false;
        }

        public static function isOwner(){
            if(isset($_SESSION["USER"])){
                if($_SESSION["USER"]->Role == "owner"){
                    return true;
                }
            }
            return false;
        }

        public static function isProductionManager(){
            if(isset($_SESSION["USER"])){
                if($_SESSION["USER"]->Role == "productionmanager"){
                    return true;
                }
            }
            return false;
        }

        public static function isAdmin(){
            if(isset($_SESSION["USER"])){
                if($_SESSION["USER"]->Role == "admin"){
                    return true;
                }
            }
            return false;
        }


    }

?>