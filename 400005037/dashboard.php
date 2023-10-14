<?php
    session_start();
    if(!isset($_SESSION['sessionUser'])) {
        header('Location:./');    
    } else {
        require_once 'app/autoloader/autoloader.php';
        new DashboardController();
    }
    
?>