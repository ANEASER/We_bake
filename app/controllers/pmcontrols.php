<?php

    class PmControls extends Controller{

        function index($id=null){

            if(!Auth::loggedIn()){
                $this->redirect(BASE_URL."CommonControls/loadLoginView");
            }

            if($_SESSION["USER"]->Role != "productionmanager"){
                $this->redirect(BASE_URL."CommonControls/loadLoginView");
            }

            $productorder = new ProductOrder();

            $productorders = $productorder->findOnToday();

            $this->view("productionmanager/pmdash", ["productorders" => $productorders]);
        }

        //order handle
        function processOrder($orderid){

            if(!Auth::loggedIn()){
                $this->redirect(BASE_URL."CommonControls/loadLoginView");
            }

            if($_SESSION["USER"]->Role != "productionmanager"){
                $this->redirect(BASE_URL."CommonControls/loadLoginView");
            }

            $productorder = new ProductOrder();
            $productorder->update($orderid,"orderid",["orderstatus"=>"processing"]);
            $this->redirect(BASE_URL."PmControls/index");
        }

        function completedOrder($orderid){
            $productorder = new ProductOrder();
            $vehicle = new Vehicle();

            if(!Auth::loggedIn()){
                $this->redirect(BASE_URL."CommonControls/loadLoginView");
            }

            if($_SESSION["USER"]->Role != "productionmanager"){
                $this->redirect(BASE_URL."CommonControls/loadLoginView");
            }

            $order = $productorder->where("orderid",$orderid);
            $vehicleno = $order[0]->deliverby;

            $productorder->update($orderid,"orderid",["orderstatus"=>"finished"]);
            $vehicle->update($vehicleno,"registrationnumber",["availability"=>1]);
            
            $this->redirect(BASE_URL."PmControls/index");
        }

        function cancelOrder($orderid){

            if(!Auth::loggedIn()){
                $this->redirect(BASE_URL."CommonControls/loadLoginView");
            }

            if($_SESSION["USER"]->Role != "productionmanager"){
                $this->redirect(BASE_URL."CommonControls/loadLoginView");
            }

            $productorder = new ProductOrder();
            $productorder->update($orderid,"orderid",["orderstatus"=>"cancelled"]);
            $this->redirect(BASE_URL."PmControls/index");
        }

        function moredetails($unique_id){

            if($_SESSION["USER"]->Role != "productionmanager"){
                $this->redirect(BASE_URL."CommonControls/loadLoginView");
            }

            $productorderline = new ProductOrderLine();
            $productorderlines = $productorderline->where("unique_id",$unique_id);
            echo $this->view("productionmanager/moredetailsorder",["productorderlines"=>$productorderlines]);
        }

        function showassignvehicles($orderid){  

            if(!Auth::loggedIn()){
                $this->redirect(BASE_URL."CommonControls/loadLoginView");
            }

            if($_SESSION["USER"]->Role != "productionmanager"){
                $this->redirect(BASE_URL."CommonControls/loadLoginView");
            }

            $vehicle = new Vehicle();
            $vehicles = $vehicle->where("availability",1);
            echo $this->view("productionmanager/assignvehicle",["orderid"=>$orderid, "vehicles"=>$vehicles]);
        }

        function assignvehicle($vehicleno, $orderid){

            if(!Auth::loggedIn()){
                $this->redirect(BASE_URL."CommonControls/loadLoginView");
            }

            if($_SESSION["USER"]->Role != "productionmanager"){
                $this->redirect(BASE_URL."CommonControls/loadLoginView");
            }

            $productorder = new ProductOrder();
            $vehicle = new Vehicle();

            $vehiclerow = $vehicle->where("vehicleno",$vehicleno);
            $registrationnumber = $vehiclerow[0]->registrationnumber;
            $vehicle->update($vehicleno,"vehicleno",["availability"=>0]);
            $productorder->update($orderid,"orderid",["deliverby"=>$registrationnumber]);
            $productorder->update($orderid,"orderid",["orderstatus"=>"ondelivery"]);

            $this->redirect(BASE_URL."PmControls/index");
        }

        function searchVehicle(){
            if(!Auth::loggedIn()){
                $this->redirect(BASE_URL."CommonControls/loadLoginView");
            }

            if($_SESSION["USER"]->Role != "productionmanager"){
                $this->redirect(BASE_URL."CommonControls/loadLoginView");
            }

            $searchQuery =  $_GET['search'];
            $vehicle = new Vehicle();

            $vehicleByType = $vehicle->where("type",$searchQuery);
            $vehicleByRegNo = $vehicle->where("registrationnumber",$searchQuery);
            $vehicleByCapacity = $vehicle->capacitygreaterthan($searchQuery);

            if($vehicleByType){
                echo $this->view("productionmanager/vehicles", [ "vehicles" => $vehicleByType]);
            }else if($vehicleByRegNo){
                echo $this->view("productionmanager/vehicles", [ "vehicles" => $vehicleByRegNo]);
            }else if($vehicleByCapacity){
                echo $this->view("productionmanager/vehicles", [ "vehicles" => $vehicleByCapacity]);
            }else{
                $this->redirect(BASE_URL."PmControls/loadVehiclesView");
            }

        }


        function createvehicle(){

            if(!Auth::loggedIn()){
                $this->redirect(BASE_URL."CommonControls/loadLoginView");
            }

            if($_SESSION["USER"]->Role != "productionmanager"){
                $this->redirect(BASE_URL."CommonControls/loadLoginView");
            }
            
            $vehicle = new Vehicle();

            $foundvehiclebyregisternumber = $vehicle->where("registrationnumber",$_POST["registrationnumber"]);
            $foundvehiclebychassinumber = $vehicle->where("chassinumber",$_POST["chassinumber"]);
            $foundvehiclebyenginenumber = $vehicle->where("enginenumber",$_POST["enginenumber"]);

            if ($foundvehiclebyregisternumber[0]->registrationnumber == $_POST["registrationnumber"]){
                $error = "Vehicle already exists";
                echo $this->view("PmControls/addvehicle",["error"=>$error]);
            }else {
                $arr["registrationnumber"] = $_POST["registrationnumber"];
            }

            $arr["type"] = $_POST["type"];
            $arr["capacity"] = $_POST["capacity"];

            if($foundvehiclebychassinumber[0]->chassinumber == $_POST["chassinumber"]){
                $error = "Chassis Number already exists";
                echo $this->view("PmControls/addvehicle",["error"=>$error]);
            }else {
                $arr["chassinumber"] = $_POST["chassinumber"];
            }

            if($foundvehiclebyenginenumber[0]->enginenumber == $_POST["enginenumber"]){
                $error = "Engine Number already exists";
                echo $this->view("PmControls/addvehicle",["error"=>$error]);
            }else {
                $arr["enginenumber"] = $_POST["enginenumber"];
            }
            
            $arr["modelname"] = $_POST["modelname"];

            $vehicle->insert($arr);
            $this->redirect(BASE_URL."PmControls/loadVehiclesView");  
        }

        function loadVehiclesView(){

            if(!Auth::loggedIn()){
                $this->redirect(BASE_URL."CommonControls/loadLoginView");
            }

            if($_SESSION["USER"]->Role != "productionmanager"){
                $this->redirect(BASE_URL."CommonControls/loadLoginView");
            }

            $vehicle = new Vehicle();
            $vehicles = $vehicle->findall();
            echo $this->view("productionmanager/vehicles", [ "vehicles" => $vehicles]);
        }

        function deletevehicle($vehicleid){

            if(!Auth::loggedIn()){
                $this->redirect(BASE_URL."CommonControls/loadLoginView");
            }

            if($_SESSION["USER"]->Role != "productionmanager"){
                $this->redirect(BASE_URL."CommonControls/loadLoginView");
            }
            
            $vehicle = new Vehicle();
            $vehicle->update($vehicleid,"vehicleno",["ActiveState"=>0, "availability"=>0]);

            $this->redirect(BASE_URL."PmControls/loadVehiclesView");
        
        }

        function editvehicle(){

            if(!Auth::loggedIn()){
                $this->redirect(BASE_URL."CommonControls/loadLoginView");
            }

            if($_SESSION["USER"]->Role != "productionmanager"){
                $this->redirect(BASE_URL."CommonControls/loadLoginView");
            }

            $vehicle = new Vehicle();
            
            $vehicleid = $_POST['id'];

            if (!empty($_POST['type'])){
                $data['type'] = $_POST['type'];
            }
            if (!empty($_POST['capacity'])){
                $data['capacity'] = $_POST['capacity'];
            }
            if (!empty($_POST['availability'])){
                if ($_POST['availability'] == "1"){
                    $data['availability'] = 1;
                }else{
                    $data['availability'] = 0;
                }
            }
           
            if (!empty($_POST['modelname'])){
                $data['modelname'] = $_POST['modelname'];
            }
            var_dump($data);
            echo $vehicle->update($vehicleid,"vehicleno",$data);
            $this->redirect(BASE_URL."PmControls/loadVehiclesView");
        }


        // views
        function AddVehicle(){

            if(!Auth::loggedIn()){
                $this->redirect(BASE_URL."CommonControls/loadLoginView");
            }

            if($_SESSION["USER"]->Role != "productionmanager"){
                $this->redirect(BASE_URL."CommonControls/loadLoginView");
            }


            echo $this->view("productionmanager/addvehicle");
        }

        function EditVehicleView($vehicleid){

            if(!Auth::loggedIn()){
                $this->redirect(BASE_URL."CommonControls/loadLoginView");
            }

            if($_SESSION["USER"]->Role != "productionmanager"){
                $this->redirect(BASE_URL."CommonControls/loadLoginView");
            }

            $vehicle = new Vehicle();
            $data = $vehicle->where("vehicleno",$vehicleid);

            echo $this->view("productionmanager/editvehicle",["data"=>$data]);
        }

    }
?>