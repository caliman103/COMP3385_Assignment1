<?php
    require_once 'app/autoloader/autoloader.php';
    session_start();
    if(!isset($_SESSION['sessionUser'])) {  //no user for the session
        header('Location:./');
    } else {    // there is a user logged in
        if($_SESSION['sessionUser']['role'] !== "Research Group Manager") { //user should not access this page
            header('Location:./dashboard.php');
        } else { //user can access this page
            if(isset($_POST['submitted'])) {
                new CreateUserController();
            } else {
                 new CreateUserController(false);
            }
        }
    }
?>