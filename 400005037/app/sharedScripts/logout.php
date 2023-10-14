<?php
    session_start();
    if(isset($_SESSION['sessionUser'])) {
        unset($_SESSION['sessionUser']);
        header('Location:../../');
    }
    session_destroy();
?>