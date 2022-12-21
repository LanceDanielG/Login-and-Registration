<!DOCTYPE html>
<html lang="en">
<head>
    <?php 
        include '..\services\links.php';
        include '../services/dbConnection.php';
        session_start();
        if (isset($_POST['email'])) {
            // Session of register input
            unset($_SESSION['register']);
            $namingPattern = "/^[a-z\s\-]+$/i";
            $barangay = "/^[a-z\d\s\-]+$/i";
            $street = "/^[a-z\d\s\-\#\.\,\/]*$/i";
            $namingOptionalPattern = "/^[a-z\s\-\/]+$/i";
            $phonenumber = "/[0][9][0-9]{9}$/";
            $zipCode = "/^[0-9]{4}$/";
            // Session for every inputs
            foreach ($_POST as $key => $value) {
                $_SESSION['info'][$key] = $value;
            }
            $result = select("user_accounts", "email = '".$_SESSION['info']['email']."'", $connection);
            if ($result->num_rows > 0) {
                $error = "True";
                $_SESSION['register']['duplicate'] = "Invalid Email, Email is already taken";
            }
            // Validation for inputs
            if (!preg_match($street, $_SESSION['info']['street'])) {
                $error = "True";
                $_SESSION['register']['street'] = "Invalid Street";
            }
            if (!preg_match($barangay, $_SESSION['info']['barangay'])) {
                $error = "True";
                $_SESSION['register']['barangay'] = "Invalid Barangay";
            }
            if (!preg_match($namingPattern, $_SESSION['info']['city'])) {
                $error = "True";
                $_SESSION['register']['city'] = "Invalid City";
            }
            if (!preg_match($zipCode, $_SESSION['info']['zipCode'])) {
                $error = "True";
                $_SESSION['register']['zipCode'] = "Invalid Input, ZipCode must contain number only";
            }      
            if (!preg_match($phonenumber, $_SESSION['info']['phoneNumber'])) {
                $error = "True";
                $_SESSION['register']['phoneNumber'] = "Invalid Input, Phone Number must contain number only";
            }      
            if (isset($error)) {
                header('LOCATION: contactinfo.php');
                die();
            }
        } 
        if (!isset($_SESSION['info']['email'])) {
            header('LOCATION: contactinfo.php');
        }
    ?>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Verification</title>
</head>
<body>
    <div class="container-fluid">
        <div class="col">
            <div class="content wrapper d-flex align-items-center justify-content-center m-0 p-0">
                <div class="outer-form p-5 shadow">
                    <div class="form-header">
                        <h2>Registration</h2>
                        <h6>User Creation</h6>
                    </div>
                    <form action="../services/register.php" method="post">
                        <div class="row form-floating">
                            <input type="text" class="form-control mb-2" name="username" placeholder="Username" value="<?= isset($_SESSION['info']['username'])? $_SESSION['info']['username'] : "" ?>" minlength="8" maxlength="25" required/>
                            <label for="username" class="form-label">Username</label>
                        </div>
                        <div class="row form-floating">
                            <input type="text" class="form-control mb-2" name="password" placeholder="Password" value="<?= isset($_SESSION['info']['password'])? $_SESSION['info']['password'] : "" ?>" minlength="8" maxlength="25" required/>
                            <label for="password" class="form-label">Password</label>
                        </div>
                        <div class="row form-floating">
                            <input type="text" class="form-control mb-2" name="confirmPassword" placeholder="Confirm Password" value="<?= isset($_SESSION['info']['confirmPassword'])? $_SESSION['info']['confirmPassword'] : "" ?>" minlength="8" maxlength="25" required/>
                            <label for="confirmPassword" class="form-label">Confirm Password</label>
                        </div>
                        <div>
                            <span class="text-danger">
                                <?php 
                                    if (isset($_SESSION['error']['invalid-input'])) {
                                        echo $_SESSION['error']['invalid-input'];
                                    }                     
                                ?>
                            </span>
                        </div>
                        <div class="row">
                            <div class="col previous p-0">
                                <a href="contactinfo.php" class="form-control">Previous</a>
                            </div>
                            <div class="col p-0">
                                <input type="submit" class="form-control mb-2" value="Confirm"/>
                            </div>
                        </div>
                        <p>Have an account?<a href="..\index.php" class="form-option"> Log In Here.</a></p>
                    </form>
                </div>
            </div>
        </div>
        <!-- Error Message -->
        <div class="col-3 ms-4 text-center fixed-bottom">
            <?php if (isset($_SESSION['register'])): ?>
                <?php foreach ($_SESSION['register'] as $error): ?>
                    <!-- Option you can use 1 php tag to print error inside an echo -->
                    <div class="errorContainer align-items-center mb-2 p-3">
                        <!-- You can also use invisible class of bootstrap to display the error you will just need condition -->
                        <span class="errormsg m-0 p-0"><?= $error . "<br>" ?></span>
                    </div>
                <?php endforeach; ?>
            <?php endif; ?>
        </div>
        <!-- End  -->
    </div>
</body>
</html>