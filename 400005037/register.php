<?php
    session_start();
    require_once 'app/autoloader/autoloader.php';
    //A user shouldn't be able to access login page if one is already signed in
    if(isset($_SESSION['sessionUser'])) {
        header('Location:./dashboard.php');
    } else {
          if(isset($_POST['submitted'])) {
            new RegisterController();
        } else {
            new RegisterController(false);
        }  
    }
?>