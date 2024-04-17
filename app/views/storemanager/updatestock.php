<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel = "stylesheet" type = "text/css" href = "<?php echo BASE_URL; ?>media/css/form.css">
    <link rel = "stylesheet" type = "text/css" href = "<?php echo BASE_URL; ?>media/css/buttons.css">
    <link rel = "stylesheet" type = "text/css" href = "<?php echo BASE_URL; ?>media/css/main.css">
    <title>Store Manager_ Stocks</title>
</head>
<body>
    <?php
        include "smnavbar.php";
    ?>
    <div class="content">
        <h1>Update Stocks</h1>
    </div>

    <section>
        <div class="form-container">

        <form class="form" method="POST" action="<?php echo BASE_URL; ?>StoreControls/updateStocks">

        <input type="hidden" name="id" value="<?php echo $data[0]->ItemID; ?>">

        <div class="form-group">
                <label for="Name">Name:</label>
                <input type="text" id="Name" name="Name" placeholder="<?php echo $data[0]->Name; ?>">
        </div>

        <div class="form-group">
                <label for="Type">Type:</label>
                <input type="text" id="Type" name="Type" placeholder="<?php echo $data[0]->Type; ?>">
        </div>

        <div class="form-group">
                <label for="Type">Unit of Measurement:</label>
                <input type="text" id="UnitOfMeasurement" name="UnitOfMeasurement" placeholder="<?php echo $data[0]->UnitOfMeasurement; ?>">
        </div>

        <div class="form-group">
                <label for="Type">Minimum Stock:</label>
                <input type="text" id="MinimumStock" name="MinimumStock" placeholder="<?php echo $data[0]->MinimumStock; ?>">
        </div>

        <div class="form-group">
                <label for="Type">Critical Stock:</label>
                <input type="text" id="CriticalStock" name="CriticalStock" placeholder="<?php echo $data[0]->CriticalStock; ?>">
        </div>

        <input class="yellowbutton" type="submit" value="Update">




        </div>
    </section> 
        
</body>
</html>
