<?php
class outletControls extends Controller {
    
    
    function index($id = null) {
        $this->view("outlet/outletdash");
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
}
?>