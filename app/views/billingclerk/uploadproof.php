<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Upload Proof</h1>

    <form action="<?php echo BASE_URL; ?>BillingControls/uploadproof" method="post" enctype="multipart/form-data">
        
        <label for="initialorfinal">Initial or final payment</label>
        <select name="initialorfinal" id="initialorfinal">
            <option value="initial">Initial</option>
            <option value="final">Final</option>

        <label for="">Amount</label>
        <input type="number" name="amount" id="number" placeholder="Enter a number">
         
        <input type="hidden" name="orderid" value="<?php echo $orderid; ?>">
        
        <label for="image">Upload proof of payment</label>
        <input type="file" name="image" id="image">

        <input type="submit" value="Upload">
    </form>
    
</body>
</html>