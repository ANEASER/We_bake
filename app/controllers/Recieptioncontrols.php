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

        $this->view("receiptionist/recepdash");
    
    }

    function viewhistory($id = null) {
        if(!Auth::loggedIn()){
            $this->redirect(BASE_URL."CommonControls/loadLoginView");
        }
        if($_SESSION["USER"]->Role != "receptionist"){
            $this->redirect(BASE_URL."CommonControls/loadLoginView");
        }

        $this->view("receiptionist/repurchasehistory");
    
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

    function customernumber ($id = null) {
        if(!Auth::loggedIn()){
            $this->redirect(BASE_URL."CommonControls/loadLoginView");
        }
        if($_SESSION["USER"]->Role != "receptionist"){
            $this->redirect(BASE_URL."CommonControls/loadLoginView");
        }

        $this->view("receiptionist/recustomerno");
        
    
    }

    



}
?>