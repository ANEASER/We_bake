<?php

class CommonControls extends Controller{

        function index($id=null){
            echo $this->view("common/home");
        }
    }
?>