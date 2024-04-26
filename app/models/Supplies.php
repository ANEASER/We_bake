<?php

    class Supplies extends Model {
        protected $table = 'supplies';

        public function getSorted($column, $sortOrder = 'ASC'){
            $query = "SELECT * FROM $this->table ORDER BY $column $sortOrder";
            return $this->query($query, []);
        }


    }
?>