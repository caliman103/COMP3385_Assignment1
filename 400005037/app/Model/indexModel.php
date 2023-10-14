<?php
    require_once 'app/traits/modelTrait.php';
    class IndexModel {
        Use ModelTrait;
        private $records = [];
        private $user = [];

        public function __construct() {
            $this->establishConnection();
        }//end constructor

        private function getDataFromDatabase() {
            $query = 'SELECT * FROM users;';
            $this->records = $this->runQuery($query, true);
        }
        
        public function checkForUser($userEmail, $userPassword) {
            $this->getDataFromDatabase();
            foreach($this->records as $record) {
                if($record['email'] === $userEmail && password_verify($userPassword, $record['password'] )) {
                    $this->user = $record;
                    return true;
                }//end if
            }//end foreach
            return false;
        }//end checkForUser

        public function getUser()  {
            return $this->user;
        }

    }//end indexModel class
?>