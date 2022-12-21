<!DOCTYPE html>
<html lang="en">
<head>
    <?php 
        include 'services\links.php';
        session_start();
        unset($_SESSION['info']);
        unset($_SESSION['register']);
    ?>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Log In</title>
</head>
<body>
    <div class="container-fluid m-0 p-0">
        <div class="content wrapper d-flex align-items-center justify-content-center">
            <div class="outer-form p-5 shadow">
                <h2 class="mb-4">Log In</h2>
                <form action="views\password-login.php" method="POST">
                    <div class="form-floating">
                        <input type="text" name="username" class="form-control mb-2" placeholder="Username" value="<?= isset($_SESSION['user']['username'])? $_SESSION['user']['username']: '' ?>"/>
                        <label for="username" class="form-label">Username or Email</label>
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
                    <div>
                        <input type="submit" name="continue" class="form-control mt-3" value="Continue"/>
                    </div>
                    <p>Do not have an account?<a class="form-option" href="views\personalinfo.php"> Register Here.</a></p>
                </form>
            </div>
        </div>
    </div>
</body>
</html>