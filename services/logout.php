<?php 
    session_start();
    // unset($_SESSION['logged']);
    // unset($_SESSION['error']);
    // unset($_SESSION['info']);
    // unset($_SESSION['user']);

    if ($_SESSION['usertype'] == "admin") {
        // unset($_SESSION['usertype']);
        session_unset();
        header('LOCATION: ..\admin-login.php');
        die();
    }
    if ($_SESSION['usertype'] == "user") {
        // unset($_SESSION['usertype']);   
        session_unset();
        header('LOCATION: ..\index.php');
    }
?>