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



        $this->view("storemanager/smdash");
    }


    function viewProfile(){
        echo $this->view("storemanager/profile");
    }

    function viewProduction(){
        echo $this->redirect(BASE_URL."StoreControls/loadProductionView");
    }

    



    //Stock Items CRUDs


    function viewStocks(){
        echo $this->redirect(BASE_URL."StoreControls/loadStocksView");
    }

    function addStock(){
        echo $this->view("storemanager/addstock");
    }

    //Adding a new stock item to the system
    function addStockItem(){
        $stockItem = new StockItem();
        $arr["Name"] = $_POST["Name"];
        $arr["Type"] = $_POST["Type"];
        $arr["UnitOfMeasurement"] = $_POST["UnitOfMeasurement"];
        $arr["MinimumStock"] = $_POST["MinimumStock"];
        $arr["CriticalStock"] = $_POST["CriticalStock"];
        $stockItem->insert($arr);
        $this->redirect(BASE_URL."StoreControls/viewStocks");
    }

    function loadStocksView(){
        $stockItem = new StockItem();
        $stocks = $stockItem->findall();
        echo $this->view("storemanager/stocks", [ "stocks" => $stocks]);        
    }

    function updateStocksView($id){
        $stockItem = new StockItem();
        $stocks = $stockItem->where("ItemID",$id);
        echo $this->view("storemanager/updatestock",  ["stocks" => $stocks]);   
    }

    function updateStocks(){
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
        $stockItem = new StockItem();
        $stocks = $stockItem->delete($id,"ItemID");
        $this->redirect(BASE_URL."StoreControls/viewStocks");
    }

    function SearchItem(){

        $searchQuery = isset($_GET['search']) ? $_GET['search'] : '';

            $stockItem = new StockItem();
            $itemByID = $stockItem->where("CustomItemID", $searchQuery);
            $itemByName = $stockItem->where("Name", $searchQuery);
            $itemByType = $stockItem->where("Type", $searchQuery);


            if (count($itemByID) > 0) {
                $stocks = $itemByID;
            } else if (count($itemByName) > 0) {
                $stocks = $itemByName;
            }else if (count($itemByType) > 0) {
                $stocks = $itemByType;
            }
            else {
                $stocks = [];
            }

            echo $this->view("storemanager/stocks",[ "stocks" => $stocks]);

    }


    ///CRUD for Supplies

    function viewSupplies(){
        echo $this->redirect(BASE_URL."StoreControls/loadSuppliesView");
    }

    function loadSuppliesView(){
        $supplies = new Supplies();
        $supplies = $supplies->findall();
        echo $this->view("storemanager/supplies",  ["supplies" => $supplies]);        
    }

    function insertSupplyView($id){
        $stockItem = new StockItem();
        $stocks = $stockItem->where("ItemID",$id);
        echo $this->view("storemanager/addsupply",  ["stocks" => $stocks]);
    }

    function insertSupply(){
        $stockItem = new StockItem();
        $supplies = new Supplies();

        $id = $_POST['id'];
        $data = [];

        $data['StockItemID'] = $_POST['StockItemID'];
        $data['CustomStockItemID'] = $_POST['CustomStockItemID'];
        $data['stockItemName'] = $_POST['stockItemName'];
        $data['DeliveredDate'] = $_POST['DeliveredDate'];
        $data['InvoiceNo'] = $_POST['InvoiceNo'];
        $data['ExpiryDate'] = $_POST['ExpiryDate'];
        $data['DeliveredQuantity'] = $_POST['DeliveredQuantity'];

        $supplies->insert($data);
        $stocks = $stockItem->where("ItemID", $data['StockItemID']);

        $item = [];
        $item['AvailableStock'] = $stocks[0]->AvailableStock + $_POST['DeliveredQuantity'];

        $stockItem->update($data['StockItemID'], "ItemID", $item);


        echo $this->redirect(BASE_URL . "StoreControls/viewStocks"); 

    }

    function deleteSupplies($id){
        $supplies = new Supplies();
        $supplies = $supplies->delete($id,"SupplyID");
        $this->redirect(BASE_URL."StoreControls/viewSupplies");
    }

    function updateSuppliesView($id){
        $supplies = new Supplies();
        $supplies = $supplies->where("SupplyID",$id);
        echo $this->view("storemanager/updatesupplies",  ["supplies" => $supplies]);
    }

    function updateSupplies(){
        $supplies = new Supplies();

        $id = $_POST['id'];
        $data = [];

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
            $data['DeliveredQuantity'] = $_POST['DeliveredQuantity'];
        }

        echo $supplies->update($id, "SupplyID", $data);
        $this->redirect(BASE_URL."StoreControls/viewSupplies");

    }

    function SearchSupply(){

        $searchQuery = isset($_GET['search']) ? $_GET['search'] : '';

            $supplies = new Supplies();
            $supplyByID = $supplies->where("SupplyID", $searchQuery);
            $supplyByItemID = $supplies->where("StockItemID", $searchQuery);
            $supplyByInvoiceNo = $supplies->where("InvoiceNo", $searchQuery);


            if (count($supplyByID) > 0) {
                $supplies = $supplyByID;
            } else if (count($supplyByItemID) > 0) {
                $supplies = $supplyByItemID;
            }else if (count($supplyByInvoiceNo) > 0) {
                $supplies = $supplyByInvoiceNo;
            }
            else {
                $supplies = [];
            }

            echo $this->view("storemanager/supplies",[ "supplies" => $supplies]);

    }


    //Functions for handling production requests

    function loadProductionView(){
        // $stockItem = new StockItem();
        // $stocks = $stockItem->findall(); , [ "stocks" => $stocks]
        echo $this->view("storemanager/production");        
    }

    

   
}
?>
