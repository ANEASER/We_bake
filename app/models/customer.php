<?php

    class Customer extends Model {
        protected $table = 'customer';

    
    function getCustomerCount(){
        $sql = "SELECT COUNT(*) as count FROM customer";
        $result = $this->query($sql);
        return $result[0]->count;
    }
}
?>