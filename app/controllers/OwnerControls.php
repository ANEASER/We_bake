<?php 

class OwnerControls extends Controller{

    function index() {

        if(!Auth::loggedIn()){
            $this->redirect(BASE_URL."CommonControls/loadLoginView");
        }

        if($_SESSION['USER']->Role != "owner"){
            $this->redirect(BASE_URL."CommonControls/loadLoginView");
        }

        $systemuser = new Systemuser();
        $producorder = new ProductOrder();
        $productorderline = new ProductOrderLine();
        $productitem = new ProductItem();

        $data = $systemuser->where("UserName", $_SESSION["USER"]->UserName);
        $producorderdata = $producorder->findall();
        $productorderlinedata = $productorderline->findall();
        $productitemdata = $productitem->findall();
        
        $this->view("owner/ownerdash",[ "data" => $data, "producorderdata" => $producorderdata, "productorderlinedata" => $productorderlinedata, "productitemdata" => $productitemdata]);
    }

    function viewEnquiries(){
        echo $this->redirect (BASE_URL."OwnerControls/loadviewEnquiries");

    }

    function loadviewEnquiries(){
        $inquiry = new Inquiry();
        $inquiry = $inquiry ->findall();
        echo $this->view("owner/inquiry",  ["inquiry" => $inquiry]);

    }
}

?>