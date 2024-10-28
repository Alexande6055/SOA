<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<section>
        <?php
        require_once "controllers/controller.php";
        require_once "models/model.php";
        $mvc=new MvcController();
        $mvc->verificacionLogeo();
        ?>
    </section>
</body>
</html>