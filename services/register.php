<?php
    include 'dbConnection.php';
    session_start();
    unset($_SESSION['register']);
    foreach ($_POST as $key => $value) {
        $_SESSION['info'][$key] = $value;
    }
    if (isset($_POST['username'])) {
        if ($_POST['password'] !== $_POST['confirmPassword']) {
            $_SESSION['register']['invalid-input'] = "Password Do Not Match";
            header('LOCATION: ../views/verification.php');
            die();
        } else {
            $firstName = $_SESSION['info']['firstName'];
            $middleName = $_SESSION['info']['middleName'];
            $lastName = $_SESSION['info']['lastName'];
            $birthDate = $_SESSION['info']['birthDate'];
            $age = $_SESSION['info']['age'];
            $gender = $_SESSION['info']['gender'];
            $street = $_SESSION['info']['street'];
            $barangay = $_SESSION['info']['barangay'];
            $city = $_SESSION['info']['city'];
            $zipCode = $_SESSION['info']['zipCode'];
            $phoneNumber = $_SESSION['info']['phoneNumber'];
            $email = $_SESSION['info']['email'];
            $username = $_SESSION['info']['username'];
            $password = $_SESSION['info']['password'];
    
            $sql = "INSERT INTO user_accounts (
                firstName, 
                middleName, 
                lastName, 
                birthDate, 
                age, 
                gender, 
                street, 
                barangay, 
                city, 
                zipcode, 
                phoneNumber, 
                email, 
                username, 
                password
            ) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
            $statement = $connection->prepare($sql);
            $statement->bind_param("ssssssssssssss",
                $firstName,
                $middleName,
                $lastName,
                $birthDate,
                $age,
                $gender,
                $street,
                $barangay,
                $city,
                $zipCode,
                $phoneNumber,
                $email,
                $username,
                $password
            );
            $statement->execute();
            unset($_SESSION['error']);
            header('LOCATION: ../index.php');
        }
    } else {
        header('LOCATION: ../views/verification.php');
    }
?>