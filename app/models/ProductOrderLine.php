<?php

    class ProductOrderLine extends Model {
        protected $table = 'productorderline';

        // kumudu venuri
        public function productOrderLinesbyUniqueIds($unique_ids) {
            $uniqueIdsString = "'" . implode("','", $unique_ids) . "'";
            $query = "SELECT Itemcode, price,itemid, SUM(quantity) AS quantity,SUM(totalprice) as totalprice FROM $this->table WHERE unique_id IN ($uniqueIdsString) GROUP BY Itemcode, price;";
            return $this->query($query, []);
        }

        function SumProductItemsGroupByID() {
            $sql = "SELECT itemid, SUM(quantity) as quantity, SUM(totalprice) as totalprice FROM $this->table GROUP BY itemid";
            $result = $this->query($sql);
            return $result;
        }

        function SumProductItemsGroupByIDandCategory() {

            $sql = "SELECT pi.itemid, pi.category, SUM(p.quantity) as quantity, SUM(p.totalprice) as totalprice 
                    FROM productorderline p 
                    INNER JOIN productitem pi ON p.itemid = pi.itemid 
                    GROUP BY pi.category ORDER BY p.quantity DESC";

            $result = $this->query($sql);
            return $result;
        }

    }
?>