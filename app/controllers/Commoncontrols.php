<?php
class CommonControls extends Controller {
    
    function index($id = null) {
        $this->view("common/home");
    }

    function loadLoginView() {
        $this->view("common/login");
    }

    function loadRegisterView() {
        $this->view("common/register");
    }

    function loadInternalServerError() {
        $this->view("common/internalservererror");
    }


    function login() {
        $error = "";
    
        if (count($_POST) > 0) {
            $systemuser = new Systemuser();
            $customer = new Customer();
    
            if ($row = $systemuser->where("UserName", $_POST["username"])) {
                if (is_array($row) && count($row) > 0) {
                    
                    $user = $row[0];
                    
                    if (isset($user->Role)) {
                        $role = $user->Role;

                        
                        
                        if ($_POST["password"] == $user->Password) {
                            Auth::authenticate($user);
                            
                            if ($role == 'admin') {
                                $this->redirect(BASE_URL."AdminControls");
                            } elseif ($role == 'storemanager') {
                                $this->redirect(BASE_URL."StoreControls");
                            } elseif ($role == 'receptionist') {
                                $this->redirect(BASE_URL."RecieptionControls");
                            }elseif ($role == 'billingclerk') {
                                $this->redirect(BASE_URL."BillingControls");
                            } elseif($role=="outletmanager"){
                                $this->redirect(BASE_URL."OutletControls");
                            }elseif($role=="storemanager"){
                                $this->redirect(BASE_URL."StoreControls");
                            }elseif($role=="owner"){
                                $this->redirect(BASE_URL."OwnerControls");
                            }
                            else {
                                $this->redirect(BASE_URL."Pmcontrols");
                            }
                        } else {
                            $error = "Invalid password username or password";
                            $this->view("common/login",["error"=>$error]);
                        }
                    } else {
                        $error = "User data does not contain a password";
                        $this->view("common/login",["error"=>$error]);
                    }
                    } else {
                        $error = "User data does not contain a password";
                        $this->view("common/login",["error"=>$error]);
                    }
                }
                elseif ($row = $customer->where("UserName", $_POST["username"])) {
                    
                    if (is_array($row) && count($row) > 0) {
                    
                        $user = $row[0];
                        $verifiedpassword = password_verify($_POST["password"], $user->Password);
                            
                            if ($verifiedpassword ) {
                                Auth::authenticate($user);
                                $this->redirect(BASE_URL."CustomerControls");
                            } else {
                                $error = "Invalid password";
                                $this->view("common/login",["error"=>$error]);
                            }
                        } else {
                            $error = "User data does not contain a password";
                            $this->view("common/login",["error"=>$error]);
                        }

                }else {
                    $error = "User not found";
                    $this->view("common/login",["error"=>$error]);
                }
            } 
    }

    public function otpvalidation() {

        $error = "";  

        $mail = new Mail();
    
        // Function to generate OTP
        function generateOTP() {
            return str_pad(rand(0, 999999), 6, '0', STR_PAD_LEFT);
        }
    
        // Start the session if it's not already started
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }

        $email = $_SESSION['arr']['Email'];
        $redirect = $_SESSION['redirect'];

        if (isset($_POST["otp"])) {
            if ($_POST["otp"] == $_SESSION['otp']) {
                $this->redirect(BASE_URL.$redirect);
            } else {
                $error = "Invalid OTP"; 
                $this->view("common/otpverification",["error"=>$error]);
            }
        }else{
            $otp = generateOTP();
            $_SESSION['otp'] = $otp;
            $_SESSION['email'] = $email;
        
            $mail->sendOTPByEmail();
            $this->view("common/otpverification");
        }
        
    }

    function register(){

        $error="";

        if (count($_POST) > 0) {
            $customer = new Customer();
            $systemuser = new Systemuser();
            
            $arr["Name"] = $_POST["Name"];
            $arr["Password"] =   password_hash($_POST["Password1"], PASSWORD_DEFAULT);
            $arr["DOB"] = $_POST["DOB"];
            $arr["contactNo"] = $_POST["contactNo"];
            $arr["Address"] = $_POST["Address"];
            $arr["UserName"] = $_POST["UserName"];
            $arr["Email"] = $_POST["Email"];

            $row = $customer->where("UserName", $arr["UserName"]);
            
            if (is_array($row) && count($row) > 0) {
                $user = $row[0];
            }
            else if($_POST["Password1"] != $_POST["Password2"]){
                $error = "Passwords do not match";
                $this->view("common/register",["error"=>$error]); 
            } else {

                $row = $systemuser->where("UserName", $arr["UserName"]);
                $user = $row[0];

                $emailRegex = '/^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/';
                $contactNoRegex = '/^[0-9]{10,14}$/';

                if (!preg_match($emailRegex, $arr["Email"])) {
                    $error = "Invalid email format";
                    $this->view("common/register", ["error" => $error]);
                }

                if (!preg_match($contactNoRegex, $arr["contactNo"])) {
                    $error = "Invalid contact number";
                    $this->view("common/register", ["error" => $error]);
                }

                if (session_status() == PHP_SESSION_NONE) {
                    session_start();
                }

                if ($user->UserName == $arr["UserName"]) {
                    $error = "Username already exists";
                    $this->view("common/register",["error"=>$error]);}

                if ($user->Email == $arr["Email"]) {
                    $error = "Email already exists";
                    $this->view("common/register",["error"=>$error]);
                }

                $_SESSION['arr'] = $arr;
                $_SESSION['redirect'] = "CommonControls/insertuser";
                $this->redirect(BASE_URL."CommonControls/otpvalidation");
                    
                }
            }
    }


    function insertuser(){
            if (session_status() == PHP_SESSION_NONE) {
                session_start();
            }
            $arr = $_SESSION['arr'];
            $customer = new Customer();
            $customer->insert($arr);
            session_destroy();
            $this->redirect(BASE_URL."CommonControls/loadLoginView");
    }


    // Product
    function loadProductsView() {

        $productitem = new ProductItem();
        $categories = $productitem->getDistinct("category");

        $this->view("common/productscatergories",[ "categories" => $categories]);
    }

    function productitem($category) {

        $productitem = new ProductItem();
        $items = $productitem->where("category", $category);

        $this->view("common/productitems",["items" => $items]);
    }

    function logout() {
        Auth::logout();
        $this->redirect(BASE_URL."CommonControls/");
        
    }
     
    public function FindProfileView(){
        $this->view("common/findprofileview");
    }
    
    public function ShowFoundProfile(){
        $usernameemail = $_POST["usernameemail"];
        $customer = new Customer();

        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }
        
        if ($row = $customer->where("UserName", $usernameemail)) {
                $user = $row[0];
                $_SESSION['USER'] = $user;
                $this->view("common/foundprofile",["user"=>$user]);
            }
        else if ($row = $customer->where("Email", $usernameemail)) {
                $user = $row[0];
                $_SESSION['USER'] = $user;
                $this->view("common/foundprofile",["user"=>$user]);
            }
        else{
            $error = "User not found";
            $this->view("common/findprofileview",["error"=>$error]);    
        
        }
    }

    public function ValidateProfileView(){
        $mail = new Mail();

        function generateOTP1() {
            return str_pad(rand(0, 999999), 6, '0', STR_PAD_LEFT);
        }

        $otp = generateOTP1();
        $_SESSION['otp'] = $otp;
        $_SESSION['email'] = $_SESSION['USER']->Email;
        $_SESSION['redirect'] = "CommonControls/ResetPasswordView";


        if($mail->sendOTPByEmail()){
            $this->view("common/otpverification");
        }else{
            $error = "There was an error sending the OTP, please try again later";
            $this->view("common/validateprofileview",["error"=>$error]);
        }
    }

    public function ResetPasswordView(){
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }
        $this->view("common/resetpasswordview");
    }

    public function resetpassword(){
        
        $password1 = $_POST["password1"];
        $password2 = $_POST["password2"];

        if($password1 == $password2){
            if (session_status() == PHP_SESSION_NONE) {
                session_start();
            }
           
            $password = password_hash($password1, PASSWORD_DEFAULT);
           
            if(isset($_SESSION['USER']->Role)){
                $systemuser = new Systemuser();
                $systemuser->update($_SESSION['USER']->UserName,"UserName",[ "Password" => $password]);
                $message = "Password reset successful";
                $this->view("common/login",["message"=>$message]);
            }else {
                    $customer = new Customer();
                    $customer->update($_SESSION['USER']->UserName,"UserName",[ "Password" => $password]);
                    $message = "Password reset successful";
                    $this->view("common/login",["message"=>$message]);
                }           
        } else{
            $error = "Passwords do not match";
            $this->view("common/resetpasswordview",["error"=>$error]);
        }
    }
}
    

?>
