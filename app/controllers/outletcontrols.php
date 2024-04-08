<?php
class OutletControls extends Controller {
    
    
    function index($id = null) {
        if(!Auth::loggedIn()){
            $this->redirect(BASE_URL."CommonControls/loadLoginView");
        }

        $user = $_SESSION["USER"];

        $this->view("outlet/outletdash",["user"=>$user]);
    }

    
    function placeorder($id = null) {
        if(!Auth::loggedIn()){
            $this->redirect(BASE_URL."CommonControls/loadLoginView");
        }

        $user = $_SESSION["USER"];

        $this->view("outlet/outletplaceorder",["user"=>$user]);
    }

    function purchasehistory($id = null) {
        if(!Auth::loggedIn()){
            $this->redirect(BASE_URL."CommonControls/loadLoginView");
        }

        $user = $_SESSION["USER"];

        $this->view("outlet/outletpurchasehistory",["user"=>$user]);
    }

    function constantorder($id = null) {
        if(!Auth::loggedIn()){
            $this->redirect(BASE_URL."CommonControls/loadLoginView");
        }

        $user = $_SESSION["USER"];

        $this->view("outlet/outletco",["user"=>$user]);
    }


}
