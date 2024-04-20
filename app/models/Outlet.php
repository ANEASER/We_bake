<?php

    class Outlet extends Model {
        protected $table = 'outlet';

        function getOutletCount(){
            $sql = "SELECT COUNT(*) as count FROM outlet";
            $result = $this->query($sql);
            return $result[0]->count;
        }
    }
?>