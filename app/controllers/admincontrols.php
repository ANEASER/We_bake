<?php

    class AdminControls extends Controller{

        function index($id=null){
            echo $this->view("admin/admindash");
        }
    }
?>