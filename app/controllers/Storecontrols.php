<?php
class StoreControls extends Controller {
    
    
    function index($id = null) {
        if(!Auth::loggedIn()){
            $this->redirect("CommonControls/loadLoginView");
        }

        $this->view("storemanager/smdash");
    }

    /*function viewDash(){
        echo $this->view("storemanager/smdash");
    }*/

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

    //CRUD for Supplier
    //Insert Supplier
    function addSupplierData(){
        $supplier = new Supplier();
        $arr["name"]= $_POST['name'];
        $arr["contactno"]= $_POST['contactno'];
        $arr["address"]= $_POST['address'];
        $arr["email"]= $_POST['email'];
        $arr["Ratings"]= $_POST['Ratings'];
        $supplier->insert($arr);
        $this->redirect("../StoreControls/viewSupplier");
    }

    
    
}
?>
