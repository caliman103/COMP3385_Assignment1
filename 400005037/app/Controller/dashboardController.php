<?php
    class DashboardController {
        private $userPermissions = [];
        public function __construct() {
            $dashboardModel = new DashboardModel();
            $this->userPermissions = $dashboardModel->getUserPermissions();
            require 'app/View/dashboardView.php';
        }
    }//end class

?>