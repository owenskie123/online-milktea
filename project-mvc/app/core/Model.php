<?php
    class Model extends Database{
        public $errors = [];

        public function __construct(){
            if (!property_exists($this, 'table')){
                $this->table = strtolower($this::class) . 's';
            }
        }

        public function findAll(){
            $query = "SELECT * FROM $this->table";
            $result = $this->query($query);
            if ($result){
                return $result;
            }
            return false;
        }

        public function where($data, $data_not = []){
            $keys = array_keys($data);
            $keys_not = array_keys($data_not);
            $query = "SELECT * FROM $this->table WHERE ";

            foreach($keys as $key){
                $query .= $key . " = :" . $key . " && ";
            }
            foreach($keys_not as $key){
                $query .= $key . " != :" . $key . " && ";
            }      

            $query = trim($query, " && ");      
            $data = array_merge($data, $data_not);
            $result = $this->query($query, $data);
            
            if ($result){
                return $result;
            }
            return false;
        }

        public function insert($data){
            $columns = implode(', ', array_keys($data));
            $values = implode(', :', array_keys($data));
            $query = "INSERT INTO $this->table ($columns) VALUES (:$values)";
            $this->query($query, $data);

            return false;
        }

        public function update($id, $data, $column = 'id'){
            $keys = array_keys($data);
            $query = "UPDATE $this->table SET ";

            foreach($keys as $key){
                $query .= $key . " = :" . $key . ", ";
            }

            $query = trim($query, ", ");
            $query .= " WHERE $column = :$column";
            $data[$column] = $id;
            $this->query($query, $data);
            
            return false;
        }

        public function delete($id, $column = 'id'){
            $data[$column] = $id;
            $query = "DELETE FROM $this->table WHERE $column = :$column";
            $this->query($query, $data);

            return false;
        }

        public function first($data, $data_not = []){
            $result = $this->where($data, $data_not);
            
            if ($result){
                return $result[0];
            }
            return false;
        }

        public function like($data, $string){
            $columns = $data;
            $query = "SELECT * FROM $this->table WHERE CONCAT(";

            foreach ($columns as $column){
                $query .= $column . ", ";
            }

            $query = trim($query, ", ");
            $query .= ") LIKE '%" . $string . "%'";
            $result = $this->query($query);

            if ($result){
                return $result;
            }
            return false;
        }

        public function count($column = 'id'){
            $query = "SELECT COUNT(`$column`) AS `count` FROM $this->table";
            
            $result = $this->query($query);
            if ($result){
                return $result[0]->count;
            }
            return 0;
        }

        public function isExists($data, $column, $data_not = [], $column_not = ''){
            if (isset($data[$column])){
                $arr[$column] = $data[$column];
                $arr_not = [];
                if (!empty($data_not) && !empty($column_not)){
                    $arr_not[$column_not] = $data_not[$column_not];
                }
                $result = $this->where($arr, $arr_not);
                if (is_array($result) && count($result) > 0){
                    return true;
                }
            }
            return false;
        }
    }