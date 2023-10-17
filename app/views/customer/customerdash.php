<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Customer Dashboard</title>
    <link rel="stylesheet" type="text/css" href="cutomersytles.css">
</head>
<body>
<div class="header">
        <h1>Customer Dashboard</h1>
    </div>
    <div class="container">

        <?php
        include "sidebar.php"
        ?>
    
    <?php
        echo "<pre>";
        print_r($data);
        echo "</pre>";
    ?>
</body>
</html>
