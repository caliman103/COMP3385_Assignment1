<?php
    require_once './app/traits/modelTrait.php';
    class DashboardModel{
        Use ModelTrait;
        private $userPermissions = [];

        public function __construct() {
            $this->establishConnection();
            $this->retrieveUserPermissions();
        }

        private function retrieveUserPermissions() {
            $query = "SELECT accessLevels as permissions FROM user_access_levels WHERE email = '{$_SESSION['sessionUser']['email']}';";
            $records = $this->runQuery($query, true);
            foreach($records as $record) {
                $this->userPermissions[] = $record['permissions'];
            }
        }//end retrieveUserPermissions

        public function getUserPermissions() {
            return $this->userPermissions;
        }
        
    }//end DashboardModel

?>