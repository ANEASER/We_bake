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


    function viewStocks(){
        echo $this->view("storemanager/stocks");
    }

    function addSupplier(){
        echo $this->view("storemanager/addsupplier");
    }

    function updateSupplier(){
        echo $this->view("storemanager/updatesuppplier");
    }

    function addStockItem(){
        echo $this->view("storemanager/addstock");
    }

    function updateStocks(){
        echo $this->view("storemanager/updatestock");
    }

    function deleteStocks(){
        echo $this->view("storemanager/deletestock");
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
    
    //Delete Supplier
    function deleteSupplierData($idcolumn,$id){
        $supplier = new Supplier();
        $supplier->delete($id,$idcolumn);
        $this->redirect("http://localhost/We_bake/public/StoreControls/viewSupplier");
        echo $id;
        echo $idcolumn;
        //viewSupplier();
    }

    // View supplier Data - R
    function viewSupplier(){
        $supplier = new Supplier();
        $data = $supplier->findall();
        echo $this->view("storemanager/supplier",$data);
    }
}
?>
