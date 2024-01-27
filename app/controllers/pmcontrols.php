<?php

    class PmControls extends Controller{

        function index($id=null){

            if(!Auth::loggedIn()){
                $this->redirect(BASE_URL."CommonControls/loadLoginView");
            }

            $productorder = new ProductOrder();
            $productorders = $productorder->findOnToday();
            $this->view("productionmanager/pmdash", ["productorders" => $productorders]);
        }

        //order handle
        function processOrder($orderid){
            $productorder = new ProductOrder();
            $productorder->update($orderid,"orderid",["orderstatus"=>"processing"]);
            $this->redirect(BASE_URL."PmControls/index");
        }

        function completedOrder($orderid){
            $productorder = new ProductOrder();
            $vehicle = new Vehicle();

            $order = $productorder->where("orderid",$orderid);
            $vehicleno = $order[0]->deliverby;

            $productorder->update($orderid,"orderid",["orderstatus"=>"finished"]);
            $vehicle->update($vehicleno,"vehicleno",["availability"=>1]);
            
            $this->redirect(BASE_URL."PmControls/index");
        }

        function cancelOrder($orderid){
            $productorder = new ProductOrder();
            $productorder->update($orderid,"orderid",["orderstatus"=>"cancelled"]);
            $this->redirect(BASE_URL."PmControls/index");
        }

        function moredetails($unique_id){
            $productorderline = new ProductOrderLine();
            $productorderlines = $productorderline->where("unique_id",$unique_id);
            echo $this->view("productionmanager/moredetailsorder",["productorderlines"=>$productorderlines]);
        }

        function showassignvehicles($orderid){  
            $vehicle = new Vehicle();
            $vehicles = $vehicle->where("availability",1);
            echo $this->view("productionmanager/assignvehicle",["orderid"=>$orderid, "vehicles"=>$vehicles]);
        }

        function assignvehicle($vehicleno, $orderid){
            $productorder = new ProductOrder();
            $vehicle = new Vehicle();

            $vehiclerow = $vehicle->where("vehicleno",$vehicleno);
            $registrationnumber = $vehiclerow[0]->registrationnumber;
            $vehicle->update($vehicleno,"vehicleno",["availability"=>0]);
            $productorder->update($orderid,"orderid",["deliverby"=>$registrationnumber]);
            $productorder->update($orderid,"orderid",["orderstatus"=>"ondelivery"]);

            $this->redirect(BASE_URL."PmControls/index");
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
            $this->redirect(BASE_URL."PmControls/loadVehiclesView");  
        }

        function loadVehiclesView(){
            $vehicle = new Vehicle();
            $vehicles = $vehicle->findall();
            echo $this->view("productionmanager/vehicles", [ "vehicles" => $vehicles]);
        }

        function deletevehicle($vehicleid){
            $vehicle = new Vehicle();
            $vehicle->delete($vehicleid,"vehicleno");
            $this->redirect(BASE_URL."PmControls/loadVehiclesView");
        
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
            $this->redirect(BASE_URL."PmControls/loadVehiclesView");
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