<?php 

class OwnerControls extends Controller{

    function index() {

        if(!Auth::loggedIn()){
            $this->redirect(BASE_URL."CommonControls/loadLoginView");
        }

        if($_SESSION['USER']->Role != "owner"){
            $this->redirect(BASE_URL."CommonControls/loadLoginView");
        }
        
        $this->view("owner/ownerdash");
    }
}

?>