<?php

    class ProductOrderLine extends Model {
        protected $table = 'productorderline';

        // kumudu venuri
        public function productOrderLinesbyUniqueIds($unique_ids) {
            $uniqueIdsString = "'" . implode("','", $unique_ids) . "'";
            $query = "SELECT Itemcode, price,itemid, SUM(quantity) AS quantity FROM $this->table WHERE unique_id IN ($uniqueIdsString) GROUP BY Itemcode, price;";
            return $this->query($query, []);
        }

    }
?>