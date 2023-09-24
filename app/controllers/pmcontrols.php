<?php

    class PmControls extends Controller{

        function index($id=null){
            $this->view("productionmanager/pmdash");
        }
    }
?>