<?php

class Vehicle extends Model {
    protected $table = 'deliveryvehicles';

    function capacityGreaterThan($capacity){
        $query = "SELECT * FROM deliveryvehicles WHERE capacity > $capacity";
        return $this->query($query);
    }

    function deleteVehicle($vehicleNo){
        $query = "UPDATE deliveryvehicles SET availability = 0 AND ActiveState = 0 WHERE vehicleno = $vehicleNo";
        return $this->query($query);
    }
}
