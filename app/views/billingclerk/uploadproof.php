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
    <style>
        
        .button {
            border: none;
            color: white;
            padding: 10px;
            text-align: center;
            text-decoration: none; 
            justify-content: center;
            align-items: right;
            font-size: 16px;
            border-radius: 9px;
        }
        
        .blue {
            background-color: #3498db;
        }
        
    </style>
    <title>Payment Proof Uploading</title>
</head>
<body>
    <?php include "bcnavbar.php"; ?>
<section>
    <div class="form-container">

    <form class="form" method="POST" action="<?php echo BASE_URL;?>BillingControls/uploadProof" enctype="multipart/form-data">
    <div class="form-group">
        <label for="AdvancedOrFinal">Advance or Final Order Payment</label><br>

        <?php

        if($paymentstatus == "pending"){
            echo '<div class="form-group">
            <label for="Final">Amount</label>
            <input type="number" id="number" name="amount" min="1" max="'.$total.'" placeholder="Enter the amount" value="'.$total.'">
            </div>';

            echo '<select name="AdvancedOrFinal" id="AdvancedOrFinal">
            <option value="advanced">Advance Payment</option>
            <option value="paid">Full Payment</option>
            </select>';
        }
        ?>
    </div>

    <input type="hidden" name="orderid" value="<?php echo $orderid; ?>">
    
    <div class="form-group">
        <label for="image">Upload Payment Proof</label>
        <input type="file" name="image" id="image">
    </div>

    <input type="submit" value="Upload Proof" class="button blue">
    </form>
    </div>
</section>
</body>
</html>