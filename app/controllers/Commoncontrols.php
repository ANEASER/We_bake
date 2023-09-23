<?php

class CommonControls extends Controller {
    function index($id = null) {
        // 1 get data from database
        $db = new Database();
        $data = $db->query("SELECT * FROM systemuser");
        // 2 send data to view
        $this->view("common/home", ['rows' => $data]);
    }
}

?>