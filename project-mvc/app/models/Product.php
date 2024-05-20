<?php
    class Product extends Model{
        public function latest($count){
            $query = "SELECT * FROM $this->table ORDER BY `product_id` DESC LIMIT $count";
            $result = $this->query($query);
            if ($result){
                return $result;
            }
            return false;
        }
    }