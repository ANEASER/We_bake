<?php

    class CustomerControls extends Controller{

        function index($id=null){
            $this->view("customer/customerdash");
        }
    }
?>