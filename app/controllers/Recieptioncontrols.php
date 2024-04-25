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

        $this->view("receiptionist/recustomerno");
    
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


    function customernumbersearch ($id = null) {
        if(!Auth::loggedIn()){
            $this->redirect(BASE_URL."CommonControls/loadLoginView");
        }
        if($_SESSION["USER"]->Role != "receptionist"){
            $this->redirect(BASE_URL."CommonControls/loadLoginView");
        }

        $telephoneno = $_POST["telephoneno"];
        $foundcustomer = new customer();//load model
        $customer = $foundcustomer->where("contactNo",$telephoneno);
        
    if($customer){
        $this->view("receiptionist/customerfoundview", ["customer"=> $customer]);
    }else{
        $this->view("receiptionist/customernotfoundview", ["customer" => null]);

    }
    //$this->view("receiptionist/recustomerno");
    }

    function customernumberformview ($id = null) {
        if(!Auth::loggedIn()){
            $this->redirect(BASE_URL."CommonControls/loadLoginView");
        }
        if($_SESSION["USER"]->Role != "receptionist"){
            $this->redirect(BASE_URL."CommonControls/loadLoginView");
        }
      
        $this->view("receiptionist/recustomerno");   
    }

    function customernotfoundview ($id = null) {
        if(!Auth::loggedIn()){
            $this->redirect(BASE_URL."CommonControls/loadLoginView");
        }
        if($_SESSION["USER"]->Role != "receptionist"){
            $this->redirect(BASE_URL."CommonControls/loadLoginView");
        }

        $this->view("receiptionist/customernotfoundview");
    
    }

    function foundcustomerform ($username= null) {
        if(!Auth::loggedIn()){
            $this->redirect(BASE_URL."CommonControls/loadLoginView");
        }
        if($_SESSION["USER"]->Role != "receptionist"){
            $this->redirect(BASE_URL."CommonControls/loadLoginView");
        }

        if($username != null){
            $customer = new Customer();
            $foundcustomer = $customer->where("UserName",$username);
            $this->view("receiptionist/foundcustomerform", ["foundcustomer"=>$foundcustomer[0]]);
            
        }
         else{
        $this->view("receiptionist/customernotfoundview");}
    }

    function submitorder () {
        if(!Auth::loggedIn()){
            $this->redirect(BASE_URL."CommonControls/loadLoginView");
        }
        $_SESSION["customername"] = $_POST['customername'];
        $_SESSION["email"] = $_POST['customeremail'];
        $_SESSION["phone"] = $_POST['customerphonenumber'];
        $_SESSION["date"] = $_POST['orderdate'];
        $_SESSION["adress"] = $_POST['deliveryaddress'];
        $_SESSION["deliverstatus"] = $_POST['delivery/Pickup'];
        $_SESSION["picker"] = $_POST['picker'];

        $unique_id = uniqid();
        $_SESSION["unique_id"] = $unique_id;
        
        $this->redirect(BASE_URL."OrderControls/showcategories");
}

}

?>