<?php
    class RawsForItem extends Model {
        protected $table = 'rawsforitem';

        public function RawsForItemsbyItemIDs($itemid, $itemquantity) {
            $query = "SELECT RawName,UnitOfMeasurement,SUM(quantity)* $itemquantity AS subtotalquantity FROM $this->table WHERE itemid = $itemid GROUP BY RawName	;";
            return $this->query($query, []);
        }
    }
?>