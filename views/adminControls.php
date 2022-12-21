<!DOCTYPE html>
<html lang="en">
<head>
    <?php 
        include '..\services\links.php';
        session_start();
        if (!isset($_SESSION['logged'])) {
            header('LOCATION: ../admin-login.php');
            die();
        }
    ?>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
</head>
<body>
    <div class="container">
        <div class="content">
            <div class="d-flex justify-content-end">
                <h2>WELCOME <span class="text-danger"><?= $_SESSION['logged'] ?></span></h2>
            </div>
            <h2>Dashboard</h2>
            <p><span>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Quos deserunt atque repellat magnam, illum quod reiciendis dolore autem non modi suscipit quaerat maiores molestias qui? Enim autem a minus pariatur?</span><span>Officia ipsam minus ullam asperiores aliquid possimus, doloremque maxime sequi molestiae, sint voluptatum? Nisi, distinctio, temporibus perferendis quod voluptatum odio rerum numquam aspernatur earum, nam at nostrum dolor repellat eaque?</span><span>Voluptas atque corrupti quidem consequuntur magnam, quas quisquam labore quibusdam vitae delectus molestiae. Voluptas non doloribus dolorem voluptatibus, optio consequatur dicta assumenda eveniet aliquid tempore eaque, suscipit necessitatibus delectus quisquam?</span><span>Voluptates cumque voluptatibus fuga alias non dignissimos porro quisquam corrupti obcaecati rerum. Libero rerum pariatur a eum dolorum illo atque omnis officiis ipsum nemo, praesentium, mollitia ratione iure, repellendus facere.</span><span>Numquam, autem obcaecati! Eum vitae provident illo repellat? Id omnis, inventore eos nesciunt pariatur provident sapiente quo sit vitae nam nihil exercitationem delectus totam natus culpa, harum asperiores adipisci consectetur.</span><span>Quia consectetur explicabo deserunt odio inventore magnam, neque, quisquam porro cupiditate in repellat earum animi recusandae eligendi quo mollitia? Suscipit hic vitae quo quidem veritatis nemo qui, magnam illum quaerat!</span><span>Mollitia, provident? Ea commodi possimus eaque unde ipsum, cum nulla illo, hic iste sit impedit corrupti suscipit distinctio eum sed reprehenderit doloremque? Eos voluptates quia placeat optio culpa perferendis hic?</span><span>Recusandae id voluptate hic temporibus accusamus placeat blanditiis, ipsam totam quos, maxime ullam repudiandae. Voluptas repudiandae culpa veniam possimus tempora blanditiis praesentium quibusdam non, asperiores pariatur, perspiciatis unde tempore! Expedita.</span><span>Illo, unde accusamus? Tempore quas ex incidunt nobis porro voluptate architecto dignissimos deserunt neque omnis, dolorem optio ipsa, officia blanditiis aliquid unde itaque fugit odit, qui officiis eligendi sequi ab.</span><span>Aliquam nihil, nulla maiores doloremque nemo voluptate nesciunt voluptatem, soluta unde eligendi, placeat deleniti. Temporibus, vitae nihil minus quam nostrum laboriosam necessitatibus voluptas maiores quibusdam laudantium. Iure, a. Dolor, aliquam!</span></p>
            <a href="\loginandregi\services\logout.php" class="form-option">Log Out</a>
        </div>
    </div>
</body>
</html>