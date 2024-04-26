<?php

class Vehicle extends Model {
    protected $table = 'deliveryvehicles';

   /* function capacityGreaterThan($capacity){
        $query = "SELECT * FROM deliveryvehicles WHERE capacity > $capacity";
        return $this->query($query);
    } */

    public function assignvehicle(){ //$capacity
        $query = "SELECT * FROM $this->table 
        WHERE availability = '1' "; //AND (SELECT order_cap FROM productorder WHERE order_cap > $capacity)
        return $this->query($query);
    }
}
?>
