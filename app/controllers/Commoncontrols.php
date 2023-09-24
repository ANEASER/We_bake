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
    
            if ($row = $systemuser->where("UserName", $_POST["username"])) {
                if (is_array($row) && count($row) > 0) {
                    
                    $user = $row[0];
                    
                    if (isset($user->Role)) {
                        $role = $user->Role;
                        
                        if ($_POST["password"] == $user->Password) {
                            var_dump($user);
                            Auth::authenticate($user);
                            
                            if ($role == 'admin') {
                                $this->redirect("../admincontrols");
                            } elseif ($role == 'storemanager') {
                                $this->redirect("../storemanagercontrols");
                            } elseif ($role == 'receptionist') {
                                $this->redirect("../Recieptioncontrols");
                            }elseif ($role == 'billingclerk') {
                                $this->redirect("../billingcontrols");
                            }else {
                                $this->redirect("../pmcontrols");
                            }
                        } else {
                            $errors[] = "Invalid password";
                        }
                    } else {
                        $this->redirect("../customercontrols");
                    }
                    } else {
                        $errors[] = "User data does not contain a password";
                    }
                } else {
                    $errors[] = "User not found";
                }
            } else {
                $errors[] = "User not found";
            }
    }
}
    
?>
