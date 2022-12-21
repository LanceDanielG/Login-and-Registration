<?php

    //include database
    include 'dbConnection.php';
    //start session
    session_start();
    //check if field is empty
    if (empty($_POST['username']) or empty($_POST['password'])) {
        $_SESSION['error']['empty'] = 'Fill up the field.';
        header('LOCATION: ../admin-login.php');
        die();
    }
    //on submit
    if (isset($_POST['username'])) {
        unset($_SESSION['error']);
        //set variable
        $username = $_POST['username'];
        $password = $_POST['password'];
        //set query
        $sql = 'SELECT * FROM admin_accounts WHERE username = ? && password = ?';
        $statement = $connection->prepare($sql);
        $statement->bind_param("ss", $username, $password);
        $statement->execute();
        //get result set
        $result = $statement->get_result();
        $row = $result->fetch_assoc();
        //condition if the input are matched to the data fetched
        if ($result->num_rows > 0) {
            //Identify user in Session
            $_SESSION['logged'] = $_POST['username'];
            $_SESSION['usertype'] = $row['userType'];
            unset($_SESSION['error']);
            header('LOCATION: ../views/adminControls.php');
            die();
        } else {
            $_SESSION['error']['empty'] = 'Invalid Credentials';
            header('LOCATION: ../admin-login.php');
        }
    }

    //it's okay to not have php ending script in external php same goes in a code that does not have semicolon as long as you have the php script ending

