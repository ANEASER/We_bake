<?php

class ProductOrder extends Model {
    protected $table = 'productorder';

    public function findOnToday() {
        $query = "SELECT * FROM $this->table WHERE orderdate = CURDATE()";
        return $this->query($query);
    }

    // venuri
    public function findall() {
        $query = "SELECT * FROM $this->table ORDER BY orderid ASC";
        return $this->query($query, []);
    }

    public function findallbydirection($directioncolumn,$orderdirection) {
        $query = "SELECT * FROM $this->table ORDER BY $directioncolumn $orderdirection";
        return $this->query($query, []);
    }

    // anuda
    public function findalldescwithplaceby($placeby) {
        $query = "SELECT * FROM $this->table WHERE placeby = '$placeby' ORDER BY orderid DESC";
        return $this->query($query, []);
    }

    // Kumudu
    public function findOnTodaybyUserConstant($placeby) {
        $query = "SELECT * FROM $this->table WHERE orderdate = CURDATE() AND placeby = '$placeby' AND 'order_type' = 'constant'";  
        return $this->query($query, []);
    }

    public function findOnTodaybyUser($placeby) {
        $query = "SELECT * FROM $this->table WHERE placeby = '$placeby' AND orderdate = CURDATE()";  
        return $this->query($query, []);
    }

    public function findOnTommorowbyUser($placeby) {
        $query = "SELECT * FROM $this->table WHERE placeby = '$placeby' AND order_type = 'constant' AND orderdate = CURDATE() + INTERVAL 1 DAY";
        return $this->query($query, []);
    }

    public function findLastOrderbyUser($placeby) {
        $query = "SELECT * FROM $this->table WHERE placeby = '$placeby' AND order_type = 'constant' ORDER BY orderid DESC";
        return $this->query($query, []);
    } 


}
?>
