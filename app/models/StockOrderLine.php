<?php

    class StockOrderLine extends Model {
        protected $table = 'stockorderline';

        public function StockOrderLinesbyUniqueIds($unique_ids) {
            $uniqueIdsString = "'" . implode("','", $unique_ids) . "'";
            $query = "SELECT RawName, SUM(quantity) AS quantity FROM $this->table WHERE unique_id IN ($uniqueIdsString) GROUP BY RawName;";
            return $this->query($query, []);
        }
    }
?>