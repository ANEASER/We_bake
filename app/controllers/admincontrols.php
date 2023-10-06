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

        //view table unctions
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

        //view add functions
        function AddItem(){
            echo $this->view("admin/additem");
        }

        function AddOutlet(){
            echo $this->view("admin/addoutlet");
        }

        function AddStock(){
            echo $this->view("admin/addstock");
        }

        function AddVehicle(){
            echo $this->view("admin/addvehicle");
        }

        function AddUser(){
            echo $this->view("admin/addsystemuser");
        }

        function AddAdvertiesment(){
            echo $this->view("admin/createadvertiesment");
        }

        //view edit functions
        function EditItem(){
            echo $this->view("admin/edititem");
        }

        function EditOutlet(){
            echo $this->view("admin/editoutlet");
        }

        function EditStock(){
            echo $this->view("admin/editstock");
        }

        function EditVehicle(){
            echo $this->view("admin/editvehicle");
        }

        function EditUser(){
            echo $this->view("admin/editsystemuser");
        }

    }
?>