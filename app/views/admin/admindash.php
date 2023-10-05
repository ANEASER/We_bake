<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" type="text/css" href="http://localhost/we_bake/public/css/main.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add System user</title>
</head>
<body>
    <h1 class="header">Admin dash</h1>
    <div class="container">
        <div class="sub-container navbar" style="display: flex; flex-direction:column;">
            <a href="/admin" class="navbutton">Items</a>
            <a href="/admin" class="navbutton">Vehicle</a>
            <a href="/admin" class="navbutton">Outlets</a>
            <a href="/admin" class="navbutton">Users</a>
        </div>

        <div class="sub-container content">
            <?php
                print_r($data);
            ?>
        </div>
    </div>

    
</body>
</html>