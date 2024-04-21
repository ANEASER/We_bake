<?php

class ProductOrder extends Model {
    protected $table = 'productorder';

    public function findOnToday() {
        $query = "SELECT * FROM $this->table WHERE orderdate = CURDATE()";
        return $this->query($query);
    }

    public function findall() {
        $query = "SELECT * FROM $this->table ORDER BY orderid ASC";
        return $this->query($query, []);
    }

    public function complete($orderDirection = 'DESC') {
        $query = "SELECT * FROM $this->table WHERE orderstatus = 'finished' OR orderstatus = 'canceled' ORDER BY orderid $orderDirection";
        return $this->query($query, []);
    }

    public function findalldescwithplaceby($placeby) {
        $query = "SELECT * FROM $this->table WHERE placeby = '$placeby' ORDER BY orderid DESC";
        return $this->query($query, []);
    }
    
    
}
?>
