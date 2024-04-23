<?php

    class StockItem extends Model {
        protected $table = 'stockItem';

        public function updateAvailableStock($itemID, $DeliveredQuantity) {
            // Update the available quantity in the database

            // Example using PDO
            $sql = "UPDATE {$this->table} SET AvailableStock = AvailableStock + :DeliveredQuantity WHERE ItemID = :itemID";
            $stmt = $this->db->prepare($sql);
            $stmt->bindParam(':DeliveredQuantity', $DeliveredQuantity, PDO::PARAM_INT);
            $stmt->bindParam(':itemID', $itemID, PDO::PARAM_INT);
            
            // Execute the statement
            if ($stmt->execute()) {
                // Update successful
                return true;
            } else {
                // Update failed
                return false;
            }
        }

    }
?>