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



    //Stock Items CRUDs


    function viewStocks(){
        echo $this->redirect(BASE_URL."StoreControls/loadStocksView");
        //echo $this->view("storemanager/stocks");
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

    function updateStocks($id){
        echo $this->view("storemanager/updatestock", ["id" => $id]);
    }

    function deleteStocks(){
        echo $this->view("storemanager/deletestock");
    }

   
}
?>
