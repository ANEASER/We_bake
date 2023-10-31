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
        $errors = array();
    
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
                                $this->redirect("../admincontrols");
                            } elseif ($role == 'storemanager') {
                                $this->redirect("../storecontrols");
                            } elseif ($role == 'receptionist') {
                                $this->redirect("../Recieptioncontrols");
                            }elseif ($role == 'billingclerk') {
                                $this->redirect("../billingcontrols");
                            } elseif($role=="outletmanager"){
                                $this->redirect("../outletcontrols");}
                            else {
                                $this->redirect("../pmcontrols");
                            }
                        } else {
                            $errors[] = "Invalid password";
                        }
                    } else {
                        $errors[] = "User data does not contain a password";
                    }
                    } else {
                        $errors[] = "User data does not contain a password";
                    }
                }
                elseif ($row = $customer->where("UserName", $_POST["username"])) {
                    
                    if (is_array($row) && count($row) > 0) {
                    
                        $user = $row[0];
                            
                            if ($_POST["password"] == $user->Password) {
                                Auth::authenticate($user);
                                $this->redirect("../customercontrols");
                            } else {
                                $errors[] = "Invalid password";
                            }
                        } else {
                            $errors[] = "User data does not contain a password";
                        }

                }else {
                    $errors[] = "User not found";
                }
            } else {
                $errors[] = "User not found";
            }
    }

    public function otpvalidation() {
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

        if (isset($_POST["otp"])) {
            if ($_POST["otp"] == $_SESSION['otp']) {
                $customer = new Customer();
                $arr = $_SESSION['arr'];
                $customer->insert($arr);
                echo "Registration Successful";
                session_destroy();
                $this->redirect("../commoncontrols/loadLoginView");
            } else {
                echo "Invalid OTP"; 
                $this->view("common/otpverification");
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
            $arr["Password"] = $_POST["Password1"];
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
                    $this->redirect("../commoncontrols/otpvalidation");
                    }
                }
            }
    }
        
    }

?>
