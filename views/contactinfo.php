<!DOCTYPE html>
<html lang="en">
<head>
    <?php 
        include '..\services\links.php';
        session_start();
        if (isset($_POST['firstName'])) {
            // Session of register input
            unset($_SESSION['register']);
            $namingPattern = "/^[a-z\s\-]+$/i";
            $namingOptionalPattern = "/^[a-z\s\-\/]*$/i";
            $wholenumber = "/^[0-9]+$/";
            // Session for every inputs
            foreach ($_POST as $key => $value) {
                $_SESSION['info'][$key] = $value;
            }
            // Validation for inputs
            if (!preg_match($namingPattern, $_SESSION['info']['firstName'])) {
                $error = "True";
                $_SESSION['register']['firstName'] = "Invalid First Name";
            }
            if (!preg_match($namingOptionalPattern, $_SESSION['info']['middleName'])) {
                $error = "True";
                $_SESSION['register']['middleName'] = "Invalid Middle Name";
            }
            if (!preg_match($namingPattern, $_SESSION['info']['lastName'])) {
                $error = "True";
                $_SESSION['register']['lastName'] = "Invalid Last Name";
            }
            if (!preg_match($wholenumber, $_SESSION['info']['age'])) {
                $error = "True";
                $_SESSION['register']['age'] = "Invalid Input, Age must contain number only";
            }      
            if (isset($error)) {
                header('LOCATION: personalinfo.php');
                die();
            }
        } 
        if (!isset($_SESSION['info']['firstName'])) {
            header('LOCATION: personalinfo.php');
        }
    ?>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Information</title>
</head>
<body>
    <div class="container-fluid p-0 m-0">
        <div class="col">
            <div class="content wrapper d-flex align-items-center justify-content-center m-0 p-0">
                <div class="outer-form shadow p-5">
                    <div class="form-header">
                        <h2>Registration</h2>
                        <h6>Contact Information</h6>
                    </div>
                    <form action="verification.php" method="POST">
                        <div class="form-floating row">
                            <input type="text" class="form-control mb-2 <?= isset($_SESSION['info']['street'])? (isset($_SESSION['register']['street'])? "is-invalid" : "is-valid") : "" ?>" name="street" placeholder="Street" value="<?= isset($_SESSION['info']['street']) ? $_SESSION['info']['street'] : 'N/A' ?>"/>
                            <label for="street" class="form-label">Street</label>
                        </div>
                        <div class="form-floating row">
                            <input type="text" class="form-control mb-2 <?= isset($_SESSION['info']['barangay'])? (isset($_SESSION['register']['barangay'])? "is-invalid" : "is-valid") : "" ?>" name="barangay" placeholder="Barangay" value="<?= isset($_SESSION['info']['barangay']) ? $_SESSION['info']['barangay'] : '' ?>" required/>
                            <label for="barangay" class="form-label">Barangay</label>
                        </div>
                        <div class="form-floating row">
                            <input type="text" class="form-control mb-2 <?= isset($_SESSION['info']['city'])? (isset($_SESSION['register']['city'])? "is-invalid" : "is-valid") : "" ?>" name="city" placeholder="City" value="<?= isset($_SESSION['info']['city']) ? $_SESSION['info']['city'] : '' ?>" required/>
                            <label for="city" class="form-label">City</label>
                        </div>
                        <div class="form-floating row">
                            <input type="text" class="form-control mb-2 <?= isset($_SESSION['info']['zipCode'])? (isset($_SESSION['register']['zipCode'])? "is-invalid" : "is-valid") : "" ?>" name="zipCode" placeholder="Zipcode" value="<?= isset($_SESSION['info']['zipCode']) ? $_SESSION['info']['zipCode'] : '' ?>" maxlength="4" required/>
                            <label for="zipCode" class="form-label">Zipcode</label>
                        </div>
                        <div class="form-floating row">
                            <input type="text" class="form-control mb-2 <?= isset($_SESSION['info']['phoneNumber'])? (isset($_SESSION['register']['phoneNumber'])? "is-invalid" : "is-valid") : "" ?>" name="phoneNumber" placeholder="Phone Number" value="<?= isset($_SESSION['info']['phoneNumber']) ? $_SESSION['info']['phoneNumber'] : '' ?>" maxlength="11" required/>
                            <label for="phoneNumber" class="form-label">Phone Number</label>
                        </div>
                        <div class="form-floating row">
                            <input type="email" class="form-control mb-2 <?= isset($_SESSION['info']['email'])? (isset($_SESSION['register']['duplicate'])? "is-invalid" : "is-valid") : "" ?>" name="email" placeholder="Email" value="<?= isset($_SESSION['info']['email']) ? $_SESSION['info']['email'] : '' ?>" required/>
                            <label for="email" class="form-label">Email</label>
                        </div>
                        <div class="row">
                            <div class="col previous p-0">
                                <a href="personalinfo.php" class="form-control">Previous</a>
                            </div>
                            <div class="col p-0">
                                <input type="submit" class="form-control" name="next" value="Next"/>
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