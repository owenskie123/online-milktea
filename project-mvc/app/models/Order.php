<?php
    class Order extends Model{
        public function visible_orders(){
            $query = "SELECT * FROM $this->table WHERE `status` != 'delivered' OR `is_paid` = '0'";
            $result = $this->query($query);
            if ($result){
                return $result;
            }
            return false;
        }
    }