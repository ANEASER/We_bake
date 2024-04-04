<?php

    class PmControls extends Controller{

        function index($id=null){

            if(!Auth::loggedIn()){
                $this->redirect(BASE_URL."CommonControls/loadLoginView");
            }

            if($_SESSION["USER"]->Role != "productionmanager"){
                $this->redirect(BASE_URL."CommonControls/loadLoginView");
            }

            $this->view("productionmanager/pmdash");
        }

    }
?>