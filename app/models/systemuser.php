<?php

    class Systemuser extends Model {
        protected $table = 'systemuser';

        function getSystemuserCount(){
            $sql = "SELECT COUNT(*) as count FROM systemuser";
            $result = $this->query($sql);
            return $result[0]->count;
        }

        function getSystemuserCountGroupBy(){
            $sql = "SELECT role , COUNT(*) as count, role FROM systemuser GROUP BY role";
            $result = $this->query($sql);
            return $result;
        }
    }
?>