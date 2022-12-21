<!DOCTYPE html>
<html lang="en">
<head>
    <?php 
        include '..\services\links.php';
        session_start();
        // session for user input in login
        unset($_SESSION['user']);
        unset($_SESSION['error']['invalid-input']);
        unset($_SESSION['error']['empty']);
        // echo "<pre>";
        // print_r($_SESSION['info']);
        // echo "</pre>";
    ?>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Personal Information</title>
</head>
<body>
    <div class="container-fluid p-0 m-0">
        <div class="col">
            <div class="content wrapper d-flex align-items-center justify-content-center m-0 p-0 shadow">
                <div class="outer-form p-5 m-0 shadow">
                    <div class="form-header">
                        <h2>Registration</h2>
                        <h6>Personal Information</h6>
                    </div>
                    <form action="contactinfo.php" method="POST">
                        <div class="mx-0 mb-2 p-0">
                            <div class="form-floating p-0">
                                <input type="text" class="form-control <?= isset($_SESSION['info']['firstName'])? (isset($_SESSION['register']['firstName'])? "is-invalid" : "is-valid") : "" ?>" name="firstName" placeholder="First Name" value="<?= isset($_SESSION['info']['firstName']) ? $_SESSION['info']['firstName'] : '' ?>" maxlength="25" required/>
                                <label for="firstName" class="form-label">First Name</label>
                            </div>
                        </div>
                        <div class="mx-0 mb-2 p-0">
                            <div class="form-floating p-0">
                                <input type="text" class="form-control <?= isset($_SESSION['info']['middleName'])? (isset($_SESSION['register']['middleName'])? "is-invalid" : "is-valid") : "" ?>" name="middleName" placeholder="Middle Name" value="<?= isset($_SESSION['info']['middleName']) ? $_SESSION['info']['middleName'] : 'N/A' ?>" maxlength="25"/>
                                <label for="middleName" class="form-label">Middle Name</label>
                            </div>
                        </div>
                        <div class="mx-0 mb-2 p-0">
                            <div class="form-floating p-0">
                                <input type="text" class="form-control <?= isset($_SESSION['info']['lastName'])? (isset($_SESSION['register']['lastName'])? "is-invalid" : "is-valid") : "" ?>" name="lastName" placeholder="Last Name" value="<?= isset($_SESSION['info']['lastName']) ? $_SESSION['info']['lastName'] : '' ?>" maxlength="25" required/>
                                <label for="lastName" class="form-label">Last Name</label>
                            </div>
                        </div>
                        <div class="form-floating row mt-3 mx-0">
                            <div class="col">
                                <input type="radio" name="gender" value="Male" <?= isset($_SESSION['info']['gender']) && $_SESSION['info']['gender'] == 'Male' ? 'checked' : '' ?> required/>
                                <label for="gender" class="form-label">Male</label>
                            </div>
                            <div class="col">
                                <input type="radio" name="gender" value="Female" <?= isset($_SESSION['info']['gender']) && $_SESSION['info']['gender'] == 'Female' ? 'checked' : '' ?>/>
                                <label for="gender" class="form-label">Female</label>
                            </div>
                        </div>
                        <div class="form-floating mb-2">
                            <input type="date" class="form-control <?= isset($_SESSION['info']['birthDate'])? "is-valid" : "" ?>" name="birthDate" placeholder="Birth Date" min="1900-01-01" value="<?= isset($_SESSION['info']['birthDate']) ? $_SESSION['info']['birthDate'] : '' ?>" required/>
                            <label for="birthDate" class="form-label">Birth Date</label>
                        </div>
                        <div class="form-floating mb-2">
                            <input type="text" class="form-control <?= isset($_SESSION['info']['age'])? (isset($_SESSION['register']['age'])? "is-invalid" : "is-valid") : "" ?>" name="age" placeholder="Age" value="<?= isset($_SESSION['info']['age']) ? $_SESSION['info']['age'] : '' ?>" maxlength="3" required/>
                            <label for="age" class="form-label">Age</label>
                        </div>
                        <input type="submit" class="form-control" name="next" value="Next"/>
                        <p>Have an account?<a class="form-option" href="..\index.php"> Log In Here.</a></p>
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
