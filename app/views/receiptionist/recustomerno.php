<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel = "stylesheet" type = "text/css" href = "<?php echo BASE_URL; ?>media/css/tables.css">
    <link rel = "stylesheet" type = "text/css" href = "<?php echo BASE_URL; ?>media/css/buttons.css">
    <link rel = "stylesheet" type = "text/css" href = "<?php echo BASE_URL; ?>media/css/cart.css">
    <link rel = "stylesheet" type = "text/css" href = "<?php echo BASE_URL; ?>media/css/main.css">
    <title>Customer number search</title>
</head>
  
<body>
    <?php
        include "recnavbar.php";
    ?>
 
 <form action="<?php echo BASE_URL; ?>RecieptionControls/customernumbersearch" method="post" >
    <label for="telephoneno">Telephone No:</label>
 <br>
 <input type="numbers" id="telephoneno" name="telephoneno">
 <input type="submit" value="submit">
 

</form>

</body>
</html>

