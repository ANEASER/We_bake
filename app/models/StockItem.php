<?php

    class StockItem extends Model {
        protected $table = 'stockItem';

        public function getDistinct($column)
        {
            $query = "SELECT DISTINCT $column,UnitOfMeasurement FROM $this->table";
            return $this->query($query, []);
        }
    }
?>