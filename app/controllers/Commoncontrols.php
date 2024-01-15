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
                                $this->redirect(BASE_URL."OutletControls");}
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
                if ($user->UserName == $arr["UserName"]) {
                
                    $error = "Username already exists";
                    $this->view("common/register",["error"=>$error]);}
    
                else{
                    
                    if (session_status() == PHP_SESSION_NONE) {
                        session_start();
                    }
                    $_SESSION['arr'] = $arr;
                    $_SESSION['redirect'] = "CommonControls/insertuser";
                    $this->redirect(BASE_URL."CommonControls/otpvalidation");
                    }
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
            echo "Registration Successful";
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
        $this->redirect(BASE_URL."CommonControls/loadLoginView");
        
    }
}
    

?>
