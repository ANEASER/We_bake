<?php
    class AdminControls extends Controller{

        function index($id=null){

            if(!Auth::loggedIn()){
                $this->redirect("CommonControls/loadLoginView");
            }

            $systemuser = new Systemuser();
            $data = $systemuser->where("UserName", $_SESSION["USER"]->UserName);

            echo $this->view("admin/admindash",[ "data" => $data]);
        }
    }
?>