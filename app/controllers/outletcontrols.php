<?php
class outletcontrols extends Controller {
    
    
    function index($id = null) {
        $this->view("outlet/outletdash");
    }

    function placeorder(){
        echo $this->view("outlet/placeorder");

    }

    function purchasehistory(){
        echo $this->view("outlet/purchasehistory");

     
    }

    function editcontainorder(){
        echo $this->view("outlet/editcontainorder");

       
    }


    function editprofile(){
        echo $this->view("outlet/editprofile");

    
    }

}
?>