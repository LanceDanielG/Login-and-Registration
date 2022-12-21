<!DOCTYPE html>
<html lang="en">
<head>
    <?php 
        include '..\services\links.php';
        session_start();

        if (isset($_POST['username'])) {
            $_SESSION['user']['username'] = $_POST['username'];
            unset($_SESSION['error']);
        } 
        if (empty($_SESSION['user']['username'])) {
            header('LOCATION: ../index.php');
            $_SESSION['error']['empty'] = 'Fill up the field.';
            die();
        }         
        ?>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Password Auth</title>
</head>
<body>
    <div class="container-fluid m-0 p-0">
        <div class="content wrapper d-flex align-items-center justify-content-center">
            <div class="outer-form p-5 shadow">
                <h2 class="mb-4">Password Log In</h2>
                <form action="..\services\login.php" method="POST">
                    <div class="form-floating">
                        <input type="text" name="password" class="form-control" placeholder="Password" value="<?= isset($_SESSION['user']['password'])? $_SESSION['user']['password']: '' ?>"/>
                        <label for="password" class="form-label">Password</label>
                    </div>
                    <div>
                        <span class="text-danger">
                            <?php 
                                if(isset($_SESSION['error']['empty'])) {
                                    echo $_SESSION['error']['empty'];
                                } 
                                elseif (isset($_SESSION['error']['invalid-input'])) {
                                    echo $_SESSION['error']['invalid-input'];
                                }                     
                            ?>
                        </span>
                    </div>
                    <div class="row align-items-center m-0 p-0">
                        <div class="col previous p-0">
                            <a href="../index.php" class="form-control mt-3">Previous</a>
                        </div>
                        <div class="col m-0 p-0 shadow">
                            <input type="submit" name="login" class="form-control mt-3" value="Login"/>
                        </div>
                    </div>
                    <p>Do not have an account?<a class="form-option" href="personalinfo.php">Register Here.</a></p>
                </form>
            </div>
        </div>
    </div>
</body>
</html>