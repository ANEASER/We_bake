<?php
class StoreControls extends Controller {
    
    
    function index($id = null) {
        if(!Auth::loggedIn()){
            $this->redirect("CommonControls/loadLoginView");
        }

        $this->view("storemanager/smdash");
    }

    function viewSupplier(){
        echo $this->view("storemanager/supplier");
    }

    function viewStocks(){
        echo $this->view("storemanager/stocks");
    }

    function addSupplier(){
        echo $this->view("storemanager/addsupplier");
    }
    
}
?>
