<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin</title>
    <link rel="stylesheet" type="text/css" href="<?php echo BASE_URL; ?>media/css/form.css">
    <link rel="stylesheet" type="text/css" href="<?php echo BASE_URL; ?>media/css/main.css">
    <link rel = "stylesheet" type = "text/css" href = "<?php echo BASE_URL; ?>media/css/buttons.css">
</head>
<body>

    <?php
        include "adminnav.php"
    ?>

    <?php 
        var_dump($customercount, $outletcount, $systemusercount, $productitemcount);
    ?>

</body>
</html>
