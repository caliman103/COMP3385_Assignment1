<?php
        require_once 'app/traits/modelTrait.php';
        class CreateUserModel {
            Use ModelTrait;

            public function __construct() {
                $this->establishConnection(); //from ModelTrait.php
            }//end constructor
    
            public function insertRecord($record) {
                //Create query for the users table
                $usersQuery = "INSERT INTO users (username, password, email, role) VALUES('{$record['username']}', '{$record['password']}', '{$record['email']}', '{$record['role']}');";
                $this->runQuery($usersQuery);

                //Start the query for the accesslevel table
                $accessLevelQuery = "INSERT into user_access_levels (email, accessLevels) VALUES ";
                for($i = 0; $i < sizeof(($this->rolePermissions[$record['role']])); $i++) {
                    //Record to be added into the table
                    $accessLevelQuery .= "('{$record['email']}', '{$this->rolePermissions[$record['role']][$i]}')";
                    //There is another accesslevel for the user
                    if(isset($this->rolePermissions[$record['role']][$i+1])){
                        $accessLevelQuery .= ", ";
                    } else { //no more access levels so end the query
                        $accessLevelQuery .= ";";
                    }
                }
                $this->runQuery($accessLevelQuery);
            }//end insertRecord
        }
?>
