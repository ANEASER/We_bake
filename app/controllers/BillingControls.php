<?php
class BillingControls extends Controller {
    
    
    function index($id = null) {
        $this->view("billingclerk/billingdash");
    }

    function viewProfile(){
        echo $this->view("billingclerk/profile");
    }

    function viewOrders(){
        echo $this->view("billingclerk/bcorders");
    }
    
}
?>
