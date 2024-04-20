<?php

class PmControls extends Controller
{
    function index($id = null)
    {
        if (!Auth::loggedIn()) {
            $this->redirect(BASE_URL . "CommonControls/loadLoginView");
        }
        if ($_SESSION["USER"]->Role != "productionmanager") {
            $this->redirect(BASE_URL . "CommonControls/loadLoginView");
        }
    $ProductOrder = new ProductOrder;
    $productorder = $ProductOrder->findall();
    $completeorder = $ProductOrder->complete('DESC');
    echo $this->view("productionmanager/pmorders", ["productorder" => $productorder, "completeorder" => $completeorder]);

    }
    
                                    // PRODUCTION ORDERS
    // views
    // Pending Orders View(All)
    function pendingOrdersView()
{
    if (!Auth::loggedIn()) {
        $this->redirect(BASE_URL . "CommonControls/loadLoginView");
        return;
    }

    if ($_SESSION["USER"]->Role !== "productionmanager") {
        $this->redirect(BASE_URL . "CommonControls/loadLoginView");
        return;
    }

    $ProductOrder = new ProductOrder;
    $productorder = $ProductOrder->findall();
    $completeorder = $ProductOrder->complete('DESC');
    echo $this->view("productionmanager/pmorders", ["productorder" => $productorder, "completeorder" => $completeorder]);
}


    // functions
    // Process Order
    function processOrder($orderid)
    {
        if (!Auth::loggedIn()) {
            $this->redirect(BASE_URL . "CommonControls/loadLoginView");
        }
        if ($_SESSION["USER"]->Role != "productionmanager") {
            $this->redirect(BASE_URL . "CommonControls/loadLoginView");
        }

        $productorder = new ProductOrder;
        $productorder->update($orderid, "orderid", ["orderstatus" => "processing"]);
        $this->redirect(BASE_URL . "pmcontrols/pendingOrdersView");
    }

    // Cancel Order View
    function cancelOrder($orderid)
    {
        if (!Auth::loggedIn()) {
            $this->redirect(BASE_URL . "CommonControls/loadLoginView");
        }
        if ($_SESSION["USER"]->Role != "productionmanager") {
            $this->redirect(BASE_URL . "CommonControls/loadLoginView");
        }

        $productorder = new ProductOrder;
        $productorder->update($orderid, "orderid", ["orderstatus" => "canceled"]);
        $this->redirect(BASE_URL . "pmcontrols/pendingOrdersView");
    }

    
    // Complete Order
    function completeOrder($orderid)
    {
        if (!Auth::loggedIn()) {
            $this->redirect(BASE_URL . "CommonControls/loadLoginView");
        }
        if ($_SESSION["USER"]->Role != "productionmanager") {
            $this->redirect(BASE_URL . "CommonControls/loadLoginView");
        }

        $productorder = new ProductOrder;
        $vehicle = new Vehicle;
        
        $order = $productorder->where("orderid", $orderid);
        $vehicleno = $order[0]->deliverby;
        
        $productorder->update($orderid,"orderid",["orderstatus"=>"finished"]);
        $vehicle->update($vehicleno,"registrationnumber",["availability"=>1]);

        $this->redirect(BASE_URL . "pmcontrols/pendingOrdersView");
    }
/*
    // More Details View
    function moreDetails($orderid)
    {
        if (!Auth::loggedIn()) {
            $this->redirect(BASE_URL . "CommonControls/loadLoginView");
        }
        if ($_SESSION["USER"]->Role != "productionmanager") {
            $this->redirect(BASE_URL . "CommonControls/loadLoginView");
        }

        $ProductOrderLine = new ProductOrderLine;
        $productorderline = $ProductOrderLine->where("unique_id",$unique_id);
        echo $this->view("productionmanager/moredetails", ["productorderline",$productorderline]);
    }*/
    

    // VEHICLE
    // views
    // Load Vehicle View
    function loadVehiclesView()
    {
        if (!Auth::loggedIn()) {
            $this->redirect(BASE_URL . "CommonControls/loadLoginView");
        }
        if ($_SESSION["USER"]->Role != "productionmanager") {
            $this->redirect(BASE_URL . "CommonControls/loadLoginView");
        }

        $vehicle = new Vehicle();
        $vehicles = $vehicle->findall();
        echo $this->view("productionmanager/vehicles", ["vehicles" => $vehicles]);
    }

    // Add Vehicle View
    function addVehicleView()
    {
        if (!Auth::loggedIn()) {
            $this->redirect(BASE_URL . "CommonControls/loadLoginView");
        }
        if ($_SESSION["USER"]->Role != "productionmanager") {
            $this->redirect(BASE_URL . "CommonControls/loadLoginView");
        }
        echo $this->view("productionmanager/addvehicle");
    }
    
    // Assign Vehicle View
    function assignVehicleView($orderid)
    {
        if (!Auth::loggedIn()) {
            $this->redirect(BASE_URL . "CommonControls/loadLoginView");
        }
        if ($_SESSION["USER"]->Role != "productionmanager") {
            $this->redirect(BASE_URL . "CommonControls/loadLoginView");
        }

        $vehicle = new vehicle;
        $vehicles = $vehicle->where("availability",1);

        echo $this->view("productionmanager/assignvehicle", ["orderid"=>$orderid, "vehicles"=>$vehicles]);
    }

    // functions
    // Create Vehicle
    function createVehicle()
    {
        if (!Auth::loggedIn()) {
            $this->redirect(BASE_URL . "CommonControls/loadLoginView");
        }
        if ($_SESSION["USER"]->Role != "productionmanager") {
            $this->redirect(BASE_URL . "CommonControls/loadLoginView");
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
        $this->redirect(BASE_URL . "pmcontrols/loadVehiclesView");
    }

    // Edit Vehicle
    function editVehicle()
    {
        if (!Auth::loggedIn()) {
            $this->redirect(BASE_URL . "CommonControls/loadLoginView");
        }
        if ($_SESSION["USER"]->Role != "productionmanager") {
            $this->redirect(BASE_URL . "CommonControls/loadLoginView");
        }
        echo $this->redirect("productionmanager/editvehicle");
    }

    // Delete Vehicle
    function deleteVehicle($vehicleid)
    {
        if (!Auth::loggedIn()) {
            $this->redirect(BASE_URL . "CommonControls/loadLoginView");
        }
        if ($_SESSION["USER"]->Role != "productionmanager") {
            $this->redirect(BASE_URL . "CommonControls/loadLoginView");
        }

        $vehicle = new Vehicle();
        $vehicle->update($vehicleid,"vehicleno",["ActiveState"=>0, "availability"=>0]);

        $this->redirect(BASE_URL . "pmControls/loadVehiclesView");
    }

    // Assign Vehicle
    function assignVehicle($vehicleno, $orderid)
    {
        if (!Auth::loggedIn()) {
            $this->redirect(BASE_URL . "CommonControls/loadLoginView");
        }
        if ($_SESSION["USER"]->Role != "productionmanager") {
            $this->redirect(BASE_URL . "CommonControls/loadLoginView");
        }
        
        $sms = new SMS();

        $productorder = new ProductOrder;
        $vehicle = new vehicle;
        $customer = new Customer;

        $vehicleassign = $vehicle->where("vehicleno",$vehicleno);
        $registrationnumber = $vehicleassign[0]->registrationnumber;

        $order = $productorder->where("orderid",$orderid);
        $placedby = $order[0]->placeby;
        $placedcustomer = $customer->where("UserName",$placedby);

        if($placedcustomer){
            $custoemrcontactno = $placedcustomer[0]->contactNo;
        }

        $vehicle->update($vehicleno,"vehicleno",["availability"=>0]);
        $productorder->update($orderid,"orderid",["deliverby"=>$registrationnumber]);
        $productorder->update($orderid,"orderid",["orderstatus"=>"ondelivery"]);


        if($custoemrcontactno){
            $message = "Your Order RefID : ".$order[0]->orderref." is on the way";
            echo $message;
            $sms->sendSMS($custoemrcontactno,$message);
            $this->redirect(BASE_URL . "pmcontrols/pendingOrdersView");
        }else{
            $this->redirect(BASE_URL . "pmcontrols/pendingOrdersView");
        }
    }

    //Search Vehicle
    function searchVehicle(){
        if (!Auth::loggedIn()) {
            $this->redirect(BASE_URL . "CommonControls/loadLoginView");
        }
        if ($_SESSION["USER"]->Role != "productionmanager") {
            $this->redirect(BASE_URL . "CommonControls/loadLoginView");
        }

        $searchQuery = $_GET['search'];

        $vehicle = new vehicle;

        $vehicleByType = $vehicle->where("type",$searchQuery);
        $vehicleByRegNo = $vehicle->where("registrationnumber",$searchQuery);
        $vehicleByCapacity = $vehicle->where("capacity",$searchQuery);

        if($vehicleByType){
            echo $this->view("productionmanager/vehicles",["vehicles",$vehicleByType]);
        }
        else if($vehicleByRegNo){
            echo $this->view("productionmanager/vehicles",["vehicles",$vehicleByRegNo]);
        }
        else if($vehicleByCapacity){
            echo $this->view("productionmanager/vehicles",["vehicles",$vehicleByCapacity]);
        }
        else{
            $this->redirect(BASE_URL."pmcontrols/loadVehiclesView");
        }
    }


    // RAW MATERIALS
    // views
    // Raw Materials Request View
    function rmView()
    {
        if (!Auth::loggedIn()) {
            $this->redirect(BASE_URL . "CommonControls/loadLoginView");
        }
        if ($_SESSION["USER"]->Role != "productionmanager") {
            $this->redirect(BASE_URL . "CommonControls/loadLoginView");
        }
        echo $this->view("productionmanager/rmrequests");
    }
}

?>
