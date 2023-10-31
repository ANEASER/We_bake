<?php
class StoreControls extends Controller {
    
    
    function index($id = null) {
        if(!Auth::loggedIn()){
            $this->redirect("CommonControls/loadLoginView");
        }

        $this->view("storemanager/smdash");
    }

    function viewDashboard(){
        echo $this->view("storemanager/smdash");
    }

    function viewProfile(){
        echo $this->view("storemanager/profile");
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

    function updateSupplier(){
        echo $this->view("storemanager/updatesuppplier");
    }

    
    
}
?>
