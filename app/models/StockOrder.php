<?php

    class StockOrder extends Model {
        protected $table = 'stockorder';

        public function findAllRM(){
            $query = "SELECT * FROM $this->table ORDER BY ondate DESC";
            return $this->query($query, []);
        }
    }
?>