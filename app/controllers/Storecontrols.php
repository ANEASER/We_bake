<?php
class StoreControls extends Controller {
    
    
    function index($id = null) {
        if(!Auth::loggedIn()){
            $this->redirect("CommonControls/loadLoginView");
        }

        if($_SESSION["USER"]->Role != "storemanager"){
            $this->redirect(BASE_URL."CommonControls/loadLoginView");
        }


        $stockItem = new StockItem();
        
        $stocks = $stockItem->findall();

        // $this->view("storemanager/smdash");
        $this->redirect(BASE_URL."StoreControls/loadSortedSupplies");
    }

    //Home Page functions

    function loadSortedSupplies(){
        if(!Auth::loggedIn()){
            $this->redirect("CommonControls/loadLoginView");
        }

        if($_SESSION["USER"]->Role != "storemanager"){
            $this->redirect(BASE_URL."CommonControls/loadLoginView");
        }

        $supplies = new Supplies();
        $supplies = $supplies->getSorted('ExpiryDate');
        echo $this->view("storemanager/smdash",  ["supplies" => $supplies]);        
    }


    //Stock Items CRUDs and functions


    function viewStocks(){
        if(!Auth::loggedIn()){
            $this->redirect("CommonControls/loadLoginView");
        }

        if($_SESSION["USER"]->Role != "storemanager"){
            $this->redirect(BASE_URL."CommonControls/loadLoginView");
        }

        echo $this->redirect(BASE_URL."StoreControls/loadStocksView");
    }

    function addStock(){
        echo $this->view("storemanager/addstock");
    }

    //Adding a new stock item to the system
    function addStockItem(){
        if(!Auth::loggedIn()){
            $this->redirect("CommonControls/loadLoginView");
        }

        if($_SESSION["USER"]->Role != "storemanager"){
            $this->redirect(BASE_URL."CommonControls/loadLoginView");
        }

        $stockItem = new StockItem();

        $max_stockid = $stockItem->getMinMax("ItemID","max");
        $max_stockid = $max_stockid[0]->{"max(ItemID)"};
        $max_stockid += 1;
        $max_stockid = str_pad($max_stockid, 4, '0', STR_PAD_LEFT);

        $stockref = "SI".$max_stockid;

        $arr["Name"] = $_POST["Name"];
        $arr["Type"] = $_POST["Type"];
        $arr["UnitOfMeasurement"] = $_POST["UnitOfMeasurement"];
        $arr["MinimumStock"] = $_POST["MinimumStock"];
        $arr["CriticalStock"] = $_POST["CriticalStock"];
        $arr["CustomItemID"] = $stockref;
        $stockItem->insert($arr);
        $this->redirect(BASE_URL."StoreControls/viewStocks");
    }

    function loadStocksView(){
        if(!Auth::loggedIn()){
            $this->redirect("CommonControls/loadLoginView");
        }

        if($_SESSION["USER"]->Role != "storemanager"){
            $this->redirect(BASE_URL."CommonControls/loadLoginView");
        }

        $stockItem = new StockItem();
        $stocks = $stockItem->findall();
        echo $this->view("storemanager/stocks", [ "stocks" => $stocks]);        
    }

    function updateStocksView($id){
        if(!Auth::loggedIn()){
            $this->redirect("CommonControls/loadLoginView");
        }

        if($_SESSION["USER"]->Role != "storemanager"){
            $this->redirect(BASE_URL."CommonControls/loadLoginView");
        }

        $stockItem = new StockItem();
        $stocks = $stockItem->where("ItemID",$id);
        echo $this->view("storemanager/updatestock",  ["stocks" => $stocks]);   
    }

    function updateStocks(){
        if(!Auth::loggedIn()){
            $this->redirect("CommonControls/loadLoginView");
        }

        if($_SESSION["USER"]->Role != "storemanager"){
            $this->redirect(BASE_URL."CommonControls/loadLoginView");
        }

        $stockItem = new StockItem();

        $id = $_POST['id'];
        $data = []; // Initialize an empty array to store validated data

        if (!empty($_POST['Name'])){
            $data['Name'] = $_POST['Name'];
        } 

        if (!empty($_POST['Type'])){
            $data['Type'] = $_POST['Type'];
        } 

        if (!empty($_POST['UnitOfMeasurement'])){
            $data['UnitOfMeasurement'] = $_POST['UnitOfMeasurement'];
        }
        
        if (!empty($_POST['MinimumStock'])){
            $data['MinimumStock'] = $_POST['MinimumStock'];
        }

        if (!empty($_POST['CriticalStock'])){
            $data['CriticalStock'] = $_POST['CriticalStock'];
        }

        echo $stockItem->update($id, "ItemID", $data);
        $this->redirect(BASE_URL."StoreControls/viewStocks");

    }

    function deleteStocks($id){
        if(!Auth::loggedIn()){
            $this->redirect("CommonControls/loadLoginView");
        }

        if($_SESSION["USER"]->Role != "storemanager"){
            $this->redirect(BASE_URL."CommonControls/loadLoginView");
        }

        $stockItem = new StockItem();
        $stocks = $stockItem->delete($id,"ItemID");
        $this->redirect(BASE_URL."StoreControls/viewStocks");
    }

    function searchItem() {
        if(!Auth::loggedIn()){
            $this->redirect("CommonControls/loadLoginView");
        }

        if($_SESSION["USER"]->Role != "storemanager"){
            $this->redirect(BASE_URL."CommonControls/loadLoginView");
        }

        $searchQuery = isset($_GET['search']) ? $_GET['search'] : '';
    
        $stockItem = new StockItem();
    
        // Search by Name starting with the search query
        $itemByName = $stockItem->whereLike("Name", $searchQuery . '%');
    
        // Search by Type starting with the search query
        $itemByType = $stockItem->whereLike("Type", $searchQuery . '%');
    
        // Combine results from both searches
        $stocks = array_merge($itemByName, $itemByType);
    
        echo $this->view("storemanager/stocks", ["stocks" => $stocks]);
    }
    


    ///CRUD for Supplies

    function viewSupplies(){
        if(!Auth::loggedIn()){
            $this->redirect("CommonControls/loadLoginView");
        }

        if($_SESSION["USER"]->Role != "storemanager"){
            $this->redirect(BASE_URL."CommonControls/loadLoginView");
        }

        echo $this->redirect(BASE_URL."StoreControls/loadSuppliesView");
    }

    function loadSuppliesView(){
        if(!Auth::loggedIn()){
            $this->redirect("CommonControls/loadLoginView");
        }

        if($_SESSION["USER"]->Role != "storemanager"){
            $this->redirect(BASE_URL."CommonControls/loadLoginView");
        }

        $supplies = new Supplies();
        $supplies = $supplies->findall();
        echo $this->view("storemanager/supplies",  ["supplies" => $supplies]);        
    }

    function insertSupplyView($id){
        if(!Auth::loggedIn()){
            $this->redirect("CommonControls/loadLoginView");
        }

        if($_SESSION["USER"]->Role != "storemanager"){
            $this->redirect(BASE_URL."CommonControls/loadLoginView");
        }

        $stockItem = new StockItem();
        $stocks = $stockItem->where("ItemID",$id);
        echo $this->view("storemanager/addsupply",  ["stocks" => $stocks]);
    }

    function insertSupply(){
        if(!Auth::loggedIn()){
            $this->redirect("CommonControls/loadLoginView");
        }

        if($_SESSION["USER"]->Role != "storemanager"){
            $this->redirect(BASE_URL."CommonControls/loadLoginView");
        }

        $stockItem = new StockItem();
        $supplies = new Supplies();

        $id = $_POST['id'];
        $data = [];

        $max_supplyid = $supplies->getMinMax("SupplyID","max");
        $max_supplyid = $max_supplyid[0]->{"max(SupplyID)"};
        $max_supplyid += 1;
        $max_supplyid = str_pad($max_supplyid, 4, '0', STR_PAD_LEFT);

        $supplyref = "SP".$max_supplyid;

        $data['StockItemID'] = $_POST['StockItemID'];
        $data['CustomStockItemID'] = $_POST['CustomStockItemID'];
        $data['stockItemName'] = $_POST['stockItemName'];
        $data['DeliveredDate'] = $_POST['DeliveredDate'];
        $data['InvoiceNo'] = $_POST['InvoiceNo'];
        $data['ExpiryDate'] = $_POST['ExpiryDate'];
        $data['DeliveredQuantity'] = $_POST['DeliveredQuantity'];
        $data["CustomSupplyID"] = $supplyref;

        $supplies->insert($data);
        $stocks = $stockItem->where("ItemID", $data['StockItemID']);

        $item = [];
        $item['AvailableStock'] = $stocks[0]->AvailableStock + $_POST['DeliveredQuantity'];

        $stockItem->update($data['StockItemID'], "ItemID", $item);


        echo $this->redirect(BASE_URL . "StoreControls/viewStocks"); 

    }

    // function deleteSupplies($id){
    //     $supplies = new Supplies();
    //     $supplies = $supplies->delete($id,"SupplyID");
    //     $this->redirect(BASE_URL."StoreControls/viewSupplies");
    // }

    function deleteSupplies($id){
        if(!Auth::loggedIn()){
            $this->redirect("CommonControls/loadLoginView");
        }

        if($_SESSION["USER"]->Role != "storemanager"){
            $this->redirect(BASE_URL."CommonControls/loadLoginView");
        }

        // Create instances of StockItem and Supplies models
        $stockItem = new StockItem();
        $supplies = new Supplies();
    
        $supply = $supplies->where("SupplyID",$id);
        $itemID = $supply[0]->StockItemID;
        $deliveredQuantity = $supply[0]->DeliveredQuantity;
             
        $stocks = $stockItem->where("ItemID", $itemID); // Retrieve the current available stock for the supplied item
        $currentStock = $stocks[0]->AvailableStock;
              
        $newStock = $currentStock - $deliveredQuantity; // Update the available stock by subtracting the deleted delivered quantity
        
        $item = ['AvailableStock' => $newStock]; // Update the stockItem table with the new available stock
        $stockItem->update($itemID, "ItemID", $item);
 
        $supplies->delete($id, "SupplyID"); // Delete the supply record

        $this->redirect(BASE_URL . "StoreControls/viewSupplies");
    }
    
    function updateSuppliesView($id){
        if(!Auth::loggedIn()){
            $this->redirect("CommonControls/loadLoginView");
        }

        if($_SESSION["USER"]->Role != "storemanager"){
            $this->redirect(BASE_URL."CommonControls/loadLoginView");
        }

        $supplies = new Supplies();
        $supplies = $supplies->where("SupplyID",$id);
        echo $this->view("storemanager/updatesupplies",  ["supplies" => $supplies]);
    }

    // function updateSupplies(){
    //     $stockItem = new StockItem();
    //     $supplies = new Supplies();

    //     $id = $_POST['id'];
    //     $data = [];

    //     if (!empty($_POST['StockItemID'])){
    //         $data['StockItemID'] = $_POST['StockItemID'];
    //     }

    //     if (!empty($_POST['DeliveredDate'])){
    //         $data['DeliveredDate'] = $_POST['DeliveredDate'];
    //     }

    //     if (!empty($_POST['InvoiceNo'])){
    //         $data['InvoiceNo'] = $_POST['InvoiceNo'];
    //     }

    //     if (!empty($_POST['ExpiryDate'])){
    //         $data['ExpiryDate'] = $_POST['ExpiryDate'];
    //     }

    //     if (!empty($_POST['DeliveredQuantity'])){
    //         $data['DeliveredQuantity'] = $_POST['DeliveredQuantity'];
    //     }

    //     echo $supplies->update($id, "SupplyID", $data);
    //     $this->redirect(BASE_URL."StoreControls/viewSupplies");

    // }


    function updateSupplies(){
        if(!Auth::loggedIn()){
            $this->redirect("CommonControls/loadLoginView");
        }

        if($_SESSION["USER"]->Role != "storemanager"){
            $this->redirect(BASE_URL."CommonControls/loadLoginView");
        }

        $stockItem = new StockItem();
        $supplies = new Supplies();
    
        $id = $_POST['id'];
        $data = [];
    
        $oldSupply = $supplies->where("SupplyID",$id); // Retrieve the old delivered quantity
        $oldDeliveredQuantity = $oldSupply[0]->DeliveredQuantity;
    
        if (!empty($_POST['StockItemID'])){
            $data['StockItemID'] = $_POST['StockItemID'];
        }
    
        if (!empty($_POST['DeliveredDate'])){
            $data['DeliveredDate'] = $_POST['DeliveredDate'];
        }
    
        if (!empty($_POST['InvoiceNo'])){
            $data['InvoiceNo'] = $_POST['InvoiceNo'];
        }
    
        if (!empty($_POST['ExpiryDate'])){
            $data['ExpiryDate'] = $_POST['ExpiryDate'];
        }
    
        if (!empty($_POST['DeliveredQuantity'])){  
            $newDeliveredQuantity = $_POST['DeliveredQuantity']; // Calculate the difference between the old and new delivered quantities
            $quantityDifference = $newDeliveredQuantity - $oldDeliveredQuantity;
            $data['DeliveredQuantity'] = $newDeliveredQuantity; // Update the delivered quantity
            $itemID = $oldSupply[0]->StockItemID; // Retrieve the current available stock for the supplied item
            $stocks = $stockItem->where("ItemID", $itemID);
            $currentStock = $stocks[0]->AvailableStock;          
            $newStock = $currentStock + $quantityDifference; // Update the available stock by adding the quantity difference
            $item = ['AvailableStock' => $newStock]; // Update the stockItem table with the new available stock
            $stockItem->update($itemID, "ItemID", $item);
        }
    
        echo $supplies->update($id, "SupplyID", $data);
        $this->redirect(BASE_URL."StoreControls/viewSupplies");
    }
    

    // function SearchSupply(){

    //     $searchQuery = isset($_GET['search']) ? $_GET['search'] : '';

    //         $supplies = new Supplies();
    //         $supplyByID = $supplies->where("SupplyID", $searchQuery);
    //         $supplyByItemID = $supplies->where("StockItemID", $searchQuery);
    //         $supplyByInvoiceNo = $supplies->where("InvoiceNo", $searchQuery);


    //         if (count($supplyByID) > 0) {
    //             $supplies = $supplyByID;
    //         } else if (count($supplyByItemID) > 0) {
    //             $supplies = $supplyByItemID;
    //         }else if (count($supplyByInvoiceNo) > 0) {
    //             $supplies = $supplyByInvoiceNo;
    //         }
    //         else {
    //             $supplies = [];
    //         }

    //         echo $this->view("storemanager/supplies",[ "supplies" => $supplies]);

    // }

    function SearchSupply() {
        if(!Auth::loggedIn()){
            $this->redirect("CommonControls/loadLoginView");
        }

        if($_SESSION["USER"]->Role != "storemanager"){
            $this->redirect(BASE_URL."CommonControls/loadLoginView");
        }

        $searchQuery = isset($_GET['search']) ? $_GET['search'] : '';
    
        $supplies = new Supplies();
        $supplyByID = $supplies->whereLike("SupplyID", $searchQuery);
        $supplyByItemID = $supplies->whereLike("StockItemID", $searchQuery);
        $supplyByInvoiceNo = $supplies->whereLike("InvoiceNo", $searchQuery);
    
        if (count($supplyByID) > 0) {
            $supplies = $supplyByID;
        } else if (count($supplyByItemID) > 0) {
            $supplies = $supplyByItemID;
        } else if (count($supplyByInvoiceNo) > 0) {
            $supplies = $supplyByInvoiceNo;
        } else {
            $supplies = [];
        }
    
        echo $this->view("storemanager/supplies", ["supplies" => $supplies]);
    }
    


    //Functions for handling production requests

    function viewProduction(){
        if(!Auth::loggedIn()){
            $this->redirect("CommonControls/loadLoginView");
        }

        if($_SESSION["USER"]->Role != "storemanager"){
            $this->redirect(BASE_URL."CommonControls/loadLoginView");
        }

        echo $this->redirect(BASE_URL."StoreControls/loadProductionView");
    }

    function loadProductionView(){
        if(!Auth::loggedIn()){
            $this->redirect("CommonControls/loadLoginView");
        }

        if($_SESSION["USER"]->Role != "storemanager"){
            $this->redirect(BASE_URL."CommonControls/loadLoginView");
        }

        $stockorder=new StockOrder();
        $stockorder = $stockorder->findall(); 
        echo $this->view("storemanager/production", [ "stockorder" => $stockorder]);        
    }

    function loadViewOrder($unique_id){
        if(!Auth::loggedIn()){
            $this->redirect("CommonControls/loadLoginView");
        }

        if($_SESSION["USER"]->Role != "storemanager"){
            $this->redirect(BASE_URL."CommonControls/loadLoginView");
        }

        $stockorder=new StockOrder();
        $stockorderline=new StockOrderLine();
        $stockorderline = $stockorderline->where("unique_id",$unique_id);
        echo $this->view("storemanager/prodorder",  ["stockorderline" => $stockorderline]);
    }

    function viewOrder(){
        if(!Auth::loggedIn()){
            $this->redirect("CommonControls/loadLoginView");
        }

        if($_SESSION["USER"]->Role != "storemanager"){
            $this->redirect(BASE_URL."CommonControls/loadLoginView");
        }

        echo $this->redirect(BASE_URL."StoreControls/loadViewOrder");
    }

    function acceptOrder($id){ //to accept a single order item
        if(!Auth::loggedIn()){
            $this->redirect("CommonControls/loadLoginView");
        }

        if($_SESSION["USER"]->Role != "storemanager"){
            $this->redirect(BASE_URL."CommonControls/loadLoginView");
        }

        $stockorder=new StockOrder();
        $stockorderline=new StockOrderLine();
        $stockItem = new StockItem();
        $supplies = new Supplies();

        $orderItem=$stockorderline->where("id",$id);
        $orderID=$orderItem[0]->unique_id;
        $itemName=$orderItem[0]->RawName;
        $requestedqty=$orderItem[0]->quantity;

        $stock=$stockItem->where("Name",$itemName);
        $stockName=$stock[0]->Name;
        $stockQty=$stock[0]->AvailableStock;

        if($stockQty<$requestedqty){
            echo "<script>alert('Stock is not enough to fulfill the order')</script>";
            $this->redirect(BASE_URL . "StoreControls/loadViewOrder/".$orderID);
        }

        $newStock=$stockQty-$requestedqty;
        $item = ['AvailableStock' => $newStock]; 
        $stockItem->update($stockName, "Name", $item);

        $stockorderline->update($id,"id",[ "status" => "Accepted" ]);
        $this->redirect(BASE_URL . "StoreControls/loadViewOrder/".$orderID);

        

    }

    function acceptFullOrder($unique_id){ //to accept the whole order
        if(!Auth::loggedIn()){
            $this->redirect("CommonControls/loadLoginView");
        }

        if($_SESSION["USER"]->Role != "storemanager"){
            $this->redirect(BASE_URL."CommonControls/loadLoginView");
        }

        $stockorder=new StockOrder();
        $stockorderline=new StockOrderLine();
        $stockItem = new StockItem();
        $supplies = new Supplies();

        $orderItems=$stockorderline->where("unique_id",$unique_id);
        $orderLineID=$orderItems[0]->unique_id;

        foreach($orderItems as $orderItem){
            $itemName=$orderItem->RawName;
            $requestedqty=$orderItem->quantity;
            

            $stock=$stockItem->where("Name",$itemName);
            $stockName=$stock[0]->Name;
            $stockQty=$stock[0]->AvailableStock;

            if($stockQty<$requestedqty){
                echo "<script>alert('Stock is not enough to fulfill the order')</script>";
                $this->redirect(BASE_URL . "StoreControls/loadViewOrder/".$unique_id);
            }

            $newStock=$stockQty-$requestedqty;
            $item = ['AvailableStock' => $newStock]; 
            $stockItem->update($stockName, "Name", $item);

            $stockorderline->update($orderItem->id,"id",[ "status" => "Accepted" ]);
        }

        $stockorder->update($unique_id,"unique_id",[ "status" => "Accepted" ]);
        $this->redirect(BASE_URL . "StoreControls/loadProductionView");

    }

    

   
}
?>
