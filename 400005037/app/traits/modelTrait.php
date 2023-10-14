<?php
    trait ModelTrait {
        private $connection;
        private $rolePermissions = [
            "Research Group Manager" => [1, 2, 3, 4],
            "Research Study Manager" => [1, 2, 3],
            "Researcher" => [1]
        ];

        private function establishConnection() {
            $this->connection = new mysqli('localhost','root','','user_management_system');
        }//end establishConnection 
    
        private function runQuery($query, $select = false) {
            $data = [];
            if($select) {
                $results = $this->connection->query($query);
                if(!empty($results)) {
                    while($rec = mysqli_fetch_array($results)) {
                        $data[] = $rec;
                    }//end while
                }
            } else {
                $this->connection->query($query);
            }
            return $data;
        }//end runQuery

        public function checkForUser($newUsername) {
            $query = 'SELECT * FROM users WHERE username = "'. $newUsername.'"';
            if(empty($this->runQuery($query, true))){
                return true;
            }
            return false;
        } //end checkForUser

    }//end trait
?>
