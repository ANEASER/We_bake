<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel = "stylesheet" type = "text/css" href = "<?php echo BASE_URL; ?>media/css/tables.css">
    <link rel = "stylesheet" type = "text/css" href = "<?php echo BASE_URL; ?>media/css/buttons.css">
    <link rel = "stylesheet" type = "text/css" href = "<?php echo BASE_URL; ?>media/css/cart.css">
    <link rel = "stylesheet" type = "text/css" href = "<?php echo BASE_URL; ?>media/css/main.css">
    <link rel = "stylesheet" type = "text/css" href = "<?php echo BASE_URL; ?>media/css/form.css">
    <title>Document</title>
</head>
<body>
    <?php include "bcnavbar.php"; ?>
    <section>
        <div class="form-container">

            <form class="form" action="<?php echo BASE_URL; ?>BillingControls/uploadproof" method="post" enctype="multipart/form-data">
                <div class="form-group">
                        <label for="initialorfinal">Initial or final payment</label>
                    
                        <?php
                            if ($paymentstatus == "advanced") {
                                echo '<div class="form-group">
                                                <label for="">Amount</label>
                                                <input type="number" min="0" name="amount" id="number" placeholder="Enter a number" value="'.$total.'">
                                        </div>';
                                echo "<select name='initialorfinal' id='initialorfinal'>
                                        <option value='paid'>Final</option>";
                            } else {
                                echo '<div class="form-group">
                                                <label for="">Amount</label>
                                                <input type="number" min="0" name="amount" id="number" placeholder="Enter a number">
                                        </div>';
                                echo "<select name='initialorfinal' id='initialorfinal'>
                                        <option value='paid'>Final</option>
                                        <option value='advanced'>Initial</option>";
                            }
                        
                        ?>
                </div>
                <input type="hidden" name="orderid" value="<?php echo $orderid; ?>">
                <div class="form-group">  
                    <label for="image">Upload proof of payment</label>
                    <input type="file" name="image" id="image">
                </div>
                    <input type="submit" value="Upload" class="bluebutton">
            </form>
        </div>
    </section>
</body>
</html>