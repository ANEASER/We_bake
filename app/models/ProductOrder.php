<?php

    class ProductOrder extends Model {
        protected $table = 'productorder';

        public function findByDate() {
    
            $query = "SELECT * FROM $this->table WHERE orderdate >= CURDATE()";
    
            return $this->query($query);
        }
    }
?>