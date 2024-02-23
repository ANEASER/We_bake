<?php

    class Vehicle extends Model {
        protected $table = 'deliveryvehicles';

        function capacitygreaterthan($capacity){
            $query = "SELECT * FROM deliveryvehicles WHERE capacity > $capacity";
            return $this->query($query);
        }
    }

    
?>