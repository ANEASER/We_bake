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


    ///CRUD for Supplies

    function viewSupplies(){
        echo $this->redirect(BASE_URL."StoreControls/loadSuppliesView");
    }

    function loadSuppliesView(){
        // $stockItem = new StockItem();
        // $stocks = $stockItem->findall(); , [ "stocks" => $stocks]
        echo $this->view("storemanager/supplies",  ["stocks" => $stocks]);        
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
        $data['DeliveredDate'] = $_POST['DeliveredDate'];
        $data['InvoiceNo'] = $_POST['InvoiceNo'];
        $data['ExpiryDate'] = $_POST['ExpiryDate'];
        $data['DeliveredQuantity'] = $_POST['DeliveredQuantity'];

        $supplies->insert($data);
    }


    //Functions for handling production requests

    function loadProductionView(){
        // $stockItem = new StockItem();
        // $stocks = $stockItem->findall(); , [ "stocks" => $stocks]
        echo $this->view("storemanager/production");        
    }

    

   
}
?>
