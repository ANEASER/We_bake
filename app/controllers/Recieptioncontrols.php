<?php

class RecieptionControls extends Controller {
    
    //order hancdle
    function index($id = null) {
        if(!Auth::loggedIn()){
            $this->redirect(BASE_URL."CommonControls/loadLoginView");
        }
        if($_SESSION["USER"]->Role != "receptionist"){
            $this->redirect(BASE_URL."CommonControls/loadLoginView");
        }

        $this->view("receiptionist/recepdash");
    
    }

    function viewhistory($id = null) {
        if(!Auth::loggedIn()){
            $this->redirect(BASE_URL."CommonControls/loadLoginView");
        }
        if($_SESSION["USER"]->Role != "receptionist"){
            $this->redirect(BASE_URL."CommonControls/loadLoginView");
        }

        $productorder = new ProductOrder();//load model
        $orders = $productorder->where("placeby",$_SESSION["USER"]->EmployeeNo);
        //$omplaceorder = $placeorder->where("placeby","OM00122");

        $this->view("receiptionist/repurchasehistory" ,[ "orders" =>$orders]);//sent to the view
    
    }

    function viewProfile ($id = null) {
        if(!Auth::loggedIn()){
            $this->redirect(BASE_URL."CommonControls/loadLoginView");
        }
        if($_SESSION["USER"]->Role != "receptionist"){
            $this->redirect(BASE_URL."CommonControls/loadLoginView");
        }
        $this->view("receiptionist/reprofile");
    
    }


    function customernumber ($id = null) {
        if(!Auth::loggedIn()){
            $this->redirect(BASE_URL."CommonControls/loadLoginView");
        }
        if($_SESSION["USER"]->Role != "receptionist"){
            $this->redirect(BASE_URL."CommonControls/loadLoginView");
        }
      
        $customer = new Customer(); //any name for the variable = model name 
        $customerdetails = $customer->where("contactNo","782567545");

        $this->view("receiptionist/recustomerno" , ["customerdetails" => $customerdetails ]);
        
    
    }

    



}
?>