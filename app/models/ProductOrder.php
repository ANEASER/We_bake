<?php

    class ProductOrder extends Model {
        protected $table = 'productorder';

        public function findOnToday() {
    
            $query = "SELECT * FROM $this->table WHERE orderdate = CURDATE()";
    
            return $this->query($query);
        }

    }
?>