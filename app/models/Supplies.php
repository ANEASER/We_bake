<?php

    class Supplies extends Model {
        protected $table = 'supplies';

        public function getSorted($column, $sortOrder = 'ASC'){
            $query = "SELECT * FROM $this->table ORDER BY $column $sortOrder";
            return $this->query($query, []);
        }

        public function find($condition = "") {
            $query = "SELECT * FROM $this->table";
            if (!empty($condition)) {
                $query .= " WHERE $condition";
            }
            return $this->query($query, []);
        }

        public function getActiveSortedByExpiryDate($sortOrder = 'ASC') {
            $query = "SELECT * FROM $this->table WHERE ActiveState = 'Active' ORDER BY ExpiryDate $sortOrder";
            return $this->query($query, []);
        }
        


    }
?>