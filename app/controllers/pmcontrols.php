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
    $productorder = $ProductOrder->findCustomerOrders();
    echo $this->view("productionmanager/pmorders", ["productorder" => $productorder]);

    }
    
                                    // CUSTOMER ORDERS
    // Views
   /* // Pending Orders View - customer
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
    $productorder = $ProductOrder->findCustomerOrders();
    echo $this->view("productionmanager/pmorders", ["productorder" => $productorder]);
} */

// functions
    // Process Order - customer
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
        $this->redirect(BASE_URL . "pmcontrols/index");
    }

    // Complete Production Order - customer
    function completeProductionOrder($orderid)
    {
        if (!Auth::loggedIn()) {
            $this->redirect(BASE_URL . "CommonControls/loadLoginView");
        }
        if ($_SESSION["USER"]->Role != "productionmanager") {
            $this->redirect(BASE_URL . "CommonControls/loadLoginView");
        }

        $productorder = new ProductOrder;
        $productorder->update($orderid, "orderid", ["orderstatus" => "finishedproduction"]);
        $this->redirect(BASE_URL . "pmcontrols/index");
    }


    // Complete Order - Customer
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

        $this->redirect(BASE_URL . "pmcontrols/index");
    }

    // Cancel Order - customer
    function cancelOrder($orderid)
    {
        if (!Auth::loggedIn()) {
            $this->redirect(BASE_URL . "CommonControls/loadLoginView");
        }
        if ($_SESSION["USER"]->Role != "productionmanager") {
            $this->redirect(BASE_URL . "CommonControls/loadLoginView");
        }

        $productorder = new ProductOrder;
        $productorder->update($orderid, "orderid", ["orderstatus" => "cancled"]);
        $this->redirect(BASE_URL . "pmcontrols/index");
    }

                                    //OUTLET ORDERS
    //VIEWS
    //Outlet Orders View
    function outletOrdersView(){
        if (!Auth::loggedIn()) {
            $this->redirect(BASE_URL . "CommonControls/loadLoginView");
            return;
        }

        if ($_SESSION["USER"]->Role !== "productionmanager") {
            $this->redirect(BASE_URL . "CommonControls/loadLoginView");
            return;
        }

        $ProductOrder = new ProductOrder;
        $productorder = $ProductOrder->findOutletOrders();
        echo $this->view("productionmanager/outletorders", ["productorder"=>$productorder]);
    }

    //FUNCTIONS
    // Process Order - outlet
    function processOrderOutlet($orderid)
    {
        if (!Auth::loggedIn()) {
            $this->redirect(BASE_URL . "CommonControls/loadLoginView");
        }
        if ($_SESSION["USER"]->Role != "productionmanager") {
            $this->redirect(BASE_URL . "CommonControls/loadLoginView");
        }

        $productorder = new ProductOrder;
        $productorder->update($orderid, "orderid", ["orderstatus" => "processing"]);
        $this->redirect(BASE_URL . "pmcontrols/outletOrdersView");
    }

    // Complete Production Order - outlet
    function completeProductionOrderOutlet($orderid)
    {
        if (!Auth::loggedIn()) {
            $this->redirect(BASE_URL . "CommonControls/loadLoginView");
        }
        if ($_SESSION["USER"]->Role != "productionmanager") {
            $this->redirect(BASE_URL . "CommonControls/loadLoginView");
        }

        $productorder = new ProductOrder;
        $productorder->update($orderid, "orderid", ["orderstatus" => "finishedproduction"]);
        $this->redirect(BASE_URL . "pmcontrols/index");
    }

    // Complete Order - outlet
    function completeOrderOutlet($orderid)
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

        $this->redirect(BASE_URL . "pmcontrols/outletOrdersView");
    }

    // Cancel Order - outlet
    function cancelOrderOutlet($orderid)
    {
        if (!Auth::loggedIn()) {
            $this->redirect(BASE_URL . "CommonControls/loadLoginView");
        }
        if ($_SESSION["USER"]->Role != "productionmanager") {
            $this->redirect(BASE_URL . "CommonControls/loadLoginView");
        }

        $productorder = new ProductOrder;
        $productorder->update($orderid, "orderid", ["orderstatus" => "cancled"]);
        $this->redirect(BASE_URL . "pmcontrols/outletOrdersView");
    }


                                                            // VEHICLE
    // VIEWS
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
    function assignVehicleView($orderid) //, $capacity
    {
        if (!Auth::loggedIn()) {
            $this->redirect(BASE_URL . "CommonControls/loadLoginView");
        }
        if ($_SESSION["USER"]->Role != "productionmanager") {
            $this->redirect(BASE_URL . "CommonControls/loadLoginView");
        }

        $vehicle = new vehicle;
        //$capacity = $vehicle->where("capacity", $capacity);
        $vehicles = $vehicle->assignVehicle(); //$capacity

        echo $this->view("productionmanager/assignvehicle", ["orderid"=>$orderid, "vehicles"=>$vehicles]);
    }

    //Edit Vehicle View
    function editVehicleView($vehicleno){
        if (!Auth::loggedIn()) {
            $this->redirect(BASE_URL . "CommonControls/loadLoginView");
        }
        if ($_SESSION["USER"]->Role != "productionmanager") {
            $this->redirect(BASE_URL . "CommonControls/loadLoginView");
        }
        $vehicle = new Vehicle;
        $data = $vehicle->where("vehicleno",$vehicleno);

        echo $this->view("productionmanager/editvehicle", ["data"=>$data]);
    }

    // FUNCTIONS
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

        $vehicle = new vehicle;
        $vehicleid = $_POST['id'];
        $data = [];

        if(!empty($_POST['registrationnumber'])){
            $data['registrationnumber']=$_POST['registrationnumber'];
        }
        if(!empty($_POST['type'])){
            $data['type']=$_POST['type'];
        }
        if (!empty($_POST['modelname'])){
            $data['modelname'] = $_POST['modelname'];
        }
        if (!empty($_POST['chassinumber'])){
            $data['chassinumber'] = $_POST['chassinumber'];
        }
        if (!empty($_POST['enginenumber'])){
            $data['enginenumber'] = $_POST['enginenumber'];
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

        var_dump($data);
        $vehicle->update($vehicleid,"vehicleno",$data);
        echo $this->redirect("productionmanager/loadVehiclesView");
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

    // Assign Vehicle - cutomer order
    function assignVehicle($vehicleno, $orderid)
    {
        if (!Auth::loggedIn()) {
            $this->redirect(BASE_URL . "CommonControls/loadLoginView");
        }
        if ($_SESSION["USER"]->Role != "productionmanager") {
            $this->redirect(BASE_URL . "CommonControls/loadLoginView");
        }
        
       // $sms = new SMS();

        $productorder = new ProductOrder;
        $vehicle = new vehicle;
        $customer = new Customer;

        $vehicleassign = $vehicle->where("vehicleno",$vehicleno);
        $registrationnumber = $vehicleassign[0]->registrationnumber;

        $order = $productorder->where("orderid",$orderid);
       // $placedby = $order[0]->placeby;
         /* $placedcustomer = $customer->where("UserName",$placedby);

       if($placedcustomer){
            $custoemrcontactno = $placedcustomer[0]->contactNo;
        }
*/
        $vehicle->update($vehicleno,"vehicleno",["availability"=>0]);
        $productorder->update($orderid,"orderid",["deliverby"=>$registrationnumber]);
        $productorder->update($orderid,"orderid",["orderstatus"=>"ondelivery"]);


    /*    if($custoemrcontactno){
            $message = "Your Order RefID : ".$order[0]->orderref." is on the way";
            echo $message;
            $sms->sendSMS($custoemrcontactno,$message);
            $this->redirect(BASE_URL . "pmcontrols/index");
        }else{
            $this->redirect(BASE_URL . "pmcontrols/index");
        } */
    }

    // Assign Vehicle - outlet order
    function assignVehicleOutlet($vehicleno, $orderid)
    {
        if (!Auth::loggedIn()) {
            $this->redirect(BASE_URL . "CommonControls/loadLoginView");
        }
        if ($_SESSION["USER"]->Role != "productionmanager") {
            $this->redirect(BASE_URL . "CommonControls/loadLoginView");
        }
        
      //  $sms = new SMS();

        $productorder = new ProductOrder;
        $vehicle = new vehicle;
        $customer = new Customer;

        $vehicleassign = $vehicle->where("vehicleno",$vehicleno);
        $registrationnumber = $vehicleassign[0]->registrationnumber;

        $order = $productorder->where("orderid",$orderid);
       // $placedby = $order[0]->placeby;
        /* $placedcustomer = $customer->where("UserName",$placedby);

        if($placedcustomer){
            $custoemrcontactno = $placedcustomer[0]->contactNo;
        }
*/
        $vehicle->update($vehicleno,"vehicleno",["availability"=>0]);
        $productorder->update($orderid,"orderid",["deliverby"=>$registrationnumber]);
        $productorder->update($orderid,"orderid",["orderstatus"=>"ondelivery"]);

/*
        if($custoemrcontactno){
            $message = "Your Order RefID : ".$order[0]->orderref." is on the way";
            echo $message;
            $sms->sendSMS($custoemrcontactno,$message);
            $this->redirect(BASE_URL . "pmcontrols/outletOrdersView");
        }else{
            $this->redirect(BASE_URL . "pmcontrols/outletOrdersView");
        } */
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

        $ProductOrder = new ProductOrder;
        $orders = $ProductOrder->tomarrowOrders();
        $productorder = $ProductOrder->findall();

        foreach ($orders as $order) {
            $uniqueIds[] = $order->unique_id;
        }
        
        $productorderline = new ProductOrderLine();
        $productorderlines = $productorderline->productOrderLinesbyUniqueIds($uniqueIds);

        $unique_id = uniqid();

        $stockitem = new StockItem();
        $stockitems = $stockitem->getDistinct("Name");

        $tomorrow = date("Y-m-d", strtotime('+1 day'));
        $stockorder = new StockOrder();
        $placedstockorder = $stockorder->where("ondate", $tomorrow);

        $stocorderlines = new StockOrderLine();
        if($placedstockorder != null){
            foreach ($placedstockorder as $stockorder) {
                $StockuniqueIds[] = $stockorder->unique_id;
            }
            $stockorderlines = $stocorderlines->StockOrderLinesbyUniqueIds($StockuniqueIds);
        
        }

        if($productorderlines != null && $placedstockorder != null){
            echo $this->view("productionmanager/rmrequests", ["productorderlines" => $productorderlines, "unique_id" => $unique_id, "stockitems" => $stockitems, "placedstockorder" => $placedstockorder, "stockorderlines" => $stockorderlines]);
        }else{
            echo $this->view("productionmanager/rmrequests", ["productorderlines" => $productorderlines, "unique_id" => $unique_id, "stockitems" => $stockitems, "placedstockorder" => $placedstockorder]);
        }
    
        }

    function InstertRawMaterialRequest(){
        if (!Auth::loggedIn()) {
            $this->redirect(BASE_URL . "CommonControls/loadLoginView");
        }
        if ($_SESSION["USER"]->Role != "productionmanager") {
            $this->redirect(BASE_URL . "CommonControls/loadLoginView");
        }

        $stockorderlines = $_POST;
        
        for ($i = 0; $i < count($stockorderlines['itemcode']); $i++) {
            $stockorderline = new StockOrderLine();
            $stockorderline->insert(["unique_id" => $stockorderlines['uniqueid'][$i], "RawName" => $stockorderlines['itemcode'][$i], "quantity" => $stockorderlines['quantity'][$i]]);
        }

        $tomorrow = date("Y-m-d", strtotime('+1 day'));

        $stockorder = new StockOrder();
        $stockorder->insert(["unique_id" => $stockorderlines['uniqueid'][0], "ondate" => $tomorrow]);
        
        $this->redirect(BASE_URL . "pmcontrols/rmView");
    }

    //Raw Materials History
    function rmHistoryView()
    {
        if (!Auth::loggedIn()) {
            $this->redirect(BASE_URL . "CommonControls/loadLoginView");
        }
        if ($_SESSION["USER"]->Role != "productionmanager") {
            $this->redirect(BASE_URL . "CommonControls/loadLoginView");
        }

        $ProductOrder = new ProductOrder;
        $productorder = $ProductOrder->findall();

echo $this->view("productionmanager/rmrequesthistory", ["productorder" => $productorder]);
}


}
?>