<?php
    session_start();
    unset($_SESSION['logged']);
    unset($_SESSION['error']);
    header('LOCATION: ..\admin-login.php');


    // NOT NEEDED ANYMORE ~
    // FOR REFERENCE ONLY.....