<!DOCTYPE html>
<html lang="en">
<head>
    <?php 
        include '..\services\links.php';
        session_start();
        if (!isset($_SESSION['logged'])) {
            header('LOCATION: password-login.php');
            die();
        }
    ?>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Side</title>
</head>
<body>
    <div class="container">
        <div class="content">
            <div class="d-flex justify-content-end">
                <h2>WELCOME <span class="text-danger"><?= $_SESSION['logged'] ?></span></h2>
            </div>
            <h2>User Side</h2>
            <p>
                <span>Lorem ipsum dolor sit amet consectetur adipisicing elit. Doloremque cumque officiis odit, nemo eaque voluptatibus est obcaecati voluptatum minima recusandae explicabo. Deleniti eligendi delectus commodi atque voluptates cupiditate quaerat blanditiis.</span><span>Tempora animi rerum voluptatem laborum magni deserunt odio at iure ullam sed velit illo possimus earum blanditiis et illum eveniet totam, quis culpa quod impedit suscipit? Veritatis voluptates provident dolorum!</span><span>Impedit fugiat at quasi totam nam. Magnam fugiat quos in, deleniti ullam aliquam libero. Odit, modi. Reiciendis, possimus magnam? Inventore, perspiciatis ad architecto suscipit harum placeat obcaecati quibusdam facilis sunt.</span><span>Optio, repellat quia. Est dolore id, architecto nemo quae incidunt assumenda distinctio enim laboriosam itaque quas praesentium eius aliquid totam blanditiis officia. Ducimus quos dolorem cum blanditiis id deserunt quis!</span><span>Accusamus, sit harum! Odio architecto quae ipsam iusto culpa ipsum, amet quod illum quasi ut quo delectus dolorum non sed quas. Amet ab fugiat sed dolorem, earum reprehenderit illum officiis!</span><span>Eaque nulla sed labore autem dignissimos consequatur, tenetur sequi commodi ad quibusdam odit saepe iste quo maiores quisquam nostrum officia, dolore itaque fuga! Sunt magnam velit repudiandae eos esse fugit.</span><span>Quo consequatur illo doloremque, aperiam animi iusto, exercitationem totam quas ad, optio quibusdam! Doloribus totam, sed veniam est assumenda ex laborum distinctio nesciunt quae natus voluptatibus omnis temporibus autem beatae!</span><span>Cupiditate modi corporis nesciunt obcaecati, sunt dolorem consequatur possimus tempore, totam sequi unde omnis. Sequi rem provident, velit eaque ullam facilis. Dolorem sunt laudantium maxime in excepturi velit sit vero!</span><span>Eaque quibusdam placeat odio dignissimos ab quos debitis enim? Illum ducimus natus id aliquid commodi mollitia. Itaque animi voluptate nam quas eos? Culpa est tenetur aut quasi quo eaque eligendi!</span><span>Adipisci sit ducimus asperiores, et error velit eveniet cum molestiae perspiciatis dolores, culpa laborum laudantium fuga, delectus non! Nemo, vero! Autem laboriosam obcaecati amet odio alias exercitationem ex rerum veniam.</span>
            </p>   
            <a href="\loginandregi\services\logout.php" class="form-option">Log Out</a>
        </div>
    </div>
</body>
</html>