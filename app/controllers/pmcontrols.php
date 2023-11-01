<?php

    class PmControls extends Controller{

        function index($id=null){

            if(!Auth::loggedIn()){
                $this->redirect("CommonControls/loadLoginView");
            }

            $this->view("productionmanager/pmdash");
        }

        function loadVehiclesView(){
            echo $this->view("productionmanager/vehicles");
        }

        function AddVehicle(){
            echo $this->view("productionmanager/addvehicle");
        }

        function EditVehicle(){
            echo $this->view("productionmanager/editvehicle");
        }

    }
?>