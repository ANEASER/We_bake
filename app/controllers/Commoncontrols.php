<?php
class CommonControls extends Controller {
    
    function index($id = null) {
        $this->view("common/home");
    }

    function loadLoginView() {
        $this->view("common/login");
    }

    function loadRegisterView() {
        $this->view("common/register");
    }
}
?>
