<?php
class OutletControls extends Controller {
    
    
    function index($id = null) {
        if(!Auth::loggedIn()){
            $this->redirect(BASE_URL."CommonControls/loadLoginView");
        }

        $user = $_SESSION["USER"];

        $this->view("outlet/outletdash",["user"=>$user]);
    }

    function placeorder(){
        echo $this->view("outlet/placeorder");

    }
    
    function purchasehistory(){
        echo $this->view("outlet/purchasehistory");

     
    }
    function outletdash(){
        echo $this->view("outlet/outletdash");
    }

    function constantorder(){
        echo $this->view("outlet/constantorder");
    }

    function submitorder(){
        
        session_start();

        $_SESSION["date"] = $_POST['orderdate'];
        $_SESSION["deliverstatus"] = "outletdelivery";
        $_SESSION['picker'] = $_SESSION["USER"]->EmployeeNo;

        
        if (isset($_SESSION['unique_id'])) {
            unset($_SESSION['unique_id']);
            unset($_SESSION['cart']);
         }

        $unique_id = uniqid();

        $outlet = new Outlet();
        $foundoutlet = $outlet->where("Manager", $_SESSION["USER"]->EmployeeNo);

        $_SESSION["adress"] = $foundoutlet[0]->Address;

        var_dump($_SESSION);

        $this->redirect(BASE_URL."OrderControls/showcategories");

    }
}
?>