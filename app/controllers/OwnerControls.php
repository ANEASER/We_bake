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
        if(!Auth::loggedIn()){
            $this->redirect(BASE_URL."CommonControls/loadLoginView");
        }

        if($_SESSION['USER']->Role != "owner"){
            $this->redirect(BASE_URL."CommonControls/loadLoginView");
        }

        echo $this->redirect (BASE_URL."OwnerControls/loadviewEnquiries");

    }

    function loadviewEnquiries(){
        if(!Auth::loggedIn()){
            $this->redirect(BASE_URL."CommonControls/loadLoginView");
        }

        if($_SESSION['USER']->Role != "owner"){
            $this->redirect(BASE_URL."CommonControls/loadLoginView");
        }

        $inquiry = new Inquiry();
        $inquiry = $inquiry ->findall();
        echo $this->view("owner/inquiry",  ["inquiry" => $inquiry]);

    }

    function viewReports(){
        if(!Auth::loggedIn()){
            $this->redirect(BASE_URL."CommonControls/loadLoginView");
        }

        if($_SESSION['USER']->Role != "owner"){
            $this->redirect(BASE_URL."CommonControls/loadLoginView");
        }

        $pdf = new PDF();
        
        $producorder = new ProductOrder();
        $productorderline = new ProductOrderLine();
        $productitem = new ProductItem();

        $producorderdata = $producorder->findall();
        $productitemdata = $productitem->findall();
        $unique_ids = [];
        foreach ($producorderdata as $order) {
            array_push($unique_ids, $order->unique_id);
        }
       
        $productorderlines = $productorderline->productOrderLinesbyUniqueIds($unique_ids);
        //$pdf->generateReport();
        echo $this->view("owner/report", ["orders" => $producorderdata, "productorderlines" => $productorderlines, "productitemdata" => $productitemdata]);
    }
}

?>