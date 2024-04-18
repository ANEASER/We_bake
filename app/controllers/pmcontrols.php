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
        $this->view("productionmanager/pmdash");
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

        $ProductOrder = new ProductOrder;
        $ProductOrder->update($orderid, "orderid", ["orderstatus" => "processing"]);
        $this->redirect(BASE_URL . "pmcontrols/index");
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

        $ProductOrder = new ProductOrder;
        $ProductOrder->update($orderid, "orderid", ["orderstatus" => "canceled"]);
        $this->redirect(BASE_URL . "pmcontrols/index");
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

        $ProductOrder = new ProductOrder;
        $order = $ProductOrder->where("orderid", $orderid);
        $vehicleno = $order->deliverby;
        $productorder->update($orderid,"orderid",["orderstatus"=>"finished"]);

        $vehicle = new vehicle;
        $vehicle->update($vehicleno,"registrationnumber",["availability"=>1]);

        echo $this->view("productionmanager/pmorders");
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
        $vehicles = $vehicle->where("availablitiy",1);

        echo $this->view("productionmanager/assignvehicle", ["orderid"=>$orderid, "vehicleno"=>$vehicles]);
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
        echo $this->view("productionmanager/editvehicle");
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
        $vehicle->deleteVehicle($vehicleid);

        $this->redirect(BASE_URL . "PmControls/loadVehiclesView");
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

        $ProductOrder = new ProdutOrder;
        $vehicle = new vehicle;

        $vehicleassign = $vehicle->where("vehicleno",$vehicleno);
        $registrationnumber = $vehicleassign->registrationnumber;

        $vehicle->update($vehcileno,"vehicleno",["availability"=>0]);
        $productorder->update($rderid,"orderid",["deliveryby"=>$registrationnumber]);
        $productorder->update($orderid,"orderid",["ordertatus"=>"ondelivery"]);

        echo $this->view("productionmanager/pmorders");
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
