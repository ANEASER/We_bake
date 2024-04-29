<?php

    class ProductItem extends Model {
        protected $table = 'productitem';

        function countProductItemsGroupByCategory() {
            $sql = "SELECT category, COUNT(*) as count FROM productitem GROUP BY category";
            $result = $this->query($sql);
            return $result;
        }

        function getlatestProductItems() {
            $sql = "SELECT * FROM productitem ORDER BY itemid DESC LIMIT 2";
            $result = $this->query($sql);
            return $result;
        }
    }
?>