<?php

class PmControls extends Controller
{
    function index($id = null)
    {
        if (!Auth::loggedIn()) {
            $this->redirect(BASE_URL."CommonControls/loadLoginView");
        }
        if($_SESSION["USER"]->Role != "productionmanager"){
            $this->redirect(BASE_URL."CommonControls/loadLoginView");
        }
        $this->view("productionmanager/pmdash");
    }

    // Pending Orders (All)
    function pendingOrdersView()
    {
        if (!Auth::loggedIn()) {
            $this->redirect(BASE_URL."CommonControls/loadLoginView");
        }
        if($_SESSION["USER"]->Role != "productionmanager"){
            $this->redirect(BASE_URL."CommonControls/loadLoginView");
        }

        $porder = new ProductOrder;
        $productorder = $porder->findall();
        echo $this->view("productionmanager/pmorders", ["porder" => $productorder]);
    }

    // Process Order
    function processOrder($orderid, $deliverystatus){
        if (!Auth::loggedIn()) {
            $this->redirect(BASE_URL."CommonControls/loadLoginView");
        }
        if($_SESSION["USER"]->Role != "productionmanager"){
            $this->redirect(BASE_URL."CommonControls/loadLoginView");
        }
        
        echo $this->view("productionmanager/pmorders");
    }

    // Cancel Order
    function cancelOrder($orderid){
        if (!Auth::loggedIn()) {
            $this->redirect(BASE_URL."CommonControls/loadLoginView");
        }
        if($_SESSION["USER"]->Role != "productionmanager"){
            $this->redirect(BASE_URL."CommonControls/loadLoginView");
        }
        
        echo $this->view("productionmanager/pmorders");
    }

    // Complete Order
    function completeOrder($orderid){
        if (!Auth::loggedIn()) {
            $this->redirect(BASE_URL."CommonControls/loadLoginView");
        }
        if($_SESSION["USER"]->Role != "productionmanager"){
            $this->redirect(BASE_URL."CommonControls/loadLoginView");
        }
        
        echo $this->view("productionmanager/pmorders");
    }

    // More Details
    function moreDetails($orderid){
        if (!Auth::loggedIn()) {
            $this->redirect(BASE_URL."CommonControls/loadLoginView");
        }
        if($_SESSION["USER"]->Role != "productionmanager"){
            $this->redirect(BASE_URL."CommonControls/loadLoginView");
        }
        
        echo $this->view("productionmanager/pmorders");
    }

    // Load Vehicle View
    function loadVehiclesView()
    {
        if (!Auth::loggedIn()) {
            $this->redirect(BASE_URL."CommonControls/loadLoginView");
        }
        if($_SESSION["USER"]->Role != "productionmanager"){
            $this->redirect(BASE_URL."CommonControls/loadLoginView");
        }

        $vehicle = new vehicle();
        $vehicles = $vehicle->findall();
        echo $this->view("productionmanager/vehicles", ["vehicles" => $vehicles]);
    }

    // Add Vehicle View
    function addVehicleView()
    {
        if (!Auth::loggedIn()) {
            $this->redirect(BASE_URL."CommonControls/loadLoginView");
        }
        if($_SESSION["USER"]->Role != "productionmanager"){
            $this->redirect(BASE_URL."CommonControls/loadLoginView");
        }
        echo $this->view("productionmanager/addvehicle");
    }

    //create vehicle
    function createVehicle() {
        if (!Auth::loggedIn()) {
            $this->redirect(BASE_URL."CommonControls/loadLoginView");
        }
        if ($_SESSION["USER"]->Role != "productionmanager") {
            $this->redirect(BASE_URL."CommonControls/loadLoginView");
        }
    
        $vehicle = new Vehicle();
    
        $foundregistrationnumber = $vehicle->where("registrationnumber", $_POST["registrationnumber"]);
        $foundchassinumber = $vehicle->where("chassinumber", $_POST["chassinumber"]);
        $foundenginenumber = $vehicle->where("enginenumber", $_POST["enginenumber"]);
    
        if (!empty($foundregistrationnumber)) {
            $error = "Vehicle Already Exists";
            echo $this->view("pmcontrols/addVehicleView", ["error" => $error]);
        } else {
            $arr["registrationnumber"] = $_POST["registrationnumber"];
        }
    
        $arr["type"] = $_POST["type"];
        $arr["modelname"] = $_POST["modelname"];
    
        if (!empty($foundchassinumber)) {
            $error = "Chassis Number Already Exists";
            echo $this->view("pmcontrols/addVehicleView", ["error" => $error]);
        } else {
            $arr["chassinumber"] = $_POST["chassinumber"];
        }
    
        if (!empty($foundenginenumber)) {
            $error = "Engine Number Already Exists";
            echo $this->view("pmcontrols/addVehicleView", ["error" => $error]);
        } else {
            $arr["enginenumber"] = $_POST["enginenumber"];
        }
    
        $arr["capacity"] = $_POST["capacity"];
    
        $vehicle->insert($arr);
        $this->redirect(BASE_URL."pmcontrols/loadVehiclesView");
    }
    
    // Raw Materials Request View
    function rmView()
    {
        if (!Auth::loggedIn()) {
            $this->redirect(BASE_URL."CommonControls/loadLoginView");
        }
        if($_SESSION["USER"]->Role != "productionmanager"){
            $this->redirect(BASE_URL."CommonControls/loadLoginView");
        }
        echo $this->view("productionmanager/rmrequests");
    }
}
?>
