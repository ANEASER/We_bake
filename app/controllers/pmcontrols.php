<?php

    class PmControls extends Controller{

        function index($id=null){

            if(!Auth::loggedIn()){
                $this->redirect("CommonControls/loadLoginView");
            }

            $this->view("productionmanager/pmdash");
        }


        function createvehicle(){
            
            $vehicle = new Vehicle();

            $arr["registrationnumber"] = $_POST["registrationnumber"];
            $arr["type"] = $_POST["type"];
            $arr["capacity"] = $_POST["capacity"];
            $arr["chassinumber"] = $_POST["chassinumber"];
            $arr["enginenumber"] = $_POST["enginenumber"];
            $arr["modelname"] = $_POST["modelname"];

            $vehicle->insert($arr);
            $this->redirect("http://localhost/we_bake/public/PmControls/loadVehiclesView");  
        }

        function loadVehiclesView(){
            $vehicle = new Vehicle();
            $vehicles = $vehicle->findall();
            echo $this->view("productionmanager/vehicles", [ "vehicles" => $vehicles]);
        }

        function deletevehicle($vehicleid){
            $vehicle = new Vehicle();
            $vehicle->delete($vehicleid,"vehicleno");
            $this->redirect("http://localhost/we_bake/public/PmControls/loadVehiclesView");
        
        }

        function editvehicle(){
            $vehicle = new Vehicle();
            
            $vehicleid = $_POST['id'];


            if (!empty($_POST['registrationnumber'])){
                $data['registrationnumber'] = $_POST['registrationnumber'];
            }
            if (!empty($_POST['type'])){
                $data['type'] = $_POST['type'];
            }
            if (!empty($_POST['capacity'])){
                $data['capacity'] = $_POST['capacity'];
            }
            if (!empty($_POST['availability'])){
                $data['availability'] = $_POST['availability'];
            }
            if (!empty($_POST['chassinumber'])){
                $data['chassinumber'] = $_POST['chassinumber'];
            }
            if (!empty($_POST['enginenumber'])){
                $data['enginenumber'] = $_POST['enginenumber'];
            }
            if (!empty($_POST['modelname'])){
                $data['modelname'] = $_POST['modelname'];
            }
    
            echo $vehicle->update($vehicleid,"vehicleno",$data);
            //$vehicle = $vehicle->find($vehicleid,"vehicleno");
            $this->redirect("http://localhost/we_bake/public/PmControls/loadVehiclesView");
        }


        // views
        function AddVehicle(){
            echo $this->view("productionmanager/addvehicle");
        }

        function EditVehicleView($vehicleid){

            $vehicle = new Vehicle();
            $data = $vehicle->where("vehicleno",$vehicleid);

            echo $this->view("productionmanager/editvehicle",["data"=>$data]);
        }

    }
?>