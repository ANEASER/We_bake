<?php

class MainControls extends Controller{

        function index($id=null){
            echo $this->view("main/home");
        }
    }
?>