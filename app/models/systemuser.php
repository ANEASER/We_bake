<?php

    class Systemuser extends Model {
        protected $table = 'systemuser';

        function getSystemuserCount(){
            $sql = "SELECT COUNT(*) as count FROM systemuser";
            $result = $this->query($sql);
            return $result[0]->count;
        }
    }
?>