<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin</title>
    <link rel="stylesheet" type="text/css" href="<?php echo BASE_URL; ?>media/css/form.css">
    <link rel="stylesheet" type="text/css" href="<?php echo BASE_URL; ?>media/css/main.css">
    <link rel = "stylesheet" type = "text/css" href = "<?php echo BASE_URL; ?>media/css/buttons.css">
    <link rel = "stylesheet" type = "text/css" href = "<?php echo BASE_URL; ?>media/css/profile.css">
    <link rel = "stylesheet" type = "text/css" href = "<?php echo BASE_URL; ?>media/css/tables.css">
</head>
<body>

    <?php
        include "adminnav.php"
    ?>

<style>

    .statscard{
        width: 300px;
        height: 200px;
    }

    .statscard p{
        font-size: 50px;
        text-align: center;
    }

    .statscard h3{
        text-align: center;
        font-size: 30px;
    }

    .wide-table {
        width: 70%;
    }
</style>

<section class="editsection">
                    <section class="stats">
                        <div class="statscard">
                            <h3>System Users</h3>
                            
                            <?php
                                echo "<p>".$systemusercount."</p>";
                            ?>
                        </div>
                        <div class="statscard">
                            <h3>Total Outlets</h3>
                            <?php
                                echo "<p>".$outletcount."</p>";
                                ?>
                        </div>

                        <div class="statscard">
                            <h3>Total Vehicles</h3>
                            <?php
                                
                                echo "<p>".$vehiclecount."</p>";
                                ?>
                        </div>
                        
                        <div class="statscard">
                            <h3>Total Items</h3>
                            <?php
                                echo "<p>".$productitemcount."</p>";?>
                        </div>
                    
                </section>
                <section style="display:flex;justify-content:space-around;">
                    <table class="wide-table">
                        <tr>
                            <th>Category</th>
                            <th>Count</th>
                        </tr>
                        <?php foreach ($productitemcountgroupby as $item): ?>
                            <tr>
                                <td><?php echo $item->category; ?></td>
                                <td><?php echo $item->count; ?></td>
                            </tr>
                        <?php endforeach; ?>
                    </table>
                </section>
    </section>

</body>
</html>
