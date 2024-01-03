<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Upload Proof</h1>

    <h3>Order ID: <?php echo $orderid; ?></h3>
    <h3>Payment Status: <?php echo $paymentstatus; ?></h3>

    <form action="<?php echo BASE_URL; ?>BillingControls/uploadproof" method="post" enctype="multipart/form-data">
        
        <label for="initialorfinal">Initial or final payment</label>
    
        <?php
            if ($paymentstatus == "advanced") {
                echo "<select name='initialorfinal' id='initialorfinal'>
                        <option value='final'>Final</option>";
            } else {
                echo "<select name='initialorfinal' id='initialorfinal'>
                        <option value='final'>Final</option>
                        <option value='initial'>Initial</option>";
            }
        
        ?>

        <label for="">Amount</label>
        <input type="number" min="0" name="amount" id="number" placeholder="Enter a number">
         
        <input type="hidden" name="orderid" value="<?php echo $orderid; ?>">
        
        <label for="image">Upload proof of payment</label>
        <input type="file" name="image" id="image">

        <input type="submit" value="Upload">
    </form>
    
</body>
</html>