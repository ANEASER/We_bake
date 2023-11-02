<?php
class RecieptionControls extends Controller {
    
    
    function index($id = null) {
        $this->view("receiptionist/recepdash");
    }

    function viewProfile(){
        echo $this->view("receiptionist/recprofile");
    }

    function viewHistory(){
        echo $this->view("receiptionist/rechistory");
    }

    function viewOrders(){
        echo $this->view("receiptionist/recOrders");
    }
    
}
?>
