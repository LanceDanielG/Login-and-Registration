<?php 
    include 'dbConnection.php';
    session_start();
    
    if (empty($_POST['password'])) {
        $_SESSION['error']['empty'] = 'Fill up the field.';
        header('LOCATION: ../views/password-login.php');
        die();
    } 
    if (isset($_POST['password'])) {        
        $_SESSION['user']['password'] = $_POST['password'];
        unset($_SESSION['error']);
        $result = select('user_accounts', 'username = "'.$_SESSION['user']['username'].'" OR email = "'.$_SESSION['user']['username'].'"', $connection);
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {          
                if ($_SESSION['user']['username'] == $row['username'] or $_SESSION['user']['username'] == $row['email']) {
                    if ($_POST['password'] == $row['password']) {
                        $_SESSION['logged'] = $_SESSION['user']['username'];
                        $_SESSION['usertype'] = $row['userType'];
                        unset($_SESSION['error']);
                        header('LOCATION: ../views/welcome.php');
                        die();
                    } else {
                        $_SESSION['error']['invalid-input'] = 'Invalid Password';
                        header('LOCATION: ../views/password-login.php');
                    }
                } else {
                    $_SESSION['error']['invalid-input'] = 'Invalid Username or Email';
                    header('LOCATION: ../index.php');
                    die();
                }
            }
        } else {
            $_SESSION['error']['invalid-input'] = 'Invalid Username or Email';
            header('LOCATION: ../index.php');
            die();
        }
    } else {
        $_SESSION['error']['invalid-input'] = 'Cannot Bypass Please Enter Credentials';
        header('LOCATION: ../views/password-login.php');
    }

    var_dump($_SESSION);
    var_dump($result);
?>
