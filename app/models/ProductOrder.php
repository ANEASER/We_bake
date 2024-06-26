<?php

class ProductOrder extends Model {
    protected $table = 'productorder';

    public function findOnToday() {
        $query = "SELECT * FROM $this->table WHERE orderdate = CURDATE()";
        return $this->query($query);
    }

    // venuri
    public function findCustomerOrders() {
        $query = "SELECT * FROM $this->table 
        WHERE orderref LIKE 'C%' OR orderref LIKE 'R%' 
        ORDER BY orderdate ASC";
        return $this->query($query, []);
    }

    
    public function findOutletOrders(){
        $query = "SELECT * FROM $this->table 
        WHERE orderref LIKE 'OP%'
        ORDER BY orderdate ASC";
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

    public function tomarrowOrders() {
        $query = "SELECT * FROM $this->table WHERE orderdate = CURDATE() + INTERVAL 1 DAY";
        return $this->query($query, []);
    }

    public function findbetweendates($fromdate, $todate) {
        $query = "SELECT * FROM $this->table WHERE orderdate BETWEEN '$fromdate' AND '$todate'";
        return $this->query($query, []);
    }

    public function ordaerrefalike() {
        $query = "SELECT * FROM $this->table WHERE orderref LIKE 'R%' ";  // find all orders reference number starting with 'R'
        return $this->query($query, []);
    }

    public function findOrdersDecendingDate($user) {
        $query = "SELECT * FROM $this->table WHERE placeby ='$user'ORDER BY orderid DESC";
        return $this->query($query, []);
    }



}
?>
