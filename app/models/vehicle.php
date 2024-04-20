<?php

class Vehicle extends Model {
    protected $table = 'deliveryvehicles';

    function capacityGreaterThan($capacity){
        $query = "SELECT * FROM deliveryvehicles WHERE capacity > $capacity";
        return $this->query($query);
    }
}
