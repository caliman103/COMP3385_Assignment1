<?php
    require_once 'app/traits/modelTrait.php';
    class RegisterModel {
        Use ModelTrait;

        public function __construct() {
            $this->establishConnection();
        }//end constructor

        public function insertRecord($record) {
            $userQuery = "INSERT INTO users (username, password, email, role) VALUES('{$record['username']}', '{$record['password']}', '{$record['email']}', 'Research Group Manager');"; 
            $this->runQuery($userQuery);

            //Start the query for the accesslevel table; rolePermissions is in Modeltrait
            $accessLevelQuery = "INSERT into user_access_levels (email, accessLevels) VALUES ";
            for($i = 0; $i < sizeof(($this->rolePermissions['Research Group Manager'])); $i++) {
                //Record to be added into the table
                $accessLevelQuery .= "('{$record['email']}', '{$this->rolePermissions['Research Group Manager'][$i]}')";
                //There is another accesslevel for the user
                if(isset($this->rolePermissions['Research Group Manager'][$i+1])){
                    $accessLevelQuery .= ", ";
                } else { //no more access levels so end the query
                    $accessLevelQuery .= ";";
                }
            }
            $this->runQuery($accessLevelQuery);
        }//end insertRecord

    }//end ReisterModel Class

?>