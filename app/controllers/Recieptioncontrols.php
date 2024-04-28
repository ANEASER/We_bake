<?php

class RecieptionControls extends Controller {
    
    //HOME
    function index($id = null) {
        if(!Auth::loggedIn()){
            $this->redirect(BASE_URL."CommonControls/loadLoginView");
        }
        if($_SESSION["USER"]->Role != "receptionist"){
            $this->redirect(BASE_URL."CommonControls/loadLoginView");
        }

        $this->view("receiptionist/recustomerno");
    
    }

    //PLACE ORDER NUMBER SEARCH
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
        $this->view("receiptionist/customernotfoundview", ["customer" => null]);}
    }

      //IS THIS YOU (CUSTOMER FOUND FORM)
      function customernumberformview ($id = null) {
        if(!Auth::loggedIn()){
            $this->redirect(BASE_URL."CommonControls/loadLoginView");
        }
        if($_SESSION["USER"]->Role != "receptionist"){
            $this->redirect(BASE_URL."CommonControls/loadLoginView");
        }
      
        $this->view("receiptionist/recustomerno");   
    }

    //FOUND CUSTOMER FORM
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
    
    //CUSTOMER NOT FOUND FORM
    function customernotfoundview ($id = null) {
        if(!Auth::loggedIn()){
            $this->redirect(BASE_URL."CommonControls/loadLoginView");
        }
        if($_SESSION["USER"]->Role != "receptionist"){
            $this->redirect(BASE_URL."CommonControls/loadLoginView");
        }

        $this->view("receiptionist/customernotfoundview");
    
    }

    //PURCHASE HISTORY
    function viewhistory($id = null) {
        if(!Auth::loggedIn()){
            $this->redirect(BASE_URL."CommonControls/loadLoginView");
        }
        if($_SESSION["USER"]->Role != "receptionist"){
            $this->redirect(BASE_URL."CommonControls/loadLoginView");
        }

        $productorder = new ProductOrder();//load model
        $orders = $productorder->ordaerrefalike(); // changed

        $this->view("receiptionist/repurchasehistory" ,[ "orders" =>$orders]);//sent to the view
    
    }

// SUBMIT ORDER
    function submitorder () {
        if(!Auth::loggedIn()){
            $this->redirect(BASE_URL."CommonControls/loadLoginView");
        }
        $_SESSION["customername"] = $_POST['customername'];
        $_SESSION["email"] = $_POST['customeremail'];
        $_SESSION["phone"] = $_POST['customerphonenumber'];
        $_SESSION["date"] = $_POST['orderdate'];
        $_SESSION["adress"] = $_POST['deliveryaddress'];
        $_SESSION["deliverstatus"] = $_POST['deliverystatus'];
        $_SESSION["picker"] = $_POST['picker'];

        $unique_id = uniqid();
        $_SESSION["unique_id"] = $unique_id;
        
        $this->redirect(BASE_URL."OrderControls/showcategories");
}

function searchOrders(){

    if(!Auth::loggedIn()){
        $this->redirect(BASE_URL."CommonControls/loadLoginView");
    }

    if($_SESSION["USER"]->Role != "receptionist"){
        $this->redirect(BASE_URL."CommonControls/loadLoginView");
    }

    $productorder = new ProductOrder();

    $searchQuery = isset($_GET['search']) ? $_GET['search'] : '';

    $orderref = $productorder->where("orderref", $searchQuery);
   

    if($orderref != null){
       $orders = $orderref;
       echo $this->view("receiptionist/repurchasehistory",["orders"=>$orders]);
    
    }else{
        echo $this->view("receiptionist/repurchasehistory",["orders"=>null]); // changed
    }

    }


}

?>