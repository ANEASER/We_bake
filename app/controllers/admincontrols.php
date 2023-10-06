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

        function loadItemsView(){
            echo $this->view("admin/items");
        }

        function loadOutletsView(){
            echo $this->view("admin/outlets");
        }

        function loadStocksView(){
            echo $this->view("admin/stocks");
        }

        function loadVehiclesView(){
            echo $this->view("admin/vehicles");
        }

        function loadUsersView(){
            echo $this->view("admin/systemusers");
        }
    }
?>