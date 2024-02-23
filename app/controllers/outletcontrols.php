<?php
class OutletControls extends Controller {
    
    
    function index($id = null) {
        if(!Auth::loggedIn()){
            $this->redirect(BASE_URL."CommonControls/loadLoginView");
        }
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